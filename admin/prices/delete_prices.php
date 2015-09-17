<?php
	include('../../config.php');

	$sql = "DELETE FROM prices WHERE id = '".$_POST['page_id']."' ";
	mysql_query($sql);
	
	echo '1';

?>