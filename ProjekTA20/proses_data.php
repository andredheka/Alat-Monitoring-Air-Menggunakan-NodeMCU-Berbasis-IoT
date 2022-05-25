<?php
include('koneksi.php');

$id           	= $_POST['id'];
$nama_pengguna  = $_POST['nama_pengguna'];
$alamat         = $_POST['alamat'];


$input = mysqli_query($koneksi, "INSERT INTO data_pengguna (id, nama_pengguna, alamat) VALUES ('$id', '$nama_pengguna', '$alamat')");
$input2 = mysqli_query($koneksi, "INSERT INTO data_alatsensor (id) VALUES ('$id')");

if ($input == TRUE) {
    header("location: tabel_pengguna.php");
} else {
    echo "Input Gagal";
}