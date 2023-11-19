<div class="container-addProduct">
  <div class="addProduct-header">
    <h1>Sửa Danh Mục</h1>
  </div>
  <div class="add-product">
    <form action="index.php?act=updatedm" method="POST" >
<?php if(is_array($dm)){
    extract($dm);
}?>
      <div class="price-product">
        <div class="price-noSale">
          <label for="">ID Danh Mục: </label>
          <input class="add-input" type="text" name="id" placeholder="Auto" disabled>
        </div>

        <div class="price-Sale">
          <label for="">Tên Danh Mục: </label>
          <input class="add-input" type="Text" name="ten_dm" value="<?=$category_name?>">
        </div>
      </div>


      <div class="product-submit">
        <input type="hidden" name="id_category" value="<?=$id_category?>">
        <input class="button" type="submit" name="update_dm" value="Cập Nhật">
        <input class="button" type="reset" value="Nhập Lại">
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