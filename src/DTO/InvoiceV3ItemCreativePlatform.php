<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные статистик.
 */
readonly class InvoiceV3ItemCreativePlatform
{
    /**
     * @param string $pad_external_id Внешний идентификатор рекламной площадки.
     * @param int $shows_count Количество показов креатива на рекламной площадке.
     * @param int $invoice_shows_count Оплаченное количество показов креатива на рекламной площадке.
     * @param DetailedAmount $amount Стоимость креатива на рекламной площадке.
     * @param string $amount_per_event Стоимость с НДС (если есть) в рублях одного целевого действия креатива на рекламной площадке.
     * @param string $date_start_planned Запланированная дата начала рекламной кампании в формате YYYY-MM-DD в часовом поясе UTC.
     * @param string $date_end_planned Запланированная дата завершения рекламной кампании в формате YYYY-MM-DD в часовом поясе UTC.
     * @param string $date_start_actual Фактическая дата начала рекламной кампании в формате YYYY-MM-DD в часовом поясе UTC.
     * @param string $date_end_actual Фактическая дата завершения рекламной кампании в формате YYYY-MM-DD в часовом поясе UTC.
     * @param CreativePayTypeEnum $pay_type Модель оплаты показа креатива.
     */
    public function __construct(
        public string $pad_external_id,
        public int $shows_count,
        public int $invoice_shows_count,
        public DetailedAmount $amount,
        public string $amount_per_event,
        public string $date_start_planned,
        public string $date_end_planned,
        public string $date_start_actual,
        public string $date_end_actual,
        public CreativePayTypeEnum $pay_type,
    ) {}
}
