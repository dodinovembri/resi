<?php
?>
			<!-- Navigation Menu -->
			<ul class="main-menu">
				<li <?php if ($_GET['module'] == 'home') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=home">Home</a></li>
				<li <?php if ($_GET['module'] == 'user') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=user">User</a></li>
                <li <?php if ($_GET['module'] == 'kriteria') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=kriteria">Kriteria</a></li>
				<li <?php if ($_GET['module'] == 'alternatif') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=alternatif">Alternatif</a></li>
              <li <?php if ($_GET['module'] == 'perhitungan') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=perhitungan">Perhitungan</a></li>
              <li <?php if ($_GET['module'] == 'grafik') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=grafik">Grafik</a></li>
              <li <?php if ($_GET['module'] == 'password') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=password">Profile</a></li>
			</ul>
			<a href="?module=logout" class="site-btn sb-big">Logout</a>
		</div>
	</header>
	<!-- Header section end -->