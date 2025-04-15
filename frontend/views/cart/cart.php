<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$products = [
    'food' => [
      ['name' => 'Thức ăn cho chó Pug', 'img' => 'https://fagopet.vn/uploads/images/62722b779487f640d9f4da91/thuc-an-cho-cho-royal-canin-pug-adult-1500g.webp', 'price' => '120.000đ'],
      ['name' => 'Xương gặm cho cún', 'img' => 'https://petcorner.vn/wp-content/uploads/2023/04/xuong-orgo.png', 'price' => '60.000đ'],
      ['name' => 'Hạt Royal Canin cho mèo', 'img' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/383/944/products/1-a94831a4-5b0e-495c-b6f1-eaa81c077b75.png?v=1587887293380', 'price' => '115.000đ'],
      ['name' => 'Thức ăn mềm cho cún', 'img' => 'https://down-vn.img.susercontent.com/file/7248467fa364c714553a24638d915e65', 'price' => '80.000đ'],
      ['name' => 'Súp thưởng cho mèo', 'img' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lvzm0wifgwyj75', 'price' => '45.000đ'],
      ['name' => 'Thức ăn mèo Whiskas', 'img' => 'https://vinpet.com.vn/wp-content/uploads/2020/11/Thuc-an-cho-meo-whiskas-adult.jpg', 'price' => '95.000đ'],
    ],
    'accessory' => [
      ['name' => 'Vòng cổ hình xương', 'img' => 'https://down-vn.img.susercontent.com/file/d238ae5c359008dc464ff23e8f855ebc', 'price' => '50.000đ'],
      ['name' => 'Bát ăn inox 2 ngăn', 'img' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lsdzf91tnm3dc9', 'price' => '70.000đ'],
      ['name' => 'Đồ chơi gặm nhấm', 'img' => 'https://product.hstatic.net/200000521195/product/11f3f4f3-a2e9-4c52-afc7-9a723a4506c3_5d96619ecff7472eb81f6e58333e4d4e.jpeg', 'price' => '40.000đ'],
      ['name' => 'Lược chải lông chó mèo', 'img' => 'https://cdn-img-v2.mybota.vn/uploadv2/web/12/12107/product/2022/10/31/06/26/1667185342_2b9a3150978a4cbbf81897de8b532a6f.jpg', 'price' => '35.000đ'],
      ['name' => 'Quần áo cho mèo', 'img' => 'https://cbu01.alicdn.com/img/ibank/O1CN012FGyT91UaADaqE7Ko_!!3642712533-0-cib.jpg', 'price' => '95.000đ'],
      ['name' => 'Dây dắt có chuông', 'img' => 'https://down-vn.img.susercontent.com/file/570a54d790c57a18aba371c4fa968e45', 'price' => '65.000đ'],
    ],
    'pet' => [
      ['name' => 'Chó Poodle thuần chủng', 'img' => 'https://opet.com.vn/wp-content/uploads/2022/09/poodle-thuan-chung-opetshop-12.jpg', 'price' => '3.500.000đ'],
      ['name' => 'Mèo Ba Tư trắng', 'img' => 'https://fagopet.vn/storage/rw/uw/rwuwaadsb3vf6l8q7tr5lq2wc8vu_meo-ba-tu-trang-2.webp', 'price' => '2.800.000đ'],
      ['name' => 'Chó Corgi tai cụp', 'img' => 'https://pethouse.com.vn/wp-content/uploads/2023/01/41fea5e9220b48c028de5e860ab8b43a-800x800.jpg', 'price' => '4.200.000đ'],
      ['name' => 'Mèo Scottish tai cụp', 'img' => 'https://fagopet.vn/storage/w8/36/w836jnuradbdm1h4inmy1q4u8e86_ban-meo-scottish-tai-cup-4.webp', 'price' => '3.000.000đ'],
      ['name' => 'Chó Golden Retriever', 'img' => 'https://fagopet.vn/storage/a2/s5/a2s54b5z07cd8rycuk0q2lhvh0ym_cho-golden-trang-1.webp', 'price' => '3.900.000đ'],
      ['name' => 'Mèo Anh lông ngắn', 'img' => 'https://fagopet.vn/storage/q1/6l/q16l3ri7zlqrdw7aa573amok2se0_ban-meo-anh-long-ngan_(3).webp', 'price' => '2.600.000đ'],
    ]
  ];

// Lấy giỏ hàng từ session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include '../header.php'; ?>
<div class="container mt-5">
    <h2 class="mb-4">🛒 Giỏ hàng của bạn</h2>

    <?php if (empty($cart)): ?>
        <div class="alert alert-info">Giỏ hàng đang trống.</div>
    <?php else: ?>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($cart as $id => $product): ?>
    <tr>
        <td><img src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>" style="width: 50px; height: 50px;"></td>
        <td><?= htmlspecialchars($product['name']) ?></td>
        <td>
            <form action="../cart/add_to_cart.php" method="POST">
                <input type="number" name="quantity" value="<?= $product['quantity'] ?>" min="1" class="form-control" style="width: 80px;">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button type="submit" class="btn btn-sm btn-warning mt-2">Cập nhật</button>
            </form>
        </td>
        <td><?= number_format($product['price'], 0, ',', '.') ?>đ</td>
        <td><?= number_format($product['price'] * $product['quantity'], 0, ',', '.') ?>đ</td>
        <td>
            <a href="remove_from_cart.php?id=<?= $id ?>" class="btn btn-sm btn-danger">Xóa</a>
        </td>
    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
        <h5 class="text-end">Tổng cộng: <strong><?= number_format($total, 0, ',', '.') ?>đ</strong></h5>
        <div class="text-end">
            <a href="checkout.php" class="btn btn-success">Thanh toán</a>
        </div>
    <?php endif; ?>

    <div class="mt-3">
        <a href="../home.php" class="btn btn-secondary">← Tiếp tục mua sắm</a>
    </div>
</div>
<?php include '../footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
