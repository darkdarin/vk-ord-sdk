<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class CreativeEridList
{
    /**
     * @param list<string>|null $erids Список маркеров рекламы, отсортированный в лексикографическом порядке.
     * @param int|null $total_items_count Общее количество элементов для выдачи по запросу.
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос.
     */
    public function __construct(
        public ?array $erids = null,
        public ?int $total_items_count = null,
        public ?int $limit = null,
    ) {}
}
