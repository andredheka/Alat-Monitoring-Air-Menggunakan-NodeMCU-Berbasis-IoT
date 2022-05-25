<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $alamat = $_POST['alamat'];

    // query update data
    $query = "UPDATE data_pengguna SET nama_pengguna = '$nama_pengguna', alamat = '$alamat' WHERE id = $id";
    if(mysqli_query($koneksi, $query)){
        header("Location: tabel_pengguna.php");
    }else{
        echo "Edit Data Gagal";
    }
}


$id = $_GET['id']; // id berasal dari url
$query = "SELECT * FROM data_pengguna WHERE id = $id";
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

        <!-- Begin Page Content -->
        <div class="container-fluid">
          
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit Data Pengguna</h1>

          <div class="container ">

        <!--  Card Example -->

         <?php while($row = mysqli_fetch_assoc($data)){ ?>
        <form action="edit.php" method="post">
        <div class="form-group">
            <label>Id :</label>
            <input type="text" name="id" readonly="" class="form-control" required="required" value="<?php echo $row['id']; ?>" placeholder="Masukan Id" >
        </div>
        <div class="form-group">
            <label>Nama Pengguna :</label>
            <input type="text" name="nama_pengguna" class="form-control"  value="<?php echo $row['nama_pengguna']; ?>" placeholder="Masukan Nama Pengguna" required="" >
        </div>
        <div class="form-group">
            <label>Alamat :</label>
            <input type="text" name="alamat" class="form-control"  value="<?php echo $row['alamat']; ?>" placeholder="Masukan Alamat" required="" />
        </div>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button type="submit" name="submit" class="btn btn-primary">Edit Data</button>

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


</body>

</html>