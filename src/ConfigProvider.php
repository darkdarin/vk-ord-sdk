<?php

namespace DarkDarin\VkOrdSdk;

use DarkDarin\VkOrdSdk\Factories\PsrClientFactory;
use DarkDarin\VkOrdSdk\Factories\PsrRequestFactoryFactory;
use DarkDarin\VkOrdSdk\Factories\PsrResponseFactoryFactory;
use DarkDarin\VkOrdSdk\Factories\PsrStreamFactoryFactory;
use DarkDarin\VkOrdSdk\Factories\VkOrdFactory;
use DarkDarin\VkOrdSdk\TransportClient\TransportClient;
use DarkDarin\VkOrdSdk\TransportClient\TransportClientInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * @psalm-api
 */
class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                ClientInterface::class => PsrClientFactory::class,
                RequestFactoryInterface::class => PsrRequestFactoryFactory::class,
                ResponseFactoryInterface::class => PsrResponseFactoryFactory::class,
                StreamFactoryInterface::class => PsrStreamFactoryFactory::class,
                TransportClientInterface::class => TransportClient::class,
                VkOrd::class => VkOrdFactory::class,
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for Vk ORD',
                    'source' => __DIR__ . '/../config/vk_ord.php',
                    'destination' => (defined('BASE_PATH') ? BASE_PATH : '') . '/config/autoload/vk_ord.php',
                ],
            ],

        ];
    }
}
