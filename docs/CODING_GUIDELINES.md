# Quy Tắc Code (Coding Guidelines)

Tài liệu này quy định các chuẩn mực và phong cách viết code cho dự án FlowerShop, đảm bảo tính nhất quán, dễ đọc và dễ bảo trì.

## 1. Chuẩn PHP (PSR)
Dự án tuân thủ nghiêm ngặt các tiêu chuẩn **PSR (PHP Standard Recommendations)**, đặc biệt là:
- **PSR-1: Basic Coding Standard**: Quy tắc cơ bản về file, tên class, method.
- **PSR-4: Autoloader**: Cấu trúc thư mục phải ánh xạ 1-1 với namespace. Ví dụ: class `App\Controllers\HomeController` phải nằm ở file `app/Controllers/HomeController.php`.
- **PSR-12: Extended Coding Style**: Quy tắc về dấu ngoặc, thụt lề, khoảng trắng.

## 2. Kiến Trúc Thư Mục
Dự án không dùng framework nhưng tổ chức theo mẫu MVC kết hợp Repository/Service.
- `app/Controllers/`: Xử lý HTTP Request, xác thực, gọi Service/Model, trả về View.
- `app/Models/`: Chứa các class đại diện cho cấu trúc dữ liệu (Entities).
- `app/Repositories/`: Quản lý logic tương tác trực tiếp với Database (Truy vấn SQL, PDO).
- `app/Services/`: Xử lý business logic phức tạp (tính tổng tiền, áp mã giảm giá).
- `app/Views/`: Giao diện người dùng. Chia thành `admin/` và `client/`.
- `public/`: Thư mục gốc của web server, chứa `index.php` và các file tĩnh (css, js, images).
- `Core/`: Chứa các thư viện nền tảng tự build (Router, View, Database, Auth).

## 3. Quy Tắc Viết Code (Naming Convention)
- **Tên Class**: Viết hoa chữ cái đầu mỗi từ (PascalCase). Ví dụ: `ProductController`, `OrderRepository`.
- **Tên Method/Hàm**: Dùng kiểu con lạc đà (camelCase). Ví dụ: `getProductById()`, `calculateTotal()`.
- **Tên Biến**: camelCase cho PHP (`$productName`), snake_case cho trường trong Database (`product_name`).
- **Tên Hằng số (Constants)**: Viết hoa toàn bộ, cách nhau bằng dấu gạch dưới. Ví dụ: `MAX_UPLOAD_SIZE`, `STATUS_PENDING`.
- **Views/Files**: Dùng chữ thường, có thể dùng dấu gạch ngang (kebab-case) hoặc gạch dưới (snake_case). Ví dụ: `detail.php`, `status_badge.php`.

## 4. Quy Tắc Giao Diện (Frontend)
- **Tách biệt Logic và View**: Hạn chế viết PHP xử lý logic phức tạp trong View. Chỉ dùng PHP để lặp (`foreach`) hoặc in biến (`<?= e($var) ?>`).
- **Hàm `e()` để chống XSS**: Luôn bọc các biến output ra ngoài HTML bằng hàm `e()` (hoặc `htmlspecialchars`) để tránh lỗi bảo mật XSS.
- **Icon**: Sử dụng **FontAwesome v6** (`<i class="fa-solid fa-..."></i>`) hoặc Bootstrap Icons. Tuyệt đối không dùng Emoji trên giao diện.
- **Admin UI**: Bảng dữ liệu luôn phải dùng thuộc tính chống vỡ layout (`flex-shrink-0` cho ảnh, `text-wrap` cho text).

## 5. Comment và Tài liệu code (DocBlocks)
- Mỗi class và phương thức phức tạp cần có DocBlock mô tả mục đích, danh sách tham số (param) và giá trị trả về (return).
```php
/**
 * Lấy danh sách sản phẩm theo danh mục.
 *
 * @param int $categoryId ID của danh mục
 * @param int $limit Số lượng sản phẩm muốn lấy
 * @return array Mảng chứa dữ liệu sản phẩm
 */
public function getProductsByCategory(int $categoryId, int $limit = 10): array
{
    // ...
}
```
