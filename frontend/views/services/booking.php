<?php
    include("../header.php");
    $services = $_GET['service'] ?? '';
    $serviceName = '';

    switch ($services) {
        case 'tamgoi':
            $serviceName = 'Tắm gội thú cưng';
            break;
        case 'cattia':
            $serviceName = 'Cắt tỉa lông';
            break;
        case 'khambenh':
            $serviceName = 'Khám sức khoẻ';
            break;
        default:
            $serviceName = 'Dịch vụ';
    }
?>

<div class="container mt-5">
    <h2>Đặt lịch: <?= $serviceName ?></h2>
    <form action="submit_booking.php" method="POST">
        <input type="hidden" name="service" value="<?= $serviceName ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Họ và tên:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại:</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Ngày đặt:</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Xác nhận đặt lịch</button>
    </form>
</div>

<?php include("../footer.php"); ?>
