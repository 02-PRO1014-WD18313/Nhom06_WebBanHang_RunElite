<style>
  .follow {
    margin: 20px 0;
  }
  .follow h2{
    color: #0db5a3;
    font-size: 30px;
  }
  .follow table th{
    color: #0db5a3;
    background-color: #fff;
  }
</style>
<?php
if (isset($_SESSION['user'])) {
  $id_user = $_SESSION['user']['id_user'];
  $dh = theodoi_donhang($id_user);
  if (isset($dh)) {
    extract($dh);
  }
} else {
  header("Location:index.php?act=dangnhap");
}

?>
<div class="follow">

  <h2 style="text-align: center;"> Theo Dõi Đơn Hàng</h2>;
  <table style="text-align: center; margin:auto">

    <thead>

      <th>Tên Người Nhận</th>
      <th>Tên Sản Phẩm</th>
      <th>Số Lượng</th>
      <th>Tổng Tiền</th>
      <th>Phương Thức Thanh Toán</th>
      <th>Trạng Thái</th>
      <th></th>
    </thead>
    <tbody>
      <tr>
        <?php foreach ($dh as $donhang) : ?>
          <?php if ($donhang['status'] == "") {
            $trangthai = "Chờ Xác Nhận";
          } else if ($donhang['status'] == "check") {
            $trangthai = "Đã Xác Nhận";
          } else if ($donhang['status'] == "shipping") {
            $trangthai = "Đang Vận chuyển";
          } else if ($donhang['status'] == "done") {
            $trangthai = "Thành Công";
          } else {
            $trangthai = "Đã Hủy";
          } ?>
          <?php
          if ($donhang['paymentMethod'] == "cod") {
            $pttt = "Thanh Toán Khi Nhận Hàng";
          } else {
            $pttt = "Thanh Toán Online";
          }
          ?>

          <td><?= $donhang['name_order'] ?></td>
          <td><?= $donhang['product_name'] ?></td>
          <td><?= $donhang['quantity'] ?></td>
          <td><?= $donhang['total_money'] ?></td>
          <td><?= $pttt ?></td>
          <td><?= $trangthai ?></td>
          <td><?= $address ?></td>


      </tr><?php endforeach ?>
    </tbody>
  </table>
</div>