<?php
    if (is_array($iduser) && (count($iduser) > 0)) {
        extract($iduser);
    }
    $html_dsrole = showds_role_admin($dsrole);
?>

<div class="container mt-3">
    <h2>Sửa Thông tin người dùng</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_suanguoidung" enctype="multipart/form-data" method="POST" >
                    <div class="form-group">
                        <input type="text" hidden class="form-control" value="<?=$id_user?>" name="id_user" id="name" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="name">Username:</label>
                        <input type="text" class="form-control" value="<?=($username != "")?$username:""?>" name="username" id="name" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="text" class="form-control" value="<?=($password != "")?$password:""?>" name="password"  id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">User_name:</label>
                        <input type="text" class="form-control" value="<?=($user_name != "")?$user_name:""?>" name="user_name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Ảnh:</label>
                        <input type="file" class="form-control" name="img" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Địa chỉ:</label>
                        <input type="text" class="form-control" value="<?=($diachi != "")?$diachi:""?>" name="diachi" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="text" class="form-control" value="<?=($email != "")?$email:""?>" name="email" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Điện thoại:</label>
                        <input type="text" class="form-control" value="<?=($dienthoai != "")?$dienthoai:""?>" name="dienthoai" id="name">
                    </div>
                    <div class="form-group">
                        <label for="categories">Chức vụ:</label>
                        <select class="form-select" name="id_role" aria-label="Default select example">
                            <option value="<?=$idrole?>"><?=$chuc_vu?></option>
                            <?=$html_dsrole;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="th_suanguoidung" class="btn btn-primary">Sửa người dùng</button>
                    </div>
                </form>
            </div>
</div>