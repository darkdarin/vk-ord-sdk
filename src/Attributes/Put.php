<?php

namespace DarkDarin\VkOrdSdk\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
readonly class Put extends Route
{
    public function __construct(string $path, ?string $body = null)
    {
        parent::__construct('PUT', $path, $body);
    }
}
