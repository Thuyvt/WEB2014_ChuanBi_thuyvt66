<?php
$a = 5;//là số nguyên
$b = 5.5;// là số thực
$c = "Fpoly"; // kiểu dữ liệu chuỗi  chữ
$d = true; // kiểu boolean

//echo $c.$a;
//
$mang = [5,6,7,8,9];
//for($i = 0;$i < count($mang); $i ++) {
//    if ($mang[$i] % 2 == 0 ) {
//        echo $mang[$i];
//    }
//}
//foreach ($mang as $key=>$value)
//{
//
//}
//khai báo mảng liên hợp
$manglh = ["A"=>5,"B"=>6,"C"=>7,"D"=>8];
//echo $manglh["D"];
//foreach ($manglh as $key=>$value) {
//    echo $value."</br>";
//}
$mangColor = [
                "red"=>"Màu đỏ",
                "blue"=>"Màu xanh",
                "pink"=>"Màu hồng"
            ];
$mangStudent = [
    ["ho_ten"=>"Nguyễn văn a","tuoi"=>18],
    ["ho_ten"=>"Nguyễn văn b","tuoi"=>25],
];
echo $mangStudent[0]['ho_ten'];
echo $mangStudent[1]['ho_ten'];
//dùng foreach duyệt hiển thị value ra

// hiển thị những phần tử trong mảng là số chẵn
//echo $mang[1];
//echo $mang[2];
//echo $mang[3];
//echo $mang[4];
?>
<table border="1">
    <tr>
        <?php foreach ($mangColor as $key=>$value){ ?>
        <td bgcolor="<?php echo $key;?>"><?php echo $value;?></td>
        <?php } ?>
    </tr>
</table>
<table border="1">
    <tr>
        <td>Họ tên</td>
        <td>Tuổi</td>
    </tr>
    <?php
        foreach ($mangStudent as $key => $value) {
    ?>
    <tr>
        <td><?php echo $value['ho_ten']; ?></td>
        <td><?php echo $value['tuoi']; ?></td>
    </tr>
    <?php
        }
    ?>
</table>
