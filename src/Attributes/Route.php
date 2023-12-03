<?php

namespace DarkDarin\VkOrdSdk\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
abstract readonly class Route
{
    public function __construct(
        public string $method,
        public string $path,
        public ?string $body = null,
    ) {}
}
