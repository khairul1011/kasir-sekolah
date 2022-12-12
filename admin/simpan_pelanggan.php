<?php
include'connection.php'; 

$nama_pelanggan = $_POST['nama_pelanggan'];
$notel =($_POST['notel']);
$alamat = $_POST['alamat'];
$submit=$_POST['submit'];


if ($submit) {
	// code...
	$query="INSERT INTO `pelanggan`(`id_pelanggan`, `nama_pelanggan`, `notelpon`, `alamat`) VALUES ('','$nama_pelanggan','$notel','$alamat');";
	$hasil=mysqli_query($link,$query);
	 echo "<script>window.alert ('data berhasil disimpan');window.location=('pelanggan.php');</script>";
}
?>