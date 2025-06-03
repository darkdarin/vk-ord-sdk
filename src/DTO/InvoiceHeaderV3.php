<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные акта (v3) (без договоров)
 */
readonly class InvoiceHeaderV3
{
    /**
     * @param string $contract_external_id Внешний идентификатор договора, к которому добавляется акт
     * @param string $date Дата выставления акта в формате YYYY-MM-DD в часовом поясе UTC
     * @param string $date_start Дата начала периода акта (дата запуска рекламной кампании) в формате YYYY-MM-DD в часовом поясе UTC
     * @param string $date_end Дата окончания периода акта (дата получения чека или формирования бухгалтерского акта) в формате YYYY-MM-DD в часовом поясе UTC
     * @param InvoiceDetailedAmount $amount Информация о сумме акта, включая валюту, сумму и налоговую ставку
     * @param InvoiceV3PersonRole $client_role Роль контрагента: клиента (заказчика) или подрядчика (исполнителя), в которой он выступает в договре, к которому добавляется акт
     * @param InvoiceV3ContractorRole $contractor_role Роль контрагента: клиента (заказчика) или подрядчика (исполнителя), в которой он выступает в договре, к которому добавляется акт
     * @param string|null $order_contract_external_id Внешний идентификатор договора, по поручению которого заключен договор акта
     * @param string|null $serial Серийный номер акта
     */
    public function __construct(
        public string $contract_external_id,
        public string $date,
        public string $date_start,
        public string $date_end,
        public InvoiceDetailedAmount $amount,
        public InvoiceV3PersonRole $client_role,
        public InvoiceV3ContractorRole $contractor_role,
        public ?string $order_contract_external_id = null,
        public ?string $serial = null,
    ) {}
}
