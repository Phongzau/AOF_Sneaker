        // Kiểm tra nếu có tham số 'success' trong URL
        const urlParams = new URLSearchParams(window.location.search);
        const successParam = urlParams.get('success');

        if (successParam === 'true') {
            // Nếu có tham số success=true, hiển thị thông báo và tự động mất sau 5 giây
            const successMessage = document.getElementById('success-message');
            successMessage.style.display = 'block';

            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000); // 5000 milliseconds = 5 seconds
        }