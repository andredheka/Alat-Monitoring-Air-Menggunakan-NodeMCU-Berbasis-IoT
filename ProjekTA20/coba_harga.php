<?php 

// menghubungkan dengan koneksi
include 'koneksi.php';
$total_liter = $_GET['total_liter'];

$ambilbiaya=mysqli_query($koneksi, "SELECT * FROM data_biaya WHERE id=1");
      while($row=mysqli_fetch_array($ambilbiaya))

      {
        $id = $row['id'];
        $harga1 = $row['harga1'];
        $harga2 = $row['harga2'];
        $harga3 = $row['harga3'];
        $total_harga = $row['total_harga'];
}
    if($total_liter<10001){
      $harga1 = $total_liter * 2.700;      
    }else if($total_liter > 10000){
      $harga1 = 10000 * 2.700;
    }

    if($total_liter > 10000 && $total_liter <= 20000){
      $harga2 = ($total_liter - 10000) * 3.600;      
    }else if($total_liter > 20000){
      $harga2 = 10000 * 3.600;
    }

    if($total_liter > 20000){
      $harga3 = ($total_liter - 20000) * 4.400;      
    }

    $total_harga = $harga1 + $harga2 +$harga3;

    mysqli_query($koneksi,"UPDATE projekta set data_sensor='$total_liter','$harga1','$harga2','$harga3','$total_harga' WHERE id=32001");
?>