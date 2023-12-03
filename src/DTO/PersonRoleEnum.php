<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Роль контрагента
 */
enum PersonRoleEnum: string
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
}
