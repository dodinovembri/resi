<script type="text/javascript" language="JavaScript">
					 function konfirmasi()
					 {
					 tanya = confirm("Perbaiki Jalan Ini ?");
					 if (tanya == true) return true;
					 else return false;
					 }
					</script>	
	<!-- Hero section -->
	<section class="hero-section set-bg" >
		<div class="container" id="atas">
			<h2>Konfirmasi</h2>
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
					  $q =mysqli_query($koneksi,"SELECT * FROm alternatif where id_alternatif = '$id' AND status='B'");
					  $d = mysqli_fetch_array($q);
					  return $d['nama_alternatif'];
					 }
					 

					 //Lakukan Normalisasi dengan rumus pada langkah 2
					 //Cari Max atau min dari tiap kolom Matrik
					 $crMax = mysqli_query($koneksi, "SELECT max(C1) as maxC1, 
					      min(C2) as minC2,
					      min(C3) as minC3,
					      min(C4) as minC4,
					      max(C4) as maxC5,
					      max(C4) as maxC6 
					   FROM alternatif");
					 $max = mysqli_fetch_array($crMax);

					 //Proses perangkingan dengan rumus langkah 3
					 $sql3 = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE status='B'");
					 //Buat tabel untuk menampilkan hasil
					 echo "<div class='panel panel-default grid' style='margin-top: 10px;'>
					        <div class='panel-heading' id='jdltblprht'>
					            <i class='icon-table icon-large'></i>
					            Hasil Perankingan
					        </div>
					          <table class='table'>
					            <thead>
					              <tr>
					               <th>No</th>
					               <th>Nama</th>
					               <th>Total Poin</th>
					               <th>SAW</th>
					               <th>Keterangan</th>
					               <th>Tindakan</th>
					              </tr>
					            </thead>
					          </div>
					  ";

					//Kita gunakan rumus (Normalisasi x bobot)
					 while ($dt3 = mysqli_fetch_array($sql3)) {
					  $jumlah= ($dt3['C1'])+($dt3['C2'])+($dt3['C3'])+($dt3['C4'])+($dt3['C5'])+($dt3['C6']);
					  $poin= round(
				       (($dt3['C1']/$max['maxC1'])*$bobot[0])+
				       (($max['minC2']/$dt3['C2'])*$bobot[1])+
				       (($max['minC3']/$dt3['C3'])*$bobot[2])+
				       (($max['minC4']/$dt3['C4'])*$bobot[3])+
				       (($dt3['C5']/$max['maxC5'])*$bobot[4])+
				       (($dt3['C6']/$max['maxC6'])*$bobot[5]),3);
					  $id_alternatif = $dt3['id_alternatif'];

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
					   $penting=1;
					   $hr=1;

					   foreach ($data as $item) { ?>
					   <tbody>
					   <tr class='success'>
					   <td><?php echo $no ?></td>
					   <td><?php echo$item['nama'] ?></td>
					   <td><?php echo$item['jumlah'] ?></td>
					   <td><?php echo$item['poin'] ?></td>
					   <td><?php echo"$h $penting" ?></td>
					   <td>
					     <a href="?module=perbaiki_jalan&id_alternatif=<?php echo $id_alternatif; ?>" onclick="return konfirmasi()">
					     <button class="btn btn-lg btn-primary btn-block">Perbaiki</button></a>
					   </td>
					   </tr>
					   </tbody>
					   <?php
					   $no++;
					   $penting++;

					   }
					   echo "</table>";

					?>

			</div>
		</div>
	</section>
	<!-- Hero section end -->
	<script>
	$(document).ready(function() {
	 $('#example').dataTable( {
	        "language": {
	            "url": "assets/css/datatables/Indonesian.json"
	        }
	    } );
	} );
	</script> 
