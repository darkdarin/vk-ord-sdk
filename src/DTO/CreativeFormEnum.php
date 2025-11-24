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
     * Текстовый блок с видео
     */
    case TextVideoBlock = 'text_video_block';
    /**
     * Текстово-графический блок с видео
     */
    case TextGraphicVideoBlock = 'text_graphic_video_block';
    /**
     * Текстовый блок с аудио
     */
    case TextAudioBlock = 'text_audio_block';
    /**
     * Текстово-графический блок с аудио
     */
    case TextGraphicAudioBlock = 'text_graphic_audio_block';
    /**
     * Текстовый блок с аудио и видео
     */
    case TextAudioVideoBlock = 'text_audio_video_block';
    /**
     * Текстово-графический блок с аудио и видео
     */
    case TextGraphicAudioVideoBlock = 'text_graphic_audio_video_block';
    /**
     * HTML5-баннер
     */
    case BannerHTML5 = 'banner_html5';
}
