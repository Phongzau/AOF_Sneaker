function getSLSizeShoes() {
    // Lấy thẻ select
    var selectedSize = $("#sizeSelect").val();

    // Lấy giá trị ID sản phẩm từ thuộc tính data
    var productId = $("#sizeSelect").data("id");
    console.log("Giá trị: " + selectedSize, productId);

    $.ajax({
        type: 'POST',
        url: 'app/views/client/get_slsize.php',
        data: { 
             size: selectedSize,
             id_sp: productId
            },
        dataType: 'json',
        success: function (response) {
            console.log('Dữ liệu từ server:', response);

            if (response.error) {
                console.log('Lỗi từ server:', response.error);
                return;
            }
            var soluong = response.soluongsize.soluong;
            console.log('soluong:', soluong);

            // Cập nhật số lượng trong thẻ span
            $("#soLuongSize").text("Số Lượng: (" + soluong + ")");
            // Đặt giá trị max cho trường input
            $("#soluongInput").attr("max", soluong);
        },
        error: function (xhr, status, error) {
            console.log('Lỗi AJAX:', xhr, status, error);
        }
    });
}

