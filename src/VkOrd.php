<?php

namespace DarkDarin\VkOrdSdk;

use Argo\EntityDefinition\Reflector\MethodDefinition\MethodDefinitionReflectorInterface;
use Argo\RestClient\Attributes\Delete;
use Argo\RestClient\Attributes\Get;
use Argo\RestClient\Attributes\Patch;
use Argo\RestClient\Attributes\Post;
use Argo\RestClient\Attributes\Put;
use Argo\RestClient\Exception\BadRequestException;
use Argo\RestClient\Exception\ConflictException;
use Argo\RestClient\Exception\ForbiddenException;
use Argo\RestClient\Exception\GoneException;
use Argo\RestClient\Exception\InternalServerError;
use Argo\RestClient\Exception\NotFoundException;
use Argo\RestClient\Exception\UnauthorizedException;
use Argo\RestClient\RestClient;
use Argo\RestClient\RestClientInterface;
use DarkDarin\VkOrdSdk\Attribute\MultipartRequest;
use DarkDarin\VkOrdSdk\DTO\Cid;
use DarkDarin\VkOrdSdk\DTO\CidItems;
use DarkDarin\VkOrdSdk\DTO\CidRequest;
use DarkDarin\VkOrdSdk\DTO\Contract;
use DarkDarin\VkOrdSdk\DTO\Creative;
use DarkDarin\VkOrdSdk\DTO\CreativeEridExternalIdsList;
use DarkDarin\VkOrdSdk\DTO\CreativeEridInfo;
use DarkDarin\VkOrdSdk\DTO\CreativeEridList;
use DarkDarin\VkOrdSdk\DTO\CreativeRequest;
use DarkDarin\VkOrdSdk\DTO\ErirDataTypeEnum;
use DarkDarin\VkOrdSdk\DTO\ErirLangEnum;
use DarkDarin\VkOrdSdk\DTO\ErirMessages;
use DarkDarin\VkOrdSdk\DTO\ErirStatus;
use DarkDarin\VkOrdSdk\DTO\ErirStatusEnum;
use DarkDarin\VkOrdSdk\DTO\ErirStatusItems;
use DarkDarin\VkOrdSdk\DTO\ExternalIdItems;
use DarkDarin\VkOrdSdk\DTO\ExternalIds;
use DarkDarin\VkOrdSdk\DTO\InfoResponse;
use DarkDarin\VkOrdSdk\DTO\Invoice;
use DarkDarin\VkOrdSdk\DTO\InvoiceContractId;
use DarkDarin\VkOrdSdk\DTO\InvoiceHeader;
use DarkDarin\VkOrdSdk\DTO\InvoiceHeaderRequest;
use DarkDarin\VkOrdSdk\DTO\InvoiceItems;
use DarkDarin\VkOrdSdk\DTO\InvoiceList;
use DarkDarin\VkOrdSdk\DTO\InvoiceRequest;
use DarkDarin\VkOrdSdk\DTO\KKTUItems;
use DarkDarin\VkOrdSdk\DTO\KKTULangEnum;
use DarkDarin\VkOrdSdk\DTO\Media;
use DarkDarin\VkOrdSdk\DTO\MediaCheckSumInfo;
use DarkDarin\VkOrdSdk\DTO\Pad;
use DarkDarin\VkOrdSdk\DTO\Person;
use DarkDarin\VkOrdSdk\DTO\StatisticItems;
use DarkDarin\VkOrdSdk\DTO\StatisticItemsRequest;
use DarkDarin\VkOrdSdk\DTO\StatisticItemToDelete;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @api
 * @psalm-suppress NoValue
 */
readonly class VkOrd
{
    private RestClientInterface $client;

    public function __construct(
        private VkOrdRequestFactoryInterface $requestFactory,
        ClientInterface $client,
        MethodDefinitionReflectorInterface $methodReflector,
    ) {
        $this->client = new RestClient($this->requestFactory, $client, $methodReflector);
    }

    public function withUrl(string $url): self
    {
        $this->requestFactory->setUrl($url);
        return $this;
    }

    public function withToken(string $token): self
    {
        $this->requestFactory->setToken($token);
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
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод создаёт или обновляет данные контрагента
     *
     * @link https://ord.vk.com/help/api/swagger/#/person/v1-create-person
     *
     * @param string $external_id Внешний идентификатор контрагента
     * @param Person $person Данные контрагента
     * @return bool|null
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws ConflictException
     */
    #[Put('/v1/person/{external_id}', body: 'person')]
    public function setPerson(string $external_id, Person $person): ?bool
    {
        return $this->client->send(__METHOD__, func_get_args());
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
    #[Get('/v1/person/{external_id}')]
    public function getPerson(string $external_id): Person
    {
        return $this->client->send(__METHOD__, func_get_args());
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
        return $this->client->send(__METHOD__, func_get_args());
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
     * @return bool|null
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Одна из сторон договора не найдена
     * @throws ConflictException
     */
    #[Put('/v1/contract/{external_id}', body: 'contract')]
    public function setContract(string $external_id, Contract $contract): ?bool
    {
        return $this->client->send(__METHOD__, func_get_args());
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
        return $this->client->send(__METHOD__, func_get_args());
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
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод отдает список требующих детализации url площадок. Детализация означает, что нужно указать конкретную
     * группу, сообщество и т.д. на указанной платформе. При сохранении площадки с url из данного списка, будет выдана
     * ошибка. Сравнение url производится без учета протокола и знака '/' в конце url.
     *
     * @link https://ord.vk.com/help/api/swagger/#/pad/v1-get-pad-info-restricted
     *
     * @return list<string> Список запрещенных url площадок
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v1/pad/info/restricted')]
    public function getPadInfoRestricted(): array
    {
        return $this->client->send(__METHOD__, func_get_args());
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
     * @return bool|null
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Владелец рекламной площадки не найден
     */
    #[Put('/v1/pad/{external_id}', body: 'pad')]
    public function setPad(string $external_id, Pad $pad): ?bool
    {
        return $this->client->send(__METHOD__, func_get_args());
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
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает список внешних идентификаторов креативов, отсортированный в лексикографическом порядке.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v3-get-creative-list
     *
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе. Значение по умолчанию — 0
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос. Значение по умолчанию - 100
     * @return ExternalIdItems Информация о списке внешних идентификаторов креативов.
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v3/creative')]
    public function getCreativeList(int $offset = null, int $limit = null): ExternalIdItems
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает список маркеров рекламы, отсортированный по внешнему идентификатору в лексикографическом порядке.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v3-get-creative-erids-list
     *
     * @param int|null $offset Количество всех элементов, которые необходимо получить за один запрос. Значение по умолчанию — 100
     * @param int|null $limit Количество элементов выдачи, которые необходимо пропустить в запросе. Значение по умолчанию — 0
     * @return CreativeEridList Информация о списке маркеров рекламы, отсортированном в лексикографическом порядке.
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('v3/creative/list/erids')]
    public function getCreativeEridList(int $offset = null, int $limit = null): CreativeEridList
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает список пар маркеров рекламы и внешних идентификаторов креативов, отсортированный по внешнему
     * идентификатору в лексикографическом порядке.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v3-get-creative-list-erid-external-ids
     *
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе. Значение по умолчанию — 0
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос. Значение по умолчанию — 100
     * @return CreativeEridExternalIdsList Информация о списке пар маркеров рекламы и внешних идентификаторов креативов.
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('v3/creative/list/erid_external_ids')]
    public function getCreativeEridExternalIdsList(int $offset = null, int $limit = null): CreativeEridExternalIdsList
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод создаёт или обновляет данные креатива. Если креатив с переданным идентификатором:
     * - Не существует, метод создаст креатив.
     * - Существует, метод обновит данные креатива.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v3-create-creative
     *
     * @param string $external_id Внешний идентификатор креатива
     * @param CreativeRequest $request Данные креатива
     * @return CreativeEridInfo Информация о маркировке креатива
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Внешний идентификатор изначального договора не найден
     */
    #[Put('/v3/creative/{external_id}', body: 'request')]
    public function setCreative(string $external_id, CreativeRequest $request): CreativeEridInfo
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает данные креатива.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v3-get-creative
     *
     * @param string $external_id Внешний идентификатор креатива
     * @return Creative Данные креатива
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v3/creative/{external_id}')]
    public function getCreative(string $external_id): Creative
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает данные креатива по маркеру рекламы.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v3-get-creative-by-erid
     *
     * @param string $erid Маркер рекламы.
     * @return Creative Данные креатива
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Get('/v3/creative/by_erid/{erid}')]
    public function getCreativeByErid(string $erid): Creative
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод добавляет тексты в креатив.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v3-add-texts-to-creative
     *
     * @param string $external_id Внешний идентификатор креатива
     * @param list<string> $texts Список текстов креатива.
     * @return CreativeEridInfo Информация о маркировке креатива
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Post('/v3/creative/{external_id}/add_text')]
    public function addTextToCreative(string $external_id, array $texts): CreativeEridInfo
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод добавляет медиафайлы в креатив.
     *
     * @link https://ord.vk.com/help/api/swagger/#/creative/v3-add-media-to-creative
     *
     * @param string $external_id Внешний идентификатор креатива
     * @param list<string> $media_external_ids Список внешних идентификаторов медиафайлов, используемых в креативе
     * @return CreativeEridInfo Информация о маркировке креатива
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException Внешние идентификаторы креатива или медиафайлов не найдены
     */
    #[Post('/v3/creative/{external_id}/add_media')]
    public function addMediaToCreative(string $external_id, array $media_external_ids): CreativeEridInfo
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает список внешних идентификаторов медиафайлов, отсортированный в лексикографическом порядке.
     *
     * @link https://ord.vk.com/help/api/swagger/#/media/v1-get-media
     *
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе. Значение по умолчанию — 0.
     * @param int|null $limit МедиафайлКоличество всех элементов, которые необходимо получить за один запрос. Значение по умолчанию — 100. Максимальное количество элементов списка — 1 000.
     * @return ExternalIdItems Информация о списке внешних идентификаторов медиафайлов.
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Get('/v1/media')]
    public function getMediaList(int $offset = null, int $limit = null): ExternalIdItems
    {
        return $this->client->send(__METHOD__, func_get_args());
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
    #[MultipartRequest]
    public function uploadMedia(
        string $external_id,
        StreamInterface $media_file,
        string $description,
    ): MediaCheckSumInfo {
        return $this->client->send(__METHOD__, func_get_args());
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
        return $this->client->send(__METHOD__, func_get_args());
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
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает список внешних идентификаторов актов, отсортированный в лексикографическом порядке.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v4-get-invoice-list
     *
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос. Значение по умолчанию — 100
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе. Значение по умолчанию — 0
     * @return InvoiceList
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v4/invoice')]
    public function getInvoiceList(int $limit = null, int $offset = null): InvoiceList
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает данные акта.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v4-get-invoice
     *
     * @param string $external_id Внешний идентификатор акта.
     * @return Invoice
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v4/invoice/{external_id}')]
    public function getInvoice(string $external_id): Invoice
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает данные акта без разаллокаций.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v4-get-invoice-header
     *
     * @param string $external_id Внешний идентификатор акта.
     * @return InvoiceHeader
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v4/invoice/{external_id}')]
    public function getInvoiceHeader(string $external_id): InvoiceHeader
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод создаёт или обновляет данные акта с информацией о разаллокации по изначальным договорам.
     * Изначальные договоры связаны с показами креативов на разных рекламных площадках.
     *
     * Если акт с переданным идентификатором:
     * * Не существует, метод создаст акт.
     * * Существует, метод обновит данные акта.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v4-create-whole-invoice
     *
     * @param string $external_id Внешний идентификатор акта.
     * @param InvoiceRequest $request Данные акта.
     * @param bool|null $draft Если передано значение true, создается акт-черновик, который не отправляется в ЕРИР
     * @return InfoResponse|null
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws ForbiddenException
     * @throws NotFoundException Изначальный договор в разаллокации не найден
     */
    #[Put('/v4/invoice/{external_id}', body: 'request')]
    public function setInvoice(string $external_id, InvoiceRequest $request, ?bool $draft = null): ?InfoResponse
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод создаёт или обновляет данные акта без передачи информации о разаллокации по изначальным договорам.
     * Изначальные договоры связаны с показами креативов на разных рекламных площадках.
     * Если акт с переданным идентификатором:
     * * Не существует, метод создаст акт.
     * * Существует, метод обновит данные акта.
     * Чтобы добавить информацию о разаллокации по изначальным договорам, вызовите метод "Добавить договоры в акт".
     *
     * Чтобы отправить обновлённый акт в ЕРИР, вызовите метод "Отправить акт в ЕРИР".
     *
     * Осторожно! Перед отправкой акта в ЕРИР обязательно проверьте корректность и полноту данных.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v4-create-invoice
     *
     * @param string $external_id Внешний идентификатор акта.
     * @param InvoiceHeaderRequest $invoice Данные акта.
     * @return InfoResponse|null
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws ForbiddenException
     * @throws NotFoundException Договор, к которому добавляется акт, не найден
     */
    #[Put('/v4/invoice/{external_id}/header', body: 'invoice')]
    public function setInvoiceHeader(string $external_id, InvoiceHeaderRequest $invoice): ?InfoResponse
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод добавляет информацию о разаллокации по изначальным договорам в акт.
     * Изначальные договоры связаны с показами креативов на разных рекламных площадках.
     *
     * Чтобы отправить обновлённый акт в ЕРИР, вызовите метод "Отправить акт в ЕРИР".
     * Осторожно! Перед отправкой акта в ЕРИР обязательно проверьте корректность и полноту данных.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v4-add-contracts-to-invoice
     *
     * @param string $external_id Внешний идентификатор акта.
     * @param InvoiceItems $items Список изначальных договоров в разаллокации.
     * @return InfoResponse|null
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws ForbiddenException
     * @throws NotFoundException Акт, изначальный договор в разаллокации, креатив или рекламная площадка не найдены
     */
    #[Patch('/v4/invoice/{external_id}/items', body: 'items')]
    public function addContractsToInvoice(string $external_id, InvoiceItems $items): ?InfoResponse
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод удаляет изначальные договоры, креативы и рекламные площадки из акта.
     * Чтобы отправить обновлённый акт в ЕРИР, вызовите метод "Отправить акт в ЕРИР".
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v4-delete-contracts-from-invoice
     *
     * @param string $external_id Внешний идентификатор акта
     * @param list<InvoiceContractId> $request Данные изначальных договоров
     * @return InfoResponse|null
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Post('/v4/invoice/{external_id}/delete', body: 'request')]
    public function deleteContractsFromInvoice(string $external_id, array $request): ?InfoResponse
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     *  Метод отправляет акт в ЕРИР.
     *  Вызов метода необходим, если вы создали акты или добавили в них данные с помощью методов:
     *  - Создать акт
     *  - Добавить договоры в акт
     *  - Удалить договоры из акта
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v4-send-invoice-to-erir
     *
     * @param string $external_id Внешний идентификатор акта
     * @return bool|null
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Post('/v4/invoice/{external_id}/ready')]
    public function invoiceReady(string $external_id): ?bool
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод удаляет данные акта.
     *
     * @link https://ord.vk.com/help/api/swagger/#/invoice/v4-delete-invoice
     *
     * @param string $external_id Внешний идентификатор акта.
     * @return bool|null
     *
     * @throws UnauthorizedException
     * @throws ForbiddenException
     */
    #[Delete('/v4/invoice/{external_id}')]
    public function deleteInvoice(string $external_id): ?bool
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает список внешних идентификаторов статистик.
     * Query-параметры применяются как при операции логического «И».
     *
     * @link https://ord.vk.com/help/api/swagger/#/statistics/v3-get-statistics-list
     *
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе. Значение по умолчанию — 0
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос. Значение по умолчанию — 100
     * @param array|null $months Фильтрация по месяцам. Значение используется в формате YYYY-MM-01
     * @param array|null $creative_external_ids Фильтрация по внешним идентификаторам креативов.
     * @param string|null $pad_external_ids Фильтрация по внешнему идентификатору рекламной площадки.
     * @return StatisticItems
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws InternalServerError
     */
    #[Get('/v3/statistics/list')]
    public function getStatisticsList(
        int $offset = null,
        int $limit = null,
        array $months = null,
        array $creative_external_ids = null,
        string $pad_external_ids = null,
    ): StatisticItems {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод создаёт или обновляет статистики, не связанные с актами.
     *
     * @link https://ord.vk.com/help/api/swagger/#/statistics/v3-create-statistics
     *
     * @param StatisticItemsRequest $request
     * @return ExternalIds
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws InternalServerError
     */
    #[Post('/v3/statistics', body: 'request')]
    public function setStatistics(StatisticItemsRequest $request): ExternalIds
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод удаляет статистики, не связанные с актами.
     *
     * @link https://ord.vk.com/help/api/swagger/#/statistics/v3-delete-statistics
     *
     * @param StatisticItemToDelete $request
     * @return bool|null
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws GoneException
     * @throws InternalServerError
     */
    #[Post('/v3/statistics/delete', body: 'request')]
    public function deleteStatistics(StatisticItemToDelete $request): ?bool
    {
        return $this->client->send(__METHOD__, func_get_args());
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
        return $this->client->send(__METHOD__, func_get_args());
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
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает статусы обработки объектов по работе с рекламой от ЕРИР.
     *
     * @link https://ord.vk.com/help/api/swagger/#/erir_status/v1-post-ad-object-processing-status
     *
     * @param ErirDataTypeEnum|null $data_type Объекты по работе с рекламой, по которым выполняется фильтрация выдачи
     * @param ErirStatusEnum|null $erir_status Статусы обработки от ЕРИР, по которым выполняется фильтрация выдачи
     * @param list<string>|null $external_id Список внешних идентификаторов объектов по работе с рекламой, статусы обработки которых необходимо получить
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос
     * @param int|null $limit_per_entity Максимальное количество элементов каждого объекта по работе с рекламой, которые необходимо получить за один запрос
     * @return ErirStatusItems
     *
     * @throws UnauthorizedException
     * @throws InternalServerError
     */
    #[Post('/v1/erir_statuses')]
    public function getErirStatusesAdditional(
        ErirDataTypeEnum $data_type = null,
        ErirStatusEnum $erir_status = null,
        array $external_id = null,
        int $offset = null,
        int $limit = null,
        int $limit_per_entity = null,
    ): ErirStatusItems {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод отдает коды ККТУ, которые поддерживаются в ОРД VK. В отличие от ОКВЭД поддерживается параметр codes - фильтрация по кодам.
     *
     * @link https://ord.vk.com/help/api/swagger/#/dictionary/v1-get-kktu-codes
     *
     * @param string|null $search Фраза, по которой фильтруется выдача запроса. Поиск выполняется в соответствии с языком, на котором описан код ККТУ
     * @param KKTULangEnum|null $lang Язык, на котором описан код ККТУ
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос
     * @param string|null $codes Коды ККТУ, перечисленные через запятую
     * @return KKTUItems
     *
     * @throws BadRequestException
     * @throws InternalServerError
     */
    #[Get('/v1/dict/kktu')]
    public function getKktuDictionary(
        string $search = null,
        KKTULangEnum $lang = null,
        int $offset = null,
        int $limit = null,
        string $codes = null,
    ): KKTUItems {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод отдает перевод ошибки ЕРИР, которая поддерживается в ОРД VK.
     *
     * @link https://ord.vk.com/help/api/swagger/#/dictionary/v1-get-erir-message
     * @param string $message Ошибка от ЕРИР, перевод которой требуется получить.
     * @param ErirLangEnum|null $lang Язык, на котором требуется получить перевод ошибки.
     * @return ErirMessages
     *
     * @throws BadRequestException
     */
    #[Get('/v1/dict/erir_message')]
    public function getErirMessage(string $message, ?ErirLangEnum $lang = null): ErirMessages
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод отдает перевод ошибки ЕРИР, которая поддерживается в ОРД VK.
     *
     * @link https://ord.vk.com/help/api/swagger/#/dictionary/v1-get-erir-message
     * @param list<string> $messages Список сообщений об ошибках от ЕРИР, перевод которых требуется получить.
     * @param ErirLangEnum|null $lang Язык, на котором требуется получить перевод ошибки.
     * @return ErirMessages
     *
     * @throws BadRequestException
     */
    #[Post('/v1/dict/erir_message', body: 'messages')]
    public function getErirMessages(array $messages, ?ErirLangEnum $lang = null): ErirMessages
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает список внешних cid, отсортированный в лексикографическом порядке.
     *
     * @link https://ord.vk.com/help/api/swagger/#/cid/v1-get-cid-list
     * @param int|null $offset Количество элементов выдачи, которые необходимо пропустить в запросе. Значение по умолчанию — 0
     * @param int|null $limit Количество всех элементов, которые необходимо получить за один запрос. Значение по умолчанию — 100
     * @return CidItems
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    #[Get('/v1/cid')]
    public function getCidList(int $offset = null, int $limit = null): CidItems
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод создаёт или обновляет данные внешнего cid.
     *
     * @link https://ord.vk.com/help/api/swagger/#/cid/v1-create-external-cid
     * @param string $cid_value Идентификатор внешнего cid в формате UUID.
     * @param CidRequest $request
     * @return bool|null
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws ConflictException
     */
    #[Put('/v1/cid/{cid_value}', body: 'request')]
    public function setCid(string $cid_value, CidRequest $request): ?bool
    {
        return $this->client->send(__METHOD__, func_get_args());
    }

    /**
     * Метод получает данные внешнего cid.
     *
     * @link https://ord.vk.com/help/api/swagger/#/cid/v1-get-cid
     * @param string $cid_value Идентификатор внешнего cid в формате UUID.
     * @return Cid
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     */
    #[Get('/v1/cid/{cid_value}')]
    public function getCid(string $cid_value): Cid
    {
        return $this->client->send(__METHOD__, func_get_args());
    }
}
