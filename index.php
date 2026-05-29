<?php include 'models/database.php'; ?>
<?php include 'includes/header.php'; ?>
        
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Trải nghiệm đam mê lắp ráp</h1>
            <p class="lead fw-normal text-white-50 mb-0">Cung cấp các dòng mô hình Gunpla chính hãng Bandai</p>
        </div>
    </div>
</header>
<section class="pt-5 pb-3">  
    <div class="container px-4 px-lg-5">
        <div class="preorder-box">
            <h4 class="text-center text-cyan fw-bold mb-4 text-uppercase text-decoration-none">
                🚀 PRE-ORDER / Đặt trước sắp về 🚀
            </h4>

            <div class="scrolling-wrapper">
    <?php
    // Lệnh SQL: Tìm các sản phẩm đặt trước (status = 2) trong database 
    $sql_pre = "SELECT * FROM products WHERE status = 2 ORDER BY id DESC";
    $result_pre = $conn->query($sql_pre);

    if ($result_pre && $result_pre->num_rows > 0) {
        while($row_pre = $result_pre->fetch_assoc()) {
    ?>
        <div class="card h-100 shadow-sm scrolling-card">
            <div class="badge position-absolute" style="top: 0.5rem; left: 0.5rem; background-color: #ff9800;">ĐẶT TRƯỚC</div>
            <a href="product.php?id=<?php echo $row_pre['id']; ?>">
                <img class="card-img-top" src="assets/images/<?php echo $row_pre['image']; ?>" alt="<?php echo $row_pre['name']; ?>" />
            </a>
            <div class="card-body p-3 text-center d-flex flex-column">
                <p class="text-muted small mb-1">BANDAI</p>
                <h6 class="fw-bolder mb-3">
                    <a href="product.php?id=<?php echo $row_pre['id']; ?>" class="text-dark text-decoration-none">
                        <?php echo $row_pre['name']; ?>
                    </a>
                </h6>
                <div class="mt-auto">
                    <span class="text-danger fw-bold fs-5">
                        <?php echo number_format($row_pre['price'], 0, ',', '.'); ?> đ
                    </span>
                </div>
            </div>
        </div>
    <?php
        }
    } else {
        echo "<p class='text-center w-100 mt-3'>Hiện chưa có mẫu đặt trước nào.</p>";
    }
    ?>
</div>
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5">
        
        <div class="d-flex align-items-center mb-4 hover-bright" style="cursor: pointer;">
            <div class="bg-primary me-3" style="width: 6px; height: 35px;"></div>
            <h3 class="fw-bold text-uppercase text-dark m-0">SẢN PHẨM MỚI NHẤT</h3>
            <a href="#" class="ms-3 text-dark fs-3"><i class="bi bi-chevron-right"></i></a>
        </div>
        
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-lg-4 justify-content-center">

           <?php
            // Lấy tối đa 12 sản phẩm mới nhất
            $sql_new = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC LIMIT 12"; 
            $result_new = $conn->query($sql_new);

            if ($result_new && $result_new->num_rows > 0) {
                $count = 0; // Tạo một bộ đếm số lượng
                
                while($row_new = $result_new->fetch_assoc()) {
                    $count++; 
                    // Từ mô hình thứ 5 trở đi, tự động thêm class ẩn của Javascript vào
                    $hideClass = ($count > 4) ? "extra-product d-none" : "";
            ?>
                <div class="col mb-4 <?php echo $hideClass; ?>"> 
                    <div class="card h-100 shadow-sm">
                        <a href="product.php?id=<?php echo $row_new['id']; ?>">
                            <img class="card-img-top" src="assets/images/<?php echo $row_new['image']; ?>" alt="<?php echo $row_new['name']; ?>" style="aspect-ratio: 1/1; object-fit: cover;" />
                        </a>
                        
                        <div class="card-body p-3 text-center d-flex flex-column">
                            <h6 class="fw-bolder mb-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 40px;">
                                <a href="product.php?id=<?php echo $row_new['id']; ?>" class="text-dark text-decoration-none">
                                    <?php echo $row_new['name']; ?>
                                </a>
                            </h6>
                            <span class="text-danger fw-bold fs-6 mt-auto">
                                <?php echo number_format($row_new['price'], 0, ',', '.'); ?> VNĐ
                            </span>
                        </div>
                        
                        <div class="card-footer p-3 pt-0 border-top-0 bg-transparent text-center">
                            <a class="btn btn-outline-danger w-100 btn-sm" href="controller/cart.php?action=add&id=<?php echo $row_new['id']; ?>">
                                <i class="bi bi-cart-plus me-1"></i> Thêm vào giỏ
                            </a>
                        </div>
                    </div>
                </div>
            <?php
                }
            } else {
                echo "<div class='col-12'><p class='text-center py-5'>Chưa có mô hình mới nào.</p></div>";
            }
            ?>

        </div> 
        
        <div class="text-center w-100 mt-3 mb-2">
            <button id="btnExpandProducts" class="btn btn-outline-dark rounded-pill px-5 py-2 fw-bold" style="border-width: 2px;">
                XEM TẤT CẢ SẢN PHẨM <i class="bi bi-chevron-down ms-1"></i>
            </button>
            
            <button id="btnCollapseProducts" class="btn btn-outline-dark rounded-pill px-5 py-2 fw-bold d-none" style="border-width: 2px;">
                THU GỌN <i class="bi bi-chevron-up ms-1"></i>
            </button>
        </div>

    </div>
</section>
 
<section class="py-5">
    <div class="container px-4 px-lg-5">
        <div class="d-flex align-items-center mb-4 hover-bright" style="cursor: pointer;">
            <div class="bg-warning me-3" style="width: 6px; height: 35px;"></div>
            <h3 class="fw-bold text-uppercase text-dark m-0">
                <i class="bi bi-crown-fill text-warning me-2"></i>TOP BÁN CHẠY
            </h3>
        </div>
        
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-lg-4 justify-content-center">
            
            

        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5">
        
        <div class="flash-header flash-header-custom text-white p-3 rounded-3 shadow d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold m-0 text-uppercase d-flex align-items-center">
                <i class="bi bi-lightning-fill me-2 text-warning"></i>
                FLASH SALE - GIỜ VÀNG
            </h5>
            
            <div id="flash-timer" class="glow-timer bg-dark bg-opacity-75 text-white px-3 py-1 rounded fw-bold fs-5 d-flex align-items-center border border-white border-opacity-25">
                <i class="bi bi-clock me-2"></i> <span id="time-display">14:01:04</span>
            </div>
        </div>

        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-lg-4">
            </div>

    </div>
</section>
<script src="assets/js/scripts.js"></script>
<?php include 'includes/footer.php'; ?>