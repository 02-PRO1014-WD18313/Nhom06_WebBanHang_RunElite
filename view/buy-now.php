<?php if(isset($_SESSION['user'])){
    $name=$_SESSION['user']['username'];
    $phone=$_SESSION['user']['phone'];
    $address=$_SESSION['user']['address'];
}else{
   
 header('Location: index.php?act=dangnhap');
 echo '<script>alert("Xin chào! Đây là cảnh báo.");</script>';
} ?>

<body>
    <?php

    ?>
    <div class="container_cart">

        <h1>Thông Tin Thanh Toán</h1>
        <form id="cart-form" action="index.php?act=buy_now_result" method="POST" enctype="multipart/form-data">
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
                    <!-- <th>Size</th> -->
                    <th class="product-price">Đơn giá</th>
                    <th class="product-quantity">Số lượng</th>
                    <th class="total-money">Thành tiền</th>


                </tr>

                <tr>
                    <!-- <td class="product-number">1</td> -->
                   <td class="product-name" ><input type="text" name="product-name" id="" value="<?=$product_name?>" readonly style="border: none;"> </td>

                    <td class="product-img"><input type="image" src="<?=$img?>" alt="" name="product-img " ></td>
                    <!-- <td><select name="" id="">
                        <option value="">41</option>
                        <option value="">42</option>
                        <option value="">43</option>
                    </select></td> -->

                    <td id="product-price" class="product-price"><input type="text" name="product-price" id="" value="<?=$price?>" readonly></td>

                    <td class="product-quantity"><input type="number" value="1" min="1" name="quantity"></td>
                    <td class="total-money"><input type="hidden" name="total_money" id="total-money-input" value=""></td>


                </tr>
                
 </table>

            <hr>
<div class="form_payment">
<div class="form_order">
              
                <div class="form_content"><p>Người nhận:</p><input type="text" value="" name="name_oder" class="validate form_order_input"></div>
                <div class="form_content"><p>Điện thoại: </p><input type="text" value="<?=$phone?>" name="phone_oder" class="validate form_order_input"></div>
                <div class="form_content"><p>Địa chỉ: </p><input type="text" value="<?=$address?>" name="address_oder" class="validate form_order_input"></div>
            


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
            
            <input class="button_order" type="submit" name="order_click" value="Đặt hàng" onclick="validateForm()">
        </form>
    </div>
</body>
<script>
  
  document.addEventListener('DOMContentLoaded', function() {
    // Lấy tham chiếu đến tất cả các ô nhập số lượng
    var quantityInputs = document.querySelectorAll('input[name="quantity"]');

    // Lặp qua từng ô nhập số lượng
    quantityInputs.forEach(function(quantityInput) {
        // Lấy giá trị đơn giá từ cột tương ứng
        var priceColumn = quantityInput.closest('tr').querySelector('.product-price');
        var price = parseFloat(priceColumn.querySelector('input').value.replace('đ', '').replace(',', ''));

        // Tính toán và cập nhật giá trị "Thành tiền" ban đầu
        var totalMoney = quantityInput.value * price;
        quantityInput.closest('tr').querySelector('.total-money').textContent = totalMoney.toLocaleString('vi-VN') + ' đ';

        // Lắng nghe sự kiện khi người dùng thay đổi số lượng
        quantityInput.addEventListener('input', function() {
    // Lấy giá trị số lượng
    var quantity = parseFloat(this.value);

    // Tính toán giá trị "Thành tiền"
    var totalMoney = quantity * price;

    // Cập nhật giá trị "Thành tiền" trong bảng
    this.closest('tr').querySelector('.total-money').textContent = totalMoney.toLocaleString('vi-VN') + ' đ';

    // Cập nhật giá trị "Thành tiền" trong input ẩn
    var totalMoneyInput = quantityInput.closest('tr').querySelector('#total-money-input');
if (totalMoneyInput) {
    totalMoneyInput.value = totalMoney;
}
});
    });
});





    // validate form 

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



</html>