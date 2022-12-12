<?php 
if(@($_GET['hal']=='barang')){

	include "tampil_barang.php";

}
	if(@($_GET['hal']=='tambahbarang')){

		include "tambah_barang.php";
	}


 ?>