<?php
require_once(__DIR__ . '/../../../apps/config/db.php');
$database = new Database();
$conn = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;

    if (!empty($name) && !empty($description) && $price > 0) {
        try {
            $stmt = $conn->prepare("INSERT INTO services (name, description, price) VALUES (?, ?, ?)");
            $stmt->execute([$name, $description, $price]);
            echo "<script>alert('Thêm dịch vụ thành công'); location.href='services.php';</script>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Lỗi CSDL: " . $e->getMessage() . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Vui lòng nhập đầy đủ thông tin hợp lệ.</div>";
    }
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Thêm Dịch Vụ</h2>
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Tên Dịch Vụ:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô Tả:</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Giá (VNĐ):</label>
                        <input type="number" name="price" class="form-control" required min="1">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
                    <a href="services.php" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('../includes/footer.php'); ?>
