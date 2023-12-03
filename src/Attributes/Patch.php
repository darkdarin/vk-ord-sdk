<?php

namespace DarkDarin\VkOrdSdk\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
readonly class Patch extends Route
{
    public function __construct(string $path, ?string $body = null)
    {
        parent::__construct('PATCH', $path, $body);
    }
}
