<?php

function viewCart($del)
{
    global $img_path;
    $tong = 0;
    $i = 0;
    if ($del == 1) {
        $delete_th = '<th>Hành động</th>';
    } else {
        $delete_th = '';
    }
    echo ' <tr>
                <th class="product-name">Tên sản phẩm</th>
                <th class="product-img">Ảnh sản phẩm</th>
                <th class="product-price">Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                ' . $delete_th . '
            </tr>';
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart[2];
        $tong += $cart[5];
        if ($del == 1) {
            $delete_th = '<th>Hành động</th>';
            $deleteProduct = '<td><a href="index.php?act=delete_cart&idcart=' . $i . '"><input type="button" value="xóa"></a></td>';
        } else {
            $delete_th = '';
            $deleteProduct = '';
        }
        echo '
            <tr>
                <td class="product-name">' . $cart[1] . '</td>
                <td class="product-img"><img src="' . $hinh . '" alt=""></td>
                <td id="product-price" class="product-price">' . $cart[3] . '</td>
                <td class="product-quantity">
                    ' . $cart[4] . '
                </td>
                <td class="total-money">' . $cart[5] . '</td>
                ' . $deleteProduct . '
            </tr>';
        $i+= 1;
    }
    echo '<tr id="row-total">             
            <td class="product-quantity" colspan="4">Tổng đơn hàng</td>
            <td style="text-align: center;">' . $tong . '</td>
          </tr>';
}

function tongDonHang(){
    $tong=0;
    foreach ($_SESSION['mycart'] as $cart){
        $ttien=$cart[3]*$cart[4];
        $tong+=$ttien;
    }
    return $tong;
}
