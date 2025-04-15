<?php
require_once(__DIR__ . '/../../../apps/config/db.php');
$database = new Database();
$conn = $database->getConnection();

// Lấy ID từ URL
if (!isset($_GET['id'])) {
    echo "<script>alert('Không có ID dịch vụ'); location.href='services.php';</script>";
    exit;
}

$id = $_GET['id'];
$service = null;

// Lấy dữ liệu dịch vụ hiện tại
if ($conn) {
    $stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
    $stmt->execute([$id]);
    $service = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$service) {
        echo "<script>alert('Dịch vụ không tồn tại'); location.href='services.php';</script>";
        exit;
    }
}

// Xử lý cập nhật
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE services SET name = ?, description = ?, price = ? WHERE id = ?");
    $stmt->execute([$name, $description, $price, $id]);

    echo "<script>alert('Cập nhật dịch vụ thành công'); location.href='services.php';</script>";
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4"><i class="fas fa-edit text-primary"></i> Sửa Dịch Vụ</h2>

        <!-- Card for editing service -->
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="fas fa-cogs me-2"></i>Thông Tin Dịch Vụ
            </div>
            <div class="card-body">
                <form method="POST">
                    <!-- Service Name -->
                    <div class="mb-3">
                        <label class="form-label">Tên Dịch Vụ:</label>
                        <input type="text" name="name" class="form-control" required value="<?= htmlspecialchars($service['name']) ?>" placeholder="Nhập tên dịch vụ">
                    </div>

                    <!-- Service Description -->
                    <div class="mb-3">
                        <label class="form-label">Mô Tả:</label>
                        <textarea name="description" class="form-control" rows="4" required placeholder="Nhập mô tả dịch vụ"><?= htmlspecialchars($service['description']) ?></textarea>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label class="form-label">Giá (VNĐ):</label>
                        <input type="number" name="price" class="form-control" required min="1" value="<?= $service['price'] ?>" placeholder="Nhập giá dịch vụ">
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" name="submit" class="btn btn-success">
                            <i class="fas fa-check-circle"></i> Cập Nhật
                        </button>
                        <a href="services.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Quay Lại
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('../includes/footer.php'); ?>
