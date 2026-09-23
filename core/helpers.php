<?php

declare(strict_types=1);

/**
 * ==============================================================================
 * GLOBAL APPLICATION HELPERS
 * ==============================================================================
 * Utility functions shared across the system (Views, Controllers, Services).
 */

if (!function_exists('e')) {
    /**
     * Safely escape HTML to prevent XSS attacks
     */
    function e(?string $value): string
    {
        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('format_currency')) {
    /**
     * Format VND currency (e.g., 500,000 ₫)
     */
    function format_currency(float|int|string|null $amount): string
    {
        return number_format((float)($amount ?? 0), 0, ',', '.') . ' ₫';
    }
}
