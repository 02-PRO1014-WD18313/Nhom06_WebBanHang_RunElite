<?php
function insert_donhang($product_name,$product_price, $quantity,$name, $phone,$address,$note, $pay,$totalMoney,$id_user, $order_date){
$sql = "INSERT INTO oder_detail(product_name,product_price,quantity,name_order,phone_order,address_order,note,paymentMethod,total_money,id_user, date) VALUES
 ('$product_name','$product_price','$quantity','$name','$phone','$address','$note','$pay','$totalMoney','$id_user',' $order_date');" ;
 pdo_execute($sql);
}
function insert_donhang_online($product_name,$product_price, $quantity,$name, $phone,$address,$note, $pay,$totalMoney,$id_user, $order_date){
    $status="check";
    $sql = "INSERT INTO oder_detail(product_name,product_price,quantity,name_order,phone_oder,address_oder,note,paymentMethod,total_money,id_user,order_date,status) VALUES
     ('$product_name','$product_price','$quantity','$name','$phone','$address','$note','$pay','$totalMoney','$id_user',' $order_date',' $status');" ;
     pdo_execute($sql);
    }
function loadall_donhang(){
    $sql = "select * from oder_detail where 1 order by id_order desc";
    $listdh=  pdo_query($sql);
    return $listdh;
}
function update_donhang($name_order,$address_order,$phone_order,$status,$id_order){
    $sql = "UPDATE oder_detail set name_order='".$name_order."',address_order='".$address_order."',phone_order='".$phone_order."',status='".$status."' where id_order='".$id_order."';";
    pdo_execute($sql);
}
function xoa_dh($id){
    $sql="DELETE FROM oder_detail where id_order='".$id."'";
    pdo_query($sql);
}
function loadone_donhang($id){
    $sql ="SELECT * FROM `oder_detail` WHERE id_order = '".$id."';";
    $dh = pdo_query_one($sql);
    return $dh;
}
function theodoi_donhang($id){
    $sql = "select * from oder_detail where id_user='".$id."'";
    $dh=  pdo_query($sql);
    return $dh;
   
}
function update_status($status,$id){
    $sql="UPDATE order_detail SET status=$status WHERE id_order=$id ";
    pdo_execute($sql);
}
?>