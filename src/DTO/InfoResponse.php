<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class InfoResponse
{
    /**
     * @param list<Info> $info
     */
    public function __construct(
        public array $info = [],
    ) {}
}
