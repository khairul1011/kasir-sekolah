<?php
//include "../connection.php";
$con = mysqli_connect("localhost","root","","pt_ktm");


$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tanggal = $_POST['tanggal'];
$submit = $_POST['submit'];
 
function ubahTanggal($tanggal){
 $pisah = explode('/',$tanggal);
 $array = array($pisah[2],$pisah[0],$pisah[1]);
 $satukan = implode('-',$array);
 return $satukan;
}
 
$tgl_terbit = ubahTanggal($tanggal);
 
if(isset($submit)){
 if(empty($judul) or empty($penulis) or empty($tanggal)){
  echo"<script>window.alert('Maaf,Form tidak boleh kosong....!!!');window.location=('index.html');</script>";
 }else{
  $ins = mysqli_query($con,"insert into cerdas(judul,penulis,tgl_terbit) values ('$judul','$penulis','$tgl_terbit')");
  echo"<script>window.alert('Data Berhasil diupload');window.location=('index.html');</script>";
 }
}
 
?>