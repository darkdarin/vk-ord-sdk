<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Вид объекта по работе с рекламой
 */
enum ErirDataTypeEnum: string
{
    /**
     * Контрагент
     */
    case Person = 'person';
    /**
     * Договор
     */
    case Contract = 'contract';
    /**
     * Креатив
     */
    case Creative = 'creative';
    /**
     * Рекламная площадка
     */
    case Pad = 'pad';
    /**
     * Акт
     */
    case Invoice = 'invoice';
}
