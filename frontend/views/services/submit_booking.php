<?php
// Xử lý POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service = htmlspecialchars($_POST['service']);
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
} else {
    header("Location: booking_form.php"); // Điều hướng nếu truy cập không hợp lệ
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt Lịch Thành Công</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .success-icon {
            font-size: 4rem;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card p-4 text-center">
                    <div class="success-icon mb-3">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="mb-3 text-success">Đặt lịch thành công!</h3>
                    <p class="mb-4">Cảm ơn bạn đã đặt lịch. Thông tin đặt lịch như sau:</p>
                    <ul class="list-group list-group-flush text-start mb-4">
                        <li class="list-group-item"><strong>Dịch vụ:</strong> <?= $service ?></li>
                        <li class="list-group-item"><strong>Khách hàng:</strong> <?= $name ?></li>
                        <li class="list-group-item"><strong>Số điện thoại:</strong> <?= $phone ?></li>
                        <li class="list-group-item"><strong>Ngày thực hiện:</strong> <?= $date ?></li>
                    </ul>
                    <a href="../services/services.php" class="btn btn-primary">Đặt lịch mới</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome & Bootstrap JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
