<?php

return [
    'shop_id' => $_ENV['GHN_SHOP_ID'] ?? '',
    'token' => $_ENV['GHN_TOKEN'] ?? '',
    'api_url' => $_ENV['GHN_API_URL'] ?? 'https://dev-online-gateway.ghn.vn/shiip/public-api',
    
    // Các Endpoints chính
    'endpoints' => [
        'available_services' => '/v2/shipping-order/available-services',
        'calculate_fee' => '/v2/shipping-order/fee',
        'create_order' => '/v2/shipping-order/create',
        'order_detail' => '/v2/shipping-order/detail',
    ]
];
