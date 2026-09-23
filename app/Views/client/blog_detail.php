<!-- Breadcrumb -->
<div class="bg-light py-3 border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/tin-tuc" class="text-decoration-none text-muted">Tin tức & Blog</a></li>
                <li class="breadcrumb-item active text-dark" aria-current="page"><?= htmlspecialchars($post['title']) ?></li>
            </ol>
        </nav>
    </div>
</div>

<!-- Blog Detail Content -->
<div class="container py-5 my-3">
    <div class="row justify-content-center">
        <!-- Main Content -->
        <div class="col-lg-10">
            <!-- Header -->
            <div class="text-center mb-5">
                <div class="d-flex justify-content-center align-items-center gap-3 mb-3 text-muted">
                    <span><i class="fa-regular fa-calendar text-primary me-1"></i> <?= date('d/m/Y', strtotime($post['created_at'])) ?></span>
                    <span><i class="fa-regular fa-user text-primary me-1"></i> <?= htmlspecialchars($post['author']) ?></span>
                    <span><i class="fa-regular fa-folder text-primary me-1"></i> Ý nghĩa các loài hoa</span>
                </div>
                <h1 class="display-5 font-serif fw-bold text-dark lh-sm"><?= htmlspecialchars($post['title']) ?></h1>
            </div>

            <!-- Featured Image -->
            <div class="mb-5 rounded-4 overflow-hidden shadow-sm">
                <img src="<?= htmlspecialchars($post['image']) ?>" class="img-fluid w-100 object-fit-cover" style="max-height: 500px;" alt="<?= htmlspecialchars($post['title']) ?>">
            </div>

            <!-- Content Body -->
            <div class="blog-content fs-5 text-dark lh-lg">
                <?= $post['content'] ?> <!-- Hiển thị HTML an toàn (mock) -->
            </div>

            <!-- Share and Tags -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-5 pt-4 border-top">
                <div class="d-flex flex-wrap gap-2 mb-3 mb-md-0">
                    <span class="fw-bold me-2 align-self-center">Tags:</span>
                    <a href="#" class="badge bg-light text-dark text-decoration-none py-2 px-3 rounded-pill fw-normal text-hover-primary border">Hoa hồng</a>
                    <a href="#" class="badge bg-light text-dark text-decoration-none py-2 px-3 rounded-pill fw-normal text-hover-primary border">20/10</a>
                    <a href="#" class="badge bg-light text-dark text-decoration-none py-2 px-3 rounded-pill fw-normal text-hover-primary border">Quà tặng</a>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="fw-bold">Chia sẻ:</span>
                    <a href="#" class="btn btn-outline-primary rounded-circle btn-icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-info rounded-circle btn-icon"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="btn btn-outline-danger rounded-circle btn-icon"><i class="fa-brands fa-pinterest-p"></i></a>
                </div>
            </div>

            <!-- Author Box -->
            <div class="card border-0 shadow-sm rounded-4 mt-5 bg-light">
                <div class="card-body p-4 d-flex align-items-center gap-4">
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($post['author']) ?>&background=random" class="rounded-circle" width="80" height="80" alt="Author">
                    <div>
                        <h5 class="font-serif fw-bold mb-1">Viết bởi: <?= htmlspecialchars($post['author']) ?></h5>
                        <p class="text-muted mb-0">Chuyên gia tư vấn hoa tươi tại FlowerShop với hơn 5 năm kinh nghiệm trong ngành nghệ thuật cắm hoa.</p>
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
    .btn-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }
    .blog-content img {
        max-width: 100%;
        height: auto;
    }
</style>
