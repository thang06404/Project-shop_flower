<?php
// Layout is provided by View.php
?>
<div class="container py-5">
    <div class="row justify-content-center align-items-center min-vh-75">
        <div class="col-md-7 col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-body p-4 p-sm-5">
                    <div class="text-center mb-4">
                        <a href="/" class="text-decoration-none d-inline-block mb-3">
                            <img src="/assets/img/logo.svg" alt="FlowerShop" style="height: 50px;">
                        </a>
                        <h4 class="fw-bold font-serif mb-1">Tạo Tài Khoản Mới</h4>
                        <p class="text-muted small">Đăng ký để trải nghiệm mua sắm tuyệt vời hơn</p>
                    </div>

                    <?php if ($error = \Core\Session::getFlash('error')): ?>
                        <div class="alert alert-danger small py-2"><?= $error ?></div>
                    <?php endif; ?>

                    <form action="/dang-ky" method="POST">
                        <input type="hidden" name="csrf_token" value="<?= \Core\Session::getCsrfToken() ?>">
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Họ và tên</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-user"></i></span>
                                <input type="text" name="name" class="form-control bg-light border-start-0 ps-0" placeholder="Nhập họ và tên của bạn" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Số điện thoại</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-phone"></i></span>
                                <input type="text" name="phone" class="form-control bg-light border-start-0 ps-0" placeholder="Nhập số điện thoại" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control bg-light border-start-0 ps-0" placeholder="Nhập địa chỉ email" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Mật khẩu</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" name="password" class="form-control bg-light border-start-0 ps-0" placeholder="Tạo mật khẩu (Ít nhất 6 ký tự)" required minlength="6">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Xác nhận mật khẩu</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-check-double"></i></span>
                                <input type="password" name="password_confirm" class="form-control bg-light border-start-0 ps-0" placeholder="Nhập lại mật khẩu" required minlength="6">
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                            <label class="form-check-label small" for="agreeTerms">
                                Tôi đồng ý với <a href="#" class="text-danger text-decoration-none">Điều khoản dịch vụ</a> và <a href="#" class="text-danger text-decoration-none">Chính sách bảo mật</a>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 rounded-pill fw-bold py-2 mb-3">
                            Đăng Ký
                        </button>
                    </form>

                    <div class="text-center small">
                        Bạn đã có tài khoản? <a href="/dang-nhap" class="text-primary fw-bold text-decoration-none">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
