<?php

use App\Controller\Pages\Home;

require_once __DIR__ . '/../vendor/autoload.php';

$request = new \App\http\Request();
dd($request);

echo Home::getHome();