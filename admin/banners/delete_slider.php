<?php
	include('../../config.php');

	$sql = "DELETE FROM home_slider WHERE id = '".$_POST['image_id']."' ";
	mysql_query($sql);
	
	echo '1';

?>