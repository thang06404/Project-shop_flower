<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class ProductController extends Controller
{
    // Hiển thị danh mục sản phẩm
    public function category($slug)
    {
        // Mock data
        $categoryName = "Hoa Khai Trương";
        $products = [
            [
                'id' => 1,
                'name' => 'Lẵng Hoa Hồng Đỏ Khai Trương',
                'slug' => 'lang-hoa-hong-do-khai-truong',
                'image' => 'https://images.unsplash.com/photo-1591886960571-74d43a9d4166?auto=format&fit=crop&w=800&q=80',
                'regular_price' => 1500000,
                'sale_price' => 1200000,
                'rating' => 5,
                'reviews' => 24
            ],
            [
                'id' => 2,
                'name' => 'Kệ Hoa Hướng Dương May Mắn',
                'slug' => 'ke-hoa-huong-duong-may-man',
                'image' => 'https://images.unsplash.com/photo-1563241598-65166299b646?auto=format&fit=crop&w=800&q=80',
                'regular_price' => 2000000,
                'sale_price' => null,
                'rating' => 4.5,
                'reviews' => 18
            ],
            [
                'id' => 3,
                'name' => 'Bó Hoa Đồng Tiền Phát Tài',
                'slug' => 'bo-hoa-dong-tien-phat-tai',
                'image' => 'https://images.unsplash.com/photo-1582794543139-8ac9cb0f7b11?auto=format&fit=crop&w=800&q=80',
                'regular_price' => 800000,
                'sale_price' => 650000,
                'rating' => 5,
                'reviews' => 50
            ],
            [
                'id' => 4,
                'name' => 'Lan Hồ Điệp Trắng Sang Trọng',
                'slug' => 'lan-ho-diep-trang-sang-trong',
                'image' => 'https://images.unsplash.com/photo-1613143521251-246d81744b58?auto=format&fit=crop&w=800&q=80',
                'regular_price' => 3500000,
                'sale_price' => 3200000,
                'rating' => 5,
                'reviews' => 112
            ],
            [
                'id' => 5,
                'name' => 'Lẵng Hoa Hồng Phấn Ngọt Ngào',
                'slug' => 'lang-hoa-hong-phan-ngot-ngao',
                'image' => 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&w=800&q=80',
                'regular_price' => 1200000,
                'sale_price' => null,
                'rating' => 4,
                'reviews' => 8
            ],
            [
                'id' => 6,
                'name' => 'Bó Hoa Baby Trắng Tinh Khôi',
                'slug' => 'bo-hoa-baby-trang',
                'image' => 'https://images.unsplash.com/photo-1508784411316-02b8cd4d3a3a?auto=format&fit=crop&w=800&q=80',
                'regular_price' => 500000,
                'sale_price' => 450000,
                'rating' => 4.8,
                'reviews' => 60
            ]
        ];

        View::render('client/category', [
            'title' => $categoryName . ' - FlowerShop',
            'categoryName' => $categoryName,
            'products' => $products
        ]);
    }

    // Hiển thị chi tiết sản phẩm
    public function detail($slug)
    {
        // Mock data
        $product = [
            'id' => 1,
            'name' => 'Lẵng Hoa Hồng Đỏ Khai Trương',
            'sku' => 'FL-HONG-01',
            'slug' => 'lang-hoa-hong-do-khai-truong',
            'images' => [
                'https://images.unsplash.com/photo-1591886960571-74d43a9d4166?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1582794543139-8ac9cb0f7b11?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1561181286-d3fee7d55364?auto=format&fit=crop&w=800&q=80'
            ],
            'regular_price' => 1500000,
            'sale_price' => 1200000,
            'description' => '<p>Lẵng hoa hồng đỏ rực rỡ, tượng trưng cho sự may mắn, phát tài phát lộc. Rất phù hợp để tặng trong các dịp khai trương, chúc mừng kỷ niệm thành lập công ty.</p><ul><li>Hoa hồng đỏ Ecuador cao cấp</li><li>Hoa baby trắng nhập khẩu</li><li>Lá phụ trang trí</li><li>Giỏ hoa mây tre đan thủ công</li></ul>',
            'stock' => 5,
            'rating' => 4.8,
            'reviews_count' => 24
        ];

        $relatedProducts = [
            [
                'id' => 2,
                'name' => 'Kệ Hoa Hướng Dương May Mắn',
                'slug' => 'ke-hoa-huong-duong-may-man',
                'image' => 'https://images.unsplash.com/photo-1563241598-65166299b646?auto=format&fit=crop&w=800&q=80',
                'regular_price' => 2000000,
                'sale_price' => null
            ],
            [
                'id' => 3,
                'name' => 'Bó Hoa Đồng Tiền Phát Tài',
                'slug' => 'bo-hoa-dong-tien-phat-tai',
                'image' => 'https://images.unsplash.com/photo-1582794543139-8ac9cb0f7b11?auto=format&fit=crop&w=800&q=80',
                'regular_price' => 800000,
                'sale_price' => 650000
            ],
            [
                'id' => 4,
                'name' => 'Lan Hồ Điệp Trắng Sang Trọng',
                'slug' => 'lan-ho-diep-trang-sang-trong',
                'image' => 'https://images.unsplash.com/photo-1613143521251-246d81744b58?auto=format&fit=crop&w=800&q=80',
                'regular_price' => 3500000,
                'sale_price' => 3200000
            ],
            [
                'id' => 6,
                'name' => 'Bó Hoa Baby Trắng Tinh Khôi',
                'slug' => 'bo-hoa-baby-trang',
                'image' => 'https://images.unsplash.com/photo-1508784411316-02b8cd4d3a3a?auto=format&fit=crop&w=800&q=80',
                'regular_price' => 500000,
                'sale_price' => 450000
            ]
        ];

        $reviews = [
            [
                'id' => 1,
                'customer_name' => 'Nguyễn Văn A',
                'rating' => 5,
                'content' => 'Hoa giao rất đúng giờ, hoa tươi và giống với hình mẫu. Khách hàng của mình rất thích lẵng hoa khai trương này.',
                'created_at' => '20/10/2023'
            ],
            [
                'id' => 2,
                'customer_name' => 'Trần Thị B',
                'rating' => 4,
                'content' => 'Lẵng hoa to và đẹp, tuy nhiên shipper gọi nhầm số nên giao hơi trễ một chút xíu. Nhìn chung vẫn rất ưng ý với chất lượng hoa.',
                'created_at' => '15/10/2023'
            ]
        ];

        View::render('client/detail', [
            'title' => $product['name'] . ' - FlowerShop',
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'reviews' => $reviews
        ]);
    }
}
