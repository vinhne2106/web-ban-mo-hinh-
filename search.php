<?php 
include 'models/database.php'; 
include 'includes/header.php'; 

// 1. Lấy từ khóa khách hàng gõ từ thanh URL
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
// Loại bỏ các khoảng trắng thừa
$keyword = trim($keyword);
?>

<div class="container py-5">
    <div class="mb-4">
        <h3 class="fw-bold text-dark">
            Kết quả tìm kiếm cho: <span class="text-danger">"<?php echo htmlspecialchars($keyword); ?>"</span>
        </h3>
    </div>

    <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-lg-4 justify-content-center">
        <?php
        // 2. Nếu từ khóa không rỗng thì mới tìm kiếm
        if (!empty($keyword)) {
            // Dùng LIKE '%từ_khóa%' để tìm sản phẩm có tên chứa từ khóa
            $sql_search = "SELECT * FROM products WHERE name LIKE '%$keyword%' AND status != 0 ORDER BY id DESC";
            $result_search = $conn->query($sql_search);

            if ($result_search && $result_search->num_rows > 0) {
                // Lặp qua để in ra các thẻ sản phẩm y hệt trang chủ
                while($row = $result_search->fetch_assoc()) {
        ?>
                    <div class="col mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <a href="product.php?id=<?php echo $row['id']; ?>">
                                <img class="card-img-top p-3" src="assets/images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" style="aspect-ratio: 1/1; object-fit: contain;" />
                            </a>
                            
                            <div class="card-body p-3 text-center d-flex flex-column">
                                <h6 class="fw-bolder mb-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 40px;">
                                    <a href="product.php?id=<?php echo $row['id']; ?>" class="text-dark text-decoration-none">
                                        <?php echo $row['name']; ?>
                                    </a>
                                </h6>
                                
                                <div class="mt-auto">
                                    <?php if (isset($row['is_preorder']) && $row['is_preorder'] == 1): ?>
                                        <span class='badge bg-warning text-dark mb-1' style="font-size: 0.75rem;">Pre-order</span>
                                        <p class='text-danger fw-bold fs-6 mb-0'><?php echo number_format($row['price'], 0, ',', '.'); ?> VNĐ</p>
                                    <?php else: ?>
                                        <p class='text-danger fw-bold fs-6 mb-0'><?php echo number_format($row['price'], 0, ',', '.'); ?> VNĐ</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="card-footer p-3 pt-0 border-top-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger w-100 btn-sm" href="controller/cart.php?action=add&id=<?php echo $row['id']; ?>">
                                    <i class="bi bi-cart-plus me-1"></i> Thêm vào giỏ
                                </a>
                            </div>
                        </div>
                    </div>
        <?php
                } // Kết thúc while
            } else {
                // Báo lỗi nếu không tìm thấy con nào
                echo "<div class='col-12 py-5 text-center'>";
                echo "<i class='bi bi-search display-1 text-muted opacity-50 mb-3 d-block'></i>";
                echo "<h5 class='text-muted'>Rất tiếc, không tìm thấy mô hình nào phù hợp với từ khóa của bạn.</h5>";
                echo "<a href='index.php' class='btn btn-danger mt-3'>Quay lại Trang chủ</a>";
                echo "</div>";
            }
        } else {
            echo "<div class='col-12 py-5 text-center'><h5 class='text-muted'>Vui lòng nhập từ khóa để tìm kiếm.</h5></div>";
        }
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>