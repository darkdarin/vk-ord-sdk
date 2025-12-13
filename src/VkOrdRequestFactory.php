<?php

namespace DarkDarin\VkOrdSdk;

use Argo\RestClient\RestMethodDefinition;
use Argo\RestClient\RestRequestFactory;
use Argo\Serializer\JsonEncoder\JsonEncoder;
use Argo\Types\Atomic\ClassType;
use DarkDarin\VkOrdSdk\Attribute\MultipartRequest;
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
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @api
 */
class VkOrdRequestFactory extends RestRequestFactory implements VkOrdRequestFactoryInterface
{
    private string $token = '';

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function makeRequest(RestMethodDefinition $methodDefinition): RequestInterface
    {
        $multipartRequest = $methodDefinition->methodDefinition->attributes->firstByType(MultipartRequest::class);
        if ($multipartRequest !== null) {
            $request = $this->makeMultipartRequest($methodDefinition);
        } else {
            $request = parent::makeRequest($methodDefinition);
        }

        return $request->withHeader('Authorization', sprintf('Bearer %s', $this->token));
    }

    /**
     * @throws \InvalidArgumentException
     */
    private function makeMultipartRequest(RestMethodDefinition $methodDefinition): RequestInterface
    {
        $builder = new MultipartStreamBuilder($this->streamFactory);

        $request = $this->requestFactory
            ->createRequest($methodDefinition->method, $this->getUrl($this->baseUrl, $methodDefinition));

        foreach ($methodDefinition->body as $fieldName => $value) {
            if ($value instanceof StreamInterface) {
                $builder->addResource($fieldName, $value);
            } elseif ($value !== null) {
                if (is_array($value) || is_object($value)) {
                    $builder->addResource(
                        $fieldName,
                        $this->streamFactory->createStream(
                            $this->serializer->serialize($value, JsonEncoder::FORMAT),
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
     * @throws VkOrdException
     * @throws \RuntimeException
     */
    protected function parseError(ResponseInterface $response): void
    {
        $body = $response->getBody()->getContents();

        try {
            $error = $this->serializer->deserialize($body, new ClassType(Error::class), JsonEncoder::FORMAT);
        } catch (\Throwable) {
            try {
                $error = $this->serializer->deserialize($body, new ClassType(Errors::class), JsonEncoder::FORMAT);
            } catch (\Throwable) {
                $error = new Error($response->getReasonPhrase());
            }
        }

        throw match ($response->getStatusCode()) {
            400 => new BadRequestException($error, $response),
            401 => new UnauthorizedException($error, $response),
            403 => new ForbiddenException($error, $response),
            404 => new NotFoundException($error, $response),
            409 => new ConflictException($error, $response),
            410 => new GoneException($error, $response),
            500 => new InternalServerError($error, $response),
            default => new VkOrdException($error, $response),
        };
    }
}
