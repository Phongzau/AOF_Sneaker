<?php
    $html_dsdm =showds_danhmuc_admin($dm); 
?>
<div class="container mt-3">
    <h2> Thêm Sản phẩm</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=tb_themsanpham" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="name">Tên sản phẩm:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="name">Ảnh:</label>
                        <input type="file" class="form-control" name="img" style="width:28%" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Mô tả:</label>
                        <input type="text" class="form-control" name="mota" id="name" placeholder="Mô tả sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="name">Giá:</label>
                        <input type="text" class="form-control" name="price" id="name" placeholder="Mô tả sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="categories">Danh mục:</label>
                        <select class="form-select" name="iddm" aria-label="Default select example">
                            <option value="">Chọn Danh mục</option>
                            <?=$html_dsdm;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="s_themsanpham" class="btn btn-primary">Thêm sản phẩm</button>
                    </div>
                </form>
            </div>
</div>