<?php

namespace App\Middlewares;

use Core\Session;

class AuthMiddleware
{
    public function handle(): void
    {
        if (!Session::has('user_id')) {
            Session::flash('error', 'Vui lòng đăng nhập để tiếp tục.');
            header('Location: /dang-nhap');
            exit;
        }
    }
}
