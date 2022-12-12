<?php 
session_start();
require 'connection.php';
if(isset($_POST['login'])){
  //initiate variable
  $username = $_POST['username'];
  $password = $_POST['password'];

  $check = mysqli_query($link,"SELECT * FROM tb_user where username='$username' and password='$password' ");
  $hitung = mysqli_num_rows($check);

  if($hitung>0){
    //jika datanya ditemukan
    //berhasil login
    $_SESSION['login'] = 'True';
    header('location:beranda.php');
  } else {
    echo '
    <script>alert("Username atau password salah");
    window.location.href="login.php"
    </script>
    ';
  }
}


if(isset($_SESSION['login'])) {

} else {
	header('location:login/loginnew.php');
}

 ?>