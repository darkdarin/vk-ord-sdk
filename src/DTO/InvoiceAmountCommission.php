<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class InvoiceAmountCommission
{
    /**
     * @param string $excluding_vat Неотрицательная сумма в рублях с копейками без учета налогов.
     * @param VatRateEnum $vat_rate Ставка НДС.
     * @param string $vat Неотрицательная сумма НДС в рублях с копейками.
     * @param string $including_vat Неотрицательная сумма в рублях с копейками с учетом налогов.
     * @param string|null $serial Серийный номер акта вознаграждения посредника.
     * @param string|null $date Дата выставления акта вознаграждения посредника в формате YYYY-MM-DD без привязки к часовому поясу.
     */
    public function __construct(
        public string $excluding_vat,
        public VatRateEnum $vat_rate,
        public string $vat,
        public string $including_vat,
        public ?string $serial = null,
        public ?string $date = null,
    ) {}
}
