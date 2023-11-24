<?php
    if (is_array($product) && count($product) > 0) {
        extract($product);
    }
?>

<div class="container mt-3">
    <h2>Thêm Biến thể</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_thembienthe" method="POST">
                    <div class="form-group">
                        <input type="text" hidden class="form-control" value="<?=$id?>" name="id_sp" id="name" >
                    </div>
                    <div class="form-group">
                        <label for="name">Tên sản phẩm:</label>
                        <input type="text" value="<?=$name?>" class="form-control" id="name" >
                    </div>
                    <div class="form-group">
                        <label for="name">Size:</label>
                        <input type="text" class="form-control" name="dungluong" id="name" >
                    </div>
                    <div class="form-group">
                        <label for="name">Số lượng:</label>
                        <input type="text" class="form-control" name="soluong" id="name" >
                    </div>
                    <div class="form-group">
                        <button type="submit" name="s_thembienthe" class="btn btn-primary">Thêm Biến Thể</button>
                    </div>
                </form>
            </div>
</div>