<?php
// Layout is provided by View.php
?>
<div class="container py-5">
    <div class="row justify-content-center align-items-center min-vh-75">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-body p-4 p-sm-5">
                    <div class="text-center mb-4">
                        <a href="/" class="text-decoration-none d-inline-block mb-3">
                            <img src="/assets/img/logo.svg" alt="FlowerShop" style="height: 50px;">
                        </a>
                        <h4 class="fw-bold font-serif mb-1">Chào Mừng Trở Lại</h4>
                        <p class="text-muted small">Đăng nhập để quản lý đơn hàng và nhận ưu đãi</p>
                    </div>

                    <?php if ($error = \Core\Session::getFlash('error')): ?>
                        <div class="alert alert-danger small py-2"><?= $error ?></div>
                    <?php endif; ?>

                    <?php if ($success = \Core\Session::getFlash('success')): ?>
                        <div class="alert alert-success small py-2"><?= $success ?></div>
                    <?php endif; ?>

                    <form action="/dang-nhap" method="POST">
                        <input type="hidden" name="csrf_token" value="<?= \Core\Session::getCsrfToken() ?>">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control bg-light border-start-0 ps-0" placeholder="Nhập địa chỉ email" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label small fw-bold mb-0">Mật khẩu</label>
                                <a href="#" class="small text-danger text-decoration-none">Quên mật khẩu?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" name="password" class="form-control bg-light border-start-0 ps-0" placeholder="Nhập mật khẩu" required>
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="remember_me" id="rememberMe">
                            <label class="form-check-label small" for="rememberMe">
                                Ghi nhớ đăng nhập
                            </label>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 rounded-pill fw-bold py-2 mb-3">
                            Đăng Nhập
                        </button>
                    </form>

                    <div class="text-center mb-3">
                        <span class="text-muted small">hoặc đăng nhập bằng</span>
                    </div>

                    <div class="d-flex gap-2 mb-4">
                        <button class="btn btn-outline-dark w-50 rounded-pill py-2">
                            <i class="fa-brands fa-google text-danger me-2"></i> Google
                        </button>
                        <button class="btn btn-outline-dark w-50 rounded-pill py-2">
                            <i class="fa-brands fa-facebook text-primary me-2"></i> Facebook
                        </button>
                    </div>

                    <div class="text-center small">
                        Bạn chưa có tài khoản? <a href="/dang-ky" class="text-danger fw-bold text-decoration-none">Đăng ký ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
