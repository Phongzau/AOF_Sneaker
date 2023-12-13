<div class="container mt-3">
    <h2>Thêm Khuyến mãi</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_themkhuyenmai" method="POST">
                    <div class="form-group">
                        <label for="name">Voucher:</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_voucher']) ? $errors['tb_error_voucher'] : '' ?></span>
                        <input type="text" class="form-control" name="voucher" id="name" placeholder="Nhập tên voucher">
                    </div>
                    <div class="form-group">
                        <label for="name">Mô tả:</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_mota']) ? $errors['tb_error_mota'] : '' ?></span>
                        <input type="text" class="form-control" name="mota" id="name" placeholder="Nhập nội dung mô tả">
                    </div>
                    <div class="form-group">
                        <label for="name">Giá trị:</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_giatri']) ? $errors['tb_error_giatri'] : '' ?></span>
                        <input type="text" class="form-control" name="giatri" id="name" placeholder="Nhập giá trị voucher">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="th_themkhuyenmai" class="btn btn-primary">Thêm khuyến mãi</button>
                    </div>
                </form>
            </div>
</div>