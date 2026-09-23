<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\View;

class CustomerAdminController extends Controller
{
    /**
     * Customer list
     */
    public function index(): void
    {
        $customers = [
            [
                'id'            => 1,
                'name'          => 'Nguyễn Văn Nam',
                'email'         => 'nam.nguyen@example.com',
                'phone'         => '0908123456',
                'total_orders'  => 5,
                'total_spent'   => 4500000,
                'status'        => 'active',
                'created_at'    => '2025-10-15'
            ],
            [
                'id'            => 2,
                'name'          => 'Trần Quang Hưng',
                'email'         => 'hung.tran@example.com',
                'phone'         => '0912345678',
                'total_orders'  => 2,
                'total_spent'   => 1890000,
                'status'        => 'active',
                'created_at'    => '2026-02-10'
            ],
            [
                'id'            => 3,
                'name'          => 'Lê Thùy Dung',
                'email'         => 'dung.le@example.com',
                'phone'         => '0933221100',
                'total_orders'  => 0,
                'total_spent'   => 0,
                'status'        => 'banned',
                'created_at'    => '2026-09-01'
            ]
        ];

        View::renderAdmin('admin/customers/index', [
            'customers' => $customers
        ]);
    }

    /**
     * Edit customer information
     */
    public function edit(int $id): void
    {
        $customer = [
            'id'            => $id,
            'name'          => 'Nguyễn Văn Nam',
            'email'         => 'nam.nguyen@example.com',
            'phone'         => '0908123456',
            'status'        => 'active',
            'created_at'    => '2025-10-15'
        ];

        View::renderAdmin('admin/customers/form', [
            'customer' => $customer
        ]);
    }
}
