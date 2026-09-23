<?php

return [
    'name' => $_ENV['SHOP_NAME'] ?? 'Flower Shop Sài Gòn',
    'phone' => $_ENV['SHOP_PHONE'] ?? '0901234567',
    'address' => $_ENV['SHOP_ADDRESS'] ?? '123 Nguyễn Huệ, Phường Bến Nghé, Quận 1, TP. Hồ Chí Minh',
    
    // Tọa độ định danh bưu chính xuất phát của Shop theo chuẩn GHN
    'province_id' => (int)($_ENV['SHOP_PROVINCE_ID'] ?? 202), // TP.HCM
    'district_id' => (int)($_ENV['SHOP_DISTRICT_ID'] ?? 1442), // Quận 1
    'ward_code' => (string)($_ENV['SHOP_WARD_CODE'] ?? '20101'), // Phường Bến Nghé
    
    // Ràng buộc thời gian hoạt động & Giới hạn công suất
    'open_time' => $_ENV['SHOP_OPEN_TIME'] ?? '07:30',
    'close_time' => $_ENV['SHOP_CLOSE_TIME'] ?? '21:00',
    'lead_time_hours' => 2, // Thời gian thợ chuẩn bị hoa tối thiểu
    'max_orders_per_slot' => (int)($_ENV['MAX_ORDERS_PER_SLOT'] ?? 15),

    // Các khung giờ giao hoa tiêu chuẩn trong ngày
    'delivery_slots' => [
        '08:00 - 10:00',
        '10:00 - 12:00',
        '14:00 - 16:00',
        '16:00 - 18:00',
        '18:00 - 20:00'
    ]
];
