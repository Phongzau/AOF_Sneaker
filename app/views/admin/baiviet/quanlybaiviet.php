<?php
    $html_dsbaiviet = showds_baiviet_admin($dsbaiviet);
?>
<div class="container mt-3">
    <h2>Bài viết</h2>
    <div class="d-flex justify-content-end">
      <a href="index.php?ad=thembaiviet" class="btn d-flex justify-content-end btn-primary mb-2">Thêm Bài Viết</a>
    </div>        
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nội Dung</th>
          <th>Ảnh</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
        <?=$html_dsbaiviet;?>
      </tbody>
    </table>
  </div>