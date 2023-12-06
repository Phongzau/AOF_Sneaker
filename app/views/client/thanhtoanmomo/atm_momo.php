<?php
session_start(); // Bắt đầu phiên
header('Content-type: text/html; charset=utf-8');
print_r($_SESSION['giohang']);

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}


$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán Giày qua MoMo";
$amount = $_POST['tongthanhtoan'];
$orderId = time() ."";
$redirectUrl = "http://localhost/AOF_Sneaker/AOF_Sneaker/index.php?cl=confirmdh";
$ipnUrl = "http://localhost/AOF_Sneaker/AOF_Sneaker/index.php?cl=confirmdh";
$extraData = "";

include "../../../models/pdo.php";;
include "../../../models/donhang.php";
include "../../../models/bienthe.php";
$nguoidat_ten = $_POST['nguoidat_ten'];
$nguoidat_email = $_POST['nguoidat_email'];
$nguoidat_diachi = $_POST['nguoidat_diachi'];
$nguoidat_tel = $_POST['nguoidat_tel'];
$pttt = $_POST['pttt'];
$total = $_POST['total'];
$tongthanhtoan = $_POST['tongthanhtoan'];
if (isset($_POST['giatrivoucher'])) {
    $voucher = $_POST['giatrivoucher'];
} else {
    $voucher = 0;
}
$id_user = $_SESSION['s_user']['id_user'];
$madh = "AOF".$id_user."-".date("His-dmY");
$tongthanhtoan = $total - $voucher;
$id_dhct = dhct_insert_id($madh, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $total, $voucher, $tongthanhtoan, $pttt, $id_user);
foreach ($_SESSION['giohang'] as $sp) {
    extract($sp);
    date_default_timezone_set('Asia/Bangkok');
    $ngaydathang = date('H:i:s d/m/Y');
    donhang_insert($id_sp, $id_dhct, $name, $price, $soluong, $ngaydathang, $thanhtien, $size, $id_user);
    truSoLuongSize($soluong, $size, $id_sp);
}
unset($_SESSION['giohang']);

    $partnerCode = $partnerCode;
    $accessKey = $accessKey;
    $serectkey = $secretKey;
    $orderId = $orderId; // Mã đơn hàng
    $orderInfo = $orderInfo;
    $amount = $amount;
    $ipnUrl = $ipnUrl;
    $redirectUrl = $redirectUrl;
    $extraData = $extraData;

    $requestId = time() . "";
    $requestType = "payWithATM";
    $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $serectkey);
    $data = array('partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature);
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there

    header('Location: ' . $jsonResult['payUrl']);
?>