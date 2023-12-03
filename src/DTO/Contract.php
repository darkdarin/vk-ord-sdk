<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные договора
 */
readonly class Contract
{
    /**
     * @param ContractTypeEnum $type Тип договора
     * @param string $client_external_id Внешний идентификатор клиента (заказчика)
     * @param string $contractor_external_id Внешний идентификатор подрядчика (исполнителя)
     * @param string $date Дата заключения договора в формате YYYY-MM-DD в часовом поясе UTC
     * @param ContractSubjectTypeEnum $subject_type Предмет договора
     * @param string|null $amount Цена договора в рублях с копейками
     * @param string|null $serial Серийный номер договора
     * @param string|null $comment Комментарий к договору
     * @param ContractActionTypeEnum|null $action_type Осуществляемые действия (посредничество)
     * @param array<ContractFlagEnum>|null $flags Дополнительная информация о договоре
     * @param string|null $parent_contract_external_id Внешний идентификатор родительского договора, в отношении которого выполняются изменения
     * @param string|null $create_date Дата и время создания договора в формате ISO 8601
     */
    public function __construct(
        public ContractTypeEnum $type,
        public string $client_external_id,
        public string $contractor_external_id,
        public string $date,
        public ContractSubjectTypeEnum $subject_type,
        public ?string $amount = null,
        public ?string $serial = null,
        public ?string $comment = null,
        public ?ContractActionTypeEnum $action_type = null,
        public ?array $flags = null,
        public ?string $parent_contract_external_id = null,
        public ?string $create_date = null,
    ) {}
}
