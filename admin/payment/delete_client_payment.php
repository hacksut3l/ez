<?php
	include('../config.php');

	$sql = "DELETE FROM client_purchase_info WHERE id = '".$_POST['member_id']."' ";
	mysql_query($sql);
	
	echo '1';

?>