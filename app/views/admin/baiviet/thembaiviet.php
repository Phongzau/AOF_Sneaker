<div class="container mt-3">
    <h2>Thêm Bài Viết</h2>   
    <div class="main-content">
                <form class="addPro" action="index.php?ad=th_thembaiviet" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="name">Nội dung:</label>
                        <input type="text" class="form-control" name="noidung" id="name" placeholder="Nhập nội dung bài viết">
                    </div>
                    <div class="form-group">
                        <label for="name">Ảnh:</label>
                        <input type="file" class="form-control" name="img" style="width:28%" id="name">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="th_thembaiviet" class="btn btn-primary">Thêm bài viết</button>
                    </div>
                </form>
            </div>
</div>