<!-- Top Notification Bar -->
<div class="bg-dark text-white py-1 px-3 text-center small">
    <span><i class="fa-solid fa-leaf"></i> <strong>Cam kết hoa tươi 100%:</strong> Nhận cắm hoa & giao hỏa tốc 1–2h nội thành TP.HCM | Hotline: <a href="tel:0901234567" class="text-warning text-decoration-none fw-bold">090 123 4567</a></span>
</div>

<!-- Main Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <img src="/assets/img/logo.svg" alt="FlowerShop" style="height: 45px;">
            <div>
                <span class="fw-bold tracking-tight text-dark fs-4 font-serif">FlowerShop</span>
                <span class="d-block text-muted text-uppercase" style="font-size: 0.65rem; letter-spacing: 2px;">Thương Hiệu Hoa Tươi Sài Gòn</span>
            </div>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-medium">
                <li class="nav-item">
                    <a class="nav-link active text-danger" href="/">Trang Chủ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Chủ Đề & Dịp</a>
                    <ul class="dropdown-menu border-0 shadow">
                        <li><a class="dropdown-item" href="/#occasions"><i class="fa-solid fa-cake-candles me-2"></i>Hoa Sinh Nhật</a></li>
                        <li><a class="dropdown-item" href="/#occasions"><i class="fa-solid fa-building me-2"></i>Hoa Khai Trương</a></li>
                        <li><a class="dropdown-item" href="/#occasions"><i class="fa-solid fa-heart me-2"></i>Hoa Tình Yêu / Valentine</a></li>
                        <li><a class="dropdown-item" href="/#occasions"><i class="fa-solid fa-wand-magic-sparkles me-2"></i>Chúc Mừng 8/3 - 20/10</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/#occasions"><i class="fa-solid fa-dove me-2"></i>Hoa Chia Buồn</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Loại Hoa</a>
                    <ul class="dropdown-menu border-0 shadow">
                        <li><a class="dropdown-item" href="/#catalog"><i class="fa-brands fa-pagelines me-2"></i>Hoa Hồng Ecuador</a></li>
                        <li><a class="dropdown-item" href="/#catalog"><i class="fa-solid fa-sun me-2"></i>Hoa Hướng Dương</a></li>
                        <li><a class="dropdown-item" href="/#catalog"><i class="fa-solid fa-tree me-2"></i>Lan Hồ Điệp</a></li>
                        <li><a class="dropdown-item" href="/#catalog"><i class="fa-solid fa-seedling me-2"></i>Hoa Tulip Hà Lan</a></li>
                        <li><a class="dropdown-item" href="/#catalog"><i class="fa-solid fa-leaf me-2"></i>Hoa Baby & Cẩm Tú Cầu</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tin-tuc">Tin Tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tra-cuu-don-hang"><i class="bi bi-search me-1 text-primary"></i> Tra Cứu Đơn Hàng</a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3">
                <?php if (\Core\Session::has('user_id')): ?>
                    <div class="dropdown">
                        <button class="btn btn-outline-dark btn-sm rounded-pill px-4 dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-user me-1"></i> Chào, <?= htmlspecialchars(\Core\Session::get('user_name') ?? 'Bạn') ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                            <?php if (\Core\Session::get('role') === 'admin'): ?>
                                <li><a class="dropdown-item" href="/admin"><i class="fa-solid fa-gauge me-2"></i>Quản trị (Admin)</a></li>
                                <li><hr class="dropdown-divider"></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item text-danger" href="/dang-xuat"><i class="fa-solid fa-right-from-bracket me-2"></i>Đăng xuất</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="/dang-nhap" class="btn btn-outline-dark btn-sm rounded-pill px-4">
                        <i class="fa-solid fa-person me-1"></i> Đăng Nhập
                    </a>
                <?php endif; ?>
                <a href="/gio-hang" class="btn btn-danger btn-sm rounded-pill px-4 position-relative shadow-sm">
                    <i class="bi bi-bag-heart me-1"></i> Giỏ Hàng
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                        0
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>

<main class="flex-grow-1">
