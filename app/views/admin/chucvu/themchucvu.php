<div class="container mt-3">
    <h2>Thêm Chức vụ</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_themchucvu" method="POST">
                    <div class="form-group">
                        <label for="name">Tên chức vụ</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_chuc_vu']) ? $errors['tb_error_chuc_vu'] : '' ?></span>
                        <input type="text" class="form-control" name="chuc_vu" id="name" placeholder="Nhập tên chức vụ">
                    </div>
                    <div class="form-group">
                        <label for="name">Mô tả:</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_mota']) ? $errors['tb_error_mota'] : '' ?></span>
                        <input type="text" class="form-control" name="mota" id="name" placeholder="Mô tả chức vụ">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="th_themchucvu" class="btn btn-primary">Thêm chức vụ</button>
                    </div>
                </form>
            </div>
</div>