<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Список изначальных договоров в разаллокации
 */
readonly class InvoiceV3Items
{
    /**
     * @param list<InvoiceV3Item> $items Список изначальных договоров в разаллокации
     */
    public function __construct(
        public array $items,
    ) {}
}
