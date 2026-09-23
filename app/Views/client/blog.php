<!-- Page Header -->
<div class="bg-light py-5">
    <div class="container text-center">
        <h1 class="display-4 font-serif fw-bold text-dark mb-3">Tin Tức & Bài Viết</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Khám phá những mẹo chăm sóc hoa, ý nghĩa các loài hoa và những câu chuyện thú vị từ FlowerShop.
        </p>
    </div>
</div>

<div class="container py-5 my-3">
    <div class="row g-4">
        <!-- Main Content (Blog List) -->
        <div class="col-lg-8">
            <?php foreach ($posts as $post): ?>
            <div class="card border-0 shadow-sm mb-4 rounded-4 overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="<?= htmlspecialchars($post['image']) ?>" class="img-fluid h-100 w-100 object-fit-cover" alt="<?= htmlspecialchars($post['title']) ?>">
                    </div>
                    <div class="col-md-7 d-flex flex-column">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-2 text-muted small">
                                <span class="me-3"><i class="fa-regular fa-calendar me-1"></i> <?= date('d/m/Y', strtotime($post['created_at'])) ?></span>
                                <span><i class="fa-regular fa-user me-1"></i> <?= htmlspecialchars($post['author']) ?></span>
                            </div>
                            <h3 class="card-title h4 font-serif fw-bold mb-3">
                                <a href="/tin-tuc/<?= $post['id'] ?>" class="text-dark text-decoration-none text-hover-primary"><?= htmlspecialchars($post['title']) ?></a>
                            </h3>
                            <p class="card-text text-muted mb-4"><?= htmlspecialchars($post['excerpt']) ?></p>
                            <a href="/tin-tuc/<?= $post['id'] ?>" class="btn btn-outline-primary mt-auto align-self-start rounded-pill px-4">Đọc tiếp <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- Pagination -->
            <nav aria-label="Page navigation" class="mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link border-0 rounded-circle me-1" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link border-0 rounded-circle mx-1" href="#">1</a></li>
                    <li class="page-item"><a class="page-link border-0 rounded-circle mx-1" href="#">2</a></li>
                    <li class="page-item"><a class="page-link border-0 rounded-circle mx-1" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link border-0 rounded-circle ms-1" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Search Widget -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <h5 class="font-serif fw-bold mb-3">Tìm kiếm</h5>
                    <div class="input-group">
                        <input type="text" class="form-control rounded-start-pill bg-light border-0" placeholder="Nhập từ khóa...">
                        <button class="btn btn-primary rounded-end-pill px-3" type="button"><i class="fa-solid fa-search"></i></button>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <h5 class="font-serif fw-bold mb-3">Chủ đề</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-muted text-hover-primary d-flex justify-content-between"><span>Ý nghĩa các loài hoa</span> <span class="badge bg-light text-dark rounded-pill">12</span></a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-muted text-hover-primary d-flex justify-content-between"><span>Mẹo chăm sóc hoa</span> <span class="badge bg-light text-dark rounded-pill">8</span></a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-muted text-hover-primary d-flex justify-content-between"><span>Xu hướng cắm hoa</span> <span class="badge bg-light text-dark rounded-pill">5</span></a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-muted text-hover-primary d-flex justify-content-between"><span>Câu chuyện khách hàng</span> <span class="badge bg-light text-dark rounded-pill">3</span></a></li>
                    </ul>
                </div>
            </div>

            <!-- Popular Tags Widget -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h5 class="font-serif fw-bold mb-3">Thẻ (Tags)</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#" class="badge bg-light text-dark text-decoration-none py-2 px-3 rounded-pill fw-normal text-hover-primary">Hoa hồng</a>
                        <a href="#" class="badge bg-light text-dark text-decoration-none py-2 px-3 rounded-pill fw-normal text-hover-primary">Valentine</a>
                        <a href="#" class="badge bg-light text-dark text-decoration-none py-2 px-3 rounded-pill fw-normal text-hover-primary">Hoa sinh nhật</a>
                        <a href="#" class="badge bg-light text-dark text-decoration-none py-2 px-3 rounded-pill fw-normal text-hover-primary">Chăm sóc hoa</a>
                        <a href="#" class="badge bg-light text-dark text-decoration-none py-2 px-3 rounded-pill fw-normal text-hover-primary">Hoa khai trương</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* CSS inline tạm thời cho UI mock */
    .text-hover-primary:hover {
        color: var(--bs-primary) !important;
    }
    .object-fit-cover {
        object-fit: cover;
    }
    .page-link {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--bs-dark);
    }
    .page-item.active .page-link {
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
        color: white;
    }
</style>
