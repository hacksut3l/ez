<?php
	ob_start();
	
	include_once 'include/config.php' ;
	session_start();
	
	echo $sel_fetch="select * from directors where email='".$_SESSION['free_email']."'";
	$result_fetch=mysql_query($sel_fetch);
	
	$row_fetch=mysql_fetch_array($result_fetch);
	
		$_SESSION['person_id']=$row_fetch['id'];
	
	//header('Location:director_dashboard.php');

	/*<!--<META http-equiv="refresh" content="0;URL=director_dashboard.php"> -->*/

	

	
?>
