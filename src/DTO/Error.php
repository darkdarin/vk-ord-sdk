<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class Error
{
    public function __construct(
        public string $error,
    ) {}
}
