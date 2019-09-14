<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<!-- Hero section -->
	<section class="hero-section set-bg" >
		<div class="container" id="atas">
			<h2>Perhitungan</h2>
			<div class="hero-slider owl-carousel">
				<?php
			      include 'module/koneksi.php';

			      $query_bobot = mysqli_query($koneksi, "SELECT * FROM kriteria");
			      while ($row_bobot = mysqli_fetch_array($query_bobot)) {
			        $bobot[] = $row_bobot['bobot_kriteria'];
			      }    

			     //Buat fungsi tampilkan nama
			     function getNama($id){
			      global $koneksi;
			      $q =mysqli_query($koneksi,"SELECT * FROm alternatif where id_alternatif = '$id'");
			      $d = mysqli_fetch_array($q);
			      return $d['nama_alternatif'];
			     }
			     
			     //Setelah bobot terbuat select semua di tabel Matrik
			     $sql = mysqli_query($koneksi, "SELECT * FROM alternatif");
			     //Buat tabel untuk menampilkan hasil
			     echo "<div class='panel panel-default grid' style='margin-top: 10px;'>
			     <div class='panel-heading' id='jdltblprht'>
			            <i class='icon-table icon-large'></i>
			            Matrik Awal
			          </div>
			     <table class='table'>
			     <thead>
			      <tr>
			       <th>Id Alternatif</td>
			       <th>Nama</th>
			       <th>C1</th>
			       <th>C2</th>
			       <th>C3</th>
			       <th>C4</th>
			       <th>C5</th>
			       <th>C6</th>
			       <th>Jumlah poin</th>
			       <thead>
			      </tr>
			      </thead>
			      </div>";
			     $no = 1;
			     while ($dt = mysqli_fetch_array($sql)) {
			      $jumlah= ($dt['C1'])+($dt['C2'])+($dt['C3'])+($dt['C4'])+($dt['C5'])+($dt['C6']);
			      echo "<tbody><tr class='success'>
			       <td>$no</td>
			       <td>".getNama($dt['id_alternatif'])."</td>
			       <td>$dt[C1]</td>
			       <td>$dt[C2]</td>
			       <td>$dt[C3]</td>
			       <td>$dt[C4]</td>
			       <td>$dt[C5]</td>
			       <td>$dt[C6]</td>
			       <td>$jumlah</td>
			      </tr>
			      </tbody>";
			     $no++;
			     }
			     echo "</table>";

			     //Lakukan Normalisasi dengan rumus pada langkah 2
			     //Cari Max atau min dari tiap kolom Matrik
			     $crMax = mysqli_query($koneksi, "SELECT max(C1) as maxC1, 
			          min(C2) as minC2,
			          min(C3) as minC3,
			          min(C4) as minC4,
			          max(C5) as maxC5,
			          max(C6) as maxC6   
			       FROM alternatif");
			     $max = mysqli_fetch_array($crMax);

			     //Hitung Normalisasi tiap Elemen
			     $sql2 = mysqli_query($koneksi, "SELECT * FROM alternatif");
			     //Buat tabel untuk menampilkan hasil
			     echo "<div class='panel panel-default grid'>
			     <div class='panel-heading' id='jdltblprht'>
			            <i class='icon-table icon-large'></i>
			            Matrik Normalisasi
			          </div>
			     <table class='table'>
			     <thead>
			      <tr>
			       <th>Id Alternatif</th>
			       <th>Nama</th>
			       <th>C1</th>
			       <th>C2</th>
			       <th>C3</th>
			       <th>C4</th>
			       <th>C5</th>
			       <th>C6</th>
			      </tr>
			      </thead>
			      </div>
			      ";
			     $no = 1;
			     while ($dt2 = mysqli_fetch_array($sql2)) {
			      echo "<tbody>
			      <tr class='danger'>
			       <td>$no</td>
			       <td>".getNama($dt2['id_alternatif'])."</td>
			       <td>".round($dt2['C1']/$max['maxC1'],2)."</td>
			       <td>".round($max['minC2']/$dt2['C2'],2)."</td>
			       <td>".round($max['minC3']/$dt2['C3'],2)."</td>
			       <td>".round($max['minC4']/$dt2['C4'],2)."</td>
			       <td>".round($dt2['C5']/$max['maxC5'],2)."</td>
			       <td>".round($dt2['C6']/$max['maxC6'],2)."</td>
			      </tr>
			      </tbody>";
			     $no++;
			     }
			     echo "</table>";

			     //Proses perangkingan dengan rumus langkah 3
			     $sql3 = mysqli_query($koneksi, "SELECT * FROM alternatif");
			     //Buat tabel untuk menampilkan hasil
			     echo "<div class='panel panel-default grid'>
			     <div class='panel-heading' id='jdltblprht'>
			            <i class='icon-table icon-large'></i>
			            Perankingan
			          </div>
			     <table class='table'>
			     <thead>
			      <tr>
			       <th>No</th>
			       <th>Nama</th>
			       <th>Total Poin</th>
			       <th>SAW</th>
			       <th>Keterangan</th>
			      </tr>
			      <thead>
			      </div>
			      ";

			    //Kita gunakan rumus (Normalisasi x bobot)
			     while ($dt3 = mysqli_fetch_array($sql3)) {
			      $jumlah= ($dt3['C1'])+($dt3['C2'])+($dt3['C3'])+($dt3['C4'])+($dt['C5'])+($dt['C6']);
			      $poin= round(
			       (($dt3['C1']/$max['maxC1'])*$bobot[0])+
			       (($max['minC2']/$dt3['C2'])*$bobot[1])+
			       (($max['minC3']/$dt3['C3'])*$bobot[2])+
			       (($max['minC4']/$dt3['C4'])*$bobot[3])+
			       (($dt3['C5']/$max['maxC5'])*$bobot[4])+
			       (($dt3['C6']/$max['maxC6'])*$bobot[5]),3);

			      $data[]=array('nama'=>getNama($dt3['id_alternatif']),
			          'jumlah'=>$jumlah,
			          'poin'=>$poin);

			     }


			    //mengurutkan data
			       foreach ($data as $key => $isi) {
			        $nama[$key]=$isi['nama'];
			        $jlh[$key]=$isi['jumlah'];
			        $poin1[$key]=$isi['poin'];
			       }
			       array_multisort($poin1,SORT_DESC,$jlh,SORT_DESC,$data);
			       $no=1;
			       $h="Prioritas";
			       $prioritas=1;
			       $hr=1;

			       foreach ($data as $item) { ?>
			       <tbody>
			       <tr class="warning">
			       <td><?php echo $no ?></td>
			       <td><?php echo$item['nama'] ?></td>
			       <td><?php echo$item['jumlah'] ?></td>
			       <td><?php echo$item['poin'] ?></td>
			       <td><?php echo"$h $prioritas" ?></td>
			       </tr>
			       </tbody>
			       <?php
			       $no++;
			       $prioritas++;
			       

			       }
			       echo "</table>";

			    ?>
			    
			</div>
		</div>
	</section>
	<!-- Hero section end -->

<script type="text/javascript">                                   
  Highcharts.chart('container', {
  	 chart: {
    	type: 'column'
  	},

    title: {
      text: '  '
    },

    yAxis: {
      title: {
        text: 'Kepentingan'
      }
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },
     xAxis: {
                      categories: <?php echo json_encode($nama); ?>,
                  },

    series: [{
      name: 'Jalan Rusak',
      data: <?php echo json_encode($poin1); ?>
    }],

    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            layout: 'Line Kata',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }]
    }

  });
</script>