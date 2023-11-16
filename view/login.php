<?php
    // session_start();

    // if( isset($_POST['dangnhap'])){
    //     $Username = $_POST['Username'];
    //     $password = $_POST['password'];

    //     if($Username == 'admin@gmail.com' && $password =='123'){
    //         $_SESSION['Username']= $Username;
    //         header('location:trangchu.php');
    //     }
    // }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>
<body>
    <section class="container-login forms"> 
        <div class="form login">      
            <div class="form-content">
                <h2>Welcom to</h2>
                <h1>Run ELite</h1>
                <form action="index.php?act=dangnhap" method="POST">
                    <div class="field input-field">
                        <label for="">Username</label><br>
                        <input type="text" name="username" placeholder="Username" class="input" >
                    </div>

                    <div class="field input-field">
                        <label for="password">Password</label> <br>
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="form-link">
                        <input type="checkbox" onclick="showPassword()">ShowPassword
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>
                    
                    <div class="button-login">
                <input type="submit" value="Đăng Nhập" name="dangnhap">
                </div>
                <p style="color: red; font-size:15px ;  font-weight:bold ; margin-top:20px;">
                <?php
                if(isset($thongbaoerr)&& ($thongbaoerr!="")){
                    echo $thongbaoerr;
                }
                ?>
                </p>
               
                </form>
              
                <div class="or">Or Continue</div>
                <div class="mxh">
                    <button><i class="fa-brands fa-facebook"></i>Facebook</button>
                    <button><i class="fa-brands fa-google"></i>Google</button>
                </div>
                <div class="form-register">
                    <span>Don't have an account? <a href="index.php?act=dangky" class="link signup-link">Signup</a></span>
                </div>
            </div>
            
        </div>
        <div class="login-image">
            <img src="image/l.jpg" alt="">
        </div>        
</section>
<script src="../js/main.js"></script>
</body>
</html>