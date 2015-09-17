<?php
	include('../../config.php');

	$sql = "DELETE FROM packages WHERE id = '".$_POST['page_id']."' ";
	mysql_query($sql);
	
	echo '1';

?>