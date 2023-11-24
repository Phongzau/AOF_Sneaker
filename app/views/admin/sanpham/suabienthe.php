<?php 
    if (is_array($bt_edit ) && (count($bt_edit ) > 0)) {
        extract($bt_edit );
      
    }
    ?>

<div class="container mt-3">
    <h2>Sửa biến Thể</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_suabienthe" method="POST">
                    <div class="form-group">
                        <label for="name">ID Biến Thể:</label>
                        <input type="text" hidden class="form-control" value="<?=$id_bt?>" name="id_bt" id="name" >
                    
                    </div>
                    <input type="text" hidden  class="form-control" value="<?=$id_sanpham?>" name="id_sp" id="name" >
                    <div class="form-group">
                        <label for="name">Size:</label>
                        <input type="text" class="form-control" name="dungluong"  value="<?=($dungluong != "")?$dungluong:""?>" id="name" >
                    </div>
                    <div class="form-group">
                        <label for="name">Số lượng:</label>
                        <input type="text" class="form-control" name="soluong" value="<?=($soluong != "")?$soluong:""?>" id="name" >
                    </div>
                    <div class="form-group">
                        <button type="submit" name="s_suabienthe" class="btn btn-primary">Sửa Biến Thể</button>
                    </div>
                </form>
            </div>
</div>