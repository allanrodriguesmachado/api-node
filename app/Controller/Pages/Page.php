<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Page
{
    public static function getPage(string $title, string $content): string
    {
        return View::render('pages/page', [
            'header' => self::header(),
            'title' => $title,
            'content' => $content,
            'footer' => self::footer(),
        ]);
    }

    private static function header(): string
    {
        return View::render('pages/header');
    }

    private static function footer(): string {
        return View::render('pages/footer');
    }
}