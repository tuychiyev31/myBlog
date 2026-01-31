<?php

namespace App\Helpers;

class Router
{
    private array $routes = [];

    public function get(string $path, callable $callback): void
    {
        $this->routes['GET'][$path] = $callback;

    }

    public function post(string $path, callable $callback): void
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $uri = rtrim($uri, '/');

        if ($uri === '') {
            $uri = '/';
        }

        if (isset($this->routes[$method][$uri])) {
            call_user_func($this->routes[$method][$uri]);
            return;
        }

        foreach ($this->routes[$method] ?? [] as $route => $callback) {
            $pattern = $this->convertRouteToRegex($route);

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);
                call_user_func_array($callback, $matches);
                return;
            }
        }

        $this->notFound();
    }

    private function convertRouteToRegex(string $route): string
    {
        $route = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $route);

        return '#^' . $route . '$#';
    }

    private function notFound(): void
    {
        http_response_code(404);

        echo "404 - Not found";
    }
}

