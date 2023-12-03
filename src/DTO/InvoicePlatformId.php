<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Информация о рекламных площадках
 */
readonly class InvoicePlatformId
{
    /**
     * @param string $pad_external_id Внешний идентификатор рекламной площадки
     */
    public function __construct(
        public string $pad_external_id,
    ) {}
}
