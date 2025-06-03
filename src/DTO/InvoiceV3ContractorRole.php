<?php

namespace DarkDarin\VkOrdSdk\DTO;

enum InvoiceV3ContractorRole: string
{
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
