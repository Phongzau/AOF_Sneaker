<?php 
$html_dh =  show_dhct_admin($dh);
?>
<div class="container mt-3">
    <h2>Đơn hàng</h2>       
      
    <table class="table table-hover">
      <thead>
        <tr>
            <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Tên Người Đặt</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Total</th>
            <th>Voucher</th>
            <th>Tổng Thanh Toán</th>
            <th>PT Thanh Toán</th>
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