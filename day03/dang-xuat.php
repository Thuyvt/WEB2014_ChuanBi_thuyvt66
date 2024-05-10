<?php
//Khởi tạo 1 session
session_start();

// Kiểm tra dữ liệu session hiện tại
// echo "Log thử giá trị session: <br>";
// var_dump($_SESSION);
// echo "<hr>";

//Xóa toàn bộ các biến đang lưu trong session
session_unset();

//Hủy toàn bộ session
session_destroy();

// Kiểm tra dữ liệu session sau khi xóa
// echo "Log thử giá trị session: <br>";
// var_dump($_SESSION);
// echo "<hr>";

// Điều hướng về màn hình đăng nhập
echo '<script>';
echo 'alert("Đăng xuất thành công. Nhấn Ok để quay về trang đăng nhập.");';
echo 'window.location.href = "dang-nhap.php";';
echo '</script>';
