<?php
// Layout is provided by View.php
?>
<div class="bg-light py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Trang Chủ</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Sản Phẩm</a></li>
                <li class="breadcrumb-item active text-dark fw-medium" aria-current="page"><?= e($product['name']) ?></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <!-- Product Info -->
    <div class="row g-5 mb-5">
        <!-- Images -->
        <div class="col-lg-6">
            <div class="card border-0 rounded-4 overflow-hidden mb-3 shadow-sm">
                <img src="<?= $product['images'][0] ?>" class="img-fluid w-100 object-fit-cover" style="height: 500px;" id="mainImage" alt="<?= e($product['name']) ?>">
            </div>
            <div class="row g-2">
                <?php foreach ($product['images'] as $index => $img): ?>
                <div class="col-3">
                    <img src="<?= $img ?>" class="img-fluid rounded-3 cursor-pointer object-fit-cover thumbnail-img <?= $index === 0 ? 'border border-2 border-danger' : 'opacity-75' ?>" style="height: 80px;" onclick="changeImage(this, '<?= $img ?>')" alt="Thumbnail">
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Details -->
        <div class="col-lg-6">
            <h1 class="h2 fw-bold font-serif text-dark mb-2"><?= e($product['name']) ?></h1>
            <div class="d-flex align-items-center mb-3">
                <div class="me-3">
                    <?php for($i=1; $i<=5; $i++): ?>
                        <i class="fa-solid fa-star <?= $i <= $product['rating'] ? 'text-warning' : 'text-gray-300' ?>"></i>
                    <?php endfor; ?>
                </div>
                <span class="text-muted small">Mã SP: <span class="fw-bold text-dark"><?= e($product['sku']) ?></span></span>
                <span class="text-muted mx-2">|</span>
                <span class="text-muted small"><?= $product['reviews_count'] ?> Đánh giá</span>
            </div>

            <div class="mb-4">
                <?php if ($product['sale_price']): ?>
                    <span class="display-6 fw-bold text-danger me-3"><?= number_format($product['sale_price'], 0, ',', '.') ?>đ</span>
                    <span class="h4 text-muted text-decoration-line-through fw-normal"><?= number_format($product['regular_price'], 0, ',', '.') ?>đ</span>
                    <span class="badge bg-danger ms-2 align-middle">-<?= round((1 - $product['sale_price']/$product['regular_price']) * 100) ?>%</span>
                <?php else: ?>
                    <span class="display-6 fw-bold text-dark"><?= number_format($product['regular_price'], 0, ',', '.') ?>đ</span>
                <?php endif; ?>
            </div>

            <div class="text-gray-600 mb-4 lh-lg">
                <?= $product['description'] ?>
            </div>

            <div class="bg-light p-3 rounded-3 mb-4 border border-light">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa-solid fa-truck-fast text-success fs-5 me-3"></i>
                    <span class="fw-medium">Giao hỏa tốc 1-2H nội thành TP.HCM</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fa-solid fa-camera text-primary fs-5 me-3"></i>
                    <span class="fw-medium">Chụp ảnh sản phẩm thật trước khi giao</span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-envelope-open-text text-warning fs-5 me-3"></i>
                    <span class="fw-medium">Tặng kèm thiệp chúc mừng, banner in ấn</span>
                </div>
            </div>

            <form action="/gio-hang/them" method="POST">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                
                <div class="mb-4">
                    <label class="form-label fw-bold small text-uppercase">Số Lượng</label>
                    <div class="input-group" style="width: 140px;">
                        <button class="btn btn-outline-secondary px-3 btn-qty-minus" type="button"><i class="fa-solid fa-minus"></i></button>
                        <input type="number" class="form-control text-center bg-white" name="quantity" id="qtyInput" value="1" min="1" max="<?= $product['stock'] ?>" readonly>
                        <button class="btn btn-outline-secondary px-3 btn-qty-plus" type="button"><i class="fa-solid fa-plus"></i></button>
                    </div>
                    <div class="small text-muted mt-2">Còn lại <?= $product['stock'] ?> sản phẩm</div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small text-uppercase">Nội dung thiệp / Banner (Tùy chọn)</label>
                    <textarea class="form-control bg-light border-0" name="message" rows="2" placeholder="Ví dụ: Chúc mừng khai trương hồng phát..."></textarea>
                </div>

                <div class="d-grid gap-2 d-md-flex">
                    <button type="submit" class="btn btn-danger btn-lg px-5 fw-bold rounded-pill shadow-sm" style="flex: 2;">
                        <i class="fa-solid fa-cart-plus me-2"></i> Thêm Vào Giỏ Hàng
                    </button>
                    <button type="button" class="btn btn-outline-dark btn-lg rounded-pill" style="flex: 1;">
                        <i class="fa-regular fa-heart me-2"></i> Yêu Thích
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Related Products -->
    <div class="mt-5 pt-5 border-top">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h3 class="fw-bold font-serif mb-0">Sản Phẩm Tương Tự</h3>
            <a href="#" class="text-danger text-decoration-none fw-medium">Xem thêm <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
        <div class="row g-4">
            <?php foreach ($relatedProducts as $rp): ?>
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 product-card overflow-hidden">
                        <a href="/san-pham/<?= $rp['slug'] ?>" class="text-decoration-none">
                            <img src="<?= $rp['image'] ?>" class="card-img-top object-fit-cover" style="height: 250px;" alt="<?= e($rp['name']) ?>">
                            <div class="card-body p-3 text-center">
                                <h6 class="card-title fw-bold text-dark text-truncate"><?= e($rp['name']) ?></h6>
                                <?php if ($rp['sale_price']): ?>
                                    <span class="fw-bold text-danger"><?= number_format($rp['sale_price'], 0, ',', '.') ?>đ</span>
                                    <span class="text-muted text-decoration-line-through small ms-2"><?= number_format($rp['regular_price'], 0, ',', '.') ?>đ</span>
                                <?php else: ?>
                                    <span class="fw-bold text-dark"><?= number_format($rp['regular_price'], 0, ',', '.') ?>đ</span>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
function changeImage(element, src) {
    document.getElementById('mainImage').src = src;
    document.querySelectorAll('.thumbnail-img').forEach(img => {
        img.classList.remove('border', 'border-2', 'border-danger');
        img.classList.add('opacity-75');
    });
    element.classList.remove('opacity-75');
    element.classList.add('border', 'border-2', 'border-danger');
}

$(document).ready(function() {
    $('.btn-qty-minus, .btn-qty-plus').on('click', function() {
        const change = $(this).hasClass('btn-qty-plus') ? 1 : -1;
        const $input = $('#qtyInput');
        let val = parseInt($input.val()) + change;
        const max = parseInt($input.attr('max'));
        
        if (val < 1) val = 1;
        if (val > max) val = max;
        
        $input.val(val);
    });
});
</script>

<style>
.cursor-pointer { cursor: pointer; }
.product-card:hover img {
    transform: scale(1.05);
    transition: transform 0.3s ease;
}
.product-card img {
    transition: transform 0.3s ease;
}
</style>
