<?php  
	include 'module/koneksi.php';

	$id = $_GET['id_alternatif'];
	$query = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE id_alternatif='$id'");
	while ($row = mysqli_fetch_array($query)) {
		$id_alternatif = $row['id_alternatif'];
		$nama_alternatif = $row['nama_alternatif'];
		$C1 = $row['C1'];
	}

?>
<!-- Footer section -->
	<footer class="footer-section set-bg" data-setbg="img/bg2.jpg">
		<div class="footer-warp">
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
									<h4 class="fw-title"><i class="fa fa-pencil"></i></i>Ubah Alternatif</h4>
									<form class="fw-contact-form" action="?module=simpan" method="post">
										<div class="cf-inputs">
											<div class="cf-input">
												<input type="text" name="id_alternatif" value="<?php echo $id_alternatif; ?>" placeholder="ID Alternatif" required>
											</div>
											<div class="cf-input">
												<input type="text" name="nama_alternatif" class="cf-input" placeholder="Nama Alternatif" value="<?php echo $nama_alternatif; ?>" required>
											</div>
											<div class="cf-input">
												<input type="text" name="C1" class="cf-input" placeholder="Bobot" value="<?php echo $C1; ?>" required>
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