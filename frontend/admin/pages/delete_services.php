<?php
require_once(__DIR__ . '/../../../apps/config/db.php');
$database = new Database();
$conn = $database->getConnection();

if (isset($_GET['id'])) {  // Sử dụng 'id' thay cho 'IdService' và 'IdTime' nếu bảng của bạn chỉ có 'id' duy nhất cho mỗi dịch vụ
    $id = $_GET['id'];  // Lấy ID dịch vụ từ URL

    try {
        // Xóa dịch vụ với ID từ URL
        $stmt = $conn->prepare("DELETE FROM services WHERE id = ?");
        $stmt->execute([$id]);

        echo "<script>alert('Xóa dịch vụ thành công'); location.href='services.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Lỗi khi xóa dịch vụ: " . $e->getMessage() . "'); location.href='services.php';</script>";
    }
} else {
    echo "<script>alert('Không có ID dịch vụ để xóa'); location.href='services.php';</script>";
}
?>
