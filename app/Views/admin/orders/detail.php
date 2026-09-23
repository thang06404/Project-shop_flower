<?php
use Core\View;

$title = "Chi Tiết Đơn Hàng #{$order['code']}";
$breadcrumbs = [
    ["title" => "Đơn Hàng", "url" => "/admin/orders"],
    ["title" => $order['code'], "url" => ""]
];

$statusColors = [
    'pending' => 'warning',
    'preparing' => 'info',
    'shipping' => 'primary',
    'completed' => 'success',
    'cancelled' => 'danger',
    'delivery_failed' => 'danger'
];
$statusColor = $statusColors[$order['status']] ?? 'secondary';
?>

<?php ob_start(); ?>
<a href="/admin/orders" class="btn btn-sm btn-outline-gray-600 d-inline-flex align-items-center">
    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    Quay Lại
</a>
<?php
$actions = ob_get_clean();

View::component("admin/components/page_header", [
    "title" => $title,
    "subtitle" => "Thông tin người đặt, người nhận, và trạng thái giao hoa",
    "breadcrumbs" => $breadcrumbs,
    "actions" => $actions,
]);
?>

<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Sản Phẩm Đã Đặt</h2>
            <div class="d-flex align-items-center mb-4">
                <img src="<?= e($order['product_image']) ?>" class="rounded" width="80" height="80" style="object-fit: cover;" alt="Product">
                <div class="ms-3">
                    <span class="fw-bold d-block h5"><?= e($order['product_name']) ?></span>
                    <span class="text-muted">Đơn giá: <?= number_format($order['total_amount'], 0, ',', '.') ?>đ x 1</span>
                </div>
            </div>

            <div class="row border-top pt-3 mt-3">
                <div class="col-6 mb-3">
                    <h6 class="text-gray-500 mb-1">Người Đặt (Buyer)</h6>
                    <p class="fw-bold mb-0"><?= e($order['sender_name']) ?></p>
                    <p class="mb-0 text-muted"><?= e($order['sender_phone']) ?></p>
                </div>
                <div class="col-6 mb-3">
                    <h6 class="text-gray-500 mb-1">Người Nhận (Recipient)</h6>
                    <p class="fw-bold mb-0"><?= e($order['recipient_name']) ?></p>
                    <p class="mb-0 text-muted"><?= e($order['recipient_phone']) ?></p>
                </div>
                <div class="col-12 mb-3">
                    <h6 class="text-gray-500 mb-1">Địa chỉ giao hoa</h6>
                    <p class="fw-bold mb-0"><?= e($order['address']) ?></p>
                </div>
                <div class="col-6 mb-3">
                    <h6 class="text-gray-500 mb-1">Thời gian hẹn giao</h6>
                    <p class="fw-bold mb-0 text-primary"><?= e($order['delivery_slot']) ?> - <?= e($order['delivery_date']) ?></p>
                </div>
                <div class="col-6 mb-3">
                    <h6 class="text-gray-500 mb-1">Ghi chú của khách</h6>
                    <p class="mb-0"><?= e($order['note'] ?: 'Không có') ?></p>
                </div>
            </div>

            <div class="border-top pt-3 mt-3 bg-gray-50 p-3 rounded">
                <h6 class="text-gray-500 mb-2">Thông điệp / Thiệp đính kèm:</h6>
                <blockquote class="blockquote mb-0 fs-6 fst-italic">
                    "<?= e($order['card_message']) ?>"
                </blockquote>
                <?php if ($order['is_anonymous_sender']): ?>
                    <span class="badge bg-danger mt-2">Gửi giấu tên (Không ghi thông tin người tặng)</span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Right Sidebar Panel -->
    <div class="col-12 col-xl-4">
        <!-- Order Status -->
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-3">Trạng Thái Đơn Hàng</h2>
            <div class="mb-3">
                <span class="badge bg-<?= $statusColor ?> fs-6 py-2 px-3 w-100 text-uppercase"><?= e($order['status']) ?></span>
            </div>
            <form action="/admin/orders/<?= $order['id'] ?>/status" method="POST">
                <div class="mb-3">
                    <label for="status" class="form-label text-muted">Cập nhật trạng thái mới</label>
                    <select class="form-select" name="status" id="status">
                        <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>Chờ duyệt</option>
                        <option value="preparing" <?= $order['status'] === 'preparing' ? 'selected' : '' ?>>Đang cắm hoa</option>
                        <option value="shipping" <?= $order['status'] === 'shipping' ? 'selected' : '' ?>>Đang giao (GHN)</option>
                        <option value="completed" <?= $order['status'] === 'completed' ? 'selected' : '' ?>>Đã xong</option>
                        <option value="delivery_failed" <?= $order['status'] === 'delivery_failed' ? 'selected' : '' ?>>Giao thất bại</option>
                        <option value="cancelled" <?= $order['status'] === 'cancelled' ? 'selected' : '' ?>>Đã Hủy</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-primary w-100">Cập Nhật Trạng Thái</button>
            </form>
        </div>

        <!-- Payment Info -->
        <div class="card card-body border-0 shadow mb-4 bg-yellow-100">
            <h2 class="h5 mb-3">Thanh Toán</h2>
            <div class="d-flex justify-content-between mb-2">
                <span>Tạm tính:</span>
                <span class="fw-bold"><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Phí giao hàng:</span>
                <span><?= number_format($order['shipping_fee'], 0, ',', '.') ?>đ</span>
            </div>
            <div class="d-flex justify-content-between mb-3 border-bottom pb-3">
                <span>Giảm giá:</span>
                <span>-<?= number_format($order['discount_amount'], 0, ',', '.') ?>đ</span>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <span class="h6 mb-0">Tổng cộng:</span>
                <span class="h5 text-danger fw-bold mb-0"><?= number_format($order['final_amount'], 0, ',', '.') ?>đ</span>
            </div>
            <span class="badge bg-success w-100 py-2 fs-6"><?= e($order['payment_method']) ?></span>
        </div>

        <!-- Upload Finished Image -->
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-3">Ảnh Thành Phẩm (Proof)</h2>
            <p class="small text-muted mb-3">Chụp ảnh bó hoa thực tế sau khi cắm xong để khách tra cứu an tâm.</p>
            <?php if (!empty($order['finished_image_url'])): ?>
                <img src="<?= e($order['finished_image_url']) ?>" class="img-fluid rounded mb-3" alt="Finished Flower">
            <?php else: ?>
                <div class="alert alert-warning py-2 small">Chưa có ảnh thành phẩm.</div>
            <?php endif; ?>
            <form action="/admin/orders/<?= $order['id'] ?>/upload-finished-image" method="POST" enctype="multipart/form-data">
                <input class="form-control mb-2" type="file" name="finished_image" accept="image/*" required>
                <button type="submit" class="btn btn-sm btn-secondary w-100">Upload Ảnh</button>
            </form>
        </div>
    </div>
</div>
