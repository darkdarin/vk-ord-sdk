# vk-ord-sdk
SDK для работы с VK ORD API

Документация API: https://ord.vk.com/help/api/

Swagger-документация: https://ord.vk.com/help/api/swagger/

Данный SDK поддерживает все методы и типы объектов, используемых в API на 24.11.2025

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

## Использование
### Laravel

```php
use Illuminate\Support\Facades\App;
use DarkDarin\VkOrdSdk\VkOrd;

// Получить сконфигурированный клиент можно через DI любым доступным способом
// https://laravel.com/docs/10.x/container
$vkClient = App::make(VkOrd::class);
$contract = $vkClient->getContract('5t33p36p8p-1h57fjo00');
```


### Вызов методов с другим URL или токеном
```php
/** @var \DarkDarin\VkOrdSdk\VkOrd $vkClient **/
$contract = $vkClient->withUrl('https://api-sandbox.ord.vk.com')
    ->withToken('SANDBOX_TOKEN')
    ->getContract('5t33p36p8p-1h57fjo00');
```
