<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Информация о детализации суммы.
 */
readonly class DetailedAmount
{
    /**
     * @param string $excluding_vat Неотрицательная сумма в рублях с копейками без учета налогов.
     * @param string $vat_rate Ставка НДС в процентах.
     * @param string $vat Неотрицательная сумма НДС в рублях с копейками.
     * @param string $including_vat Неотрицательная сумма в рублях с копейками с учетом налогов.
     */
    public function __construct(
        public string $excluding_vat,
        public string $vat_rate,
        public string $vat,
        public string $including_vat,
    ) {}
}
