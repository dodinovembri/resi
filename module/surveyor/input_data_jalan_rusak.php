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
									<h4 class="fw-title" id="b"><i class="fa fa-pencil"></i></i>Input Data Kerusakan Jalan</h4>
									<form class="fw-contact-form" action="?module=simpan" method="post">
										<div class="cf-inputs">
											<div class="cf-input">
												<label>Nama Jalan</label>
												<input type="text" name="alternatif" class="form-control" placeholder="Nama Jalan" required>
												</input>
											</div>
											<div class="cf-input">
												<label>Lalu Lintas harian</label>
												<select type="text" class="form-control" name="C1" placeholder="Lalu Lintas Tanah" required>
													<option></option>
													<option value="2">Sepi</option>
													<option value="3">Sedang</option>
													<option value="5">Ramai</option>
												</select>
											</div>
											<div class="cf-input">
												<label>Jenis Permukaan</label>
												<select type="text" class="form-control" name="C2" placeholder="Jenis Permukaan" required>
													<option></option>
													<option value="1">Aspal</option>
													<option value="2">Kerikil</option>
													<option value="4">Tanah</option>
												</select>
											</div>
											<div class="cf-input">
												<label>Kondisi Jalan</label>
												<select type="text" class="form-control" name="C3" placeholder="Kondisi Jalan" required>
													<option></option>
													<option value="1">Rusak Ringan</option>
													<option value="3">Rusak Sedang</option>
													<option value="5">Rusak Berat</option>
												</select>
											</div>
											<div class="cf-input">
												<label>Jenis Kerusakan</label>
												<select type="text" class="form-control" name="C4" placeholder="Jenis Kerusakan" required>
													<option></option>
													<option value="2">Retak</option>
													<option value="4">Bergelombang</option>
													<option value="5">Berlubang</option>
											</select>
											</div>
											<div class="cf-input">
												<label>Fungsi Jalan</label>
												<select type="text" class="form-control" name="C5" placeholder="Fungsi Jalan" required>
													<option></option>
													<option value="2">Jalan Lingkungan</option>
													<option value="3">Jalan Lokal</option>
													<option value="4">Jalan Kolektor Primer</option>
											</select>
											</div>
											<div class="cf-input">
												<label>Desakan Masyarakat</label>
												<select type="text" class="form-control" name="C6" placeholder="Desakan Masyarakat" required>
													<option></option>
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