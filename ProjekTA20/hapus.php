<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel

$id = $_GET['id'];
// query SQL untuk insert data
$query="DELETE from data_pengguna where id='$id'";
mysqli_query($koneksi, $query);
$query2="DELETE from data_alatsensor where id='$id'";
mysqli_query($koneksi, $query2);

mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:tabel_pengguna.php");
?>