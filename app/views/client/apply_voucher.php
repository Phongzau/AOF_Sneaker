<?php
include "../../../app/models/pdo.php";
function select_voucher_client($voucher){
    $sql = "SELECT * FROM khuyenmai WHERE voucher=?";
    $result = pdo_query_one($sql,$voucher);
    return $result['giatri'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ ajax đẩy lên
    $voucher = $_POST['voucher'];
    $tongthanhtoan = $_POST['tongthanhtoan'];

    $giatrivoucher = select_voucher_client($voucher);
    $formattedPrice = number_format($giatrivoucher, 0, '.', '.');
    if ($giatrivoucher > 0) {
        $thanhtoan = $tongthanhtoan - $giatrivoucher;
        $formattedPriceTT = number_format($thanhtoan, 0, '.', '.');
        echo json_encode([
            'giatrivoucher' => $formattedPrice,
            'thanhtoan' => $formattedPriceTT
        ]);
    } else {
        // Mã voucher không hợp lệ
        echo json_encode([
            'giatrivoucher' => 0,
            'thanhtoan' => $tongthanhtoan
        ]);
    }
}
?>
