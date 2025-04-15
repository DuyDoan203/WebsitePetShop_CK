<?php
// Kết nối tới cơ sở dữ liệu
require_once("../../../apps/config/db.php");

$database = new Database();
$conn = $database->getConnection();

// Truy vấn để lấy danh sách dịch vụ
$sql = "SELECT * FROM services"; // Chỉnh sửa tên bảng nếu cần
$stmt = $conn->prepare($sql);
$stmt->execute();

// Lấy tất cả dịch vụ từ cơ sở dữ liệu
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách dịch vụ | PetShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include '../header.php'; ?>

<div class="container py-5">
  <h2 class="text-center mb-4">Dịch vụ chăm sóc thú cưng</h2>
    <?php if (!empty($services)): ?>
        <div class="row">
            <?php foreach ($services as $service): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Kiểm tra nếu có hình ảnh, nếu không thì sử dụng hình ảnh mặc định -->
                        <div class="card-body">
                            <h5 class="card-title"><?= $service['name'] ?></h5>
                            <p class="card-text"><?= $service['description'] ?></p>
                            <p class="card-text text-danger"><?= number_format($service['price'], 0, ',', '.') ?>đ</p>
                            <a href="../services/booking.php" class="btn btn-primary">Đặt lịch</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Hiện tại không có dịch vụ nào.</p>
    <?php endif; ?>
</div>

<?php include("../footer.php"); ?> 

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
