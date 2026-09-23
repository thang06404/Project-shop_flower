<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;
use Core\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        // Nếu đã đăng nhập thì không cho vào form đăng nhập
        if (Session::has('user_id')) {
            $role = Session::get('role');
            if ($role === 'admin') {
                header('Location: /admin');
            } else {
                header('Location: /');
            }
            exit;
        }

        View::render('auth/login', [
            'title' => 'Đăng Nhập - FlowerShop'
        ]);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /dang-nhap');
            exit;
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            Session::setFlash('error', 'Vui lòng nhập đầy đủ email và mật khẩu.');
            header('Location: /dang-nhap');
            exit;
        }

        $user = User::findByEmail($email);

        if (!$user) {
            Session::setFlash('error', 'Email không tồn tại trong hệ thống.');
            header('Location: /dang-nhap');
            exit;
        }

        if ($user['status'] !== 'active') {
            Session::setFlash('error', 'Tài khoản của bạn đã bị khóa hoặc vô hiệu hóa.');
            header('Location: /dang-nhap');
            exit;
        }

        if (password_verify($password, $user['password'])) {
            // Đăng nhập thành công
            Session::set('user_id', $user['id']);
            Session::set('role', $user['role']);
            Session::set('user_name', $user['name']);
            
            // Xử lý Ghi nhớ đăng nhập
            if (isset($_POST['remember_me'])) {
                $token = bin2hex(random_bytes(32));
                User::updateRememberToken($user['id'], $token);
                // Set cookie cho 30 ngày (HttpOnly)
                setcookie('remember_token', $token, time() + (86400 * 30), "/", "", false, true);
            }

            Session::setFlash('success', 'Đăng nhập thành công!');

            if ($user['role'] === 'admin') {
                header('Location: /admin');
            } else {
                header('Location: /');
            }
            exit;
        } else {
            Session::setFlash('error', 'Mật khẩu không chính xác.');
            header('Location: /dang-nhap');
            exit;
        }
    }

    public function registerForm()
    {
        // Nếu đã đăng nhập thì không cho vào form đăng ký
        if (Session::has('user_id')) {
            header('Location: /');
            exit;
        }

        View::render('auth/register', [
            'title' => 'Đăng Ký - FlowerShop'
        ]);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /dang-ky');
            exit;
        }

        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $password = $_POST['password'] ?? '';
        $password_confirm = $_POST['password_confirm'] ?? '';

        if (empty($name) || empty($email) || empty($password)) {
            Session::setFlash('error', 'Vui lòng nhập đầy đủ thông tin bắt buộc.');
            header('Location: /dang-ky');
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Session::setFlash('error', 'Định dạng email không hợp lệ.');
            header('Location: /dang-ky');
            exit;
        }

        if ($password !== $password_confirm) {
            Session::setFlash('error', 'Mật khẩu xác nhận không khớp.');
            header('Location: /dang-ky');
            exit;
        }

        if (strlen($password) < 6) {
            Session::setFlash('error', 'Mật khẩu phải chứa ít nhất 6 ký tự.');
            header('Location: /dang-ky');
            exit;
        }

        // Kiểm tra email đã tồn tại
        if (User::findByEmail($email)) {
            Session::setFlash('error', 'Email này đã được sử dụng. Vui lòng chọn email khác.');
            header('Location: /dang-ky');
            exit;
        }

        // Hash mật khẩu
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Tạo user
        $success = User::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $hashedPassword
        ]);

        if ($success) {
            Session::setFlash('success', 'Đăng ký tài khoản thành công! Vui lòng đăng nhập.');
            header('Location: /dang-nhap');
            exit;
        } else {
            Session::setFlash('error', 'Có lỗi xảy ra trong quá trình đăng ký. Vui lòng thử lại sau.');
            header('Location: /dang-ky');
            exit;
        }
    }

    public function logout()
    {
        // Xóa remember token trong DB nếu có
        if (isset($_COOKIE['remember_token'])) {
            $user = User::findByRememberToken($_COOKIE['remember_token']);
            if ($user) {
                User::updateRememberToken($user['id'], null);
            }
            setcookie('remember_token', '', time() - 3600, '/');
        }

        Session::destroy();
        // Cần khởi tạo lại session sau khi destroy để set flash message (nếu cần)
        Session::start();
        Session::setFlash('success', 'Bạn đã đăng xuất thành công.');
        header('Location: /dang-nhap');
        exit;
    }
}
