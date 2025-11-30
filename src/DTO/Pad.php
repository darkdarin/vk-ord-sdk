<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные рекламной площадки
 * @api
 */
final readonly class Pad
{
    /**
     * @param string $person_external_id Внешний идентификатор контрагента, связанного с рекламной площадкой
     * @param bool $is_owner Информация о том, является ли контрагент, переданный в поле person_external_id, владельцем рекламной площадки
     * @param PadTypeEnum $type Тип рекламной площадки
     * @param string $name Название рекламной площадки
     * @param string|null $url URL-адрес рекламной площадки
     * @param string|null $create_date Дата и время создания рекламной площадки в формате ISO 8601
     */
    public function __construct(
        public string $person_external_id,
        public bool $is_owner,
        public PadTypeEnum $type,
        public string $name,
        public ?string $url = null,
        public ?string $create_date = null,
    ) {}
}
