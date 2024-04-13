<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class CreativeEridExternalIdsList
{
    /**
     * @param list<CreativeEridExternalId>|null $items Список пар маркеров рекламы и внешних идентификаторов креативов, отсортированный по внешнему идентификатору в лексикографическом порядке.
     * @param int|null $total_items_count Общее количество элементов для выдачи по запросу.
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос.
     */
    public function __construct(
        public ?array $items = null,
        public ?int $total_items_count = null,
        public ?int $limit = null,
    ) {}
}
