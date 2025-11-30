<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class InvoiceItemPlatform
{
    /**
     * @param Amount $amount Cумма, потраченная на показ креатива на рекламной площадке.
     * @param string $pad_external_id Внешний идентификатор рекламной площадки.
     * @param int $shows_count Количество показов креатива на рекламной площадке.
     * @param int $invoice_shows_count Оплаченное количество показов креатива на рекламной площадке.
     * @param string $amount_per_event Стоимость в рублях одного целевого действия креатива на рекламной площадке.
     * @param string $date_start_planned Запланированная дата начала рекламной кампании в формате YYYY-MM-DD без привязки к часовому поясу.
     * @param string $date_end_planned Запланированная дата завершения рекламной кампании в формате YYYY-MM-DD без привязки к часовому поясу.
     * @param string $date_start_actual Фактическая дата начала рекламной кампании в формате YYYY-MM-DD без привязки к часовому поясу.
     * @param string $date_end_actual Фактическая дата завершения рекламной кампании в формате YYYY-MM-DD без привязки к часовому поясу.
     * @param CreativePayTypeEnum $pay_type Модель оплаты показа креатива.
     */
    public function __construct(
        public Amount $amount,
        public string $pad_external_id,
        public int $shows_count,
        public int $invoice_shows_count,
        public string $amount_per_event,
        public string $date_start_planned,
        public string $date_end_planned,
        public string $date_start_actual,
        public string $date_end_actual,
        public CreativePayTypeEnum $pay_type,
    ) {}
}
