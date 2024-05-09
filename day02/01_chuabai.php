<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Bài 1
        function tinhMu($a,$b){
            return pow($a,$b);
        }
        $c = tinhMu(2,3);
        echo "a^n = ".$c;
        // Bài 2
        $listTour = [
            [
                'ten' =>"MH370",
                'noi_di'=>"malaysia",
                'noi_den'=>"Bien den",
                'gia_tien'=>100,
                'ngay_di'=> "2024-07-22",
                'ngay_ve'=> "2024-07-30"
            ],
            [
                'ten' =>"MH371",
                'noi_di'=>"ha noi",
                'noi_den'=>"TPHCM",
                'gia_tien'=>200,
                'ngay_di'=> "2023-07-22",
                'ngay_ve'=> "2023-07-22"
            ],
        ];
        $tourTimDuoc = [];
        $ngayCanDi = "";
        $ngayCanVe = "";
        $giaTienCanTim = 0;
        // Xử lý tìm kiếm
        if (isset($_POST['btnTim'])) {
            $ngayCanDi = strtotime($_POST['ngay_can_di']); // strotime để đổi thời gian ra 1 số nguyên để so sánh
            $ngayCanVe = strtotime($_POST['ngay_can_ve']);
            $giaTienCanTim = (float) $_POST['gia_tien'];
            if ($giaTienCanTim != 0) {
                $tourTimDuoc = [];
                // tìm theo giá tiền
                foreach ($listTour as $tour) {
                    if ($tour['gia_tien'] <= $giaTienCanTim) {
                        array_push($tourTimDuoc,$tour);
                    }
                }
                return;
            }
            if (!empty($ngayCanDi) && !empty($ngayCanVe)) {
                $tourTimDuoc = [];
                // tìm theo ngày đi và ngày về
                foreach ($listTour as $tour) { 
                    if ($tour['ngay_di'] >= $ngayCanDi && $tour['ngay_ve'] <= $ngayCanVe) {
                        array_push($tourTimDuoc,$tour);
                    }
                }
            }
        }
       
    ?>
    <!-- Bảng hiển thị danh sách -->
    <h2>Danh sách tour</h2>
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
            <?php foreach ($listTour as $key => $value) {
                $mau = "";
                $trang_thai = "";
                // nếu ngày đi < ngày hiện tại hiển thị trạng thái hết hạn
                
                $ngay_di = strtotime($value['ngay_di']);
                $ngay_ve = strtotime($value['ngay_ve']);
                $ngayHienTai = strtotime("now");
                echo $ngayHienTai . " - ". $ngay_di . "</br>";
                    if ($ngayHienTai >= $ngay_di) {
                        $mau = "blue";
                        $trang_thai = "Có thể đặt";
                    } else {
                        $mau = "red";
                        $trang_thai = "Không thể đặt";
                    }
                    // xử lý các th khác ở đây
                ?>
            <tr>
                <td><?php echo $value['ten']; ?></td>
                <td><?php echo $value['noi_di']; ?></td>
                <td><?php echo $value['noi_den']; ?></td>
                <td><?php echo $value['gia_tien']; ?></td>
                <td><?php echo $value['ngay_di']; ?></td>
                <td><?php echo $value['ngay_ve']; ?></td>
                <td bgcolor="<?php echo $mau; ?>"><?php echo $trang_thai; ?></td>
            </tr>
            <?php } ?>
        
        </tbody>
    </table>
     <!-- Form tìm kiếm -->
     <form action="" method="POST">
        Giá tiền: <input type="number" name="gia_tien"> <br>
        Ngày đi: <input type="datetime-local" name="ngay_can_di"> <br>
        Ngày đến: <input type="datetime-local" name="ngay_can_ve"> <br>
        <input type="submit" name="btnTim" value="Tìm kiếm">
    </form>
    <!-- Danh sách sau khi tìm -->
    <h2>Danh sách sau khi tìm</h2>
</body>
</html>

