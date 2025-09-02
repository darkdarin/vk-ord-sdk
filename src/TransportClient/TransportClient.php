<?php

namespace DarkDarin\VkOrdSdk\TransportClient;

use DarkDarin\Serializer\ApiSerializer\ApiSerializerInterface;
use DarkDarin\Serializer\MethodParametersSerializer\MethodParametersMapperInterface;
use DarkDarin\VkOrdSdk\Attributes\Route;
use DarkDarin\VkOrdSdk\DTO\Error;
use DarkDarin\VkOrdSdk\DTO\Errors;
use DarkDarin\VkOrdSdk\Exceptions\BadRequestException;
use DarkDarin\VkOrdSdk\Exceptions\ConflictException;
use DarkDarin\VkOrdSdk\Exceptions\ForbiddenException;
use DarkDarin\VkOrdSdk\Exceptions\GoneException;
use DarkDarin\VkOrdSdk\Exceptions\InternalServerError;
use DarkDarin\VkOrdSdk\Exceptions\NotFoundException;
use DarkDarin\VkOrdSdk\Exceptions\UnauthorizedException;
use DarkDarin\VkOrdSdk\Exceptions\VkOrdException;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

readonly class TransportClient implements TransportClientInterface
{
    public function __construct(
        private ClientInterface $client,
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
        private ApiSerializerInterface $serializer,
        private MethodParametersMapperInterface $parametersMapper,
    ) {}

    /**
     * @template TObject of object
     * @template TType of string|class-string<TObject>
     * @param string $url
     * @param string $token
     * @param string $method
     * @param array $parameters
     * @param bool $multipart
     * @psalm-return (TType is class-string<TObject> ? TObject : mixed)
     * @return mixed
     */
    public function send(
        string $url,
        string $token,
        string $method,
        array $parameters,
        bool $multipart = false,
    ): mixed {
        try {
            $data = $this->parametersMapper->getNamedArguments($method, $parameters);
            $methodInfo = $this->parseMethod($method, $data);

            if ($multipart) {
                $request = $this->makeMultipartRequest($url, $token, $methodInfo);
            } else {
                $request = $this->makeJsonRequest($url, $token, $methodInfo);
            }

            $rawResponse = $this->client->sendRequest($request);
            if ($rawResponse->getStatusCode() !== 200 && $rawResponse->getStatusCode() !== 201) {
                $body = $rawResponse->getBody()->getContents();

                try {
                    $error = $this->serializer->deserialize($body, Error::class, 'json');
                } catch (\Throwable) {
                    try {
                        $error = $this->serializer->deserialize($body, Errors::class, 'json');
                    } catch (\Throwable) {
                        $error = new Error($rawResponse->getReasonPhrase());
                    }
                }

                throw match ($rawResponse->getStatusCode()) {
                    400 => new BadRequestException($error->error, $rawResponse->getStatusCode()),
                    401 => new UnauthorizedException($error->error, $rawResponse->getStatusCode()),
                    403 => new ForbiddenException($error->error, $rawResponse->getStatusCode()),
                    404 => new NotFoundException($error->error, $rawResponse->getStatusCode()),
                    409 => new ConflictException($error->error, $rawResponse->getStatusCode()),
                    410 => new GoneException($error->error, $rawResponse->getStatusCode()),
                    500 => new InternalServerError($error->error, $rawResponse->getStatusCode()),
                    default => new VkOrdException($error->error, $rawResponse->getStatusCode()),
                };
            }

            if ($methodInfo->returnType === StreamInterface::class) {
                return $rawResponse->getBody();
            }

            $body = $rawResponse->getBody()->getContents();
            if (empty($body) || $body === 'null') {
                return true;
            }

            $response = $this->serializer->decode($body, 'json');

            if (is_scalar($response)) {
                return $response;
            }

            if ($methodInfo->returnType instanceof ArrayOf) {
                $type = $methodInfo->returnType->type . '[]';
            } else {
                $type = $methodInfo->returnType;
            }

            return $this->serializer->denormalize($response, $type);
        } catch (VkOrdException $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw new VkOrdException($e->getMessage(), $e->getCode(), $e);
        }
    }

    protected function makeJsonRequest(string $url, string $token, MethodInfo $methodInfo): RequestInterface
    {
        $request = $this->requestFactory
            ->createRequest($methodInfo->method, $this->getUrl($url, $methodInfo->path, $methodInfo->parameters))
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Authorization', sprintf('Bearer %s', $token));

        if ($methodInfo->body !== null) {
            $dataStream = $this->streamFactory->createStream(
                $this->serializer->serialize((object) $methodInfo->body, 'json'),
            );

            $request = $request->withBody($dataStream);
        }

        return $request;
    }

    protected function makeMultipartRequest(string $url, string $token, MethodInfo $methodInfo): RequestInterface
    {
        $builder = new MultipartStreamBuilder($this->streamFactory);

        $request = $this->requestFactory
            ->createRequest($methodInfo->method, $this->getUrl($url, $methodInfo->path, $methodInfo->parameters))
            ->withHeader('Authorization', sprintf('Bearer %s', $token));

        foreach ($methodInfo->body as $fieldName => $value) {
            if ($value instanceof StreamInterface) {
                $builder->addResource($fieldName, $value);
            } elseif ($value !== null) {
                if (is_array($value) || is_object($value)) {
                    $builder->addResource(
                        $fieldName,
                        $this->streamFactory->createStream(
                            $this->serializer->serialize($value, 'json'),
                        ),
                        ['headers' => ['Content-Type' => 'application/json']],
                    );
                } else {
                    $builder->addResource($fieldName, $this->streamFactory->createStream($value));
                }
            }
        }

        return $request->withBody($builder->build())
            ->withHeader('Content-Type', 'multipart/form-data; boundary=' . $builder->getBoundary());
    }

    /**
     * @throws \ReflectionException
     */
    private function parseMethod(string $method, array $parameters): MethodInfo
    {
        $httpMethod = 'GET';
        $path = '/';
        $body = null;
        $data = $parameters;
        $returnType = 'mixed';

        $methodReflection = new \ReflectionMethod($method);

        $attributes = $methodReflection->getAttributes();
        foreach ($attributes as $attribute) {
            $attributeInstance = $attribute->newInstance();
            if (!$attributeInstance instanceof Route) {
                continue;
            }
            $httpMethod = $attributeInstance->method;
            $path = $attributeInstance->path;

            $resultParameters = $parameters;
            foreach ($parameters as $key => $value) {
                if ($value instanceof \BackedEnum) {
                    $value = $value->value;
                }
                if (!is_string($value) && !is_int($value)) {
                    continue;
                }

                $path = str_replace('{' . $key . '}', $value, $path, $count);
                if ($count > 0) {
                    unset($resultParameters[$key]);
                }
            }
            $parameters = $resultParameters;

            if ($httpMethod === 'PUT' || $httpMethod === 'POST' || $httpMethod === 'PATCH') {
                if ($attributeInstance->body !== null) {
                    $body = $parameters[$attributeInstance->body];
                    unset($parameters[$attributeInstance->body]);
                    $data = $parameters;
                } else {
                    $body = $parameters;
                    $data = [];
                }
            } else {
                $body = null;
                $data = $parameters;
            }
        }

        $methodReturnType = $methodReflection->getReturnType();
        if ($methodReturnType !== null) {
            if (!$methodReturnType instanceof \ReflectionNamedType) {
                throw new VkOrdException('Return type of API method can not be UnionType or IntersectionType');
            }

            $returnType = $methodReturnType->getName();
        }

        return new MethodInfo($httpMethod, $path, $returnType, $body, array_filter($data));
    }

    private function getUrl(string $url, string $path, array $parameters = []): string
    {
        $url = sprintf('%s/%s', trim($url, '/'), trim($path, '/'));

        if (!empty($parameters)) {
            $url .= '?' . http_build_query($parameters);
        }

        return $url;
    }
}
