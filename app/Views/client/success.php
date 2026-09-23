<?php
// Layout is provided by View.php
?>
<div class="bg-light py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Trang Chủ</a></li>
                <li class="breadcrumb-item active text-dark fw-medium" aria-current="page">Đặt Hàng Thành Công</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 text-center">
            <div class="mb-4">
                <i class="fa-regular fa-circle-check text-success" style="font-size: 80px;"></i>
            </div>
            
            <h1 class="fw-bold font-serif text-dark mb-3">Đặt Hàng Thành Công!</h1>
            
            <p class="text-muted mb-4 fs-5">
                Cảm ơn bạn đã mua sắm tại FlowerShop. Đơn hàng của bạn đang được chúng tôi xử lý.
            </p>
            
            <div class="card bg-light border-0 rounded-4 mb-4 text-start">
                <div class="card-body p-4">
                    <h5 class="fw-bold border-bottom pb-3 mb-3">Mã đơn hàng của bạn: <span class="text-danger">#<?= e($orderCode) ?></span></h5>
                    <ul class="list-unstyled mb-0 text-muted">
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Chúng tôi sẽ gọi xác nhận đơn hàng trong vòng 15 phút.</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Bạn có thể kiểm tra trạng thái đơn hàng bất kỳ lúc nào.</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i> Hoa sẽ được giao đến bạn theo đúng khung giờ yêu cầu.</li>
                    </ul>
                </div>
            </div>
            
            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                <a href="/tra-cuu-don-hang" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-bold">
                    <i class="fa-solid fa-magnifying-glass me-2"></i> Tra Cứu Đơn Hàng
                </a>
                <a href="/" class="btn btn-danger rounded-pill px-4 py-2 fw-bold">
                    Tiếp Tục Mua Sắm <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>
