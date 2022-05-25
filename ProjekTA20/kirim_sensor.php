<?php

include ("koneksi.php");

$id = $_GET['id'];
$kec_air = $_GET['kec_air'];
$total_liter = $_GET['total_liter'];


$result = mysqli_query($koneksi, "UPDATE data_alatsensor SET kec_air='$kec_air', total_liter='$total_liter' WHERE id=$id");


if (!$result)
	{
	die('invalid query :'.mysqli_error($koneksi));
	}

?>