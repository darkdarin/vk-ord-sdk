<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class Statistic
{
    /**
     * @param string|null $external_id Внешний идентификатор статистики.
     * @param string|null $creative_external_id Внешний идентификатор креатива.
     * @param string|null $pad_external_id Внешний идентификатор рекламной площадки.
     * @param int|null $shows_count Количество показов креатива на рекламной площадке.
     * @param string|null $date_start_actual Фактическая дата начала рекламной кампании в формате YYYY-MM-DD в часовом поясе UTC.
     * @param string|null $date_end_actual Фактическая дата завершения рекламной кампании в формате YYYY-MM-DD в часовом поясе UTC.
     */
    public function __construct(
        public ?string $external_id = null,
        public ?string $creative_external_id = null,
        public ?string $pad_external_id = null,
        public ?int $shows_count = null,
        public ?string $date_start_actual = null,
        public ?string $date_end_actual = null,
    ) {}
}
