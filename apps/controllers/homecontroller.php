<?php
class homecontroller
{
    // Phương thức hiển thị trang chủ
    public function index()
    {
        echo "Welcome to Pet Shop!";
    }

    // Phương thức hiển thị trang giới thiệu về cửa hàng
    public function about()
    {
        echo "About Us: We are your trusted Pet Shop!";
    }

    // Phương thức hiển thị trang liên hệ
    public function contact()
    {
        echo "Contact Us: You can reach us at contact@petshop.com";
    }

    // Phương thức để hiển thị sản phẩm
    public function showProduct($productId)
    {
        // Giả sử bạn có một mảng dữ liệu sản phẩm
        $products = [
            1 => 'Dog Food',
            2 => 'Cat Toy',
            3 => 'Fish Tank'
        ];

        if (isset($products[$productId])) {
            echo "Product: " . $products[$productId];
        } else {
            echo "Product not found!";
        }
    }
}

?>
