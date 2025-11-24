<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Статус проверки в ЕРИР
 */
enum CidErirStatusEnum: string
{
    case New = 'new';
    case Verified = 'verified';
    case Bad = 'bad';
}
