<?php 
$html_dh =  show_dh_admin($dh);
?>
<div class="container mt-3">
    <h2>Đơn hàng</h2>            
    <table class="table table-hover">
      <thead>
        <tr>
            <th>ID</th>
            <th>id sản phẩm</th>
            <th>mã đơn hàng chi tiết</th>
            <th>tên sản phẩm</th>
            <th>price</th>
            <th>tổng </th>
            <th>soluong</th>
            <th>ngày đặt hàng</th>
            <th>size</th>
            <th>id_user</th>
            <th>Chức năng</th>
    
        </tr>
      </thead>
      <tbody>
        <?=$html_dh?>
      </tbody>
    </table>
  </div>