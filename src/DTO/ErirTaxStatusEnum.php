<?php

namespace DarkDarin\VkOrdSdk\DTO;

enum ErirTaxStatusEnum: string
{
    /** Сбор не начислен */
    case NoTax = 'no_tax';
    /** Сбор рассчитан и будет начислен */
    case Calculated = 'calculated';
    /** Сбор начислен, акт заблокирован для изменений */
    case Blocked = 'blocked';
}
