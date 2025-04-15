<?php
session_start();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Kiểm tra và xóa sản phẩm khỏi giỏ hàng
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }

    // Chuyển hướng lại trang giỏ hàng
    header("Location: cart.php");
    exit();
}
?>
