<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class Error
{
    public function __construct(
        public string $error,
        public ?string $external_id = null,
        public ?int $index = null,
    ) {}
}
