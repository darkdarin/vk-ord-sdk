<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Информация о маркировке креатива
 */
readonly class CreativeEridInfo
{
    /**
     * @param string $marker Токен маркировки креатива
     * @param string $erid Токен маркировки креатива
     */
    public function __construct(
        public string $marker,
        public string $erid,
    ) {}
}
