<?php

$suatk=loadone_taikhoan('id_user');

?>
<div class="container-addProduct">
  <div class="addProduct-header">
    <h1>Cập nhật tài Khoản</h1>
  </div>
  <div class="">
    <?php
    if(is_array($suatk)){
        extract($suatk);
        
        
      }
    ?>
    
    <form action="index.php?act=updatetk" method="POST" enctype="multipart/form-data">
      <div class="box-dm">
       

        <div class="input-nameProduct">
          <label for="">Nhập tên tài khoản : </label>
          <input type="text" name="tentk" value="<?=$username ?>" readonly>
        </div>
      </div>
<br>
      <div class="price-product">
        <div class="input-nameProduct">
          <label for="">Nhập password :</label>
          <input class="add-input" type="text" name="password" value="<?=$password?>">
        </div>
        <br>
        <div class="input-nameProduct">
          <label for="">Nhập email :</label>
          <input class="add-input" type="text" name="gmail" value="<?=$gmail?>">
        </div>
      </div>
      <br>
      <div class="price-product">
      <div class="input-nameProduct">
          <label for="">Nhập số điện thoại :</label>
          <input class="add-input" type="text" name="phone" value="<?=$phone?>">
        </div>
      </div>
      <br>


      <div class="input-nameProduct">
        <label for="">Nhập role :</label>
        <input class="add-input" type="text" name="role" value="<?=$role?>">
      </div>
      <br>
      <div class="input-nameProduct">
          <label for="">Nhập địa chỉ :</label>
          <input class="add-input" type="text" name="address" value="<?=$address?>">
        </div>
      </div>
      <br>
      <div class="product-submit">
        <input type="hidden" name="id_user" value="<?=$id_user ?>">
        <input class="button" type="submit" name="add_taikhoan" value="Cập nhật">
        <input class="button" type="reset" value="Nhập Lại">
        <button class="button"><a href="index.php?act=dskh">Danh sách tai khoan</a></button>
      </div>
      <span style="display:block;color:red;font-size:20px;margin-top:10px;">
        <?php
        echo isset($thongbao) ? $thongbao : '';
        echo isset($err) ? $err : '';
        ?>
      </span>

    </form>
        
  </div>

</div>