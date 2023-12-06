<?php
    if (is_array($iddanhmuc) && count($iddanhmuc) > 0) {
        extract($iddanhmuc);
    } 
?>
<div class="content-wrapper">
<div class="container mt-3">
    <h2>Sửa Danh mục</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_suadanhmuc" method="POST">
                    <div class="form-group">
                        <input type="text" hidden class="form-control" value="<?=$id_dm?>" name="id_dm" id="name" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="name">Tên danh mục:</label>
                        <input type="text" class="form-control" value="<?=($tendm != "")?$tendm:""?>" name="tendm" id="name" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="name">Mô tả:</label>
                        <input type="text" class="form-control" value="<?=($mota != "")?$mota:""?>" name="mota" id="name" placeholder="Nhập mô tả sản phẩm">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="th_suadanhmuc" class="btn btn-primary">Sửa danh mục</button>
                    </div>
                </form>
            </div>
</div>