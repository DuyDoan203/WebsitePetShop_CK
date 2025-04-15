<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<?php
require_once(__DIR__ . '/../../../apps/config/db.php');
$database = new Database();
$conn = $database->getConnection();

$services = [];

if ($conn) {
    try {
        $stmt = $conn->prepare("SELECT * FROM services");
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Lỗi truy vấn: " . $e->getMessage() . "</div>";
    }
}
?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Quản Lý Dịch Vụ</h2>
        <a href="add_services.php" class="btn btn-success mb-3">Thêm Dịch Vụ</a>

        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Dịch Vụ</th>
                            <th>Mô Tả</th>
                            <th>Giá (VNĐ)</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($services)): ?>
                            <?php foreach ($services as $service): ?>
                                <tr>
                                    <td><?= htmlspecialchars($service['id']) ?></td>
                                    <td><?= htmlspecialchars($service['name']) ?></td>
                                    <td><?= htmlspecialchars($service['description']) ?></td>
                                    <td><?= number_format($service['price'], 0, ',', '.') ?> đ</td>
                                    <td>
                                        <a href="edit_services.php?id=<?= $service['id'] ?>" class="btn btn-info btn-sm">Sửa</a>
                                        <a href="delete_services.php?id=<?= $service['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa dịch vụ này?')">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center">Không có dịch vụ nào.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include('../includes/footer.php'); ?>
