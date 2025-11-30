<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные изначального договора в разаллокации
 * @api
 */
final readonly class InvoiceContractId
{
    /**
     * @param string|null $contract_external_id Внешний идентификатор изначального договора
     * @param string|null $cid Внешний cid
     * @param list<InvoiceCreativeId>|null $creatives Список креативов изначального договора в разаллокации
     */
    public function __construct(
        public ?string $contract_external_id = null,
        public ?string $cid = null,
        public ?array $creatives = null,
    ) {}
}
