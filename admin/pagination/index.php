<!DOCTYPE html>
<html lang="en">
<head>
  <title>Maribelajarcoding.com - Pagination dengan PHP dan Mysql</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- css bootstrap -->
  <link rel="stylesheet" href="bootstrap-4.3.1/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="bootstrap-4.3.1/js/bootstrap.min.js"></script>
</head>
<body>


  
<div class="container">
  <div align="center">
    <h3><b>Pagination PHP dan Mysql</b></h3>
    <h4><b>maribelajarcoding.com</b></h4>
  </div>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
      </tr>
    </thead>  
    <tbody>
      <?php
      include "koneksi.php";
      
      $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
      
      // Jumlah data per halaman
      $limit = 5;

      $limitStart = ($page - 1) * $limit;
                
      $SqlQuery = mysqli_query($con, "SELECT * FROM Siswa LIMIT ".$limitStart.",".$limit);
      
      $no = $limitStart + 1;
      
      while($row = mysqli_fetch_array($SqlQuery)){ 
      ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $row['Nama']; ?></td>
          <td><?php echo $row['Alamat']; ?></td>
          <td><?php echo $row['JenisKelamin']; ?></td>
        </tr>
      <?php           
      }
      ?>
    </tbody>      
  </table>
  <div align="right">
    <ul class="pagination">
      <?php
      // Jika page = 1, maka LinkPrev disable
      if($page == 1){ 
      ?>        
        <!-- link Previous Page disable --> 
        <li class="disabled"><a href="#">Previous</a></li>
      <?php
      }
      else{ 
        $LinkPrev = ($page > 1)? $page - 1 : 1;
      ?>
        <!-- link Previous Page --> 
        <li><a href="index.php?page=<?php echo $LinkPrev; ?>">Previous&nbsp</a></li>
      <?php
        }
      ?>

      <?php
      $SqlQuery = mysqli_query($con, "SELECT * FROM Siswa");        
      
      //Hitung semua jumlah data yang berada pada tabel Sisawa
      $JumlahData = mysqli_num_rows($SqlQuery);
      
      // Hitung jumlah halaman yang tersedia
      $jumlahPage = ceil($JumlahData / $limit); 
      
      // Jumlah link number 
      $jumlahNumber = 1; 

      // Untuk awal link number
      $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
      
      // Untuk akhir link number
      $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
      
      for($i = $startNumber; $i <= $endNumber; $i++){
        $linkActive = ($page == $i)? ' class="active"' : '';
      ?>
        <li<?php echo $linkActive; ?>><a href="index.php?page=<?php echo $i; ?>"><?php echo '&nbsp',$i,'&nbsp'; ?></a></li>
      <?php
        }
      ?>
      
      <!-- link Next Page -->
      <?php       
      if($page == $jumlahPage){ 
      ?>
        <li class="disabled"><a href="#">Next</a></li>
      <?php
      }
      else{
        $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
      ?>
        <li><a href="index.php?page=<?php echo $linkNext; ?>">&nbsp Next</a></li>
      <?php
      }
      ?>
    </ul>
  </div>
</div>

</body>
</html>