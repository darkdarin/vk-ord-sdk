<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Информация о вознаграждении посреднику.
 */
readonly class CommissionAmount
{
    /**
     * @param string $excluding_vat Неотрицательная сумма в рублях с копейками без учета налогов.
     * @param string $vat_rate Ставка НДС в процентах.
     * @param string $vat Неотрицательная сумма НДС в рублях с копейками.
     * @param string $including_vat Неотрицательная сумма в рублях с копейками с учетом налогов.
     * @param string|null $serial Серийный номер акта вознаграждения посредника.
     * @param string|null $date Дата выставления акта вознаграждения посредника в формате YYYY-MM-DD в часовом поясе UTC.
     */
    public function __construct(
        public string $excluding_vat,
        public string $vat_rate,
        public string $vat,
        public string $including_vat,
        public ?string $serial = null,
        public ?string $date = null,
    ) {}
}
