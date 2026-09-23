<?php
use Core\View;

$title = "Quản Lý Danh Mục Hoa";
$breadcrumbs = [["title" => "Danh Mục", "url" => ""]];
?>

<!-- 1. Header Toolbar -->
<?php ob_start(); ?>
<a href="/admin/categories/create" class="btn btn-sm btn-primary d-inline-flex align-items-center me-2">
    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
    Thêm Danh Mục Mới
</a>
<?php
$actions = ob_get_clean();

View::component("admin/components/page_header", [
    "title" => "Danh Mục Sản Phẩm",
    "subtitle" => "Quản lý các loại hoa và dịp tặng hoa",
    "breadcrumbs" => $breadcrumbs,
    "actions" => $actions,
]);
?>

<!-- 2. Category Table Card -->
<div class="card card-body border-0 shadow-sm table-wrapper table-responsive mb-4">
    <table class="table table-hover align-items-center mb-0">
        <thead class="thead-light">
            <tr>
                <th class="border-bottom font-small fw-bold">ID</th>
                <th class="border-bottom font-small fw-bold">DANH MỤC</th>
                <th class="border-bottom font-small fw-bold">LOẠI DANH MỤC</th>
                <th class="border-bottom font-small fw-bold">TRẠNG THÁI</th>
                <th class="border-bottom font-small fw-bold text-end">THAO TÁC</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $categories = $categories ?? [];
            foreach ($categories as $cat): ?>
                <tr>
                    <td><span class="fw-bold">#<?= $cat['id'] ?></span></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="<?= e($cat['image']) ?>" class="rounded bg-gray-200 flex-shrink-0" width="40" height="40" style="object-fit: cover;" alt="<?= e($cat['name']) ?>">
                            <div class="ms-3 text-wrap">
                                <span class="fw-bold d-block text-gray-800"><?= e($cat['name']) ?></span>
                                <span class="small text-muted">/<?= e($cat['slug']) ?></span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php if ($cat['type'] === 'flower_type'): ?>
                            <span class="badge bg-info">Loại Hoa</span>
                        <?php else: ?>
                            <span class="badge bg-warning">Dịp Tặng</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($cat['status'] === 'active'): ?>
                            <span class="badge bg-success">Đang hiện</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Đã ẩn</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis fs-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end py-1 shadow-sm border-0">
                                <a class="dropdown-item font-small" href="/admin/categories/<?= $cat['id'] ?>/edit">
                                    <i class="fa-solid fa-pen me-2"></i> Chỉnh sửa
                                </a>
                                <a class="dropdown-item font-small text-danger" href="#">
                                    <i class="fa-solid fa-trash me-2"></i> Xóa danh mục
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
