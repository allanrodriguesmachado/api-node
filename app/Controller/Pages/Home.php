<?php

declare(strict_types=1);

namespace App\Controller\Pages;

use App\Model\Entity\Organization;
use App\Utils\View;

class Home extends Page
{
    public static function getHome(): string
    {
        $obOrganization = new Organization();

        $content =  View::render('pages/home', [
            'description' => $obOrganization->description,
        ]);

        return Page::getPage('Allan.Dev', $content);
    }
}