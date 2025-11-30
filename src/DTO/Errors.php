<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class Errors
{
    /**
     * @param list<Error> $items
     */
    public function __construct(
        public array $items,
    ) {}
}
