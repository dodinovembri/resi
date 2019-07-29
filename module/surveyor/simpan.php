<?php  

	include 'module/koneksi.php';

	$alternatif = $_POST['alternatif'];
	$C1 = $_POST['C1'];
	$C2 = $_POST['C2'];
	$C3 = $_POST['C3'];
	$C4 = $_POST['C4'];
	$C5 = $_POST['C5'];
	$C6 = $_POST['C6'];

	$query = mysqli_query($koneksi, "INSERT INTO alternatif (`nama_alternatif`, `C1`, `C2`, `C3`, `C4`, `C5`, `C6`) VALUES ('$alternatif', '$C1', '$C2', '$C3', '$C4', '$C5', '$C6')");
	if (!$query) {
		die("Penyimpanan Gagal");
	}
	
	echo "<script>window.location.href = '?module=tampil';</script>";

?>