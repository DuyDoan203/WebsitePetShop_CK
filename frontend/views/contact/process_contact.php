<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  // Có thể lưu vào CSDL hoặc gửi email ở đây
  echo "<h2>Cảm ơn $name đã góp ý!</h2>";
  echo "<p>Chúng tôi sẽ phản hồi qua email: $email</p>";
  echo "<a href='header.php'>Quay lại trang chủ</a>";
}
?>
