<?php
$type = $_GET['type'] ?? 'all';

// Dữ liệu sản phẩm mẫu
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

$titles = [
  'food' => 'Thức ăn cho thú cưng',
  'accessory' => 'Phụ kiện thú cưng',
  'pet' => 'Thú cưng dễ thương',
  'all' => 'Tất cả sản phẩm'
];

$list = $type === 'all' ? array_merge(...array_values($products)) : ($products[$type] ?? []);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Sản phẩm | PetShop</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .card-title { font-size: 1.1rem; font-weight: 600; }
    .product-price { color: #dc3545; font-weight: bold; }
    .card-img-top { height: 220px; object-fit: cover; }
  </style>
</head>
<body>
<?php include("/xampp/htdocs/WebsitePetShop/frontend/views/header.php"); ?> 
<div class="container py-5">
  <h2 class="text-center mb-4"><?= $titles[$type] ?? 'Sản phẩm' ?></h2>
  <div class="row g-4">
  <?php foreach ($list as $index => $item): ?>
      <div class="col-md-4">
        <div class="card shadow-sm h-100">
          <img src="<?= $item['img'] ?>" class="card-img-top" alt="<?= $item['name'] ?>">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $item['name'] ?></h5>
            <p class="product-price"><?= $item['price'] ?></p>
            <div class="d-flex justify-content-between mt-auto">
              <a href="../product/product_detail.php $type ?>&id=<?= $index ?>" class="btn btn-outline-primary">
                <i class="fas fa-eye me-1"></i> Xem chi tiết
              </a>
              <form action="../cart/cart.php" method="POST">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="type" value="<?= $type ?>">
                <button type="submit" class="btn btn-primary mt-3">
                  <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                </button>
              </form>

            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php include("../footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
