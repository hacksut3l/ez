<?php
	include('../config.php');

echo	$sql = "DELETE FROM clients WHERE id = '".$_POST['member_id']."' ";
	mysql_query($sql);
	
	echo '1';

?>