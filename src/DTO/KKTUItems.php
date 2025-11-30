<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Результат запроса получения ККТУ
 * @api
 */
final readonly class KKTUItems
{
    /**
     * @param int $total_items_count Общее количество элементов для выдачи по запросу.
     * @param int $limit Количество всех элементов, которые необходимо получить за один запрос.
     * @param list<KKTU> $items Список кодов ККТУ.
     */
    public function __construct(
        public int $total_items_count,
        public int $limit,
        public array $items,
    ) {}
}
