<?php
	ob_start();
	include_once('include/config.php');
	session_start();
	
	$statesql = "SELECT * FROM states ORDER BY state_name";
	$statesex = mysql_query($statesql);
	
	while($row=mysql_fetch_assoc($statesex))
	{
		$data[] = array(
			'state_id' => $row['state_id'],
			'state_name' => $row['state_name'] 
		);
	
	}
	echo json_encode($data);
	
	
	
?>