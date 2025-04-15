<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);
} else {
  header("Location: contact_form.php"); // Điều hướng nếu truy cập không hợp lệ
  exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Phản hồi của bạn đã được gửi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
    }

    .card {
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .thankyou-icon {
      font-size: 4rem;
      color: #17a2b8;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card p-4 text-center">
          <div class="thankyou-icon mb-3">
            <i class="fas fa-envelope-open-text"></i>
          </div>
          <h2 class="text-primary mb-3">Cảm ơn bạn, <?= $name ?>!</h2>
          <p class="mb-4">Chúng tôi đã nhận được góp ý của bạn:</p>
          <p class="mt-4">Chúng tôi sẽ phản hồi qua email: <strong><?= $email ?></strong></p>
          <a href="../home.php" class="btn btn-info mt-4">Quay lại trang chủ</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Font Awesome & Bootstrap JS -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
