<?php
	include('../../config.php');

	$sql = "DELETE FROM record_story WHERE id = '".$_POST['page_id']."' ";
	mysql_query($sql);
	
	echo '1';

?>