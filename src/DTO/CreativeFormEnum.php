<?php

namespace DarkDarin\VkOrdSdk\DTO;

/**
 * Форма распространения креатива
 */
enum CreativeFormEnum: string
{
    /**
     * Баннер
     */
    case Banner = 'banner';
    /**
     * Текстовый блок
     */
    case TextBlock = 'text_block';
    /**
     * Текстово-графический блок
     */
    case TextGraphicBlock = 'text_graphic_block';
    /**
     * Аудиозапись
     */
    case Audio = 'audio';
    /**
     * Видеоролик
     */
    case Video = 'video';
    /**
     * Аудиотрансляция в прямом эфире
     */
    case LiveAudio = 'live_audio';
    /**
     * Видеотрансляция в прямом эфире
     */
    case LiveVideo = 'live_video';
    /**
     * Иное
     */
    case Other = 'other';
}
