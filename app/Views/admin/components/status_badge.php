<?php
/**
 * Component: Flower Order Status Badge
 * Input variables:
 * - $status: string ('pending' | 'confirmed' | 'preparing' | 'shipping' | 'completed' | 'cancelled')
 */
$statusMap = [
    "pending" => [
        "label" => "Chờ duyệt",
        "class" => "bg-warning text-dark",
        "icon" => "<i class=\"fa-solid fa-hourglass-half\"></i>",
    ],
    "confirmed" => [
        "label" => "Đã xác nhận",
        "class" => "bg-info text-white",
        "icon" => "<i class=\"fa-solid fa-clipboard-list\"></i>",
    ],
    "preparing" => [
        "label" => "Đang cắm hoa",
        "class" => "badge-flower-preparing",
        "icon" => "<i class=\"fa-solid fa-seedling\"></i>",
    ],
    "shipping" => [
        "label" => "Đang giao hoa",
        "class" => "badge-flower-shipping",
        "icon" => "<i class=\"fa-solid fa-truck\"></i>",
    ],
    "completed" => [
        "label" => "Giao thành công",
        "class" => "bg-success text-white",
        "icon" => "<i class=\"fa-solid fa-check\"></i>",
    ],
    "cancelled" => [
        "label" => "Đã hủy",
        "class" => "bg-danger text-white",
        "icon" => "<i class=\"fa-solid fa-xmark\"></i>",
    ],
];

$item = $statusMap[$status ?? "pending"] ?? [
    "label" => ucfirst($status ?? "Khác"),
    "class" => "bg-secondary text-white",
    "icon" => "<i class=\"fa-solid fa-circle fa-xs\"></i>",
];
?>
<span class="badge <?= $item[
    "class"
] ?> px-2 py-1 fw-semibold font-small rounded-pill d-inline-flex align-items-center">
    <span class="me-1"><?= $item["icon"] ?></span>
    <?= e($item["label"]) ?>
</span>
