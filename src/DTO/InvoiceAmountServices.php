<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class InvoiceAmountServices
{
    /**
     * @param string $excluding_vat Неотрицательная сумма в рублях с копейками без учета налогов.
     * @param VatRateEnum $vat_rate Ставка НДС.
     * @param string $vat Неотрицательная сумма НДС в рублях с копейками.
     * @param string $including_vat Неотрицательная сумма в рублях с копейками с учетом налогов.
     */
    public function __construct(
        public string $excluding_vat,
        public VatRateEnum $vat_rate,
        public string $vat,
        public string $including_vat,
    ) {}
}
