<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>
<?php 
    require_once("../../../apps/config/db.php");

    $database = new Database();
    $conn = $database->getConnection();
?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Quản lý sản phẩm</h2>
        <a href="add_products.php" class="btn btn-success mb-3">Thêm sản phẩm</a>
        <div class="card mb-4">
            <div class="card-body">
                <table id="productTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Loại</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Lấy dữ liệu từ bảng pets
                        $sql = "SELECT * FROM pets";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result as $row):
                        ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= number_format($row['price'], 0, ',', '.') ?> đ</td>
                            <td><?= $row['category_id'] ?></td>
                            <td><img src="../uploads/<?= $row['image'] ?>" width="60" /></td>
                            <td><?= $row['description'] ?></td> <!-- Mô tả sản phẩm -->
                            <td>
                                  <a href="edit_products.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="delete_products.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include('../includes/footer.php'); ?>
