<?php
    function insert_danhmuc($tenloai){
        $sql="insert into danhmuc(name) values('$tenloai')";
        pdo_execute($sql);
    }
    function delete_danhmuc($id){
        $sql="delete from danhmuc where id=".$id;
        pdo_execute($sql);
    }
    function loadall_danhmuc(){
        $sql="select * from category order by id_category desc";
        $listdanhmuc=pdo_query($sql);
        return  $listdanhmuc;
    }
?>