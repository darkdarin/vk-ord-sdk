<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * @api
 */
final readonly class Creative
{
    /**
     * @param string $erid Токен маркировки креатива.
     * @param CreativeFormEnum $form Форма распространения креатива.
     * @param list<string>|null $kktus Список кодов ККТУ креатива. Для обычных креативов требуется 1 элемент, для кобрендинговых от 1 до 16.
     * @param string|null $name Название креатива. Используется для вашего удобства.
     * @param string|null $brand Бренд рекламируемых товаров или услуг. Допускается ввести несколько брендов через точку.
     * @param string|null $category Вид рекламируемых товаров или услуг. Допускается ввести несколько видов через точку.
     * @param string|null $description Дополнительное описание рекламируемых товаров или услуг. Допускается ввести несколько описаний через точку.
     * @param CreativePayTypeEnum|null $pay_type Модель оплаты показа креатива.
     * @param string|null $targeting Описание целевой аудитории креатива.
     * @param list<string>|null $target_urls Список URL-адресов креатива, при нажатии на которые пользователь перейдет на рекламируемые товары и услуги.
     * @param list<string>|null $texts Список текстов креатива.
     * @param list<string>|null $media_external_ids Список внешних идентификаторов медиафайлов, используемых в креативе. Файлы типа 'архив' можно прикреплять только к креативу с типом 'banner-html5'.
     * @param list<CreativeFlagEnum>|null $flags Информация о том, что креатив относится к особому типу рекламного объявления.
     * @param list<string>|null $contract_external_ids Список внешних идентификаторов изначальных договоров, для которых создается креатив. Несовместимо с полями 'person_external_id' и 'cids'.
     * @param string|null $person_external_id Внешний идентификатор контрагента, для которого создаётся саморекламный креатив. Несовместимо с полями 'contract_external_ids' и 'cids'.
     * @param list<string>|null $cids Список внешних cid, для которых создается креатив. Несовместимо с полями 'person_external_id' и 'contract_external_ids'.
     */
    public function __construct(
        public string $erid,
        public CreativeFormEnum $form,
        public ?array $kktus = null,
        public ?string $name = null,
        public ?string $brand = null,
        public ?string $category = null,
        public ?string $description = null,
        public ?CreativePayTypeEnum $pay_type = null,
        public ?string $targeting = null,
        public ?array $target_urls = null,
        public ?array $texts = null,
        public ?array $media_external_ids = null,
        public ?array $flags = null,
        public ?array $contract_external_ids = null,
        public ?string $person_external_id = null,
        public ?array $cids = null,
    ) {}
}
