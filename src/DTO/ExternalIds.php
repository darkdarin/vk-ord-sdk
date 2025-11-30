<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Информация о списке внешних идентификаторов
 * @api
 */
final readonly class ExternalIds
{
    /**
     * @param array<string> $external_ids Список внешних идентификаторов, отсортированный в лексикографическом порядке.
     */
    public function __construct(
        public array $external_ids,
    ) {}
}
