<?php  

	include 'module/koneksi.php';

	$id_alternatif = $_POST['id_alternatif'];
	$alternatif = $_POST['alternatif'];
	$C1 = $_POST['C1'];
	$C2 = $_POST['C2'];
	$C3 = $_POST['C3'];
	$C4 = $_POST['C4'];
	$C5 = $_POST['C5'];
	$C6 = $_POST['C6'];

	$query = mysqli_query($koneksi, "UPDATE alternatif SET `nama_alternatif`='$alternatif', `C1`='$C1', `C2`='$C2', `C3`='$C3', `C4`='$C4', `C5`='$C5', `C6`='$C6' WHERE id_alternatif='$id_alternatif' ");
	if (!$query) {
		die("Perubahan Gagal");
	}
	
	echo "<script>window.location.href = '?module=tampil';</script>";

?>