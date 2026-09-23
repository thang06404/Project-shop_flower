<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\View;

class ProductAdminController extends Controller
{
    /**
     * Flower product list
     */
    public function index(): void
    {
        $products = [
            [
                'id'            => 1,
                'sku'           => 'FLW-NM01',
                'name'          => 'Bó Hoa Nắng Mai Tươi Sáng',
                'image'         => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?auto=format&fit=crop&w=120&q=80',
                'category'      => 'Hoa Hướng Dương, Sinh Nhật',
                'regular_price' => 550000,
                'sale_price'    => 450000,
                'stock'         => 20,
                'status'        => 'active'
            ],
            [
                'id'            => 2,
                'sku'           => 'FLW-HD01',
                'name'          => 'Bó Hồng Đỏ Ecuador Kiêu Sa',
                'image'         => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=120&q=80',
                'category'      => 'Hoa Hồng Ecuador, Tình Yêu',
                'regular_price' => 750000,
                'sale_price'    => 680000,
                'stock'         => 15,
                'status'        => 'active'
            ],
            [
                'id'            => 3,
                'sku'           => 'FLW-LHD03',
                'name'          => 'Chậu Lan Hồ Điệp Phú Quý (3 Cành)',
                'image'         => 'https://images.unsplash.com/photo-1525310072745-f49212b5ac6d?auto=format&fit=crop&w=120&q=80',
                'category'      => 'Lan Hồ Điệp, Khai Trương',
                'regular_price' => 1200000,
                'sale_price'    => null,
                'stock'         => 10,
                'status'        => 'active'
            ],
            [
                'id'            => 4,
                'sku'           => 'FLW-TL01',
                'name'          => 'Hộp Hoa Tulip Hà Lan Pastel',
                'image'         => 'https://images.unsplash.com/photo-1520763185298-1b434c919102?auto=format&fit=crop&w=120&q=80',
                'category'      => 'Hoa Tulip Hà Lan, 8/3 - 20/10',
                'regular_price' => 890000,
                'sale_price'    => 820000,
                'stock'         => 12,
                'status'        => 'active'
            ]
        ];

        View::renderAdmin('admin/products/index', [
            'products' => $products
        ]);
    }

    /**
     * Create product form
     */
    public function create(): void
    {
        View::renderAdmin('admin/products/form', []);
    }

    /**
     * Form sửa sản phẩm
     */
    public function edit(int $id): void
    {
        $product = [
            'id'            => $id,
            'sku'           => 'FLW-NM01',
            'name'          => 'Bó Hoa Nắng Mai Tươi Sáng',
            'short_description' => 'Bó hoa rực rỡ tượng trưng cho niềm tin và hi vọng.',
            'description'   => 'Hoa hướng dương tươi cắt cành mix cùng hoa lá phụ. Phù hợp tặng sinh nhật, tốt nghiệp.',
            'image'         => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?auto=format&fit=crop&w=120&q=80',
            'category_id'   => 1,
            'regular_price' => 550000,
            'sale_price'    => 450000,
            'stock'         => 20,
            'status'        => 'active'
        ];

        View::renderAdmin('admin/products/form', [
            'product' => $product
        ]);
    }
}
