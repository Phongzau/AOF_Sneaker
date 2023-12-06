<?php
    if (is_array($idrole) && (count($idrole) > 0)) {
        extract($idrole);
    }
?>

<div class="container mt-3">
    <h2>Sửa chức vụ</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_suachucvu" method="POST">
                    <div class="form-group">
                        <label for="name">Tên chức vụ</label>
                        <input type="text" class="form-control" name="chuc_vu" value="<?=($chuc_vu != "")?$chuc_vu:""?>" id="name" placeholder="Nhập tên chức vụ">
                    </div>
                    <div class="form-group">
                        <label for="name">Mô tả:</label>
                        <input type="text" class="form-control" name="mota" value="<?=($mota != "")?$mota:""?>" id="name" placeholder="Mô tả chức vụ">
                    </div>
                    <div class="form-group">
                        <input type="text" hidden class="form-control" name="id_role" value="<?=$id_role?>" id="name" placeholder="Mô tả chức vụ">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="th_suachucvu" class="btn btn-primary">Sửa chức vụ</button>
                    </div>
                </form>
            </div>
</div>