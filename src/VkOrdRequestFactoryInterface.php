<?php

namespace DarkDarin\VkOrdSdk;

use Argo\RestClient\RestRequestFactoryInterface;

interface VkOrdRequestFactoryInterface extends RestRequestFactoryInterface
{
    public function setToken(string $token): void;
}
