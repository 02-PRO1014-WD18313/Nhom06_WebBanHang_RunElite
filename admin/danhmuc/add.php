<div class="container-addProduct">
  <div class="addProduct-header">
    <h1>Thêm Danh Mục</h1>
  </div>
  <div class="add-product">
    <form action="index.php?act=adddm" method="POST" >

      <div class="price-product">
        <div class="price-noSale">
          <label for="">ID Danh Mục: </label>
          <input class="add-input" type="text" name="id" placeholder="Auto" disabled>
        </div>

        <div class="price-Sale">
          <label for="">Tên Danh Mục: </label>
          <input class="add-input" type="Text" name="ten_dm">
        </div>
      </div>


      <div class="product-submit">
        <input class="button" type="submit" name="add_dm" value="Thêm Mới">
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