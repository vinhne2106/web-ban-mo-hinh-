<?php
$servername = "localhost";
$username = "root"; // Mặc định của XAMPP luôn là root
$password = "";     // Mặc định XAMPP không có mật khẩu
$dbname = "dtb_gundamZ"; // Tên database bạn đã tạo trong phpMyAdmin

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra xem kết nối có bị lỗi không
if ($conn->connect_error) {
    die("Kết nối Database thất bại: " . $conn->connect_error);
}

// Bắt buộc phải có dòng này để lấy chữ tiếng Việt có dấu không bị lỗi font
$conn->set_charset("utf8mb4");
?>