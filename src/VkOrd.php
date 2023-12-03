<?php

namespace DarkDarin\VkOrdSdk;

use DarkDarin\VkOrdSdk\Attributes\Delete;
use DarkDarin\VkOrdSdk\Attributes\Get;
use DarkDarin\VkOrdSdk\Attributes\Patch;
use DarkDarin\VkOrdSdk\Attributes\Post;
use DarkDarin\VkOrdSdk\Attributes\Put;
use DarkDarin\VkOrdSdk\DTO\Contract;
use DarkDarin\VkOrdSdk\DTO\Creative;
use DarkDarin\VkOrdSdk\DTO\CreativeEridInfo;
use DarkDarin\VkOrdSdk\DTO\ErirDataTypeEnum;
use DarkDarin\VkOrdSdk\DTO\ErirStatus;
use DarkDarin\VkOrdSdk\DTO\ErirStatusEnum;
use DarkDarin\VkOrdSdk\DTO\ErirStatusItems;
use DarkDarin\VkOrdSdk\DTO\ExternalIdItems;
use DarkDarin\VkOrdSdk\DTO\Invoice;
use DarkDarin\VkOrdSdk\DTO\InvoiceContract;
use DarkDarin\VkOrdSdk\DTO\InvoiceContractId;
use DarkDarin\VkOrdSdk\DTO\Media;
use DarkDarin\VkOrdSdk\DTO\MediaCheckSumInfo;
use DarkDarin\VkOrdSdk\DTO\OkvedItems;
use DarkDarin\VkOrdSdk\DTO\OkvedLangEnum;
use DarkDarin\VkOrdSdk\DTO\Pad;
use DarkDarin\VkOrdSdk\DTO\Person;
use DarkDarin\VkOrdSdk\DTO\WholeInvoice;
use DarkDarin\VkOrdSdk\Exceptions\BadRequestException;
use DarkDarin\VkOrdSdk\Exceptions\ConflictException;
use DarkDarin\VkOrdSdk\Exceptions\InternalServerError;
use DarkDarin\VkOrdSdk\Exceptions\NotFoundException;
use DarkDarin\VkOrdSdk\Exceptions\UnauthorizedException;
use DarkDarin\VkOrdSdk\TransportClient\TransportClientInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @psalm-api
 */
class VkOrd
{
    public function __construct(
        private string $url,
        private string $token,
        private readonly TransportClientInterface $client,
    ) {}

    public function withUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Метод получает список внешних идентификаторов контрагентов.
     *
     * @link https://ord.vk.com/help/api/swagger/#/person/v1-get-person-list
     *
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос
     * @return ExternalIdItems Информация о списке внешних идентификаторов контрагентов
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v1/person')]
    public function getPersonList(int $offset = null, int $limit = null): ExternalIdItems
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод создаёт или обновляет данные контрагента
     *
     * @link https://ord.vk.com/help/api/swagger/#/person/v1-create-person
     *
     * @param string $external_id Внешний идентификатор контрагента
     * @param Person $person Данные контрагента
     * @return bool
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws ConflictException
     */
    #[Put('/v1/person/{external_id}')]
    public function setPerson(string $external_id, Person $person): bool
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Получить данные контрагента.
     *
     * @link https://ord.vk.com/help/api/swagger/#/person/v1-get-person
     *
     * @param string $external_id Внешний идентификатор контрагента
     * @return Person
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v1/person/{external_id}', 'person')]
    public function getPerson(string $external_id): Person
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод получает список внешних идентификаторов договоров.
     *
     * @link https://ord.vk.com/help/api/swagger/#/contract/v1-get-contract-list
     *
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос
     * @return ExternalIdItems Информация о списке внешних идентификаторов договоров
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v1/contract')]
    public function getContractList(int $offset = null, int $limit = null): ExternalIdItems
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод создаёт или обновляет данные договора. Если договор с переданным идентификатором:
     * - Не существует, метод создаст договор.
     * - Существует, метод обновит данные договора.
     *
     * @link https://ord.vk.com/help/api/swagger/#/contract/v1-create-contract
     *
     * @param string $external_id Внешний идентификатор договора
     * @param Contract $contract Данные договора
     * @return bool
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Одна из сторон договора не найдена
     * @throws ConflictException
     */
    #[Put('/v1/contract/{external_id}', 'contract')]
    public function setContract(string $external_id, Contract $contract): bool
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод получает данные договора.
     *
     * @link https://ord.vk.com/help/api/swagger/#/contract/v1-get-contract
     *
     * @param string $external_id Внешний идентификатор договора
     * @return Contract Данные договора
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Get('/v1/contract/{external_id}')]
    public function getContract(string $external_id): Contract
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод получает список внешних идентификаторов рекламных площадок.
     *
     * @link https://ord.vk.com/help/api/swagger/#/pad/v1-get-pad-list
     *
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос
     * @return ExternalIdItems Информация о списке внешних идентификаторов рекламных площадок
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v1/pad')]
    public function getPadList(int $offset = null, int $limit = null): ExternalIdItems
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод создаёт или обновляет рекламную площадку. Если рекламная площадка с переданным идентификатором:
     * - Не существует, метод создаст рекламную площадку.
     * - Существует, метод обновит данные рекламной площадки.
     *
     * @link https://ord.vk.com/help/api/swagger/#/pad/v1-create-pad
     *
     * @param string $external_id Внешний идентификатор рекламной площадки
     * @param Pad $pad Данные рекламной площадки
     * @return bool
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Владелец рекламной площадки не найден
     */
    #[Put('/v1/pad/{external_id}', 'pad')]
    public function setPad(string $external_id, Pad $pad): bool
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод получает данные рекламной площадки.
     *
     * @link https://ord.vk.com/help/api/swagger/#/pad/v1-get-pad
     *
     * @param string $external_id Внешний идентификатор рекламной площадки
     * @return Pad Данные рекламной площадки
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Get('/v1/pad/{external_id}')]
    public function getPad(string $external_id): Pad
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод получает список внешних идентификаторов креативов.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v1-get-creative-list
     *
     * @param int|null $offset Количество всех элементов, которые необходимо получить за один запрос
     * @param int|null $limit Количество элементов выдачи, которые необходимо пропустить в запросе
     * @return ExternalIdItems Информация о списке внешних идентификаторов креативов
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v1/creative')]
    public function getCreativeList(int $offset = null, int $limit = null): ExternalIdItems
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод создаёт или обновляет данные креатива. Если креатив с переданным идентификатором:
     * - Не существует, метод создаст креатив.
     * - Существует, метод обновит данные креатива.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v2-create-creative
     *
     * @param string $external_id Внешний идентификатор креатива
     * @param Creative $creative Данные креатива
     * @return CreativeEridInfo Информация о маркировке креатива
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Внешний идентификатор изначального договора не найден
     */
    #[Put('/v2/creative/{external_id}', 'creative')]
    public function setCreative(string $external_id, Creative $creative): CreativeEridInfo
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод получает данные креатива
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v2-get-creative
     *
     * @param string $external_id Внешний идентификатор креатива
     * @return Creative Данные креатива
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v2/creative/{external_id}')]
    public function getCreative(string $external_id): Creative
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод добавляет тексты в креатив.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v1-add-texts-to-creative
     *
     * @param string $external_id Внешний идентификатор креатива
     * @param list<string> $texts Список текстов креатива.
     * @return CreativeEridInfo Информация о маркировке креатива
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Post('/v2/creative/{external_id}/add_text')]
    public function addTextToCreative(string $external_id, array $texts): CreativeEridInfo
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод добавляет URL-адреса на внешние ресурсы в креатив.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v1-add-external-urls-to-creative
     *
     * @param string $external_id Внешний идентификатор креатива
     * @param list<string> $media_urls Список URL-адресов на внешние ресурсы, используемые в креативе
     * @return CreativeEridInfo Информация о маркировке креатива
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Post('/v2/creative/{external_id}/add_external_media')]
    public function addExternalMediaToCreative(string $external_id, array $media_urls): CreativeEridInfo
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод добавляет медиафайлы в креатив.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v1-add-media-to-creative
     *
     * @param string $external_id Внешний идентификатор креатива
     * @param list<string> $media_external_ids Список внешних идентификаторов медиафайлов, используемых в креативе
     * @return CreativeEridInfo Информация о маркировке креатива
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Внешние идентификаторы креатива или медиафайлов не найдены
     */
    #[Post('/v2/creative/{external_id}/add_media')]
    public function addMediaToCreative(string $external_id, array $media_external_ids): CreativeEridInfo
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод загружает медиафайл в ОРД VK.
     * Максимальный размер медиафайла — 256 Мб.
     *
     * @link https://ord.vk.com/help/api/swagger/#/media/v1-upload-media
     *
     * @param string $external_id Внешний идентификатор медиафайла
     * @param StreamInterface $media_file Загружаемый файл
     * @param string $description Описание файла
     * @return MediaCheckSumInfo Информация о контрольной сумме медиафайла
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws ConflictException Медиафайл с переданным external_id существует
     */
    #[Put('/v1/media/{external_id}')]
    public function uploadMedia(
        string $external_id,
        StreamInterface $media_file,
        string $description
    ): MediaCheckSumInfo {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args(), true);
    }

    /**
     * Метод получает бинарное представление медиафайла.
     *
     * @link https://ord.vk.com/help/api/swagger/#/media/v1-get-binary-media
     *
     * @param string $external_id Внешний идентификатор медиафайла
     * @return StreamInterface Медиафайл
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Get('/v1/media/{external_id}')]
    public function getMedia(string $external_id): StreamInterface
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод получает данные медиафайла.
     *
     * @link https://ord.vk.com/help/api/swagger/#/media/v1-get-media-data
     *
     * @param string $external_id Внешний идентификатор медиафайла
     * @return Media Информация о медиафайле
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Get('/v1/media/{external_id}/info')]
    public function getMediaInfo(string $external_id): Media
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод создаёт или обновляет данные акта с информацией о разаллокации по изначальным договорам.
     * Изначальные договоры связаны с показами креативов на разных рекламных площадках.
     * Если акт с переданным идентификатором:
     * - Не существует, метод создаст акт.
     * - Существует, метод обновит данные акта.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v1-create-whole-invoice
     *
     * @param string $external_id Внешний идентификатор акта
     * @param WholeInvoice $invoice Данные акта
     * @return bool
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Изначальный договор в разаллокации не найден
     */
    #[Put('/v1/invoice/{external_id}', 'invoice')]
    public function setWholeInvoice(string $external_id, WholeInvoice $invoice): bool
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Получить данные акта.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v1-get-invoice
     *
     * @param string $external_id Внешний идентификатор акта
     * @return WholeInvoice Данные акта
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v1/invoice/{external_id}')]
    public function getInvoice(string $external_id): WholeInvoice
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод создаёт или обновляет данные акта без передачи информации о разаллокации по изначальным договорам.
     * Изначальные договоры связаны с показами креативов на разных рекламных площадках.
     * Если акт с переданным идентификатором:
     * - Не существует, метод создаст акт.
     * - Существует, метод обновит данные акта.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v2-create-invoice
     *
     * @param string $external_id Внешний идентификатор акта
     * @param Invoice $invoice
     * @return bool
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Договор, к которому добавляется акт, не найден
     */
    #[Put('/v2/invoice/{external_id}/header', 'invoice')]
    public function setInvoice(string $external_id, Invoice $invoice): bool
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод удаляет креатив и рекламные площадки из изначального договора в разаллокации акта.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v1-delete-creative-from-contract
     *
     * @param string $external_id Внешний идентификатор акта
     * @param string $contract_external_id Внешний идентификатор изначального договора в разаллокации акта
     * @param string $creative_external_id Внешний идентификатор креатива, добавленного к изначальному договору в разаллокации
     * @return bool
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Креатив не найден
     */
    #[Delete('/v1/invoice/{external_id}/{contract_external_id}/{creative_external_id}')]
    public function deleteCreativeFromInvoice(
        string $external_id,
        string $contract_external_id,
        string $creative_external_id
    ): bool {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод удаляет изначальный договор в разаллокации из акта.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v1-delete-contract-from-invoice
     *
     * @param string $external_id Внешний идентификатор акта
     * @param string $contract_external_id Внешний идентификатор изначального договора в разаллокации акта
     * @return bool
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Изначальный договор в разаллокации не найден
     */
    #[Delete('/v1/invoice/{external_id}/{contract_external_id}')]
    public function deleteContractFromInvoice(string $external_id, string $contract_external_id): bool
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод добавляет информацию о разаллокации по изначальным договорам в акт.
     * Изначальные договоры связаны с показами креативов на разных рекламных площадках.
     * Чтобы отправить обновлённый акт в ЕРИР, вызовите метод Отправить акт в ЕРИР.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v2-add-contracts-to-invoice
     *
     * @param string $external_id Внешний идентификатор акта
     * @param list<InvoiceContract> $items Список изначальных договоров в разаллокации.
     * @return bool
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Акт, изначальный договор в разаллокации, креатив или рекламная площадка не найдены
     */
    #[Patch('/v2/invoice/{external_id}/items')]
    public function addContractsToInvoice(string $external_id, array $items): bool
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод удаляет изначальные договоры, креативы и рекламные площадки из акта.
     * Чтобы отправить обновлённый акт в ЕРИР, вызовите метод Отправить акт в ЕРИР.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v2-delete-contracts-from-invoice
     *
     * @param string $external_id Внешний идентификатор акта
     * @param list<InvoiceContractId> $items Данные изначальных договоров
     * @return bool
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Post('/v2/invoice/{external_id}/delete')]
    public function deleteContractsFromInvoice(string $external_id, array $items): bool
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     *  Метод отправляет акт в ЕРИР.
     *  Вызов метода необходим, если вы создали акты или добавили в них данные с помощью методов:
     *  - Создать акт.
     *  - Добавить договоры в акт.
     *  - Удалить договоры из акта.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v2-send-invoice-to-erir
     *
     * @param string $external_id Внешний идентификатор акта
     * @return bool
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Post('/v2/invoice/{external_id}/ready')]
    public function invoiceReady(string $external_id): bool
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод получает статус обработки объекта по работе с рекламой от ЕРИР.
     *
     * @link https://ord.vk.com/help/api/swagger/#/erir_status/v1-get-object-processing-status
     *
     * @param ErirDataTypeEnum $data_type Вид объекта по работе с рекламой
     * @param string $external_id Внешний идентификатор объекта по работе с рекламой
     * @return ErirStatus
     *
     * @throws UnauthorizedException
     * @throws InternalServerError
     */
    #[Get('/v1/{data_type}/{external_id}/erir_status')]
    public function getErirStatus(ErirDataTypeEnum $data_type, string $external_id): ErirStatus
    {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод получает статус обработки объектов по работе с рекламой от ЕРИР.
     *
     * @link https://ord.vk.com/help/api/swagger/#/erir_status/v1-get-ad-object-processing-status
     *
     * @param ErirDataTypeEnum|null $data_type Объекты по работе с рекламой, по которым выполняется фильтрация выдачи
     * @param ErirStatusEnum|null $erir_status Статусы обработки от ЕРИР, по которым выполняется фильтрация выдачи
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос
     * @param int|null $limit_per_entity Максимальное количество элементов каждого объекта по работе с рекламой, которые необходимо получить за один запрос
     * @param list<string>|null $external_id Список внешних идентификаторов объектов по работе с рекламой, статусы обработки которых необходимо получить
     * @return ErirStatusItems
     *
     * @throws UnauthorizedException
     * @throws InternalServerError
     */
    #[Get('/v1/erir_statuses')]
    public function getErirStatuses(
        ErirDataTypeEnum $data_type = null,
        ErirStatusEnum $erir_status = null,
        int $offset = null,
        int $limit = null,
        int $limit_per_entity = null,
        array $external_id = null,
    ): ErirStatusItems {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }

    /**
     * Метод получает коды ОКВЭД, которые поддерживаются в ОРД VK.
     *
     * @param string|null $search Фраза, по которой фильтруется выдача запроса. Поиск выполняется в соответствии с языком, на котором описан код ОКВЭД
     * @param OkvedLangEnum|null $lang Язык, на котором описан код ОКВЭД
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос
     * @return OkvedItems
     *
     * @throws BadRequestException
     * @throws InternalServerError
     */
    #[Get('/v1/dict/okved')]
    public function getOkvedDictionary(
        string $search = null,
        OkvedLangEnum $lang = null,
        int $offset = null,
        int $limit = null,
    ): OkvedItems {
        return $this->client->send($this->url, $this->token, __METHOD__, func_get_args());
    }
}
