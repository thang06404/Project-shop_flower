<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\View;

class CouponAdminController extends Controller
{
    /**
     * Coupon list
     */
    public function index(): void
    {
        $coupons = [
            [
                'id'                 => 1,
                'code'               => 'WELCOME2026',
                'discount_type'      => 'percent',
                'discount_value'     => 10,
                'min_order_value'    => 500000,
                'max_discount_amount'=> 50000,
                'usage_limit'        => 100,
                'used_count'         => 45,
                'end_date'           => '2026-12-31 23:59:59',
                'status'             => 'active'
            ],
            [
                'id'                 => 2,
                'code'               => 'FREESHIP',
                'discount_type'      => 'fixed',
                'discount_value'     => 30000,
                'min_order_value'    => 300000,
                'max_discount_amount'=> null,
                'usage_limit'        => 500,
                'used_count'         => 500,
                'end_date'           => '2026-10-20 23:59:59',
                'status'             => 'disabled'
            ],
            [
                'id'                 => 3,
                'code'               => 'VALENTINE',
                'discount_type'      => 'percent',
                'discount_value'     => 15,
                'min_order_value'    => 1000000,
                'max_discount_amount'=> 200000,
                'usage_limit'        => 50,
                'used_count'         => 50,
                'end_date'           => '2026-02-14 23:59:59',
                'status'             => 'expired'
            ]
        ];

        View::renderAdmin('admin/coupons/index', [
            'coupons' => $coupons
        ]);
    }

    /**
     * Create coupon form
     */
    public function create(): void
    {
        View::renderAdmin('admin/coupons/form', []);
    }

    /**
     * Edit coupon form
     */
    public function edit(int $id): void
    {
        $coupon = [
            'id'                 => $id,
            'code'               => 'WELCOME2026',
            'discount_type'      => 'percent',
            'discount_value'     => 10,
            'min_order_value'    => 500000,
            'max_discount_amount'=> 50000,
            'usage_limit'        => 100,
            'used_count'         => 45,
            'start_date'         => '2026-01-01T00:00',
            'end_date'           => '2026-12-31T23:59',
            'status'             => 'active'
        ];

        View::renderAdmin('admin/coupons/form', [
            'coupon' => $coupon
        ]);
    }
}
