<body>
      <div class="container">
        <!-- SLIDE --> 
        <div class="slides">
          <div class="slide fade">
            <img
              src="image/slide1.webp"/>
          </div>
    
          <div class="slide fade">
            <img
              src="image/slide2.jpg"/> 
          </div>
          <div class="slide fade">
            <img
              src="image/slide3.jpg"/> 
          </div>  
            <button  class="btn1" onclick="preview()"><i class="fa-solid fa-circle-chevron-down fa-rotate-90 fa-2xl"></i></button>
            <button class="btn2" onclick="next()"><i class="fa-solid fa-circle-chevron-down fa-rotate-270 fa-2xl"></i></button>
        </div>

          
        <!-- END SLIDE -->
        <div class="category">
          <div class="brand">
            <a href="#">
              <div class="brand-circle">
                <div class="brand-image">          
                  <img src="image/flash sale.jpg" alt="">
                </div>
              </div>       
              <p>Sale Sốc</p> 
            </a>                              
          </div>

          <div class="brand">
            <a href="index.php?act=product_category&id_category=1">
              <div class="brand-circle">
                <div class="brand-image">          
                  <img src="image/adidaspng.png" alt="">
                </div>
              </div>       
              <p>Adidas</p> 
            </a>                              
          </div>

          <div class="brand">
            <a href="index.php?act=product_category&id_category=2">
              <div class="brand-circle">
                <div class="brand-image">          
                  <img src="image/nike.png" alt="">
                </div>
              </div>       
              <p>Nike</p> 
            </a>                              
          </div>

          <div class="brand">
            <a href="index.php?act=product_category&id_category=4">
              <div class="brand-circle">
                <div class="brand-image">          
                  <img src="image/conv.png" alt="">
                </div>
              </div>       
              <p>Converse</p> 
            </a>                              
          </div>

          <div class="brand">
            <a href="index.php?act=product_category&id_category=7">
              <div class="brand-circle">
                <div class="brand-image">          
                  <img src="image/lv.png" alt="">
                </div>
              </div>       
              <p>LV</p> 
            </a>                              
          </div>

          <div class="brand">
            <a href="index.php?act=product_category&id_category=3">
              <div class="brand-circle">
                <div class="brand-image">          
                  <img src="image/vans.png" alt="">
                </div>
              </div>       
              <p>Vans</p> 
            </a>                              
          </div>

          <div class="brand">
            <a href="index.php?act=product_category&id_category=5">
              <div class="brand-circle">
                <div class="brand-image">          
                  <img src="image/mlb.png" alt="">
                </div>
              </div>       
              <p>MLB</p> 
            </a>                              
          </div>

        </div>       
        <!-- END CATEGORY -->

        <!-- SẢN PHẨM SALE -->
        <div class="sale">
          <div class="sale-header">

            <div class="sale-header1">
              <h2>Sale Sốc <i style="color: yellow;"  class="fa-solid fa-bolt-lightning"></i> Hôm Nay</h2>
            </div>

            <div id="countdown-container">
              <div id="countdown">
                  <div class="a">              
                      <div id="days">02 </div>
                      <p>Ngày</p>      
                  </div>
                  <div class="a">       
                      <div id="hours">00 </div>
                      <p> Giờ</p>         
                  </div>
                  <div class="a">
                      <div id="minutes">00 </div>
                      <p>Phút</p>          
                  </div>
                  <div class="a">
                      <div id="seconds">00 </div>
                      <p>Giây</p>             
                  </div>
              </div>
          </div>          
          </div>

          <div class="product">
          <?php
                  foreach($spsale as $u){
                    $priceDinhDang=number_format($u['price'],0,'.','.');
                    $price_saleDingDang=number_format($u['price_sale'],0,'.','.');
                    $linkspct = "index.php?act=product_detail&id_product=" . $u['id_product'];
                    $hinh = $img_path . $u['image'];
                    if ($u['view'] >= 20) {
                        $love = "Yêu thích";
                        $classLove = "product-sale";
                    } else {
                        $love = "";
                        $classLove = "";
                    }
                    if ($u['price_sale'] != 0) {
                        $salePercent = ceil((($u['price'] - $u['price_sale']) / $u['price']) * 100);
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
                                <div class="product-title"><a href="' . $linkspct . '">' . $u['product_name'] . '</a></div>
                                <div class="product-price"><del>' . $priceDinhDang . ' VNĐ</del> ' . $price_saleDingDang . 'VNĐ</div>
                                <div class="buy-now"><a href="index.php?act=buy_now&id_product=' . $u['id_product'] . '">Mua Ngay</a></div>
                                <div class="box-viewStar">
                                    <div class="view-count">Lượt xem: ' . $u['view'] . '</div>
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
                                <div class="product-title"><a href="' . $linkspct . '">' . $u['product_name'] . '</a></div>
                                <div class="product-price"> ' . $priceDinhDang . 'VNĐ</div>
                                <div class="buy-now"><a href="index.php?act=buy_now&id_product=' . $u['id_product'] . '">Mua Ngay</a></div>
                                <div class="box-viewStar">
                                    <div class="view-count">Lượt xem: ' . $u['view'] . '</div>
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
        <!-- END SALE -->

        <!-- ADIDAS -->
        <div class="adidas">
          <h1><a href="index.php?act=product_category&id_category=1">Sản Phẩm Mới </a> </h1>
          <div class="adidas-product">

              <?php
                  foreach($spmoi as $u){
                    $priceDinhDang=number_format($u['price'],0,'.','.');
                    $price_saleDingDang=number_format($u['price_sale'],0,'.','.');
                    $linkspct = "index.php?act=product_detail&id_product=" . $u['id_product'];
                    $hinh = $img_path . $u['image'];
                    if ($u['view'] >= 20) {
                        $love = "Yêu thích";
                        $classLove = "product-sale";
                    } else {
                        $love = "";
                        $classLove = "";
                    }
                    if ($u['price_sale'] != 0) {
                        $salePercent = ceil((($u['price'] - $u['price_sale']) / $u['price']) * 100);
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
                                <div class="product-title"><a href="' . $linkspct . '">' . $u['product_name'] . '</a></div>
                                <div class="product-price"><del>' . $priceDinhDang . ' VNĐ</del> ' . $price_saleDingDang . 'VNĐ</div>
                                <div class="buy-now"><a href="index.php?act=buy_now&id_product=' . $u['id_product'] . '">Mua Ngay</a></div>
                                <div class="box-viewStar">
                                    <div class="view-count">Lượt xem: ' . $u['view'] . '</div>
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
                                <div class="product-title"><a href="' . $linkspct . '">' . $u['product_name'] . '</a></div>
                                <div class="product-price"> ' . $priceDinhDang . 'VNĐ</div>
                                <div class="buy-now"><a href="index.php?act=buy_now&id_product=' . $u['id_product'] . '">Mua Ngay</a></div>
                                <div class="box-viewStar">
                                    <div class="view-count">Lượt xem: ' . $u['view'] . '</div>
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
        <!-- END ADIDAS -->

        <!-- BACKGROUND-CONTAINER -->
        
        
        <!-- END BACKGROUND-CONTAINER -->

        <!-- NIKE  -->
        <div class="adidas">
          <h1><a href="index.php?act=product_category&id_category=2">Được xem nhiều nhất </a></h1>
          <div class="adidas-product">
          <?php
                  foreach($spview as $a){
                    $priceDinhDang=number_format($a['price'],0,'.','.');
                    $price_saleDingDang=number_format($a['price_sale'],0,'.','.');
                    $linkspct = "index.php?act=product_detail&id_product=" . $a['id_product'];
                    $hinh = $img_path . $a['image'];
                    if ($a['view'] >= 20) {
                        $love = "Yêu thích";
                        $classLove = "product-sale";
                    } else {
                        $love = "";
                        $classLove = "";
                    }
                    if ($a['price_sale'] != 0) {
                        $salePercent = ceil((($a['price'] - $a['price_sale']) / $a['price']) * 100);
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
                                <div class="product-title"><a href="' . $linkspct . '">' . $a['product_name'] . '</a></div>
                                <div class="product-price"><del>' . $priceDinhDang . ' VNĐ</del> ' . $price_saleDingDang . 'VNĐ</div>
                                <div class="buy-now"><a href="index.php?act=buy_now&id_product=' . $a['id_product'] . '">Mua Ngay</a></div>
                                <div class="box-viewStar">
                                    <div class="view-count">Lượt xem: ' . $a['view'] . '</div>
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
                                <div class="product-title"><a href="' . $linkspct . '">' . $a['product_name'] . '</a></div>
                                <div class="product-price"> ' . $priceDinhDang . 'VNĐ</div>
                                <div class="buy-now"><a href="index.php?act=buy_now&id_product=' . $a['id_product'] . '">Mua Ngay</a></div>
                                <div class="box-viewStar">
                                    <div class="view-count">Lượt xem: ' . $a['view'] . '</div>
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

        <!-- END NIKE  -->

        <!-- MLB  -->

        
        
        <!-- END MLB  -->
        <div class="shop">
          <div class="shop-text">
            <h1>Về Run Elite</h1> <br> <br>
            <p>
              Hơn 500 mẫu giày nam nữ hợp thời trang tại Shop Giày Run Elite được biết đến là cửa hàng giày replica 1:1 uy tín nhất hiện nay.
               Cung cấp hơn 500 đôi giày replica 1:1, sneaker nam của các thương hiệu như Adidas, Nike, Jordan, Yeezy, Gucci, MLB,… 
               Hàng chuẩn, Like Auth, Giày rep 1:1 với chất lượng tốt nhất, giá rẻ nhất thị trường hiện nay. Giao hàng nhanh toàn quốc, chính sách đổi trả và chính sách bảo hành linh hoạt.
            </p> <br>
            <p>
              Nếu bạn không đủ tài chính để mua một đôi giày chính hãng hoặc gặp khó khăn về việc đặt hàng và size giày, Run Elite sẽ giúp bạn chọn một đôi giày rep 1:1 hợp với đôi chân của bạn.
               Chúng tôi cung cấp các mẫu giày sneaker replica chất lượng với chi tiết chuẩn hàng Auth. Chúng tôi đa dạng về mẫu mã và luôn có sẵn hàng.
            </p> <br>
            <p>
              Hãy đến với Run Elite, Shop Giày Replica để trải nghiệm sự khác biệt về chất lượng và dịch vụ. Chúng tôi sẵn lòng phục vụ bạn và đem đến cho bạn những đôi giày sneaker tuyệt vời mà bạn đang tìm kiếm.
            </p>
               
          </div>
          <div class="shop-image"><img src="image/shopgiay.jpg" alt=""></div>
        </div>

      </div> 

      
      <!-- END CONTAINER -->
    </div>

    