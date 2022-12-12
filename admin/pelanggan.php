<?php 
include 'ceklogin.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">


<!-- untuk calender -->

  <link href="dtp/jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="dtp/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="dtp/jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="dtp/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="dtp/jquery-ui-1.11.4/jquery-ui.theme.css">
  <script>
   $(document).ready(function(){
    $("#tanggal").datepicker({
    })
   })
  </script>
</head>

  <title>Program Kasir</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- titik di text angka -->

  <script type="text/javascript" src="my.js"></script>

  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

 
</head>

<body>

  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="#" class="logo">Program  <span class="lite">Kasir</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
       
      </div>
      <!--  
      <div class="top-nav notification-row">-->
        <!-- notificatoin dropdown start-->
        <!--  -->
        <ul class="nav pull-right top-menu">

         </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
         
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="../admin/beranda.php?hal=Home">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
            </a>
          </li>
          
          </div>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!-- Sesion -->
                            <?php
                            if (@$_SESSION['id_login']) {
                              $user_terlogin= @$_SESSION['nama_admin'];
                            }
                            ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Form Pelanggan</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="../admin/beranda.php?hal=Home">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-file-text-o"></i>Form elements</li>
            </ol>
          </div>
        </div>
        <div class="row">
              <div class="col-md-12">
                    <div class="text-left">
                       <a href="form_tambah_pelanggan.php" class="btn btn-primary">Tambah Pelanggan Baru <i class="fa fa-arrow-circle-right"></i></a>
                        <br>
                        <br>
                    </div>
               </div>
        </div> 
         
      <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Pelanggan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive ">
                                  <!-- Tambahkan dibawah ini script tampil data BARANG -->
                                <?php 
                                  include "connection.php";
                                 $tampilpelanggan = mysqli_query($link,"SELECT * FROM pelanggan order by id_pelanggan desc");
                                 $i = 1;
                                 ?>
                               

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    

                                    <thead class="tabel1">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pelanggan</th>
                                                <th>No Hp</th>
                                                <th>Alamat</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                             <!-- lanjutan script disini -->
                                             <?php 
                                             while ($data=mysqli_fetch_array($tampilpelanggan)){
                                              ?>

                                            <tr class="odd gradeX tabel1">
                                                  <td><?php echo $i++;?></td>
                                                  <td><?php echo $data['nama_pelanggan'];?></td>
                                                  <td><?php  echo $data['notelpon'];?></td>
                                                  <td><?php echo $data['alamat'];?></td>
                                                  <td><a href="form_edit_pelanggan.php?id=<?php echo $data['id_pelanggan']; ?>"><button class="btn btn-success "><i class= "icon_cogs"></i>Edit</button></a></td>
                                                  <td><a class="btn btn-danger" onclick="return confirm('Yakin Akan Hapus Data ?')" href="hapus_pelanggan.php?id_pelanggan=<?php echo $data['id_pelanggan']?>">Delete</a></td></td>
                                           </tr>
                                    </tbody>

                                    <?php
                                       }
                                    ?>
                                </table>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://www.instagram.com/khairul1011/">khairul anuar</a>
        </div>
    </div>
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg -->
  <script src="js/jquery.hotkeys.js"></script>
  <script src="js/bootstrap-wysiwyg.js"></script>
  <script src="js/bootstrap-wysiwyg-custom.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/daterangepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>



  <script>

function kalkulatorTambah(type1,type2){
var hasil = eval(type1) - eval(type2);
document.getElementById('result').innerHTML = hasil;
}
</script>
 <script type="text/javascript" src="vanilla-tilt.min.js"></script>

</body>


</html>
