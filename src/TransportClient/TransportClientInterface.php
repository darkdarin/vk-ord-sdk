<?php

namespace DarkDarin\VkOrdSdk\TransportClient;

interface TransportClientInterface
{
    /**
     * @template TObject of object
     * @template TType of string|class-string<TObject>
     * @param string $url
     * @param string $token
     * @param string $method
     * @param array $parameters
     * @param bool $multipart
     * @psalm-return (TType is class-string<TObject> ? TObject : mixed)
     * @return mixed
     */
    public function send(
        string $url,
        string $token,
        string $method,
        array $parameters,
        bool $multipart = false,
    ): mixed;
}
