<?php
// Bắt đầu session
session_start();

// Hủy tất cả dữ liệu session
session_unset();

// Hủy session
session_destroy();

// Chuyển hướng người dùng về trang chủ (hoặc trang đăng nhập)
header("Location: /WebsitePetShop/frontend/views/home.php");
exit();
?>