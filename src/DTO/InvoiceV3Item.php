<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные изначального договора в разаллокации.
 */
readonly class InvoiceV3Item
{
    /**
     * @param string $contract_external_id Внешний идентификатор изначального договора.
     * @param DetailedAmount $amount Информация о сумме разаллокации по изначальному договору.
     * @param list<InvoiceV3ItemCreative>|null $creatives Список креативов изначального договора в разаллокации.¬
     */
    public function __construct(
        public string $contract_external_id,
        public DetailedAmount $amount,
        public ?array $creatives = null,
    ) {}
}
