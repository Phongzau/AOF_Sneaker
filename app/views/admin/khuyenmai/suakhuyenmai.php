<?php
    if (is_array($voucher) && (count($voucher))>0) {
        extract($voucher);
    }
?>
<div class="container mt-3">
    <h2>Sửa Khuyến mãi</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_suakhuyenmai" method="POST">
                    <div class="form-group">
                        <input type="text" hidden class="form-control" value="<?=$id_voucher?>" name="id_voucher" id="name" placeholder="Nhập tên voucher">
                    </div>
                    <div class="form-group">
                        <label for="name">Voucher:</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_voucher']) ? $errors['tb_error_voucher'] : '' ?></span>
                        <input type="text" class="form-control" value="<?=($voucher != "")?$voucher:""?>" name="voucher" id="name" placeholder="Nhập tên voucher">
                    </div>
                    <div class="form-group">
                        <label for="name">Mô tả:</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_mota']) ? $errors['tb_error_mota'] : '' ?></span>
                        <input type="text" class="form-control" value="<?=($mota != "")?$mota:""?>" name="mota" id="name" placeholder="Nhập nội dung mô tả">
                    </div>
                    <div class="form-group">
                        <label for="name">Giá trị:</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_giatri']) ? $errors['tb_error_giatri'] : '' ?></span>
                        <input type="text" class="form-control" value="<?=($giatri != "")?$giatri:""?>" name="giatri" id="name" placeholder="Nhập giá trị voucher">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="th_suakhuyenmai" class="btn btn-primary">Sửa khuyến mãi</button>
                    </div>
                </form>
            </div>
</div>