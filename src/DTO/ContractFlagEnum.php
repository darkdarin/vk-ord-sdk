<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Дополнительная информация о договоре
 */
enum ContractFlagEnum: string
{
    /**
     * НДС включён в сумму договора
     */
    case VatIncluded = 'vat_included';
    /**
     * Подрядчик обязуется вести учёт креативов
     */
    case ContractorIsCreativesReporter = 'contractor_is_creatives_reporter';
    /**
     * Деньги поступают от подрядчика (исполнителя) клиенту (заказчику)
     */
    case AgentActingForPublisher = 'agent_acting_for_publisher';
}
