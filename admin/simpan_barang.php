<?php

include "connection.php";


if($_POST['submit']){
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg','jfif','gif');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);	
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, '../admin/upload/image/'.$nama);
						$query = mysqli_query($link,"INSERT INTO tb_barang (id_barang,nama_barang,harga,stock,foto)
					 VALUES(NULL, '".$_POST['nama_barang']."','".$_POST['harga']."','".$_POST['stock']."','$nama')");
					if($query){
						echo "<script>window.alert('Data Berhasil di Tambahkan')</script>";
						echo "<meta http-equiv='refresh' content='0; url=tampil_barang.php'>";
					}else{
						echo "<script>window.alert('Gagal Mengupload Gambar')</script>";
						echo "<meta http-equiv='refresh' content='0; url=form_tambah_barang.php'>";
					}
				}else{
					echo "<script>window.alert('Ukuran File Terlalu Besar')</script>";
					echo "<meta http-equiv='refresh' content='0; url=form_tambah_barang.php'>";
				}
			}else{
				echo "<script>window.alert('Pilih Gambar terlebih Dahulu/Ekstensi File Tidak Diperbolehkan')</script>";
						echo "<meta http-equiv='refresh' content='0; url=form_tambah_barang.php'>";
			}
		}