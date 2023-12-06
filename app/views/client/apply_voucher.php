<?php
function pdo_get_connection(){
    $dburl = "mysql:host=localhost;dbname=csdlg;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

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
