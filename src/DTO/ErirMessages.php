<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class ErirMessages
{
    /**
     * @param list<ErirMessage> $items Список сообщений об ошибках от ЕРИР с их переводом на запрошенный язык.
     */
    public function __construct(
        public array $items,
    ) {}
}
