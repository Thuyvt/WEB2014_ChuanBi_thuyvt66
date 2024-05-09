<!-- Khu vực xử lý code logic php -->
<?php
// 1. Khai báo mảng 2 chiều
$danhSachSinhVien = array(
    array("ten" => "Nguyễn Văn A", "tuoi" => 18, "diaChi" => "Hà Nội"),
    array("ten" => "Nguyễn Thị B", "tuoi" => 18, "diaChi" => "Nam Định"),
    array("ten" => "Nguyễn Văn C", "tuoi" => 19, "diaChi" => "Hà Nam")
);


// 2. Hiển thị dữ liệu mảng 2 chiều
// Sẽ code ở phần html


// 3. Kiểm tra dữ liệu submit form
echo "Log thử tất cả giá trị người dùng nhập vào form: <br>";
var_dump($_GET);
echo "<br><br>";

// Nếu submit form tìm kiếm tuyệt đối
if (isset($_GET["submitFormTuyetDoi"])) {
    echo "Submit form tuyệt đối. Bắt đầu xử lý logic <br>";

    // Lấy dữ liệu nhập vào từ form vào lưu vào biến cần thiết
    $tenTimKiem = trim($_GET["tenTk"]);

    // Kiểm tra giá trị biến nhập vào
    if ($tenTimKiem !== "") {
        // Duyệt mảng chính kiểm tra phần tử không thỏa mãn và xóa khỏi mảng
        foreach ($danhSachSinhVien as $key => $value) {
            if ($value["ten"] !== $tenTimKiem) {
                unset($danhSachSinhVien[$key]);
            }
        }
    }
}

// Nếu submit form tìm kiếm tương đối
if (isset($_GET["submitFormTuongDoi"])) {
    echo "Submit form tương đối. Bắt đầu xử lý logic. <br>";

    // Lấy dữ liệu nhập vào từ form vào lưu vào biến cần thiết
    $tenTimKiem = trim($_GET["tenTk"]);
    $diaChiTimKiem = trim($_GET["diaChiTk"]);

    echo "Log thử kiểm giá trị người dùng nhập vào form <br>";
    var_dump($tenTimKiem);
    var_dump($diaChiTimKiem);

    // Kiểm tra giá trị biến nhập vào
    if ($tenTimKiem !== "") {
        // Duyệt mảng chính kiểm tra phần tử không thỏa mãn và xóa khỏi mảng
        foreach ($danhSachSinhVien as $key => $value) {
            $viTri = strpos(strtolower($value["ten"]), strtolower($tenTimKiem));

            if ($viTri === false) {
                unset($danhSachSinhVien[$key]);
            }
        }
    }


    if ($diaChiTimKiem !== "") {
        // Duyệt mảng chính kiểm tra phần tử không thỏa mãn và xóa khỏi mảng
        foreach ($danhSachSinhVien as $key => $value) {
            $viTri = strpos(strtolower($value["diaChi"]), strtolower($diaChiTimKiem));

            if ($viTri === false) {
                unset($danhSachSinhVien[$key]);
            }
        }
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,
        td {
            padding: 8px 16px;
        }
    </style>
</head>

<body>
    <!-- Khu vực form tìm kiếm tuyệt đối -->
    <h3>1. Form tìm kiếm tuyệt đối</h3>
    <p>Logic:</p>
    <ul>
        <li>Nhập đầy đủ tên sinh viên để tìm kiếm</li>
        <li>Hỗ trợ loại bỏ khoảng trắng đầu và cuối</li>
    </ul>
    <form action="" method="GET">
        <!-- Tìm kiếm tương đối theo tên -->
        <span>Nhập tên: </span>
        <input type="text" name="tenTk">

        <!-- Button submit -->
        <!-- Đặt tên cho button để kiểm tra khi nào người dùng ấn button này -->
        <button type="submit" name="submitFormTuyetDoi">Tìm Kiếm</button>
    </form>
    <hr>

    <!-- Khu vực form tìm kiếm tương đối -->
    <h3>2. Form tìm kiếm tương đối</h3>
    <p>Logic:</p>
    <ul>
        <li>Hỗ trợ nhập một vài ký tự và tìm kiếm</li>
        <li>Hỗ trợ loại bỏ khoảng trắng đầu và cuối</li>
        <li>Hỗ trợ tìm kiếm không phân biệt hoa thường</li>
        <li>Hỗ trợ hiển thị lại giá trị đã nhập trước đó</li>
        <li>Hỗ trợ tìm kiếm kết hợp tên và địa chỉ</li>
        <li>Hỗ trợ button tải lại</li>
    </ul>
    <form action="" method="GET">
        <!-- Tìm kiếm tương đối theo tên -->
        <span>Nhập tên: </span>
        <?php
        if (!isset($_GET["submitFormTuongDoi"])) {
            echo '<input type="text" name="tenTk">';
        } else {
            echo '<input type="text" name="tenTk" value="' . $tenTimKiem . '">';
        }
        ?>

        <!-- Tìm kiếm tương đối theo địa chỉ -->
        <span>Nhập địa chỉ: </span>
        <?php
        if (!isset($_GET["submitFormTuongDoi"])) {
            echo '<input type="text" name="diaChiTk">';
        } else {
            echo '<input type="text" name="diaChiTk" value="' . $diaChiTimKiem . '">';
        }
        ?>

        <!-- Button submit -->
        <!-- Đặt tên cho button để kiểm tra khi nào người dùng ấn button này -->
        <button type="submit" name="submitFormTuongDoi">Tìm Kiếm</button>

        <!-- Button reset form -->
        <!-- Không cần xử lý logic gì cả. Vì logic ở trên đã viết là phải ấn nút submit thì mới xử lý logic -->
        <button name="resetForm">Tải Lại</button>
    </form>
    <hr>


    <!-- Khu vực bảng dữ liệu -->
    <h3>Danh sách sinh viên</h3>
    <table border="1">
        <!-- Khu vực tiêu đề bảng -->
        <thead>
            <tr>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Địa chỉ</th>
            </tr>
        </thead>

        <!-- Khu vực dữ liệu bảng -->
        <tbody>
            <?php
            if (count($danhSachSinhVien) > 0) {
                foreach ($danhSachSinhVien as $value) {
                    echo "<tr>";
                    echo "  <td>" . $value["ten"] . "</td>";
                    echo "  <td>" . $value["tuoi"] . "</td>";
                    echo "  <td>" . $value["diaChi"] . "</td>";
                    echo "</tr>";
                };

            } else {
                echo "<tr>";
                echo '  <td colspan="3">Không có dữ liệu</td>';
                echo "</tr>";

            }
            
            ?>
        </tbody>
    </table>
</body>

</html>