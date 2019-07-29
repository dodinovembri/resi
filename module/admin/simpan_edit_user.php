<?php  
?>
<?php 
	include 'module/koneksi.php';
	$id = $_POST['id'];
	$username = $_POST['username'];
	$nama = $_POST['nama'];
	$jabatan = $_POST['jabatan'];
	$id_role = $_POST['role'];

	$query_update = mysqli_query($koneksi, "UPDATE user SET username='$username', nama='$nama', jabatan='$jabatan', role='$id_role' WHERE id='$id'");
	
	echo "<script>window.location.href = '?module=user';</script>";
?>