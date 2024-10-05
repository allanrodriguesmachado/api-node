<?php

use App\Controller\Pages\Home;
use App\http\Response;
use App\http\Router;

require_once __DIR__ . '/../vendor/autoload.php';

define('URL', 'http://localhost/mvc');

$route = new Router(
    URL,
);

$route->get('/', function () {
    return new Response(200, Home::getHome());
});

$route->run()->sendResponse();

//echo Home::getHome();