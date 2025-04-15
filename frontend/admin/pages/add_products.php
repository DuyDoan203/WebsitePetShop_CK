<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<?php 
    require_once(__DIR__ . '/../../../apps/config/db.php'); // Đường dẫn chuẩn xác

    $database = new Database();
    $conn = $database->getConnection();
?>

<main>  
    <div class="container-fluid px-4">
        <h2 class="mt-4">Thêm sản phẩm</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Giá</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="category_id">Loại sản phẩm</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <?php
                    // Lấy danh sách các loại sản phẩm từ cơ sở dữ liệu
                    $category_query = $conn->prepare("SELECT id, name FROM categories");
                    $category_query->execute();
                    $categories = $category_query->fetchAll();

                    // Hiển thị các loại sản phẩm
                    foreach ($categories as $category) {
                        echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Mô tả</label>
                <!-- Thêm trường mô tả vào form -->
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label>Ảnh</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];

            // Kiểm tra nếu category_id hợp lệ trong bảng categories
            $category_check = $conn->prepare("SELECT id FROM categories WHERE id = ?");
            $category_check->execute([$category_id]);
            $category_exists = $category_check->fetch();

            if ($category_exists) {
                // Xử lý ảnh
                if ($_FILES['image']['error'] == 0) {
                    $image_name = time() . '_' . basename($_FILES['image']['name']);
                    $upload_dir = __DIR__ . '/../uploads';

                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }

                    $target_file = $upload_dir . '/' . $image_name;

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                        $stmt = $conn->prepare("INSERT INTO pets (name, price, description, category_id, image) VALUES (?, ?, ?, ?, ?)");
                        $stmt->execute([$name, $price, $description, $category_id, $image_name]);

                        echo "<script>alert('Thêm sản phẩm thành công'); location.href='../pages/products.php';</script>";
                    } else {
                        echo "<div class='alert alert-danger'>Upload ảnh thất bại.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Vui lòng chọn ảnh hợp lệ.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Loại sản phẩm không tồn tại trong cơ sở dữ liệu.</div>";
            }
        }
        ?>
    </div>
</main>

<?php include('../includes/footer.php'); ?>
