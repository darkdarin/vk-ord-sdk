<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class StatisticItemsCreated
{
    /**
     * @param list<string> $external_ids
     */
    public function __construct(
        public array $external_ids
    ) {}
}
