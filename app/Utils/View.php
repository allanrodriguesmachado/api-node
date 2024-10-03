<?php

namespace App\Utils;

class View
{
    private static function contentView(string $view): string
    {
        $fileView = __DIR__ . '/../../resources/view/' . $view . '.html';
        return file_exists($fileView)
            ? file_get_contents($fileView)
            : '';
    }

    public static function render($view, $params = []): string
    {
        $contentView = self::contentView($view);

        $keys = array_keys($params);
        $keys = array_map(function ($key) {
            return '{{' . $key . '}}';
        }, $keys);

        return str_replace($keys, array_values($params), $contentView);
    }
}