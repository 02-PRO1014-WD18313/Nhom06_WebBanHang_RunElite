<?php
if (isset($_SESSION['user'])) {
    // <td>'. $trangthai.'</td>
   
    $id_user=$_SESSION['user']['id_user'];
    $dh= theodoi_donhang($id_user);
    if(is_array($dh)){
        extract($dh);
        // print_r($dh);

        // echo '<table>
        // <thead>
        //     <th>ID Đơn Hàng</th>
        //     <th>Tên Người Nhận</th>
        //     <th>Tên Sản Phẩm</th>
        //     <th>Số Lượng</th>
        //     <th>Tổng Tiền</th>
        //     <th>Phương Thức Thanh Toán</th>
        //     <th>Trạng Thái</th>
        // </thead>';
             
    
    }else{
        echo "không có đơn hàng";
    }
// //    $dh = theodoi_donhang($id_user);
//    if(isset($dh)){
//     extract($dh);
//     if ($status == "") {
//         $trangthai = "Chờ Xác Nhận";
//     } else if ($status == "check") {
//         $trangthai = "Đã Xác Nhận";
//     } else if ($status == "shipping") {
//         $trangthai = "Đang Vận chuyển";
//     } else {
//         $trangthai = "Thành Công";
//     }
// echo '<table>
// <thead>
//     <th>ID Đơn Hàng</th>
//     <th>Tên Người Nhận</th>
//     <th>Tên Sản Phẩm</th>
//     <th>Số Lượng</th>
//     <th>Tổng Tiền</th>
//     <th>Phương Thức Thanh Toán</th>
//     <th>Trạng Thái</th>
// </thead>
// <tbody>
//     <tr>
//         <td>'.$id_order.'</td>
//         <td>'.$name_order.'</td>
//         <td>'.$product_name.'</td>
//         <td>'.$quantity.'</td>
//         <td>'.$total_money.'</td>
//         <td>'.$paymentMethod.'</td>
//         <td>'. $trangthai.'</td>
        
//     </tr>
// </tbody>
// </table>';
//    }else{
// echo "bạn chưa có đơn hàng nào cả , vui lòng mua hàng để theo dõi đơn hàng";
//    }
 

}else{
    header("Location:index.php?act=dangnhap");
}

?>
<h2 style="text-align: center;"> Theo Dõi Đơn Hàng</h2>
<table style="text-align: center; margin:auto">
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
            <?php    foreach($dh as $donhang):?>
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
