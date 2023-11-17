<?php 
$html_dm = showdm ($dm);
?>
<div class="container mt-3">
    <h2>Danh mục</h2>
    <div class="d-flex justify-content-end">
      <a hrefs="index.php?ad=themdanhmuc" class="btn d-flex justify-content-end btn-primary mb-2">Thêm Danh Mục</a>
    </div>      
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Mô tả</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
        <?=$html_dm?>
      </tbody>
    </table>
  </div>