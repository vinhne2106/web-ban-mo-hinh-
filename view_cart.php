<?php 
session_start();
include 'models/database.php'; 
include 'includes/header.php'; 
?>

<div class="container py-5">
    <h2 class="fw-bold mb-4 text-danger"><i class="bi bi-cart3"></i> Giỏ hàng của bạn</h2>

    <?php 
    // Kiểm tra xem giỏ hàng có trống không
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "<div class='alert alert-warning text-center p-5'>";
        echo "<h4>Giỏ hàng của bạn đang trống!</h4>";
        echo "<a href='index.php' class='btn btn-danger mt-3'>Quay lại mua sắm</a>";
        echo "</div>";
    } else {
    ?>
        <div class="table-responsive shadow-sm bg-white rounded border">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" width="10%">Ảnh</th>
                        <th scope="col" width="35%">Tên sản phẩm</th>
                        <th scope="col" width="20%">Đơn giá</th>
                        <th scope="col" width="10%" class="text-center">Số lượng</th>
                        <th scope="col" width="20%">Thành tiền</th>
                        <th scope="col" width="5%" class="text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total_cart = 0; // Biến tính tổng tiền cả giỏ hàng

                    // Lặp qua từng sản phẩm trong Session
                    foreach ($_SESSION['cart'] as $id => $quantity) {
                        // Truy vấn lấy thông tin sản phẩm
                        $sql = "SELECT * FROM products WHERE id = $id";
                        $result = $conn->query($sql);
                        if ($row = $result->fetch_assoc()) {
                            
                            // ĐÃ SỬA: Tính giá Pre-order dựa vào cột is_preorder = 1
                            if (isset($row['is_preorder']) && $row['is_preorder'] == 1) {
                                $unit_price = $row['price'] * 0.1;
                                $preorder_badge = "<span class='badge bg-warning text-dark ms-2'>Pre-order (Cọc 10%)</span>";
                            } else {
                                $unit_price = $row['price'];
                                $preorder_badge = "";
                            }

                            // Tính thành tiền của món đó (Đơn giá x Số lượng)
                            $subtotal = $unit_price * $quantity;
                            $total_cart += $subtotal; // Cộng vào tổng đơn hàng
                    ?>
                    <tr>
                        <td>
                            <img src="assets/images/<?php echo $row['image']; ?>" class="img-fluid rounded border" alt="<?php echo $row['name']; ?>">
                        </td>
                        <td>
                            <a href="product.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-dark fw-bold">
                                <?php echo $row['name']; ?>
                            </a>
                            <?php echo $preorder_badge; ?>
                        </td>
                        <td class="text-danger fw-bold">
                            <?php echo number_format($unit_price, 0, ',', '.'); ?>đ
                        </td>
                        <td class="text-center">
                            <span class="fw-bold"><?php echo $quantity; ?></span>
                        </td>
                        <td class="text-danger fw-bold">
                            <?php echo number_format($subtotal, 0, ',', '.'); ?>đ
                        </td>
                        <td class="text-center">
                            <a href="controller/cart.php?action=remove&id=<?php echo $id; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?');">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } 
                    ?>
                </tbody>
            </table>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <a href="index.php" class="btn btn-outline-secondary btn-lg"><i class="bi bi-arrow-left"></i> Tiếp tục mua hàng</a>
            </div>
            <div class="col-md-6 text-end">
                <h4 class="mb-3">Tổng cộng: <span class="text-danger fw-bold fs-2"><?php echo number_format($total_cart, 0, ',', '.'); ?> VNĐ</span></h4>
                <a href="checkout.php" class="btn btn-danger btn-lg px-5 fw-bold">Thanh toán ngay <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    <?php 
    } // Kết thúc else
    ?>
</div>

<?php include 'includes/footer.php'; ?>