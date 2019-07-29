<?php
	include 'module/koneksi.php';
	$id = $_GET['id'];
	
	$query = "DELETE FROM `user` where `id`='$id'";
	$hasil = mysqli_query($koneksi,$query);
	
	if (!$hasil)
		die ("Penghapusan gagal!!!");
	
	echo "<script>window.location.href = '?module=user';</script>";

?>