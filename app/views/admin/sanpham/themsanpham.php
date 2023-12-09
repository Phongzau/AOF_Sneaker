<?php
    $html_dsdm =showds_danhmuc_admin($dsdm); 
?>
<div class="container mt-3">
    <h2> Thêm Sản phẩm</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_themsanpham" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="name">Tên sản phẩm:</label>
                        <input type="text" class="form-control" name="name" id="name" required placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="name">Ảnh:</label>
                        <input type="file" class="form-control" name="img" required style="width:28%" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Mô tả:</label>
                        <input type="text" class="form-control" name="mota" id="name" required placeholder="Mô tả sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="name">Giá:</label>
                        <input type="number" class="form-control" name="price" id="name" required placeholder="Giá sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="categories">Danh mục:</label>
                        <select required class="form-select" name="iddm" aria-label="Default select example">
                            <?=$html_dsdm;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="th_themsanpham" class="btn btn-primary">Thêm sản phẩm</button>
                    </div>
                </form>
            </div>
</div>