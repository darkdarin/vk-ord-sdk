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
    /**
     * Социальная реклама по квоте
     */
    case SocialQuota = 'social_quota';
}
