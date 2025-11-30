<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class CommonMessageItemField
{
    /**
     * @param string|null $field Имя поля
     * @param list<string>|null $values Значение поля в формате json
     */
    public function __construct(
        public ?string $field = null,
        public ?array $values = null,
    ) {}
}
