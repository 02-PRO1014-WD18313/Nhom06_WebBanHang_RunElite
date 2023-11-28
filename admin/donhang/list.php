<?php
$listdh =  loadall_donhang();
?>
<section class="main">
    <!-- content  -->
    <section class="attendance">
        <div class="attendance-list">
            <h1 style="color: #0db5a3; font-size:30px;">Danh Sách Đơn Hàng</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID_Đơn Hàng</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Tên Người Đặt</th>
                        <th>Số Điện Thoại Người Đặt</th>
                        <th>Địa Chỉ</th>
                        <th>Ghi Chú</th>
                        <th>Phương Thức Thanh Toán</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                        <th colspan="2" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listdh as $u) {
                        extract($u);
                        // $suadh = "index.php?act=suasp&id_product=" . $id_product;
                        // $xoadh = "index.php?act=xoasp&id_product=" . $id_product;
                        // $image = "../upload/" . $image;
                        // $hinh = null;
                        // if (is_file($image)) {
                        //     $hinh = "<img src='" . $image . "' height='30px' >";
                        // }
                        echo '<tr>
                                        <td>' . $id_order . '</td>
                                        <td>' . $product_name . '</td>
                                        <td>' . $product_price . '</td>
                                        <td>' . $quantity. '</td>
                                        <td>' . $name_order. '</td>
                                        <td>' . $phone_oder. '</td>
                                        <td>' . $address_oder. '</td>
                                        <td>' . $note. '</td>
                                        <td>' . $paymentMethod. '</td>
                                        <td>' .$total_money. '</td>
                                        <td class="wait" > Chờ Xác Nhận</td>
                                        <td><a  href=""><input  type="button" value="Sửa"> </a></td>
                                        <td><a  href=""><input  type="button" value="Xóa"></a></td>
                                      </tr>';
                    }
                    ?>

<!-- <td><a  href="' . $suasp . '"><input  type="button" value="Sửa"> </a></td>
                                        <td><a  href="' . $xoasp . '"><input  type="button" value="Xóa"></a></td> -->

                </tbody>

            </table>

        </div>
    </section>
</section>