<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class StatisticItemsRequest
{
    /**
     * @param list<StatisticRequest>|null $items Элементы статистики
     */
    public function __construct(
        public ?array $items = null,
    ) {}
}
