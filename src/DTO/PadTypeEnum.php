<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Тип рекламной площадки
 */
enum PadTypeEnum: string
{
    /**
     * Веб-страница или профиль социальной сети
     */
    case Web = 'web';
    /**
     * Мобильное приложение
     */
    case MobileApp = 'mobile_app';
    /**
     * Информационная система. Любое другое место размещения рекламы
     * @deprecated Данный тип площадки больше не поддерживается
     */
    case IS = 'is';
}
