<?php 

// menghubungkan dengan koneksi
include 'koneksi.php';

$id = $_GET['id']; 
$query = "SELECT * FROM data_sensor INNER JOIN data_pengguna ON data_sensor.id = data_pengguna.id where data_pengguna.id like '%". $id."%'";
$data = mysqli_query($koneksi, $query);

?>

<?php
//definisikan setiap variabel yang digunakan
   
    $harga1 = 0;
    $harga2 = 0;
    $harga3 = 0;
    $liter_awal= 0.0;
    $liter_akhir= 0.0;
    $liter = 0.0;
    $total_harga = 0;
    $sepuluh =10000;


if(isset($_POST['liter_awal'])and
        ($_POST['liter_akhir']))
{

    $liter_awal = $_POST['liter_awal'];    #mengambil nilai didalam
    $liter_akhir = $_POST['liter_akhir'];    #formulir sesuai name yang ada
    
    $liter = $liter_akhir-$liter_awal;

    if($liter<=10000){
      $harga1 = $liter * 2.700;      
    }else if($liter > 10000){
      $harga1 = 10000 * 2.700;
    }

    if($liter > 10000 && $liter <= 20000){
      $harga2 = ($liter - 10000) * 3.600;      
    }else if($liter > 20000){
      $harga2 = 10000 * 3.600;
    }

    if($liter > 20000){
      $harga3 = ($liter - 20000) * 4.400;      
    }

    $total_harga = $harga1 + $harga2 +$harga3;
}
?>

<html>
<title>Perhitungan</title>
<?php while($row = mysqli_fetch_assoc($data)){ ?>
<form action="coba_biaya.php" method="post">
    
    <label>Debit Bulan Sebelumnya</label><br/>
    <input type="text" name="liter_awal" value="<?php echo $liter_awal?>" placeholder="masukkan angka"><br/>
    <label>Debit Bulan Sekarang</label><br/>
    <input type="text" name="liter_akhir" value="<?php echo $row['total_liter'];?>" placeholder="masukkan angka"><br/>
    <input type="submit" value="Kerjakan"><br/>
    <br/>
    <label>Harga 1</label>
    <input type="text" name="harga1" value="<?php echo $harga1?>" placeholder="masukkan angka"><br/>
    <label>Harga 2</label>
    <input type="text" name="harga2" value="<?php echo $harga2?>" placeholder="masukkan angka"><br/>
    <label>Harga 3</label>
    <input type="text" name="harga3" value="<?php echo $harga3?>" placeholder="masukkan angka"><br/>
    <label>Total   :</label>
    <input type="text" value="<?php echo $total_harga?>"/>
</form>
 <?php
    }
        mysqli_close($koneksi); // menutup koneksi ke database

    ?>
</html>
