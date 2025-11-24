<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class InvoiceAmount
{
    /**
     * @param InvoiceAmountServices $services Информация о сумме за сервисы.
     * @param InvoiceAmountCommission|null $commission Информация о вознаграждении посреднику.
     */
    public function __construct(
        public InvoiceAmountServices $services,
        public ?InvoiceAmountCommission $commission = null,
    ) {}
}
