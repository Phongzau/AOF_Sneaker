<div class="container mt-3">
    <h2>Thêm Hóa Đơn</h2>   
    <div class="main-content">
    <form class="addPro" action="admin.php?ad=th_themdonhang" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Mã đơn hàng:</label>
                        <input type="text" class="form-control" name="madh" id="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">Người đật tên:</label>
                        <input type="text" class="form-control" name="nguoidat_ten" id="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">Email người đặt:</label>
                        <input type="text" class="form-control" name="nguoidat_email" id="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">SDT người đặt:</label>
                        <input type="text" class="form-control" name="nguoidat_tel" id="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">Địa chỉ người đặt:</label>
                        <input type="text" class="form-control" name="nguoidat_diachi" id="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">Tổng tiền:</label>
                        <input type="text" class="form-control" name="total" id="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">Voucher:</label>
                        <input type="text" class="form-control" name="voucher" id="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">Tổng Thành tiền:</label>
                        <input type="text" class="form-control" name="tongthanhtoan" id="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">PTTT:</label>
                        <input type="text" class="form-control" name="pttt" id="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">Trạng thái:</label>
                        <input type="text" class="form-control" name="trangthai" id="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="th_themdonhang" class="btn btn-primary">Thêm đơn hàng</button>
                    </div>
                </form>
            </div>
</div>