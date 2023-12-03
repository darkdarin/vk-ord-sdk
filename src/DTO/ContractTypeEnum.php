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
     * Договор саморекламы
     */
    case SelfPromotion = 'self_promotion';
    /**
     * Дополнительное соглашение
     */
    case Additional = 'additional';
}
