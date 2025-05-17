<?php

namespace App\Libraries;

class Formatter
{
    public static function autoLink($text)
    {
        // 先處理 email
        $text = preg_replace(
            '/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})/',
            '<a href="mailto:$1" class="underline text-[var(--primary-color)]">$1</a>',
            $text
        );

        // 再處理網址
        $text = preg_replace(
            '/(https?:\/\/[\w\-\.\/\?\#\=\&\%]+)/i',
            '<a href="$1" target="_blank" class="underline text-[var(--primary-color)]">$1</a>',
            $text
        );
        return $text;
    }
}
