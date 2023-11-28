
<section class="main">
    <!-- content  -->
    <section class="attendance">
        <div class="attendance-list">
            <h1 style="color: #0db5a3; font-size:30px;">Danh sách sản phẩm</h1>
            <div class="box_search">
            <div class="box-dm">

            <form action="index.php?act=listsp" method="POST">
            <input type="text" placeholder="Từ khóa tìm kiếm" name="kyw">
            <select name="iddm">
                <option value="0" selected>Danh mục</option>
          <?php
          foreach ($listdm as $u) {
            extract($u);
            echo '<option class="add-input" value="' . $u['id_category'] . '">' . $u['category_name'] . '</option>';
          }
          ?>
        </select>
        <input type="submit" name="listtimkiem" value="Tìm">
        <!-- <button name="listtimkiem" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button> -->
      </form>
</div>
    </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Lượt xem</th>
                        <th colspan="2" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listsp as $u) {
                        extract($u);
                        $suasp = "index.php?act=suasp&id_product=" . $id_product;
                        $xoasp = "index.php?act=xoasp&id_product=" . $id_product;
                        $image = "../upload/" . $image;
                        $hinh = null;
                        if (is_file($image)) { 
                            $hinh = "<img src='" . $image . "' height='30px' >";
                        }
                        echo '<tr>
                                        <td>' . $id_product . '</td>
                                        <td>' . $product_name . '</td>
                                        <td>' . $price . '</td>
                                        <td>' . $hinh . '</td>
                                        <td>' . $view . '</td>

                                        <td><a  href="' . $suasp . '"><input  type="button" value="Sửa"> </a></td>
                                        <td><a  href="' . $xoasp . '"><input  type="button" value="Xóa"></a></td>
                                      </tr>';
                    }
                    ?>



                </tbody>

            </table>

        </div>
    </section>
</section>