<?php
require_once 'pdo.php';

// function binhluan_insert($iduser,$idpro, $noidung, $ngaybl,$hoten){
//     $sql = "INSERT INTO binhluan(iduser,idpro,noidung,ngaybl,hoten) VALUES (?,?,?,?,?)";
//     pdo_execute($sql,$iduser, $idpro, $noidung, $ngaybl,$hoten);
// }

// function binhluan_update($ma_bl, $ma_kh, $ma_hh, $noi_dung, $ngay_bl){
//     $sql = "UPDATE binhluan SET ma_kh=?,ma_hh=?,noi_dung=?,ngay_bl=? WHERE ma_bl=?";
//     pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl);
// }

function delete_binhluan_admin($id_bl){
    $sql = "DELETE FROM binhluan WHERE id_bl=?";
        pdo_execute($sql, $id_bl);
}

function select_all_binhluan_admin(){
    $sql = "SELECT * FROM binhluan";
    return pdo_query($sql);
}

// function binhluan_select_by_id($ma_bl){
//     $sql = "SELECT * FROM binhluan WHERE ma_bl=?";
//     return pdo_query_one($sql, $ma_bl);
// }

// function binhluan_exist($ma_bl){
//     $sql = "SELECT count(*) FROM binhluan WHERE ma_bl=?";
//     return pdo_query_value($sql, $ma_bl) > 0;
// }
//-------------------------------//
// function binhluan_select_by_hang_hoa($ma_hh){
//     $sql = "SELECT b.*, h.ten_hh FROM binhluan b JOIN hang_hoa h ON h.ma_hh=b.ma_hh WHERE b.ma_hh=? ORDER BY ngay_bl DESC";
//     return pdo_query($sql, $ma_hh);
// }

function showds_binhluan_admin($dsbinhluan) {
    $html_dsbinhluan = '';
    foreach ($dsbinhluan as $bl) {
        extract($bl);
        $html_dsbinhluan.='<tr>
                            <td>'.$id_bl.'</td>
                            <td>'.$id_sanpham.'</td>
                            <td>'.$id_user.'</td>
                            <td>'.$hoten.'</td>
                            <td>'.$noidung.'</td>
                            <td>'.$ngaybl.'</td>
                            <td>
                            <a href="index.php?ad=deletebl&id='.$id_bl.'" class="btn btn-danger">
                            <i class="fa-solid "></i> Xóa</a>
                            </td>
                           </tr>';

    }
    return $html_dsbinhluan;
}