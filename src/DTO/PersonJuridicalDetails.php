<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Реквизиты контрагента
 */
readonly class PersonJuridicalDetails
{
    /**
     * @param PersonTypeEnum $type Тип контрагента
     * @param string|null $inn ИНН контрагента
     * @param string|null $phone Абонентский номер мобильного телефона
     * @param string|null $foreign_epayment_method Номер карты или расчётного счёта иностранного электронного средства платежа
     * @param string|null $foreign_registration_number Регистрационный номер иностранного юридического лица
     * @param string|null $foreign_inn Номер налогоплательщика или его аналог, присвоенный в стране регистрации
     * @param string|null $foreign_oksm_country_code Код страны в цифровом формате ISO 3166
     */
    public function __construct(
        public PersonTypeEnum $type,
        public ?string $inn = null,
        public ?string $phone = null,
        public ?string $foreign_epayment_method = null,
        public ?string $foreign_registration_number = null,
        public ?string $foreign_inn = null,
        public ?string $foreign_oksm_country_code = null,
    ) {}
}
