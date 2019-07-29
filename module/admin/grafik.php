<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>
<script src="js/export-data.js"></script>
	<!-- Hero section -->
	<section class="hero-section set-bg" >
		<div class="container" id="atas">	
			<h3>Grafik</h3>
			<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
			     $no = 1;
			     while ($dt = mysqli_fetch_array($sql)) {
			      $jumlah= ($dt['C1'])+($dt['C2'])+($dt['C3'])+($dt['C4'])+($dt['C5'])+($dt['C6']);
			     
			     $no++;
			     }
			    

			     //Lakukan Normalisasi dengan rumus pada langkah 2
			     //Cari Max atau min dari tiap kolom Matrik
			     $crMax = mysqli_query($koneksi, "SELECT max(C1) as maxC1, 
			          max(C2) as maxC2,
			          max(C3) as maxC3,
			          max(C4) as maxC4,
			          max(C5) as maxC5,
			          max(C6) as maxC6   
			       FROM alternatif");
			     $max = mysqli_fetch_array($crMax);

			     //Hitung Normalisasi tiap Elemen
			     $sql2 = mysqli_query($koneksi, "SELECT * FROM alternatif");
			     //Buat tabel untuk menampilkan hasil
			  
			     $no = 1;
			     while ($dt2 = mysqli_fetch_array($sql2)) {
			     
			     $no++;
			     }
			     echo "</table>";

			     //Proses perangkingan dengan rumus langkah 3
			     $sql3 = mysqli_query($koneksi, "SELECT * FROM alternatif");
			     //Buat tabel untuk menampilkan hasil
			    

			    //Kita gunakan rumus (Normalisasi x bobot)
			     while ($dt3 = mysqli_fetch_array($sql3)) {
			      $jumlah= ($dt3['C1'])+($dt3['C2'])+($dt3['C3'])+($dt3['C4']);
			      $poin= round(
			       (($dt3['C1']/$max['maxC1'])*$bobot[0])+
			       (($dt3['C2']/$max['maxC2'])*$bobot[1])+
			       (($dt3['C3']/$max['maxC3'])*$bobot[2])+
			       (($dt3['C4']/$max['maxC4'])*$bobot[3])+
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
			       $h="Penting";
			       $penting=1;
			       $hr=1;

			       foreach ($data as $item) { ?>
			       <?php
			       $no++;
			       $penting++;
			       

			       }			       

			    ?>
			
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