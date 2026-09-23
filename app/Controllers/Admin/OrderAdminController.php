<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\View;
use Core\Request;
use Core\Session;

class OrderAdminController extends Controller
{
    /**
     * Flower order list
     */
    public function index(): void
    {
        $statusFilter = $_GET['status'] ?? null;

        $orders = [
            [
                'id'            => 1,
                'code'          => 'FLW-9021',
                'product_name'  => 'Bó Hồng Đỏ Ecuador Kiêu Sa',
                'product_image' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=120&q=80',
                'sender_name'   => 'Nguyễn Văn Nam',
                'recipient_name'=> 'Mai Linh',
                'phone'         => '0908123456',
                'address'       => '72 Lê Thánh Tôn, Bến Nghé, Quận 1, TP.HCM',
                'delivery_date' => date('d/m/Y'),
                'delivery_slot' => '14:00 - 16:00',
                'payment_method'=> 'MoMo (Đã thanh toán)',
                'total_amount'  => 750000,
                'status'        => 'preparing'
            ],
            [
                'id'            => 2,
                'code'          => 'FLW-9020',
                'product_name'  => 'Hộp Hoa Tulip Hà Lan Pastel',
                'product_image' => 'https://images.unsplash.com/photo-1520763185298-1b434c919102?auto=format&fit=crop&w=120&q=80',
                'sender_name'   => 'Trần Quang Hưng',
                'recipient_name'=> 'Phạm Quỳnh Nga',
                'phone'         => '0912345678',
                'address'       => '120 Nguyễn Thị Minh Khai, Q.3, TP.HCM',
                'delivery_date' => date('d/m/Y'),
                'delivery_slot' => '16:00 - 18:00',
                'payment_method'=> 'COD (Thu hộ)',
                'total_amount'  => 890000,
                'status'        => 'confirmed'
            ],
            [
                'id'            => 3,
                'code'          => 'FLW-9019',
                'product_name'  => 'Chậu Lan Hồ Điệp Phú Quý (3 Cành)',
                'product_image' => 'https://images.unsplash.com/photo-1525310072745-f49212b5ac6d?auto=format&fit=crop&w=120&q=80',
                'sender_name'   => 'Cty TNHH Bất Động Sản Á Châu',
                'recipient_name'=> 'Giám đốc Chi Nhánh Nam Sài Gòn',
                'phone'         => '0988776655',
                'address'       => 'Tòa nhà Bitexco, Q.1, TP.HCM',
                'delivery_date' => date('d/m/Y'),
                'delivery_slot' => '09:00 - 11:00',
                'payment_method'=> 'VNPay QR (Đã thanh toán)',
                'total_amount'  => 1200000,
                'status'        => 'shipping'
            ],
            [
                'id'            => 4,
                'code'          => 'FLW-9018',
                'product_name'  => 'Bó Hoa Nắng Mai Tươi Sáng',
                'product_image' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?auto=format&fit=crop&w=120&q=80',
                'sender_name'   => 'Lê Thùy Dung',
                'recipient_name'=> 'Bà Ngoại Mai Thị Sen',
                'phone'         => '0933221100',
                'address'       => '45 Ung Văn Khiêm, Bình Thạnh, TP.HCM',
                'delivery_date' => date('d/m/Y'),
                'delivery_slot' => '08:00 - 10:00',
                'payment_method'=> 'Chuyển khoản Vietcombank',
                'total_amount'  => 550000,
                'status'        => 'completed'
            ]
        ];

        if ($statusFilter) {
            $orders = array_values(array_filter($orders, fn($o) => $o['status'] === $statusFilter));
        }

        View::renderAdmin('admin/orders/index', [
            'orders'       => $orders,
            'currentFilter'=> $statusFilter
        ]);
    }

    /**
     * Order details
     */
    public function detail(int $id): void
    {
        $order = [
            'id'            => $id,
            'code'          => 'FLW-9021',
            'product_name'  => 'Bó Hồng Đỏ Ecuador Kiêu Sa',
            'product_image' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=120&q=80',
            'sender_name'   => 'Nguyễn Văn Nam',
            'sender_phone'  => '0908123456',
            'sender_email'  => 'nam.nguyen@example.com',
            'recipient_name'=> 'Mai Linh',
            'recipient_phone'=> '0908999888',
            'address'       => '72 Lê Thánh Tôn, Bến Nghé, Quận 1, TP.HCM',
            'delivery_date' => date('d/m/Y'),
            'delivery_slot' => '14:00 - 16:00',
            'card_message'  => 'Chúc em một ngày thật vui vẻ và hạnh phúc nhé!',
            'is_anonymous_sender' => false,
            'note'          => 'Nhờ shop gọi trước khi giao 30 phút.',
            'payment_method'=> 'MoMo (Đã thanh toán)',
            'total_amount'  => 750000,
            'shipping_fee'  => 30000,
            'discount_amount'=> 0,
            'final_amount'  => 780000,
            'status'        => 'preparing',
            'finished_image_url' => null
        ];

        View::renderAdmin('admin/orders/detail', [
            'order' => $order
        ]);
    }

    /**
     * Update order status (AJAX/POST)
     */
    public function updateStatus(string $id): void
    {
        $newStatus = Request::post('status');
        Session::setFlash('success', "Đã cập nhật trạng thái đơn #{$id} sang [{$newStatus}] thành công!");
        header('Location: /admin/orders');
        exit;
    }

    /**
     * Upload finished flower image (AJAX/POST)
     */
    public function uploadFinishedImage(string $id): void
    {
        Session::setFlash('success', "Đã tải ảnh hoa thành phẩm cho đơn #{$id} thành công! Khách hàng có thể kiểm tra trực tiếp.");
        header('Location: /admin/orders');
        exit;
    }
}
