<div class="container py-5 my-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-4">
                <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill fw-semibold mb-2">
                    <i class="bi bi-clock-history me-1"></i> Trực Tuyến 24/7
                </span>
                <h1 class="fw-bold font-serif text-dark">Tra Cứu Tiến Độ Giao Hoa</h1>
                <p class="text-muted">Nhập mã đơn hàng và số điện thoại người đặt để theo dõi thời gian thực.</p>
            </div>

            <!-- Search Form -->
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <form action="/tra-cuu-don-hang" method="POST" class="row g-3 align-items-center">
                    <div class="col-md-5">
                        <label class="form-label small fw-semibold text-muted">MÃ ĐƠN HÀNG</label>
                        <input type="text" name="order_code" class="form-control form-control-lg rounded-3 text-uppercase" 
                               placeholder="Ví dụ: FLW-260922-A8F3" 
                               value="<?= htmlspecialchars($orderCode ?? 'FLW-260922-A8F3') ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">SĐT NGƯỜI ĐẶT</label>
                        <input type="tel" name="phone" class="form-control form-control-lg rounded-3" 
                               placeholder="Ví dụ: 0901234567" 
                               value="<?= htmlspecialchars($phone ?? '0901234567') ?>" required>
                    </div>
                    <div class="col-md-3 mt-md-4 pt-md-2">
                        <button type="submit" class="btn btn-danger btn-lg w-100 rounded-3 shadow-sm">
                            <i class="bi bi-search me-1"></i> Tra Cứu
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tracking Result -->
            <?php if (!empty($order)): ?>
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <div class="card-header bg-dark text-white p-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            <span class="badge bg-warning text-dark fw-bold mb-1">ĐƠN HÀNG HỎA TỐC</span>
                            <h4 class="mb-0 fw-bold font-serif text-white">#<?= htmlspecialchars($order['order_code']) ?></h4>
                        </div>
                        <div class="text-end">
                            <span class="text-white-50 small d-block">Tổng thanh toán</span>
                            <span class="fs-5 fw-bold text-warning"><?= number_format($order['final_amount'], 0, ',', '.') ?> ₫</span>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <!-- State Timeline -->
                        <div class="timeline-track">
                            <div class="timeline-step completed">
                                <div class="timeline-circle"><i class="bi bi-check-lg"></i></div>
                                <span class="fw-bold small d-block">Đã Tiếp Nhận</span>
                                <small class="text-muted" style="font-size: 0.7rem;">Hệ thống xác nhận</small>
                            </div>
                            <div class="timeline-step active">
                                <div class="timeline-circle"><i class="bi bi-flower1"></i></div>
                                <span class="fw-bold small d-block text-danger">Đang Cắm Hoa</span>
                                <small class="text-danger" style="font-size: 0.7rem;">Thợ đang hoàn thiện</small>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-circle"><i class="bi bi-bicycle"></i></div>
                                <span class="fw-bold small d-block">Đang Giao</span>
                                <small class="text-muted" style="font-size: 0.7rem;">GHN Hỏa Tốc</small>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-circle"><i class="bi bi-house-heart"></i></div>
                                <span class="fw-bold small d-block">Hoàn Tất</span>
                                <small class="text-muted" style="font-size: 0.7rem;">Người nhận đã nhận</small>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row g-4">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-dark mb-3"><i class="bi bi-geo-alt-fill text-danger me-2"></i>Thông Tin Giao Nhận</h6>
                                <ul class="list-unstyled small d-flex flex-column gap-2 text-muted">
                                    <li><strong class="text-dark">Người nhận:</strong> <?= htmlspecialchars($order['recipient_name']) ?> (<?= htmlspecialchars($order['recipient_phone']) ?>)</li>
                                    <li><strong class="text-dark">Địa chỉ:</strong> <?= htmlspecialchars($order['shipping_address']) ?></li>
                                    <li><strong class="text-dark">Ngày & Khung giờ:</strong> <?= htmlspecialchars($order['delivery_date']) ?> (Khung <?= htmlspecialchars($order['delivery_time_slot']) ?>)</li>
                                    <li><strong class="text-dark">Vận đơn:</strong> <span class="badge bg-secondary"><?= htmlspecialchars($order['tracking_code']) ?></span></li>
                                </ul>

                                <?php if (!empty($order['card_message'])): ?>
                                    <div class="p-3 bg-light rounded-3 border-start border-4 border-danger mt-3">
                                        <small class="fw-bold text-danger d-block mb-1"><i class="bi bi-chat-heart-fill me-1"></i> Lời chúc in thiệp:</small>
                                        <p class="small text-dark fst-italic mb-0">"<?= htmlspecialchars($order['card_message']) ?>"</p>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-6">
                                <h6 class="fw-bold text-dark mb-3"><i class="bi bi-camera-fill text-primary me-2"></i>Ảnh Thành Phẩm Hoa Vừa Cắm</h6>
                                <?php if (!empty($order['finished_image_url'])): ?>
                                    <div class="rounded-3 overflow-hidden border shadow-sm" style="max-height: 240px;">
                                        <img src="<?= htmlspecialchars($order['finished_image_url']) ?>" alt="Ảnh hoa vừa cắm" class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <small class="text-muted d-block mt-2 text-center" style="font-size: 0.75rem;">
                                        <i class="fa-solid fa-camera"></i> Ảnh chụp thực tế tại xưởng hoa trước khi giao
                                    </small>
                                <?php else: ?>
                                    <div class="p-4 bg-light rounded-3 text-center text-muted small">
                                        <i class="bi bi-hourglass-split fs-2 d-block mb-2"></i>
                                        Thợ đang hoàn thiện bó hoa, ảnh thực tế sẽ hiển thị ngay khi cắm xong.
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif (isset($searched)): ?>
                <div class="alert alert-warning text-center rounded-4 p-4 shadow-sm">
                    <i class="bi bi-exclamation-triangle-fill fs-2 d-block mb-2 text-warning"></i>
                    <h5 class="fw-bold">Không tìm thấy thông tin đơn hàng!</h5>
                    <p class="mb-0 small text-muted">Vui lòng kiểm tra lại mã đơn hàng hoặc số điện thoại người đặt xem đã chính xác chưa.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
