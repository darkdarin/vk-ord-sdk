<?php

namespace DarkDarin\VkOrdSdk\DTO;

readonly class Cid
{
    /**
     * @param string $cid Идентификатор внешнего cid в формате UUID.
     * @param string $name Название cid.
     * @param CidErirStatusEnum $erir_status Статус проверки в ЕРИР
     * @param string|null $client_inn ИНН контрагента.
     * @param string|null $client_phone Абонентский номер мобильного телефона, который начинается с символа + и кода страны.
     * @param string|null $client_foreign_epayment_method Номер карты или расчётного счёта иностранного электронного средства платежа.
     * @param string|null $client_foreign_registration_number Регистрационный номер иностранного юридического лица.
     * @param string|null $client_foreign_inn Номер налогоплательщика или его аналог, присвоенный в стране регистрации.
     */
    public function __construct(
        public string $cid,
        public string $name,
        public CidErirStatusEnum $erir_status,
        public ?string $client_inn = null,
        public ?string $client_phone = null,
        public ?string $client_foreign_epayment_method = null,
        public ?string $client_foreign_registration_number = null,
        public ?string $client_foreign_inn = null,
    ) {}
}
