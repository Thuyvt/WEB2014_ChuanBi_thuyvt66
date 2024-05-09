<?php 
    // B1: tính số mũ
    function tinhMu($a, $n) {
        return pow($a, $n);
    }
    // B2: Tour du lịch
    $tour = [
        "ten" => "HN - Điện Biên",
        "noi_di" => "HN",
        "noi_den" => "Điện Biên",
        "gia_tien" => 1000000,
        "ngay_di" => "2024-05-09",
        "ngay_ve" => "2024-05-15",
    ];
    $listTour = [
        [
            "ten" => "HN - Điện Biên",
            "noi_di" => "HN",
            "noi_den" => "Điện Biên",
            "gia_tien" => 1000000,
            "ngay_di" => "2024-05-10",
            "ngay_ve" => "2024-05-15",
        ],
        [
            "ten" => "HN - Lào Cai",
            "noi_di" => "HN",
            "noi_den" => "Lào Cai",
            "gia_tien" => 900000,
            "ngay_di" => "2023-05-09",
            "ngay_ve" => "2023-05-15",
        ]
    ];
    $tourTimDuoc = [];
    $giaTienCanTim = 0;
    $ngayCanDi = "";
    $ngayCanVe = "";
    // Xử lý tìm kiếm
    // form trong html dùng method="GET" dùng $_GET để lấy dữ liệu form đẩy lên
    var_dump($_GET);
    // kiểm tra xem bấm nút tìm kiếm nào
    if (isset($_GET["btnTimGia"])) {
        $giaTienCanTim = $_GET["gia_can_tim"];
        // làm sạch danh sách tour 
        $tourTimDuoc = [];
        foreach ($listTour as $t) {
            // Nếu giá tiền của tour <= giá tiền cần tìm
            if ($t["gia_tien"] <= $giaTienCanTim) { 
                // thêm tour đang duyệt vào danh sách tìm được
                array_push($tourTimDuoc, $t);
            }
        }
    }
    // form trong html dùng method="POST" dùng $_POST để lấy dữ liệu form đẩy lên
    // kiểm tra xem có bấm nút tìm theo ngày hay không
    var_dump($_POST);
    if (isset($_POST["btnTimNgay"])) {
        $tourTimDuoc = [];
        $ngayCanDi = strtotime($_POST["ngay_can_di"]);
        $ngayCanVe = strtotime($_POST["ngay_can_ve"]);
        foreach ($listTour as $tour) {
            if (strtotime($tour["ngay_di"]) <= $ngayCanDi 
            && $ngayCanVe <= strtotime($tour["ngay_ve"])) { 
                array_push($tourTimDuoc, $tour);
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
    <!-- OUTPUT BÀI 1 -->
    <h2>Bài 1:</h2>
    <p> a^ n = <?php echo tinhMu(2,2); ?> </p>
    <!-- BÀI 2 -->
    <h2>Danh sách tour</h2>
    <table border="1">
        <thead>
            <tr>
                <td>Tên</td>
                <td>Nơi đi</td>
                <td>Nơi đến</td>
                <td>Giá</td>
                <td>Ngày đi</td>
                <td>Ngày về</td>
                <td>Trạng thái</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($listTour as $tour) {
                    // Nếu ngày đi < ngày hiện tại thì trạng thái  = không thể đặt, màu đỏ
                    // Nếu ngày đi >= ngày hiện tại thì trạng thái = có thể đặt, màu xanh
                    $mau = "";
                    $trangThai = "";
                    // strtotime chuyển chuỗi ngày tháng thành số
                    $ngayHienTai = strtotime("now"); // lấy ngày hiện tại -> sttotime
                    $ngay_di = strtotime($tour["ngay_di"]);
                    $ngay_ve = strtotime($tour["ngay_ve"]);
                    if ($ngay_di < $ngayHienTai) {
                        $trangThai = "Không thể đặt";
                        $mau = "red";
                    } else {
                        $trangThai = "Có thể đặt";
                        $mau = "blue";
                    }
            ?>
            <tr>
                <td><?php echo $tour["ten"] ;?></td>
                <td><?php echo $tour["noi_di"] ;?></td>
                <td><?php echo $tour["noi_den"] ;?></td>
                <td><?php echo $tour["gia_tien"] ;?></td>
                <td><?php echo $tour["ngay_di"] ;?></td>
                <td><?php echo $tour["ngay_ve"] ;?></td>
                <td style="color: <?php echo $mau;?>"> 
                    <?php echo $trangThai;?>
                </td>
            </tr>
            <?php      } ?>
        </tbody>
    </table>
    <!-- TÌM KIẾM -->
    <!-- Tìm theo giá tiền -->
    <form action="" method="GET">
        Giá tiền : <input type="number" name="gia_can_tim"> <br>
        <input type="submit" name="btnTimGia" value="Tìm kiếm"> 
    </form>
    <!-- Tìm theo ngày đi ngày về -->
    <form action="" method="POST">
         Ngày đi: <input type="datetime-local" name="ngay_can_di"> <br>
         Ngày về: <input type="datetime-local" name="ngay_can_ve"> <br>
         <input  type="submit" name="btnTimNgay" value="Tìm kiếm">
    </form>

    <h2>Danh sách tour tìm được</h2>
    <table border="1">
        <thead>
            <tr>
                <td>Tên</td>
                <td>Nơi đi</td>
                <td>Nơi đến</td>
                <td>Giá</td>
                <td>Ngày đi</td>
                <td>Ngày về</td>
                <td>Trạng thái</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($tourTimDuoc as $tour) {
                    // Nếu ngày đi < ngày hiện tại thì trạng thái  = không thể đặt, màu đỏ
                    // Nếu ngày đi >= ngày hiện tại thì trạng thái = có thể đặt, màu xanh
                    $mau = "";
                    $trangThai = "";
                    // strtotime chuyển chuỗi ngày tháng thành số
                    $ngayHienTai = strtotime("now"); // lấy ngày hiện tại -> sttotime
                    $ngay_di = strtotime($tour["ngay_di"]);
                    $ngay_ve = strtotime($tour["ngay_ve"]);
                    if ($ngay_di < $ngayHienTai) {
                        $trangThai = "Không thể đặt";
                        $mau = "red";
                    } else {
                        $trangThai = "Có thể đặt";
                        $mau = "blue";
                    }
            ?>
            <tr>
                <td><?php echo $tour["ten"] ;?></td>
                <td><?php echo $tour["noi_di"] ;?></td>
                <td><?php echo $tour["noi_den"] ;?></td>
                <td><?php echo $tour["gia_tien"] ;?></td>
                <td><?php echo $tour["ngay_di"] ;?></td>
                <td><?php echo $tour["ngay_ve"] ;?></td>
                <td style="color: <?php echo $mau;?>"> 
                    <?php echo $trangThai;?>
                </td>
            </tr>
            <?php      } ?>
        </tbody>
    </table>

</body>
</html>
