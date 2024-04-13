<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class CreativeEridExternalId
{
    /**
     * @param string $erid Маркер рекламы
     * @param string $external_id Внешний идентификатор креатива
     */
    public function __construct(
        public string $erid,
        public string $external_id,
    ) {}
}
