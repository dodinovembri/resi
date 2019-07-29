<?php  
	include 'module/koneksi.php';

	$username = $_GET['username'];
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
	while ($row = mysqli_fetch_array($query)) {
		$id = $row['id'];
		$username = $row['username'];
		$nama = $row['nama'];
		$jabatan = $row['jabatan'];
		$id_role = $row['role'];
		$role = $row['role'];
		if ($role == 1) {
			$role = "Admin";
		}elseif ($role == 2) {
			$role = "Kepala Bidang";
		}elseif ($role == 3) {
			$role = "Seksi Perbaikan";
		}
		elseif ($role == 4) {
			$role = "Surveyor";
		}
		else{
			$role = "Belum Diatur";
		}
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
									<h4 class="fw-title" id="b"><i class="fa fa-pencil"></i>Ubah User</h4>
									<form class="fw-contact-form" action="?module=simpan_edit_user" method="post">
										<input type="hidden" name="id" value="<?= $id; ?>">
										<div class="cf-inputs">
											<div class="cf-input">
												<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username" required>
											</div>
											<div class="cf-input">
												<input type="text" name="nama" class="cf-input" placeholder="Nama" value="<?php echo $nama; ?>" required>
											</div>
											<div class="cf-input">
												<input type="text" name="jabatan" class="cf-input" placeholder="Jabatan" value="<?php echo $jabatan; ?>" required>
											</div>				
											<div class="cf-input">		
												<br>															
												<div class="col-sm-10">
													<select name="role" class="form-control" required>
													<option value="<?= $id_role; ?>"><?= $role; ?></option>
													<?php 
													$query = mysqli_query($koneksi, "SELECT * FROM role");
													while ($row = mysqli_fetch_array($query)) { ?>
															<option value="<?php echo $row['id_role'] ?>"><?php echo $row['role']; ?></option>  
														<?php
														}
													?>
													</select><br>                            
												</div>
											</div>				
										</div>
										</div>
										<button type="submit" class="site-btn">Simpan</button>
									</form>
								</div> 
							</div>
						</div>	
					</div>
					<div class="col-xl-4 col-lg-5 offset-xl-1 offset-lg-0 offset-md-0">
						<div class="footer-widget contact-widget">
							
						</div>
					</div>
				</div>
			</div>