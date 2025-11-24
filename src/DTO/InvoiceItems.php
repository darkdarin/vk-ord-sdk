<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class InvoiceItems
{
    /**
     * @param list<InvoiceItem> $items Список изначальных договоров в разаллокации
     */
    public function __construct(
        public array $items,
    ) {}
}
