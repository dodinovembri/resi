<?php  
	include 'module/koneksi.php';

	$id = $_GET['id'];
	$query = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE kode_kriteria='$id'");
	while ($row = mysqli_fetch_array($query)) {
		$kode_kriteria = $row['kode_kriteria'];
		$nama_kriteria = $row['nama_kriteria'];
		$bobot_kriteria = $row['bobot_kriteria'];
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
									<h4 class="fw-title" id="b"><i class="fa fa-pencil"></i>Edit Kriteria</h4>
									<form class="fw-contact-form" action="?module=simpan" method="post">
										<div class="cf-inputs">
											<div class="cf-input">
												<input type="text" name="kode_kriteria" value="<?php echo $kode_kriteria; ?>" placeholder="ID Kriteria" required>
											</div>
											<div class="cf-input">
												<input type="text" name="nama_kriteria" class="cf-input" placeholder="Nama Kriteria" value="<?php echo $nama_kriteria; ?>" required>
											</div>
											<div class="cf-input">
												<input type="text" name="bobot_kriteria" class="cf-input" placeholder="Bobot" value="<?php echo $bobot_kriteria; ?>" required>
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