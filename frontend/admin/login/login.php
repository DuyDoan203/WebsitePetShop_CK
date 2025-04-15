<?php
session_start();
require_once(__DIR__ . '/../../../apps/config/db.php');

$error = '';
$username = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $db = new Database();
    $conn = $db->getConnection();

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Kiểm tra quyền admin
        if ($user['role'] === 'admin') {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = 'admin';
            header("Location: /WebsitePetShop/frontend/admin/pages/admin.php");
            exit();
        } else {
            $error = "Bạn không có quyền truy cập trang admin.";
        }
    } else {
        $error = "Sai tài khoản hoặc mật khẩu!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: white;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 0 1rem rgba(0, 0, 0, 0.15);
        }

        .card img {
            object-fit: cover;
            height: 100%;
            border-top-left-radius: 1rem;
            border-bottom-left-radius: 1rem;
        }

        .form-control-user {
            border-radius: 10rem;
            padding: 1rem;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="row justify-content-center w-100">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-lg border-0">
                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="https://i.pinimg.com/564x/4f/bd/6d/4fbd6d7c0519dd3394926e83b2aab3cc.jpg"
                                 alt="Login Image" class="img-fluid w-100 h-100">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center mb-4">
                                    <h1 class="h4 text-gray-900 fw-bold">Welcome Back!</h1>
                                </div>
                                <?php if (!empty($error)): ?>
                                    <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <form method="post">
                                    <div class="form-group mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" name="username" class="form-control form-control-user"
                                                   placeholder="Enter Username..." value="<?php echo htmlspecialchars($username ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control form-control-user"
                                                   placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck">
                                            <label class="form-check-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user w-100 mb-3" type="submit">Đăng nhập</button>
                                    <hr>
                                    <a href="home.php" class="btn btn-danger btn-user w-100 mb-2">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-primary btn-user w-100">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small text-muted" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small text-muted" href="register.php">Create an Account!</a>
                                </div>
                            </div>
                        </div> <!-- End form col -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
