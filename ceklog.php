<?php

session_start();
include "koneksi.php";

@$pass = md5($_POST['pwd']);
@$myname = mysqli_escape_string($conn, $_POST['myname']);
@$password = mysqli_escape_string($conn, $pass);


$login = mysqli_query($conn, "SELECT * FROM t_log where username='$myname' and  password= '$password' and status='aktif'");
$dt = mysqli_fetch_array($login);

if($dt){
    $_SESSION['id_user'] = $dt['id_user'];
    $_SESSION['username'] = $dt['username'];
    $_SESSION['password'] = $dt['password'];
    $_SESSION['nama_pengguna'] = $dt['nama_pengguna'];


    header("location:admin.php");
    

}else{
    echo "<script>alert('Login anda Gagal');
    document.location= 'index.php';
    </script>";
}


?>