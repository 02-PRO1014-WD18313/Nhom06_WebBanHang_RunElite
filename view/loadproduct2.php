<style>
    .container-product{
        background-color: #f4f4f4;
        padding: 25px 0;
    }
    .phantrang {
        margin-top: 30px;
    }

    .phantrang ul {
        display: flex;
        justify-content: center;

    }

    .phantrang li {
        margin-left: 20px;
    }

    .phantrang li a {
        color: #333;
        padding: 5px 12px;
        border: 1px solid #0db5a3;

    }

    .phantrang-active a {
        border: 1px solid red;
        font-weight: 600;
    }

    .focus-page a {
        background-color: #0db5a3;
        font-weight: 600;

    }
</style>
<?php
$countProduct = isset($_GET['per_page']) ? $_GET['per_page'] : 8;
$page =  isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $countProduct;
$sql = "select *from product order by id_product desc limit $countProduct offset $offset";
$products = pdo_query($sql);
$sql = "select * from product";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rowCount = $stmt->rowCount();
$totalPages = ceil($rowCount / $countProduct);
?>
<div class="container-product">
    <div class="container-allsp ">
        <div class="sidebar">
            <div class="sidebar-category">
                <div>
                    <h2>Categories</h2>
                </div>
                <ul>
                    <li><a href="index.php?act=loadallsp">Tất cả sản phẩm</a></li>
                    <?php
                    foreach ($allCategory as $a) {
                        $link = "index.php?act=product_category&id_category=" . $a["id_category"];
                        echo '<li><a href="' . $link . '">' . $a["category_name"] . '</a></li>';
                    }
                    ?>
                    <!-- <li><a href="#">Technology</a></li>
                    <li><a href="#">Fashion</a></li>
                    <li><a href="#">Travel</a></li>
                    <li><a href="#">Food</a></li>
                    <li><a href="#">Sports</a></li>
                    <li><a href="#">Sports</a></li>
                    <li><a href="#">Sports</a></li> -->
                </ul>
            </div>

            <!-- LỌC GIÁ -->

            <div class="search-price-product">
                <p>Khoảng giá</p>
                <form action="index.php?act=filter-price" method="post">
                    <div class="input-price">
                        <input type="number" name="price-min"  min="0" placeholder="đ Từ"> - <input  min="0" type="number" placeholder="đ Đến" name="price-max">
                    </div>
                    <span style="color: red;"><?= isset($errFilter)?$errFilter:'' ?></span>
                    <input type="submit" name="search-pice"  value="ÁP DỤNG">
                </form>
                
            </div>

            <!-- END LỌC GIÁ -->
                

            <div class="boxtt">
                <h5>Thông tin đặt hàng</h5>
                <h3>0999.999.999</h3>
                <p>(Zalo, 7h-23h cả Thứ 7,CN)</p>
            </div>

        </div>

        <div class="all-main-content">
            <div class="main-content">
                <?php
                foreach ($products as $u) {
                    extract($u);
                    $linkspct = "index.php?act=product_detail&id_product=" . $id_product;
                    $hinh = $img_path . $image;
                    echo '
                <div class="product-box">
                <div class="product-image-container">
                    <img class="product-image" src="' . $hinh . '" alt="Tên sản phẩm">
                    <a href=""> <i class="fa-solid fa-bag-shopping"></i></a>
                </div>
                <div class="product-sale">Yêu thích</div>
                <div class="product-detail">
                    <div class="product-title"><a href="' . $linkspct . '">' . $product_name . '</a></div>
                    <div class="product-price">' . $price . ' VNĐ</div>
                    <div class="buy-now"><a href="index.php?act=buy_now&id_product=' . $id_product . '">Mua Ngay</a></div>
                    <div class="box-viewStar">
                        <div class="view-count">Lượt xem: '. $view.'</div>
                        <div class="product-star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>';
                }
                ?>
            </div>
            <div class="phantrang">
                <ul>
                    <?php if ($page > 3) {
                        $first_page = 1; ?>
                        <li><a href="?act=loadallsp&?per_page=<?= $countProduct ?> & page=<?= $first_page ?>"> Trước </a></li>
                    <?php }; ?>


                    <?php for ($i = 1; $i <= $totalPages; $i++) :  ?>
                        <?php if ($i != $page) : ?>
                            <?php if ($i >= $page - 2 && $i <= $page + 2) : ?>
                                <li><a href="?act=loadallsp&per_page=<?= $countProduct ?> & page= <?= $i ?> "><?= $i ?></a></li>
                            <?php endif; ?>
                        <?php else : ?>
                            <li class="focus-page"><a href="?act=loadallsp&?per_page=<?= $countProduct ?> & page= <?= $i ?> "><?= $i ?></a></li>
                        <?php endif ?>
                    <?php endfor; ?>
                    <?php if ($page <= $totalPages - 2) {
                        $end_page = $totalPages; ?>
                        <li><a href="?act=loadallsp&?per_page=<?= $countProduct ?> & page=<?= $end_page ?>"> Sau </a></li>
                    <?php } ?>
                </ul>
            </div>

        </div>


    </div>

</div>