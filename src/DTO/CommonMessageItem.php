<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class CommonMessageItem
{
    /**
     * @param string|null $text Текст сообщения
     * @param list<CommonMessageItemField>|null $fields Информация о полях
     */
    public function __construct(
        public ?string $text = null,
        public ?array $fields = null,
    ) {}
}
