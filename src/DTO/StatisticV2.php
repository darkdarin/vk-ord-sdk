<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные статистик (V2)
 */
readonly class StatisticV2
{
    /**
     * @param string $creative_external_id Внешний идентификатор креатива.
     * @param string $pad_external_id Внешний идентификатор рекламной площадки.
     * @param int $shows_count Количество показов креатива на рекламной площадке.
     * @param string $date_start_actual Фактическая дата начала рекламной кампании в формате YYYY-MM-DD без привязки к часовому поясу.
     * @param string $date_end_actual Фактическая дата завершения рекламной кампании в формате YYYY-MM-DD без привязки к часовому поясу.
     * @param string|null $date_start_planned Запланированная дата начала рекламной кампании в формате YYYY-MM-DD без привязки к часовому поясу. Если не задана - берется из поля date_start_actual
     * @param string|null $date_end_planned Запланированная дата завершения рекламной кампании в формате YYYY-MM-DD без привязки к часовому поясу. Если не задана - берется из поля date_end_actual.
     * @param int|null $invoice_shows_count Оплаченное количество показов креатива на рекламной площадке.
     * @param DetailedAmount|null $amount Неотрицательная сумма, потраченная на показ креатива на рекламной площадке, в рублях.
     * @param string|null $amount_per_event Стоимость в рублях одного целевого действия креатива на рекламной площадке.
     * @param CreativePayTypeEnum|null $pay_type Модель оплаты показа креатива.
     * @param string|null $external_id Внешний идентификатор статистики.
     */
    public function __construct(
        public string $creative_external_id,
        public string $pad_external_id,
        public int $shows_count,
        public string $date_start_actual,
        public string $date_end_actual,
        public ?string $date_start_planned = null,
        public ?string $date_end_planned = null,
        public ?int $invoice_shows_count = null,
        public ?DetailedAmount $amount = null,
        public ?string $amount_per_event = null,
        public ?CreativePayTypeEnum $pay_type = null,
        public ?string $external_id = null,
    ) {}
}
