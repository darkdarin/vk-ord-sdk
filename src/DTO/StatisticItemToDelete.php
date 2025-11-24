<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class StatisticItemToDelete
{
    /**
     * @param string|null $creative_external_id Внешний идентификатор креатива.
     * @param string|null $pad_external_id Внешний идентификатор рекламной площадки.
     * @param string|null $date_start_actual Фактическая дата начала рекламной кампании в формате YYYY-MM-DD без привязки к часовому поясу.
     */
    public function __construct(
        public ?string $creative_external_id = null,
        public ?string $pad_external_id = null,
        public ?string $date_start_actual = null,
    ) {}
}
