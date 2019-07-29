<?php  
	session_start();
	if ($_SESSION['id_role'] != 4) {
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
		include 'module/surveyor/templates/leftbar.php';
	?>
	  	<?php require_once('module/surveyor/'.$_GET['module'].'.php'); 
	  	include 'module/templates/footer.php'; 
	?>	 
	

<?php } ?> 