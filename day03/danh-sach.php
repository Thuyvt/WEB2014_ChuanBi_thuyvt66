<?php
//Khởi tạo 1 session
session_start();


// Log thử giá trị session hiện tại
// echo "Log thử giá trị session hiện tại: <br>";
// var_dump($_SESSION);
// echo "<hr>";
// Nếu chưa tồn tại key username ==> Chưa đăng nhập ==> Hiển thị thông báo rồi điều hướng về trang đăng nhập
if (!isset($_SESSION["username"])) {
    echo '<script>';
    echo 'alert("Bạn chưa đăng nhập. Nhấn Ok để thực hiện đăng nhập.");';
    echo 'window.location.href = "dang-nhap.php";';
    echo '</script>';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Hiển thị thông tin đăng nhập -->
    <?php
    if (isset($_SESSION["username"])) {
        echo '<h3>Xin chào: ' . $_SESSION["username"] . '</h3>';
    }
    ?>

    <h3>Đây là trang danh sách</h3>

    <a href="dang-xuat.php">Đăng xuất</a>
</body>

</html>