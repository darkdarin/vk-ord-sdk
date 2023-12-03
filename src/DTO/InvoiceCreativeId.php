<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные креатива
 */
readonly class InvoiceCreativeId
{
    /**
     * @param string $creative_external_id Внешний идентификатор креатива
     * @param list<InvoicePlatformId>|null $platforms Список рекламных площадок креатива
     */
    public function __construct(
        public string $creative_external_id,
        public ?array $platforms = null,
    ) {}
}
