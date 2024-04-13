<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные креативы
 */
readonly class Creative
{
    /**
     * @param list<string> $okveds Список кодов ОКВЭД креатива
     * @param CreativePayTypeEnum $pay_type Модель оплаты показа креатива
     * @param CreativeFormEnum $form Форма распространения креатива
     * @param string|null $contract_external_id Внешний идентификатор изначального договора, для которого создается креатив. Если это поле заполнено, то id контрагента должен отсутствовать.
     * @param string|null $person_external_id Внешний идентификатор контрагента, для которого создается креатив саморекламы. Если это поле заполнено, то id контракта должен отсутствовать.
     * @param string|null $name Название креатива. Используется для вашего удобства
     * @param string|null $brand Бренд рекламируемых товаров или услуг. Допускается ввести несколько брендов через точку
     * @param string|null $category Вид рекламируемых товаров или услуг. Допускается ввести несколько видов через точку
     * @param string|null $description Дополнительное описание рекламируемых товаров или услуг. Допускается ввести несколько описаний через точку
     * @param string|null $targeting Описание целевой аудитории креатива
     * @param list<string> $target_urls Список URL-адресов креатива, при нажатии на которые пользователь перейдет на рекламируемые товары и услуги
     * @param list<string> $texts Список текстов креатива
     * @param list<string> $media_external_ids Список внешних идентификаторов медиафайлов, используемых в креативе
     * @param list<string> $media_urls Список URL-адресов на внешние ресурсы, используемых в креативе
     * @param list<CreativeFlagEnum> $flags Информация о том, что креатив относится к особому типу рекламного объявления
     */
    public function __construct(
        public array $okveds,
        public CreativePayTypeEnum $pay_type,
        public CreativeFormEnum $form,
        public ?string $contract_external_id = null,
        public ?string $person_external_id = null,
        public ?string $name = null,
        public ?string $brand = null,
        public ?string $category = null,
        public ?string $description = null,
        public ?string $targeting = null,
        public array $target_urls = [],
        public array $texts = [],
        public array $media_external_ids = [],
        public array $media_urls = [],
        public array $flags = [],
        public ?string $create_date = null,
        public ?string $erid = null,
    ) {}
}
