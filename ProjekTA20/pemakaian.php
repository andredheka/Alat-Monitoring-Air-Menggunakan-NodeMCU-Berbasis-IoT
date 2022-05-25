<?php

include ("koneksi.php");

$result = mysqli_query($koneksi,"INSERT INTO datasensor (id,debit_air,total_volume) VALUES ('".$_GET["id"]."','".$_GET["debit_air"]."','".$_GET["total_volume"]."')");

if (!$result)
	{
	die('invalid query :'.mysqli_error($koneksi));
	}
?>