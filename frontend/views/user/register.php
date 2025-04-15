<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng Ký Tài Khoản</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

	<style>
		body {
			background: #fff;
			font-family: 'Poppins', sans-serif;
		}
		.card {
			border: none;
			border-radius: 1rem;
			box-shadow: 0 10px 30px rgba(0,0,0,0.05);
		}
		.bg-register-image {
			background: url('https://khoinguonsangtao.vn/wp-content/uploads/2022/08/hinh-nen-cho-cute-de-thuong-nhat.jpg') center center/cover no-repeat;
			border-top-left-radius: 1rem;
			border-bottom-left-radius: 1rem;
		}
		.form-control {
			border-radius: 0.5rem;
		}
		.btn-primary {
			border-radius: 0.5rem;
			transition: all 0.3s ease;
		}
		.btn-primary:hover {
			background-color: #4e54c8;
			transform: translateY(-1px);
		}
		a.small {
			color: #6c757d;
			text-decoration: none;
		}
		a.small:hover {
			color: #343a40;
			text-decoration: underline;
		}
	</style>
</head>

<body>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="row g-0">
						<div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center mb-4">
									<h2 class="h4 text-gray-900">Tạo Tài Khoản Mới</h2>
								</div>
								<form action="xuly_dangky.php" method="post">
									<div class="row mb-3">
										<div class="col-sm-6 mb-2">
											<input type="text" name="name" class="form-control" placeholder="Họ tên" required>
										</div>
										<div class="col-sm-6">
											<input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-6 mb-2">
											<input type="email" name="email" class="form-control" placeholder="Email" required>
										</div>
										<div class="col-sm-6">
											<input type="text" name="address" class="form-control" placeholder="Địa chỉ" required>
										</div>
									</div>
									<div class="row mb-4">
										<div class="col-sm-6 mb-2">
											<input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
										</div>
										<div class="col-sm-6">
											<input type="password" name="confirm_password" class="form-control" placeholder="Xác nhận mật khẩu" required>
										</div>
									</div>
									<button type="submit" class="btn btn-primary w-100">Đăng Ký</button>
									<hr>
									<a href="#" class="btn btn-danger w-100 mb-2"><i class="fab fa-google me-2"></i>Đăng ký bằng Google</a>
									<a href="#" class="btn btn-primary w-100"><i class="fab fa-facebook-f me-2"></i>Đăng ký bằng Facebook</a>
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="#">Quên mật khẩu?</a>
								</div>
								<div class="text-center">
									<a class="small" href="login.php">Đã có tài khoản? Đăng nhập!</a>
								</div>
							</div> <!-- p-5 -->
						</div> <!-- col-lg-6 -->
					</div> <!-- row -->
				</div> <!-- card -->
			</div>
		</div>
	</div>

	<!-- Bootstrap Bundle JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
