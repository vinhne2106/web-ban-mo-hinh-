<?php
session_start();
session_destroy(); 
// Dùng ../ để lùi ra ngoài thư mục gốc tìm file index.php
header("Location: ../index.php"); 
exit();
?>