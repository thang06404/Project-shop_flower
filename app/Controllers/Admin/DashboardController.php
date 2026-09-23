<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\View;

class DashboardController extends Controller
{
    /**
     * Hiển thị bảng điều khiển tổng quan (Dashboard)
     */
    public function index(): void
    {
        $stats = [
            'today_revenue'     => 14550000,
            'pending_orders'    => 12,
            'preparing_orders'  => 6,
            'ontime_rate'       => '98.5%'
        ];

        $recentOrders = [
            [
                'id'            => 101,
                'code'          => 'FLW-9021',
                'product_name'  => 'Bó Hồng Đỏ Ecuador Kiêu Sa (Bản 30 bông)',
                'product_image' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=150&q=80',
                'recipient_name'=> 'Chị Mai Linh',
                'phone'         => '0908123456',
                'delivery_slot' => '14:00 - 16:00 (Hôm nay)',
                'total_amount'  => 750000,
                'status'        => 'preparing'
            ],
            [
                'id'            => 102,
                'code'          => 'FLW-9020',
                'product_name'  => 'Hộp Hoa Tulip Hà Lan Pastel',
                'product_image' => 'https://images.unsplash.com/photo-1520763185298-1b434c919102?auto=format&fit=crop&w=150&q=80',
                'recipient_name'=> 'Anh Hoàng Bách',
                'phone'         => '0912345678',
                'delivery_slot' => '15:30 - 17:30 (Hôm nay)',
                'total_amount'  => 890000,
                'status'        => 'confirmed'
            ],
            [
                'id'            => 103,
                'code'          => 'FLW-9019',
                'product_name'  => 'Chậu Lan Hồ Điệp Phú Quý (3 Cành)',
                'product_image' => 'https://images.unsplash.com/photo-1525310072745-f49212b5ac6d?auto=format&fit=crop&w=150&q=80',
                'recipient_name'=> 'Cty Tài Chính SunLife',
                'phone'         => '0933999888',
                'delivery_slot' => '09:00 - 11:00 (Đang giao GHN)',
                'total_amount'  => 1200000,
                'status'        => 'shipping'
            ],
            [
                'id'            => 104,
                'code'          => 'FLW-9018',
                'product_name'  => 'Bó Hoa Nắng Mai Tươi Sáng',
                'product_image' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?auto=format&fit=crop&w=150&q=80',
                'recipient_name'=> 'Cô Thanh Thủy',
                'phone'         => '0944112233',
                'delivery_slot' => '08:30 - 10:30 (Đã hoàn tất)',
                'total_amount'  => 550000,
                'status'        => 'completed'
            ]
        ];

        View::renderAdmin('admin/dashboard', [
            'stats'        => $stats,
            'recentOrders' => $recentOrders
        ]);
    }
}
