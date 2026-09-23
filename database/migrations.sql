-- ==============================================================================
-- POSTGRESQL DATABASE MIGRATIONS - FLOWER SHOP E-COMMERCE
-- Phiên bản: 4.5 (High-Concurrency, Perishable Logistics & Hardened Schema)
-- ==============================================================================

-- 1. BẢNG USERS (Người dùng & Phân quyền)
CREATE TABLE IF NOT EXISTS users (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    role VARCHAR(20) NOT NULL DEFAULT 'customer' CHECK (role IN ('customer', 'admin')),
    login_attempts INT NOT NULL DEFAULT 0,
    locked_until TIMESTAMP WITH TIME ZONE NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'active' CHECK (status IN ('active', 'banned', 'deleted')),
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

-- 2. BẢNG USER_ADDRESSES (Sổ địa chỉ người dùng)
CREATE TABLE IF NOT EXISTS user_addresses (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    recipient_name VARCHAR(100) NOT NULL,
    recipient_phone VARCHAR(20) NOT NULL,
    province_id INT NOT NULL,
    district_id INT NOT NULL,
    ward_code VARCHAR(20) NOT NULL,
    address_detail VARCHAR(255) NOT NULL,
    is_default BOOLEAN DEFAULT FALSE
);

-- 3. BẢNG PASSWORD_RESETS (Đặt lại mật khẩu)
CREATE TABLE IF NOT EXISTS password_resets (
    email VARCHAR(150) NOT NULL,
    token VARCHAR(100) NOT NULL PRIMARY KEY,
    expires_at TIMESTAMP WITH TIME ZONE NOT NULL,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

-- 4. BẢNG CATEGORIES (Danh mục loại hoa & Dịp tặng 2 chiều)
CREATE TABLE IF NOT EXISTS categories (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    slug VARCHAR(160) NOT NULL UNIQUE,
    type VARCHAR(30) NOT NULL DEFAULT 'flower_type' CHECK (type IN ('flower_type', 'occasion')),
    image VARCHAR(255),
    status VARCHAR(20) NOT NULL DEFAULT 'active' CHECK (status IN ('active', 'deleted'))
);

-- 5. BẢNG PRODUCTS (Sản phẩm cha & biến thể con)
CREATE TABLE IF NOT EXISTS products (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    parent_id INT NOT NULL DEFAULT 0,
    name VARCHAR(200) NOT NULL,
    slug VARCHAR(220) NOT NULL,
    sku VARCHAR(50) UNIQUE,
    short_description TEXT,
    description TEXT,
    regular_price DECIMAL(12, 2) NOT NULL DEFAULT 0,
    sale_price DECIMAL(12, 2) NULL,
    stock INT NOT NULL DEFAULT 0,
    thumbnail VARCHAR(255),
    status VARCHAR(20) NOT NULL DEFAULT 'active' CHECK (status IN ('active', 'draft', 'deleted')),
    created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

-- 6. BẢNG PRODUCT_IMAGES (Bộ sưu tập ảnh chi tiết bó hoa)
CREATE TABLE IF NOT EXISTS product_images (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    product_id INT NOT NULL REFERENCES products(id) ON DELETE CASCADE,
    image_url VARCHAR(255) NOT NULL,
    is_primary BOOLEAN DEFAULT FALSE,
    sort_order INT DEFAULT 0
);

-- 7. BẢNG PRODUCT_CATEGORIES (Quan hệ N-N Sản phẩm & Danh mục)
CREATE TABLE IF NOT EXISTS product_categories (
    product_id INT NOT NULL REFERENCES products(id) ON DELETE CASCADE,
    category_id INT NOT NULL REFERENCES categories(id) ON DELETE CASCADE,
    PRIMARY KEY (product_id, category_id)
);

-- 8. BẢNG ATTRIBUTES & ATTRIBUTE_TERMS (Biến thể kích cỡ, bình sứ)
CREATE TABLE IF NOT EXISTS attributes (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS attribute_terms (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    attribute_id INT NOT NULL REFERENCES attributes(id) ON DELETE CASCADE,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS product_attribute_values (
    product_id INT NOT NULL REFERENCES products(id) ON DELETE CASCADE,
    attribute_term_id INT NOT NULL REFERENCES attribute_terms(id) ON DELETE CASCADE,
    PRIMARY KEY (product_id, attribute_term_id)
);

-- 9. BẢNG CARTS (Giỏ hàng người dùng)
CREATE TABLE IF NOT EXISTS carts (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    product_id INT NOT NULL REFERENCES products(id) ON DELETE CASCADE,
    quantity INT NOT NULL DEFAULT 1 CHECK (quantity > 0),
    updated_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (user_id, product_id)
);

-- 10. BẢNG COUPONS (Mã giảm giá)
CREATE TABLE IF NOT EXISTS coupons (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,
    discount_type VARCHAR(20) NOT NULL CHECK (discount_type IN ('fixed', 'percent')),
    discount_value DECIMAL(12, 2) NOT NULL,
    min_order_value DECIMAL(12, 2) NOT NULL DEFAULT 0,
    max_discount_amount DECIMAL(12, 2) NULL,
    usage_limit INT NOT NULL DEFAULT 100,
    used_count INT NOT NULL DEFAULT 0,
    start_date TIMESTAMP WITH TIME ZONE NOT NULL,
    end_date TIMESTAMP WITH TIME ZONE NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'active' CHECK (status IN ('active', 'expired', 'disabled'))
);

-- 11. BẢNG ORDERS (Đơn hàng hoa tươi)
CREATE TABLE IF NOT EXISTS orders (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    order_code VARCHAR(30) NOT NULL UNIQUE,
    user_id INT NOT NULL REFERENCES users(id),
    buyer_name VARCHAR(100) NOT NULL,
    buyer_phone VARCHAR(20) NOT NULL,
    buyer_email VARCHAR(150) NOT NULL,
    recipient_name VARCHAR(100) NOT NULL,
    recipient_phone VARCHAR(20) NOT NULL,
    shipping_address VARCHAR(255) NOT NULL,
    to_district_id INT NOT NULL,
    to_ward_code VARCHAR(20) NOT NULL,
    delivery_date DATE NOT NULL,
    delivery_time_slot VARCHAR(50) NOT NULL,
    card_message TEXT NULL,
    is_anonymous_sender BOOLEAN DEFAULT FALSE,
    finished_image_url VARCHAR(255) NULL,
    note TEXT NULL,
    total_amount DECIMAL(12, 2) NOT NULL,
    shipping_fee DECIMAL(12, 2) NOT NULL DEFAULT 0,
    discount_amount DECIMAL(12, 2) NOT NULL DEFAULT 0,
    final_amount DECIMAL(12, 2) NOT NULL,
    payment_method VARCHAR(20) NOT NULL CHECK (payment_method IN ('cod', 'vnpay', 'momo')),
    payment_status VARCHAR(20) NOT NULL DEFAULT 'unpaid' CHECK (payment_status IN ('unpaid', 'paid', 'refund_pending', 'refunded')),
    order_status VARCHAR(20) NOT NULL DEFAULT 'pending' CHECK (order_status IN ('pending', 'preparing', 'shipping', 'completed', 'cancelled', 'delivery_failed')),
    payment_expires_at TIMESTAMP WITH TIME ZONE NULL,
    tracking_code VARCHAR(100) NULL,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

-- 12. BẢNG ORDER_DETAILS (Chi tiết hóa đơn & Giá lưu vết thời điểm mua)
CREATE TABLE IF NOT EXISTS order_details (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    order_id INT NOT NULL REFERENCES orders(id) ON DELETE CASCADE,
    product_id INT NOT NULL REFERENCES products(id),
    product_name VARCHAR(200) NOT NULL,
    variant_name VARCHAR(100) NULL,
    quantity INT NOT NULL CHECK (quantity > 0),
    price_at_purchase DECIMAL(12, 2) NOT NULL
);

-- 13. BẢNG REVIEWS (Đánh giá hoa sau khi nhận hàng thành công)
CREATE TABLE IF NOT EXISTS reviews (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id),
    product_id INT NOT NULL REFERENCES products(id),
    order_id INT NOT NULL REFERENCES orders(id),
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    status VARCHAR(20) NOT NULL DEFAULT 'approved' CHECK (status IN ('approved', 'hidden')),
    created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

-- 14. BẢNG JOINS / JOBS (Hàng đợi Bất đồng bộ PostgreSQL JSONB)
CREATE TABLE IF NOT EXISTS jobs (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    task_name VARCHAR(100) NOT NULL,
    payload JSONB NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'pending' CHECK (status IN ('pending', 'processing', 'completed', 'failed')),
    attempts INT NOT NULL DEFAULT 0,
    error_log TEXT NULL,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

-- ==============================================================================
-- CHỈ MỤC TỐI ƯU HIỆU NĂNG (INDEXES)
-- ==============================================================================
CREATE INDEX IF NOT EXISTS idx_products_slug ON products(slug);
CREATE INDEX IF NOT EXISTS idx_categories_slug ON categories(slug);
CREATE INDEX IF NOT EXISTS idx_products_parent_status ON products(parent_id, status);
CREATE INDEX IF NOT EXISTS idx_orders_user_id ON orders(user_id);
CREATE INDEX IF NOT EXISTS idx_orders_order_code ON orders(order_code);
CREATE INDEX IF NOT EXISTS idx_orders_tracking ON orders(order_code, buyer_phone);
CREATE INDEX IF NOT EXISTS idx_orders_slot_capacity ON orders(delivery_date, delivery_time_slot, order_status);
CREATE INDEX IF NOT EXISTS idx_orders_status_created ON orders(order_status, created_at DESC);
CREATE INDEX IF NOT EXISTS idx_jobs_status_attempts ON jobs(status, attempts);
