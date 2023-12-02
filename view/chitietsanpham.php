<div class="container-spct">
    <style>
        .none {
            display: none;
        }

        .no_none {
            color: gray;
            font-size: 15px;
        }
    </style>
    <div class="detail_product">
        <div class="detail_product_1">
            <?php
            $binhluan = loadall_binhluan($_GET['id_product']);
            extract($product_detail);
            $img = $img_path . $image;
            $priceDinhDang=number_format($price,0,'.','.');
            $price_saleDingDang=number_format($price_sale,0,'.','.');

            if ($price_sale > 0) {
                echo '<div class="detail_product-image">
                    <img src="' . $img . '" alt="">
                </div>
                <div class="detail_product-ship">
                    <p>Miễn phí vận chuyển <i class="fa-solid fa-truck-fast"></i></p>     
                </div>
            </div>
            <div class="detail_product_2">
                <h1>' . $product_name . '</h1>
                <p><del class="no_none" >' . $priceDinhDang . ' VNĐ</del> ' . $price_saleDingDang . ' VNĐ</p>
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
                        <input type="hidden" name="price_sale" value="' . $price_sale . '">
                        <input type="submit" name="addtocart" value="Thêm giỏ hàng">
                    </form>
                    <a href="index.php?act=buy_now&id_product=' . $id_product . '" >Mua Ngay</a>
                </div>';
            } else {

                echo '<div class="detail_product-image">
                    <img src="' . $img . '" alt="">
                </div>
                <div class="detail_product-ship">
                    <p>Miễn phí vận chuyển <i class="fa-solid fa-truck-fast"></i></p>     
                </div>
            </div>
            <div class="detail_product_2">
                <h1>' . $product_name . '</h1>
                <p> ' . $priceDinhDang . ' VNĐ</p>
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
                        <input type="hidden" name="price_sale" value="' . $price_sale . '">
                        <input type="submit" name="addtocart" value="Thêm giỏ hàng">
                    </form>
                    <a href="index.php?act=buy_now&id_product=' . $id_product . '" >Mua Ngay</a>
                </div>';
            }
            
            ?>
            
            <!-- <button class="button-action-2">Mua ngay</button> -->
        </div>
        
        </div>

        <!--  -->
        <div class="mb">
            <div class="box_title">BÌNH LUẬN</div>
            <div class="box_content2  product_portfolio binhluan ">
                <table>
                    <?php foreach($binhluan as $value):

                     ?>
                       
                    <tr>
                        <td><?php echo $value['noidung']?></td>
                        <td><?php echo date("d/m/Y", strtotime($value['date'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
            <div class="box_cmt">
                <form action="index.php?act=product_detail&id_product=<?=$id_product?>" method="POST">
                    <?php
                   
                        if(isset($_SESSION['user'])){

                            echo '

                                <input type="hidden" name="id_product" value="'.$id_product.'">
                                <input type="text" name="noidung">
                                <input type="submit" name="guibinhluan" value="Gửi bình luận">

                                
                           
                            ';
                        }else{
                            echo '
                                <input class="band" type="text" value="Đăng nhập để bình luận" readonly>
                            ';
                        }
                    ?>                 
                </form>
            </div>
    
    </div>
</div>