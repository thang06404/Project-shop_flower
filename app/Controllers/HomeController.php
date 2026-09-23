<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        // Mock data displayed on homepage
        $featuredProducts = [
            [
                'id' => 1,
                'name' => 'Bó Hoa Nắng Mai Tươi Sáng',
                'slug' => 'bo-hoa-nang-mai-tuoi-sang',
                'regular_price' => 550000,
                'sale_price' => 450000,
                'thumbnail' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?auto=format&fit=crop&w=600&q=80',
                'category_name' => 'Hoa Hướng Dương',
                'occasion' => 'Sinh Nhật'
            ],
            [
                'id' => 2,
                'name' => 'Bó Hồng Đỏ Ecuador Kiêu Sa',
                'slug' => 'bo-hong-do-ecuador-kieu-sa',
                'regular_price' => 750000,
                'sale_price' => 680000,
                'thumbnail' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=600&q=80',
                'category_name' => 'Hoa Hồng',
                'occasion' => 'Tình Yêu'
            ],
            [
                'id' => 3,
                'name' => 'Chậu Lan Hồ Điệp Phú Quý (3 Cành)',
                'slug' => 'chau-lan-ho-diep-phu-quy',
                'regular_price' => 1200000,
                'sale_price' => null,
                'thumbnail' => 'https://images.unsplash.com/photo-1525310072745-f49212b5ac6d?auto=format&fit=crop&w=600&q=80',
                'category_name' => 'Lan Hồ Điệp',
                'occasion' => 'Khai Trương'
            ],
            [
                'id' => 4,
                'name' => 'Hộp Hoa Tulip Hà Lan Pastel',
                'slug' => 'hop-hoa-tulip-ha-lan-pastel',
                'regular_price' => 890000,
                'sale_price' => 820000,
                'thumbnail' => 'https://images.unsplash.com/photo-1520763185298-1b434c919102?auto=format&fit=crop&w=600&q=80',
                'category_name' => 'Hoa Tulip',
                'occasion' => 'Chúc Mừng'
            ],
        ];

        $occasions = [
            ['name' => 'Sinh Nhật', 'slug' => 'sinh-nhat', 'icon' => 'bi-cake2'],
            ['name' => 'Khai Trương', 'slug' => 'khai-truong', 'icon' => 'bi-shop'],
            ['name' => 'Tình Yêu / Valentine', 'slug' => 'tinh-yeu', 'icon' => 'bi-heart-fill text-danger'],
            ['name' => 'Chúc Mừng 8/3 - 20/10', 'slug' => 'chuc-mung', 'icon' => 'bi-stars text-warning'],
            ['name' => 'Chia Buồn', 'slug' => 'chia-buon', 'icon' => 'bi-flower1'],
        ];

        $this->view('client/home', [
            'title' => 'FlowerShop - Cửa Hàng Hoa Tươi & Điện Hoa Hỏa Tốc',
            'featuredProducts' => $featuredProducts,
            'occasions' => $occasions
        ]);
    }
}
