<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class StatisticItemsRequest
{
    /**
     * @param list<StatisticRequest>|null $items Элементы статистики
     */
    public function __construct(
        public ?array $items = null,
    ) {}
}
