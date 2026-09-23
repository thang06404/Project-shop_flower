<?php
use Core\View;

$isEdit = isset($product);
$title = $isEdit ? "Sửa Mẫu Hoa" : "Thêm Mẫu Hoa Mới";
$breadcrumbs = [
    ["title" => "Sản Phẩm", "url" => "/admin/products"],
    ["title" => $isEdit ? "Chỉnh sửa" : "Thêm mới", "url" => ""]
];
?>

<?php ob_start(); ?>
<a href="/admin/products" class="btn btn-sm btn-outline-gray-600 d-inline-flex align-items-center">
    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    Quay Lại
</a>
<?php
$actions = ob_get_clean();

View::component("admin/components/page_header", [
    "title" => $title,
    "subtitle" => "Nhập thông tin sản phẩm hoa, giá và tồn kho",
    "breadcrumbs" => $breadcrumbs,
    "actions" => $actions,
]);
?>

<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Thông tin chung</h2>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Tên Mẫu Hoa</label>
                        <input class="form-control" id="name" type="text" placeholder="Bó hoa Nắng Mai..." value="<?= $isEdit ? e($product['name']) : '' ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sku">Mã SKU</label>
                        <input class="form-control" id="sku" type="text" placeholder="FLW-..." value="<?= $isEdit ? e($product['sku']) : '' ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="category_id">Danh mục chính</label>
                        <select class="form-select" id="category_id" required>
                            <option value="">-- Chọn Danh Mục --</option>
                            <option value="1" <?= ($isEdit && $product['category_id'] == 1) ? 'selected' : '' ?>>Hoa Hướng Dương</option>
                            <option value="2" <?= ($isEdit && $product['category_id'] == 2) ? 'selected' : '' ?>>Lan Hồ Điệp</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Trạng Thái</label>
                        <select class="form-select" id="status" required>
                            <option value="active" <?= ($isEdit && $product['status'] === 'active') ? 'selected' : '' ?>>Đang Bán</option>
                            <option value="draft" <?= ($isEdit && $product['status'] === 'draft') ? 'selected' : '' ?>>Bản Nháp (Chưa bán)</option>
                            <option value="deleted" <?= ($isEdit && $product['status'] === 'deleted') ? 'selected' : '' ?>>Đã Xóa (Ẩn)</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 mb-3">
                        <label for="regular_price">Giá Bán Gốc (VNĐ)</label>
                        <input class="form-control" id="regular_price" type="number" min="0" value="<?= $isEdit ? $product['regular_price'] : '' ?>" required>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="sale_price">Giá Khuyến Mãi (VNĐ)</label>
                        <input class="form-control" id="sale_price" type="number" min="0" value="<?= $isEdit ? $product['sale_price'] : '' ?>">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="stock">Tồn Kho</label>
                        <input class="form-control" id="stock" type="number" min="0" value="<?= $isEdit ? $product['stock'] : '' ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="short_description">Mô tả ngắn</label>
                    <textarea class="form-control" id="short_description" rows="2"><?= $isEdit ? e($product['short_description']) : '' ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="description">Mô tả chi tiết</label>
                    <textarea class="form-control" id="description" rows="5"><?= $isEdit ? e($product['description']) : '' ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh đại diện sản phẩm (Tối đa 2MB)</label>
                    <input class="form-control" type="file" id="image" accept="image/jpeg, image/png, image/webp">
                    <?php if ($isEdit && !empty($product['image'])): ?>
                        <div class="mt-2">
                            <img src="<?= e($product['image']) ?>" alt="Thumbnail" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary animate-up-2" type="submit">Lưu Sản Phẩm</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Sidebar hints -->
    <div class="col-12 col-xl-4">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Lưu ý khi thêm hoa</h2>
            <ul class="list-unstyled mb-0">
                <li class="mb-3">
                    <span class="fw-bold d-block text-gray-800">1. Mã SKU</span>
                    <span class="small text-muted">Mã SKU nên bắt đầu bằng FLW (VD: FLW-HD01) để dễ quản lý kho.</span>
                </li>
                <li class="mb-3">
                    <span class="fw-bold d-block text-gray-800">2. Giá khuyến mãi</span>
                    <span class="small text-muted">Nếu không có khuyến mãi, hãy để trống trường Giá Khuyến Mãi.</span>
                </li>
                <li>
                    <span class="fw-bold d-block text-gray-800">3. Ảnh sản phẩm</span>
                    <span class="small text-muted">Hỗ trợ JPG, PNG, WEBP. Dung lượng không vượt quá 2MB để đảm bảo tốc độ tải trang web.</span>
                </li>
            </ul>
        </div>
    </div>
</div>
