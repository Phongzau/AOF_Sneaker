<?php
function select_voucher_admin(){
    $sql = "SELECT * FROM khuyenmai";
    return pdo_query($sql,);
}

function select_voucher_client($voucher){
    $sql = "SELECT * FROM khuyenmai WHERE voucher=?";
    $result = pdo_query_one($sql,$voucher);
    return $result['giatri'];
}

function delete_voucher_admin($id_voucher) {
    $sql = "DELETE FROM `khuyenmai` WHERE id_voucher = ?";
    pdo_execute($sql, $id_voucher);
}

function update_voucher_admin($voucher, $mota, $giatri, $id_voucher){
    $sql = "UPDATE khuyenmai SET voucher=?, mota=?, giatri=? WHERE id_voucher=?";
    pdo_execute($sql, $voucher, $mota, $giatri, $id_voucher);
}

function select_voucher_by_id_admin($id_voucher){
    $sql = "SELECT * FROM khuyenmai WHERE id_voucher=?";
    return pdo_query_one($sql, $id_voucher);
}

function insert_khuyenmai_admin($voucher, $mota, $giatri) {
    $sql = "INSERT INTO khuyenmai(voucher, mota, giatri) VALUES(?,?,?)";
    pdo_execute($sql, $voucher, $mota, $giatri);
}

function showds_voucher_admin($dsvoucher){
    $html_dsvoucher ='';
    foreach ($dsvoucher as $voucher) {
     extract($voucher);
     $html_dsvoucher.= '<tr>
                            <td>'.$id_voucher.'</td>
                            <td>'.$voucher.'</td>
                            <td>'.$mota.'</td>
                            <td>'.$giatri.'</td>
                            <td>
                            <a href="index.php?ad=updatevoucher&id='.$id_voucher.'" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                            <a href="index.php?ad=deletevoucher&id='.$id_voucher.'" class="btn btn-danger">
                            <i class="fa-solid "></i> Xóa</a>
                            </td>
                        </tr>';
    }
    return $html_dsvoucher;
}
?>
