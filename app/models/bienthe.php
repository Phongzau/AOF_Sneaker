<?php 

function bienthe_insert($id_sanpham, $mau, $dungluong, $soluong){
    $sql = "INSERT INTO bienthesanpham (id_sanpham, mau, dungluong, soluong) VALUES (?,?,?,?)";
    pdo_execute($sql, $id_sanpham, $mau, $dungluong, $soluong);
}

function  select_bthe_id($id){
    $sql = "SELECT * from bienthesanpham INNER JOIN sanpham 
    on sanpham.id_sp = bienthesanpham.id_sanpham   WHERE id_sanpham=?";
      return pdo_query($sql,$id);
    }

    function show_bt_admin($dssp){
        $html_dssp ='';
        foreach ($dssp as $sp) {
         extract($sp);
         $html_dssp.='<div class="box25 mr15">
         <tr>
         <td>'.$id_sanpham.'</td>
         <td>'.$name.'</td>
         <td>'.$mau.'</td>
         <td>'.$dungluong.'</td>
         <td>'.$soluong.'</td>
         <td>
         <a href="index.php?ad=suabt&id='.$id_bt.'&idsp='.$id_sanpham.'" class="btn btn-warning">
         <i class="fa-solid fa-pen-to-square"></i>Sửa</a>
         <a href="index.php?ad=deletebt&id='.$id_bt.'" class="btn btn-danger">
         <i class="fa-solid "></i>Xóa</a>
         </td>
       </tr>
       <tr>';
        }
        return $html_dssp;
    }

    function bt_delete($id){
        $sql = "DELETE FROM bienthesanpham WHERE  id_bt=?";
            pdo_execute($sql, $id);
        
    }

    function  get_bienthe_id($id){
        $sql = "SELECT * from bienthesanpham WHERE id_bt=?";
          return pdo_query_one($sql,$id);
        }

        function bienthe_update($id_bt,$id_sp, $mau, $dungluong, $soluong ){
            $sql = "UPDATE bienthesanpham SET id_bt=?, id_sanpham =? , mau=?,dungluong=?,soluong=? WHERE id_bt=$id_bt";
            pdo_execute($sql,$id_bt,$id_sp, $mau, $dungluong, $soluong);
        }

?>

