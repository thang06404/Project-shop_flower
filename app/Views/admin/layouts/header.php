<!doctype html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= e($title ?? "Admin - Shop Hoa Tươi") ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/assets/img/logo.svg">
    <link rel="alternate icon" href="/assets/img/logo.svg">
    <meta name="theme-color" content="#ffffff" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <style>
        /* Override Volt default font to match Frontend */
        body, .font-sans, .nav-link, .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif !important;
        }
    </style>
    <!-- Sweet Alert -->
    <link type="text/css" href="/admin-assets/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" />
    <!-- Notyf -->
    <link type="text/css" href="/admin-assets/vendor/notyf/notyf.min.css" rel="stylesheet" />
    <!-- Volt CSS -->
    <link type="text/css" href="/admin-assets/css/volt.css" rel="stylesheet" />
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="/admin">
            <img src="/assets/img/logo.svg" alt="FlowerShop" style="height: 30px;" class="me-2">
            <span class="h4 text-white font-weight-bold mb-0">FlowerShop</span>
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
