<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class CheckoutController extends Controller
{
    public function index()
    {
        // Mock data
        $cartItems = [
            [
                'id' => 1,
                'name' => 'Lẵng Hoa Hồng Đỏ Khai Trương',
                'image' => 'https://images.unsplash.com/photo-1591886960571-74d43a9d4166?auto=format&fit=crop&w=400&q=80',
                'price' => 1200000,
                'quantity' => 1,
                'total' => 1200000
            ],
            [
                'id' => 2,
                'name' => 'Bó Hoa Baby Trắng Tinh Khôi',
                'image' => 'https://images.unsplash.com/photo-1579290074212-32a81878d65f?auto=format&fit=crop&w=400&q=80',
                'price' => 450000,
                'quantity' => 2,
                'total' => 900000
            ]
        ];

        $subtotal = 2100000;
        $shipping = 50000;
        $total = $subtotal + $shipping;

        View::render('client/checkout', [
            'title' => 'Thanh Toán - FlowerShop',
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total
        ]);
    }

    public function placeOrder()
    {
        // Mock redirect
        header('Location: /thanh-toan/thanh-cong');
        exit;
    }

    public function success()
    {
        View::render('client/success', [
            'title' => 'Đặt Hàng Thành Công - FlowerShop',
            'orderCode' => 'FL' . rand(100000, 999999)
        ]);
    }
}
