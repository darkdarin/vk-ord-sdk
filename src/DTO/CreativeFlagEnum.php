<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Тип рекламного объявления
 */
enum CreativeFlagEnum: string
{
    /**
     * Социальная реклама
     */
    case Social = 'social';
    /**
     * Нативная реклама
     */
    case Native = 'native';
}
