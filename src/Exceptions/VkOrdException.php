<?php

namespace DarkDarin\VkOrdSdk\Exceptions;

use Argo\RestClient\Exception\RestException;
use DarkDarin\VkOrdSdk\DTO\Error;
use DarkDarin\VkOrdSdk\DTO\Errors;
use Psr\Http\Message\ResponseInterface;

/**
 * @api
 */
class VkOrdException extends RestException
{
    public function __construct(
        private readonly Errors|Error $errors,
        ResponseInterface $response,
    ) {
        parent::__construct($response);
    }

    public function getErrors(): Error|Errors
    {
        return $this->errors;
    }

    public function context(): array
    {
        return [
            'responseCode' => $this->getCode(),
            'responseMessage' => $this->getMessage(),
            'errors' => $this->getErrors()->jsonSerialize(),
        ];
    }
}
