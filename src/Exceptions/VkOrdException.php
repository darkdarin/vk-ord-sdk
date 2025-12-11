<?php

namespace DarkDarin\VkOrdSdk\Exceptions;

use Argo\RestClient\Exception\ClientException;
use DarkDarin\VkOrdSdk\DTO\Error;
use DarkDarin\VkOrdSdk\DTO\Errors;

/**
 * @api
 */
class VkOrdException extends ClientException
{
    public function __construct(
        private readonly Errors|Error $errors,
        int $responseCode,
    ) {
        parent::__construct((string) $this->errors, $responseCode);
    }

    public function getErrors(): Error|Errors
    {
        return $this->errors;
    }

    public function context(): array
    {
        return [
            'responseCode' => $this->getCode(),
            'errors' => $this->getErrors()->jsonSerialize(),
        ];
    }
}
