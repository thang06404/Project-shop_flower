<?php

/**
 * Entry point & Router Script cho PHP Built-in Server
 * Cho phép chạy trực tiếp bằng lệnh: php -S 127.0.0.1:8000 (không cần -t public)
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/');

// 1. Phục vụ tài nguyên tĩnh nếu tồn tại trong public/ (CSS, JS, Ảnh, Font)
$publicFile = __DIR__ . '/public' . $uri;
if ($uri !== '/' && file_exists($publicFile) && !is_dir($publicFile)) {
    $extension = strtolower(pathinfo($publicFile, PATHINFO_EXTENSION));
    $mimeTypes = [
        'css' => 'text/css',
        'js' => 'application/javascript',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'webp' => 'image/webp',
        'svg' => 'image/svg+xml',
        'ico' => 'image/x-icon',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf' => 'font/ttf',
    ];

    if (isset($mimeTypes[$extension])) {
        header("Content-Type: {$mimeTypes[$extension]}");
    } else {
        $mime = mime_content_type($publicFile);
        if ($mime) {
            header("Content-Type: {$mime}");
        }
    }

    readfile($publicFile);
    exit;
}

// 2. Chuyển tiếp toàn bộ request về Front Controller
require_once __DIR__ . '/public/index.php';
