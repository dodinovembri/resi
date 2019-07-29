<?php  
	session_start();
	if ($_SESSION['id_role'] != 1) {
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
		include 'module/admin/templates/leftbar.php';
	?>
	<body> 
	  <div>
	  	<?php
	  	require_once('module/admin/'.$_GET['module'].'.php');
	  	?>
	  	</div> 
	</body>
	  	<?php 
	  	include 'module/templates/footer.php'; 
		?>	 
	

<?php } ?> 