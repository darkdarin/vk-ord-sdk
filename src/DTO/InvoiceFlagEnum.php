<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Дополнительная информация об акте.
 *
 */
enum InvoiceFlagEnum: string
{
    /**
     * НДС включён в сумму акта.
     */
    case VatIncluded = 'vat_included';
}
