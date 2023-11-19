
<section class="attendance main">
        <div class="attendance-list">
          <h1>Danh Mục</h1>
          <table class="table" >
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên Danh Mục</th>
               
                <th >Action</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                 foreach($listdm as $danhmuc ){
                  
                    extract($danhmuc);
                    $suadm="index.php?act=suadm&id=".$id_category;
                    $xoadm="index.php?act=xoadm&id=".$id_category;
                    echo '
                    <tr>
                    <td>'.$id_category.'</td>
                    <td>'.$category_name.'</td>
                 
                    <td>
                    <a href="'.$suadm.'"><button>Sửa</button></a>
                     / 
                     <a href="'.$xoadm.'"><button>Xóa</button></a></td>
                  </tr>
                    ';
                 }
                ?>

            </tbody>
           
          </table>
         
        </div>
      </section>