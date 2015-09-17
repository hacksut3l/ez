<?php
	include('../config.php');

 	$sql = "DELETE FROM directors WHERE id = '".$_POST['member_id']."' ";
	mysql_query($sql);
	
	echo '1';

?>