<?php
require_once(__DIR__ . '/../../../apps/config/db.php');
$database = new Database();
$conn = $database->getConnection();

// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = trim($_POST['email']);
    $role = $_POST['role'];

    if (!empty($username) && !empty($email) && !empty($_POST['password'])) {
        try {
            $stmt = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $password, $email, $role]);

            echo "<script>alert('Thêm tài khoản thành công!'); location.href='accounts.php';</script>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Lỗi: " . $e->getMessage() . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Vui lòng điền đầy đủ thông tin!</div>";
    }
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Thêm Tài Khoản</h2>
        <div class="card shadow mt-3">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Tên đăng nhập:</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mật khẩu:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Vai trò:</label>
                        <select name="role" class="form-select" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> Thêm Tài Khoản
                    </button>
                    <a href="accounts.php" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('../includes/footer.php'); ?>
