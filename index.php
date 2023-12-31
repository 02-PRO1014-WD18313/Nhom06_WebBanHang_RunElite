<?php
session_start();
include "model/pdo.php";
include "global.php";
include "model/taikhoan.php";
include "model/binhluan.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/dathang.php";
include "model/cart.php";
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}
$conn = pdo_get_connection();
// $allProduct=load_all_product();
$spmoi = load5sp_moi();
$spview =load5sp_view();
$spsale = load5sp_sale();
$allCategory = loadall_danhmuc();
$product_adidas = loadall_danhmuc("", 1);
include "view/header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "dangky":
            if (isset($_POST['dangky']) && ($_POST['dangky'] != "")) {
                $name = $_POST['user'];
                $email = $_POST['email'];
                $pass = $_POST['matkhau'];
                $repass = $_POST['confirm-matkhau'];
                if (empty($name) || empty($email) || empty($pass) || empty($repass)) {
                    $thongbaoall = '<i class="fas fa-exclamation-circle" style="color: #ff0000;margin-right:10px;"></i>Vui lòng điền đầy đủ thông tin.';
                } else {
                    // Kiểm tra độ dài của mật khẩu
                    if (strlen($pass) < 6) {
                        $thongbaopass = '<i class="fas fa-exclamation-circle" style="color: #ff0000;margin-right:10px;"></i>Mật khẩu phải có ít nhất 6 ký tự.';
                    } else {
                        // Kiểm tra xem mật khẩu và mật khẩu xác nhận có giống nhau không
                        if ($pass !== $repass) {
                            $thongbaorepass = '<i class="fas fa-exclamation-circle" style="color: #ff0000;margin-right:10px;"></i>Mật khẩu không trùng khớp.';
                        } else {
                            //không có lỗi chạy code
                            $checkuser = checkuser($name);
                            if (is_array($checkuser) && ($checkuser != "")) {
                                $thongbaoerr = '<i class="fas fa-exclamation-circle" style="color: #ff0000; margin-right:10px;"></i> User đã tồn tại,vui lòng đăng ký tên khác';
                            } else {
                                themtaikhoan($name, $pass, $email);
                                $thongbao = '<i class="fa-solid fa-circle-check" style="color: #05eb20;margin-right:10px;"></i>Đăng Ký Thành Công';
                            }
                        }
                    }
                }
            }
            include "view/register.php";
            break;
        case "dangnhap":
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'] != "")) {
                $user = $_POST['username'];
                $pass = $_POST['password'];
                if($user!=""&&$pass!=""){
                    $login = dangnhap($user, $pass);
                    if (is_array($login)) {
                        $_SESSION['user'] = $login;
                        header('Location: index.php');
                        
                    } else {
                        $thongbaoerr = '<i class="fas fa-exclamation-circle" style="color: #ff0000;margin-right:10px;"></i>Tài Khoản Hoặc Mật Khẩu Sai';
                        // header('Location: index.php?act=dangnhap');
                    }
                }else{
                    $thongbaoerr = '<i class="fas fa-exclamation-circle" style="color: #ff0000;margin-right:10px;"></i>Cần Nhập Tài Khoản Mật Khẩu';
                }
             
            }
            include "view/login.php";
            break;

            case "sanphamct":
                if(isset($_POST['guibinhluan'])){
                    echo $_POST['id_product'];
                    
                    echo $_POST['noidung'];
                    insert_binhluan($_POST['id_product'],$_SESSION['user']['id_user'], $_POST['noidung']);
                }
                if(isset($_GET['id_product']) && $_GET['id_product'] > 0){
                    $sanpham = loadone_sanpham($_GET['id_product']);
                    $sanphamct = load_sanpham_cungloai($_GET['id_product'], $sanpham['id_category']);
                    $binhluan = loadall_binhluan($_GET['id_product']);
                    include "view/chitietsanpham.php";
                }else{
                    include "view/home.php";            
                }
                break;
                
        case "dangxuat":

            session_unset();
            header('Location: index.php');
            break;
        case "loadallsp":
            include "view/loadproduct2.php";
            break;
        case "product_category":
            if (isset($_GET['id_category']) && ($_GET['id_category'] > 0)) {
                $id_category = $_GET['id_category'];
                $dssp = loadall_sanpham("", $id_category);
                include "view/product_category.php";
            }
            break;
            
        case "product_detail":
            if(isset($_POST['guibinhluan'])){
                if($_POST['noidung'] != ''){
                    insert_binhluan($_POST['id_product'],$_SESSION['user']['id_user'], $_POST['noidung']);
                }else{
                    $errCmt='Vui lòng không để trống !';
                }
            }
            if (isset($_GET['id_product']) && ($_GET['id_product'] > 0)) {
                
                $id = $_GET['id_product'];
                $product_detail = loadone_sanpham($id);
                update_view($id);
                $binhluan = loadall_binhluan($_GET['id_product']);
                $product_same = load_sanpham_cungloai($_GET['id_product'],$product_detail['id_category']);
                include "view/chitietsanpham.php";
                break;
            } else {
                include "view/trangchu.php";
            }
            break;

        case "addtocart":
            if(isset($_SESSION['user'])){
                if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                    $id_product = $_POST['id_product'];
                    $product_name = $_POST['product_name'];
                    $image = $_POST['image'];

                    if(isset($_POST['price_sale']) && ($_POST['price_sale'] !=0)){    
                        $price = $_POST['price_sale'];
                    }else{
                        $price = $_POST['price'];
                    }

                    $soluong = 1;
                    $total_price = $soluong * $price;
                    $productadd = [$id_product, $product_name, $image, $price, $soluong, $total_price];
                    array_push($_SESSION['mycart'], $productadd);
                }
                include "view/cart/viewcart.php";
            }else{
                include "view/login.php";
            }
            break;
        case "delete_cart":
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=viewcart');
            break;
        case "viewcart":

            include "view/cart/viewcart.php";
            break;
        case "buy_now":
            if (isset($_GET['id_product']) && ($_GET['id_product'] > 0)) {
                $id = $_GET['id_product'];
                $product_detail = loadone_sanpham($id);
            }
            include "view/buy-now.php";
            break;

        case "buy_now_result":
            if (isset($_POST['order_click']) && ($_POST['order_click'])) {
                $name=$_POST['name_oder'];
                $phone=$_POST['phone_oder'];
                $address=$_POST['address_oder'];
                $pay=$_POST['paymentMethod'];
                $note=$_POST['note'];
                $pr_name=$_POST['product-name'];
                $product_price=$_POST['product-price'];
                $quantity=$_POST['quantity'];
                $totalMoney=tongDonHang();
                $id_user=$_POST['id_user'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
            $order_date=date('d/m/Y H:i:s');;
            // echo $order_date;
                // print_r($_POST);
                if($pay=="online"){
                    
                   include "view/onlinepay.php";
                }else{
  insert_donhang($pr_name,$product_price, $quantity,$name, $phone,$address,$note, $pay,$totalMoney,$id_user,$order_date);

                $thongbao = "Mua Hàng Thành Công";
                include "view/buy_now_result.php";
                }
                // $product_img=$_POST['product-img'];
              
            } else {
                include "view/buy-now.php";
            }

            break;
            case "buy_cart_result":
                if (isset($_POST['order_click']) && ($_POST['order_click'])) {
                    $name=$_POST['name_oder'];
                    $phone=$_POST['phone_oder'];
                    $address=$_POST['address_oder'];
                    $pay=$_POST['paymentMethod'];
                    $note=$_POST['note'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date=date('d/m/Y H:i:s');
                    $tongDonHang=tongDonHang();
                    foreach($_SESSION['mycart'] as $cart){              
                        insert_donhang($cart[1],$cart[3], $cart[4],$name, $phone,$address,$note, $pay,$cart[5],$_SESSION['user']['id_user'], $date);
                    }
                    $thongbao = "Mua Hàng Thành Công";
                    include "view/buy_now_result.php";
                } else {
                    
                    include "view/buy-now.php";
                }
    
                break;
            case "return_pay":
                include "view/return_pay.php";
                break;
        case "filter-price":
            if (isset($_POST['search-pice']) && ($_POST['search-pice'])) {
                $min=$_POST['price-min'];
                $max=$_POST['price-max'];
                if($min>$max || $min=='' || $max ==''){
                    $errFilter="Nhập đúng dữ liệu !";
                    include "view/loadproduct2.php";
                    break;
                }else{
                    $filter_products=filter_price_product($min,$max);
                    include "view/loadproduct.php";
                }
            }else{
                include "view/loadproduct2.php";
            }
            break;
            case "follow_order":
              
                include "view/follow_order.php";
                break;
                case "buycart":
                    include "view/cart/buycart.php";
                    break;
                    
    }
} else {
    include "view/trangchu.php";
}
include "view/footer.php";
