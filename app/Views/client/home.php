<!-- Hero Section -->
<section class="hero-banner py-5 py-lg-6 border-bottom">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="hero-badge mb-3">
                    <i class="fa-solid fa-wand-magic-sparkles"></i> Tiệm Hoa Tươi Sài Gòn <i class="fa-solid fa-circle fa-xs mx-1"></i> Giao Hỏa Tốc 1–2h
                </span>
                <h1 class="display-4 fw-bold font-serif text-dark mb-3">
                    Gửi Trọn Yêu Thương Trong Từng Nhành Hoa
                </h1>
                <p class="lead text-muted mb-4">
                    Hoa tươi tuyển chọn loại 1 từ Đà Lạt và Ecuador. Thiết kế hoa sinh nhật, khai trương, ngày lễ tinh tế với dịch vụ chụp ảnh xác nhận mẫu trước khi giao tận tay.
                </p>

                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="#catalog" class="btn btn-danger btn-lg rounded-pill px-4 shadow-sm">
                        <i class="bi bi-flower1 me-1"></i> Khám Phá Mẫu Hoa
                    </a>
                    <a href="/tra-cuu-don-hang" class="btn btn-outline-dark btn-lg rounded-pill px-4">
                        <i class="bi bi-search me-1"></i> Tra Cứu Đơn Hoa
                    </a>
                </div>

                <div class="d-flex align-items-center gap-4 pt-3 border-top">
                    <div>
                        <span class="fs-4 fw-bold text-dark d-block">100%</span>
                        <small class="text-muted">Hoa Tươi Trong Ngày</small>
                    </div>
                    <div class="vr"></div>
                    <div>
                        <span class="fs-4 fw-bold text-dark d-block">2 Tiếng</span>
                        <small class="text-muted">Cắm & Giao Hỏa Tốc</small>
                    </div>
                    <div class="vr"></div>
                    <div>
                        <span class="fs-4 fw-bold text-dark d-block">Free Thiệp</span>
                        <small class="text-muted">In Thông Điệp Ý Nghĩa</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1563241527-3004b7be0ffd?auto=format&fit=crop&w=800&q=80" 
                         alt="Bó hoa tươi nghệ thuật" 
                         class="img-fluid rounded-4 shadow-lg w-100" 
                         style="object-fit: cover; max-height: 520px;">
                    
                    <!-- Floating Card -->
                    <div class="position-absolute bottom-0 start-0 m-4 bg-white p-3 rounded-3 shadow-sm d-flex align-items-center gap-3 border" style="max-width: 280px;">
                        <span class="fs-2 text-warning">⭐</span>
                        <div>
                            <span class="fw-bold d-block text-dark small">4.9 / 5.0 Đánh Giá</span>
                            <small class="text-muted" style="font-size: 0.75rem;">Hơn 2.500+ khách hàng hài lòng tại TP. Hồ Chí Minh</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Occasions Section -->
<section id="occasions" class="py-5 bg-white">
    <div class="container py-3">
        <div class="text-center mb-4">
            <span class="text-uppercase text-danger fw-bold small tracking-wider">Chủ Đề & Dịp Tặng</span>
            <h2 class="fw-bold font-serif text-dark mt-1">Chọn Hoa Theo Ý Nghĩa</h2>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-3">
            <?php foreach ($occasions as $occ): ?>
                <a href="/danh-muc/<?= $occ['slug'] ?>" class="category-pill text-decoration-none text-dark px-4 py-3 rounded-pill d-flex align-items-center gap-2 fw-medium">
                    <i class="bi <?= $occ['icon'] ?> fs-5"></i>
                    <span><?= htmlspecialchars($occ['name']) ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section id="catalog" class="py-5">
    <div class="container py-3">
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-4">
            <div>
                <span class="text-uppercase text-danger fw-bold small tracking-wider">Bộ Sưu Tập Mới Nhất</span>
                <h2 class="fw-bold font-serif text-dark mt-1">Mẫu Hoa Bán Chạy Trong Tuần</h2>
            </div>
            <a href="#catalog" class="btn btn-link text-danger text-decoration-none fw-semibold">
                Xem Tất Cả Mẫu <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">
            <?php foreach ($featuredProducts as $item): ?>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-card h-100 d-flex flex-column">
                        <div class="product-img-wrapper">
                            <?php if (!empty($item['sale_price'])): ?>
                                <span class="sale-badge">Ưu Đãi</span>
                            <?php endif; ?>
                            <img src="<?= htmlspecialchars($item['thumbnail']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                        </div>

                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-light text-muted border"><?= htmlspecialchars($item['category_name']) ?></span>
                                <small class="text-danger fw-medium"><i class="bi bi-heart me-1"></i><?= htmlspecialchars($item['occasion']) ?></small>
                            </div>

                            <h5 class="fw-bold text-dark mb-2 fs-6 leading-snug">
                                <a href="/san-pham/<?= htmlspecialchars($item['slug']) ?>" class="text-decoration-none text-dark hover-danger">
                                    <?= htmlspecialchars($item['name']) ?>
                                </a>
                            </h5>

                            <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                <div>
                                    <?php if (!empty($item['sale_price'])): ?>
                                        <span class="fw-bold text-danger fs-5"><?= number_format($item['sale_price'], 0, ',', '.') ?> ₫</span>
                                        <small class="text-muted text-decoration-line-through d-block" style="font-size: 0.75rem;">
                                            <?= number_format($item['regular_price'], 0, ',', '.') ?> ₫
                                        </small>
                                    <?php else: ?>
                                        <span class="fw-bold text-dark fs-5"><?= number_format($item['regular_price'], 0, ',', '.') ?> ₫</span>
                                    <?php endif; ?>
                                </div>

                                <form action="/gio-hang/them" method="POST">
                                    <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle p-2" title="Thêm vào giỏ">
                                        <i class="bi bi-cart-plus fs-6"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5 bg-white border-top">
    <div class="container py-3">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="p-3">
                    <span class="fs-1 text-success d-block mb-3"><i class="fa-solid fa-leaf"></i></span>
                    <h5 class="fw-bold text-dark">Hoa Tươi Loại 1</h5>
                    <p class="text-muted small">Cắt cành mới mỗi sáng, bảo quản kỹ lưỡng chuẩn độ tươi.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3">
                    <span class="fs-1 text-primary d-block mb-3"><i class="fa-solid fa-bolt"></i></span>
                    <h5 class="fw-bold text-dark">Giao Hỏa Tốc 1-2h</h5>
                    <p class="text-muted small">Shipper có thùng chuyên dụng, giữ hoa thẳng thắn nguyên vẹn.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3">
                    <span class="fs-1 text-danger d-block mb-3"><i class="fa-solid fa-camera"></i></span>
                    <h5 class="fw-bold text-dark">Chụp Ảnh Xác Nhận</h5>
                    <p class="text-muted small">Thợ cắm hoa chụp ảnh thật gửi khách duyệt trước khi giao.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3">
                    <span class="fs-1 text-warning d-block mb-3"><i class="fa-solid fa-envelope-open-text"></i></span>
                    <h5 class="fw-bold text-dark">Tặng Kèm Thiệp & Nơ</h5>
                    <p class="text-muted small">In nội dung lời chúc ý nghĩa, tùy chọn tặng giấu tên bất ngờ.</p>
                </div>
            </div>
        </div>
    </div>
</section>
