<?php
use Core\View;

$title = "Quản Lý Đơn Hàng Hoa Tươi";
$breadcrumbs = [["title" => "Đơn Hàng", "url" => ""]];
?>

<!-- 1. Header Toolbar -->
<?php ob_start(); ?>
<div class="btn-group me-2">
    <button type="button" class="btn btn-sm btn-outline-gray-600">Xuất Excel</button>
    <button type="button" class="btn btn-sm btn-outline-gray-600">In Phiếu Giao</button>
</div>
<a href="/admin/orders" class="btn btn-sm btn-primary d-inline-flex align-items-center">
    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
    Làm Mới
</a>
<?php
$actions = ob_get_clean();

View::component("admin/components/page_header", [
    "title" => "Danh Sách Đơn Hàng Hoa Tươi",
    "subtitle" =>
        "Quản lý trạng thái cắm hoa, khung giờ giao hoa hẹn trước & bàn giao shipper GHN",
    "breadcrumbs" => $breadcrumbs,
    "actions" => $actions,
]);
?>

<!-- 2. Table Controls & Filters -->
<div class="table-settings mb-4">
    <div class="row align-items-center justify-content-between g-2">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="input-group">
                <span class="input-group-text">
                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </span>
                <input type="text" class="form-control" placeholder="Tìm theo mã đơn, tên, SĐT khách...">
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 text-end">
            <div class="btn-group">
                <a href="/admin/orders" class="btn btn-sm btn-secondary active">Tất cả</a>
                <a href="/admin/orders?status=pending" class="btn btn-sm btn-outline-secondary">Chờ duyệt</a>
                <a href="/admin/orders?status=preparing" class="btn btn-sm btn-outline-secondary">Đang cắm</a>
                <a href="/admin/orders?status=shipping" class="btn btn-sm btn-outline-secondary">Đang giao</a>
                <a href="/admin/orders?status=completed" class="btn btn-sm btn-outline-secondary">Đã xong</a>
            </div>
        </div>
    </div>
</div>

<!-- 3. Orders Table Card -->
<div class="card card-body border-0 shadow-sm table-wrapper table-responsive mb-4">
    <table class="table table-hover align-items-center mb-0">
        <thead class="thead-light">
            <tr>
                <th class="border-bottom font-small fw-bold"># MÃ ĐƠN</th>
                <th class="border-bottom font-small fw-bold">MẪU HOA</th>
                <th class="border-bottom font-small fw-bold">NGƯỜI NHẬN & ĐỊA CHỈ</th>
                <th class="border-bottom font-small fw-bold">HẸN GIAO (SLOT)</th>
                <th class="border-bottom font-small fw-bold">TỔNG TIỀN</th>
                <th class="border-bottom font-small fw-bold">TRẠNG THÁI</th>
                <th class="border-bottom font-small fw-bold text-end">THAO TÁC</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $orders = $orders ?? [
                [
                    "id" => 1,
                    "code" => "FLW-9021",
                    "product_name" => "Bó Hồng Đỏ Ecuador Kiêu Sa",
                    "product_image" =>
                        "https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=120&q=80",
                    "sender_name" => "Nguyễn Văn Nam",
                    "recipient_name" => "Mai Linh",
                    "phone" => "0908123456",
                    "address" => "72 Lê Thánh Tôn, Bến Nghé, Quận 1, TP.HCM",
                    "delivery_date" => date("d/m/Y"),
                    "delivery_slot" => "14:00 - 16:00",
                    "payment_method" => "MoMo (Đã thanh toán)",
                    "total_amount" => 750000,
                    "status" => "preparing",
                ],
                [
                    "id" => 2,
                    "code" => "FLW-9020",
                    "product_name" => "Hộp Hoa Tulip Hà Lan Pastel",
                    "product_image" =>
                        "https://images.unsplash.com/photo-1520763185298-1b434c919102?auto=format&fit=crop&w=120&q=80",
                    "sender_name" => "Trần Quang Hưng",
                    "recipient_name" => "Phạm Quỳnh Nga",
                    "phone" => "0912345678",
                    "address" => "120 Nguyễn Thị Minh Khai, Q.3, TP.HCM",
                    "delivery_date" => date("d/m/Y"),
                    "delivery_slot" => "16:00 - 18:00",
                    "payment_method" => "COD (Thu hộ)",
                    "total_amount" => 890000,
                    "status" => "confirmed",
                ],
                [
                    "id" => 3,
                    "code" => "FLW-9019",
                    "product_name" => "Chậu Lan Hồ Điệp Phú Quý (3 Cành)",
                    "product_image" =>
                        "https://images.unsplash.com/photo-1525310072745-f49212b5ac6d?auto=format&fit=crop&w=120&q=80",
                    "sender_name" => "Cty TNHH Bất Động Sản Á Châu",
                    "recipient_name" => "Giám đốc Chi Nhánh Nam Sài Gòn",
                    "phone" => "0988776655",
                    "address" => "Tòa nhà Bitexco, Q.1, TP.HCM",
                    "delivery_date" => date("d/m/Y"),
                    "delivery_slot" => "09:00 - 11:00",
                    "payment_method" => "VNPay QR (Đã thanh toán)",
                    "total_amount" => 1200000,
                    "status" => "shipping",
                ],
                [
                    "id" => 4,
                    "code" => "FLW-9018",
                    "product_name" => "Bó Hoa Nắng Mai Tươi Sáng",
                    "product_image" =>
                        "https://images.unsplash.com/photo-1561181286-d3fee7d55364?auto=format&fit=crop&w=120&q=80",
                    "sender_name" => "Lê Thùy Dung",
                    "recipient_name" => "Bà Ngoại Mai Thị Sen",
                    "phone" => "0933221100",
                    "address" => "45 Ung Văn Khiêm, Bình Thạnh, TP.HCM",
                    "delivery_date" => date("d/m/Y"),
                    "delivery_slot" => "08:00 - 10:00",
                    "payment_method" => "Chuyển khoản Vietcombank",
                    "total_amount" => 550000,
                    "status" => "completed",
                ],
            ];

            foreach ($orders as $order): ?>
                <tr>
                    <td>
                        <a href="#" class="fw-bold text-primary font-monospace">#<?= e(
                            $order["code"],
                        ) ?></a>
                        <span class="d-block font-xxs text-muted"><?= e(
                            $order["payment_method"],
                        ) ?></span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="<?= e(
                                $order["product_image"],
                            ) ?>" class="flower-avatar-sm me-2 border flex-shrink-0" alt="Mẫu hoa">
                            <div>
                                <span class="fw-semibold text-gray-900 d-block font-small text-wrap">
                                    <?= e($order["product_name"]) ?>
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-semibold text-gray-900"><?= e(
                            $order["recipient_name"],
                        ) ?> - <span class="text-primary font-monospace"><?= e(
     $order["phone"],
 ) ?></span></div>
                        <small class="text-muted text-wrap d-block font-xxs" title="<?= e(
                            $order["address"],
                        ) ?>">
                            <i class="fa-solid fa-location-dot"></i> <?= e($order["address"]) ?>
                        </small>
                    </td>
                    <td>
                        <div class="fw-bold text-danger font-small">
                            <i class="fa-regular fa-clock"></i> <?= e($order["delivery_slot"]) ?>
                        </div>
                        <small class="text-gray-500 font-xxs">Ngày: <?= e(
                            $order["delivery_date"],
                        ) ?></small>
                    </td>
                    <td>
                        <span class="fw-bold text-gray-900 font-small"><?= format_currency(
                            $order["total_amount"],
                        ) ?></span>
                    </td>
                    <td>
                        <?php View::component("admin/components/status_badge", [
                            "status" => $order["status"],
                        ]); ?>
                    </td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end py-1 shadow-sm border-0">
                                <a class="dropdown-item font-small" href="#" data-bs-toggle="modal" data-bs-target="#modalStatus<?= $order[
                                    "id"
                                ] ?>">
                                    <i class="fa-solid fa-rotate"></i> Cập nhật trạng thái
                                </a>
                                <a class="dropdown-item font-small" href="#" data-bs-toggle="modal" data-bs-target="#modalPhoto<?= $order[
                                    "id"
                                ] ?>">
                                    <i class="fa-solid fa-camera"></i> Chụp ảnh hoa thành phẩm
                                </a>
                                <a class="dropdown-item font-small" href="/tra-cuu-don-hang" target="_blank">
                                    <i class="fa-solid fa-magnifying-glass"></i> Xem trang theo dõi khách
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>

                <!-- Modal Update Status -->
                <div class="modal fade" id="modalStatus<?= $order[
                    "id"
                ] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-small fw-bold">Cập Nhật Trạng Thái Đơn #<?= e(
                                    $order["code"],
                                ) ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="font-small text-muted mb-3">Người nhận: <strong><?= e(
                                    $order["recipient_name"],
                                ) ?></strong> | Hẹn: <?= e(
    $order["delivery_slot"],
) ?></p>
                                <div class="mb-3">
                                    <label class="form-label font-small fw-bold">Chọn trạng thái mới:</label>
                                    <select class="form-select font-small" id="statusSelect<?= $order[
                                        "id"
                                    ] ?>">
                                        <option value="pending" <?= $order[
                                            "status"
                                        ] === "pending"
                                            ? "selected"
                                            : "" ?>>Chờ xác nhận</option>
                                        <option value="confirmed" <?= $order[
                                            "status"
                                        ] === "confirmed"
                                            ? "selected"
                                            : "" ?>>Đã xác nhận</option>
                                        <option value="preparing" <?= $order[
                                            "status"
                                        ] === "preparing"
                                            ? "selected"
                                            : "" ?>>Đang cắm hoa</option>
                                        <option value="shipping" <?= $order[
                                            "status"
                                        ] === "shipping"
                                            ? "selected"
                                            : "" ?>>Đang giao hoa</option>
                                        <option value="completed" <?= $order[
                                            "status"
                                        ] === "completed"
                                            ? "selected"
                                            : "" ?>>Giao thành công</option>
                                        <option value="cancelled" <?= $order[
                                            "status"
                                        ] === "cancelled"
                                            ? "selected"
                                            : "" ?>>Đã hủy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-sm btn-primary" onclick="alert('Đã cập nhật trạng thái đơn thành công!'); location.reload();">Lưu Trạng Thái</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Upload Flower Photo -->
                <div class="modal fade" id="modalPhoto<?= $order[
                    "id"
                ] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-small fw-bold">Ảnh Hoa Thành Phẩm Đơn #<?= e(
                                    $order["code"],
                                ) ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="font-small text-muted mb-3">
                                    Quy định chất lượng: Thợ cắm hoa chụp ảnh thực tế tại bàn cắm trước khi giao shipper GHN để khách hàng duyệt trước.
                                </p>
                                <div class="mb-3 text-center p-4 border rounded bg-light">
                                    <img src="<?= e(
                                        $order["product_image"],
                                    ) ?>" class="img-fluid rounded mb-2" style="max-height: 200px;">
                                    <div>
                                        <input type="file" class="form-control font-small" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-sm btn-success" onclick="alert('Đã tải ảnh thành phẩm lên hệ thống! Khách hàng có thể kiểm tra qua link tra cứu.'); location.reload();">Xác Nhận Đạt Chuẩn</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
            ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
        <nav aria-label="Page navigation">
            <ul class="pagination mb-0 font-small">
                <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Sau</a></li>
            </ul>
        </nav>
        <div class="fw-normal small mt-3 mt-lg-0 text-muted">Hiển thị <b>4</b> trên tổng số <b>24</b> đơn hàng</div>
    </div>
</div>
