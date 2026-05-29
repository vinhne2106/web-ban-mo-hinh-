<?php
session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // THÊM VÀO GIỎ / MUA NGAY
    if ($action == 'add' || $action == 'buy_now') {
        if ($id > 0) {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] += $quantity;
            } else {
                $_SESSION['cart'][$id] = $quantity;
            }
        }
        
        // Điều hướng
        if ($action == 'buy_now') {
            header('Location: ../view_cart.php'); // Lùi ra ngoài 1 cấp
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']); 
        }
        exit();
    }

    // XÓA KHỎI GIỎ
    if ($action == 'remove') {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        header('Location: ../view_cart.php'); // Lùi ra ngoài 1 cấp
        exit();
    }
}
?>