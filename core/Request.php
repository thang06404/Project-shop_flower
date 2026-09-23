<?php

namespace Core;

class Request
{
    public static function method(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    }

    public static function uri(): string
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($uri, '?');
        if ($position !== false) {
            $uri = substr($uri, 0, $position);
        }
        return '/' . trim($uri, '/');
    }

    public static function isGet(): bool
    {
        return self::method() === 'GET';
    }

    public static function isPost(): bool
    {
        return self::method() === 'POST';
    }

    public static function input(string $key, mixed $default = null): mixed
    {
        $data = self::all();
        return $data[$key] ?? $default;
    }

    public static function all(): array
    {
        $data = [];
        if (self::isGet()) {
            foreach ($_GET as $key => $value) {
                $data[$key] = self::sanitize($value);
            }
        } elseif (self::isPost()) {
            // Hỗ trợ cả application/json
            $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
            if (str_contains($contentType, 'application/json')) {
                $raw = file_get_contents('php://input');
                $decoded = json_decode($raw, true);
                if (is_array($decoded)) {
                    foreach ($decoded as $key => $value) {
                        $data[$key] = self::sanitize($value);
                    }
                }
            } else {
                foreach ($_POST as $key => $value) {
                    $data[$key] = self::sanitize($value);
                }
            }
        }
        return $data;
    }

    private static function sanitize(mixed $value): mixed
    {
        if (is_array($value)) {
            return array_map([self::class, 'sanitize'], $value);
        }
        if (is_string($value)) {
            return trim($value);
        }
        return $value;
    }
}
