<?php include '../views/header.php'; ?>
<!-- Banner -->
<section class="hero bg-light text-center py-5">
  <div class="container">
    <h1 class="display-4">Chào mừng đến với PetShop!</h1>
    <p class="lead">Nơi chăm sóc và mua sắm cho thú cưng của bạn</p>
    <a href="#products" class="btn btn-primary mt-3">Khám phá ngay</a>
  </div>
</section>

<!-- Danh mục sản phẩm -->
<section id="products" class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Sản phẩm nổi bật</h2>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="https://down-vn.img.susercontent.com/file/sg-11134201-22100-lgc7p40m37iv58" class="card-img-top" alt="Thức ăn">
          <div class="card-body text-center">
          <h5 class="card-title"><i class="fas fa-bone text-warning me-2"></i> Thức ăn cho thú cưng</h5>
            <p class="card-text">Đảm bảo dinh dưỡng và sức khỏe cho bé yêu của bạn.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="https://cunsieupham.com/wp-content/uploads/2016/09/juniehousevongcochuongchochomeo.jpg" class="card-img-top" alt="Phụ kiện">
          <div class="card-body text-center">
          <h5 class="card-title"><i class="fas fa-gem text-pink me-2"></i> Phụ kiện đáng yêu</h5>
            <p class="card-text">Từ vòng cổ, đồ chơi đến quần áo siêu cute!</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="https://vuipet.com/wp-content/uploads/2023/06/pet-spa-vuipet-4-800x800.jpg" class="card-img-top" alt="Thú cưng">
          <div class="card-body text-center">
          <h5 class="card-title"><i class="fas fa-paw text-info me-2"></i> Thú cưng</h5>
            <p class="card-text">Chọn cho mình một người bạn bốn chân trung thành.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Dịch vụ -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-5">Dịch vụ chăm sóc thú cưng</h2>
    <div class="row g-4">
      <!-- Dịch vụ 1 -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <img src="https://fagopet.vn/storage/cm/os/cmosmdd5g4ku39v4culgdyo70usz_co-nen-cho-cho-tam-sua-tam-cua-nguoi-1.webp" class="card-img-top" alt="Tắm gội thú cưng">
          <div class="card-body text-center">
          <h5 class="card-title"><i class="fas fa-shower text-primary me-2"></i> Tắm gội</h5>
            <p class="card-text">Giữ cho thú cưng của bạn luôn sạch sẽ, thơm tho với dịch vụ tắm gội chuyên nghiệp.</p>
            <a href="../views/services/booking.php" class="btn btn-primary">Đặt lịch</a>
          </div>
        </div>
      </div>
      <!-- Dịch vụ 2 -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <img src="https://quangbinhtoplist.com/wp-content/uploads/2023/12/phong-kham-thu-y-pet-care-quangbinhtoplist.jpg" class="card-img-top" alt="Khám bệnh thú cưng">
          <div class="card-body text-center">
          <h5 class="card-title"><i class="fas fa-stethoscope text-success me-2"></i> Khám bệnh</h5>
            <p class="card-text">Dịch vụ thú y chuyên nghiệp, tận tình, phát hiện bệnh sớm cho thú cưng.</p>
            <a href="../views/services/booking.php" class="btn btn-primary">Đặt lịch</a>
          </div>
        </div>
      </div>
      <!-- Dịch vụ 3 -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <img src="https://vuipet.com/wp-content/uploads/2023/05/4-800x800.jpg" class="card-img-top" alt="Spa - Cắt tỉa lông thú cưng">
          <div class="card-body text-center">
          <h5 class="card-title"><i class="fas fa-cut text-danger me-2"></i> Spa - Cắt tỉa</h5>
            <p class="card-text">Làm đẹp, tạo kiểu cho bé cưng của bạn thêm xinh xắn và gọn gàng.</p>
            <a href="../views/services/booking.php" class="btn btn-primary">Đặt lịch</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<?php include '../views/footer.php'; ?>