<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Данные контрагента
 */
readonly class Person
{
    /**
     * @param string $name Наименование контрагента. Для организации указывается юридическое наименование, для физического лица и индивидуального предпринимателя — ФИО
     * @param array<PersonRoleEnum> $roles Список ролей контрагента
     * @param PersonJuridicalDetails $juridical_details Реквизиты контрагента
     * @param string|null $rs_url URL-адрес рекламной системы
     * @param string|null $create_date Дата и время создания контрагента в формате ISO 8601
     */
    public function __construct(
        public string $name,
        public array $roles,
        public PersonJuridicalDetails $juridical_details,
        public ?string $rs_url = null,
        public ?string $create_date = null,
    ) {}
}
