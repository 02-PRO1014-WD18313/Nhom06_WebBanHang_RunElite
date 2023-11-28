<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/dathang.php";
include "header.php";
$allCategory=loadall_danhmuc();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "addsp":
            if (isset($_POST['add_product']) && ($_POST['add_product'])) {
                $id_category = $_POST['id_category'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $photo = null;
                if ($_FILES['image']['name'] != "") {
                    $photo = time() . "_" . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], "../upload/$photo");
                }
                if ($tensp == "" || $giasp == '') {
                    $err = "Vui lòng không để trống !";
                } else {
                    insert_sanpham($tensp, $giasp, $photo, $mota, $id_category);
                    $thongbao = "Thêm thành công sản phẩm!";
                }
            }
            $listdm = loadall_danhmuc();
            include "sanpham/addsp.php";
            break;
            
        case "listsp":
            if(isset($_POST['listtimkiem'])&&($_POST['listtimkiem'])) {
                $kyw=$_POST['kyw'];
                $iddm=$_POST['iddm'];
            }else{
                $kyw='';
                $iddm=0;
            }
            $listdm = loadall_danhmuc();
            $listsp=loadall_sanpham($kyw,$iddm);
            include "sanpham/listsp.php";
            break;


        case "xoasp":
            if (isset($_GET['id_product'])) {
                delete_sanpham($_GET['id_product']);
            }
            $listsp = loadall_sanpham();
            include "sanpham/listsp.php";
            break;
        case "suasp":
            if (isset($_GET['id_product'])) {
                $oneProduct = loadone_sanpham($_GET['id_product']);
            }
            $listdm = loadall_danhmuc();
            include "sanpham/update.php";
            break;
////////////////////////////////
            case "xoatk":
                if (isset($_GET['id_user'])) {
                    delete_taikhoan($_GET['id_user']);
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;

            case "suatk":
                // Lấy 1 record đúng vs id truyền vào
                if (isset($_GET['id_user'])) {
                    $onetaikhoan = loadone_taikhoan($_GET['id_user']);
                }
                // Cần dstk
                $listtaikhoan=loadall_taikhoan();
                include "taikhoan/suatk.php";
                break;

                case "updatetk":
                    if (isset($_POST['add_taikhoan']) && ($_POST['add_taikhoan'])) {
                        $id_user = $_POST['id_user'];
                        $tentk = $_POST['tentk'];
                        $password = $_POST['password'];
                        $gmail = $_POST['gmail'];
                        $phone = $_POST['phone'];
                        $role = $_POST['role'];
                        // $address = $_POST['address'];
                        // print_r($_POST);
                        $address = $_POST['address'];
                        update_taikhoan($id_user, $tentk, $password, $gmail, $phone, $role, $address);
                            $thongbao = "Thay đổi tài khoản thành công";
                            $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                    }
                    break;
        case "updatesp":
            if (isset($_POST['add_product']) && ($_POST['add_product'])) {
                $id = $_POST['idsp'];
                $id_category = $_POST['id_category'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $photo = null;
                if ($_FILES['image']['name'] != "") {
                    $photo = time() . "_" . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], "../upload/$photo");
                }
                if ($tensp == "" || $giasp == '') {
                    $err = "Vui lòng không để trống !";
                } else {
                    update_sanpham($id, $id_category, $tensp, $giasp, $mota, $photo);
                    $thongbao = "Thêm thành công sản phẩm!";
                    $listdm = loadall_danhmuc();
                    include "sanpham/listsp.php";
                }
            }
            break;
        case "listdm":
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";

            break;

            case "dskh":
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;

        case "adddm":
            if (isset($_POST['add_dm']) && ($_POST['add_dm'])) {
                $tendm = $_POST['ten_dm'];
                insert_danhmuc($tendm);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case "suadm":
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $sql = "select * from category where id_category=" . $_GET['id'];
                $dm = pdo_query_one($sql);
            }

            include "danhmuc/update.php";
            break;
        case "updatedm":
            if (isset($_POST['update_dm']) && ($_POST['update_dm'])) {
                $tendm = $_POST['ten_dm'];
                $id = $_POST['id_category'];
                update_dm($tendm, $id);
                $thongbao = "Cập Nhật Thành Công";
            }
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case "xoadm":
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $id = $_GET['id'];
                xoa_dm($id);
            }
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
            case "listdh":
                $listdh =loadall_donhang();
                
                include "donhang/list.php";
                break;
                case "suadonhang":
                    if (isset($_GET['id_order']) && ($_GET['id_order']) > 0) {
                        $sql = "select * from oder_detail where id_order=" . $_GET['id_order'];
                        $dh= pdo_query_one($sql);
                    }
                    include "donhang/update.php";
                    break;
                    case "updatedh":
                        if(isset($_POST[' update_dh'])&&($_POST[' update_dh'])){
$name_order = $_POST['name_order'];
$phone_order = $_POST['phone_order'];

                        }
                        break;
    }
    
        
} else {
    include "danhmuc.php";
}
include "footer.php";
