<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class StatisticItems
{
    /**
     * @param list<Statistic>|null $items Элементы статистики
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос.
     * @param int|null $total_items_count Общее количество элементов для выдачи по запросу.
     */
    public function __construct(
        public ?array $items = null,
        public ?int $limit = null,
        public ?int $total_items_count = null,
    ) {}
}
