
<section class="main">
    <!-- content  -->
    <section class="attendance">
        <div class="attendance-list">
            <h1 style="color: #0db5a3; font-size:30px;">Thống kê sản phẩm</h1>
            <div class="box_search">
            <div class="box-dm">

</div>
    </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Danh mục</th>
                        <th>Tên sản phẩm</th>   
                        <th>Số lượng</th>
                        <th>giá</th>
                        <!-- <th colspan="2" style="text-align: center;">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listthongke as $thongke) {
                        extract($thongke);

                    
                        echo '<tr>
                                        <td>' . $madm . '</td>
                                        <td>' . $tendm . '</td>
                                        <td>' . $tensp . '</td>
                                        <td>' . $countsp . '</td>
                                        <td>' . $gia . '</td>
                                      </tr>';
                    }
                    ?>



                </tbody>

            </table>

        </div>
    </section>
</section>