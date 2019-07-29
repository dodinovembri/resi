<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus Data ?");
 if (tanya == true) return true;
 else return false;
 }</script>
	<!-- Hero section -->

	<section class="hero-section set-bg">
		<div id="atas" class="container">
			<h2>User</h2>
			<a href="?module=tambah_user"><i class="fa fa-plus"></i> Tambah User</a>
			<div class="hero-slider owl-carousel">
				<table id="example" class="table" cellspacing="0" width="100%">
		            <thead>
		              <tr>
		                <th>Username</th>
		                <th>Nama</th>
										<th>Jabatan</th>
										<th>Role</th>
		                <th class='actions'> 
		                  Actions
		                </th>
		              </tr>
		            </thead>
		            <tbody>
		            <?php  
						include 'module/koneksi.php';
						$query_user = mysqli_query($koneksi, "SELECT user.*, role.role as role FROM user JOIN role ON user.role=role.id_role");
		        $no = 0;
		    				while ($row_user = mysqli_fetch_array($query_user)) {
									$no++;
									$id = $row_user['id'];
		    					$username = $row_user['username'];
		    					$nama = $row_user['nama'];
									$jabatan = $row_user['jabatan'];
									$role = $row_user['role'];
		    			?>
		                  <tr class='success'>
		                  	<td><?php echo $username; ?></td>
		                    <td><?php echo $nama; ?></td>
												<td><?php echo $jabatan; ?></td>
												<td><?php echo $role; ?></td>
		                    <td class='action'>
		                      <a class='btn btn-success' data-toggle='tooltip' href='?module=edit_user&username=<?php echo $username; ?>' title='Zoom'>
		                        Edit<i class='icon-zoom-in'></i>
		                      </a> 
		                      <a class='btn btn-success' data-toggle='tooltip' href='?module=hapus_user&id=<?php echo $id; ?>' title='Zoom' onclick="return konfirmasi()">
		                        Hapus<i class='icon-zoom-in'></i>
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