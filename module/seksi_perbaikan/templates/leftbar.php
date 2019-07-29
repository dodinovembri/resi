<?php
?>
			<!-- Navigation Menu -->
			<ul class="main-menu">
				<li <?php if ($_GET['module'] == 'home') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=home">Home</a></li>
				<li <?php if ($_GET['module'] == 'pilih_jalan_yang_akan_diperbaiki') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=pilih_jalan_yang_akan_diperbaiki">Konfirmasi</a></li>
				<li <?php if ($_GET['module'] == 'progress') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=progress">Progress</a></li>
              <li <?php if ($_GET['module'] == 'sudah_diperbaiki') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=sudah_diperbaiki">Selesai</a></li>
              <li <?php if ($_GET['module'] == 'password') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=password">Profile</a></li>
			</ul>
			<a href="?module=logout" class="site-btn sb-big">Logout</a>
		</div>
	</header>
	<!-- Header section end -->