<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Код ОКВЭД
 */
readonly class Okved
{
    /**
     * @param string $code Код ОКВЭД.
     * @param string $name Описание кода ОКВЭД в соответствии с языком, на котором описан код ОКВЭД.
     */
    public function __construct(
        public string $code,
        public string $name,
    ) {}
}
