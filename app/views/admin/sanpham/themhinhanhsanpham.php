<?php
    if (is_array($product) && count($product) > 0) {
        extract($product);
    }
?>
<div class="content-wrapper">
<div class="container mt-3">
    <h2>Thêm ảnh sản phẩm</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_themanhsp" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <input type="text"  class="form-control" value="<?=$id_sp?>" name="id_sanpham" id="name" >
                    </div>
                    <div class="form-group">
                        <label for="img">Ảnh:</label>
                        <input type="file" class="form-control" name="img" id="name" >
                    </div>
                    <div class="form-group">
                       
                        <button type="submit" name="th_themanhsp" class="btn btn-primary">Thêm ảnh sản phẩm</button>
                    </div>
                </form>
            </div>
</div>