<?php

namespace App\Middlewares;

use Core\Session;

class AdminMiddleware
{
    public function handle(): void
    {
        // Support local development environment (Local / 127.0.0.1) auto-attach demo Admin session for quick testing
        $isLocal = in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1']) 
                || in_array($_SERVER['SERVER_NAME'] ?? '', ['127.0.0.1', 'localhost'])
                || ($_ENV['APP_ENV'] ?? 'local') === 'local';

        if ($isLocal && Session::get('role') !== 'admin') {
            Session::set('user_id', 1);
            Session::set('role', 'admin');
            Session::set('user', [
                'id' => 1,
                'name' => 'Admin Quản Trị Viên',
                'email' => 'admin@flowershop.vn',
                'role' => 'admin'
            ]);
        }

        if (Session::get('role') !== 'admin') {
            http_response_code(403);
            die('403 Forbidden: Bạn không có quyền truy cập trang quản trị. Vui lòng đăng nhập tài khoản Quản trị viên.');
        }
    }
}

