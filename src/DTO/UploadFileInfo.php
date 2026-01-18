<?php

namespace DarkDarin\VkOrdSdk\DTO;

use Psr\Http\Message\StreamInterface;

/**
 * @api
 */
final readonly class UploadFileInfo
{
    public function __construct(
        public string|StreamInterface $file,
        public ?string $name = null,
    ) {}
}
