<!-- services.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dịch vụ - PetShop</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<?php include("../header.php"); ?> 

<div class="container py-5">
  <h2 class="text-center mb-4">Dịch vụ chăm sóc thú cưng</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <img src="https://fagopet.vn/storage/cm/os/cmosmdd5g4ku39v4culgdyo70usz_co-nen-cho-cho-tam-sua-tam-cua-nguoi-1.webp" class="card-img-top" alt="Tắm cho thú cưng">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-shower me-2"></i>Tắm gội thú cưng</h5>
          <p class="card-text">Dịch vụ tắm sạch sẽ, thơm tho và an toàn với sữa tắm chuyên dụng.</p>
          <a href="../services/booking.php" class="btn btn-primary">Đặt lịch</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <img src="https://vuipet.com/wp-content/uploads/2023/05/4-800x800.jpg" class="card-img-top" alt="Khám sức khỏe">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-cut me-2"></i>Cắt tỉa lông</h5>
          <p class="card-text">Tạo kiểu lông đẹp mắt và mát mẻ cho thú cưng của bạn.</p>
          <a href="../services/booking.php" class="btn btn-primary">Đặt lịch</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <img src="https://quangbinhtoplist.com/wp-content/uploads/2023/12/phong-kham-thu-y-pet-care-quangbinhtoplist.jpg" class="card-img-top" alt="Cắt tỉa lông">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-stethoscope me-2"></i>Khám sức khoẻ</h5>
          <p class="card-text">Khám và tư vấn sức khỏe định kỳ với bác sĩ thú y giàu kinh nghiệm.</p>
          <a href="../services/booking.php" class="btn btn-primary">Đặt lịch</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include("../footer.php"); ?> <!-- nếu có footer -->

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
