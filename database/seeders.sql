-- ==============================================================================
-- POSTGRESQL DATABASE SEEDERS - DỮ LIỆU MẪU BAN ĐẦU
-- ==============================================================================

-- 1. Tài khoản Quản trị viên (Admin) và Khách hàng mẫu
-- Mật khẩu mặc định: 'Admin@123' (đã hash bcrypt chuẩn PHP 8.5)
INSERT INTO users (name, email, password, phone, role, status) VALUES 
('Quản Trị Viên', 'admin@flowershop.vn', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0901234567', 'admin', 'active'),
('Nguyễn Văn Nam', 'nam.nguyen@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0912345678', 'customer', 'active');

-- 2. Danh mục: Loại hoa & Dịp tặng
INSERT INTO categories (name, slug, type, status) VALUES 
('Hoa Hồng Ecuador', 'hoa-hong-ecuador', 'flower_type', 'active'),
('Hoa Hướng Dương', 'hoa-huong-duong', 'flower_type', 'active'),
('Lan Hồ Điệp', 'lan-ho-diep', 'flower_type', 'active'),
('Hoa Tulip Hà Lan', 'hoa-tulip-ha-lan', 'flower_type', 'active'),
('Hoa Baby & Cúc Tana', 'hoa-baby-cuc-tana', 'flower_type', 'active'),
('Hoa Sinh Nhật', 'hoa-sinh-nhat', 'occasion', 'active'),
('Hoa Khai Trương', 'hoa-khai-truong', 'occasion', 'active'),
('Hoa Tình Yêu / Valentine', 'hoa-tinh-yeu', 'occasion', 'active'),
('Chúc Mừng 8/3 - 20/10', 'chuc-mung-ngay-le', 'occasion', 'active'),
('Hoa Chia Buồn', 'hoa-chia-buon', 'occasion', 'active');

-- 3. Sản phẩm mẫu
INSERT INTO products (parent_id, name, slug, sku, short_description, regular_price, sale_price, stock, thumbnail, status) VALUES 
(0, 'Bó Hoa Nắng Mai Tươi Sáng', 'bo-hoa-nang-mai-tuoi-sang', 'FLW-NM01', 'Tone vàng hướng dương phối baby trắng mang lại năng lượng tích cực.', 550000, 450000, 20, 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?auto=format&fit=crop&w=600&q=80', 'active'),
(0, 'Bó Hồng Đỏ Ecuador Kiêu Sa', 'bo-hong-do-ecuador-kieu-sa', 'FLW-HD01', 'Hồng đỏ Ecuador bông lớn nhập khẩu tượng trưng cho tình yêu mãnh liệt.', 750000, 680000, 15, 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=600&q=80', 'active'),
(0, 'Chậu Lan Hồ Điệp Phú Quý (3 Cành)', 'chau-lan-ho-diep-phu-quy', 'FLW-LHD03', 'Lan hồ điệp vàng hoàng gia, phù hợp khai trương hồng phát.', 1200000, NULL, 10, 'https://images.unsplash.com/photo-1525310072745-f49212b5ac6d?auto=format&fit=crop&w=600&q=80', 'active'),
(0, 'Hộp Hoa Tulip Hà Lan Pastel', 'hop-hoa-tulip-ha-lan-pastel', 'FLW-TL01', 'Tone hồng cam pastel ngọt ngào, sang trọng dành tặng phái đẹp.', 890000, 820000, 12, 'https://images.unsplash.com/photo-1520763185298-1b434c919102?auto=format&fit=crop&w=600&q=80', 'active');

-- 4. Mã giảm giá mẫu (Voucher)
INSERT INTO coupons (code, discount_type, discount_value, min_order_value, max_discount_amount, usage_limit, used_count, start_date, end_date, status) VALUES 
('FLOWERVIP50', 'fixed', 50000, 400000, 50000, 100, 0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP + INTERVAL '30 days', 'active'),
('CHAOHE10', 'percent', 10, 500000, 100000, 50, 0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP + INTERVAL '30 days', 'active');
