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
?>
<div class="container py-4">

    <!-- THANH ĐIỀU HƯỚNG (BREADCRUMB) -->
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
        <!-- Cột 1: Ảnh sản phẩm -->
        <div class="col-lg-5">
            <div class="p-3 border rounded shadow-sm bg-white text-center">
                <img src="assets/images/<?php echo $row['image']; ?>" class="img-fluid rounded" alt="<?php echo $row['name']; ?>" style="max-height: 400px; object-fit: contain;">
            </div>
        </div>

        <!-- Cột 2: Thông tin chính -->
        <div class="col-lg-4">
            <h2 class="fw-bold mb-3"><?php echo $row['name']; ?></h2>
            
            <!-- KHUNG HIỂN THỊ GIÁ -->
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
            
            <!-- CHUYỂN THÀNH FORM ĐỂ GỬI SỐ LƯỢNG -->
            <form action="cart.php" method="GET">
                <!-- Gửi ngầm id sản phẩm -->
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <!-- THÀNH CHỌN SỐ LƯỢNG -->
                <div class="mb-4">
                    <label class="form-label fw-bold small text-secondary">Số lượng:</label>
                    <div class="input-group" style="width: 140px;">
                        <button class="btn btn-outline-secondary" type="button" onclick="var qty = document.getElementById('quantity'); if(qty.value > 1) qty.value--;">-</button>
                        <input type="number" id="quantity" name="quantity" class="form-control text-center" value="1" min="1" readonly>
                        <button class="btn btn-outline-secondary" type="button" onclick="var qty = document.getElementById('quantity'); qty.value++;">+</button>
                    </div>
                </div>
                
                <!-- HỆ THỐNG NÚT BẤM GỬI FORM -->
                <div class="d-grid gap-2">
                    <button type="submit" name="action" value="add" class="btn btn-outline-secondary btn-lg">
                        Thêm vào giỏ
                    </button>
                    <button type="submit" name="action" value="buy_now" class="btn btn-danger btn-lg fw-bold">
                        Mua ngay
                    </button>
                </div>
            </form>
        </div>

        <!-- Cột 3: Hỗ trợ khách hàng -->
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