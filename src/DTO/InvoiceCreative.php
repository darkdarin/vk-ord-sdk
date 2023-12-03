<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные креатива
 */
readonly class InvoiceCreative
{
    /**
     * @param string $creative_external_id Внешний идентификатор креатива
     * @param list<InvoicePlatform> $platforms Список рекламных площадок, на которых показан креатив
     */
    public function __construct(
        public string $creative_external_id,
        public array $platforms,
    ) {}
}
