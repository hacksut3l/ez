<?php
	ob_start();
	include_once('include/config.php');
	session_start();
	
//	$delete_clients = "Delete From invite where invite_from	= '".$_SESSION['client']."'";
	//$exe = mysql_query($delete_clients);
	
//	$del = "Delete From clients_pdf where client_id	= '".$_SESSION['client']."'";
//	$exe1 = mysql_query($del);
	session_destroy();
	
	header('Location:'.base_url.'index.php');
	
?>