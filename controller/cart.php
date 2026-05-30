<?php
session_start();
// Gọi database vào để kiểm tra số lượng kho
include '../models/database.php'; 

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $quantity_request = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // LẤY SỐ LƯỢNG TỒN KHO TỪ DATABASE
    $stock = 0;
    if ($id > 0) {
        $sql_check = "SELECT quantity FROM products WHERE id = $id";
        $result = $conn->query($sql_check);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stock = isset($row['quantity']) ? $row['quantity'] : 10;
        }
    }

    // 1. THÊM VÀO GIỎ / MUA NGAY
    if ($action == 'add' || $action == 'buy_now') {
        if ($id > 0) {
            $current_in_cart = isset($_SESSION['cart'][$id]) ? $_SESSION['cart'][$id] : 0;
            $total_requested = $current_in_cart + $quantity_request;

            // KIỂM TRA TỒN KHO
            if ($total_requested > $stock) {
                $_SESSION['error_msg'] = "Rất tiếc, kho chỉ còn $stock sản phẩm!";
            } else {
                $_SESSION['cart'][$id] = $total_requested;
                $_SESSION['success_msg'] = "Đã thêm vào giỏ hàng!";
            }
        }
        
        // Điều hướng
        if ($action == 'buy_now') {
            header('Location: ../view_cart.php'); 
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']); 
        }
        exit();
    }

    // 2. TĂNG SỐ LƯỢNG (Kiểm tra kho)
    if ($action == 'increase') {
        if (isset($_SESSION['cart'][$id])) {
            if ($_SESSION['cart'][$id] < $stock) {
                $_SESSION['cart'][$id]++;
            } else {
                $_SESSION['error_msg'] = "Đã đạt giới hạn số lượng trong kho!";
            }
        }
        header('Location: ../view_cart.php');
        exit();
    }

    // 3. GIẢM SỐ LƯỢNG
    if ($action == 'decrease') {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]--;
            // Nếu giảm về 0 thì tự động xóa luôn khỏi giỏ
            if ($_SESSION['cart'][$id] <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }
        header('Location: ../view_cart.php');
        exit();
    }

    // 4. XÓA KHỎI GIỎ
    if ($action == 'remove') {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
            // Thông báo xóa thành công
            $_SESSION['success_msg'] = "Đã xóa sản phẩm khỏi giỏ hàng!";
        }
        header('Location: ../view_cart.php');
        exit();
    }
}
?>