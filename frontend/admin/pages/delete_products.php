<?php
    require_once(__DIR__ . '/../../../apps/config/db.php');

    // Kết nối CSDL
    $database = new Database();
    $conn = $database->getConnection();

    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];

        // Lấy thông tin sản phẩm cần xóa
        $stmt = $conn->prepare("SELECT * FROM pets WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            // Xóa ảnh liên quan đến sản phẩm nếu có
            $image_path = __DIR__ . '/../uploads/' . $product['image'];
            if (file_exists($image_path)) {
                unlink($image_path); // Xóa ảnh khỏi thư mục
            }

            // Xóa sản phẩm trong cơ sở dữ liệu
            $delete_stmt = $conn->prepare("DELETE FROM pets WHERE id = ?");
            $delete_stmt->execute([$product_id]);

            echo "<script>alert('Sản phẩm đã được xóa'); location.href='products.php';</script>";
        } else {
            echo "<script>alert('Sản phẩm không tồn tại'); location.href='products.php';</script>";
        }
    }
?>
