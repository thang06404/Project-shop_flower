<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class CartController extends Controller
{
    public function index()
    {
        // Mock data
        $cartItems = [
            [
                'id' => 1,
                'name' => 'Lẵng Hoa Hồng Đỏ Khai Trương',
                'slug' => 'lang-hoa-hong-do-khai-truong',
                'image' => 'https://images.unsplash.com/photo-1591886960571-74d43a9d4166?auto=format&fit=crop&w=400&q=80',
                'price' => 1200000,
                'quantity' => 1,
                'total' => 1200000
            ],
            [
                'id' => 2,
                'name' => 'Bó Hoa Baby Trắng Tinh Khôi',
                'slug' => 'bo-hoa-baby-trang',
                'image' => 'https://images.unsplash.com/photo-1508784411316-02b8cd4d3a3a?auto=format&fit=crop&w=400&q=80',
                'price' => 450000,
                'quantity' => 2,
                'total' => 900000
            ]
        ];

        $subtotal = 2100000;
        $shipping = 50000; // Flat rate mock
        $total = $subtotal + $shipping;

        View::render('client/cart', [
            'title' => 'Giỏ Hàng - FlowerShop',
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total
        ]);
    }

    public function add()
    {
        // Mock redirect
        header('Location: /gio-hang');
        exit;
    }

    public function update()
    {
        // Mock redirect
        header('Location: /gio-hang');
        exit;
    }

    public function remove()
    {
        // Mock redirect
        header('Location: /gio-hang');
        exit;
    }
}
