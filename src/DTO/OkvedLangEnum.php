<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Язык, на котором описан код ОКВЭД/ККТУ
 */
enum OkvedLangEnum: string
{
    /**
     * Русский язык
     */
    case Ru = 'ru';
    /**
     * Английский язык
     */
    case En = 'en';
}
