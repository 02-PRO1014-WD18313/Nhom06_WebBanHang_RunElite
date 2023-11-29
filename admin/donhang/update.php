<?php  if(is_array($dh)){
    extract($dh);
    // print_r($dh);
}?>
<div class="container-addProduct">
  <div class="addProduct-header">
    <h1>Sửa Đơn Hàng</h1>
  </div>
  <div class="add-product">
    <form action="index.php?act=updatedh" method="POST" >
      <div class="price-product">
        <div class="price-noSale">
          <label for="">ID Đơn Hàng</label>
          <input class="add-input" type="text" name="id" placeholder="Auto" disabled>
        </div>

        <div class="price-Sale">
          <label for="">Tên Người Đặt </label>
          <input class="add-input" type="Text" name="name_order" value="<?=$name_order?>">
        </div>
      </div>
      <div class="price-Sale">
          <label for="">Địa Chỉ: </label>
          <input class="add-input" type="Text" name="address_order" value="<?=$address_oder?>">
        </div>
        <div class="price-Sale">
          <label for="">Số điện Thoại:  </label>
          <input class="add-input" type="Text" name="phone_order" value="<?=$phone_oder?>">
        </div>
        <label for="">Trạng Thái:  </label>
        <select name="status" id="">
            <option value="">Chờ Xác Nhận</option>
            <option value="check">Xác Nhận</option>
            <option value="shipping">Đang Vận Chuyển</option>
            <option value="done">Thành Công</option>
            <option value="cancel">Hủy</option>
            
        </select>
      </div>



      <div class="product-submit">
        <input type="hidden" name="id_order" value="<?=$id_order?>">
        <input class="button" type="submit" name="update_dh" value="Cập Nhật">
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
