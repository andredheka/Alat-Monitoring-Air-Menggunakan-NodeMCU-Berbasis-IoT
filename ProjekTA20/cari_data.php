<?php
include('koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ADP Projek</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v1.1.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">MONITORING AIR<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php">Cek Meteran Air</a></li>
          <li><a href="login.php" target="_blank">Login</a></li>
          
        </nav><!-- .nav-menu -->

      </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <!-- End Hero -->

    <main id="main">

      <!-- ======= Featured Services Section ======= -->
      <!-- ======= About Section ======= -->
    
    <?php 
    if (isset($_GET['cari'])) {
      $cari = $_GET['cari'];
      $data = mysqli_query($koneksi, "SELECT * FROM data_alatsensor INNER JOIN data_pengguna ON data_alatsensor.id = data_pengguna.id where data_pengguna.id like '%". $cari."%'");
    }
        while ($d = mysqli_fetch_array($data)) {
      ?>

      <br>
      <br>
      <br>
      <br>
      <br>
      <!-- ======= Pricing Section ======= -->
      <section id="pricing" class="pricing">
        <div class="container container-centered" data-aos="fade-up">

          <div class="section-title">
            <h2>Meteran</h2>
            <h3>Cek Data <span>Meteran</span></h3>

          </div>

          <div class="row row-centered">
            <div class="col-lg-12 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
              <div class="box featured">
                <h3>Data Anda
                <?php 
                if (isset($_GET['cari'])) {
                  $cari = $_GET['cari'];
                  echo "Dengan No Id Pengguna : ".$cari."<br/>";
                }
                ?>
              </h3>
                <ul>
                  <li>Nama Pengguna  : <?php echo $d['nama_pengguna']; ?></li>
                  <li>Alamat  : <?php echo $d['alamat']; ?></li>
                  <h6>Meteran Saat Ini  : <span> <?php echo $d['total_liter']; ?> </span> Liter</h6>
                <?php } ?>
              </ul>
              <div class="btn-wrap">
                <a href="index.php" class="btn-buy">OK</a>
              </div>
            </div>
          </div>

        </div>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pemakaian Air Perbulan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
       <tr>
           <th>No</th>
           <th>Pemakaian Bulan</th>
           <th>Meteran Bulan Lalu</th>
           <th>Meteran Bulan Ini</th>
           <th>Total Pemakaian</th>
           <th>Total Biaya</th>
       </tr>
       </thead>

       <tbody>
<?php
      $id = $_GET['cari'];
      $ambildata=mysqli_query($koneksi, "SELECT * FROM data_pemakaian WHERE  data_pemakaian.id LIKE '%". $id."%'" );
      $no_urut=0;
      while($row1=mysqli_fetch_array($ambildata)){
      $no_urut++;
?>

       <tr>
           <td><?php echo $no_urut ?></td>
           <td><?php echo $row1['bulan'];?></td>
           <td><?php echo $row1['liter_awal'];?> Liter</td>
           <td><?php echo $row1['liter_akhir'];?> Liter</td>
           <td><?php echo $row1['liter'];?> Liter</td>
           <td>Rp. <?php echo $row1['total_harga'];?></td>
       </tr>
<?php
}
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


          
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>ADP 2020</span></strong>. Andre Dheka Permana
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>