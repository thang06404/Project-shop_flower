<?php

namespace Core;

class Router
{
    private static array $routes = [];

    public static function get(string $path, array|callable $handler, array $middlewares = []): void
    {
        self::addRoute('GET', $path, $handler, $middlewares);
    }

    public static function post(string $path, array|callable $handler, array $middlewares = []): void
    {
        self::addRoute('POST', $path, $handler, $middlewares);
    }

    private static function addRoute(string $method, string $path, array|callable $handler, array $middlewares): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' => '/' . trim($path, '/'),
            'handler' => $handler,
            'middlewares' => $middlewares
        ];
    }

    public static function dispatch(): void
    {
        $requestMethod = Request::method();
        $requestUri = Request::uri();

        foreach (self::$routes as $route) {
            if ($route['method'] !== $requestMethod) {
                continue;
            }

            // Convert path to Regex to match dynamic parameters (e.g., /product/{slug})
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $route['path']);
            $pattern = "#^{$pattern}$#";

            if (preg_match($pattern, $requestUri, $matches)) {
                // Filter named parameters
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // Chạy Middlewares
                foreach ($route['middlewares'] as $middlewareClass) {
                    if (class_exists($middlewareClass)) {
                        $middleware = new $middlewareClass();
                        if (method_exists($middleware, 'handle')) {
                            $middleware->handle();
                        }
                    }
                }

                // Thực thi Controller / Handler
                $handler = $route['handler'];

                if (is_callable($handler)) {
                    call_user_func_array($handler, $params);
                    return;
                }

                if (is_array($handler) && count($handler) === 2) {
                    [$controllerClass, $action] = $handler;

                    if (!class_exists($controllerClass)) {
                        http_response_code(500);
                        die("Controller class [{$controllerClass}] not found.");
                    }

                    $controller = new $controllerClass();

                    if (!method_exists($controller, $action)) {
                        http_response_code(500);
                        die("Action [{$action}] not found in [{$controllerClass}].");
                    }

                    call_user_func_array([$controller, $action], $params);
                    return;
                }
            }
        }

        // Route not found -> 404
        http_response_code(404);
        View::render('client/404', ['title' => '404 - Không tìm thấy trang'], 'layouts/header');
    }
}
