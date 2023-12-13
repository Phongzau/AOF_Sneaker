function validateForm() {
    var hoTen = document.getElementById('hoTen').value;
    var email = document.getElementById('email').value;
    var sdt = document.getElementById('sdt').value;
    var diaChi = document.getElementById('diaChi').value;
    var pttt = document.querySelector('input[name="pttt"]:checked');

    // Kiểm tra xem các trường bắt buộc đã được điền chưa
    if (hoTen === '' || email === '' || sdt === '' || diaChi === '') {
        alert('Vui lòng điền đầy đủ thông tin.');
        return false; // Ngăn chặn việc gửi biểu mẫu nếu có trường không được điền
    }

    // Kiểm tra xem đã chọn phương thức thanh toán chưa
    if (!pttt) {
        alert('Vui lòng chọn hình thức thanh toán.');
        return false; // Ngăn chặn việc gửi biểu mẫu nếu chưa chọn phương thức thanh toán
    }

    // Cập nhật action dựa trên phương thức thanh toán
    if (pttt.value === '1') {
        document.getElementById('thanhToanForm').action = 'app/views/client/thanhtoanmomo/atm_momo.php';
    }

    // Tiếp tục submit form
    return true;
}