<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Информация о сумме акта, включая валюту, сумму и налоговую ставку
 */
readonly class InvoiceDetailedAmount
{
    /**
     * @param DetailedAmount $services Информация о сумме за сервисы.
     * @param CommissionAmount|null $commission Информация о вознаграждении посреднику.
     */
    public function __construct(
        public DetailedAmount $services,
        public ?CommissionAmount $commission = null,
    ) {}
}
