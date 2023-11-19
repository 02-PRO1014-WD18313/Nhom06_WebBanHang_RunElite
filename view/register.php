<?php
// session_start();
// if( isset($_POST['dangnhap'])){
//     $Username = $_POST['Username'];
//     $password = $_POST['password'];

//     if($Username == 'admin@gmail.com' && $password =='123'){

//         header('location:login.php');
//     }
//     else{
//         echo "tài khoản hoặc mật khẩu sai";
//     }
// }

?>


<section class="container-login forms">
    <div class="form login">
        <div class="form-content">
            <h2>Welcom to</h2>
            <h1>Run ELite</h1>
            <form action="index.php?act=dangky" method="post">
                <div class="field input-field">
                    <label for="">Username</label><br>
                    <input type="text" placeholder="Username" class="input" name="user">
                </div>


               
                <span style="color: red;"><?php echo isset($thongbaoerr) ? $thongbaoerr : "" ?></span>


                <div class="field input-field">
                    <label for="">Email</label><br>
                    <input type="email" placeholder="Email" class="input" name="email">
                </div>

                <div class="field input-field">
                    <label for="password">Password</label> <br>
                    <input type="password" name="matkhau" id="matkhau" placeholder="Mật khẩu của bạn">


                </div>
                <p style="margin-left:15px;margin-top:20px;"> <?php echo isset($thongbaopass) ? $thongbaopass : "" ?></p>
               
                <div class="field input-field">
                    <label for="password"> Nhập lại Password</label> <br>
                    <input type="password" name="confirm-matkhau" id="confirm-matkhau" placeholder="Nhập lại mật khẩu">

                </div>
                <p style="margin-left:15px;margin-top:20px;"> <?php echo isset($thongbaorepass) ? $thongbaorepass : "" ?> </p>
               
                <div class="form-link">
                    <input type="checkbox" name="show-matkhau" id="show-matkhau" onclick="hienmatkhau()">
                    <label for="show-matkhau">Hiện mật khẩu</label>
                    <a href="#" class="forgot-pass">Forgot password?</a>
                </div>
                <div class="button-login">
                    <input type="submit" value="Đăng ký" name="dangky">
                </div>
                <p style="margin-left:15px;margin-top:20px;">
                    <?php echo isset($thongbao) ? $thongbao : "" ?>
                </p>
                <p style="margin-left:15px;margin-top:20px;">
                    <?php echo isset($thongbaoall) ? $thongbaoall : "" ?>
                </p>




            </form>

            <div class="form-register">
                <span>Have an account? <a href="index.php?act=dangnhap" class="link signup-link">Login</a></span>
            </div>
        </div>

    </div>
    <div class="login-image">
        <img src="image/l.jpg" alt="">
    </div>

</section>