<?php
// Layout is provided by View.php
?>
<div class="bg-light py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Trang Chủ</a></li>
                <li class="breadcrumb-item active text-dark fw-medium" aria-current="page">Giỏ Hàng</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <h2 class="fw-bold font-serif mb-4">Giỏ Hàng Của Bạn</h2>

    <?php if (empty($cartItems)): ?>
        <div class="text-center py-5">
            <i class="fa-solid fa-cart-arrow-down text-gray-300 mb-3" style="font-size: 80px;"></i>
            <h4 class="text-muted fw-bold">Giỏ hàng đang trống</h4>
            <p class="text-muted mb-4">Chưa có sản phẩm nào trong giỏ hàng của bạn.</p>
            <a href="/" class="btn btn-primary rounded-pill px-4 py-2 fw-bold">Tiếp Tục Mua Sắm</a>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-borderless align-middle mb-0">
                                <thead class="bg-light text-muted small text-uppercase">
                                    <tr>
                                        <th class="ps-4 py-3" style="width: 50%;">Sản Phẩm</th>
                                        <th class="py-3 text-center">Số Lượng</th>
                                        <th class="py-3 text-end">Tổng</th>
                                        <th class="pe-4 py-3 text-center">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cartItems as $item): ?>
                                        <tr class="border-bottom">
                                            <td class="ps-4 py-4">
                                                <div class="d-flex align-items-center">
                                                    <a href="/san-pham/<?= $item['slug'] ?>" class="flex-shrink-0">
                                                        <img src="<?= $item['image'] ?>" alt="<?= e($item['name']) ?>" class="rounded-3 object-fit-cover" style="width: 80px; height: 80px;">
                                                    </a>
                                                    <div class="ms-3">
                                                        <h6 class="fw-bold mb-1"><a href="/san-pham/<?= $item['slug'] ?>" class="text-dark text-decoration-none"><?= e($item['name']) ?></a></h6>
                                                        <span class="text-danger fw-bold small"><?= number_format($item['price'], 0, ',', '.') ?>đ</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-4">
                                                <div class="d-flex justify-content-center">
                                                    <form class="d-flex align-items-center input-group input-group-sm" style="width: 110px;">
                                                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                        <button class="btn btn-outline-secondary px-2 btn-cart-minus" type="button" data-price="<?= $item['price'] ?>"><i class="fa-solid fa-minus font-xxs"></i></button>
                                                        <input type="number" name="quantity" class="form-control text-center px-1 qty-input" value="<?= $item['quantity'] ?>" min="1" readonly>
                                                        <button class="btn btn-outline-secondary px-2 btn-cart-plus" type="button" data-price="<?= $item['price'] ?>"><i class="fa-solid fa-plus font-xxs"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="py-4 text-end fw-bold text-dark">
                                                <?= number_format($item['total'], 0, ',', '.') ?>đ
                                            </td>
                                            <td class="pe-4 py-4 text-center">
                                                <form action="/gio-hang/xoa" method="POST">
                                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                    <button type="submit" class="btn btn-link text-danger p-0" title="Xóa">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-between align-items-center">
                    <a href="/" class="text-decoration-none text-muted fw-medium"><i class="fa-solid fa-arrow-left me-2"></i>Tiếp tục mua sắm</a>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 bg-light">
                    <div class="card-body p-4">
                        <h5 class="fw-bold font-serif mb-4">Tóm Tắt Đơn Hàng</h5>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Tạm tính (<?= count($cartItems) ?> sản phẩm)</span>
                            <span class="fw-medium text-dark"><?= number_format($subtotal, 0, ',', '.') ?>đ</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Phí vận chuyển</span>
                            <span class="fw-medium text-dark"><?= number_format($shipping, 0, ',', '.') ?>đ</span>
                        </div>

                        <!-- Coupon Form -->
                        <div class="mb-4 pt-3 border-top">
                            <form action="/gio-hang/ma-giam-gia" method="POST" class="d-flex gap-2">
                                <input type="text" class="form-control form-control-sm rounded-pill px-3 border-0" placeholder="Mã giảm giá">
                                <button type="submit" class="btn btn-dark btn-sm rounded-pill px-3 fw-medium">Áp dụng</button>
                            </form>
                        </div>

                        <div class="d-flex justify-content-between mb-4 pt-3 border-top border-dark">
                            <span class="fw-bold">Tổng Cộng</span>
                            <div class="text-end">
                                <span class="fs-4 fw-bold text-danger d-block"><?= number_format($total, 0, ',', '.') ?>đ</span>
                                <small class="text-muted">(Đã bao gồm VAT)</small>
                            </div>
                        </div>

                        <a href="/thanh-toan" class="btn btn-danger w-100 rounded-pill btn-lg fw-bold shadow-sm">
                            Tiến Hành Thanh Toán <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
$(document).ready(function() {
    $('.btn-cart-minus, .btn-cart-plus').on('click', function() {
        const change = $(this).hasClass('btn-cart-plus') ? 1 : -1;
        const price = $(this).data('price');
        const $input = $(this).siblings('.qty-input');
        
        let val = parseInt($input.val()) + change;
        if (val < 1) val = 1;
        
        $input.val(val);
        
        // Update line total
        const newTotal = val * price;
        $(this).closest('tr').find('td:nth-child(3)').html(new Intl.NumberFormat('vi-VN').format(newTotal) + 'đ');
    });
});
</script>
