<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Admin</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/addpro.css">
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css">

</head>

<body>
  <div class="container">
    <div class="side-bar">
      <div class="logo">
        <img src="../image/admin.jpg" alt="">
        <span>Admin</span>
      </div>
      <div class="menu">
        <!-- danh mục  -->
        <div class="item">
          <a class="sub-btn"><i class="fa-solid fa-layer-group icon"></i>Danh Mục<i
              class="fa-solid fa-chevron-right dropdown"></i> </a>
          <div class="sub-menu">
            <a href="index.php?act=listdm" class="sub-item">Danh Sách</a>
            <a href="#" class="sub-item">Thêm Danh Mục</a>
          
          </div>
        </div>
        <!-- sản phẩm  -->
        <div class="item">
          <a class="sub-btn"><i class="fa-solid fa-gift icon"></i>Sản Phẩm<i
              class="fa-solid fa-chevron-right dropdown"></i></a>
            <div class="sub-menu">
              <a href="index.php?act=addsp" class="sub-item">Thêm sản phẩm</a>
              <a href="index.php?act=listsp" class="sub-item">danh sách</a>

              <a href="#" class="sub-item">Sửa sản phẩm</a>
            </div>
        </div>

        <!-- tài khoản  -->
        <div class="item">
          <a class="sub-btn"><i class="fas fa-user-cog icon"></i> Tài Khoản<i class="fa-solid fa-chevron-right dropdown"></i></a>
          <div class="sub-menu">
            <a href="#" class="sub-item">Sub Item 01</a>
            <a href="#" class="sub-item">Sub Item 02</a>
          </div>
        </div>

        <!-- Đánh Giá -->
        <div class="item">
          <a class="sub-btn"><i class="fas fa-star-half-alt icon"></i>Đánh Giá<i
              class="fa-solid fa-chevron-right dropdown"></i></a>
            <div class="sub-menu">
              <a href="#" class="sub-item">Sub Item 01</a>
              <a href="#" class="sub-item">Sub Item 02</a>
            </div>
        </div>

        <!-- Đơn Hàng  -->
        <div class="item">
          <a class="sub-btn"><i class="fa-solid fa-truck-fast icon"></i>Đơn Hàng<i
              class="fa-solid fa-chevron-right dropdown"></i></a>
            <div class="sub-menu">
              <a href="#" class="sub-item">Sub Item 01</a>
              <a href="#" class="sub-item">Sub Item 02</a>
            </div>
        </div>

        <!-- Thống Kê -->
        <div class="item">
          <a class="sub-btn"><i class="fa-solid fa-chart-simple icon"></i>Thống Kê<i
              class="fa-solid fa-chevron-right dropdown"></i></a>
            <div class="sub-menu">
              <a href="#" class="sub-item">Sub Item 01</a>
              <a href="#" class="sub-item">Sub Item 02</a>
            </div>

        </div>
        <!-- đăng xuất  -->
        <div class="logout">
          < href="#">
            <i class="fas fa-sign-out-alt icon"></i>
            <span class="">Đăng Xuất</span></a>
          </a>
        </div>
      </div>
    </div>