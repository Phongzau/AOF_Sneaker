<?php 
 $html_showhasp = show_hasp_admin($dsha);
?>
 <div class="content-wrapper">
<div class="container mt-3">
    <h2>Biến Thể</h2>
                 
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>ID sản phẩm</th>
          <th>Ảnh</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
        <?=$html_showhasp?>
      </tbody>
    </table>
  </div>