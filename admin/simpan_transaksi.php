
       <?php 
      include "connection.php";
      
      if(isset($_POST['submit'])){
	$id_barang = $_POST['id_barang'];
	$id_pelanggan= $_POST['id_pelanggan'];	
	$jumlah = $_POST['jumlah'];
	

	$hitung1 = mysqli_query($link,"SELECT * FROM tb_barang where id_barang= '$id_barang'");
	$hitung2 = mysqli_fetch_array($hitung1);
	$stocksekarang = $hitung2 ['stock'];

	if($stocksekarang>=$jumlah){

		//kurangi stock
		$selisih = $stocksekarang-$jumlah;
		 
		//stock cukup
	$insert = mysqli_query($link,"INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `tanggal`, `id_barang`, `jumlah`, `total`) VALUES ('', '$id_pelanggan', current_timestamp(), '$id_barang', '$jumlah', '$total');");
	$update = mysqli_query($link,"UPDATE tb_barang set stock='$selisih' where id_barang='$id_barang'");

	if($insert&&$update){
		header('location:transaksi.php');
	} else {
		echo '
		<script>alert("Gagal Menambah Pesanan Baru");
		window.location.href="transaksi.php"
		</script>
		';
	}
	} else {
		//stok ga cukup
		echo '
		<script>alert("Stok Barang Tidak Mencukupi");
		window.location.href="transaksi.php"
		</script>
		';
	}

}  
                                 
  ?> 
