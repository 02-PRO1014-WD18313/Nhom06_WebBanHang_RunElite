
<section class="attendance main">
        <div class="attendance-list">
          <h1>Danh sách tài khoản</h1>
          <table class="table" >
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Mật khẩu</th>
                <th>gmail</th>
                <th>Điện thoại</th>
                <th>role</th>   
                <th>Địa chỉ</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php 


                 foreach($listtaikhoan as $taikhoan ){
                  
                    extract($taikhoan);

                    $suatk="index.php?act=suatk&id_user=".$id_user;
                    $xoatk="index.php?act=xoatk&id_user=".$id_user;
                    echo '
                    <tr>
                    <td>'.$id_user.'</td>
                    <td>'.$username.'</td>
                    <td>'.$password.'</td>
                    <td>'.$gmail.'</td>
                    <td>'.$phone.'</td>
                    <td>'.$role.'</td>
                    <td>'.$address.'</td>
            
                    <td>
                    <a href="'.$suatk.'"><button>Sửa</button></a>
                     / 
                     <a href="'.$xoatk.'"><button>Xóa</button></a></td>
                  </tr>
                    ';
                 }
                ?>

            </tbody>
           
          </table>
         
        </div>
      </section>