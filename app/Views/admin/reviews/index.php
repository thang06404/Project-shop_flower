<?php
use Core\View;

$title = "Đánh Giá & Bình Luận";
$breadcrumbs = [["title" => "Đánh Giá", "url" => ""]];
?>

<?php ob_start(); ?>
<a href="#" class="btn btn-sm btn-outline-gray-600 d-inline-flex align-items-center">
    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
    Lọc Đánh Giá
</a>
<?php
$actions = ob_get_clean();

View::component("admin/components/page_header", [
    "title" => "Quản Lý Đánh Giá Của Khách Hàng",
    "subtitle" => "Duyệt hoặc ẩn bình luận, phản hồi cho các đơn hàng đã giao thành công.",
    "breadcrumbs" => $breadcrumbs,
    "actions" => $actions,
]);
?>

<div class="card card-body border-0 shadow-sm table-wrapper table-responsive mb-4">
    <table class="table table-hover align-items-center mb-0">
        <thead class="thead-light">
            <tr>
                <th class="border-bottom font-small fw-bold">KHÁCH HÀNG</th>
                <th class="border-bottom font-small fw-bold">SẢN PHẨM</th>
                <th class="border-bottom font-small fw-bold" style="width: 300px;">NỘI DUNG</th>
                <th class="border-bottom font-small fw-bold text-center">ĐÁNH GIÁ</th>
                <th class="border-bottom font-small fw-bold">TRẠNG THÁI</th>
                <th class="border-bottom font-small fw-bold text-end">THAO TÁC</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $reviews = $reviews ?? [];
            foreach ($reviews as $rv): ?>
                <tr>
                    <td>
                        <div class="d-block">
                            <span class="fw-bold text-gray-800"><?= e($rv['customer']) ?></span>
                            <div class="small text-muted"><?= e($rv['created_at']) ?></div>
                        </div>
                    </td>
                    <td><span class="text-primary fw-bold"><?= e($rv['product_name']) ?></span></td>
                    <td style="white-space: normal;"><p class="mb-0 text-gray-600 small">"<?= e($rv['comment']) ?>"</p></td>
                    <td class="text-center">
                        <div class="d-flex align-items-center justify-content-center text-warning">
                            <?php for ($i = 0; $i < $rv['rating']; $i++): ?>
                                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <?php endfor; ?>
                        </div>
                    </td>
                    <td>
                        <?php if ($rv['status'] === 'approved'): ?>
                            <span class="badge bg-success">Đã Duyệt</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Đã Ẩn</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis fs-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end py-1 shadow-sm border-0">
                                <form action="/admin/reviews/<?= $rv['id'] ?>/status" method="POST" class="m-0">
                                    <input type="hidden" name="status" value="<?= $rv['status'] === 'approved' ? 'hidden' : 'approved' ?>">
                                    <button type="submit" class="dropdown-item font-small">
                                        <?php if ($rv['status'] === 'approved'): ?>
                                            <i class="fa-solid fa-eye-slash me-2 text-danger"></i> Ẩn đánh giá
                                        <?php else: ?>
                                            <i class="fa-solid fa-eye me-2 text-success"></i> Duyệt đánh giá
                                        <?php endif; ?>
                                    </button>
                                </form>
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
