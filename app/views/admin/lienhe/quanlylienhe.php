<?php 
    $html_dslienhe = showds_lienhe_admin($dslienhe);
?>
<div class="container mt-3">
    <h2>Liên Hệ</h2>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nội dung</th>
           <th>email</th>
           <th>Tên</th>
           <th>Trạng Thái</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
        <?=$html_dslienhe;?>
      </tbody>
    </table>
  </div>