<?php
require_once(__DIR__ . '/../../../apps/config/db.php');
$database = new Database();
$conn = $database->getConnection();

// Xử lý xóa tài khoản
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$deleteId]);
    echo "<script>alert('Xóa tài khoản thành công'); location.href='accounts.php';</script>";
}

// Lấy danh sách tài khoản
$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Quản Lý Tài Khoản</h2>
        <div class="card mt-3 shadow">
            <div class="card-body">
                <a href="add_accounts.php" class="btn btn-success mb-3">
                    <i class="fas fa-user-plus"></i> Thêm Tài Khoản
                </a>
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Quyền</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($accounts as $acc): ?>
                            <tr>
                                <td><?= $acc['id'] ?></td>
                                <td><?= htmlspecialchars($acc['username']) ?></td>
                                <td><?= htmlspecialchars($acc['email']) ?></td>
                                <td><?= $acc['role'] ?></td>
                                <td>
                                    <a href="edit_accounts.php?id=<?= $acc['id'] ?>" class="btn btn-info btn-sm">Sửa</a>
                                    <a href="accounts.php?delete_id=<?= $acc['id'] ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Bạn chắc chắn muốn xóa tài khoản này?')">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($accounts)): ?>
                            <tr><td colspan="5" class="text-center">Không có tài khoản nào</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include('../includes/footer.php'); ?>
