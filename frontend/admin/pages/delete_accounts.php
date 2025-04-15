<?php
require_once(__DIR__ . '/../../../apps/config/db.php');
$database = new Database();
$conn = $database->getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM accounts WHERE id = ?");
    $stmt->execute([$id]);
}

echo "<script>alert('Xóa tài khoản thành công'); location.href='accounts.php';</script>";
?>
