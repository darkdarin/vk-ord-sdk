<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Информация о списке внешних идентификаторов
 * @api
 */
final readonly class ExternalIdItems
{
    /**
     * @param array<string> $external_ids Список внешних идентификаторов, отсортированный в лексикографическом порядке.
     * @param int $total_items_count Общее количество элементов для выдачи по запросу
     * @param int $limit Количество всех элементов, которые необходимо получить за один запрос
     */
    public function __construct(
        public array $external_ids,
        public int $total_items_count,
        public int $limit,
    ) {}
}
