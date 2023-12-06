<?php 
$html_dh =  show_dhct_admin($dh);
?>
<div class="container mt-3">
    <h2>Đơn hàng</h2>    
    <h4 style="color: red; "> <?php if(isset($tb)){
        echo $tb;
    }   
      ?></h3>
    <table class="table table-hover">
      <thead>
        <tr>
            <th>ID</th>
            <th>Mã đơn hàng</th>
            <th>Tên Người Đặt</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Total</th>
            <th>Voucher</th>
            <th>Tổng Thanh Toán</th>
            <th>PT Thanh Toán</th>
            <th>Id Người Đặt</th>
            <th>Trạng Thái</th>
            <th>Thao Tác</th>
            <th>Cập Nhật Trạng Thái</th>

        </tr>
      </thead>
      <tbody>
        <?=$html_dh?>
      </tbody>
    </table>
  </div>