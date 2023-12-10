

<body>
    <?php

    ?>
    <div class="container-cart">
        <h1>  Giỏ hàng  </h1>
        <form id="cart-form" action="cart.php?action=submit" method="POST">
            <table>
                <?php
                viewCart(1);
                ?>
            </table>
           
        </form>
        <a href="index.php?act=buycart"><input class="button_order" type="submit"  value="Mua Hàng"></a>
        
     
    </div>
    
</body>