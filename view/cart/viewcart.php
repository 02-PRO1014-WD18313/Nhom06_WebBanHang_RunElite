<!-- <?php session_start(); ?> -->

<body>
    <?php

    ?>
    <div class="container-cart">
        <h1>Giỏ hàng</h1>
        <form id="cart-form" action="cart.php?action=submit" method="POST">
            <table>
                <tr>
                    <th class="product-name">Tên sản phẩm</th>
                    <th class="product-img">Ảnh sản phẩm</th>
                    <th class="product-price">Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th class="product-delete">Xóa</th>
                </tr>
                <?php
                $tong = 0;
                $i = 0;
                foreach ($_SESSION['mycart'] as $cart) {
                    $hinh = $img_path . $cart[2];
                    $deleteProduct = '<a href="index.php?act=delete_cart&idcart=' . $i . '"><input type="button" value="xóa"></a>';
                    echo '
                    <tr>
                        <td class="product-name">'.$cart[1].'</td>
                        <td class="product-img"><img src="'.$hinh.'" alt=""></td>
                        <td id="product-price" class="product-price">'.$cart[3].'</td>
                        <td class="product-quantity">
                            <input type="number" value="1" min="1" name="quantity" data-price="'.$cart[3].'">
                        </td>
                        <td class="total-money"></td>
                        <td class="product-delete">' . $deleteProduct . '</td>
                    </tr>';  
                    $i += 1;                                    
                }
                echo '<tr id="row-total">             
                        <td class="product-quantity" colspan="4">Tổng đơn hàng</td>
                        <td class="allPrice" style="text-align: center;"></td>
                        <td></td>
                    </tr>';
                ?>
            </table>
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
    </script>
</body>