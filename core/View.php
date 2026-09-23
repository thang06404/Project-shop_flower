<?php

declare(strict_types=1);

namespace Core;

class View
{
    /**
     * Render view với layout tương ứng (client hoặc admin)
     */
    public static function render(string $viewPath, array $data = [], ?string $layout = 'client'): void
    {
        // Extract variables for use in View
        extract($data);

        // CSRF Token Helper
        $csrfToken = Session::getCsrfToken();

        $viewFile = __DIR__ . '/../app/Views/' . $viewPath . '.php';

        if (!file_exists($viewFile)) {
            die("View [{$viewPath}] not found at {$viewFile}");
        }

        // Layout Quản trị Admin
        if ($layout === 'admin' || str_starts_with($layout ?? '', 'admin')) {
            $headerFile  = __DIR__ . '/../app/Views/admin/layouts/header.php';
            $sidebarFile = __DIR__ . '/../app/Views/admin/layouts/sidebar.php';
            $navbarFile  = __DIR__ . '/../app/Views/admin/layouts/navbar.php';
            $footerFile  = __DIR__ . '/../app/Views/admin/layouts/footer.php';

            if (file_exists($headerFile))  require $headerFile;
            if (file_exists($sidebarFile)) require $sidebarFile;
            if (file_exists($navbarFile))  require $navbarFile;

            require $viewFile;

            if (file_exists($footerFile))  require $footerFile;
            return;
        }

        // Client Layout
        if ($layout && $layout !== 'none') {
            $headerFile = __DIR__ . '/../app/Views/layouts/header.php';
            $navbarFile = __DIR__ . '/../app/Views/layouts/navbar.php';
            $footerFile = __DIR__ . '/../app/Views/layouts/footer.php';

            if (file_exists($headerFile)) require $headerFile;
            if (file_exists($navbarFile)) require $navbarFile;

            require $viewFile;

            if (file_exists($footerFile)) require $footerFile;
            return;
        }

        // Do not use layout
        require $viewFile;
    }

    /**
     * Helper render strictly for Admin
     */
    public static function renderAdmin(string $viewPath, array $data = []): void
    {
        self::render($viewPath, $data, 'admin');
    }

    /**
     * Render a child component (Partial) with independent data
     * Example: View::component('admin/components/stat_card', ['title' => 'Revenue', 'value' => '1,500,000₫'])
     */
    public static function component(string $componentName, array $data = []): void
    {
        extract($data);

        // Hỗ trợ đường dẫn view
        $file = __DIR__ . '/../app/Views/' . $componentName . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            echo "<!-- Component [{$componentName}] not found at {$file} -->";
        }
    }
}
