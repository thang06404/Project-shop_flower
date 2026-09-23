<?php
use Core\View;

$title = "Quản Lý Mẫu Hoa & Biến Thể";
$breadcrumbs = [["title" => "Sản Phẩm", "url" => ""]];
?>

<!-- 1. Header Toolbar -->
<?php ob_start(); ?>
<button type="button" class="btn btn-sm btn-primary d-inline-flex align-items-center me-2">
    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
    Thêm Mẫu Hoa Mới
</button>
<button type="button" class="btn btn-sm btn-outline-gray-600 d-inline-flex align-items-center">
    Cập Nhật Kho Hoa Cành
</button>
<?php
$actions = ob_get_clean();

View::component("admin/components/page_header", [
    "title" => "Kho Mẫu Hoa Tươi & Bó Hoa",
    "subtitle" =>
        "Danh sách sản phẩm hoa, giá niêm yết, tồn kho cành và trạng thái hiển thị trên website",
    "breadcrumbs" => $breadcrumbs,
    "actions" => $actions,
]);
?>

<!-- 2. Product Table Card -->
<div class="card card-body border-0 shadow-sm table-wrapper table-responsive mb-4">
    <table class="table table-hover align-items-center mb-0">
        <thead class="thead-light">
            <tr>
                <th class="border-bottom font-small fw-bold">MẪU HOA</th>
                <th class="border-bottom font-small fw-bold">MÃ SKU</th>
                <th class="border-bottom font-small fw-bold">DANH MỤC / DỊP</th>
                <th class="border-bottom font-small fw-bold">GIÁ BÁN</th>
                <th class="border-bottom font-small fw-bold">TỒN KHO</th>
                <th class="border-bottom font-small fw-bold">TRẠNG THÁI</th>
                <th class="border-bottom font-small fw-bold text-end">THAO TÁC</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $products = $products ?? [
                [
                    "id" => 1,
                    "sku" => "FLW-NM01",
                    "name" => "Bó Hoa Nắng Mai Tươi Sáng",
                    "image" =>
                        "https://images.unsplash.com/photo-1561181286-d3fee7d55364?auto=format&fit=crop&w=120&q=80",
                    "category" => "Hoa Hướng Dương, Sinh Nhật",
                    "regular_price" => 550000,
                    "sale_price" => 450000,
                    "stock" => 20,
                    "status" => "active",
                ],
                [
                    "id" => 2,
                    "sku" => "FLW-HD01",
                    "name" => "Bó Hồng Đỏ Ecuador Kiêu Sa",
                    "image" =>
                        "https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=120&q=80",
                    "category" => "Hoa Hồng Ecuador, Tình Yêu",
                    "regular_price" => 750000,
                    "sale_price" => 680000,
                    "stock" => 15,
                    "status" => "active",
                ],
                [
                    "id" => 3,
                    "sku" => "FLW-LHD03",
                    "name" => "Chậu Lan Hồ Điệp Phú Quý (3 Cành)",
                    "image" =>
                        "https://images.unsplash.com/photo-1525310072745-f49212b5ac6d?auto=format&fit=crop&w=120&q=80",
                    "category" => "Lan Hồ Điệp, Khai Trương",
                    "regular_price" => 1200000,
                    "sale_price" => null,
                    "stock" => 10,
                    "status" => "active",
                ],
                [
                    "id" => 4,
                    "sku" => "FLW-TL01",
                    "name" => "Hộp Hoa Tulip Hà Lan Pastel",
                    "image" =>
                        "https://images.unsplash.com/photo-1520763185298-1b434c919102?auto=format&fit=crop&w=120&q=80",
                    "category" => "Hoa Tulip Hà Lan, 8/3 - 20/10",
                    "regular_price" => 890000,
                    "sale_price" => 820000,
                    "stock" => 12,
                    "status" => "active",
                ],
            ];

            foreach ($products as $p): ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="<?= e(
                                $p["image"],
                            ) ?>" class="flower-avatar-sm me-3 border flex-shrink-0" alt="Hoa">
                            <div class="text-wrap">
                                <h6 class="mb-0 fs-7 fw-bold text-gray-900"><?= e(
                                    $p["name"],
                                ) ?></h6>
                                <small class="text-muted font-xxs">ID: #<?= $p[
                                    "id"
                                ] ?></small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="font-monospace fw-semibold text-primary font-small"><?= e(
                            $p["sku"],
                        ) ?></span>
                    </td>
                    <td>
                        <span class="badge bg-gray-800 text-white font-xxs px-2 py-1"><?= e(
                            $p["category"],
                        ) ?></span>
                    </td>
                    <td>
                        <?php if ($p["sale_price"]): ?>
                            <span class="fw-bold text-danger font-small"><?= format_currency(
                                $p["sale_price"],
                            ) ?></span>
                            <small class="text-muted text-decoration-line-through d-block font-xxs"><?= format_currency(
                                $p["regular_price"],
                            ) ?></small>
                        <?php else: ?>
                            <span class="fw-bold text-gray-900 font-small"><?= format_currency(
                                $p["regular_price"],
                            ) ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="fw-bold <?= $p["stock"] > 10
                            ? "text-success"
                            : "text-warning" ?> font-small">
                            <?= $p["stock"] ?> bó
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-success-subtle text-success border border-success font-xxs">Đang hiển thị</span>
                    </td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis fs-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end py-1 shadow-sm border-0">
                                <a class="dropdown-item font-small" href="#">
                                    <i class="fa-solid fa-pen me-2"></i> Chỉnh sửa
                                </a>
                                <a class="dropdown-item font-small text-danger" href="#">
                                    <i class="fa-solid fa-eye-slash me-2"></i> Ẩn sản phẩm
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach;
            ?>
        </tbody>
    </table>
</div>
