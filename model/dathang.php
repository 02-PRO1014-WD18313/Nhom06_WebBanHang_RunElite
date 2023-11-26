<?php
function insert_donhang($product_name,$product_price, $quantity,$name, $phone,$address,$note, $pay,$totalMoney){
$sql = "INSERT INTO oder_detail(product_name,product_price,quantity,name_order,phone_oder,address_oder,note,paymentMethod,total_money) VALUES
 ('$product_name','$product_price','$quantity','$name','$phone','$address','$note','$pay','$totalMoney');" ;
 pdo_execute($sql);
}
function loadall_donhang(){
    $sql = "select * from oder_detail where 1";
    $listdh=  pdo_query($sql);
    return $listdh;
}
?>