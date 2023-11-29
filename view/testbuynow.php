<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-wvfXpqpZZVQGK6Lr4WIKzUxfIaw0s3a4+ES6a57No1B8DK3bYaz8N1KNF29PdjKx" crossorigin="anonymous">
    <title>Thông Tin Thanh Toán</title>
</head>
<body>
    <div class="container_cart">
        <h1>Thông Tin Thanh Toán</h1>
        <form id="cart-form" action="cart.php?action=submit" method="POST">
            <!-- ... (Các phần khác của form) ... -->

            <div>
                <label for="name">Người nhận: </label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="phone">Điện thoại: </label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]+" required>
                <i class="fas fa-exclamation-circle error-icon" id="phone-error"></i>
            </div>
            <div>
                <label for="address">Địa chỉ: </label>
                <input type="text" id="address" name="address" required>
                <i class="fas fa-exclamation-circle error-icon" id="address-error"></i>
            </div>

            <div>
                <label for="note">Ghi chú: </label>
                <textarea name="note" id="note" cols="50" rows="7"></textarea>
            </div>
            <input type="submit" name="order_click" value="Đặt hàng" onclick="validateForm()">
        </form>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var phone = document.getElementById('phone').value;
            var address = document.getElementById('address').value;

            var phoneErrorIcon = document.getElementById('phone-error');
            var addressErrorIcon = document.getElementById('address-error');

            // Kiểm tra hợp lệ và hiển thị biểu tượng "lỗi" nếu cần
            if (name.trim() === '') {
                // Tên không được để trống
                alert('Vui lòng nhập tên người nhận.');
            }

            if (phone.trim() === '' || !/^[0-9]+$/.test(phone)) {
                // Điện thoại không được để trống và phải là số
                phoneErrorIcon.style.display = 'inline-block';
                alert('Vui lòng nhập số điện thoại hợp lệ.');
            } else {
                phoneErrorIcon.style.display = 'none';
            }

            if (address.trim() === '') {
                // Địa chỉ không được để trống
                addressErrorIcon.style.display = 'inline-block';
                alert('Vui lòng nhập địa chỉ.');
            } else {
                addressErrorIcon.style.display = 'none';
            }
        }
    </script>
</body>
</html>
