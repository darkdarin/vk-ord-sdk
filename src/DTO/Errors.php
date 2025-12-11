<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class Errors implements \JsonSerializable, \Stringable
{
    /**
     * @param list<Error> $items
     */
    public function __construct(
        public array $items,
    ) {}

    public function jsonSerialize(): array
    {
        return array_map(static fn(Error $error) => $error->jsonSerialize(), $this->items);
    }

    public function __toString(): string
    {
        return implode('; ', array_map(static fn(Error $error) => (string) $error, $this->items));
    }
}
