<?php
// Mở bộ nhớ Session TRƯỚC TIÊN (không để khoảng trắng trước thẻ php)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'models/database.php';

$error_msg = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name']; 
        $_SESSION['success_msg'] = "Chào mừng " . $row['name'] . " quay trở lại!";
        
        header("Location: index.php");
        exit();
    } else {
        $error_msg = "Sai tên đăng nhập hoặc mật khẩu!";
    }
}

include 'includes/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0 rounded-3">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-dark">ĐĂNG NHẬP</h2>
                        <p class="text-muted">Mừng bạn quay trở lại Mechashop</p>
                    </div>

                    <?php if ($error_msg != ''): ?>
                        <div class="alert alert-danger p-2 text-center" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i> <?php echo $error_msg; ?>
                        </div>
                    <?php endif; ?>

                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary">Tên đăng nhập</label>
                            <input type="text" name="username" class="form-control form-control-lg bg-light" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-secondary">Mật khẩu</label>
                            <input type="password" name="password" class="form-control form-control-lg bg-light" required>
                        </div>
                        
                        <button type="submit" name="login" class="btn btn-dark btn-lg w-100 fw-bold hover-bright" style="color: #F97316;">
    ĐĂNG NHẬP
</button>
                    </form>
                    
                    <div class="text-center mt-4 pt-3 border-top">
                        <span class="text-muted small">Chưa có tài khoản?</span> 
                        <a href="register.php" class="text-danger text-decoration-none fw-bold small">Đăng ký ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>