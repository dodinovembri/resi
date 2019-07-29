<?php
?>
	<!-- Hero section -->

	<section class="hero-section set-bg">
		<div id="atas" class="container">
			<h2>Kriteria</h2>
			<!--<a href="?module=tambah_kriteria"><i class="fa fa-plus"></i> Tambah Kriteria</a>-->
			<div class="hero-slider owl-carousel">
				<table id="example" class="table" cellspacing="0" width="100%">
		            <thead>
		              <tr>
		                <th>No</th>
		                <th>Kode</th>
		                <th>Nama Kriteria</th>                
		                <th>Bobot</th>
		                <th class='actions'> 
		                  Actions
		                </th>
		              </tr>
		            </thead>
		            <tbody>
		            <?php  
						include 'module/koneksi.php';
						$query_kriteria = mysqli_query($koneksi, "SELECT * FROM kriteria");
		        $no = 0;
		    				while ($row_kriteria = mysqli_fetch_array($query_kriteria)) {
		              $no++;
		    					$kode_kriteria = $row_kriteria['kode_kriteria'];
		    					$nama_kriteria = $row_kriteria['nama_kriteria'];					
		    					$bobot_kriteria= $row_kriteria['bobot_kriteria'];
		    			?>
		                  <tr class='success'>
		                  	<td><?php echo $no; ?></td>
		                    <td><?php echo $kode_kriteria; ?></td>
		                    <td><?php echo $nama_kriteria; ?></td>				
		    				<td><?php echo $bobot_kriteria; ?></td>
		                    <td class='action'>
		                      <a class='btn btn-success' data-toggle='tooltip' href='?module=edit&id=<?php echo $kode_kriteria; ?>' title='Zoom'>
		                        Edit<i class='icon-zoom-in'></i>
		                      </a>              
		                    </td>
		                  </tr>
		                  <?php } ?>
		    			</tbody>
		          </table>
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