<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Тип договора
 */
enum ContractTypeEnum: string
{
    /**
     * Договор оказания услуг
     */
    case Service = 'service';
    /**
     * Посреднический договор
     */
    case Mediation = 'mediation';
    /**
     * Дополнительное соглашение
     */
    case Additional = 'additional';
}
