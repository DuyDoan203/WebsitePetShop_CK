<?php include('../includes/sidebar.php'); ?>
<?php
require_once("../../../apps/config/db.php");

$database = new Database();
$conn = $database->getConnection();

// Truy vấn tất cả lịch đặt dịch vụ
$sql = "SELECT bs.id, u.username, s.name AS service_name, bs.booking_time, bs.note
        FROM booked_services bs
        JOIN services s ON bs.service_id = s.id
        JOIN users u ON bs.user_id = u.id";

$stmt = $conn->prepare($sql);
$stmt->execute();
$booked_services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Lịch Đặt Dịch Vụ | PetShop Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .custom-card {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        h2 {
            font-weight: bold;
            color: #343a40;
        }
    </style>
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="container py-5">
    <div class="custom-card">
        <h2 class="text-center mb-4">Quản Lý Lịch Đặt Dịch Vụ</h2>

        <?php if (!empty($booked_services)): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Người dùng</th>
                            <th>Dịch vụ</th>
                            <th>Ngày đặt</th>
                            <th>Ghi chú</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($booked_services as $service): ?>
                            <tr>
                                <td><?= htmlspecialchars($service['username']) ?></td>
                                <td><?= htmlspecialchars($service['service_name']) ?></td>
                                <td><?= date('d/m/Y', strtotime($service['booking_time'])) ?></td>
                                <td><?= htmlspecialchars($service['note']) ?: '<em>Không có ghi chú</em>' ?></td>
                                <td>
                                    <a href="delete_booking.php?id=<?= $service['id'] ?>" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa lịch đặt này?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center">Hiện tại chưa có lịch đặt dịch vụ nào.</div>
        <?php endif; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
