<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные акта
 * @api
 */
final readonly class Invoice
{
    /**
     * @param string $contract_external_id Внешний идентификатор договора, к которому добавляется акт
     * @param string $date Дата выставления акта в формате YYYY-MM-DD в часовом поясе UTC
     * @param string $date_start Дата начала периода акта (дата запуска рекламной кампании) в формате YYYY-MM-DD в часовом поясе UTC
     * @param string $date_end Дата окончания периода акта (дата получения чека или формирования бухгалтерского акта) в формате YYYY-MM-DD в часовом поясе UTC
     * @param InvoiceAmount $amount Информация о сумме акта, включая валюту, сумму и налоговую ставку
     * @param InvoiceClientRoleEnum $client_role Роль контрагента: клиента (заказчика) или подрядчика (исполнителя), в которой он выступает в договре, к которому добавляется акт
     * @param InvoiceContractorRoleEnum $contractor_role Роль контрагента: клиента (заказчика) или подрядчика (исполнителя), в которой он выступает в договре, к которому добавляется акт
     * @param ErirTaxStatusEnum $erir_tax_status Статус начисленных сборов к акту.
     * @param list<InvoiceFlagEnum>|null $flags Дополнительная информация об акте.
     * @param string|null $order_contract_external_id Внешний идентификатор договора, по поручению которого заключен договор акта
     * @param string|null $serial Серийный номер акта
     * @param list<InvoiceItem>|null $items Список изначальных договоров в разаллокации
     * @param InvoiceStatusEnum|null $status Статус акта.
     */
    public function __construct(
        public string $contract_external_id,
        public string $date,
        public string $date_start,
        public string $date_end,
        public InvoiceAmount $amount,
        public InvoiceClientRoleEnum $client_role,
        public InvoiceContractorRoleEnum $contractor_role,
        public ErirTaxStatusEnum $erir_tax_status,
        public ?array $flags = null,
        public ?string $order_contract_external_id = null,
        public ?string $serial = null,
        public ?array $items = null,
        public ?InvoiceStatusEnum $status = null,
    ) {}
}
