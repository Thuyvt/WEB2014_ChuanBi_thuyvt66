<?php
//Ham
// vấn đề
$n = 5;
//if ($n % 2 == 0) {
//    echo "Là số chẵn";
//} else {
//    echo "Là số lẻ";
//}
//$a = 6;
//hàm không trả về
function ktSoChan($n = 6) { //tất cả những gì trong khe ngoặc
    // được gọi là tham số
    if ($n % 2 == 0) {
        echo "Là số chẵn";
    } else {
        echo " là số lẻ";
    }
}
ktSoChan(8);
//demo hàm có trả về truyền vào 2 tham số
function tinhTong($a,$b) {
    return $a + $b;
}
//dấu hiệu nhận biết cứ có return là hàm có trả về không có return là
// hàm không trả về
$tong = tinhTong(8,9);
// xây dựng hàm tính số mũ vỡi 2 giá trị truyền vào là a và n
// hiển thị ra kết quả a^n
// ví dụ truyền 2,3 và hàm thì sẽ ra kết quả 2^3 = 8 ;

?>
