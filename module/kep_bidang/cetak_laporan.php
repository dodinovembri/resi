<?php include '../koneksi.php';  ?>
<script>
function myFunction() {
  window.print();
}
</script>
<style type="text/css">
	#bd{
		padding: 20px;
	}
	#tb{
		width: 100%;
		border: 2;
	}
	#hd{
		background-color: #2e4847;
		color: #fff;
		height: 30px;
	}
	#hrk{
		height: 2px;
		background-color: #000;
	}
	#hrh{
		height: 5px;
		background-color: #2e4847;
	}
	#im{
		height: 50px;
		width: 50px;
	}
	#fnt{
		font-size: 20pt;
	}
</style>
<body id="bd" onload="myFunction()">
	<?php 		
		$q = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE status='B'");
	?>
	<table>
		<tr>
			<td>
				<img src="../../img/logologo.png" id="im">
			</td>
			<td id="fnt">
				Laporan Perbaikan Jalan <br>PU. Bina Marga OI
			</td>
		</tr>
	</table>
	<hr id="hrh">
	
	<h3>Data Jalan Yang Belum Diperbaiki</h3>
	<table id="tb">
		<tr id="hd">
			<td>No</td>
			<td>Nama Jalan</td>
			<td>Status</td>
		</tr>
		<?php 
			$no = 0;
			while ($r = mysqli_fetch_array($q)) { 
			$no++; ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $r['nama_alternatif']; ?></td>
				<td><?php 
				if ($r['status'] == 'B') {
					$r['status'] = "Belum Diperbaiki";
				}elseif ($r['status'] == 'P') {
					$r['status'] = "Sedang di Proses";
				}elseif ($r['status'] == 'S') {
					$r['status'] = "Selesai";
				}
				echo $r['status']; ?></td>
			</tr>
		<?php } ?>
	</table>
	<hr id="hrk">
	<?php 		
		$q2 = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE status='P'");
	?>

<br><br>
	<h3>Data Jalan Yang Sedang Diperbaiki</h3>
	<table id="tb">
		<tr id="hd">
			<td>No</td>
			<td>Nama Jalan</td>
			<td>Status</td>
		</tr>
		<?php 
			$no = 0;
			while ($r2 = mysqli_fetch_array($q2)) { 
			$no++;	?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $r2['nama_alternatif']; ?></td>
				<td><?php 
				if ($r2['status'] == 'B') {
					$r2['status'] = "Belum Diperbaiki";
				}elseif ($r2['status'] == 'P') {
					$r2['status'] = "Sedang di Proses";
				}elseif ($r2['status'] == 'S') {
					$r2['status'] = "Selesai";
				}
				echo $r2['status']; ?></td>
			</tr>
		<?php } ?>
	</table>
	<hr id="hrk">
	<?php 		
		$q3 = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE status='S'");
	?>

	<br><br>
	<h3>Data Jalan Yang Sudah Diperbaiki</h3>
	<table id="tb">
		<tr id="hd">
			<td>No</td>
			<td>Nama Jalan</td>
			<td>Status</td>
		</tr>
		<?php 
			$no = 0;
			while ($r3 = mysqli_fetch_array($q3)) { 
			$no++; ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $r3['nama_alternatif']; ?></td>
				<td><?php 
				if ($r3['status'] == 'B') {
					$r3['status'] = "Belum Diperbaiki";
				}elseif ($r3['status'] == 'P') {
					$r3['status'] = "Sedang di Proses";
				}elseif ($r3['status'] == 'S') {
					$r3['status'] = "Selesai";
				}
				echo $r3['status']; ?></td>
			</tr>
		<?php } ?>
	</table>
	<hr id="hrk">
</body>
