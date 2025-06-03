<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные креатива изначального договора в разаллокации.
 */
readonly class InvoiceV3ItemCreative
{
    /**
     * @param string $creative_external_id Внешний идентификатор креатива.
     * @param list<InvoiceV3ItemCreativePlatform>|null $platforms Список рекламных площадок, на которых показан креатив.
     */
    public function __construct(
        public string $creative_external_id,
        public ?array $platforms = null,
    ) {}
}
