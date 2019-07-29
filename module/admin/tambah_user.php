 <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
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
									<h4 class="fw-title" id="b"><i class="fa fa-plus"></i>Tambah User</h4>
									<form class="fw-contact-form" action="?module=simpan_user" method="post">
										<div class="cf-inputs">
											<div class="cf-input">
												<input type="text" name="username" placeholder="Username" required>
											</div>
											<div class="cf-input">
												<input type="text" name="nama" class="cf-input" placeholder="Nama" required>
											</div>
											<div class="cf-input">
												<input type="text" name="jabatan" class="cf-input" placeholder="Jabatan" required>
											</div>
											<div class="cf-input">		
												<br>															
												<div class="col-sm-10">
													<select name="role" class="form-control" required>
													<option></option>
													<?php 
													include 'module/koneksi.php';
													$query = mysqli_query($koneksi, "SELECT * FROM role");
													while ($row = mysqli_fetch_array($query)) { ?>
															<option value="<?php echo $row['id_role'] ?>"><?php echo $row['role']; ?></option>  
														<?php
														}
													?>
													</select><br>                            
												</div>
											</div>	
											<div class="cf-input">
											<input type="password" name="password" id="txtPassword" placeholder="Password" required><br>
											</div>
											<div class="cf-input">
												<input type="password" name="password" id="txtConfirmPassword" placeholder="Konfirmasi Password" required>               
											</div>
										</div>
										<button type="submit" class="site-btn" onclick="return Validate()">Simpan</button>
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