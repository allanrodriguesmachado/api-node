<?php

namespace App\http;

class Router
{
    private string $url;
    private string $prefix;
    private array $routes;
    private Request $request;

    public function __construct(string $url)
    {
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    private function setPrefix(): void
    {
        $parseUrl = parse_url($this->url);
        $this->prefix = $parseUrl['path'] ?? '';
    }

    private function addRoute(string $method, string $path, mixed $params)
    {
      dd($method, $path, $params);
    }
    public function get(string $route, mixed $params = [])
    {
        return $this->addRoute('GET', $route, $params);
    }
}