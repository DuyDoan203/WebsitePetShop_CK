<?php
require_once("../../../apps/config/db.php");

$database = new Database();
$conn = $database->getConnection();

// Lấy ID sản phẩm từ URL
$id = $_GET['id'] ?? 0;

// Kiểm tra ID hợp lệ
if ($id == 0) {
    echo "Sản phẩm không tồn tại.";
    exit;
}

// Truy vấn lấy thông tin sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM pets WHERE id = :id LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// Kiểm tra nếu không có sản phẩm
if (!$product) {
    echo "<h2>Sản phẩm không tồn tại.</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($product['name']) ?> | PetShop</title>
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
      <!-- Hiển thị hình ảnh sản phẩm -->
      <img src="../../admin/uploads/<?= htmlspecialchars($product['image']) ?>" class="img-fluid rounded product-image" alt="<?= htmlspecialchars($product['name']) ?>">
    </div>
    <div class="col-md-7">
      <!-- Hiển thị tên, giá và mô tả sản phẩm -->
      <h2><?= htmlspecialchars($product['name']) ?></h2>
      <h4 class="text-danger"><?= number_format($product['price'], 0, ',', '.') ?> đ</h4>
      <p class="mt-4"><?= htmlspecialchars($product['description']) ?></p>

      <!-- Nút quay lại và thêm vào giỏ hàng -->
      <a href="../product/products.php" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Quay lại</a>
      <form action="../cart/cart.php" method="POST" class="mt-3">
        <input type="hidden" name="action" value="add">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-cart-plus"></i> Thêm vào giỏ
        </button>
      </form>
    </div>
  </div>
</div>
<?php include("../footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
