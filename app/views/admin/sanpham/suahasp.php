<?php 
    if (is_array($ha) && (count($ha) > 0)) {
        extract($ha);
        $imgpath = IMG_PATH_ADMIN.$img;
        if (is_file($imgpath)) {
            $img = '<img src="'.$imgpath.'" width="80px">';
        } else {
            $img = '';
        } 
    }
    ?>

<div class="container mt-3">
    <h2>Sửa hình ảnh sản phẩm</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_suahasp" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <input type="text" hidden class="form-control" value="<?=$id_ha?>" name="id_ha" id="name" >
                        <input type="text" hidden class="form-control" value="<?=$id_sanpham?>" name="id_sanpham" id="name" >
                    </div>
                    <div class="form-group">
                        <label for="name">Ảnh:</label>
                        <input type="file" class="form-control" name="img" id="name" > <br> 
                        <?=$img?>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="th_suahasp" class="btn btn-primary">Sửa Biến Thể</button>
                    </div>
                </form>
            </div>
</div>