<?php

namespace App\Controllers;

use Core\Controller;

class BlogController extends Controller
{
    public function index()
    {
        // Mock data for UI preview
        $posts = [
            [
                'id' => 1,
                'title' => 'Ý Nghĩa Các Loài Hoa Ngày Phụ Nữ Việt Nam 20/10',
                'excerpt' => 'Hoa hồng đỏ tượng trưng cho tình yêu mãnh liệt, hoa cẩm chướng thể hiện sự biết ơn, trong khi lan hồ điệp mang ý nghĩa của sự sang trọng và quý phái...',
                'image' => 'https://images.unsplash.com/photo-1563241527-3004b7be0ffd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'created_at' => '2023-10-15 08:30:00',
                'author' => 'Admin'
            ],
            [
                'id' => 2,
                'title' => 'Bí Quyết Giữ Hoa Tươi Lâu Trong Ngày Hè',
                'excerpt' => 'Thời tiết oi bức của mùa hè khiến hoa nhanh héo. Hãy cùng FlowerShop tìm hiểu 5 mẹo đơn giản giúp bình hoa của bạn luôn tươi tắn rạng rỡ...',
                'image' => 'https://images.unsplash.com/photo-1582794543139-8ac9cb0f7b11?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'created_at' => '2023-08-22 14:15:00',
                'author' => 'FlowerShop'
            ],
            [
                'id' => 3,
                'title' => 'Tặng Hoa Gì Cho Ngày Khai Trương Hồng Phát?',
                'excerpt' => 'Khai trương là dịp quan trọng để gửi lời chúc may mắn. Chọn hoa hướng dương, đồng tiền hay lan hồ điệp để mang lại vượng khí cho gia chủ?',
                'image' => 'https://images.unsplash.com/photo-1591886960571-74d43a9d4166?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'created_at' => '2023-07-10 09:00:00',
                'author' => 'Admin'
            ],
            [
                'id' => 4,
                'title' => 'Giải Mã Ngôn Ngữ Của Hoa Hồng Qua Số Lượng',
                'excerpt' => 'Bạn có biết 1 đóa hồng mang ý nghĩa "Tình yêu duy nhất", trong khi 99 đóa hồng tượng trưng cho "Tình yêu vĩnh cửu"? Cùng tìm hiểu nhé...',
                'image' => 'https://images.unsplash.com/photo-1548883354-94cb0ce5c4f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'created_at' => '2023-02-12 16:45:00',
                'author' => 'FlowerShop'
            ],
            [
                'id' => 5,
                'title' => 'Hoa Chia Buồn: Gửi Trọn Niềm Thành Kính',
                'excerpt' => 'Hoa chia buồn không chỉ là vòng hoa, mà còn là lời động viên sâu sắc gửi tới gia quyến. Nên chọn màu sắc và loài hoa nào cho phù hợp?',
                'image' => 'https://images.unsplash.com/photo-1505672109673-99757643bcae?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'created_at' => '2023-01-05 10:20:00',
                'author' => 'Admin'
            ]
        ];

        return $this->view('client/blog', [
            'title' => 'Tin Tức & Blog - Cửa Hàng Hoa Tươi Cao Cấp',
            'posts' => $posts
        ]);
    }

    public function detail($id)
    {
        // Mock data cho trang chi tiết
        $post = [
            'id' => $id,
            'title' => 'Ý Nghĩa Các Loài Hoa Ngày Phụ Nữ Việt Nam 20/10',
            'content' => '
                <p class="lead">Hoa hồng đỏ tượng trưng cho tình yêu mãnh liệt, hoa cẩm chướng thể hiện sự biết ơn, trong khi lan hồ điệp mang ý nghĩa của sự sang trọng và quý phái...</p>
                <p>Ngày Phụ nữ Việt Nam 20/10 là dịp đặc biệt để tôn vinh và bày tỏ lòng biết ơn, tình yêu thương đến những người phụ nữ trong cuộc đời bạn. Một bó hoa tươi thắm luôn là món quà tuyệt vời nhất để thay lời muốn nói.</p>
                <h4 class="mt-4 mb-3 font-serif fw-bold">1. Hoa Hồng Đỏ - Tình yêu mãnh liệt và vĩnh cửu</h4>
                <p>Nhắc đến tình yêu, không thể không nhắc đến hoa hồng đỏ. Đây là loài hoa kinh điển nhất và luôn là sự lựa chọn hàng đầu của phái mạnh để tặng cho vợ hoặc bạn gái. Màu đỏ rực rỡ tượng trưng cho ngọn lửa tình yêu đang bùng cháy.</p>
                <div class="my-4 text-center">
                    <img src="https://images.unsplash.com/photo-1548883354-94cb0ce5c4f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded-4 shadow-sm" alt="Hoa Hồng Đỏ">
                    <p class="text-muted small mt-2"><i>Hoa hồng đỏ - Nữ hoàng của các loài hoa</i></p>
                </div>
                <h4 class="mt-4 mb-3 font-serif fw-bold">2. Hoa Cẩm Chướng - Tình mẫu tử thiêng liêng</h4>
                <p>Nếu bạn muốn tặng mẹ, thì hoa cẩm chướng chính là sự lựa chọn hoàn hảo nhất. Loài hoa này tượng trưng cho sự biết ơn sâu sắc, tình yêu thương vô bờ bến và sự hy sinh cao cả của người mẹ.</p>
                <h4 class="mt-4 mb-3 font-serif fw-bold">3. Lan Hồ Điệp - Sự sang trọng và quý phái</h4>
                <p>Được mệnh danh là "Nữ hoàng của các loài hoa lan", lan hồ điệp mang vẻ đẹp sang trọng, thanh tao và vô cùng quý phái. Đây là món quà rất thích hợp để tặng đối tác nữ, sếp nữ hoặc những người phụ nữ có gu thẩm mỹ tinh tế.</p>
                <p class="mt-4">Hãy ghé thăm FlowerShop để chọn cho mình những bó hoa tươi thắm nhất dành tặng những người phụ nữ thân yêu trong dịp 20/10 này nhé!</p>
            ',
            'image' => 'https://images.unsplash.com/photo-1563241527-3004b7be0ffd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'created_at' => '2023-10-15 08:30:00',
            'author' => 'Admin'
        ];

        return $this->view('client/blog_detail', [
            'title' => $post['title'] . ' - FlowerShop',
            'post' => $post
        ]);
    }
}
