<?php
include "../../../app/models/pdo.php";
function select_slShoesSize($size, $id_sp) {
    $sql = "SELECT soluong FROM bienthesanpham WHERE dungluong=? AND id_sanpham=?";
    return pdo_query_one($sql, $size, $id_sp);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ ajax đẩy lên
    $size = $_POST['size'];
    $id_sp = $_POST['id_sp'];
    $soluongsize = select_slShoesSize($size, $id_sp);
        echo json_encode([
            'soluongsize' => $soluongsize,
        ]);
}
?>
