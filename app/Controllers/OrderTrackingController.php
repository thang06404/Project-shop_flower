<?php

namespace App\Controllers;

use Core\Controller;
use Core\Request;

class OrderTrackingController extends Controller
{
    public function index(): void
    {
        $this->view('client/tracking', [
            'title' => 'Tra Cứu Đơn Hàng Hoa Tươi - FlowerShop',
            'order' => null
        ]);
    }

    public function search(): void
    {
        $orderCode = trim((string)Request::input('order_code', ''));
        $phone = trim((string)Request::input('phone', ''));

        // Simulate demo data if mock code FLW-260922-A8F3 or any is entered
        $mockOrder = null;
        if ($orderCode !== '' && $phone !== '') {
            $mockOrder = [
                'order_code' => strtoupper($orderCode),
                'buyer_name' => 'Nguyễn Văn Nam',
                'buyer_phone' => $phone,
                'recipient_name' => 'Trần Thị Lan',
                'recipient_phone' => '0987654321',
                'shipping_address' => '72 Lê Thánh Tôn, Phường Bến Nghé, Quận 1, TP.HCM',
                'delivery_date' => date('d/m/Y'),
                'delivery_time_slot' => '14:00 - 16:00',
                'card_message' => 'Chúc mừng sinh nhật em yêu! Chúc em luôn tươi vui như những đoá hoa này.',
                'order_status' => 'preparing', // pending, preparing, shipping, completed
                'payment_method' => 'vnpay',
                'payment_status' => 'paid',
                'final_amount' => 680000,
                'finished_image_url' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=600&q=80',
                'tracking_code' => 'GHN-SG892183'
            ];
        }

        $this->view('client/tracking', [
            'title' => 'Kết Quả Tra Cứu Đơn Hàng ' . htmlspecialchars($orderCode),
            'order' => $mockOrder,
            'searched' => true,
            'orderCode' => $orderCode,
            'phone' => $phone
        ]);
    }
}
