<div class="wrapper">
    <div class="container-allsp ">
        <div class="sidebar">
            <div class="sidebar-category">
                <div>
                    <h2>Categories</h2>
                </div>
                <ul>
                <li><a href="index.php?act=loadallsp">Tất cả sản phẩm</a></li>

                    <?php
                        foreach($allCategory as $a){
                            $link="index.php?act=product_category&id_category=".$a["id_category"];
                            echo '<li><a href="'.$link.'">'.$a["category_name"].'</a></li>';
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

            <div class="boxtt">
                <h5>Thông tin đặt hàng</h5>
                <h3>0999.999.999</h3>
                <p>(Zalo, 7h-23h cả Thứ 7,CN)</p>
            </div>

        </div>


        <div class="main-content">
            <?php
            foreach ($dssp as $u) {
                extract($u);
                $linkspct="index.php?act=product_detail&id_product=".$id_product;
                $hinh = $img_path . $image;
                echo '
                <div class="product-box">
                <div class="product-image-container">
                    <img class="product-image" src="'.$hinh.'" alt="Tên sản phẩm">
                    <a href=""> <i class="fa-solid fa-bag-shopping"></i></a>
                </div>
                <div class="product-sale">Yêu thích</div>
                <div class="product-detail">
                    <div class="product-title"><a href="'.$linkspct.'">'.$product_name.'</a></div>
                    <div class="product-price">'.$price.' VNĐ</div>
                    <!-- <div class="remaining-products">Số lượng còn lại: 50</div> -->
                    <div class="buy-now"><a href="">Mua Ngay</a></div>
                    <div class="box-viewStar">
                        <div class="view-count">Lượt xem: 1000</div>
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

    </div>