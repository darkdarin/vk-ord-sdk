<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Роль подрядчика (исполнителя) в договоре, к которому добавляется акт
 */
enum InvoiceContractorRoleEnum: string
{
    /**
     * Рекламодатель
     */
    case Advertiser = 'advertiser';
    /**
     * Рекламное агентство
     */
    case Agency = 'agency';
    /**
     * Оператор рекламной системы
     */
    case Ors = 'ors';
    /**
     * Издатель, рекламораспространитель
     */
    case Publisher = 'publisher';
    /**
     * Посредник
     */
    case Mediator = 'mediator';
}
