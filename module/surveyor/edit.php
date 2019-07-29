<?php  
	include 'module/koneksi.php';

	$id_alternatif = $_GET['id_alternatif'];
	$query = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif'");

	while ($row = mysqli_fetch_array($query)) {
		$alt = $row['nama_alternatif'];
		$C1 = $row['C1'];
		if ($C1 == 2){
			$C1_t = "Sepi";
		}
		elseif ($C1 == 3) {
			$C1_t = "Sedang";
		}
		elseif ($C1 == 5) {
			$C1_t = "Ramai";
		}
		// 
		$C2 = $row['C2'];
		if ($C2 == 1){
			$C2_t = "Aspal";
		}
		elseif ($C2 == 2) {
			$C2_t = "Kerikil";
		}
		elseif ($C2 == 4) {
			$C2_t = "Tanah";
		}
		// 
		$C3 = $row['C3'];
		if ($C3 == 1){
			$C3_t = "Rusak Ringan";
		}
		elseif ($C3 == 3) {
			$C3_t = "Rusak Sedang";
		}
		elseif ($C3 == 5) {
			$C3_t = "Rusak Berat";
		}
		// 
		$C4 = $row['C4'];
		if ($C4 == 2){
			$C4_t = "Retak";
		}
		elseif ($C4 == 4) {
			$C4_t = "Bergelombang";
		}
		elseif ($C4 == 5) {
			$C4_t = "Berlubang";
		}
		// 
		$C5 = $row['C5'];
		if ($C5 == 2){
			$C5_t = "Jalan Lokal";
		}
		elseif ($C5 == 3) {
			$C5_t = "Jalan Kolektor";
		}
		elseif ($C5 == 4) {
			$C5_t = "Jalan Arteri";
		}
		// 
		$C6 = $row['C6'];
		if ($C6 == 1){
			$C6_t = "Rendah";
		}
		elseif ($C6 == 3) {
			$C6_t = "Sedang";
		}
		elseif ($C6 == 4) {
			$C6_t = "Tinggi";
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
									<h4 class="fw-title" id="b"><i class="fa fa-pencil"></i></i>Edit Data Kerusakan Jalan</h4>
									<form class="fw-contact-form" action="?module=simpan_update" method="post">
										<div class="cf-inputs">
											<div class="cf-input">
												<label>Nama Jalan</label>
												<input type="text" name="alternatif" class="form-control" placeholder="Nama Jalan" value="<?php echo $alt; ?>" required>
												</input>
											</div>
											<div class="cf-input">
												<input type="hidden" name="id_alternatif" value="<?php echo $id_alternatif; ?>"></input>
												<label>Lalu Lintas tanah</label>
												<select type="text" class="form-control" name="C1" placeholder="Lalu Lintas Tanah" required>
													<option value="<?php echo $C1; ?>"><?php echo $C1_t; ?></option>
													<option value="2">Sepi</option>
													<option value="3">Sedang</option>
													<option value="5">Ramai</option>
												</select>
											</div>
											<div class="cf-input">
												<label>Jenis Permukaan</label>
												<select type="text" class="form-control" name="C2" placeholder="Jenis Permukaan" required>
													<optionvalue="<?php echo $C2; ?>"><?php echo $C2_t; ?></option>
													<option value="1">Aspal</option>
													<option value="2">Kerikil</option>
													<option value="4">Tanah</option>
												</select>
											</div>
											<div class="cf-input">
												<label>Kondisi Jalan</label>
												<select type="text" class="form-control" name="C3" placeholder="Kondisi Jalan" required>
													<option value="<?php echo $C3; ?>"><?php echo $C3_t; ?></option>
													<option value="1">Rusak Ringan</option>
													<option value="3">Rusak Sedang</option>
													<option value="5">Rusak Berat</option>
												</select>
											</div>
											<div class="cf-input">
												<label>Jenis Kerusakan</label>
												<select type="text" class="form-control" name="C4" placeholder="Jenis Kerusakan" required>
													<option value="<?php echo $C4; ?>"><?php echo $C4_t; ?></option>
													<option value="2">Retak</option>
													<option value="4">Bergelombang</option>
													<option value="5">Berlubang</option>
											</select>
											</div>
											<div class="cf-input">
												<label>Fungsi Jalan</label>
												<select type="text" class="form-control" name="C5" placeholder="Fungsi Jalan" required>
													<option value="<?php echo $C5; ?>"><?php echo $C5_t; ?></option>
													<option value="2">Jalan Lokal</option>
													<option value="3">Jalan Kolektor</option>
													<option value="4">Jalan Arteri</option>
											</select>
											</div>
											<div class="cf-input">
												<label>Desakan Masyarakat</label>
												<select type="text" class="form-control" name="C6" placeholder="Desakan Masyarakat" required>
													<option value="<?php echo $C6; ?>"><?php echo $C6_t; ?></option>
													<option value="1">Rendah</option>
													<option value="3">Sedang</option>
													<option value="4">Tinggi</option>
											</select>
											<br>
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
		</div>