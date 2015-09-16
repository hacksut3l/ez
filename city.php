<?php
	ob_start();
	include_once('include/config.php');
	session_start();
	
	$city = $_POST['city'];
	
	$sql = "SELECT city_name FROM cities WHERE state_id = '".$_POST['state_id']."' AND city_name LIKE '$city%' ORDER BY city_name ";
	//echo $sql;exit;
	$sqlex = mysql_query($sql);
	
	$ispresent = @mysql_num_rows($sqlex);
	
	
	
	if($ispresent > 0)
	{
		while($result = mysql_fetch_assoc($sqlex))
		{
			$cities = ucwords(strtolower(($result['city_name'])));
			
			$data[] = array(
			'groups' => $cities
			);
		}
	}
	else
	{
		$data[] = array(
			'groups' => 'city not found'
			);
	}
	
	echo json_encode($data);
	
?>