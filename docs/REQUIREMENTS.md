# Tài Liệu Yêu Cầu Dự Án (Requirements Document - RD)

Tài liệu này đặc tả các yêu cầu chức năng và nghiệp vụ của dự án hệ thống cửa hàng hoa tươi FlowerShop.

## 1. Tổng quan hệ thống
Hệ thống cho phép khách hàng xem, tìm kiếm và đặt mua hoa tươi online. Về phía ban quản trị, hệ thống cung cấp giao diện (Admin Panel) để quản lý sản phẩm, đơn hàng, khách hàng và các chương trình khuyến mãi.

## 2. Yêu cầu tính năng phía Khách Hàng (Client/Frontend)

- **Trang chủ**:
  - Hiển thị banner lớn, các ưu điểm của hệ thống.
  - Danh sách danh mục/dịp tặng hoa (Sinh nhật, Khai trương, Tình yêu...).
  - Danh sách sản phẩm nổi bật/khuyến mãi.
- **Danh mục sản phẩm (Catalog)**:
  - Hiển thị danh sách hoa theo chủ đề hoặc loại hoa.
  - Hỗ trợ lọc theo giá, đánh giá.
- **Chi tiết sản phẩm**:
  - Xem nhiều ảnh sản phẩm.
  - Xem thông tin giá, mô tả, số lượng tồn kho.
  - Chọn số lượng và nhập **Nội dung in thiệp/banner** (tính năng đặc thù).
  - Nút thêm vào giỏ hàng.
- **Giỏ hàng (Cart)**:
  - Xem danh sách sản phẩm trong giỏ, tổng tiền.
  - Cập nhật số lượng, xóa sản phẩm.
  - Nhập mã giảm giá.
- **Thanh toán (Checkout)**:
  - Nhập thông tin người đặt và người nhận (có thể khác nhau).
  - Chọn **Thời gian giao hàng mong muốn** (VD: Hỏa tốc, Sáng mai...).
  - Chọn phương thức thanh toán (COD hoặc Chuyển khoản).
- **Tài khoản cá nhân**:
  - Đăng ký, đăng nhập (hỗ trợ nhập email/password cơ bản).
  - Tra cứu lịch sử đơn hàng và tiến độ giao hàng.
- **Tin tức & Bài viết (Blog)**:
  - Xem danh sách bài viết (mẹo chăm sóc hoa, ý nghĩa các loài hoa...).
  - Đọc chi tiết bài viết.

## 3. Yêu cầu tính năng phía Quản Trị (Admin/Backend)

- **Dashboard**: Thống kê tổng quan (doanh thu, số đơn hàng, khách hàng mới).
- **Quản lý Đơn hàng (Orders)**:
  - Xem danh sách đơn hàng.
  - Cập nhật trạng thái đơn hàng (Chờ xác nhận, Đang cắm hoa, Đang giao, Hoàn thành, Hủy).
- **Quản lý Sản phẩm (Products)**:
  - Thêm, sửa, xóa (CRUD) hoa.
  - Quản lý kho, giá gốc, giá khuyến mãi, hình ảnh.
- **Quản lý Danh mục (Categories)**:
  - Tạo, chỉnh sửa tên danh mục.
- **Quản lý Khách hàng (Customers)**:
  - Xem thông tin khách hàng, lịch sử mua hàng.
  - Quản lý trạng thái tài khoản (Khóa/Mở).
- **Quản lý Mã giảm giá (Coupons)**:
  - Tạo mã, set mức giảm (theo % hoặc số tiền cố định).
  - Đặt điều kiện áp dụng và hạn sử dụng.
- **Quản lý Đánh giá (Reviews)**:
  - Xem và quản lý các bình luận/đánh giá của khách. 
  - Khả năng ẩn đánh giá rác.
- **Quản lý Bài viết (Blog)**:
  - Thêm, sửa, xóa bài viết.
  - Tích hợp trình soạn thảo (Rich Text Editor).
  - Ẩn/hiển thị bài viết (Publish/Draft).

## 4. Yêu cầu phi chức năng (Non-Functional Requirements)
- **Responsive**: Giao diện phải hiển thị tốt trên Điện thoại, Máy tính bảng và Desktop.
- **Bảo mật**: Chống tấn công XSS, SQL Injection. Sử dụng PDO prepare statement cho mọi truy vấn database. Passwords phải được băm (hashing). Có hệ thống bảo mật CSRF Token cho các Form.
- **Hệ thống Ghi log (System Logging)**: Mọi lỗi ngoại lệ (Exceptions) từ Database và Backend phải được tự động ghi lại vào file `storage/logs/app.log` với thông tin về thời gian, cấp độ cảnh báo và ngữ cảnh (Context JSON) để dễ dàng gỡ lỗi và bảo trì.
- **Trải nghiệm người dùng (UX)**: Giao diện mượt mà, sử dụng bóng đổ diffuse, bo góc mềm mại, hiển thị ảnh chất lượng cao. Thông báo hành động rõ ràng bằng Toast/SweetAlert.
