<?php
	include('../../config.php');

	$sql = "DELETE FROM videos WHERE id = '".$_POST['video_id']."' ";
	mysql_query($sql);
	
	echo '1';

?>