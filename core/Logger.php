<?php

namespace Core;

class Logger
{
    /**
     * Đường dẫn mặc định đến file log
     */
    private static function getLogFile(): string
    {
        // Sử dụng constant ROOT_PATH nếu đã định nghĩa (ở public/index.php)
        $baseDir = defined('ROOT_PATH') ? ROOT_PATH : dirname(__DIR__);
        return $baseDir . '/storage/logs/app.log';
    }

    /**
     * Ghi log chung
     */
    public static function log(string $level, string $message, array $context = []): void
    {
        $file = self::getLogFile();
        $dir = dirname($file);
        
        // Tạo thư mục nếu chưa tồn tại
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $date = date('Y-m-d H:i:s');
        $contextString = !empty($context) ? ' | Context: ' . json_encode($context, JSON_UNESCAPED_UNICODE) : '';
        $logMessage = "[{$date}] [{$level}] {$message}{$contextString}" . PHP_EOL;

        // Ghi nối vào file
        file_put_contents($file, $logMessage, FILE_APPEND | LOCK_EX);
    }

    /**
     * Ghi log thông tin (INFO)
     */
    public static function info(string $message, array $context = []): void
    {
        self::log('INFO', $message, $context);
    }

    /**
     * Ghi log cảnh báo (WARNING)
     */
    public static function warning(string $message, array $context = []): void
    {
        self::log('WARNING', $message, $context);
    }

    /**
     * Ghi log lỗi (ERROR)
     */
    public static function error(string $message, array $context = []): void
    {
        self::log('ERROR', $message, $context);
    }
}
