<?php
?>
			<!-- Navigation Menu -->
			<ul class="main-menu">
				<li <?php if ($_GET['module'] == 'home') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=home">Home</a></li>
				<li <?php if ($_GET['module'] == 'input_data_jalan_rusak') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=input_data_jalan_rusak">Input Jalan Rusak</a></li>
				<li <?php if ($_GET['module'] == 'tampil') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=tampil">Jalan Rusak</a></li>
              <li <?php if ($_GET['module'] == 'password') {
                echo 'class="active launcher"';
              } else{echo 'class="launcher"';} ?>><a href="?module=password">Profile</a></li>
			</ul>
			<a href="?module=logout" class="site-btn sb-big">Logout</a>
		</div>
	</header>
	<!-- Header section end -->