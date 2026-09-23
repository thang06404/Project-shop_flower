<?php
use Core\View;

$title = "Quản Lý Mã Giảm Giá";
$breadcrumbs = [["title" => "Mã Giảm Giá", "url" => ""]];
?>

<?php ob_start(); ?>
<a href="/admin/coupons/create" class="btn btn-sm btn-primary d-inline-flex align-items-center">
    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
    Thêm Mã Mới
</a>
<?php
$actions = ob_get_clean();

View::component("admin/components/page_header", [
    "title" => "Danh Sách Mã Giảm Giá (Coupons)",
    "subtitle" => "Quản lý các chương trình khuyến mãi, voucher cho khách hàng.",
    "breadcrumbs" => $breadcrumbs,
    "actions" => $actions,
]);
?>

<div class="card card-body border-0 shadow-sm table-wrapper table-responsive mb-4">
    <table class="table table-hover align-items-center mb-0">
        <thead class="thead-light">
            <tr>
                <th class="border-bottom font-small fw-bold">MÃ CODE</th>
                <th class="border-bottom font-small fw-bold">MỨC GIẢM</th>
                <th class="border-bottom font-small fw-bold">ĐIỀU KIỆN</th>
                <th class="border-bottom font-small fw-bold">LƯỢT DÙNG</th>
                <th class="border-bottom font-small fw-bold">HẠN SỬ DỤNG</th>
                <th class="border-bottom font-small fw-bold">TRẠNG THÁI</th>
                <th class="border-bottom font-small fw-bold text-end">THAO TÁC</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $coupons = $coupons ?? [];
            foreach ($coupons as $cp): ?>
                <tr>
                    <td>
                        <span class="fw-bold text-primary fs-6"><?= e($cp['code']) ?></span>
                    </td>
                    <td>
                        <?php if ($cp['discount_type'] === 'percent'): ?>
                            <span class="fw-bold text-danger">-<?= $cp['discount_value'] ?>%</span>
                            <?php if ($cp['max_discount_amount']): ?>
                                <br><small class="text-muted">Tối đa <?= number_format($cp['max_discount_amount'], 0, ',', '.') ?>đ</small>
                            <?php endif; ?>
                        <?php else: ?>
                            <span class="fw-bold text-danger">-<?= number_format($cp['discount_value'], 0, ',', '.') ?>đ</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="text-gray-700 small">Đơn tối thiểu:<br><?= number_format($cp['min_order_value'], 0, ',', '.') ?>đ</span>
                    </td>
                    <td>
                        <div class="progress-wrapper">
                            <div class="progress-info mb-1">
                                <div class="progress-percentage text-dark fw-bold">
                                    <span><?= $cp['used_count'] ?> / <?= $cp['usage_limit'] ?></span>
                                </div>
                            </div>
                            <div class="progress">
                                <?php $percent = ($cp['usage_limit'] > 0) ? ($cp['used_count'] / $cp['usage_limit'] * 100) : 0; ?>
                                <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percent ?>%;" aria-valuenow="<?= $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </td>
                    <td><span class="text-gray-600 small"><?= date('d/m/Y H:i', strtotime($cp['end_date'])) ?></span></td>
                    <td>
                        <?php if ($cp['status'] === 'active'): ?>
                            <span class="badge bg-success">Đang Chạy</span>
                        <?php elseif ($cp['status'] === 'expired'): ?>
                            <span class="badge bg-warning text-dark">Hết Hạn</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Đã Khóa</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis fs-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end py-1 shadow-sm border-0">
                                <a class="dropdown-item font-small" href="/admin/coupons/<?= $cp['id'] ?>/edit">
                                    <i class="fa-solid fa-pen me-2"></i> Chỉnh sửa
                                </a>
                                <a class="dropdown-item font-small text-danger" href="#">
                                    <i class="fa-solid fa-trash me-2"></i> Xóa
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
