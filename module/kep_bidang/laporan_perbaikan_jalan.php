<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>
<script src="js/export-data.js"></script>
	<!-- Hero section -->
	<section class="hero-section set-bg">
		<div class="container" id="atas">
			<h2>Laporan Perbaikan Jalan</h2>
			<?php include 'module/koneksi.php'; 
			$q = mysqli_query($koneksi, "SELECT count(*) as jumlah FROM alternatif GROUP BY status"); 
			while ($r = mysqli_fetch_array($q)) {
			 	$jumlah[] = $r['jumlah'];
			 } 
			 foreach ($jumlah as $key => $value) {
			 	$array[] = (int)$value;
			 }			
			 ?>

			 <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		</div>
	</section>
<script type="text/javascript">
	
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Grafik Perbaikan Jalan'
  },  
  xAxis: {
    categories: [
      'Belum',
      'Proses',
      'Sudah'
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Jumlah'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Grafik',
    data: <?php echo json_encode($array); ?>

  }]
});
</script>