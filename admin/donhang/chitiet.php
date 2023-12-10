<?php  if(is_array($dh)){
    extract($dh);
    // print_r($dh);
}?>
<div class="container-addProduct">
  <div class="addProduct-header">
    <h1>Chi Tiết Đơn Hàng: <?=$id_order?></h1>
  </div>
  <div class="add-product">
     <p>Tên Đơn Hàng: <?=$product_name?></p>
     <p>Giá Sản Phẩm: <?=$product_price?></p>
     <p>Số Lượng Sản Phẩm: <?=$quantity?></p>
     <p>Tên Người Đặt: <?=$name_order?></p>
     <p>Số Điện Thoại Người Đặt: <?=$phone_order?></p>
     <p>Địa Chỉ: <?=$address_order?></p>
     <p>Ghi Chú: <?=$note?></p>
     <p>Phương Thức Thanh Toán: <?=$paymentMethod?></p>
     <p>Tổng Tiền: <?=$total_money?></p>
  
     <?php 
         if ($status == "") {
            $trangthai = "Chờ Xác Nhận";
        } else if ($status == "check") {
            $trangthai = "Đã Xác Nhận";
        } else if ($status == "shipping") {
            $trangthai = "Đang Vận chuyển";
        } else {
            $trangthai = "Thành Công";
        }
        $suadh = "index.php?act=suadonhang&id_order=" . $id_order;
        // $xoadh = "index.php?act=xoadonhang&id_order=" . $id_order;
     ?>
     <p>Trạng Thái: <?=$trangthai?></p>
     <p>Thời Gian Đặt Hàng: <?=$date?></p>
   
    </div>



      <div class="product-submit">
        <a href="<?=$suadh?>"><input class="button"value="Sửa"></a>
        <a href="index.php?act=listdh"><input class="button"  value="Danh Sách"></a>

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
