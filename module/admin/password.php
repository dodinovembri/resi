 	  	<?php 
			include 'module/koneksi.php';
			$ses_username = $_SESSION['username'];
			$query_passsword = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$ses_username'");
			while ($row_password = mysqli_fetch_array($query_passsword)) {
			 	$id = $row_password['id'];
			 	$username = $row_password['username'];
			 	$nama =$row_password['nama'];	 	
			 } 
		?>

	<!-- Footer section -->
	<footer class="footer-section set-bg">
		<div class="footer-warp" id="atas">
			<div class="footer-widgets">
				<div class="row">
					<div class="col-xl-7 col-lg-7">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-6">
								<div class="footer-widget about-widget">
									
									
									<div class="fw-social">
										
									</div>
								</div> 
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 offset-xl-2 offset-lg-1 offset-md-0">
								<div class="footer-widget list-widget">
								</div> 
							</div>
						</div>	
					</div>
					<div class="col-xl-4 col-lg-5 offset-xl-1 offset-lg-0 offset-md-0">
						<div class="footer-widget contact-widget">
							<h4 class="fw-title" id="b"><i class="fa fa-key"></i>Ubah Password</h4>
							<form class="fw-contact-form" method="post" action="?module=update_password">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<div class="cf-inputs">
									<div class="cf-input">
										<input type="text" name="username" placeholder="Usermame" value="<?php echo $username; ?>" required" >
									</div>
									<div class="cf-input">
										<input type="text" name="nama" class="cf-input" placeholder="Nama" value="<?php echo $nama; ?>" required">
									</div>
									<div class="cf-input">
										<input type="password" name="password" class="cf-input" placeholder="Password Baru">
									</div>
									<div class="cf-input">
										<input type="password" name="password" class="cf-input" placeholder="Konfirmasi Password">
									</div>
								</div>
								<button type="submit" name="submit" class="site-btn">Simpan Perubahan</button>
							</form>
						</div>
					</div>
				</div>
			</div>