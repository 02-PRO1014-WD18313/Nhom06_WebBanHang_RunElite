<?php
$listdh = loadall_donhang();
?>
<section class="main">
    <section class="attendance">
        <div class="attendance-list">
            <h1 style="color: #0db5a3; font-size:30px;">Danh Sách Đơn Hàng</h1>
            <table class="table-order">
                <thead>
                    <tr>
                    
                        <th class="name_pro">Tên Sản Phẩm</th>
                       <th class="name_order">Tên Người Đặt</th>
                        <!-- <th>Số Lượng</th>
                        
                        <th>Số Điện Thoại Người Đặt</th>
                        <th>Địa Chỉ</th>
                        <th>Ghi Chú</th> -->
                        <!-- <th>Phương Thức Thanh Toán</th> -->
                        <th class="total_money_admin">Tổng Tiền</th>
                        <th class="status_admin">Trạng Thái</th>
                        <th colspan="2" style="text-align: center;">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listdh as $u) {
                        extract($u);
                        $suadh = "index.php?act=suadonhang&id_order=" . $id_order;
                        $xoadh = "index.php?act=xoadonhang&id_order=" . $id_order;
                        $ctdh = "index.php?act=ctdonhang&id_order=" . $id_order;
                        // Thêm logic để xác định trạng thái
                        if ($status == "") {
                            $class = "wait";
                            $trangthai = "Chờ Xác Nhận".'<i class="fa-solid fa-clock" style="color: #7f9c16;margin-left:3px;"></i>';
                        } else if ($status == "check") {
                            $class = "check";
                            $trangthai = "Đã Xác Nhận".'<i class="fa-solid fa-thumbs-up" style="color: #00f552;margin-left:3px;"></i>';
                        } else if ($status == "shipping") {
                            $class="shipping";
                            $trangthai = "Đang Vận chuyển".'<i class="fa-solid fa-truck-fast" style="color: #00ffe1;margin-left:3px;"></i>';
                        } else if($status == "done"){
                            $class = "done";
                            $trangthai = "Thành Công".'<i class="fa-solid fa-circle-check" style="color: #00f01c;margin-left:3px;"></i>';
                        }else{
                            $class = "cancel";
                            $trangthai = "Đã Hủy".'<i class="fa-solid fa-ban" style="color: #ff2424;margin-left:3px;"></i>';
                        }

                        echo '<tr>
                        
                                <td><a href="'.$ctdh.'">' . $product_name . '</a></td>
                                <td>' . $name_order . '</td>
                                <td>' . $total_money . '</td>
                                <td class="' . $class. '">' . $trangthai . '</td>
                               
                                <td><a href="' . $suadh . '"><button class="button_action">Sửa</button></a></td>
                             
                               <td> <a href="'.$xoadh.'"><button class="button_action">Xóa</button></td>
                            </tr>';
                    }
                    ?>
                     
                </tbody>
            </table>
        </div>
    </section>
</section>
