<?php

namespace DarkDarin\VkOrdSdk;

use DarkDarin\VkOrdSdk\Factories\PsrClientFactory;
use DarkDarin\VkOrdSdk\Factories\PsrRequestFactoryFactory;
use DarkDarin\VkOrdSdk\Factories\PsrResponseFactoryFactory;
use DarkDarin\VkOrdSdk\Factories\PsrStreamFactoryFactory;
use DarkDarin\VkOrdSdk\TransportClient\TransportClient;
use DarkDarin\VkOrdSdk\TransportClient\TransportClientInterface;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * @psalm-api
 */
class VkOrdSdkServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes(
            [
                __DIR__ . '/../config/vk_ord.php' => $this->app->configPath('vk_ord.php'),
            ]
        );
    }

    public function register(): void
    {
        $this->app->singleton(ClientInterface::class, (new PsrClientFactory())(...));
        $this->app->singleton(RequestFactoryInterface::class, (new PsrRequestFactoryFactory())(...));
        $this->app->singleton(ResponseFactoryInterface::class, (new PsrResponseFactoryFactory())(...));
        $this->app->singleton(StreamFactoryInterface::class, (new PsrStreamFactoryFactory())(...));
        $this->app->singleton(TransportClientInterface::class, TransportClient::class);
        $this->app->singleton(VkOrd::class, function (Container $container) {
            $url = Config::get('vk_ord.url', 'https://api.ord.vk.com');
            $token = Config::get('vk_ord.token', '');
            $transportClient = $container->get(TransportClientInterface::class);

            return new VkOrd($url, $token, $transportClient);
        });
    }
}
