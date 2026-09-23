<?php

namespace Core;

class Controller
{
    protected function view(string $viewPath, array $data = [], string $layout = 'layouts/header'): void
    {
        View::render($viewPath, $data, $layout);
    }

    protected function json(mixed $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

    protected function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }
}
