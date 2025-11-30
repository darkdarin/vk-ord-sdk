<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class InvoiceItem
{
    /**
     * @param Amount|null $amount
     * @param string|null $contract_external_id Внешний идентификатор изначального договора.
     * @param string|null $cid Внешний cid
     * @param list<InvoiceItemCreative>|null $creatives Список креативов изначального договора в разаллокации.
     * @param list<InvoiceFlagEnum>|null $flags Дополнительная информация о договоре из разаллокаций акта.
     */
    public function __construct(
        public ?Amount $amount = null,
        public ?string $contract_external_id = null,
        public ?string $cid = null,
        public ?array $creatives = null,
        public ?array $flags = null,
    ) {}
}
