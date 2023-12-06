<?php
$html_dsbienthe = showds_bienthe_admin($dsbienthe);
?>
<div class="container mt-3">
    <h2>Biến Thể</h2>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Id Sản phẩm</th>
          <th>Size</th>
          <th>Số lượng</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
        <?=$html_dsbienthe?>
      </tbody>
    </table>
  </div>