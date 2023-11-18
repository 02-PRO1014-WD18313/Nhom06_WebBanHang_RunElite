<?php 

    
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "header.php";

    
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){          
            case "addsp":
                if(isset($_POST['add_product']) && ($_POST['add_product'])){
                    $id_category=$_POST['id_category'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    $photo=null;
                    if($_FILES['image']['name'] != ""){
                        $photo=time()."_".$_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'],"../upload/$photo");
                    }
                    if($tensp=="" || $giasp==''){
                        $err="Vui lòng không để trống !";
                    }else{
                        insert_sanpham($tensp,$giasp,$photo,$mota,$id_category);
                        $thongbao="Thêm thành công sản phẩm!";
                    }
                }
                $listdm=loadall_danhmuc();
                include "sanpham/addsp.php";
                break;
            case "listsp":
                $listsp=loadall_sanpham();
                include "sanpham/listsp.php";
                break;
            case "xoasp":
                if(isset($_GET['id_product'])){
                    delete_sanpham($_GET['id_product']);
                }
                $listsp=loadall_sanpham();
                include "sanpham/listsp.php";
                break;
            case "suasp":
                if(isset($_GET['id_product'])){
                    $oneProduct=loadone_sanpham($_GET['id_product']);
                }
                $listdm=loadall_danhmuc();
                include "sanpham/update.php";
                break;
            case "updatesp":
                if(isset($_POST['add_product']) && ($_POST['add_product'])){
                    $id=$_POST['idsp'];
                    $id_category=$_POST['id_category'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    $photo=null;
                    if($_FILES['image']['name'] != ""){
                        $photo=time()."_".$_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'],"../upload/$photo");
                    }
                    if($tensp=="" || $giasp==''){
                        $err="Vui lòng không để trống !";
                    }else{
                        update_sanpham($id, $id_category, $tensp, $giasp, $mota, $photo);
                        $thongbao="Thêm thành công sản phẩm!";
                        $listdm=loadall_danhmuc();
                        include "sanpham/listsp.php";
                    }
                }
                break;




        }
    }else{
        include "danhmuc.php";
    }
    include "footer.php"
?>