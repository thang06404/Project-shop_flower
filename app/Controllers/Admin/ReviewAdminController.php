<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\View;
use Core\Request;
use Core\Session;

class ReviewAdminController extends Controller
{
    /**
     * Review list
     */
    public function index(): void
    {
        $reviews = [
            [
                'id'           => 1,
                'customer'     => 'Nguyễn Văn Nam',
                'product_name' => 'Bó Hồng Đỏ Ecuador Kiêu Sa',
                'rating'       => 5,
                'comment'      => 'Hoa rất đẹp và tươi, giao hàng đúng giờ. Bạn gái mình rất thích!',
                'status'       => 'approved',
                'created_at'   => date('Y-m-d H:i')
            ],
            [
                'id'           => 2,
                'customer'     => 'Trần Quang Hưng',
                'product_name' => 'Hộp Hoa Tulip Hà Lan Pastel',
                'rating'       => 4,
                'comment'      => 'Hoa đẹp nhưng giao trễ 15 phút. Hy vọng shop cải thiện khâu giao hàng.',
                'status'       => 'approved',
                'created_at'   => date('Y-m-d H:i')
            ],
            [
                'id'           => 3,
                'customer'     => 'Khách Ẩn Danh',
                'product_name' => 'Bó Hoa Nắng Mai Tươi Sáng',
                'rating'       => 1,
                'comment'      => 'Shop phục vụ quá tệ, sẽ không bao giờ quay lại.',
                'status'       => 'hidden',
                'created_at'   => date('Y-m-d H:i', strtotime('-1 days'))
            ]
        ];

        View::renderAdmin('admin/reviews/index', [
            'reviews' => $reviews
        ]);
    }

    /**
     * Update review status
     */
    public function updateStatus(string $id): void
    {
        $status = Request::post('status');
        Session::setFlash('success', "Đã cập nhật trạng thái đánh giá #{$id} thành [{$status}].");
        header('Location: /admin/reviews');
        exit;
    }
}
