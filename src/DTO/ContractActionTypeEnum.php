<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Осуществляемые действия (посредничество)
 */
enum ContractActionTypeEnum: string
{
    /**
     * Распространение рекламы
     */
    case Distribution = 'distribution';
    /**
     * Заключение договоров
     */
    case Conclude = 'conclude';
    /**
     * Коммерческое представительство
     */
    case Commercial = 'commercial';
    /**
     * Иное
     */
    case Other = 'other';
}
