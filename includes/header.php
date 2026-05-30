<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Mechashop - Đồ án Web bán mô hình Gundam" />
        <meta name="author" content="Nguyễn Thế Vinh" />
        <title>Mechashop - Thế giới mô hình Gundam</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div id="page-loader">
            <div class="loader-spinner"></div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand d-flex align-items-center fw-bold text-uppercase reload-page" href="index.php" style="letter-spacing: 1px;">
                    <svg width="38" height="38" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg" class="me-2">
                        <rect width="44" height="44" rx="8" fill="#F97316"/>
                        <path d="M10 30 L10 18 Q10 10 22 10 Q34 10 34 18 L34 30 Z" fill="#1a1a1a"/>
                        <rect x="10" y="27" width="24" height="5" rx="2" fill="#F97316"/>
                        <rect x="14" y="17" width="6" height="4" rx="1" fill="#F97316"/>
                        <rect x="24" y="17" width="6" height="4" rx="1" fill="#F97316"/>
                        <rect x="18" y="24" width="8" height="2" rx="1" fill="#F97316"/>
                    </svg>
                    <span class="text-dark">MECHA</span><span style="color:#F97316">SHOP</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active reload-page" aria-current="page" href="index.php">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">Giới thiệu</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh mục</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php">Tất cả sản phẩm</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <?php
                                $sql_menu = "SELECT * FROM categories";
                                $result_menu = $conn->query($sql_menu);
                                
                                if ($result_menu && $result_menu->num_rows > 0) {
                                    while($row = $result_menu->fetch_assoc()) {
                                        echo "<li><a class='dropdown-item' href='category.php?id=".$row['id']."'>".$row['name']."</a></li>";
                                    }
                                } else {
                                    echo "<li><a class='dropdown-item' href='#'>Chưa có danh mục</a></li>";
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                    
                    <form action="search.php" method="GET" class="d-flex me-3">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Tìm mô hình (VD: Exia)..." aria-label="Search" required>
                            <button class="btn btn-outline-danger" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>

                    <div class="d-flex align-items-center">
                        <?php
                        // Tính tổng số lượng sản phẩm trong giỏ hàng
                        $total_items = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $id => $quantity) {
                                $total_items += $quantity;
                            }
                        }
                        ?>
                        
                        <div class="me-3">
                            <a href="view_cart.php" class="btn btn-outline-dark">
                                <i class="bi bi-cart-fill me-1"></i>
                                Giỏ hàng
                                <span class="badge bg-danger text-white ms-1 rounded-pill">
                                    <?php echo $total_items; ?>
                                </span>
                            </a>
                        </div>

                        <div>
                            <?php if (isset($_SESSION['user_name'])): ?>
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle fw-bold" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle text-warning me-1"></i> 
                                        Chào, <?php echo $_SESSION['user_name']; ?>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="userMenu">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-text me-2"></i>Đơn hàng của tôi</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger fw-bold" href="controller/logout.php"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <a href="login.php" class="btn btn-dark fw-bold">Đăng nhập</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <?php if (isset($_SESSION['success_msg'])): ?>
            <div class="alert bg-dark text-white border-start border-4 alert-dismissible fade show position-fixed top-0 end-0 m-3 shadow-lg" style="z-index: 9999; padding-right: 3rem; border-color: #ff9800 !important;" role="alert">
                <i class="bi bi-check-circle-fill me-2" style="color: #e47214;"></i> 
                <strong style="color: rgb(219, 99, 25);">Thành công!</strong> <span class="fw-light"><?php echo $_SESSION['success_msg']; ?></span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            <script>
                setTimeout(function() {
                    var alertNode = document.querySelector('.alert');
                    if (alertNode) {
                        var alert = new bootstrap.Alert(alertNode);
                        alert.close();
                    }
                }, 3000);
            </script>
            
            <?php unset($_SESSION['success_msg']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error_msg'])): ?>
            <div class="alert bg-dark text-white border-start border-danger border-4 alert-dismissible fade show position-fixed top-0 end-0 m-3 shadow-lg" style="z-index: 9999; padding-right: 3rem;" role="alert">
                <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i> 
                <strong class="text-danger">Lưu ý!</strong> <span class="fw-light"><?php echo $_SESSION['error_msg']; ?></span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            <script>
                setTimeout(function() {
                    // Tắt đúng cái thông báo viền đỏ
                    var alertNode = document.querySelector('.alert.border-danger');
                    if (alertNode) {
                        var alert = new bootstrap.Alert(alertNode);
                        alert.close();
                    }
                }, 3000);
            </script>
            
            <?php unset($_SESSION['error_msg']); ?>
        <?php endif; ?>