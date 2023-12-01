function applyVoucher() {
    // Lấy mã voucher từ input
    var voucherCode = $('#voucherCode').val();
    var tongThanhToan = $('#tongThanhToan').val();
    // Gửi mã voucher thông qua AJAX
    console.log(voucherCode);
    console.log(tongThanhToan);
    $.ajax({
        type: 'POST',
        url: 'app/views/client/apply_voucher.php',
        data: {
            voucher: voucherCode,
            tongthanhtoan: tongThanhToan 
        },
        dataType: 'json',
            success: function(response) {
                console.log('Dữ liệu từ server:', response);
            // Cập nhật giảm giá và tổng thanh toán
            $('#giatrivoucher').val(response.giatrivoucher);
            $('#thanhtoan').val(response.thanhtoan);

            // Hiển thị giảm giá mới và tổng thanh toán mới
            $('#discountAmount').html('$' + response.giatrivoucher);
            $('#totalAmount').html('$' + response.thanhtoan);

            // Thay đổi giá trị các trường input trong form trước khi submit
            $('input[name="giatrivoucher"]').val(response.giatrivoucher);
            $('input[name="tongthanhtoan"]').val(response.thanhtoan);
        },
        error: function(error) {
            console.log('Lỗi AJAX:', error);
        }
    });
}