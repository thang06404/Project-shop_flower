<?php
use Core\View;

$isEdit = isset($coupon);
$title = $isEdit ? "Sửa Mã Giảm Giá" : "Thêm Mã Giảm Giá Mới";
$breadcrumbs = [
    ["title" => "Mã Giảm Giá", "url" => "/admin/coupons"],
    ["title" => $isEdit ? "Chỉnh sửa" : "Thêm mới", "url" => ""]
];
?>

<?php ob_start(); ?>
<a href="/admin/coupons" class="btn btn-sm btn-outline-gray-600 d-inline-flex align-items-center">
    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    Quay Lại
</a>
<?php
$actions = ob_get_clean();

View::component("admin/components/page_header", [
    "title" => $title,
    "subtitle" => "Nhập thông tin, điều kiện và giới hạn của voucher",
    "breadcrumbs" => $breadcrumbs,
    "actions" => $actions,
]);
?>

<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Thiết lập mã khuyến mãi</h2>
            <form action="#" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="code">Mã Code (Chữ hoa & Số)</label>
                        <input class="form-control text-uppercase fw-bold text-primary" id="code" type="text" placeholder="VD: FREESHIP50" value="<?= $isEdit ? e($coupon['code']) : '' ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Trạng Thái</label>
                        <select class="form-select" id="status" required>
                            <option value="active" <?= ($isEdit && $coupon['status'] === 'active') ? 'selected' : '' ?>>Kích hoạt (Đang chạy)</option>
                            <option value="disabled" <?= ($isEdit && $coupon['status'] === 'disabled') ? 'selected' : '' ?>>Khóa tạm thời</option>
                        </select>
                    </div>
                </div>

                <div class="row border-top pt-3 mt-3">
                    <h3 class="h6 mb-3 text-gray-500">Mức giảm giá</h3>
                    <div class="col-md-4 mb-3">
                        <label for="discount_type">Loại giảm giá</label>
                        <select class="form-select" id="discount_type" required>
                            <option value="percent" <?= ($isEdit && $coupon['discount_type'] === 'percent') ? 'selected' : '' ?>>Theo Phần Trăm (%)</option>
                            <option value="fixed" <?= ($isEdit && $coupon['discount_type'] === 'fixed') ? 'selected' : '' ?>>Số Tiền Cố Định (VNĐ)</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="discount_value">Giá trị giảm</label>
                        <input class="form-control" id="discount_value" type="number" min="1" value="<?= $isEdit ? $coupon['discount_value'] : '' ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="max_discount_amount">Giảm tối đa (Nếu theo %)</label>
                        <input class="form-control" id="max_discount_amount" type="number" min="0" placeholder="Để trống nếu không giới hạn" value="<?= $isEdit ? $coupon['max_discount_amount'] : '' ?>">
                    </div>
                </div>

                <div class="row border-top pt-3 mt-3">
                    <h3 class="h6 mb-3 text-gray-500">Điều kiện & Giới hạn</h3>
                    <div class="col-md-6 mb-3">
                        <label for="min_order_value">Giá trị đơn hàng tối thiểu (VNĐ)</label>
                        <input class="form-control" id="min_order_value" type="number" min="0" value="<?= $isEdit ? $coupon['min_order_value'] : '0' ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="usage_limit">Tổng số lượt sử dụng</label>
                        <input class="form-control" id="usage_limit" type="number" min="1" value="<?= $isEdit ? $coupon['usage_limit'] : '100' ?>" required>
                    </div>
                </div>

                <div class="row border-top pt-3 mt-3">
                    <h3 class="h6 mb-3 text-gray-500">Thời gian hiệu lực</h3>
                    <div class="col-md-6 mb-3">
                        <label for="start_date">Từ ngày giờ</label>
                        <input class="form-control" id="start_date" type="datetime-local" value="<?= $isEdit ? $coupon['start_date'] : '' ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_date">Đến ngày giờ</label>
                        <input class="form-control" id="end_date" type="datetime-local" value="<?= $isEdit ? $coupon['end_date'] : '' ?>" required>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary animate-up-2" type="submit">Lưu Mã Giảm Giá</button>
                </div>
            </form>
        </div>
    </div>
</div>
