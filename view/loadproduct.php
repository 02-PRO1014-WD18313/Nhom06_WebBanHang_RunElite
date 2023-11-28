<style>
    .container-product{
        background-color: #f4f4f4;
        padding: 25px 0;
    }
</style>

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
                        <input type="number" name="price-min"  min="0" placeholder="đ Từ"> <br> <input  min="0" type="number" placeholder="đ Đến" name="price-max">
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
                foreach ($filter_products as $u) {
                    extract($u);
                    $priceDinhDang=number_format($price,0,'.','.');
                    $price_saleDingDang=number_format($price_sale,0,'.','.');
                    $linkspct = "index.php?act=product_detail&id_product=" . $id_product;
                    $hinh = $img_path . $image;
                    if ($view >= 20) {
                        $love = "Yêu thích";
                        $classLove = "product-sale";
                    } else {
                        $love = "";
                        $classLove = "";
                    }
                    if ($price_sale != 0) {
                        $salePercent = ceil((($price - $price_sale) / $price) * 100);
                        echo '
                        <div class="product-box">
                            <div class="product-image-container">
                                <img class="product-image" src="' . $hinh . '" alt="Tên sản phẩm">
                                <div class="sale-number">
                                    <img src="image/certificate-orange.png" alt="">
                                    <p> Sale ' . $salePercent . '%</p>
                                </div>
                            </div>
                            <div class="' . $classLove . '">' . $love . '</div>
                            <div class="product-detail">
                                <div class="product-title"><a href="' . $linkspct . '">' . $product_name . '</a></div>
                                <div class="product-price"><del>' . $priceDinhDang . ' VNĐ</del> ' . $price_saleDingDang . 'VNĐ</div>
                                <div class="buy-now"><a href="index.php?act=buy_now&id_product=' . $id_product . '">Mua Ngay</a></div>
                                <div class="box-viewStar">
                                    <div class="view-count">Lượt xem: ' . $view . '</div>
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
                    } else {
                        echo '
                        <div class="product-box">
                            <div class="product-image-container">
                                <img class="product-image" src="' . $hinh . '" alt="Tên sản phẩm">
                            </div>
                            <div class="' . $classLove . '">' . $love . '</div>
                            <div class="product-detail">
                                <div class="product-title"><a href="' . $linkspct . '">' . $product_name . '</a></div>
                                <div class="product-price"> ' . $priceDinhDang . 'VNĐ</div>
                                <div class="buy-now"><a href="index.php?act=buy_now&id_product=' . $id_product . '">Mua Ngay</a></div>
                                <div class="box-viewStar">
                                    <div class="view-count">Lượt xem: ' . $view . '</div>
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
                }
                ?>
            </div>
        </div>
    </div>
</div>