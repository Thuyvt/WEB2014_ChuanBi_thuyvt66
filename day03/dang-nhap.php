<?php
//Khởi tạo 1 session
session_start();

// Log thử giá trị session hiện tại
// echo "Log thử giá trị session hiện tại: <br>";
// var_dump($_SESSION);
// echo "<hr>";
// Nếu tồn tại key username ==> Đã đăng nhập rồi ==> Hiển thị thông báo rồi điều hướng về trang danh sách
if (isset($_SESSION["username"])) {
    echo '<script>';
    echo 'alert("Bạn đã đăng nhập. Nhấn Ok để quay về trang danh sách.");';
    echo 'window.location.href = "danh-sach.php";';
    echo '</script>';
    // header("Location: danh-sach.php");
}


// Log thử giá trị người dùng nhập vào form
// echo "Log thử giá trị người dùng nhập vào form: <br>";
// var_dump($_POST);
// echo "<hr>";


// Khai báo biến xử lý thông báo form
$thongBaoForm = "";


// Kiểm tra người dùng ấn submit form đăng nhập
if (isset($_POST["submitFormDangNhap"])) {
    // echo "Bắt đầu xử lý dữ liệu submit form đăng nhập";

    // Lấy dữ liệu username và password người dùng nhập vào
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    // Kiểm tra việc nhập đầy đủ thông tin
    if ($username !== "" && $password !== "") {
        // Nhập đủ thông tin ==> Kiểm tra việc nhập đúng thông tin
        if ($username === "admin" && $password === "123456") {
            // Đăng nhập thành công
            // Lưu thông tin username vào SESSION
            $_SESSION["username"] = $username;

            // Điều hướng về trang danh sách
            echo '<script>';
            echo 'alert("Đăng nhập thành công. Nhấn Ok để chuyển đến trang danh sách.");';
            echo 'window.location.href = "danh-sach.php";';
            echo '</script>';
            // header("Location: danh-sach.php");
        } else {
            // Nhập sai thông tin. Yêu cầu nhập lại thông tin.
            $thongBaoForm =
                "Đăng nhập không thành công. Mời bạn nhập lại thông tin.";
        }
    } else {
        // Yêu cầu người dùng nhập đầy đủ thông tin
        $thongBaoForm =
            "Mời bạn nhập đầy đủ thông tin.";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        
    </script>

</head>

<body>
    <h3>Trang đăng nhập</h3>

    <form action="" method="POST">
        <div>
            <span>Username:</span>
            <?php
            if (isset($_POST["submitFormDangNhap"])) {
                echo '<input type="text" name="username" value="' . $_POST["username"] . '">';
            } else {
                echo '<input type="text" name="username">';
            }
            ?>
        </div>
        <br>

        <div>
            <span>Password:</span>
            <input type="text" name="password">
        </div>
        <br>

        <div>
            <button type="submit" name="submitFormDangNhap">Đăng nhập</button>
        </div>
        <br>

        <div style="color: red;">
            <?php echo $thongBaoForm ?>
        </div>


    </form>
</body>

</html>