<?php

/**
 * CLI Background Worker - Xử lý tác vụ gửi Email và Gọi API GHN
 * Chạy: php workers/worker.php
 */

require_once dirname(__DIR__) . '/public/index.php';

echo "[Worker] Lắng nghe tác vụ hàng đợi trong bảng jobs...\n";
