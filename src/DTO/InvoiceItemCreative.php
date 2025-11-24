<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class InvoiceItemCreative
{
    /**
     * @param string|null $creative_external_id
     * @param list<InvoiceItemPlatform>|null $platforms
     */
    public function __construct(
        public ?string $creative_external_id = null,
        public ?array $platforms = null,
    ) {}
}
