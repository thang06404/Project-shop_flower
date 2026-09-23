<?php

declare(strict_types=1);

// Set Vietnam timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Enable error reporting in development
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

define('ROOT_PATH', dirname(__DIR__));

// Load environment variables (.env)
if (file_exists(ROOT_PATH . '/.env')) {
    $lines = file(ROOT_PATH . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#')) {
            continue;
        }
        if (str_contains($line, '=')) {
            [$key, $value] = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            // Remove quotes if any
            $value = trim($value, '"\'');
            $_ENV[$key] = $value;
            putenv("{$key}={$value}");
        }
    }
}

// Load global helper functions
if (file_exists(ROOT_PATH . '/core/helpers.php')) {
    require_once ROOT_PATH . '/core/helpers.php';
}

// Check and load Composer Autoload (or use standard Fallback PSR-4 Autoloader)
if (file_exists(ROOT_PATH . '/vendor/autoload.php')) {
    require_once ROOT_PATH . '/vendor/autoload.php';
} else {

    // Fallback PSR-4 Autoloader ensures project runs smoothly before composer install
    spl_autoload_register(function ($class) {
        $prefixes = [
            'App\\' => ROOT_PATH . '/app/',
            'Core\\' => ROOT_PATH . '/core/',
        ];

        foreach ($prefixes as $prefix => $baseDir) {
            $len = strlen($prefix);
            if (strncmp($prefix, $class, $len) !== 0) {
                continue;
            }

            $relativeClass = substr($class, $len);
            $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

            if (file_exists($file)) {
                require_once $file;
                return;
            }
        }
    });
}

// Initialize secure session
\Core\Session::start();

// Auto-login via Remember Me cookie
if (!\Core\Session::has('user_id') && isset($_COOKIE['remember_token'])) {
    $user = \App\Models\User::findByRememberToken($_COOKIE['remember_token']);
    if ($user) {
        \Core\Session::set('user_id', $user['id']);
        \Core\Session::set('role', $user['role']);
        \Core\Session::set('user_name', $user['name']);
    } else {
        // Token không hợp lệ, xóa cookie
        setcookie('remember_token', '', time() - 3600, '/');
    }
}

// Load Routes list from routes/web.php
require_once ROOT_PATH . '/routes/web.php';

// Điều phối Request
\Core\Router::dispatch();
