<?php
	include('../config.php');

	$sql = "DELETE FROM director_member_info WHERE info_id = '".$_POST['member_id']."' ";
	mysql_query($sql);
	
	echo '1';

?>