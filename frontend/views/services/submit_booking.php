<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $service = $_POST['service'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];

        // Xử lý lưu vào database hoặc gửi email, v.v...
        echo "<h3>Đặt lịch thành công!</h3>";
        echo "Dịch vụ: $service <br>";
        echo "Khách hàng: $name <br>";
        echo "Số điện thoại: $phone <br>";
        echo "Ngày: $date";
    } else {
        echo "Truy cập không hợp lệ.";
    }
?>
