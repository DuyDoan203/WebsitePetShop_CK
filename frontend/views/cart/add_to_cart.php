<?php
session_start(); // Khởi tạo session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra nếu giỏ hàng chưa được khởi tạo
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Lấy thông tin sản phẩm từ form
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productImage = $_POST['product_image'];
    $quantity = $_POST['quantity'];

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    if (isset($_SESSION['cart'][$productId])) {
        // Nếu có, tăng số lượng sản phẩm
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        // Nếu chưa có, thêm sản phẩm vào giỏ hàng
        $_SESSION['cart'][$productId] = [
            'name' => $productName,
            'price' => $productPrice,
            'img' => $productImage,
            'quantity' => $quantity
        ];
    }

    // Chuyển hướng về trang giỏ hàng
    header("Location: cart.php");
    exit();
}
?>
