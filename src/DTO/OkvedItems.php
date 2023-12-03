<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Результат запроса получения окведов
 */
readonly class OkvedItems
{
    /**
     * @param int $total_items_count Общее количество элементов для выдачи по запросу.
     * @param int $limit Количество всех элементов, которые необходимо получить за один запрос.
     * @param list<Okved> $items Список кодов ОКВЭД.
     */
    public function __construct(
        public int $total_items_count,
        public int $limit,
        public array $items,
    ) {}
}
