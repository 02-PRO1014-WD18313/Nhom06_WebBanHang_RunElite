<?php if (isset($_SESSION['user'])) {
    $id_user = $_SESSION['user']['id_user'];
    $name = $_SESSION['user']['username'];
    $phone = $_SESSION['user']['phone'];
    $address = $_SESSION['user']['address'];
} else {
    header('Location: index.php?act=dangnhap');
} ?>

<body>
    <?php

    ?>
    <div class="container_cart">

        <h1>Thông Tin Thanh Toán</h1>
        <form id="cart-form" action="index.php?act=buy_cart_result" method="POST" enctype="multipart/form-data">
            <?php if (isset($product_detail)) {
                extract($product_detail);
                $img = $img_path . $image;
                if ($price_sale != 0) {
                    $price = $price_sale;
                }
            }
            ?>
            <table>
                <?php
                    viewCart(0);
                ?>
            </table>
            <hr>
            <div class="form_payment">
                <div class="form_order">

                    <div class="form_content">
                        <p>Người nhận:</p><input type="text" value="<?= $name ?>" name="name_oder" class="validate form_order_input">
                    </div>
                    <div class="form_content">
                        <p>Điện thoại: </p><input type="text" value="<?= $phone ?>" name="phone_oder" class="validate form_order_input">
                    </div>
                    <div class="form_content">
                        <p>Địa chỉ: </p><input type="text" value="<?= $address ?>" name="address_oder" class="validate form_order_input">
                    </div>



                    <div>
                        <label for="note">Ghi chú: </label>
                        <br>
                        <textarea name="note" id="note" cols="50" rows="7" class="form_order_note"></textarea>
                    </div>
                </div>
                <!-- payment -->
                <div class="form_order_payment">
                    <div class="form_content_order"> <label>Phương thức thanh toán:</label></div>

                    <div class="payment-error" style="color: red;"> </div>
                    <div class="payment-methods">
                        <div class="payment_item">
                            <input type="radio" name="paymentMethod" value="cod" class="validate-payment">
                            Thanh toán khi nhận hàng
                        </div>
                        <div class="payment_item">
                            <input type="radio" name="paymentMethod" value="online" class="validate-payment">
                            Thanh toán online
                        </div>
                    </div>
                </div>


                <!-- endpayment -->
            </div>
            <div class="buy22">
                <input class="button_order" type="submit" name="order_click" value="Đặt hàng" onclick="validateForm()">
            </div>

        </form>

    </div>
</body>

</html>