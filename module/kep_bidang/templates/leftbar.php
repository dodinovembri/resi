<?php
?>
			<!-- Navigation Menu -->
			<ul class="main-menu">
				<li <?php if ($_GET['module'] == 'home') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=home">Home</a></li>
				<li <?php if ($_GET['module'] == 'laporan_perbaikan_jalan') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=laporan_perbaikan_jalan">Laporan</a></li>
				<li <?php if ($_GET['module'] == 'cetak_laporan') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="module/kep_bidang/cetak_laporan.php" target="_blank">Cetak Laporan</a></li>
              <li <?php if ($_GET['module'] == 'password') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=password">Profile</a></li>
			</ul>
			<a href="?module=logout" class="site-btn sb-big">Logout</a>
		</div>
	</header>
	<!-- Header section end -->