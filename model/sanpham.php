<?php
function insert_sanpham($tensp, $gia,$giasale, $img, $mota, $iddm)
{
    $sql = "insert into product(product_name,price,price_sale,image,mota,id_category) values ('$tensp','$gia','$giasale','$img','$mota','$iddm')";
    pdo_execute($sql);
}
function delete_sanpham($id)
{
    $sql = "delete from product where id_product =" . $id;
    pdo_execute($sql);
}
function load_all_product(){
    $sql = "select * from product where 1";
    $listsp=pdo_query($sql);
    return $listsp;

}
function loadall_sanpham($kyw = "", $iddm = 0)
{
    $sql = "select * from product where 1";
    if ($kyw != "") {
        $sql .=" and product_name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .=" and id_category ='" . $iddm . "'";
    }
    $sql .= " order by id_product desc";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}
function loadone_sanpham($id)
{
    $sql = "select * from product where id_product=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function load_sanpham_cungloai($id, $iddm)
{
    $sql = "select * from product where id_category = $iddm and id_product <> $id";
    $result = pdo_query($sql);
    return $result;
}
function update_sanpham($id, $iddm, $tensp, $giasp,$giasale, $mota, $photo)
{
    if ($photo != '') {
        $sql = "update product set id_category='" . $iddm . "', product_name='" . $tensp . "', price='" . $giasp . "', price_sale='" . $giasale . "',
         mota='" . $mota . "', image='" . $photo . "' where id_product=" . $id;
    } else {
        $sql = "update product set id_category='" . $iddm . "', product_name='" . $tensp . "', price='" . $giasp . "', price_sale='" . $giasale . "',
         mota='" . $mota . "'  where id_product=" . $id;
    }

    pdo_execute($sql);
}
function update_view($id){
    $sql="UPDATE product SET view=view+1 WHERE id_product =".$id;
    pdo_execute($sql);
}
function filter_price_product( $min,$max){
    $sql="SELECT * FROM product WHERE price BETWEEN $min AND $max ORDER BY price ASC";
    $result=pdo_query($sql);
    return $result;

}
function load5sp_moi(){
    $sql = "select * from product ORDER BY id_product desc limit 0,5";
    $result = pdo_query($sql);
    return $result;
}
function load5sp_view(){
    $sql = "select * from product ORDER BY view desc limit 0,5";
    $result = pdo_query($sql);
    return $result;
}
function load5sp_sale(){
    $sql = "select * from product WHERE price_sale > 0  ORDER BY price_sale asc limit 0,5";
    $result = pdo_query($sql);
    return $result;
}
