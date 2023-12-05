<?php
function pdo_get_connection(){
    $dburl = "mysql:host=localhost;dbname=hello;charset=utf8";
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
