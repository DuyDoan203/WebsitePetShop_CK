<?php
require_once(__DIR__ . '/../../../apps/config/db.php');
$database = new Database();
$conn = $database->getConnection();

if (!isset($_GET['id'])) {
    echo "<script>alert('Thiếu ID tài khoản'); location.href='accounts.php';</script>";
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$account = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$account) {
    echo "<script>alert('Không tìm thấy tài khoản'); location.href='accounts.php';</script>";
    exit;
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE users SET username = ?, role = ? WHERE id = ?");
    $stmt->execute([$username, $role, $id]);
    echo "<script>alert('Cập nhật thành công'); location.href='accounts.php';</script>";
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Sửa Tài Khoản</h2>
        <div class="card shadow mt-3">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Tên đăng nhập:</label>
                        <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($account['username']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Vai trò:</label>
                        <select name="role" class="form-select" required>
                            <option value="admin" <?= $account['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="user" <?= $account['role'] === 'user' ? 'selected' : '' ?>>User</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" name="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Cập nhật
                        </button>
                        <a href="accounts.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('../includes/footer.php'); ?>
