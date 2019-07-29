<?php
	include 'module/koneksi.php';

	$id_alternatif = $_GET['id_alternatif'];

	$query_pegawai = mysqli_query($koneksi, "DELETE FROM `alternatif` where `id_alternatif`='$id_alternatif'");
			
	
	echo "<script>window.location.href = '?module=tampil';</script>";

?>