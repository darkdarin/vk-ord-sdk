# vk-ord-sdk
SDK для работы с VK ORD API

Документация API: https://ord.vk.com/help/api/

Swagger-документация: https://ord.vk.com/help/api/swagger/

Данный SDK поддерживает все методы и типы объектов, используемых в API на 22.09.2024

## Установка и настройка

Для установки пакета выполните команду:

```bash
composer require darkdarin/vk-ord-sdk
```

#### Laravel 10+

Опубликуйте конфигурацию с помощью команды
```bash
php artisan vendor:publish --provider "DarkDarin\VkOrdSdk\VkOrdSdkServiceProvider"
```

#### Hyperf 3.0

Опубликуйте конфигурацию с помощью команды
```bash
php bin/hyperf.php vendor:publish darkdarin/vk-ord-sdk
```

## Использование
### Standalone

```php
use DarkDarin\VkOrdSdk\TransportClient\TransportClient;
use DarkDarin\VkOrdSdk\Factories\PsrClientFactory;
use DarkDarin\VkOrdSdk\Factories\PsrRequestFactoryFactory;
use DarkDarin\VkOrdSdk\Factories\PsrStreamFactoryFactory;
use DarkDarin\Serializer\ApiSerializer\ApiSerializerFactory;
use DarkDarin\Serializer\MethodParametersSerializer\MethodParametersMapper;
use DarkDarin\VkOrdSdk\VkOrd;

$transportClient = new TransportClient(
    (new PsrClientFactory())(),
    (new PsrRequestFactoryFactory())(),
    (new PsrStreamFactoryFactory())(),
    (new ApiSerializerFactory())(),
    new MethodParametersMapper()
);

$vkClient = new VkOrd('https://api.ord.vk.com', 'TOKEN', $transportClient);

$contract = $vkClient->getContract('5t33p36p8p-1h57fjo00');
```

### Laravel

```php
use Illuminate\Support\Facades\App;
use DarkDarin\VkOrdSdk\VkOrd;

// Получить сконфигурированный клиент можно через DI любым доступным способом
// https://laravel.com/docs/10.x/container
$vkClient = App::make(VkOrd::class);
$contract = $vkClient->getContract('5t33p36p8p-1h57fjo00');
```

### Hyperf

```php
use Hyperf\Context\ApplicationContext;
use DarkDarin\VkOrdSdk\VkOrd;

// Получить сконфигурированный клиент можно через DI любым доступным способом
// https://hyperf.wiki/3.0/#/en/di
$vkClient = ApplicationContext::getContainer()->get(VkOrd::class);
$contract = $vkClient->getContract('5t33p36p8p-1h57fjo00');
```


### Вызов методов с другим URL или токеном
```php
/** @var \DarkDarin\VkOrdSdk\VkOrd $vkClient **/
$contract = $vkClient->withUrl('https://api-sandbox.ord.vk.com')
    ->withToken('SANDBOX_TOKEN')
    ->getContract('5t33p36p8p-1h57fjo00');
```
