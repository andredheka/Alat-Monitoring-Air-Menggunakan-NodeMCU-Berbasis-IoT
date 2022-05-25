<?php
include('koneksi.php');

$id          	= $_POST['id'];
$nama 		   	= $_POST['nama'];
$alamat       = $_POST['alamat'];
$bulan		  	= $_POST['bulan'];
$liter_awal		= $_POST['liter_awal'];
$liter_akhir 	= $_POST['liter_akhir'];
$total_liter	= $_POST['total_liter'];
$total_harga 	= $_POST['total_harga'];
$liter        = $_POST['liter'];

   
    $harga1 = 0;
    $harga2 = 0;
    $harga3 = 0;
    $harga4 = 0;

    $liter = $total_liter-$liter_awal;

if($liter <= 10000){
      $harga1 = $liter * 2.700;      
    }else if($liter > 10000){
      $harga1 = 10000 * 2.700;
    }

    if($liter > 10000 && $liter <= 20000){
      $harga2 = ($liter - 10000) * 3.600;      
    }else if($liter > 20000){
      $harga2 = 10000 * 3.600;
    }

    if($liter > 20000 && $liter <= 30000){
      $harga3 = ($liter - 20000) * 4.400;      
    }else if($liter > 30000){
      $harga3 = 10000 * 4.400;
    }

    if($liter > 30000){
      $harga4 = ($liter - 30000) * 5.300;      
    }

    $total_harga = $harga1 + $harga2 +$harga3 +$harga4;



$input = mysqli_query($koneksi, "INSERT INTO data_pemakaian (id, nama, alamat, bulan, liter_awal, liter_akhir,liter, total_harga) VALUES ('$id', '$nama', '$alamat','$bulan','$liter_awal','$total_liter','$liter','$total_harga')");

if ($input == TRUE) {
    header("location: tabel_pemakaian.php");
} else {
    echo "Input Gagal";
}