<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class InvoiceList
{
    /**
     * @param array|null $external_ids Список внешних идентификаторов актов, отсортированный в лексикографическом порядке.
     * @param int|null $total_items_count Общее количество элементов для выдачи по запросу.
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос.
     */
    public function __construct(
        public ?array $external_ids = null,
        public ?int $total_items_count = null,
        public ?int $limit = null,
    ) {}
}
