<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class Error implements \JsonSerializable, \Stringable
{
    public function __construct(
        public string $error,
        public ?string $external_id = null,
        public ?int $index = null,
    ) {}

    public function jsonSerialize(): array
    {
        return [
            'error' => $this->error,
            'external_id' => $this->external_id,
            'index' => $this->index,
        ];
    }

    public function __toString(): string
    {
        return $this->error;
    }
}
