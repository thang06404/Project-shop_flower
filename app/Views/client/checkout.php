<?php
// Layout is provided by View.php
?>
<div class="bg-light py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Trang Chủ</a></li>
                <li class="breadcrumb-item"><a href="/gio-hang" class="text-decoration-none text-muted">Giỏ Hàng</a></li>
                <li class="breadcrumb-item active text-dark fw-medium" aria-current="page">Thanh Toán</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <h2 class="fw-bold font-serif mb-4">Thanh Toán Đơn Hàng</h2>

    <form action="/thanh-toan/dat-hang" method="POST">
        <div class="row g-4">
            <!-- Checkout Details -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h5 class="fw-bold font-serif mb-4"><i class="fa-regular fa-id-card text-danger me-2"></i> 1. Thông Tin Khách Hàng</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Họ và tên người đặt *</label>
                                <input type="text" class="form-control bg-light border-0" required placeholder="Nhập họ tên">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Số điện thoại *</label>
                                <input type="tel" class="form-control bg-light border-0" required placeholder="Nhập số điện thoại">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Email</label>
                                <input type="email" class="form-control bg-light border-0" placeholder="Để nhận thông tin đơn hàng">
                            </div>
                        </div>

                        <hr class="my-5 border-light">

                        <h5 class="fw-bold font-serif mb-4"><i class="fa-solid fa-location-dot text-danger me-2"></i> 2. Thông Tin Giao Hàng</h5>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="sameAsSender" checked>
                            <label class="form-check-label" for="sameAsSender">
                                Người nhận cũng là người đặt hàng
                            </label>
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Họ và tên người nhận *</label>
                                <input type="text" class="form-control bg-light border-0" required placeholder="Nhập họ tên người nhận">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Số điện thoại người nhận *</label>
                                <input type="tel" class="form-control bg-light border-0" required placeholder="Nhập số điện thoại">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Địa chỉ giao hàng chi tiết *</label>
                                <input type="text" class="form-control bg-light border-0" required placeholder="Số nhà, tên đường, phường/xã, quận/huyện...">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Thời gian giao hàng mong muốn</label>
                                <select class="form-select bg-light border-0">
                                    <option>Giao càng sớm càng tốt (trong 2H)</option>
                                    <option>Hôm nay (Sáng 08:00 - 12:00)</option>
                                    <option>Hôm nay (Chiều 13:00 - 18:00)</option>
                                    <option>Hôm nay (Tối 18:00 - 21:00)</option>
                                    <option>Ngày mai</option>
                                </select>
                            </div>
                        </div>

                        <hr class="my-5 border-light">

                        <h5 class="fw-bold font-serif mb-4"><i class="fa-solid fa-envelope-open-text text-danger me-2"></i> 3. Thông Điệp Yêu Thương</h5>
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Nội dung ghi trên thiệp / banner (Miễn phí)</label>
                            <textarea class="form-control bg-light border-0" rows="3" placeholder="Ví dụ: Chúc mừng sinh nhật mẹ yêu..."></textarea>
                            <div class="form-text mt-2">Chúng tôi sẽ in nội dung này lên thiệp và gửi kèm cùng hoa.</div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h5 class="fw-bold font-serif mb-4"><i class="fa-regular fa-credit-card text-danger me-2"></i> 4. Phương Thức Thanh Toán</h5>
                        
                        <div class="payment-methods">
                            <!-- COD -->
                            <div class="form-check border rounded-3 p-3 mb-3 d-flex align-items-center">
                                <input class="form-check-input ms-1 me-3" type="radio" name="payment_method" id="payment_cod" value="cod" checked>
                                <label class="form-check-label flex-grow-1 fw-bold" for="payment_cod" style="cursor:pointer;">
                                    Thanh toán khi nhận hàng (COD)
                                    <span class="d-block text-muted fw-normal small mt-1">Khách hàng thanh toán tiền mặt cho nhân viên giao hàng</span>
                                </label>
                                <i class="fa-solid fa-money-bill-wave text-success fs-3"></i>
                            </div>

                            <!-- Bank Transfer -->
                            <div class="form-check border rounded-3 p-3 mb-3 d-flex align-items-center">
                                <input class="form-check-input ms-1 me-3" type="radio" name="payment_method" id="payment_bank" value="bank">
                                <label class="form-check-label flex-grow-1 fw-bold" for="payment_bank" style="cursor:pointer;">
                                    Chuyển khoản ngân hàng
                                    <span class="d-block text-muted fw-normal small mt-1">Chuyển khoản qua quét mã QR hoặc thông tin STK</span>
                                </label>
                                <i class="fa-solid fa-building-columns text-primary fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Sticky -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 position-sticky bg-light" style="top: 100px;">
                    <div class="card-body p-4 p-md-5">
                        <h5 class="fw-bold font-serif mb-4">Đơn Hàng Của Bạn</h5>
                        
                        <div class="mb-4">
                            <?php foreach ($cartItems as $item): ?>
                                <div class="d-flex mb-3 align-items-center">
                                    <div class="position-relative">
                                        <img src="<?= $item['image'] ?>" class="rounded-3 object-fit-cover" style="width: 65px; height: 65px;">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-light">
                                            <?= $item['quantity'] ?>
                                        </span>
                                    </div>
                                    <div class="ms-3 flex-grow-1">
                                        <h6 class="mb-1 small fw-bold lh-base text-truncate" style="max-width: 180px;" title="<?= e($item['name']) ?>"><?= e($item['name']) ?></h6>
                                    </div>
                                    <div class="ms-3 text-end fw-bold text-dark small">
                                        <?= number_format($item['total'], 0, ',', '.') ?>đ
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="border-top pt-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">Tạm tính</span>
                                <span class="fw-medium text-dark"><?= number_format($subtotal, 0, ',', '.') ?>đ</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">Phí giao hàng</span>
                                <span class="fw-medium text-dark"><?= number_format($shipping, 0, ',', '.') ?>đ</span>
                            </div>
                            <div class="d-flex justify-content-between mb-4 pt-3 border-top border-dark">
                                <span class="fw-bold">Tổng Cộng</span>
                                <div class="text-end">
                                    <span class="fs-3 fw-bold text-danger d-block"><?= number_format($total, 0, ',', '.') ?>đ</span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 rounded-pill btn-lg fw-bold shadow-sm mb-3">
                            Đặt Hàng Ngay <i class="fa-solid fa-check ms-2"></i>
                        </button>
                        
                        <p class="small text-muted text-center mb-0">
                            Bằng việc tiến hành đặt hàng, bạn đồng ý với <a href="#" class="text-decoration-none">điều khoản dịch vụ</a> của chúng tôi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
