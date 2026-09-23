<?php
/**
 * Component: Stat Card (KPI Indicator)
 * Input variables:
 * - $title: string
 * - $value: string
 * - $change: ?string (e.g., '+12.5%')
 * - $isIncrease: bool (default true)
 * - $icon: ?string (SVG HTML)
 * - $period: ?string (e.g., 'Today', 'Compared to last month')
 * - $colorClass: ?string (bg-primary, bg-success, bg-warning, bg-purple, etc.)
 */
$colorClass = $colorClass ?? "bg-primary";
$isIncrease = $isIncrease ?? true;
?>
<div class="card border-0 shadow-sm mb-4 h-100">
    <div class="card-body p-3 p-xl-4">
        <div class="row align-items-center">
            <div class="col-auto">
                <div class="stat-icon-box text-white <?= e($colorClass) ?>">
                    <?php if (!empty($icon)): ?>
                        <?= $icon ?>
                    <?php else: ?>
                        <svg class="icon icon-md" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col ps-2">
                <h2 class="h6 text-gray-500 mb-1 fw-semibold text-uppercase font-small"><?= e(
                    $title ?? "Chỉ số",
                ) ?></h2>
                <h3 class="fw-extrabold mb-1 fs-4 text-gray-900"><?= e(
                    $value ?? "0",
                ) ?></h3>
                
                <div class="small d-flex align-items-center flex-wrap mt-1">
                    <?php if (isset($change)): ?>
                        <span class="<?= $isIncrease
                            ? "text-success"
                            : "text-danger" ?> fw-bold me-2 d-inline-flex align-items-center">
                            <?php if ($isIncrease): ?>
                                <svg class="icon icon-xxs me-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                            <?php else: ?>
                                <svg class="icon icon-xxs me-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <?php endif; ?>
                            <?= e($change) ?>
                        </span>
                    <?php endif; ?>
                    <?php if (!empty($period)): ?>
                        <span class="text-gray-500 font-small"><?= e(
                            $period,
                        ) ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
