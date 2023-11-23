<!DOCTYPE html>

<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cart.css">
</head>

<body>
    <?php

    ?>
    <div class="container_cart">

        <h1>Thông Tin Thanh Toán</h1>
        <form id="cart-form" action="index.php?act=buy_now_result" method="POST">
            <?php if (isset($product_detail)) {
                extract($product_detail);
                $img = $img_path . $image;
            }
            ?>
            <table>
                <tr>
                    <!-- <th class="product-number">STT</th> -->
                    <th class="product-name">Tên sản phẩm</th>
                    <th class="product-img">Ảnh sản phẩm</th>
                    <th class="product-price">Đơn giá</th>
                    <th class="product-quantity">Số lượng</th>
                    <th class="">Thành tiền</th>
                 
                </tr>

                <tr>
                    <!-- <td class="product-number">1</td> -->
                    <td class="product-name"><?= $product_name ?></td>
                    <td class="product-img"><img src="<?= $img ?>" alt=""></td>
                    <td id="product-price" class="product-price"><?=$price?></td>
                    <td class="product-quantity"><input type="number" value="1" min="1" name="quantity" ></td>
                    <td class="total-money"><input type="hidden" name="totalMoney" id="total-money-input"></td>


                </tr>

                


            </table>

            <hr>

            <div>
                <div><label>Người nhận: </label><input type="text" value="" name="name" class="validate"></div>
                <div><label>Điện thoại: </label><input type="text" value="" name="phone" class="validate"></div>
                <div><label>Địa chỉ: </label><input type="text" value="" name="address" class="validate"></div>
            </div>


            <div>
                <label for="note">Ghi chú: </label>
                <textarea name="note" id="note" cols="50" rows="7"></textarea>
            </div>
            <!-- payment -->
            <label>Phương thức thanh toán:</label>
            <div class="payment-error" style="color: red;"> </div>
            <div class="payment-methods">
                <label>
                    <input type="radio" name="paymentMethod" value="cod" class="validate-payment">
                    Thanh toán khi nhận hàng
                </label>
                <label>
                    <input type="radio" name="paymentMethod" value="online" class="validate-payment">
                    Thanh toán online
                </label>
            </div>

            <!-- endpayment -->
            <input type="submit" name="order_click" value="Đặt hàng" onclick="validateForm()">
        </form>
    </div>
</body>
<script>



    document.addEventListener('DOMContentLoaded', function () {
    // Lấy tham chiếu đến tất cả các ô nhập số lượng
    var quantityInputs = document.querySelectorAll('input[name="quantity"]');
    
    // Lặp qua từng ô nhập số lượng
    quantityInputs.forEach(function (quantityInput) {
        // Lấy giá trị đơn giá từ cột tương ứng
        var priceColumn = quantityInput.closest('tr').querySelector('.product-price');
        var price = parseInt(priceColumn.textContent.replace('đ', '').replace(',', ''));

        // Tính toán và cập nhật giá trị "Thành tiền" ban đầu
        var totalMoney = quantityInput.value * price;
        quantityInput.closest('tr').querySelector('.total-money').textContent = totalMoney.toLocaleString('vi-VN') + ' đ';

        // Lắng nghe sự kiện khi người dùng thay đổi số lượng
        quantityInput.addEventListener('input', function () {
            // Lấy giá trị số lượng
            var quantity = parseFloat(this.value);

            // Tính toán giá trị "Thành tiền"
            var totalMoney = quantity * price;

            // Cập nhật giá trị "Thành tiền" trong bảng
            this.closest('tr').querySelector('.total-money').textContent = totalMoney.toLocaleString('vi-VN') + ' đ';
        });
    });
});


    // validate form 

    document.addEventListener('DOMContentLoaded', function() {
        // Lấy tham chiếu đến form và các trường input
        var cartForm = document.getElementById('cart-form');
        var nameInput = document.querySelector('input[name="name"]');
        var phoneInput = document.querySelector('input[name="phone"]');
        var addressInput = document.querySelector('input[name="address"]');
        var paymentMethodInputs = document.querySelectorAll('.validate-payment');
        var paymentErrorContainer = document.querySelector('.payment-error');

        // Lắng nghe sự kiện khi người dùng click vào nút "Đặt hàng"
        cartForm.addEventListener('submit', function(event) {
            // Kiểm tra và hiển thị thông báo lỗi cho từng trường (tên, điện thoại, địa chỉ)
            validateAndDisplayError(nameInput, 'Vui lòng nhập tên người nhận', event);
            validateAndDisplayError(phoneInput, 'Vui lòng nhập số điện thoại hợp lệ', event);
            validateAndDisplayError(addressInput, 'Vui lòng nhập địa chỉ', event);

            // Kiểm tra và hiển thị thông báo lỗi cho phương thức thanh toán
            var selectedPaymentMethod = Array.from(paymentMethodInputs).find(input => input.checked);
            if (!selectedPaymentMethod) {
                displayPaymentError('Vui lòng chọn phương thức thanh toán');
                event.preventDefault();
            } else {
                hidePaymentError();
            }
        });

        // Hàm kiểm tra và hiển thị thông báo lỗi cho một trường input
        function validateAndDisplayError(input, errorMessage, event) {
            if (input.value.trim() === '') {
                displayError(input, errorMessage);
                event.preventDefault();
            } else {
                if (input.name === 'phone' && !/^\d+$/.test(input.value.trim())) {
                    displayError(input, 'Vui lòng nhập số điện thoại hợp lệ');
                    event.preventDefault();
                } else {
                    hideError(input);
                }
            }
        }

        // Hàm hiển thị thông báo lỗi cho phương thức thanh toán
        function displayPaymentError(errorMessage) {
            paymentErrorContainer.innerHTML = '<i class="fas fa-exclamation-circle error-icon"></i>' + errorMessage;
            paymentErrorContainer.style.display = 'block';
        }

        // Hàm ẩn thông báo lỗi cho phương thức thanh toán
        function hidePaymentError() {
            paymentErrorContainer.textContent = '';
            paymentErrorContainer.style.display = 'none';
        }

        // Hàm hiển thị thông báo lỗi và icon Font Awesome cho một trường input
        function displayError(input, errorMessage) {
            var errorIcon = document.createElement('i');
            errorIcon.classList.add('fas', 'fa-exclamation-circle', 'error-icon');

            var errorContainer = document.createElement('div');
            errorContainer.classList.add('error-container');
            errorContainer.appendChild(errorIcon);

            var errorText = document.createElement('span');
            errorText.classList.add('error-text');
            errorText.textContent = errorMessage;

            errorContainer.appendChild(errorText);

            // Thêm lớp 'error' vào trường input để làm nổi bật
            input.classList.add('error');

            // Nếu trường input đã có lỗi, hãy xóa đi để tránh duplicate
            var existingError = input.parentElement.querySelector('.error-container');
            if (existingError) {
                existingError.remove();
            }

            // Thêm thông báo lỗi vào gần trường input
            input.parentElement.appendChild(errorContainer);
        }

        // Hàm ẩn thông báo lỗi và icon Font Awesome cho một trường input
        function hideError(input) {
            // Xóa lớp 'error' khỏi trường input
            input.classList.remove('error');

            // Xóa thông báo lỗi và icon Font Awesome nếu đã tồn tại
            var existingError = input.parentElement.querySelector('.error-container');
            if (existingError) {
                existingError.remove();
            }
        }
    });
</script>



</html>