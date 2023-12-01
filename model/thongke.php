<?php
        function loadall_thongke(){

            

            $sql="select category.id_category as madm, category.category_name as tendm,(product.product_name) as tensp , count(product.id_product) as countsp, (product.price) as gia " ;
            $sql.=" from product left join category on category.id_category=product.id_category";
            $sql.=" group by category.id_category order by category.id_category desc";
            $listthongke=pdo_query($sql);
            return $listthongke;
            
        }
        ?>