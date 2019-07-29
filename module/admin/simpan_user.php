<?php  
	include 'module/koneksi.php';

	$username = $_POST['username'];
	$nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $role = $_POST['role'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    while ($row = mysqli_fetch_array($query)) {
        $username_db = $_row['username'];
    }
	if ($username_db == $username){
        echo "<script>window.alert('Data Sudah Ada')</script>";    
        echo "<script>window.location.href = '?module=tambah_user';</script>";    
    }else{
        $query = mysqli_query($koneksi, "INSERT INTO user (username, nama, jabatan, password, role) VALUES ('$username', '$nama', '$jabatan', '$password', '$role')");
        echo "<script>window.location.href = '?module=user';</script>";
    }
?>