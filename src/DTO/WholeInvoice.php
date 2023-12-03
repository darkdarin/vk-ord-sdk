<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные акта
 */
readonly class WholeInvoice
{
    /**
     * @param string $contract_external_id Внешний идентификатор договора, к которому добавляется акт
     * @param string $date Дата выставления акта в формате YYYY-MM-DD в часовом поясе UTC
     * @param string $date_start Дата начала периода акта (дата запуска рекламной кампании) в формате YYYY-MM-DD в часовом поясе UTC
     * @param string $date_end Дата окончания периода акта (дата получения чека или формирования бухгалтерского акта) в формате YYYY-MM-DD в часовом поясе UTC
     * @param string $amount Положительная сумма акта в рублях с копейками
     * @param PersonRoleEnum $client_role Роль контрагента: клиента (заказчика) или подрядчика (исполнителя), в которой он выступает в договре, к которому добавляется акт
     * @param PersonRoleEnum $contractor_role Роль контрагента: клиента (заказчика) или подрядчика (исполнителя), в которой он выступает в договре, к которому добавляется акт
     * @param string|null $serial Серийный номер акта
     * @param list<InvoiceFlagEnum>|null $flags Дополнительная информация об акте
     * @param list<InvoiceContract>|null $items Список изначальных договоров в разаллокации
     */
    public function __construct(
        public string $contract_external_id,
        public string $date,
        public string $date_start,
        public string $date_end,
        public string $amount,
        public PersonRoleEnum $client_role,
        public PersonRoleEnum $contractor_role,
        public ?string $serial = null,
        public ?array $flags = null,
        public ?array $items = null,
    ) {}
}
