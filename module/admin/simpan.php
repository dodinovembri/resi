<?php  
	include 'module/koneksi.php';

	$kode_kriteria = $_POST['kode_kriteria'];
	$nama_kriteria = $_POST['nama_kriteria'];
	$bobot_kriteria = $_POST['bobot_kriteria'];

	$query = mysqli_query($koneksi, "UPDATE kriteria SET nama_kriteria='$nama_kriteria', bobot_kriteria='$bobot_kriteria' WHERE kode_kriteria='$kode_kriteria'");
	if (!$query) {
		die("Penyimpanan gagal !!");
	}

	echo "<script>window.location.href = '?module=kriteria';</script>";
?>