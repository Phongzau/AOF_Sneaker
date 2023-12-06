function checkPTTT() {
    var paymentMethod = document.querySelector('input[name="pttt"]:checked').value;

    if (paymentMethod === '0') {
        document.getElementById('thanhToanForm').action = 'index.php?cl=submit_donhang';
    } else if(paymentMethod === '1'){
        document.getElementById('thanhToanForm').action = 'app/views/client/thanhtoanmomo/atm_momo.php';
    }
    // Tiếp tục submit form
    document.getElementById('thanhToanForm').submit();
}