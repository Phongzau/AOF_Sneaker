<div class="container mt-3">
  <h2>Thêm Banner</h2>
  <div class="main-content">
    <form class="addPro" enctype="multipart/form-data" action="index.php?ad=th_thembanner" method="POST">
      <div class="form-group">
        <label for="name">tên banner</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="tên banner">
      </div>
      <div class="form-group">
        <label for="name">ảnh</label>
        <input type="file" class="form-control" name="img" id="name" placeholder="Mô tả chức vụ">
      </div>
      <div class="form-group">
        <label for="name">link</label>
        <input type="text" class="form-control" name="link" id="name" placeholder="link">
      </div>
      <div class="form-group">
        <button type="submit" name="s_thembanner" class="btn btn-primary">Thêm bannner</button>
      </div>
    </form>
  </div>
</div>