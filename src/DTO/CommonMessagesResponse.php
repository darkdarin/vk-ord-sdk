<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class CommonMessagesResponse
{
    /**
     * @param list<CommonMessageItem>|null $messages Дополнительная информация к ответу.
     */
    public function __construct(
        public ?array $messages = null,
    ) {
    }
}
