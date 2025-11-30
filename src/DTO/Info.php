<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class Info
{
    /**
     * @param string|null $message
     * @param list<CommonMessageItem>|null $messages Дополнительная информация к ответу.
     */
    public function __construct(
        public ?string $message = null,
        public ?array $messages = null,
    ) {}
}
