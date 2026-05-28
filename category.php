<?php 
include 'models/database.php'; // File kết nối DB của bạn
include 'includes/header.php'; 

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Lấy tên danh mục động
$category_name = "Tất cả sản phẩm";
if ($id > 0) {
    $sql_name = "SELECT name FROM categories WHERE id = $id";
    $res_name = $conn->query($sql_name);
    if ($row_n = $res_name->fetch_assoc()) {
        $category_name = $row_n['name'];
    }
}

// Truy vấn sản phẩm
$sql = ($id == 0) ? "SELECT * FROM products" : "SELECT * FROM products WHERE category_id = $id";
$result = $conn->query($sql);
?>

<div class="container py-5">
    <h2 class="mb-4 fw-bold text-uppercase"><?php echo $category_name; ?></h2>
    
    <div class="row"> 
        <?php 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Gọi "khuôn mẫu" ra dùng
                include 'includes/product_card.php';
            }
        } else {
            echo "<h3 class='text-center w-100'>Danh mục này hiện chưa có sản phẩm nào!</h3>";
        }
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>