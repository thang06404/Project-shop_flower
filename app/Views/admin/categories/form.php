<?php
use Core\View;

$isEdit = isset($category);
$title = $isEdit ? "Sửa Danh Mục Hoa" : "Thêm Danh Mục Mới";
$breadcrumbs = [
    ["title" => "Danh Mục", "url" => "/admin/categories"],
    ["title" => $isEdit ? "Chỉnh sửa" : "Thêm mới", "url" => ""]
];
?>

<?php ob_start(); ?>
<a href="/admin/categories" class="btn btn-sm btn-outline-gray-600 d-inline-flex align-items-center">
    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    Quay Lại
</a>
<?php
$actions = ob_get_clean();

View::component("admin/components/page_header", [
    "title" => $title,
    "subtitle" => "Nhập thông tin danh mục hoa hoặc dịp tặng hoa",
    "breadcrumbs" => $breadcrumbs,
    "actions" => $actions,
]);
?>

<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Thông tin danh mục</h2>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="name">Tên Danh Mục</label>
                            <input class="form-control" id="name" type="text" placeholder="Nhập tên danh mục..." value="<?= $isEdit ? e($category['name']) : '' ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="slug">Đường dẫn (Slug)</label>
                            <input class="form-control" id="slug" type="text" placeholder="hoa-huong-duong" value="<?= $isEdit ? e($category['slug']) : '' ?>" required>
                            <small class="form-text text-muted">Bỏ trống để tự động tạo từ tên danh mục.</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="type">Loại Danh Mục</label>
                        <select class="form-select" id="type">
                            <option value="flower_type" <?= ($isEdit && $category['type'] === 'flower_type') ? 'selected' : '' ?>>Loại Hoa (vd: Hướng Dương, Hồng)</option>
                            <option value="occasion" <?= ($isEdit && $category['type'] === 'occasion') ? 'selected' : '' ?>>Dịp Tặng (vd: Sinh Nhật, Khai Trương)</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Trạng Thái</label>
                        <select class="form-select" id="status">
                            <option value="active" <?= ($isEdit && $category['status'] === 'active') ? 'selected' : '' ?>>Đang Hiện</option>
                            <option value="deleted" <?= ($isEdit && $category['status'] === 'deleted') ? 'selected' : '' ?>>Đã Ẩn</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh đại diện danh mục</label>
                    <input class="form-control" type="file" id="image" accept="image/*">
                    <?php if ($isEdit && !empty($category['image'])): ?>
                        <div class="mt-2">
                            <img src="<?= e($category['image']) ?>" alt="Thumbnail" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary mt-2 animate-up-2" type="submit">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
