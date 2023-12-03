<?php

namespace DarkDarin\VkOrdSdk\Factories;

use DarkDarin\VkOrdSdk\TransportClient\TransportClientInterface;
use DarkDarin\VkOrdSdk\VkOrd;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Contract\ContainerInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class VkOrdFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): VkOrd
    {
        $config = $container->get(ConfigInterface::class);

        $url = $config->get('vk_ord.url', 'https://api.ord.vk.com');
        $token = $config->get('vk_ord.token', '');
        $transportClient = $container->get(TransportClientInterface::class);

        return new VkOrd($url, $token, $transportClient);
    }
}
