<?php  if(is_array($dh)){
    extract($dh);
    // print_r($dh);
    
}?>
<div class="container-addProduct">
  <div class="addProduct-header">
    <h1>Sửa Đơn Hàng</h1>
  </div>
  <div class="add-product">
    <form class="form_update_order" action="index.php?act=updatedh" method="POST" >
     
        <div class="order-update-item">
          <label for="">Tên Người Đặt </label>
          <input class="add-input" type="Text" name="name_order" value="<?=$name_order?>">
        </div>
      
      <div class="order-update-item">
          <label for="">Địa Chỉ: </label>
          <input class="add-input" type="Text" name="address_order" value="<?=$address_oder?>">
        </div>
        <div class="order-update-item">
          <label for="">Số điện Thoại:  </label>
          <input class="add-input" type="Text" name="phone_order" value="<?=$phone_oder?>">
        </div>
        <div class="order-update-item">
        <label for="">Trạng Thái:  </label>
        <select name="status" id="">
          <option selected></option>
            <option value="">Chờ Xác Nhận</option>
            <option value="check">Xác Nhận</option>
            <option value="shipping">Đang Vận Chuyển</option>
            <option value="done">Thành Công</option>
            <option value="cancel">Hủy</option>
            
        </select>
        </div>
       
      </div>



      <div class="order-update-sumbit">
        <input type="hidden" name="id_order" value="<?=$id_order?>">
        <input class="button_order_update" type="submit" name="update_dh" value="Cập Nhật">
        <input class="button_order_update" type="reset" value="Nhập Lại">
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
