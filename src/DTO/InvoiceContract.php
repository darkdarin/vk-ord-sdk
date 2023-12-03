<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные изначального договора в разаллокации
 */
readonly class InvoiceContract
{
    /**
     * @param string $contract_external_id Внешний идентификатор изначального договора
     * @param string $amount Положительная сумма разаллокации изначального договора в рублях с копейками
     * @param list<InvoiceFlagEnum>|null $flags Дополнительная информация об акте
     * @param list<InvoiceCreative>|null $creatives Список креативов изначального договора в разаллокации
     */
    public function __construct(
        public string $contract_external_id,
        public string $amount,
        public ?array $flags = null,
        public ?array $creatives = null,
    ) {}
}
