<?php
// Layout is provided by View.php wrapper
?>
<!-- Breadcrumb -->
<div class="bg-light py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Trang Chủ</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Danh Mục</a></li>
                <li class="breadcrumb-item active text-dark fw-medium" aria-current="page"><?= e($categoryName) ?></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3 mb-4 mb-lg-0">
            <div class="card border-0 shadow-sm rounded-4 position-sticky" style="top: 100px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold font-serif mb-4">Bộ Lọc</h5>
                    
                    <!-- Filter by Price -->
                    <div class="mb-4">
                        <h6 class="fw-bold small text-uppercase mb-3">Mức Giá</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="price" id="price1">
                            <label class="form-check-label small text-muted" for="price1">Dưới 500k</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="price" id="price2">
                            <label class="form-check-label small text-muted" for="price2">500k - 1 Triệu</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="price" id="price3">
                            <label class="form-check-label small text-muted" for="price3">1 Triệu - 2 Triệu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="price" id="price4">
                            <label class="form-check-label small text-muted" for="price4">Trên 2 Triệu</label>
                        </div>
                    </div>

                    <!-- Filter by Color -->
                    <div class="mb-4">
                        <h6 class="fw-bold small text-uppercase mb-3">Màu Sắc</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge rounded-circle border p-2 bg-danger" title="Đỏ" style="width: 24px; height: 24px; cursor: pointer;"></span>
                            <span class="badge rounded-circle border p-2 bg-warning" title="Vàng" style="width: 24px; height: 24px; cursor: pointer;"></span>
                            <span class="badge rounded-circle border p-2 bg-white" title="Trắng" style="width: 24px; height: 24px; cursor: pointer;"></span>
                            <span class="badge rounded-circle border p-2 bg-info" title="Xanh" style="width: 24px; height: 24px; cursor: pointer;"></span>
                            <span class="badge rounded-circle border p-2" title="Hồng" style="width: 24px; height: 24px; background-color: #ffb6c1; cursor: pointer;"></span>
                        </div>
                    </div>

                    <button class="btn btn-outline-danger w-100 rounded-pill font-small fw-bold">Xóa Lọc</button>
                </div>
            </div>
        </div>

        <!-- Main Product Grid -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 fw-bold font-serif mb-0"><?= e($categoryName) ?></h1>
                <div class="d-flex align-items-center gap-2">
                    <span class="small text-muted text-nowrap">Sắp xếp:</span>
                    <select class="form-select form-select-sm border-0 bg-light shadow-none fw-medium" style="width: 150px;">
                        <option>Mới nhất</option>
                        <option>Bán chạy</option>
                        <option>Giá thấp đến cao</option>
                        <option>Giá cao đến thấp</option>
                    </select>
                </div>
            </div>

            <div class="row g-4">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-6 col-xl-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 product-card overflow-hidden">
                            <a href="/san-pham/<?= $product['slug'] ?>" class="text-decoration-none">
                                <div class="position-relative overflow-hidden">
                                    <img src="<?= $product['image'] ?>" class="card-img-top object-fit-cover" alt="<?= e($product['name']) ?>" style="height: 280px; transition: transform 0.3s ease;">
                                    <?php if ($product['sale_price']): ?>
                                        <div class="position-absolute top-0 start-0 m-3">
                                            <span class="badge bg-danger rounded-pill px-3 py-2 fw-bold shadow-sm">-<?= round((1 - $product['sale_price']/$product['regular_price']) * 100) ?>%</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body p-4 text-center">
                                    <h5 class="card-title fw-bold text-dark fs-6 mb-2 text-truncate" title="<?= e($product['name']) ?>"><?= e($product['name']) ?></h5>
                                    <div class="mb-2">
                                        <?php for($i=1; $i<=5; $i++): ?>
                                            <i class="fa-solid fa-star <?= $i <= $product['rating'] ? 'text-warning' : 'text-gray-300' ?> font-xxs"></i>
                                        <?php endfor; ?>
                                        <span class="text-muted small ms-1">(<?= $product['reviews'] ?>)</span>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <?php if ($product['sale_price']): ?>
                                            <span class="fs-5 fw-bold text-danger"><?= number_format($product['sale_price'], 0, ',', '.') ?>đ</span>
                                            <span class="text-muted text-decoration-line-through small"><?= number_format($product['regular_price'], 0, ',', '.') ?>đ</span>
                                        <?php else: ?>
                                            <span class="fs-5 fw-bold text-dark"><?= number_format($product['regular_price'], 0, ',', '.') ?>đ</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                            <div class="card-footer bg-white border-0 p-4 pt-0">
                                <form action="/gio-hang/them" method="POST">
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <button class="btn btn-primary w-100 rounded-pill fw-bold hover-lift">
                                        <i class="fa-solid fa-cart-plus me-2"></i>Chọn Mua
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <nav class="mt-5">
                <ul class="pagination justify-content-center border-0">
                    <li class="page-item disabled"><a class="page-link rounded-circle me-2 border-0 bg-light text-muted" href="#"><i class="fa-solid fa-chevron-left"></i></a></li>
                    <li class="page-item active"><a class="page-link rounded-circle me-2 border-0 shadow-sm" href="#">1</a></li>
                    <li class="page-item"><a class="page-link rounded-circle me-2 border-0 bg-light text-dark" href="#">2</a></li>
                    <li class="page-item"><a class="page-link rounded-circle me-2 border-0 bg-light text-dark" href="#">3</a></li>
                    <li class="page-item"><a class="page-link rounded-circle border-0 bg-light text-dark" href="#"><i class="fa-solid fa-chevron-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<style>
.product-card:hover img {
    transform: scale(1.05);
}
.hover-lift {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.hover-lift:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
</style>
