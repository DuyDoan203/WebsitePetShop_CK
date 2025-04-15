<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetShop</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/WebsitePetShop/frontend/views/home.php">🐾 PetShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="/WebsitePetShop/frontend/views/home.php">Trang chủ</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="productDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sản phẩm
          </a>
          <ul class="dropdown-menu" aria-labelledby="productDropdown">
            <li><a class="dropdown-item" href="/WebsitePetShop/frontend/views/product/products.php?type=all"><i class="fas fa-list me-2 text-secondary"></i>Tất cả</a></li>
            <li><a class="dropdown-item" href="/WebsitePetShop/frontend/views/product/products.php?type=food"><i class="fas fa-bone me-2 text-warning"></i>Thức ăn</a></li>
            <li><a class="dropdown-item" href="/WebsitePetShop/frontend/views/product/products.php?type=accessory"><i class="fas fa-ribbon me-2 text-pink"></i>Phụ kiện</a></li>
            <li><a class="dropdown-item" href="/WebsitePetShop/frontend/views/product/products.php?type=pet"><i class="fas fa-dog me-2 text-primary"></i>Thú cưng</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="/WebsitePetShop/frontend/views/services/services.php"><i class="fas fa-concierge-bell me-1"></i> Dịch vụ</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebsitePetShop/frontend/views/contact/contact.php"><i class="fas fa-envelope me-1"></i> Liên hệ</a></li>

        <?php if (isset($_SESSION['username'])): ?>
        <!-- Nếu đã đăng nhập -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user me-1"></i> Xin chào, <?= $_SESSION['username'] ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="accountDropdown">
            <li><a class="dropdown-item" href="/WebsitePetShop/frontend/views/user/logout.php"><i class="fas fa-sign-out-alt me-2 text-danger"></i>Đăng xuất</a></li>
          </ul>
        </li>
        <?php else: ?>
        <!-- Nếu chưa đăng nhập -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user me-1"></i> Tài Khoản
          </a>
          <ul class="dropdown-menu" aria-labelledby="accountDropdown">
            <li><a class="dropdown-item" href="/WebsitePetShop/frontend/views/user/login.php"><i class="fas fa-sign-in-alt me-2 text-success"></i>Đăng nhập</a></li>
            <li><a class="dropdown-item" href="/WebsitePetShop/frontend/views/user/register.php"><i class="fas fa-user-plus me-2 text-primary"></i>Đăng ký</a></li>
          </ul>
        </li>
        <?php endif; ?>

        <li class="nav-item"><a class="nav-link" href="/WebsitePetShop/frontend/views/cart/cart.php"><i class="fas fa-shopping-cart me-1"></i> Giỏ Hàng</a></li>
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
