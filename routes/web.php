<?php

/**
 * ==============================================================================
 * GLOBAL WEB ROUTES
 * ==============================================================================
 * Manages all URLs and maps to their corresponding Controller.
 */

use Core\Router;
use App\Controllers\HomeController;
use App\Controllers\OrderTrackingController;
use App\Controllers\ProductController;
use App\Controllers\CartController;
use App\Controllers\CheckoutController;
use App\Controllers\AuthController;
use App\Controllers\BlogController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\ProductAdminController;
use App\Controllers\Admin\OrderAdminController;
use App\Controllers\Admin\CategoryAdminController;
use App\Controllers\Admin\CustomerAdminController;
use App\Controllers\Admin\ReviewAdminController;
use App\Controllers\Admin\CouponAdminController;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\AdminMiddleware;
use App\Middlewares\CsrfMiddleware;

// ------------------------------------------------------------------------------
// 1. CLIENT & GUEST ROUTES
// ------------------------------------------------------------------------------
// Trang chủ & Danh mục sản phẩm
Router::get('/', [HomeController::class, 'index']);
Router::get('/danh-muc/{slug}', [ProductController::class, 'category']);
Router::get('/san-pham/{slug}', [ProductController::class, 'detail']);
Router::get('/tin-tuc', [BlogController::class, 'index']);
Router::get('/tin-tuc/{id}', [BlogController::class, 'detail']);

// Real-time order tracking (Public - No login required)
Router::get('/tra-cuu-don-hang', [OrderTrackingController::class, 'index']);
Router::post('/tra-cuu-don-hang', [OrderTrackingController::class, 'search']);

// Cart & Checkout
Router::get('/gio-hang', [CartController::class, 'index']);
Router::post('/gio-hang/them', [CartController::class, 'add']);
Router::post('/gio-hang/cap-nhat', [CartController::class, 'update']);
Router::post('/gio-hang/xoa', [CartController::class, 'remove']);

// Order & Schedule Flower Delivery (Login Required)
Router::get('/thanh-toan', [CheckoutController::class, 'index'], [AuthMiddleware::class]);
Router::post('/thanh-toan/dat-hang', [CheckoutController::class, 'placeOrder'], [AuthMiddleware::class, CsrfMiddleware::class]);
Router::get('/thanh-toan/thanh-cong', [CheckoutController::class, 'success']);

// Account Authentication (Auth)
Router::get('/dang-nhap', [AuthController::class, 'loginForm']);
Router::post('/dang-nhap', [AuthController::class, 'login'], [CsrfMiddleware::class]);
Router::get('/dang-ky', [AuthController::class, 'registerForm']);
Router::post('/dang-ky', [AuthController::class, 'register'], [CsrfMiddleware::class]);
Router::get('/dang-xuat', [AuthController::class, 'logout']);

// ------------------------------------------------------------------------------
// 2. ADMIN ROUTES (ADMIN PRIVILEGES REQUIRED)
// ------------------------------------------------------------------------------
Router::get('/admin', [DashboardController::class, 'index'], [AdminMiddleware::class]);
Router::get('/admin/products', [ProductAdminController::class, 'index'], [AdminMiddleware::class]);
Router::get('/admin/products/create', [ProductAdminController::class, 'create'], [AdminMiddleware::class]);
Router::get('/admin/products/{id}/edit', [ProductAdminController::class, 'edit'], [AdminMiddleware::class]);

Router::get('/admin/orders', [OrderAdminController::class, 'index'], [AdminMiddleware::class]);
Router::get('/admin/orders/{id}', [OrderAdminController::class, 'detail'], [AdminMiddleware::class]);
Router::post('/admin/orders/{id}/status', [OrderAdminController::class, 'updateStatus'], [AdminMiddleware::class]);
Router::post('/admin/orders/{id}/upload-finished-image', [OrderAdminController::class, 'uploadFinishedImage'], [AdminMiddleware::class]);

Router::get('/admin/categories', [CategoryAdminController::class, 'index'], [AdminMiddleware::class]);
Router::get('/admin/categories/create', [CategoryAdminController::class, 'create'], [AdminMiddleware::class]);
Router::get('/admin/categories/{id}/edit', [CategoryAdminController::class, 'edit'], [AdminMiddleware::class]);

Router::get('/admin/customers', [CustomerAdminController::class, 'index'], [AdminMiddleware::class]);
Router::get('/admin/customers/{id}/edit', [CustomerAdminController::class, 'edit'], [AdminMiddleware::class]);

Router::get('/admin/reviews', [ReviewAdminController::class, 'index'], [AdminMiddleware::class]);
Router::post('/admin/reviews/{id}/status', [ReviewAdminController::class, 'updateStatus'], [AdminMiddleware::class]);

Router::get('/admin/coupons', [CouponAdminController::class, 'index'], [AdminMiddleware::class]);
Router::get('/admin/coupons/create', [CouponAdminController::class, 'create'], [AdminMiddleware::class]);
Router::get('/admin/coupons/{id}/edit', [CouponAdminController::class, 'edit'], [AdminMiddleware::class]);
