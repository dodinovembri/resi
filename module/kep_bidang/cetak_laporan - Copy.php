<script>
function myFunction() {
  window.print();
}
</script>
		<body onload="myFunction()">
				<?php
                $koneksi = mysqli_connect("localhost", "root", "", "resi");
                $sqlSelect = "SELECT * FROM laporan";
                $result = mysqli_query($koneksi, $sqlSelect); ?>
				<?php

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

				 //Proses perangkingan dengan rumus langkah 3
				 $sql3 = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE status='B'");
				 //Buat tabel untuk menampilkan hasil
				 echo "        
						   <table border='2'>
				            <thead>
				              <tr>
				               <th>No</th>
				               <th>Nama Jalan</th>
				               <th>Urgensi</th>
				               <th>Status</th>
				              </tr>
				            </thead>
				          </div>
				          ";

				//Kita gunakan rumus (Normalisasi x bobot)
				 while ($dt3 = mysqli_fetch_array($sql3)) {
				  $jumlah= ($dt3['C1'])+($dt3['C2'])+($dt3['C3'])+($dt3['C4'])+($dt3['C5'])+($dt3['C6']);
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
				   $juara=1;
				   $hr=1;

				   foreach ($data as $item) { ?>
				   <tr class='success'>
				   <td><?php echo $no ?></td>
				   <td><?php echo$item['nama'] ?></td>
				      <td><?php echo"$h $juara" ?></td>
				   <td>logika kalo dah diacc perbaiki statusnya diperbaiki kalo belum statusnya menunggu konfirmasi</td>

				   </tr>
				   <?php
				   $no++;
				   $juara++;

				   }
				   echo "</table>";

				?>
</body>
