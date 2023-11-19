<div class="container-addProduct">
  <div class="addProduct-header">
    <h1>Thêm sản phẩm </h1>
  </div>
  <div class="add-product">
    <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
      <div class="box-dm">
        Danh mục:
        <select name="id_category">
          <?php
          foreach ($listdm as $u) {
            echo '<option class="add-input" value="' . $u['id_category'] . '">' . $u['category_name'] . '</option>';
          }
          ?>
        </select>

        <div class="input-nameProduct">
          <label for="">Nhập tên sản phẩm : </label>
          <input type="text" name="tensp">
        </div>
      </div>

      <div class="price-product">
        <div class="price-noSale">
          <label for="">Giá sản phẩm :</label>
          <input class="add-input" type="number" name="giasp" step="1000">
        </div>

        <div class="price-Sale">
          <label for="">Giá Sale :</label>
          <input class="add-input" type="number" name="giasale" step="1000">
        </div>
      </div>

      <div class="image-product">
        Ảnh: <input type="file" name="image">
      </div>
      <div class="mota-product">
        Mô tả <br>
        <textarea name="mota" cols="30" rows="10"></textarea>
      </div>


      <div class="product-submit">
        <input class="button" type="submit" name="add_product" value="Thêm Mới">
        <input class="button" type="reset" value="Nhập Lại">
        <button class="button"><a href="index.php?act=listsp">Danh sách sản phẩm</a></button>
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