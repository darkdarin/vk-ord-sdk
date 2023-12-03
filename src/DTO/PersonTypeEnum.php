<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Тип контрагента
 */
enum PersonTypeEnum: string
{
    case Physical = 'physical';
    case Juridical = 'juridical';
    case Ip = 'ip';
    case ForeignPhysical = 'foreign_physical';
    case ForeignJuridical = 'foreign_juridical';
}
