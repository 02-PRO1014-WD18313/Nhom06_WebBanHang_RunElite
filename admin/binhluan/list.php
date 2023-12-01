
<section class="attendance main">
        <div class="attendance-list">
          <h1>Danh sách Bình luận</h1>
          <table class="table" >
            <thead>
              <tr>
                <th>id_binhluan</th>
                <th>Nội dung</th>
                <th>Id_user</th>
             
                <th>date</th>   
              </tr>
            </thead>
            <tbody>
                <?php 
                 foreach($listbinhluan as $result ):
                  extract($result);
                 ?>
                  
                   <?php

                    echo '
                    <tr>
                    <td>'.$result['id_binhluan'].'</td>
                    <td>'.$result['noidung'].'</td>
                    <td>'.$result['username'].'</td>
                 
                    <td>'.$date.'</td>
            
                  
                    ';
                 
                ?>

            </tbody>
            <?php endforeach;?>
           
          </table>
         
        </div>
      </section>