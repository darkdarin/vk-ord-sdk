<?php

namespace DarkDarin\VkOrdSdk;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

/**
 * @psalm-api
 */
class VkOrdSdkServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(VkOrdRequestFactoryInterface::class, function (Container $container) {
            $requestFactory = $container->make(VkOrdRequestFactory::class);
            $requestFactory->setUrl(Config::get('vk_ord.url', 'https://api.ord.vk.com'));
            $requestFactory->setToken(Config::get('vk_ord.token', ''));

            return $requestFactory;
        });
    }

    public function boot(): void
    {
        $this->publishes(
            [
                __DIR__ . '/../config/vk_ord.php' => $this->app->configPath('vk_ord.php'),
            ],
        );
    }
}
