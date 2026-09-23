<?php

namespace App\Middlewares;

use Core\Request;
use Core\Session;

class CsrfMiddleware
{
    public function handle(): void
    {
        if (Request::isPost()) {
            $token = Request::input('csrf_token') ?? ($_SERVER['HTTP_X_CSRF_TOKEN'] ?? null);
            if (!Session::validateCsrfToken($token)) {
                http_response_code(419);
                die('CSRF token mismatch. Vui lòng tải lại trang.');
            }
        }
    }
}
