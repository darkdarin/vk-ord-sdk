<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Предмет договора
 */
enum ContractSubjectTypeEnum: string
{
    /**
     * Представительство
     */
    case Representation = 'representation';
    /**
     * Организация распространения рекламы
     */
    case OrgDistribution = 'org_distribution';
    /**
     * Посредничество
     */
    case Mediation = 'mediation';
    /**
     * Распространение рекламы
     */
    case Distribution = 'distribution';
    /**
     * Иное
     */
    case Other = 'other';
}
