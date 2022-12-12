
<?php  
	$host="localhost";
	$username="root";
	$password="";
	$database="pt_ktm";

	$link=mysqli_connect($host,$username,$password,$database);
	if (!$link) {
	 	# code...
	 die("database tidak tehubung".mysql_connect_errno()." - ".mysql_connect_error());
	//$pilih_database=mysqli_select_db($connection,$database);

	//if ($pilih_database) {
		# code...
	//	echo "";
	//}
	//	else{

	//		echo "gagal brooooo";
	}
?>