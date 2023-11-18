<?php
    $html_dsbinhluan = showds_binhluan_admin($dsbinhluan);
?>
<div class="container mt-3">
    <h2>Bình luận</h2>           
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>ID Sản Phẩm</th>
          <th>ID User</th>
          <th>Họ tên</th>
          <th>Nội dung</th>
          <th>Ngày bình luận</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
        <?=$html_dsbinhluan?>
      </tbody>
    </table>
  </div>