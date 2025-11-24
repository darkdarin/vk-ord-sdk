<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Информация о маркировке креатива
 */
readonly class CreativeEridInfo
{
    /**
     * @param string $erid Токен маркировки креатива
     * @param list<CommonMessageItem> $messages Дополнительная информация к ответу
     */
    public function __construct(
        public string $erid,
        public ?array $messages = null,
    ) {}
}
