<?php
    $image="../upload/".$oneProduct['image'];
    $hinh=null;
    if(is_file($image)){
        $hinh="<img src='".$image."' height='50px' width='60px' >";
    }
?>
<div class="container-addProduct">
  <div class="addProduct-header">
    <h1>Cập nhật sản phẩm </h1>
  </div>
  <div class="add-product">
    <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
      <div class="box-dm">
        Danh mục:
        <select name="id_category">
        <?php
                    foreach($listdm as $u){
                      if($u['id_category']==$oneProduct['id_category']){
                        echo '<option value="'.$u['id_category'].'" selected>'.$u['category_name'].'</option>';
                      }else{
                        echo '<option value="'.$u['id_category'].'" >'.$u['category_name'].'</option>';
                        
                      }
                    }    
                  ?>
        </select>

        <div class="input-nameProduct">
          <label for="">Nhập tên sản phẩm : </label>
          <input type="text" name="tensp" value="<?=$oneProduct['product_name'] ?>">
        </div>
      </div>

      <div class="price-product">
        <div class="price-noSale">
          <label for="">Giá sản phẩm :</label>
          <input class="add-input" type="number" name="giasp"  min="0" value="<?=$oneProduct['price']?>">
        </div>

        <div class="price-Sale">
          <label for="">Giá Sale :</label>
          <input class="add-input" type="number" name="giasale"  value="<?=$oneProduct['price_sale']?>">
        </div>
      </div>

      <div class="image-product">
        Ảnh: <input type="file" name="image"> <br>
        <?=$hinh?>
      </div>
      <div class="mota-product">
        Mô tả <br>
        <textarea name="mota" cols="30" rows="10" ><?=$oneProduct['mota'] ?></textarea>
      </div>


      <div class="product-submit">
        <input type="hidden" name="idsp" value="<?=$oneProduct['id_product'] ?>">
        <input class="button" type="submit" name="add_product" value="Cập nhật">
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