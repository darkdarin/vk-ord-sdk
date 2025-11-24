<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class ErirMessage
{
    /**
     * @param string $message Сообщение об ошибке от ЕРИР
     * @param string $name Перевод на запрошенный язык
     */
    public function __construct(
        public string $message,
        public string $name,
    ) {}
}
