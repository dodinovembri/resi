<?php  
	session_start();
	if ($_SESSION['id_role'] != 2) {
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
		include 'module/kep_bidang/templates/leftbar.php';
	?>
	  	<?php require_once('module/kep_bidang/'.$_GET['module'].'.php'); 
	  	include 'module/templates/footer.php'; 
	?>	 
	

<?php } ?> 