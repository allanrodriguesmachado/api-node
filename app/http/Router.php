<?php

namespace App\http;

use Closure;

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
      foreach ($params as $key => $value) {
          if ($value instanceof Closure) {
              $params['controller'] = $value;
              unset($params[$key]);
              continue;
          }
      }

      $patternRoute = '/^' . str_replace('/', '\/', $path) . '$/';
     return $this->routes[$patternRoute][$method] = $params;
    }

    private function getUri() {
        $uri = $this->request->getUri();
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [];
        return end($xUri);
    }

    private function getRoute()
    {
        $uri = $this->getUri();

        $httpMethod = $this->request->getHttpMethod();

        foreach ($this->routes AS $patternRoute => $methods) {
            if (preg_match($patternRoute, $uri)) {
                if ($methods[$httpMethod]) {
                    return $methods[$httpMethod];
                }
                throw new \Exception("Error Precessing request", 405);
            }
        }

        throw new \Exception("URL nao encontrada", 404);
    }

    public function run()
    {
        try {
            $route = $this->getRoute();
            if (!isset($route['controller'])) {
                throw new \Exception("URL nao pode ser processada", 500);
            }

            $args = [];
            return call_user_func_array($route['controller'], $args);

        }catch (\Exception $exception){
            return new Response($exception->getCode(), $exception->getMessage());
        }
    }

    public function get(string $route, mixed $params = [])
    {
        return $this->addRoute('GET', $route, $params);
    }

    public function post(string $route, mixed $params = [])
    {
        return $this->addRoute('POST', $route, $params);
    }

    public function put(string $route, mixed $params = [])
    {
        return $this->addRoute('PUT', $route, $params);
    }

    public function delete(string $route, mixed $params = [])
    {
        return $this->addRoute('DELETE', $route, $params);
    }
}