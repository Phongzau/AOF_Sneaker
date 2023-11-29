function updateQuantity(id) {
    // lấy giá trị của ô input
    let newQuantity = $('#quantity_' + id).val();
    if (newQuantity <= 0) {
        newQuantity = 1
    }
    console.log("hello");
    // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
    $.ajax({
        type: 'POST',
        url: 'app/views/client/updateQuantity.php',
        data: {
            id: id,
            quantity: newQuantity
        },
        success: function(response) {
            // Sau khi cập nhật thành công
            $.post('app/views/client/giohang.php', function(data) {
                $('#order').html(data);
            })
        },
        error: function(error) {
            console.log(error);
        },
    })
}
