<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Список объектов по работе с рекламой со статусами обработки от ЕРИР
 */
readonly class ErirStatusItems
{
    /**
     * @param int $total_items_count Общее количество элементов для выдачи по запросу
     * @param int $limit Количество всех элементов, которые необходимо получить за один запрос
     * @param int $limit_per_entity Максимальное количество элементов каждого объекта по работе с рекламой, которые необходимо получить за один запрос
     * @param array<ErirStatus> $items Список объектов по работе с рекламой со статусами обработки от ЕРИР
     */
    public function __construct(
        public int $total_items_count,
        public int $limit,
        public int $limit_per_entity,
        public array $items,
    ) {}
}
