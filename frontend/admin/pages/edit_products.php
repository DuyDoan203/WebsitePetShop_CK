<?php 
    include('../includes/header.php'); 
    include('../includes/sidebar.php'); 
    require_once(__DIR__ . '/../../../apps/config/db.php');

    // Kết nối CSDL
    $database = new Database();
    $conn = $database->getConnection();

    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];

        // Lấy thông tin sản phẩm cần sửa
        $stmt = $conn->prepare("SELECT * FROM pets WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            echo "<script>alert('Sản phẩm không tồn tại'); location.href='products.php';</script>";
            exit;
        }
    }

    // Xử lý form khi người dùng submit
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];

        // Xử lý ảnh mới (nếu có)
        if ($_FILES['image']['error'] == 0) {
            $image_name = time() . '_' . basename($_FILES['image']['name']);
            $upload_dir = __DIR__ . '/../uploads';

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true); // Tạo thư mục nếu chưa tồn tại
            }

            $target_file = $upload_dir . '/' . $image_name;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                echo "<div class='alert alert-danger'>Upload ảnh thất bại.</div>";
            }
        } else {
            $image_name = $product['image']; // Giữ nguyên ảnh cũ nếu không chọn ảnh mới
        }

        // Cập nhật thông tin sản phẩm
        $stmt = $conn->prepare("UPDATE pets SET name = ?, price = ?, description = ?, category_id = ?, image = ? WHERE id = ?");
        $stmt->execute([$name, $price, $description, $category_id, $image_name, $product_id]);

        echo "<script>alert('Sửa sản phẩm thành công'); location.href='products.php';</script>";
    }
?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Sửa sản phẩm</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Giá</label>
                <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="category_id">Loại sản phẩm</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="1" <?= $product['category_id'] == 1 ? 'selected' : '' ?>>Chó</option>
                    <option value="2" <?= $product['category_id'] == 2 ? 'selected' : '' ?>>Mèo</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Ảnh</label>
                <input type="file" name="image" class="form-control">
                <img src="../uploads/<?= $product['image'] ?>" width="100" alt="Product Image">
            </div>
            <div class="mb-3">
                <label>Mô tả</label>
                <textarea name="description" class="form-control"><?= $product['description'] ?></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</main>

<?php include('../includes/footer.php'); ?>
