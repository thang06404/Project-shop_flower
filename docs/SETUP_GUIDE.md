# Hướng Dẫn Chạy & Vận Hành Dự Án (Setup Guide)

Tài liệu này hướng dẫn chi tiết cách thiết lập môi trường và chạy dự án FlowerShop trên máy cá nhân (Localhost).

## 1. Yêu Cầu Môi Trường (Prerequisites)
- **PHP**: ^8.2 (Khuyến nghị 8.5)
- **Database**: PostgreSQL
- **Web Server**: Apache, Nginx, hoặc PHP Built-in Server.
- **Composer**: Trình quản lý package của PHP.

## 2. Các Bước Cài Đặt Khởi Tạo

### Bước 1: Khởi tạo source code
Sau khi clone code về máy, bạn cần chạy lệnh cài đặt thư viện để Composer gen ra file autoload:
```bash
composer install
```
*(Nếu chưa cài composer, tải tại getcomposer.org)*

### Bước 2: Thiết lập biến môi trường (Environment Variables)
Sao chép file `.env.example` thành file `.env` ở thư mục gốc của dự án:
```bash
cp .env.example .env
```
Mở file `.env` và cập nhật thông tin kết nối CSDL (PostgreSQL):
```env
DB_HOST=127.0.0.1
DB_PORT=5432
DB_NAME=flowershop_db
DB_USER=postgres
DB_PASS=your_password
```

### Bước 3: Import Database
Bạn cần tạo database có tên tương ứng với `DB_NAME` trong PostgreSQL.
Sau đó, sử dụng lệnh psql hoặc công cụ như DBeaver / pgAdmin để import file schema (Ví dụ file `database/schema.sql` nếu có):
```bash
psql -U postgres -d flowershop_db -f database/schema.sql
```

## 3. Khởi Chạy Dự Án (Running the Application)

Dự án này sử dụng mô hình MVC tự thiết kế, với file duy nhất nhận request (Front Controller) là `public/index.php`. Do đó, khi chạy web server, thư mục gốc của server (Document Root) phải trỏ vào thư mục `public`.

### Lựa chọn 1: Chạy bằng PHP Built-in Server (Nhanh nhất)
Mở terminal ở thư mục gốc dự án (chứa file README) và chạy lệnh:
```bash
php -S localhost:8000 -t public
```
Sau đó mở trình duyệt và truy cập: `http://localhost:8000`
- **Trang Khách hàng**: `http://localhost:8000/`
- **Trang Quản trị (Admin)**: `http://localhost:8000/admin`

### Lựa chọn 2: Chạy qua XAMPP / MAMP (Apache)
- Di chuyển toàn bộ thư mục dự án vào thư mục `htdocs` (của XAMPP/MAMP).
- Thiết lập Virtual Host trong Apache để thư mục gốc (Document Root) trỏ tới `htdocs/Project-shop_flower/public`.
- Nếu không thiết lập Virtual Host, bạn có thể truy cập qua: `http://localhost/Project-shop_flower/public`. (Tuy nhiên cách này không khuyến khích vì có thể gây lỗi đường dẫn tĩnh css/js).

## 4. Xử Lý Lỗi Thường Gặp (Troubleshooting)

**Lỗi 404 Not Found khi chuyển trang**
- Đảm bảo bạn chạy server trỏ vào thư mục `-t public`. Mọi URL đều phải đi qua `public/index.php`.
- Nếu dùng Apache, đảm bảo file `public/.htaccess` tồn tại và module `mod_rewrite` đã được bật.

**Lỗi Database Connection Error**
- Kiểm tra lại file `.env`. Đảm bảo PostgreSQL đang chạy trên cổng `5432` và bạn đã tạo đúng Database name.
- Đảm bảo driver `pdo_pgsql` đã được bật trong file `php.ini`.
