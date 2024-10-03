<?php

declare(strict_types=1);

namespace App\Controller\Pages;

use App\Utils\View;

class Home
{
    public static function getHome(): string
    {
        return View::render('pages/home', [
            'title' => 'Home',
        ]);
    }
}