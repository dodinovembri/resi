<?php 
	include 'module/koneksi.php';
	$id = $_POST['id'];
	$username = $_POST['username'];
	$nama = $_POST['nama'];
	$password = md5($_POST['password']);

	$query_update = mysqli_query($koneksi, "UPDATE user SET username='$username', `nama`='$nama', password='$password' WHERE id='$id'");
	echo "<script>window.alert('Data Telah Diubah Silahkan Login Kembali')</script>";
	session_destroy();
	echo "<script>window.location.href = 'index.php';</script>";	
?>