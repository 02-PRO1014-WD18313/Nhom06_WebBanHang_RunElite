
<?php

// update_taikhoan($id_user, $tentk, $password, $gmail, $role);
function update_taikhoan($id_user, $username, $password, $gmail, $phone, $role, $address )
{
   
        $sql = "update user set id_user='" . $id_user . "', username='" . $username . "', password='" . $password . "'  ,
        gmail='" . $gmail . "', phone='" . $phone . "', role='" . $role . "', address='" . $address . "'
         where id_user=" . $id_user;

    pdo_execute($sql);
}

function loadone_taikhoan($id)
{
    $sql = "select * from user where id_user=" . $id;
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function loadall_taikhoan(){
    $sql="select * from user";
    $listtaikhoan = pdo_query($sql);
    return  $listtaikhoan;
}

function delete_taikhoan($id)
{
    $sql = "delete from user where id_user =" . $id;
    pdo_execute($sql);
}

function themtaikhoan($user,$pass,$email){
    $sql="INSERT INTO user (username,password,gmail) VALUES ( '$user', '$pass','$email')";
    pdo_execute($sql);
}
function checkuser($user){
    $sql="SELECT * FROM user WHERE username='$user'";
    $result=pdo_query_one($sql);
    return $result;
}
function dangnhap($user,$pass){
    $sql="SELECT * FROM user WHERE username='$user' and password='$pass'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}
?>