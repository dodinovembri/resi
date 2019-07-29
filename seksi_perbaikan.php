<?php  
	session_start();
	if ($_SESSION['id_role'] != 3) {
		header("location: index.php");
	}
	else
	{
		if (!isset($_GET['module']) || $_GET['module']==''){
			$_GET['module']='home'; 
		}	
	?>

	<?php 
		include 'module/templates/head.php'; 
		include 'module/seksi_perbaikan/templates/leftbar.php';
	?>
	  	<?php require_once('module/seksi_perbaikan/'.$_GET['module'].'.php'); 
	  	include 'module/templates/footer.php'; 
	?>	 
	

<?php } ?> 