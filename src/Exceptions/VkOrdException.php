<?php

namespace DarkDarin\VkOrdSdk\Exceptions;

use DarkDarin\VkOrdSdk\DTO\Error;
use DarkDarin\VkOrdSdk\DTO\Errors;

/**
 * @api
 */
class VkOrdException extends \RuntimeException
{
    public function __construct(
        private readonly Errors|Error $errors,
        int $responseCode,
    ) {
        if ($errors instanceof Error) {
            $message = $errors->error;
        } else {
            $message = implode(
                '; ',
                array_map(static fn(Error $error) => $error->error, $errors->items),
            );
        }
        parent::__construct($message, $responseCode);
    }

    public function getErrors(): Error|Errors
    {
        return $this->errors;
    }
}
