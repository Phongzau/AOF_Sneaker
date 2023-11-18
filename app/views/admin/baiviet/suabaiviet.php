<?php
    if (is_array($idbv) && (count($idbv) > 0)) {
        extract($idbv);
        $imgpath = IMG_PATH_ADMIN.$img;
        if (is_file($imgpath)) {
            $img = '<img src="'.$imgpath.'" width="80px">';
        } else {
            $img = '';
        } 
    }
?>
<div class="container mt-3">
    <h2>Sửa Bài Viết</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_suabaiviet" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <input type="text" hidden  class="form-control" value="<?=$id_baiviet?>" name="id_baiviet" id="name" placeholder="Nhập tên sản phẩm">
                    </div>    
                    <div class="form-group">    
                        <label for="name">Nội dung:</label>
                        <input type="text" class="form-control" value="<?=($noidung != "")?$noidung:""?>" name="noidung" id="name" placeholder="Nhập nội dung bài viết">
                    </div>
                    <div class="form-group">
                        <label for="name">Ảnh:</label>
                        <input type="file" class="form-control" name="img" style="width:28%" id="name">
                        <br>
                        <?=$img?>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="th_suabaiviet" class="btn btn-primary">Sửa bài viết</button>
                    </div>
                </form>
            </div>
</div>