<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class Errors
{
    /**
     * @param list<Error> $items
     */
    public function __construct(
        public array $items,
    ) {}
}
