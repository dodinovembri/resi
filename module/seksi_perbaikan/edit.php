<?php
	include 'module/koneksi.php';

	$id_alternatif = $_GET['id_alternatif'];

	$query_pegawai = mysqli_query($koneksi, "UPDATE `alternatif` SET status='S' WHERE `id_alternatif`='$id_alternatif'");
			
	
	echo "<script>window.location.href = '?module=progress';</script>";

?>