<?php
$image = "../upload/" . $oneProduct['image'];
$hinh = null;
if (is_file($image)) {
  $hinh = "<img src='" . $image . "' height='50px' width='60px' >";
}
?>
<div class="container-addProduct">
  <div class="addProduct-header">
    <h1>Cập nhật sản phẩm </h1>
  </div>
  <div class="add-product">
    <form class="form_update_order" action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
      <div class="order-update-item">
        <label for="">Danh mục:</label>
        <select name="id_category">
          <?php
          foreach ($listdm as $u) {
            if ($u['id_category'] == $oneProduct['id_category']) {
              echo '<option value="' . $u['id_category'] . '" selected>' . $u['category_name'] . '</option>';
            } else {
              echo '<option value="' . $u['id_category'] . '" >' . $u['category_name'] . '</option>';
            }
          }
          ?>
        </select>
      </div>



      <div class="order-update-item">
        <label for="">Nhập tên sản phẩm : </label>
        <input type="text" name="tensp" value="<?= $oneProduct['product_name'] ?>">
      </div>



      <div class="order-update-item">
        <label for="">Giá sản phẩm :</label>
        <input class="add-input" type="number" name="giasp" min="0" value="<?= $oneProduct['price'] ?>">
      </div>

      <div class="order-update-item">
        <label for="">Giá Sale :</label>
        <input class="add-input" type="number" name="giasale" value="<?= $oneProduct['price_sale'] ?>">
      </div>


      <div class="order-update-item">
        <label for=""> Ảnh: </label>
        <input type="file" name="image"> <br>
        <?= $hinh ?>
      </div>
      <div class="order-update-item">
        <label for=""> Mô tả</label>

        <textarea name="mota" cols="30" rows="10"><?= $oneProduct['mota'] ?></textarea>
      </div>



      <span style="display:block;color:red;font-size:20px;margin-top:10px;">
        <?php
        echo isset($thongbao) ? $thongbao : '';
        echo isset($err) ? $err : '';
        ?>
      </span>
      <div class="order-update-sumbit">
      <input type="hidden" name="idsp" value="<?= $oneProduct['id_product'] ?>">
      <input class="button_order_update" type="submit" name="add_product" value="Cập nhật">
      <input class="button_order_update" type="reset" value="Nhập Lại">
      <button class="button_order_update"><a href="index.php?act=listsp">Danh sách sản phẩm</a></button>
    </div>

    </form>

  </div>

</div>