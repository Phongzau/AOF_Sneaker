<?php
    $html_dsvoucher = showds_voucher_admin($dsvoucher);
?>
<div class="container mt-3">
    <?php
      if (isset($tb_tckm)) {
        echo $tb_tckm;
      } else if (isset($tb_tctkm)) {
        echo $tb_tctkm;
      }
    ?>
    <h2>Khuyến mãi</h2>
    <div class="d-flex justify-content-end">
      <a href="index.php?ad=themkhuyenmai" class="btn d-flex justify-content-end btn-primary mb-2">Thêm Khuyến Mãi</a>
    </div>                  
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Voucher</th>
          <th>Mô tả</th>
          <th>Giá trị</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
        <?=$html_dsvoucher?>
      </tbody>
    </table>
  </div>