<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'FlowerShop - Cửa Hàng Hoa Tươi Cao Cấp | Giao Hoa Tận Nơi TP.HCM') ?></title>
    <meta name="description" content="<?= htmlspecialchars($meta_description ?? 'FlowerShop cung cấp dịch vụ đặt và giao hoa tươi cao cấp tại TP.HCM. Giao hoa hỏa tốc 1-2h, cam kết hoa tươi 100%, thiết kế sang trọng cho mọi dịp.') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($meta_keywords ?? 'shop hoa tươi, giao hoa tận nơi, đặt hoa online, hoa sinh nhật, hoa khai trương, hoa sài gòn') ?>">
    <meta property="og:title" content="<?= htmlspecialchars($title ?? 'FlowerShop - Cửa Hàng Hoa Tươi Cao Cấp') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($meta_description ?? 'FlowerShop cung cấp dịch vụ đặt và giao hoa tươi cao cấp tại TP.HCM. Giao hoa hỏa tốc 1-2h, cam kết hoa tươi 100%, thiết kế sang trọng cho mọi dịp.') ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/assets/img/logo.svg">
    <link rel="icon" href="/assets/img/logo.svg" type="image/svg+xml">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css?v=<?= time() ?>">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
