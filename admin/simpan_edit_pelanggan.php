<?php 
include ('connection.php');
$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$notelpon = ($_POST['notelpon']);
$alamat = $_POST['alamat'];


mysqli_query($link,"UPDATE pelanggan set nama_pelanggan='$nama_pelanggan', notelpon='$notelpon', alamat='$alamat' where id_pelanggan='$id_pelanggan'");

echo "<script>window.alert ('data berhasil update');window.location=('pelanggan.php');</script>";
 ?>