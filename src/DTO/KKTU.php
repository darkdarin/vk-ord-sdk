<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Код ККТУ
 * @api
 */
final readonly class KKTU
{
    /**
     * @param string $code Код ККТУ.
     * @param string $name Описание кода ККТУ в соответствии с языком, на котором описан код ККТУ.
     */
    public function __construct(
        public string $code,
        public string $name,
    ) {}
}
