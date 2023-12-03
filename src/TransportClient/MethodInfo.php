<?php

namespace DarkDarin\VkOrdSdk\TransportClient;

readonly class MethodInfo
{
    public function __construct(
        public string $method,
        public string $path,
        public string|ArrayOf $returnType,
        public mixed $body = null,
        public array $parameters = [],
    ) {}
}
