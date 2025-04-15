<!-- contact.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Góp ý với PetShop</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fefefe;
      margin: 0;
      padding: 0;
    }

    .contact-container {
      max-width: 1000px;
      margin: 50px auto;
      padding: 30px;
      background-color: #ffffff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      display: flex;
      gap: 40px;
      align-items: center;
    }

    .contact-image {
      flex: 1;
    }

    .contact-image img {
      width: 100%;
      border-radius: 10px;
    }

    .contact-form {
      flex: 1;
    }

    .contact-form h2 {
      color: #2c3e50;
      margin-bottom: 10px;
    }

    .contact-form p {
      color: #555;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .contact-form label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
      color: #333;
    }

    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    .contact-form button {
      padding: 10px 20px;
      background-color: #2ecc71;
      border: none;
      color: white;
      font-size: 15px;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .contact-form button:hover {
      background-color: #27ae60;
    }

    @media (max-width: 768px) {
      .contact-container {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

<?php include '../header.php'; ?>

<div class="contact-container">
  <div class="contact-image">
    <img src="https://st.depositphotos.com/1031343/2194/v/450/depositphotos_21949883-stock-illustration-pet-shop-stamp.jpg" alt="Liên hệ PetShop">
  </div>
  <div class="contact-form">
    <h2>Góp ý với PetShop</h2>
    <p>Nếu bạn có bất kỳ câu hỏi, thắc mắc hoặc góp ý, vui lòng liên hệ với chúng tôi thông qua biểu mẫu dưới đây:</p>

    <form action="../contact/process_contact.php" method="POST">
      <label for="name">Họ và tên:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Nội dung:</label>
      <textarea id="message" name="message" rows="5" required></textarea>

      <button type="submit">Gửi góp ý</button>
    </form>
  </div>
</div>

<?php include '../footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
