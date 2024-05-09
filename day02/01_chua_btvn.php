<?php
    // Bài 1
    function tinhMu($a, $n) {
        // hàm pow tính giá trị a^n
        return pow($a, $n);
    }

    // Bài 2
    $tour = [
        "ten" => "Hà Nội - Singapore",
        "noi_di" => "Hà Nội",
        "noi_den" => "Singapore",
        "gia_tien" => 10000000,
        "ngay_di" => "2024-07-22",
        "ngay_ve" => "2024-07-30",
    ];
    // danh sách tour
    $listTour = [
        // $tour, $tour, $tour
        [
            "ten" => "Hà Nội - Singapore",
            "noi_di" => "Hà Nội",
            "noi_den" => "Singapore",
            "gia_tien" => 10000000,
            "ngay_di" => "2024-07-22",
            "ngay_ve" => "2024-07-30",
        ],
        [
            "ten" => "Hà Nội - Sapa",
            "noi_di" => "Hà Nội",
            "noi_den" => "Sapa",
            "gia_tien" => 1000000,
            "ngay_di" => "2023-07-22",
            "ngay_ve" => "2023-07-30",
        ]
    ];

    // Code xử lý logic bài 2
    // Khai báo biến cần sử dụng trong bài 2
    $listTourTimDuoc = [];
    $ngayCanDi = "";
    $ngayCanVe = "";
    $giaTienCanTim = 0;

    // Xử lý tìm kiếm
    // Lấy giá tiền nhập vào sau khi click nút tìm kiếm trong form method = "GET"
    // var_dump($_GET);
    // Kiểm tra nếu nút tìm kiếm giá được nhấn
    if (isset($_GET["btnTimGia"])) {
        $giaTienCanTim = $_GET["gia_tien"];
        // Làm sạch danh sách tour tìm được
        $listTourTimDuoc = [];
        // tìm theo giá tiền
        foreach ($listTour as $tour) {
            if ($tour['gia_tien'] <= $giaTienCanTim) {
                // thêm đối tượng đang kieerrm tra vào mảng cần tìm
                array_push($listTourTimDuoc, $tour);
            }
        }
    }
    // Lấy giá trị input của form có method = "POST" dùng $_POST
    var_dump($_POST);
    if (isset($_POST["btnTimNgay"])) {
        $listTourTimDuoc = [];
        $ngayCanDi = $_POST["ngay_ca_di"];
        $ngayCanVe = $_POST["ngay_can_ve"];
        
        foreach ($listTourTimDuoc as $tour) { 
            if (strtotime($tour['ngay_di']) >= strtotime($ngayCanDi) 
            && strtotime($tour['ngay_ve']) <= strtotime($ngayCanVe)) {
                array_push($listTourTimDuoc, $tour);
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
</head>
<body>
    <h2>Bài 1: </h2>
    <p>a ^ n = <?php echo tinhMu(2, 2); ?></p>
    <hr>
    <h2>Bài 2:</h2>
    <h3>Danh sách tour</h3>
    <table border="1">
        <thead>
            <tr>
                <td>Tên</td>
                <td>Nơi đi</td>
                <td>Nơi đến</td>
                <td>Giá tiền</td>
                <td>Ngày đi</td>
                <td>Ngày về</td>
                <td>Trạng thái</td>
            </tr>
        </thead>
        <tbody>
            <!-- Muốn hiển thị lặp tr theo đúng danh sách $listTour 
            trong php -> đưa tr vào trong vòng lặp -->
            <?php 
                foreach ($listTour as $value) {
                    $mau = "";
                    $trangThai = "";
                    // Nếu ngày đi > ngày hiện tại hiển thị trạng thái Không thể đăt có màu đỏ
                    // Nếu ngày đi < ngày hiện tại hiển thị trạng thái Có thể đặt có màu xanh
                    $ngay_di = strtotime($value['ngay_di']);
                    $ngay_ve = strtotime($value['ngay_ve']);
                    $ngayHienTai = strtotime("now"); // Lấy ngày hiện tại
                    if ($ngayHienTai <= $ngay_di) {
                        $mau = "blue";
                        $trangThai = "Có thể đặt";
                    } else {
                        $mau = "red";
                        $trangThai = "Không thể đặt";
                    }
            ?>
                <tr>
                    <td><?php echo $value['ten'];?></td>
                    <td><?php echo $value['noi_di'];?></td>
                    <td><?php echo $value['noi_den'];?></td>
                    <td><?php echo $value['gia_tien'];?></td>
                    <td><?php echo $value['ngay_di'];?></td>
                    <td><?php echo $value['ngay_ve'];?></td>
                    <td bgcolor="<?php echo $mau;?>"> 
                        <?php echo $trangThai;?>
                    </td>
                </tr>
            <?php    
                }
             ?>
        </tbody>
    </table>
    <!-- Form tìm theo giá -->
    <form action="" method="GET">
        Giá tiền : <input type="number" name="gia_tien"> <br>
        <input type="submit" name="btnTimGia" value="Tìm kiếm">
    </form>
    <!-- Form tìm theo ngày đi -->
    <form action="" method="POST">
        Ngày đi: <input type="datetime-local" name="ngay_can_di"> <br>
        Ngày về: <input type="datetime-local" name="ngay_can_ve>"> <br>
        <input type="submit" name="btnTimNgay" value="Tìm kiếm">
    </form>
    <h3>Danh sách tour tìm được</h3>
    <table border="1">
        <thead>
            <tr>
                <td>Tên</td>
                <td>Nơi đi</td>
                <td>Nơi đến</td>
                <td>Giá tiền</td>
                <td>Ngày đi</td>
                <td>Ngày về</td>
                <td>Trạng thái</td>
            </tr>
        </thead>
        <tbody>
            <!-- Muốn hiển thị lặp tr theo đúng danh sách $listTour 
            trong php -> đưa tr vào trong vòng lặp -->
            <?php 
                foreach ($listTourTimDuoc as $value) {
                    $mau = "";
                    $trangThai = "";
                    // Nếu ngày đi > ngày hiện tại hiển thị trạng thái Không thể đăt có màu đỏ
                    // Nếu ngày đi < ngày hiện tại hiển thị trạng thái Có thể đặt có màu xanh
                    $ngay_di = strtotime($value['ngay_di']);
                    $ngay_ve = strtotime($value['ngay_ve']);
                    $ngayHienTai = strtotime("now"); // Lấy ngày hiện tại
                    if ($ngayHienTai <= $ngay_di) {
                        $mau = "blue";
                        $trangThai = "Có thể đặt";
                    } else {
                        $mau = "red";
                        $trangThai = "Không thể đặt";
                    }
            ?>
                <tr>
                    <td><?php echo $value['ten'];?></td>
                    <td><?php echo $value['noi_di'];?></td>
                    <td><?php echo $value['noi_den'];?></td>
                    <td><?php echo $value['gia_tien'];?></td>
                    <td><?php echo $value['ngay_di'];?></td>
                    <td><?php echo $value['ngay_ve'];?></td>
                    <td bgcolor="<?php echo $mau;?>"> 
                        <?php echo $trangThai;?>
                    </td>
                </tr>
            <?php    
                }
             ?>
        </tbody>
    </table>
</body>
</html>