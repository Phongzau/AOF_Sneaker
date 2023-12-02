<?php 
$html_sp = show_sp_admin($sp)
?>
<div class="container mt-3">
    <h2>Sản Phẩm</h2>
    <div class="d-flex justify-content-end">
      <a href="index.php?ad=themsanpham" class="btn d-flex justify-content-end btn-primary mb-2">Thêm Sản Phẩm</a>
    </div>                  
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Img</th>
          <th>Price</th>
          <th>View</th>
          <th>Iddm</th>
          <th>Tình trạng</th>
          <th>Biến Thể</th>
          <th>Hình ảnh</th>
          <th >Chức năng</th>
        </tr>
      </thead>
      <tbody>
        <?=$html_sp?>
      </tbody>
    </table>
  </div>