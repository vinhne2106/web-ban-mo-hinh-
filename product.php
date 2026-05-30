<?php 
include 'models/database.php'; 
include 'includes/header.php'; 

// 1. Nhận ID được gửi từ URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 2. Truy vấn Database để lấy thông tin sản phẩm
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "<div class='container py-5 text-center'><h3>Sản phẩm không tồn tại!</h3></div>";
} else {
    // Tự động lấy tên danh mục để đưa vào thanh điều hướng
    $category_name = "Danh mục"; 
    if (isset($row['category_id'])) {
        $cat_id = $row['category_id'];
        $cat_sql = "SELECT name FROM categories WHERE id = $cat_id";
        $cat_result = $conn->query($cat_sql);
        if ($cat_result && $cat_result->num_rows > 0) {
            $cat_row = $cat_result->fetch_assoc();
            $category_name = $cat_row['name'];
        }
    }
    
    // Đảm bảo không bị lỗi nếu DB chưa có cột quantity
    $stock = isset($row['quantity']) ? $row['quantity'] : 10; 
?>
<div class="container py-4">

    <div class="p-3 bg-white rounded shadow-sm border mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent p-0">
                <li class="breadcrumb-item">
                    <a href="index.php" class="text-danger fw-bold text-decoration-none">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="category.php?id=<?php echo $row['category_id']; ?>" class="text-secondary text-decoration-none">
                        <?php echo $category_name; ?>
                    </a>
                </li>
                <li class="breadcrumb-item active text-muted" aria-current="page">
                    <?php echo $row['name']; ?>
                </li>
            </ol>
        </nav>
    </div>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="p-3 border rounded shadow-sm bg-white text-center">
                <img src="assets/images/<?php echo $row['image']; ?>" class="img-fluid rounded" alt="<?php echo $row['name']; ?>" style="max-height: 400px; object-fit: contain;">
            </div>
        </div>

        <div class="col-lg-4">
            <h2 class="fw-bold mb-3"><?php echo $row['name']; ?></h2>
            
            <div class="p-3 mb-4 bg-light rounded border-start border-danger border-4">
                <?php if (isset($row['is_preorder']) && $row['is_preorder'] == 1): ?>
                    <p class="text-warning text-uppercase fw-bold mb-1 small">Tình trạng: Đặt trước</p>
                    <h3 class="text-danger fw-bold mb-0">
                        <?php echo number_format($row['price'] * 0.1, 0, ',', '.'); ?>đ 
                        <span class="fs-6 text-muted font-weight-normal">(Giá cọc 10%)</span>
                    </h3>
                    <p class="text-secondary small mt-1">Tổng giá: <?php echo number_format($row['price'], 0, ',', '.'); ?>đ</p>
                <?php else: ?>
                    <h3 class="text-danger fw-bold mb-0"><?php echo number_format($row['price'], 0, ',', '.'); ?> VNĐ</h3>
                <?php endif; ?>
            </div>
            
            <p class="text-secondary mb-4">Chi tiết: Sản phẩm chính hãng, độ chi tiết cao, full phụ kiện. Phù hợp cho việc sưu tầm và trưng bày.</p>
            
            <form action="controller/cart.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="mb-3">
                    <?php if ($stock > 0): ?>
                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Còn hàng</span>
                        <span class="text-muted ms-2 small">Sẵn có: <strong class="text-danger"><?php echo $stock; ?></strong> sản phẩm</span>
                    <?php else: ?>
                        <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Hết hàng</span>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
    <label class="form-label fw-bold small text-secondary">Số lượng:</label>
    <div class="input-group" style="width: 140px;">
        <button class="btn btn-outline-secondary" type="button" onclick="var qty = document.getElementById('quantity'); if(parseInt(qty.value) > 1) qty.value--;">-</button>
        
        <input type="number" id="quantity" name="quantity" class="form-control text-center" value="1" min="1" max="<?php echo $stock; ?>" 
               onchange="if(parseInt(this.value) > <?php echo $stock; ?>) { alert('Kho chỉ còn <?php echo $stock; ?> sản phẩm!'); this.value = <?php echo $stock; ?>; } else if(parseInt(this.value) < 1 || this.value == '') { this.value = 1; }">
        
        <button class="btn btn-outline-secondary" type="button" onclick="var qty = document.getElementById('quantity'); if(parseInt(qty.value) < <?php echo $stock; ?>) qty.value++; else alert('Kho chỉ còn <?php echo $stock; ?> sản phẩm!');">+</button>
    </div>
</div>
                
                <div class="d-grid gap-2 mt-3">
                    <?php if ($stock > 0): ?>
                        <button type="submit" name="action" value="add" class="btn btn-hover-red btn-lg fw-bold">
                            Thêm vào giỏ
                        </button>
                        <button type="submit" name="action" value="buy_now" class="btn btn-danger btn-lg fw-bold">
                            Mua ngay
                        </button>
                    <?php else: ?>
                        <button type="button" class="btn btn-secondary btn-lg fw-bold" disabled>
                            Tạm hết hàng
                        </button>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="col-lg-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title fw-bold mb-3">Thông tin hỗ trợ</h6>
                    <ul class="list-unstyled text-muted small">
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Giao hàng siêu tốc</li>
                        <li class="mb-2"><i class="bi bi-shield-check text-success me-2"></i> Chính hãng 100%</li>
                        <li class="mb-2"><i class="bi bi-arrow-return-left text-success me-2"></i> Đổi trả dễ dàng</li>
                    </ul>
                    <hr>
                    <div class="text-center">
                        <p class="small mb-1">Cần tư vấn nhanh?</p>
                        <h5 class="text-danger fw-bold">0797.040.590</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
}
include 'includes/footer.php'; 
?>