<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Информация о медиафайле
 */
readonly class Media
{
    /**
     * @param string $filename Имя медиафайла
     * @param string $sha256 Хеш SHA256 медиафайла
     * @param string $create_date Дата и время создания медиафайла в формате ISO 8601
     * @param int $size Размер медиафайла в байтах
     * @param string $content_type MIME тип медиафайла
     * @param string|null $description Описание файла
     */
    public function __construct(
        public string $filename,
        public string $sha256,
        public string $create_date,
        public int $size,
        public string $content_type,
        public ?string $description = null,
    ) {}
}
