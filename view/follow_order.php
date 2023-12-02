<?php
if (isset($_SESSION['user'])) {
    $id_user=$_SESSION['user']['id_user'];
    $dh= theodoi_donhang($id_user);
    if(isset($dh)){
        extract($dh);
       
    }

 

}else{
    header("Location:index.php?act=dangnhap");
}

?>

<?php if((isset($dh))&&($dh!="")){
echo '<h2 style="text-align: center;"> Theo Dõi Đơn Hàng</h2>';
}else{
    echo '<h2 style="text-align: center;">Cần Mua Hàng Để Theo Dõi</h2>';
}?>


<table style="text-align: center; margin:auto">
<?php    foreach($dh as $donhang):?>
        <thead>
            <th>ID Đơn Hàng</th>
            <th>Tên Người Nhận</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Tổng Tiền</th>
            <th>Phương Thức Thanh Toán</th>
            <th>Trạng Thái</th>
        </thead>
        <tbody>
        <tr>
            
                 <?php if ($donhang['status'] == "") {
                $trangthai = "Chờ Xác Nhận";
            } else if ($donhang['status'] == "check") {
                 $trangthai = "Đã Xác Nhận";
          } else if ($donhang['status'] == "shipping") {
                   $trangthai = "Đang Vận chuyển";
             } else {
                 $trangthai = "Thành Công";
              }?>
                        <td><?=$donhang['id_order']?></td>
                        <td><?=$donhang['name_order']?></td>
                        <td><?=$donhang['product_name']?></td>
                        <td><?=$donhang['quantity']?></td>
                        <td><?=$donhang['total_money']?></td>
                        <td><?=$donhang['paymentMethod']?></td>
                        <td><?=$trangthai?></td>
                        
                        
                    </tr><?php endforeach?>
        </tbody>
</table>

