<!-- <?php session_start(); 
  $id_user=$_SESSION['user']['id_user'];
  $name=$_SESSION['user']['username'];
  $phone=$_SESSION['user']['phone'];
  $address=$_SESSION['user']['address'];
?> -->

<body>
    <?php

    ?>
    <div class="container-cart">
    <h1>Thông Tin Thanh Toán</h1>
        <form id="cart-form" action="index.php?act=buy_cart_result" method="POST">
            <table>
                <tr>
                    <th class="product-name">Tên sản phẩm</th>
                    <th class="product-img">Ảnh sản phẩm</th>
                    <th class="product-price">Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <!-- <th class="product-delete">Xóa</th> -->
                </tr>
                <?php
                $tong = 0;
                $i = 0;
                foreach ($_SESSION['mycart'] as $cart) {
                    $hinh = $img_path . $cart[2];
                    $deleteProduct = '<a href="index.php?act=delete_cart&idcart=' . $i . '"><input type="button" value="xóa"></a>';
                    echo '
                    <tr>
                    
                        <td class="product-name"><input type="text" name="product-name" id=""value="'.$cart[1].'"readonly style="border: none;"> </td>
                        <td class="product-img"><img src="'.$hinh.'" alt=""></td>
                        <td id="product-price" class="product-price">'.$cart[3].'</td>
                        <td class="product-quantity">
                            <input type="number" value="1" min="1" name="quantity" data-price="'.$cart[3].'" readonly >
                        </td>
                        <td class="total-money"></td>
                    
                    </tr>';  
                    $i += 1;                                    
                }
                echo '<tr id="row-total">             
                        <td class="product-quantity" colspan="4">Tổng đơn hàng</td>
                        <td class="allPrice" style="text-align: center;"> <input type="hidden" name="total_money" value=""></td>
                    
                    </tr>';
                ?>
            </table>
           
            <div class="form_payment">
<div class="form_order">
              
                <div class="form_content"><p>Người nhận:</p><input type="text" value="" name="name_oder" class="validate form_order_input"></div>
                <div class="form_content"><p>Điện thoại: </p><input type="text" value="<?=$phone?>" name="phone_oder" class="validate form_order_input"></div>
                <div class="form_content"><p>Địa chỉ: </p><input type="text" value="<?=$address?>" name="address_oder" class="validate form_order_input"></div>
                <input type="hidden" name="id_user"  value="<?=$id_user?>">


            <div>
                <label for="note">Ghi chú: </label>
                <br>
                <textarea name="note" id="note" cols="50" rows="7" class="form_order_note"></textarea>
            </div>
            </div>
            <!-- payment -->
            <div class="form_order_payment">
                <div class="form_content_order">  <label >Phương thức thanh toán:</label></div>
          
            <div class="payment-error" style="color: red;"> </div>
            <div class="payment-methods">
                <div class="payment_item">
                    <input type="radio" name="paymentMethod" value="cod" class="validate-payment">
                    Thanh toán khi nhận hàng
                </div>
                <div class="payment_item" >
                    <input type="radio" name="paymentMethod" value="online" class="validate-payment">
                    Thanh toán online
                </div>
            </div>
            </div>
         

            <!-- endpayment -->
           
</div>
<!-- <button class="button_order" name="order_click" onclick="validateForm()" type="submit"> Đặt hàng</button> -->
<input class="button_order" type="submit" name="order_click" value="Đặt hàng" onclick="validateForm()">
        </form>
       
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
            // Lấy tham chiếu đến tất cả các ô nhập số lượng
            var quantityInputs = document.querySelectorAll('input[name="quantity"]');
            var grandTotal = 0;

            // Lặp qua từng ô nhập số lượng
            quantityInputs.forEach(function (quantityInput) {
                // Lấy giá trị đơn giá từ cột tương ứng
                var priceColumn = quantityInput.closest('tr').querySelector('.product-price');
                var price = parseFloat(priceColumn.textContent);

                // Lắng nghe sự kiện khi người dùng thay đổi số lượng
                quantityInput.addEventListener('input', function () {
                    // Lấy giá trị số lượng
                    var quantity = parseFloat(this.value);

                    // Tính toán giá trị "Thành tiền"
                    var totalMoney = quantity * price;

                    // Cập nhật giá trị "Thành tiền" trong bảng
                    this.closest('tr').querySelector('.total-money').textContent = totalMoney

                    // Cập nhật tổng tiền của tất cả sản phẩm
                    grandTotal = 0;
                    document.querySelectorAll('.total-money').forEach(function (totalMoneyElement) {
                        grandTotal += parseFloat(totalMoneyElement.textContent);
                    });

                    // Cập nhật giá trị "Tổng đơn hàng" trong bảng
                    document.querySelector('.allPrice').textContent = grandTotal.toLocaleString('vi-VN') + ' đ';
                });

                // Gọi sự kiện input để tính toán giá trị "Thành tiền" khi trang web tải lên
                quantityInput.dispatchEvent(new Event('input'));
            });
        });


        //validate form
        document.addEventListener('DOMContentLoaded', function () {
    // Lấy tham chiếu đến form và các trường input
    var cartForm = document.getElementById('cart-form');
    var nameInput = document.querySelector('input[name="name_oder"]');
    var phoneInput = document.querySelector('input[name="phone_oder"]');
    var addressInput = document.querySelector('input[name="address_oder"]');
    var paymentMethodInputs = document.querySelectorAll('.validate-payment');
    var paymentErrorContainer = document.querySelector('.payment-error');

    // Lắng nghe sự kiện khi người dùng click vào nút "Đặt hàng"
    cartForm.addEventListener('submit', function (event) {
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
            if (input.name === 'phone_oder' && !/^\d+$/.test(input.value.trim())) {
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
</body>