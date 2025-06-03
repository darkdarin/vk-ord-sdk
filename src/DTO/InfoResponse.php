<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class InfoResponse
{
    /**
     * @param list<Info> $info
     */
    public function __construct(
        public array $info = [],
    ) {}
}
