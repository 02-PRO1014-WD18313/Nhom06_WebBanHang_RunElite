<?php
$listdh = loadall_donhang();
?>
<section class="main">
    <section class="attendance">
        <div class="attendance-list">
            <h1 style="color: #0db5a3; font-size:30px;">Danh Sách Đơn Hàng</h1>
            <table class="table">
                <thead>
                    <tr>
                      
                        <th>Tên Sản Phẩm</th>
                       
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
                        $suadh = "index.php?act=suadonhang&id_order=" . $id_order;

                        // Thêm logic để xác định trạng thái
                        if ($status == "") {
                            $trangthai = "Chờ Xác Nhận";
                        } else if ($status == "check") {
                            $trangthai = "Đã Xác Nhận";
                        } else if ($status == "shipping") {
                            $trangthai = "Đang Vận chuyển";
                        } else {
                            $trangthai = "Thành Công";
                        }

                        echo '<tr>
                            
                                <td>' . $product_name . '</td>
                                <td>' . $quantity . '</td>
                                <td>' . $name_order . '</td>
                                <td>' . $phone_oder . '</td>
                                <td>' . $address_oder . '</td>
                                <td>' . $note . '</td>
                                <td>' . $paymentMethod . '</td>
                                <td>' . $total_money . '</td>
                                <td class="' . $status . '">' . $trangthai . '</td>
                                <td><a href="' . $suadh . '"><input type="button" value="Sửa"></a></td>
                                <td><a href=""><input type="button" value="Xóa"></a></td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</section>
