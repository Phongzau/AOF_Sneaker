<?php
$html_dsdm = '';
    if (is_array($sp_edit) && (count($sp_edit) > 0)) {
        extract($sp_edit);
      
    }
    $html_dsdm .=showds_danhmuc_admin($dm);
   
?>
<div class="content-wrapper">
<div class="container mt-3">
    <h2>Sửa Thông tin người dùng</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_suasanpham" enctype="multipart/form-data" method="POST" >
                    <div class="form-group">
                        <input type="text"  class="form-control" value="<?=$id_sp?>" name="id_sp" id="name" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="name">Tên Sản phẩm</label>
                        <input type="text" class="form-control"  value="<?=($name != "")?$name:""?>" name="name" id="name" required placeholder="Nhập tên sản phẩm">
                    </div>
                  <input type="hidden" name="imgcu" value="<?=($img != "")?$img:""?>" src="" alt="">

                    <div class="form-group">
                        <label for="name">Ảnh:</label>
                        <input type="file" class="form-control" name="img" id="name">
                    </div>
            
                    <div class="form-group">
                        <label for="name">price</label>
                        <input type="text" class="form-control" value="<?=($price != "")?$price:""?>" name="price" id="name">
                    </div>
              
                    <div class="form-group">
                        <label for="name">Mô Tả:</label>
                        <input type="text" class="form-control" value="<?=($mota != "")?$mota:""?>" name="mota" id="name">
                    </div>

             
                    <div class="form-group">
                        <label for="categories">Danh mục:</label>
                        <select class="form-select" name="iddm" aria-label="Default select example">
                            <option value="<?=$iddm?>"><?=$tendm?></option>
                            <?=$html_dsdm;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="suasanpham" class="btn btn-primary">Sửa Sản Phẩm</button>
                    </div>
                </form>
            </div>
</div>