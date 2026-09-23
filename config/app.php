<?php

return [
    'name' => $_ENV['APP_NAME'] ?? 'FlowerShop',
    'env' => $_ENV['APP_ENV'] ?? 'local',
    'debug' => filter_var($_ENV['APP_DEBUG'] ?? true, FILTER_VALIDATE_BOOLEAN),
    'url' => $_ENV['APP_URL'] ?? 'http://localhost:8000',
    'timezone' => 'Asia/Ho_Chi_Minh',
];
