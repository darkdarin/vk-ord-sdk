<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Информация о контрольной сумме медиафайла
 * @api
 */
final readonly class MediaCheckSumInfo
{
    /**
     * @param string $sha256 Хеш SHA256 медиафайла
     */
    public function __construct(
        public string $sha256,
    ) {}
}
