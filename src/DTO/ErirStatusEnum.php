<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Статусы обработки от ЕРИР, по которым выполняется фильтрация выдачи
 */
enum ErirStatusEnum: string
{
    /**
     * В обработке на стороне ОРД VK или ЕРИР
     */
    case Processing = 'processing';
    /**
     * Не прошёл проверку ОРД VK или ЕРИР
     */
    case Bad = 'bad';
    /**
     * Проверка ЕРИР пройдена успешно
     */
    case Verified = 'verified';
}
