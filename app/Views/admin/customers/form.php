<?php
use Core\View;

$title = "Cập Nhật Khách Hàng";
$breadcrumbs = [
    ["title" => "Khách Hàng", "url" => "/admin/customers"],
    ["title" => "Chỉnh sửa", "url" => ""]
];
?>

<?php ob_start(); ?>
<a href="/admin/customers" class="btn btn-sm btn-outline-gray-600 d-inline-flex align-items-center">
    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    Quay Lại
</a>
<?php
$actions = ob_get_clean();

View::component("admin/components/page_header", [
    "title" => $title,
    "subtitle" => "Chỉnh sửa trạng thái hoặc thông tin người dùng",
    "breadcrumbs" => $breadcrumbs,
    "actions" => $actions,
]);
?>

<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Thông tin người dùng</h2>
            <form action="#" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="name">Họ & Tên</label>
                        <input class="form-control" id="name" type="text" value="<?= e($customer['name']) ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="email" value="<?= e($customer['email']) ?>" required readonly>
                        <small class="form-text text-muted">Không thể thay đổi email đã đăng ký.</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone">Số điện thoại</label>
                        <input class="form-control" id="phone" type="text" value="<?= e($customer['phone']) ?>" required>
                    </div>
                </div>

                <div class="row border-top pt-3 mt-3">
                    <div class="col-md-6 mb-3">
                        <label for="status">Trạng thái tài khoản</label>
                        <select class="form-select" id="status" required>
                            <option value="active" <?= $customer['status'] === 'active' ? 'selected' : '' ?>>Hoạt Động (Được phép đăng nhập)</option>
                            <option value="banned" <?= $customer['status'] === 'banned' ? 'selected' : '' ?>>Khóa (Cấm đăng nhập)</option>
                        </select>
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary animate-up-2" type="submit">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
