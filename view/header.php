<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Run Elite</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/loadproduct.css">
  <link rel="stylesheet" href="css/cart.css">
  <link rel="icon" href="image/runelite-removebg.png">
  <link rel="stylesheet" href="fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <!-- <link rel="stylesheet" href="../css/login.css">               -->

</head>
<!-- BIGIN HEADER -->
<div class="wrapper">

  <div class="header">
    <div class="header-logo">
      <a href=""><img src="image/runelite-removebg.png" alt=""></a>

    </div>

    <div class="box_search">
      <form action="" method="POST">
        <input type="text" placeholder="Từ khóa tìm kiếm" name="keyword">
        <button name="timkiem"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    </div>

    <div class="nav">
      <ul>
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="index.php?act=loadallsp">Sản Phẩm</a></li>
        <li class="nav2">
          <a href="">My Order <i class="fa-regular fa-heart"></i></a>
        </li>
        <li>
          <a href="index.php?act=addtocart"">My Cart <i class="fa-solid fa-cart-shopping"></i></a>
        </li>
        <div class="menu2">
          <?php
          if (isset($_SESSION['user'])) {
            extract($_SESSION['user']); ?>
            <a href="">Xin chào : <?php echo $username; ?> !</a>
            <?php if ($role == 0) { ?>
              <ul class="menu2-1">
                <li>
                  <a href="index.php?act=tttaikhoan">Thông Tin Tài Khoản</a>
                </li>
                <li>
                  <a href="index.php?act=dangxuat">Đăng Xuất</a>
                </li>


              </ul>
            <?php } else { ?>
              <ul class="menu2-1">
                <li><a href="admin/index.php">Đăng Nhập ADMIN</a></li>
                <li><a href="index.php?act=tttaikhoan">Thông Tin Tài Khoản</a></li>
                <li><a href="index.php?act=dangxuat">Đăng Xuất</a></li>

              </ul>

            <?php } ?>
          <?php } else { ?>
            <a href="index.php?act=dangnhap">Đăng nhập</a>
          <?php } ?>
        </div>


      </ul>



      </ul>
    </div>
  </div>
</div>
<!-- END HEADER -->