<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Объект рекламы с информацией о статусах
 */
readonly class ErirStatus
{
    /**
     * @param ErirStatusEnum $erir_status Статус обработки объекта по работе с рекламой от ЕРИР
     * @param string $updated_by_user_ts Дата и время последнего обновления объекта по работе с рекламой в ОРД VK в формате ISO 8601
     * @param ErirDataTypeEnum|null $data_type Виды объектов по работе с рекламой, по которым выполняется фильтрация выдачи
     * @param string|null $external_id Внешний идентификатор объекта по работе с рекламой
     * @param string|null $finalized_ts Дата и время окончания обработки объекта по работе с рекламой в формате ISO 8601
     * @param array<string>|null $messages Список ошибок о статусе обработки объекта по работе с рекламой от ЕРИР. Поле возвращается, если поле erir_status имеет значение bad
     */
    public function __construct(
        public ErirStatusEnum $erir_status,
        public string $updated_by_user_ts,
        public ?ErirDataTypeEnum $data_type = null,
        public ?string $external_id = null,
        public ?string $finalized_ts = null,
        public ?array $messages = null,
    ) {}
}
