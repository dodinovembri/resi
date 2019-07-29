<?php  
	$koneksi = mysqli_connect("localhost", "root", "", "resi");
	if(!$koneksi){
		die ("Database Tidak Dapat Dibuka");
	}
?>