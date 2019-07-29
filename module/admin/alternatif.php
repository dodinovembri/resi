<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus Data ?");
 if (tanya == true) return true;
 else return false;
 }</script>

<?php  
  include 'module/koneksi.php';

  $query_nama = mysqli_query($koneksi, "SELECT nama_kriteria from kriteria");
  while ($nm = mysqli_fetch_array($query_nama)) {
    $nama_kriteria[] = $nm['nama_kriteria'];
  }

?>
	<!-- Hero section -->
	<section class="hero-section set-bg" >
		<div class="container" id="atas">
			<h2>Alternatif</h2>
			<div class="hero-slider owl-carousel">
				<table id="example" class="table" cellspacing="0" width="100%">
		            <thead>
		              <tr>
		            <th>No</th>
		            <th>Id Jalan</th>
		            <th>Nama Jalan</th>
		            <?php foreach ($nama_kriteria as $key) {
		              echo '<th>'.$key.'</th>';
		            } ?>
		                    <!-- <th class='actions'>
		                      Actions
		                    </th> -->
		                  </tr>
		                </thead>
		                <tbody>
		                <?php  
		            include 'module/koneksi.php';
		            $query_kriteria = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE status='B'");
		            $no = 0;
		            while ($row_kriteria = mysqli_fetch_array($query_kriteria)) {
		              $no++;
		              $id_alternatif = $row_kriteria['id_alternatif'];
		              $nama_alternatif = $row_kriteria['nama_alternatif'];
		              $C1 = $row_kriteria['C1'];
		              $C2= $row_kriteria['C2'];
		              $C3= $row_kriteria['C3'];
		              $C4= $row_kriteria['C4'];
		                    $C5= $row_kriteria['C5'];
		                    $C6= $row_kriteria['C6'];               
		              if ($C1 == 2){
		                $C1_t = "Sepi";
		              }
		              elseif ($C1 == 3) {
		                $C1_t = "Sedang";
		              }
		              elseif ($C1 == 5) {
		                $C1_t = "Ramai";
		              }
		              //          
		              if ($C2 == 1){
		                $C2_t = "Aspal";
		              }
		              elseif ($C2 == 2) {
		                $C2_t = "Kerikil";
		              }
		              elseif ($C2 == 4) {
		                $C2_t = "Tanah";
		              }
		              //          
		              if ($C3 == 1){
		                $C3_t = "Rusak Ringan";
		              }
		              elseif ($C3 == 3) {
		                $C3_t = "Rusak Sedang";
		              }
		              elseif ($C3 == 5) {
		                $C3_t = "Rusak Berat";
		              }
		              //          
		              if ($C4 == 2){
		                $C4_t = "Retak";
		              }
		              elseif ($C4 == 4) {
		                $C4_t = "Bergelombang";
		              }
		              elseif ($C4 == 5) {
		                $C4_t = "Berlubang";
		              }
		              //        
		              if ($C5 == 2){
		                $C5_t = "Jalan Lokal";
		              }
		              elseif ($C5 == 3) {
		                $C5_t = "Jalan Kolektor";
		              }
		              elseif ($C5 == 4) {
		                $C5_t = "Jalan Arteri";
		              }
		              //          
		              if ($C6 == 1){
		                $C6_t = "Rendah";
		              }
		              elseif ($C6 == 3) {
		                $C6_t = "Sedang";
		              }
		              elseif ($C6 == 4) {
		                $C6_t = "Tinggi";
		              }
		            ?>
		                  <tr class='success'>
		                    <td><?php echo $no; ?></td>
		                    <td><?php echo $id_alternatif; ?></td>
		                    <td><?php echo $nama_alternatif; ?></td>
		                    <td><?php echo $C1_t; ?></td>
		                    <td><?php echo $C2_t; ?></td>
		                    <td><?php echo $C3_t; ?></td>
		                    <td><?php echo $C4_t; ?></td>
		                        <td><?php echo $C5_t; ?></td>
		                        <td><?php echo $C6_t; ?></td>
		                    <td class='action'>
		                      <!-- <a class='btn btn-success' data-toggle='tooltip' href='#' title='Zoom'>
		                        <i class='icon-zoom-in'></i>
		                      </a> -->
		                      <!-- <a class='btn btn-info' href='?module=edit_alternatif&id_alternatif=<?php echo $id_alternatif; ?>'>                 
		                        Edit<i class='icon-edit'></i>
		                      </a>
		                      <a class='btn btn-danger' href='?module=hapus&id_alternatif=<?php echo $id_alternatif; ?>' onclick="return konfirmasi()">
		                        Hapus<i class='icon-trash'></i>
		                      </a> -->
		                    </td>
		                  </tr>
		                  <?php } ?>
		          </tbody>
		          </table>
			</div>
		</div>
	</section>