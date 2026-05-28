<div class='col-md-3 mb-4'>
    <div class='card h-100 border-0 shadow-sm'>
        <a href='product.php?id=<?php echo $row['id']; ?>'>
            <img src='assets/images/<?php echo $row['image']; ?>' class='card-img-top p-3' style='height: 220px; object-fit: contain;'>
        </a>
        
        <div class='card-body text-center'>
            <a href='product.php?id=<?php echo $row['id']; ?>' class='text-dark text-decoration-none'>
                <h6 class='fw-bold mb-2' style='min-height: 40px;'><?php echo $row['name']; ?></h6>
            </a>
            
            <p class='text-danger fw-bold fs-6'><?php echo number_format($row['price'], 0, ',', '.'); ?> VNĐ</p>
            
            <a href='cart.php?action=add&id=<?php echo $row['id']; ?>' class='btn btn-outline-danger btn-sm w-100 mt-2'>
                <i class='bi bi-cart-plus me-1'></i> Thêm vào giỏ
            </a>
        </div>
    </div>
</div>