
<?php 
// Kết nối header và footer đã làm sẵn
include 'models/database.php';
include 'includes/header.php'; 
?>

<!-- Banner Giới thiệu -->
<header class="py-5 bg-dark text-white text-center">
    <div class="container">
        <h1 class="fw-bold text-uppercase">Về Mechashop</h1>
        <p class="lead text-white-50">Thế giới mô hình Gundam dành cho cộng đồng đam mê</p>
    </div>
</header>

<!-- Nội dung chi tiết -->
<section class="py-5">
    <div class="container px-4 px-lg-5">
        <div class="row gx-5 align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Câu chuyện của chúng tôi</h2>
                <p class="text-muted">
                    Mechashop được thành lập từ chính niềm đam mê mãnh liệt với thế giới mô hình Gundam. 
                    Chúng tôi hiểu rằng, mỗi mô hình không chỉ là nhựa và decal, mà là tâm huyết, là nghệ thuật và là cả một bầu trời ký ức của người chơi.
                </p>
                <p class="text-muted">
                    Với phương châm <strong>"Chất lượng là danh dự"</strong>, Mechashop cam kết mang đến những sản phẩm chính hãng (Bandai, Kotobukiya...) với giá cả hợp lý và trải nghiệm mua sắm tốt nhất tại Việt Nam.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="p-3 border rounded shadow bg-light text-center">
                    <!-- Ảnh shop -->
                    <img class="img-fluid rounded" src="assets/images/anhshop.jpg" alt="Mechashop">
                </div>
            </div>
        </div>

        <!-- Các giá trị cốt lõi -->
        <h3 class="text-center fw-bold mb-5">Tại sao nên chọn Mechashop?</h3>
        <div class="row gx-4 gx-lg-5 text-center">
            <div class="col-lg-4 mb-4">
                <div class="p-4 border rounded shadow-sm h-100 bg-white">
                    <i class="bi bi-shield-check fs-1 text-warning mb-3"></i>
                    <h5 class="fw-bold">Hàng chính hãng</h5>
                    <p class="text-muted">100% sản phẩm có nguồn gốc rõ ràng, chất lượng nhựa tiêu chuẩn Bandai.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="p-4 border rounded shadow-sm h-100 bg-white">
                    <i class="bi bi-truck fs-1 text-primary mb-3"></i>
                    <h5 class="fw-bold">Đóng gói an toàn</h5>
                    <p class="text-muted">Bọc chống sốc cẩn thận, đảm bảo hộp mô hình không bị móp méo khi vận chuyển.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="p-4 border rounded shadow-sm h-100 bg-white">
                    <i class="bi bi-headset fs-1 text-danger mb-3"></i>
                    <h5 class="fw-bold">Tư vấn tận tâm</h5>
                    <p class="text-muted">Đội ngũ am hiểu chuyên môn, sẵn sàng hỗ trợ kỹ thuật lắp ráp 24/7.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>