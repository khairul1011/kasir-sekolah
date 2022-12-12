<?php
include ("connection.php");
if (isset($_GET["id_pelanggan"])) {
	$id_pelanggan = $_GET["id_pelanggan"]; $query = "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan' "; $hasil_query = mysqli_query($link, $query);
if(!$hasil_query){
	die ("gagal hapus data: ".mysqli_errno($link).
     " - ".mysqli_error($link));
 }
}
header("location:pelanggan.php");
?>