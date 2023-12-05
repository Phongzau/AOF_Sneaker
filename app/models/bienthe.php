<?php 

function bienthe_insert($id_sanpham,  $dungluong, $soluong){
    $sql = "INSERT INTO bienthesanpham (id_sanpham,  dungluong, soluong) VALUES (?,?,?)";
    pdo_execute($sql, $id_sanpham,  $dungluong, $soluong);
}

function select_bienthe_admin() {
    $sql = "SELECT * FROM bienthesanpham";
    return pdo_query($sql,);
    
}
function  select_bthe_id($id){
    $sql = "SELECT * from bienthesanpham INNER JOIN sanpham 
    on sanpham.id_sp = bienthesanpham.id_sanpham   WHERE id_sanpham=?";
      return pdo_query($sql,$id);
    }

      function tinhtongsl($dssp){
        $tongsl = 0;
        foreach ($dssp as $sp) {
         extract($sp);
         $tongsl = $tongsl + $soluong;
        }
        return $tongsl;
    }


    function show_bt_admin($dssp){
        $html_dssp ='';
        foreach ($dssp as $sp) {
         extract($sp);
         $html_dssp.='<div class="box25 mr15">
         <tr>
         <td>'.$id_sanpham.'</td>
         <td>'.$name.'</td>
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

        function bienthe_update($id_bt,$id_sp, $dungluong, $soluong ){
            $sql = "UPDATE bienthesanpham SET id_bt=?, id_sanpham =? ,dungluong=?,soluong=? WHERE id_bt=$id_bt";
            pdo_execute($sql,$id_bt,$id_sp,  $dungluong, $soluong);
        }

  function showds_bienthe_admin($dsbienthe){
    $html_dssp ='';
    foreach ($dsbienthe as $bienthe) {
      extract($bienthe);
      $html_dssp.='<div class="box25 mr15">
      <tr>
      <td>'.$id_bt.'</td>
      <td>'.$id_sanpham.'</td>
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

function select_bienthe_by_id($id) {
  $sql = "SELECT * FROM bienthesanpham WHERE id_sanpham=?";
  return pdo_query($sql, $id);
}

function option_color_bienthe_sanpham($sp) {
  $html_optioncolorbienthesp = '';
  foreach($sp as $sanpham) {
    extract($sanpham);
    $html_optioncolorbienthesp.='<option value="'.$mau.'">'.$mau.'</option>';
  } return $html_optioncolorbienthesp;
}

function option_size_bienthe_sanpham($sp) {
  $html_optionsizebienthesp = '<option value="hidden">--Chọn Size--</option>';
  foreach($sp as $sanpham) {
    extract($sanpham);
    $html_optionsizebienthesp.='<option value="'.$dungluong.'">'.$dungluong.'</option>';
  } return $html_optionsizebienthesp;
}

function truSoLuongSize($soluong, $size, $id_sp) {
  $sql = "UPDATE bienthesanpham SET soluong = soluong - ? WHERE dungluong =? AND id_sanpham=?";
  pdo_execute($sql, $soluong, $size, $id_sp);
}

function congSoLuongSize($soluong, $size, $id_sanpham) {
  $sql = "UPDATE bienthesanpham SET soluong = soluong + ? WHERE dungluong =? AND id_sanpham=?";
  pdo_execute($sql, $soluong, $size, $id_sanpham);
}
?>

