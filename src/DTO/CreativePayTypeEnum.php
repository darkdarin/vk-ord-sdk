<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Модель оплаты показа креатива
 */
enum CreativePayTypeEnum: string
{
    /**
     * Cost Per Action, цена за действие
     */
    case Cpa = 'cpa';
    /**
     * Cost Per Click, цена за клик
     */
    case Cpc = 'cpc';
    /**
     * Cost Per Millennium, цена за 1 000 показов
     */
    case Cpm = 'cpm';
    /**
     * иное
     */
    case Other = 'other';
}
