<div class="container-spct">
    <div class="detail_product">
        <div class="detail_product_1">
            <?php
            extract($product_detail);
            $img = $img_path . $image;
            echo '<div class="detail_product-image">
                    <img src="' . $img . '" alt="">
                </div>
                <div class="detail_product-ship">
                    <p>Miễn phí vận chuyển <i class="fa-solid fa-truck-fast"></i></p>     
                </div>
            </div>
            <div class="detail_product_2">
                <h1>' . $product_name . '</h1>
                <p>' . $price . ' VNĐ</p>
                <div class="description">
                    <h2>Mô tả</h2> <br>
                    <p>
                        ' . $mota . '
                    </p>
                </div>
                <div class="size">
                    Size : 
                    <button class="product-size">40</button>
                    <button class="product-size">41</button>
                    <button class="product-size">42</button>
                    <button class="product-size">43</button>
                    <button class="product-size">44</button>
                    <button class="product-size">45</button>
    
                </div>
                <div class="quantity">
                    Số Lượng :
                    <input type="number" min="1" value="1">
                </div>
                <div class="button-action">
                    <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="id_product" value="' . $id_product . '">
                        <input type="hidden" name="product_name" value="' . $product_name . '">
                        <input type="hidden" name="image" value="' . $image . '">
                        <input type="hidden" name="price" value="' . $price . '">
                        <input type="submit" name="addtocart" value="Thêm giỏ hàng">
                    </form>
                    <a href="index.php?act=buy_now&id_product=' . $id_product . '" >Mua Ngay</a>
                </div>';
            ?>
            <!-- <button class="button-action-2">Mua ngay</button> -->
        </div>
    </div>
</div>