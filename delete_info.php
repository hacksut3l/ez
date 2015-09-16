<?php
	ob_start();
	include_once('include/config.php');
	@session_start();

$sql = "DELETE FROM directors WHERE id='".$_GET['id']."'";

$query = mysql_query($sql);
header("location:director_dashboard.php");

?>