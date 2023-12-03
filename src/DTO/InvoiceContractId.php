<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные изначального договора в разаллокации
 */
readonly class InvoiceContractId
{
    /**
     * @param string $contract_external_id Внешний идентификатор изначального договора
     * @param list<InvoiceCreativeId>|null $creatives Список креативов изначального договора в разаллокации
     */
    public function __construct(
        public string $contract_external_id,
        public ?array $creatives = null,
    ) {}
}
