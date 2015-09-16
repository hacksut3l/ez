<?php
	ob_start();
	include_once('include/config.php');
	@session_start();
	
	if($_POST['type'] == 'photo_delete')
	{
		$sql = "DELETE FROM photo_gallery WHERE id = '".$_POST['table_id']."' ";
		mysql_query($sql);
		
		echo '1';
		exit;
	}
	
	if($_POST['type'] == 'video_delete')
	{
		$sql = "DELETE FROM video_gallery WHERE id = '".$_POST['table_id']."' ";
		mysql_query($sql);
		
		echo '1';
		exit;
	}
	
	
?>