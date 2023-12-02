<?php 
    function loadall_binhluan($id_product){
        $sql = "
                SELECT binhluan.id_binhluan, binhluan.noidung, user.username, binhluan.date FROM `binhluan` 
                LEFT JOIN user ON binhluan.id_user = user.id_user
                LEFT JOIN product ON binhluan.id_product = product.id_product
                WHERE product.id_product = $id_product ";
        $result =  pdo_query($sql);
        return $result;
    }
    function insert_binhluan($id_product, $id_user, $noidung){
        $date = date('Y-m-d');
        $sql = "
            INSERT INTO `binhluan`(`noidung`, `id_user`, `id_product`, `date`) 
            VALUES ('$noidung','$id_user','$id_product','$date');
        ";       
        pdo_execute($sql);
    }
    function loadall_binhluanadmin(){
        // $sql="select*from binhluan ";
        $sql2= "SELECT binhluan.id_binhluan, binhluan.noidung, user.username, product.product_name, binhluan.date
        FROM binhluan
        JOIN user ON binhluan.id_user = user.id_user
        JOIN product ON binhluan.id_product = product.id_product";
        $listbl=pdo_query($sql2);
        return $listbl;
    }
    function delete_binhluan($id_binhluan){
        $sql="delete from binhluan where id=".$id_binhluan;
        pdo_execute($sql);
    }

?>