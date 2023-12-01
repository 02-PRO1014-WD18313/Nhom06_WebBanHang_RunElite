<div style="cmt">
            <div class="box_title">BÌNH LUẬN</div>
            <div class="box_content2  product_portfolio binhluan ">
                <table >
                    <?php foreach($binhluan as $value): ?>
                    <tr>
                        <td><?php echo $value['noidung']?></td>
                        <td><?php echo $value['name_binhluan']?></td>
                        <td><?php echo date("d/m/Y", strtotime($value['date'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
            <div >
                <form action="index.php?act=sanphamct&idsp=<?=$id?>" method="POST">
                    <?php             
                        if(isset($_SESSION['user'])){
                            echo '
                                <input type="hidden" name="idproduct" value="'.$id.'">
                                <input type="text" name="noidung">
                                <input type="submit" name="guibinhluan" value="Gửi bình luận">
                                
                                <a href="'.$xoabl.'"><button>Xóa</button></a></td>
                            ';
                        }else{
                            echo '
                                <input class="band" type="text" value="Đăng nhập để bình luận" readonly>
                            ';
                        }
                    ?>                 
                </form>
            </div>