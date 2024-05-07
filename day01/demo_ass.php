<?php
    $listPlane = [
      [
          'so_hieu_chuyen_bay' =>"MH370",
          'noi_di'=>"malaysia",
          'noi_den'=>"Bien den",
          'tong_hanh_khach'=>100,
          'thoi_gian_di'=> "2023-07-22 12:00:00",
          'thoi_gian_den'=> "2023-07-22 14:00:00"
      ],
      [
            'so_hieu_chuyen_bay' =>"MH371",
            'noi_di'=>"ha noi",
            'noi_den'=>"TPHCM",
            'tong_hanh_khach'=>100,
            'thoi_gian_di'=> "2023-07-22 15:00:00",
            'thoi_gian_den'=> "2023-07-22 17:00:00"
      ],
    ];
$ngaydi = "";
$ngayden = "";

 if (isset($_POST['search'])) {
     $ngaydi =  strtotime($_POST['ngay_di']); // strotime để đổi thời gian ra 1 số nguyên để so sánh
     $ngayden = strtotime($_POST['ngay_den']);
 }
?>
<form action="" method="POST">
    Ngay di<input type="datetime-local" name="ngay_di">
    Ngay den<input type="datetime-local" name="ngay_den">
    <input type="submit" name="search" value="Tim kiem">
</form>
<table border="1">
    <tr>
        <td>SHCB</td>
        <td>Noi di</td>
        <td>Noi den</td>
        <td>Tong hanh khach</td>
        <td>Thoi gian di</td>
        <td>Thoi gian den</td>
        <td>Trang thai</td>
    </tr>
    <?php foreach ($listPlane as $key => $value) {
        $mau = "";
        $trang_thai = "";
        //TH1 nếu thời gian đi và đến của người dùng nhập vào
        //< thời gian đi -> chưa bay và có màu xanh
        $thoi_gian_di = strtotime($value['thoi_gian_di']);
        $thoi_gian_den = strtotime($value['thoi_gian_den']);
            if ($ngaydi < $thoi_gian_di && $ngayden < $thoi_gian_di) {

                $mau = "blue";
                $trang_thai = "Chưa bay";
            }
            // xử lý các th khác ở đây
        ?>
    <tr bgcolor="<?php echo $mau; ?>">
        <td><?php echo $value['so_hieu_chuyen_bay']; ?></td>
        <td><?php echo $value['noi_di']; ?></td>
        <td><?php echo $value['noi_den']; ?></td>
        <td><?php echo $value['tong_hanh_khach']; ?></td>
        <td><?php echo $value['thoi_gian_di']; ?></td>
        <td><?php echo $value['thoi_gian_den']; ?></td>
        <td><?php echo $trang_thai; ?></td>
    </tr>
    <?php } ?>
</table>
