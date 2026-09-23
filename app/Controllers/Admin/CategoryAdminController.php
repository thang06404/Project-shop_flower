<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\View;

class CategoryAdminController extends Controller
{
    /**
     * Flower category list
     */
    public function index(): void
    {
        $categories = [
            [
                'id'     => 1,
                'name'   => 'Hoa Hướng Dương',
                'slug'   => 'hoa-huong-duong',
                'type'   => 'flower_type',
                'image'  => 'https://images.unsplash.com/photo-1597826360447-3806fb460d3c?auto=format&fit=crop&w=120&q=80',
                'status' => 'active'
            ],
            [
                'id'     => 2,
                'name'   => 'Lan Hồ Điệp',
                'slug'   => 'lan-ho-diep',
                'type'   => 'flower_type',
                'image'  => 'https://images.unsplash.com/photo-1525310072745-f49212b5ac6d?auto=format&fit=crop&w=120&q=80',
                'status' => 'active'
            ],
            [
                'id'     => 3,
                'name'   => 'Hoa Khai Trương',
                'slug'   => 'hoa-khai-truong',
                'type'   => 'occasion',
                'image'  => 'https://images.unsplash.com/photo-1563241527-3004b7be88bd?auto=format&fit=crop&w=120&q=80',
                'status' => 'active'
            ],
            [
                'id'     => 4,
                'name'   => 'Hoa Sinh Nhật',
                'slug'   => 'hoa-sinh-nhat',
                'type'   => 'occasion',
                'image'  => 'https://images.unsplash.com/photo-1582299865181-432243d5dc94?auto=format&fit=crop&w=120&q=80',
                'status' => 'deleted'
            ]
        ];

        View::renderAdmin('admin/categories/index', [
            'categories' => $categories
        ]);
    }

    /**
     * Create category form
     */
    public function create(): void
    {
        View::renderAdmin('admin/categories/form', []);
    }

    /**
     * Form sửa danh mục
     */
    public function edit(int $id): void
    {
        $category = [
            'id'     => $id,
            'name'   => 'Hoa Hướng Dương',
            'slug'   => 'hoa-huong-duong',
            'type'   => 'flower_type',
            'image'  => 'https://images.unsplash.com/photo-1597826360447-3806fb460d3c?auto=format&fit=crop&w=120&q=80',
            'status' => 'active'
        ];

        View::renderAdmin('admin/categories/form', [
            'category' => $category
        ]);
    }
}
