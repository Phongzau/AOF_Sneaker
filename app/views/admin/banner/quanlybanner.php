<?php
    $html_show_banner = showds_banner_admin($dsbanner);
?>
<div class="container mt-3">
  <h2>Quản lý Banner</h2>
  <div class="d-flex justify-content-end">
    <a href="index.php?ad=thembanner" class="btn d-flex justify-content-end btn-primary mb-2">Thêm Banner</a>
  </div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên Banner</th>
        <th>Link Banner</th>
        <th>Ảnh Banner</th>
        <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?=$html_show_banner;?>
    </tbody>
  </table>
</div>