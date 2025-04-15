
<?php
require_once("../../../apps/config/db.php");

$database = new Database();
$conn = $database->getConnection();
$type = $_GET['type'] ?? 'all';

$category_mapping = [
    'food' => 6,     
    'accessory' => 7, 
    'pet' => 8,         
    'all' => null 
];

// Lấy category_id từ mảng ánh xạ
$category_id = $category_mapping[$type] ?? null;

// Lấy dữ liệu sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM pets";
if ($category_id !== null) {
    $sql .= " WHERE category_id = :category_id";
}
$stmt = $conn->prepare($sql);

// Nếu có category_id, truyền vào truy vấn
if ($category_id !== null) {
    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
}

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$products = [];
foreach ($result as $row) {
    $category = $row['category_id'];
    $products[$category][] = $row;
}

// Lọc sản phẩm theo loại (type)
$list = ($type === 'all') ? array_merge(...array_values($products)) : ($products[$category_id] ?? []);
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
  <?php if (count($list) > 0): ?>
    <?php foreach ($list as $item): ?>
      <div class="col-md-4">
        <div class="card shadow-sm h-100">
          <img src="../../admin/uploads/<?= htmlspecialchars($item['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($item['name']) ?>">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
            <p class="product-price"><?= number_format($item['price'], 0, ',', '.') ?> đ</p>
            <div class="d-flex justify-content-between mt-auto">
              <a href="../product/product_detail.php?id=<?= $item['id'] ?>" class="btn btn-outline-primary">
                <i class="fas fa-eye me-1"></i> Xem chi tiết
              </a>
              <form action="../cart/cart.php" method="POST">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="id" value="<?= $item['id'] ?>"> <!-- Chỉ cần id -->
                <button type="submit" class="btn btn-primary mt-3">
                  <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                </button>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="text-center">Không có sản phẩm nào thuộc loại này.</p>
  <?php endif; ?>
  </div>
</div>

<?php include("../footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
