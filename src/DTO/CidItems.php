<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Информация о списке внешних cid.
 * @api
 */
final readonly class CidItems
{
    /**
     * @param list<string>|null $cids Список внешних cid, отсортированный в лексикографическом порядке.
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос.
     * @param int|null $total_items_count Общее количество элементов для выдачи по запросу.
     */
    public function __construct(
        public ?array $cids = null,
        public ?int $limit = null,
        public ?int $total_items_count = null,
    ) {}
}
