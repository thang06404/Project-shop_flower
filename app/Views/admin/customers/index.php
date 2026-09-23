<?php
use Core\View;

$title = "Quản Lý Khách Hàng";
$breadcrumbs = [["title" => "Khách Hàng", "url" => ""]];
?>

<?php ob_start(); ?>
<button type="button" class="btn btn-sm btn-outline-gray-600 d-inline-flex align-items-center">
    Xuất Danh Sách
</button>
<?php
$actions = ob_get_clean();

View::component("admin/components/page_header", [
    "title" => "Danh Sách Khách Hàng",
    "subtitle" => "Quản lý thông tin tài khoản và phân tích lịch sử mua hàng.",
    "breadcrumbs" => $breadcrumbs,
    "actions" => $actions,
]);
?>

<div class="card card-body border-0 shadow-sm table-wrapper table-responsive mb-4">
    <table class="table table-hover align-items-center mb-0">
        <thead class="thead-light">
            <tr>
                <th class="border-bottom font-small fw-bold">KHÁCH HÀNG</th>
                <th class="border-bottom font-small fw-bold">NGÀY ĐĂNG KÝ</th>
                <th class="border-bottom font-small fw-bold">SỐ ĐƠN HÀNG</th>
                <th class="border-bottom font-small fw-bold">TỔNG CHI TIÊU</th>
                <th class="border-bottom font-small fw-bold">TRẠNG THÁI</th>
                <th class="border-bottom font-small fw-bold text-end">THAO TÁC</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $customers = $customers ?? [];
            foreach ($customers as $cus): ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avatar bg-gray-200 text-primary fw-bold rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                <?= mb_substr($cus['name'], 0, 1) ?>
                            </div>
                            <div class="ms-3 text-wrap">
                                <span class="fw-bold d-block text-gray-800"><?= e($cus['name']) ?></span>
                                <span class="small text-muted"><?= e($cus['email']) ?> - <?= e($cus['phone']) ?></span>
                            </div>
                        </div>
                    </td>
                    <td><span class="text-gray-600"><?= e($cus['created_at']) ?></span></td>
                    <td><span class="fw-bold"><?= $cus['total_orders'] ?> đơn</span></td>
                    <td><span class="text-danger fw-bold"><?= number_format($cus['total_spent'], 0, ',', '.') ?>đ</span></td>
                    <td>
                        <?php if ($cus['status'] === 'active'): ?>
                            <span class="badge bg-success">Hoạt Động</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Bị Khóa</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis fs-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end py-1 shadow-sm border-0">
                                <a class="dropdown-item font-small" href="/admin/customers/<?= $cus['id'] ?>/edit">
                                    <i class="fa-solid fa-pen me-2"></i> Chỉnh sửa
                                </a>
                                <a class="dropdown-item font-small text-danger" href="#">
                                    <i class="fa-solid fa-ban me-2"></i> Khóa tài khoản
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
