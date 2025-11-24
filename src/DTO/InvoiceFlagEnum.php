<?php

namespace DarkDarin\VkOrdSdk\DTO;

enum InvoiceFlagEnum: string
{
    /**
     * Сигнализирует о том, что акт имеет свойство социальной рекламы.
     */
    case Social = 'social';
    /**
     * Сигнализирует о том, что акт имеет свойство социальной рекламы по квоте.
     */
    case SocialQuota = 'social_quota';
}
