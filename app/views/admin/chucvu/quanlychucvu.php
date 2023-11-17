<?php
    $html_show_role = show_role_admin($dsrole);
?>
<div class="container mt-3">
    <h2>Chức vụ</h2>
    <div class="d-flex justify-content-end">
      <a href="index.php?ad=themchucvu" class="btn d-flex justify-content-end btn-primary mb-2">Thêm Chức vụ</a>
    </div>      
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Chức vụ</th>
          <th>Mô tả</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?=$html_show_role;?>
      </tbody>
    </table>
  </div>