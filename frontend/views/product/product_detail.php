<?php
// Lấy ID sản phẩm từ URL (ở đây ta giả định id là số thứ tự trong mảng)
$id = $_GET['id'] ?? 0;
$type = $_GET['type'] ?? 'food';

// Dữ liệu sản phẩm mẫu
$products = [
  'food' => [
    ['name' => 'Thức ăn cho chó Pug', 'img' => 'https://fagopet.vn/uploads/images/62722b779487f640d9f4da91/thuc-an-cho-cho-royal-canin-pug-adult-1500g.webp', 'price' => '120.000đ', 'desc' => 'Hạt khô Royal Canin Pug - dinh dưỡng cho giống chó Pug.'],
    ['name' => 'Xương gặm cho cún', 'img' => 'https://petcorner.vn/wp-content/uploads/2023/04/xuong-orgo.png', 'price' => '60.000đ', 'desc' => 'Bổ sung canxi, giảm mảng bám răng, cho chó con.'],
    ['name' => 'Hạt Royal Canin cho mèo', 'img' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/383/944/products/1-a94831a4-5b0e-495c-b6f1-eaa81c077b75.png?v=1587887293380', 'price' => '115.000đ', 'desc' => 'Dành cho mèo có bộ lông dài và da nhạy cảm.'],
    ['name' => 'Thức ăn mềm cho cún', 'img' => 'https://down-vn.img.susercontent.com/file/7248467fa364c714553a24638d915e65', 'price' => '80.000đ', 'desc' => 'Thức ăn mềm hương vị thịt, dễ tiêu hóa.'],
    ['name' => 'Súp thưởng cho mèo', 'img' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lvzm0wifgwyj75', 'price' => '45.000đ', 'desc' => 'Súp thưởng bổ sung nước, thơm ngon hấp dẫn.'],
    ['name' => 'Thức ăn mèo Whiskas', 'img' => 'https://vinpet.com.vn/wp-content/uploads/2020/11/Thuc-an-cho-meo-whiskas-adult.jpg', 'price' => '95.000đ', 'desc' => 'Dành cho mèo trưởng thành - cân bằng dinh dưỡng.']
  ],
  'accessory' => [
    ['name' => 'Vòng cổ hình xương', 'img' => 'https://down-vn.img.susercontent.com/file/d238ae5c359008dc464ff23e8f855ebc', 'price' => '50.000đ', 'desc' => 'Vòng cổ nhiều màu sắc, có chuông, dễ điều chỉnh.'],
    ['name' => 'Bát ăn inox 2 ngăn', 'img' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lsdzf91tnm3dc9', 'price' => '70.000đ', 'desc' => 'Thiết kế chống trượt, chất liệu inox cao cấp.'],
    ['name' => 'Đồ chơi gặm nhấm', 'img' => 'https://product.hstatic.net/200000521195/product/11f3f4f3-a2e9-4c52-afc7-9a723a4506c3_5d96619ecff7472eb81f6e58333e4d4e.jpeg', 'price' => '40.000đ', 'desc' => 'Bộ đồ chơi giúp giảm căng thẳng và vệ sinh răng.'],
    ['name' => 'Lược chải lông chó mèo', 'img' => 'https://cdn-img-v2.mybota.vn/uploadv2/web/12/12107/product/2022/10/31/06/26/1667185342_2b9a3150978a4cbbf81897de8b532a6f.jpg', 'price' => '35.000đ', 'desc' => 'Thiết kế dễ cầm nắm, an toàn cho da thú cưng.'],
    ['name' => 'Quần áo cho mèo', 'img' => 'https://cbu01.alicdn.com/img/ibank/O1CN012FGyT91UaADaqE7Ko_!!3642712533-0-cib.jpg', 'price' => '95.000đ', 'desc' => 'Chất liệu cotton thoáng mát, dễ thương.'],
    ['name' => 'Dây dắt có chuông', 'img' => 'https://down-vn.img.susercontent.com/file/570a54d790c57a18aba371c4fa968e45', 'price' => '65.000đ', 'desc' => 'Dây dắt nhiều màu, có chuông báo vị trí thú cưng.']
  ],
  'pet' => [
    ['name' => 'Chó Poodle thuần chủng', 'img' => 'https://opet.com.vn/wp-content/uploads/2022/09/poodle-thuan-chung-opetshop-12.jpg', 'price' => '3.500.000đ', 'desc' => 'Giống chó thông minh, lông xoăn dễ thương.'],
    ['name' => 'Mèo Ba Tư trắng', 'img' => 'https://fagopet.vn/storage/rw/uw/rwuwaadsb3vf6l8q7tr5lq2wc8vu_meo-ba-tu-trang-2.webp', 'price' => '2.800.000đ', 'desc' => 'Mèo hiền lành, lông dài trắng muốt.'],
    ['name' => 'Chó Corgi tai cụp', 'img' => 'https://pethouse.com.vn/wp-content/uploads/2023/01/41fea5e9220b48c028de5e860ab8b43a-800x800.jpg', 'price' => '4.200.000đ', 'desc' => 'Chó lùn xứ Wales, thân thiện, đáng yêu.'],
    ['name' => 'Mèo Scottish tai cụp', 'img' => 'https://fagopet.vn/storage/w8/36/w836jnuradbdm1h4inmy1q4u8e86_ban-meo-scottish-tai-cup-4.webp', 'price' => '3.000.000đ', 'desc' => 'Tai cụp đặc trưng, thân thiện với trẻ em.'],
    ['name' => 'Chó Golden Retriever', 'img' => 'https://fagopet.vn/storage/a2/s5/a2s54b5z07cd8rycuk0q2lhvh0ym_cho-golden-trang-1.webp', 'price' => '3.900.000đ', 'desc' => 'Chó săn lông vàng, trung thành, thân thiện.'],
    ['name' => 'Mèo Anh lông ngắn', 'img' => 'https://fagopet.vn/storage/q1/6l/q16l3ri7zlqrdw7aa573amok2se0_ban-meo-anh-long-ngan_(3).webp', 'price' => '2.600.000đ', 'desc' => 'Lông dày, mắt to, dễ chăm sóc.']
  ]
];


$product = $products[$type][$id] ?? null;

if (!$product) {
  echo "<h2>Sản phẩm không tồn tại.</h2>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title><?= $product['name'] ?> | PetShop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .product-image { max-height: 400px; object-fit: cover; }
  </style>
</head>
<body>
<?php include("../header.php"); ?> 
<div class="container py-5">
  <div class="row">
    <div class="col-md-5">
      <img src="<?= $product['img'] ?>" class="img-fluid rounded product-image" alt="<?= $product['name'] ?>">
    </div>
    <div class="col-md-7">
      <h2><?= $product['name'] ?></h2>
      <h4 class="text-danger"><?= $product['price'] ?></h4>
      <p class="mt-4"><?= $product['desc'] ?></p>
      <a href="../product/products.php $type ?>" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Quay lại</a>
      <button class="btn btn-primary mt-3"><i class="fas fa-cart-plus"></i> Thêm vào giỏ</button>
    </div>
  </div>
</div>
<?php include("../footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
