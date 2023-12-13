<?php
require_once 'pdo.php';

// /**
//  * Thêm loại mới
//  * @param String $ten_danhmuc là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
// function danhmuc_insert($ten_danhmuc){
//     $sql = "INSERT INTO danhmuc(ten_danhmuc) VALUES(?)";
//     pdo_execute($sql, $ten_danhmuc);
// }
// /**
//  * Cập nhật tên loại
//  * @param int $ma_danhmuc là mã loại cần cập nhật
//  * @param String $ten_danhmuc là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
function update_danhmuc_admin($tendm, $mota, $id_dm){
    $sql = "UPDATE danhmuc SET tendm=?, mota=? WHERE id_dm=?";
    pdo_execute($sql, $tendm, $mota, $id_dm);
}
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
function danhmuc_delete($ma_danhmuc){
    $sql = "DELETE FROM danhmuc WHERE id_dm=?";      
        pdo_execute($sql, $ma_danhmuc);
   
}
// /**
//  * Truy vấn tất cả các loại
//  * @return array mảng loại truy vấn được
//  * @throws PDOException lỗi truy vấn
//  */
function danhmuc_all(){
    $sql = "SELECT * FROM `danhmuc`";
    return pdo_query($sql);
}

function showdm ($dsdm){
    $html_dm='';
    $xd = "'Bạn có muốn xóa sản phẩm này không?'";  
    foreach ($dsdm as $dm) {
        extract($dm);
        $html_dm.=' <tr>
        <td>'.$id_dm.'</td>
        <td>'.$tendm.'</td>
        <td>'.$mota.'</td>
        <td>
        <a href="index.php?ad=updatedm&id='.$id_dm.'" class="btn btn-warning">
        <i class="fa-solid fa-pen-to-square"></i> Sửa</a>
        <a onclick="return confirm('.$xd.')" href="index.php?ad=deletedm&id='.$id_dm.'" class="btn btn-danger">
        <i class="fa-solid "></i> Xóa</a>
        </td>
      </tr>';
    }
    return $html_dm;
}

function insert_danhmuc_admin($tendm, $mota) {
    $sql = "INSERT INTO danhmuc(tendm, mota) VALUES(?,?)";
    pdo_execute($sql, $tendm, $mota);
}
// function get_name_dm($id){
//     $sql = "SELECT name from danhmuc where id=?";
//     return  pdo_query_value($sql,$id);
// }
// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_danhmuc là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
function select_dm_by_id_admin($id_dm){
    $sql = "SELECT * FROM danhmuc WHERE id_dm=?";
    return pdo_query_one($sql, $id_dm);
}
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_danhmuc là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_exist($ma_danhmuc){
//     $sql = "SELECT count(*) FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_value($sql, $ma_danhmuc) > 0;
// }
function showdm_all($dsdm){
    $html_dm='';
    foreach ($dsdm as $dm) {
        extract($dm);
        $html_dm.='<li><span><a href="index.php?cl=sanpham&id='.$id_dm.'">'.$tendm.'</a></span>
        </li>';
    }
    return $html_dm;
}