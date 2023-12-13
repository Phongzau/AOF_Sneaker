<?php
    if (is_array($bl) && (count($bl) > 0)) {
        extract($bl);
    }
?>
<div class="container mt-3">
  <h2>Sửa Banner</h2>
  <div class="main-content">
    <form class="addPro" enctype="multipart/form-data" action="index.php?ad=th_suabanner" method="POST">
      <div class="form-group">
        <label for="name"> banner</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_name']) ? $errors['tb_error_name'] : '' ?></span>
        <input type="text" class="form-control" value="<?=($name != "")?$name:""?>" name="name" id="name"
          placeholder="tên banner">
      </div>
      <div class="form-group">
        <label for="name">ảnh</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_img']) ? $errors['tb_error_img'] : '' ?></span>
        <input type="file" class="form-control" name="img" id="name" placeholder="Mô tả chức vụ">
      </div>
      <div class="form-group">
        <label for="name">link</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_link']) ? $errors['tb_error_link'] : '' ?></span>
        <input type="text" class="form-control" value="<?=($link != "")?$link:""?>" name="link" id="name"
          placeholder="link">
        <input type="hidden" value="<?=($id_baner != "")?$id_baner:""?>" name="id">
      </div>
      <div class="form-group">
        <button type="submit" name="s_suabanner" class="btn btn-primary">sửa bannner</button>
      </div>
    </form>
  </div>
</div>