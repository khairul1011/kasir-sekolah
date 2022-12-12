<?php
include ("connection.php");
if (isset($_GET["id_barang"])) {
	$id_barang = $_GET["id_barang"]; 
	$query = "DELETE FROM tb_barang WHERE id_barang='$id_barang' "; $hasil_query = mysqli_query($link, $query);
if(!$hasil_query){
	die ("gagal hapus data: ".mysqli_errno($link).
     " - ".mysqli_error($link));
 }
}
header("location:tampil_barang.php");
?>