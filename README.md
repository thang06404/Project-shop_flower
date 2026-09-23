# Project FlowerShop - Cửa Hàng Hoa Tươi Cao Cấp

FlowerShop là một dự án đồ án website thương mại điện tử chuyên cung cấp hoa tươi, được xây dựng theo kiến trúc **Native MVC (Model-View-Controller)** sử dụng PHP thuần (không dùng framework như Laravel) kết hợp với các design pattern như **Service** và **Repository**.

Dự án này mang lại trải nghiệm mua sắm hiện đại, giao diện mượt mà và tập trung vào các tính năng đặc thù của ngành hoa (chọn ngày giao hỏa tốc, ghi thông điệp thiệp).

## Điểm Nổi Bật
- **Kiến trúc Native MVC**: Tách biệt rõ ràng logic (Controller), dữ liệu (Model/Repository), và giao diện (View).
- **Thiết kế UI/UX hiện đại**: Giao diện Client sử dụng Bootstrap 5 với thiết kế mềm mại (Glassmorphism, bóng đổ diffuse). Admin Panel sử dụng giao diện Volt Dashboard chuyên nghiệp.
- **Tính năng ngành hoa**: Hỗ trợ ghi thiệp chúc mừng, chọn khung giờ giao hàng hỏa tốc, quản lý đơn hàng.

## Cài Đặt Dự Án Nhanh

### 1. Yêu cầu hệ thống
- **PHP**: Phiên bản 8.2 trở lên (Khuyến nghị PHP 8.5 theo dự án).
- **Cơ sở dữ liệu**: PostgreSQL.
- **Web Server**: Apache hoặc Nginx.
- **Composer**: Quản lý các thư viện autoload.

### 2. Các bước cài đặt

#### Cách 1: Sử dụng Docker (Khuyến nghị)
Đây là cách nhanh và đồng nhất nhất để khởi chạy dự án bao gồm cả Web Server, PHP 8.5 và PostgreSQL.

**Bước 1: Clone dự án**
```bash
git clone <repository_url>
cd Project-shop_flower
```

**Bước 2: Khởi chạy bằng Docker Compose**
```bash
docker-compose up -d
```
Lệnh này sẽ tự động tải các image cần thiết, chạy container, mount mã nguồn và khởi tạo cơ sở dữ liệu.

**Bước 3: Cài đặt thư viện (nếu cần)**
Vào container để cài đặt thư viện qua composer:
```bash
docker exec -it shop_flower_app bash
composer install
exit
```

**Bước 4: Truy cập ứng dụng**
Website sẽ hoạt động tại `http://localhost:8000`. Cơ sở dữ liệu sẽ tự động được nạp từ các file `.sql` khi khởi tạo.

---

#### Cách 2: Cài đặt thủ công (Không dùng Docker)

**Bước 1: Clone dự án**
```bash
git clone <repository_url>
cd Project-shop_flower
```

**Bước 2: Cài đặt thư viện**
```bash
composer install
```
(Lệnh này sẽ tạo thư mục `vendor` chứa các file cần thiết cho cơ chế autoload).

**Bước 3: Cấu hình môi trường**
Sao chép file cấu hình mẫu và điền thông tin database:
```bash
cp .env.example .env
```
Cập nhật thông tin kết nối CSDL trong file `.env`.

**Bước 4: Thiết lập Cơ sở dữ liệu**
Import file SQL (nếu có) vào PostgreSQL để tạo các bảng dữ liệu cơ sở:
```bash
psql -U username -d database_name -f database/schema.sql
```

**Bước 5: Chạy dự án**
Sử dụng PHP built-in server để chạy thử ở môi trường phát triển:
```bash
php -S localhost:8000 -t public
```
Website sẽ hoạt động tại `http://localhost:8000`.

## Tài Liệu Tham Khảo (Docs)
Để tìm hiểu sâu hơn về dự án, vui lòng xem các tài liệu trong thư mục `docs/`:
- [Quy tắc code (Coding Guidelines)](docs/CODING_GUIDELINES.md)
- [Tài liệu yêu cầu dự án (Requirements/RD)](docs/REQUIREMENTS.md)
- [Hướng dẫn vận hành & triển khai (Setup Guide)](docs/SETUP_GUIDE.md)

## Tác Giả & Đóng Góp
Đồ án môn học Công Nghệ Website - Hệ Đại học. Mọi ý kiến đóng góp vui lòng mở Issue hoặc Pull Request.
