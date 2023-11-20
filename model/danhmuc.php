<?php
    function insert_danhmuc($tenloai){
        $sql="insert into category(category_name) values('$tenloai')";
        pdo_execute($sql);
    }
    function delete_danhmuc($id){
        $sql="delete from danhmuc where id=".$id;
        pdo_execute($sql);
    }
    function loadall_danhmuc(){
        $sql="select * from category";
        $listdanhmuc = pdo_query($sql);
        return  $listdanhmuc;
    }
    function update_dm($tendm,$id_dm){
        $sql = "update category set category_name='".$tendm."'where id_category='".$id_dm."'";
        pdo_execute($sql);
    }
    function xoa_dm($id){
        $sql="DELETE FROM category where id_category='".$id."'";
        pdo_query($sql);
    }
?>