<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';


$id = $_GET['id']; // id berasal dari url
$query = "SELECT * FROM data_alatsensor INNER JOIN data_pengguna ON data_alatsensor.id = data_pengguna.id where data_pengguna.id like '%". $id."%'";
$data = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Projek TA | Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-th-large"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN<sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="input_data.php">
          <i class="fas fa-edit"></i>
          <span>Input Data</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tabel_pengguna.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Pengguna</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tabel_pemakaian.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Pemakaian</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          

          <!-- Topbar Navbar -->
          
            <!-- Nav Item - Alerts -->
            

            <!-- Nav Item - Messages -->
           
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
                <div class="container-fluid">

        <!-- /.container-fluid -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Rekap Biaya Perbulan</h1>

          <div class="container ">

        <!--  Card Example -->

        <?php while($row = mysqli_fetch_assoc($data)){ ?>
        <form action="proses_biaya.php" method="post">
        <div class="form-group">
            <label>Id Pengguna</label>
            <input type="text" name="id" readonly="" class="form-control" required="required" value="<?php echo $row['id']; ?>" placeholder="Masukan Id" >
        </div>
        <div class="form-group">
            <label>Nama Pengguna :</label>
            <input type="text" name="nama" readonly="" class="form-control"  value="<?php echo $row['nama_pengguna']; ?>" placeholder="Masukan Nama Pengguna" required="" >
        </div>
        <div class="form-group">
            <label>Alamat </label>
            <input type="text" name="alamat" readonly="" class="form-control"  value="<?php echo $row['alamat']; ?>" placeholder="Masukan Alamat" required="" />
        </div>
        <div class="form-group">
            <label>Bulan </label>
            <select name="bulan" class="form-control">
            <option selected="selected">---Pilih Bulan---</option>
            <?php
            $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            $jml_bln=count($bulan);
            for($a=0; $a<$jml_bln; $a+=1){
                echo"<option value=$bulan[$a]> $bulan[$a] </option>";
            }
            ?>
            </select>
        </div>
        <div class=""></div>
    <?php
      $id = $_GET['id'];
      $ambildata=mysqli_query($koneksi, "SELECT * FROM data_pemakaian WHERE data_pemakaian.id LIKE '%". $id."%' UNION SELECT * FROM data_pemakaian WHERE data_pemakaian.id LIKE '%". $id."%' ORDER BY liter_akhir DESC LIMIT 1" );
      while($row1=mysqli_fetch_array($ambildata)){
     
    ?>
        <div class="form-group">
            <label>Meteran Bulan Lalu :</label>
            <input type="text" name="liter_awal" class="form-control" value="<?php echo $row1['liter_akhir'];?>" placeholder="0" required="" />
        </div>
        <?php

      }
    ?>
        <div class="form-group">
            <label>Meteran Saat Ini :</label>
            <input type="text" name="total_liter" class="form-control"  value="<?php echo $row['total_liter']; ?>" placeholder="Liter" required="" />
        </div>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button type="submit" name="submit" class="btn btn-primary">Proses Data</button>

    </form>
 <?php
    } // end while
 
    mysqli_close($koneksi); // menutup koneksi ke database

    ?>
 

        </div>

        </div>
       


        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; ADP 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


</body>

</html>