<?php
	ob_start();
	include_once('include/config.php');
	session_start();
	
	if($_POST['user_type'] == 'client')
	{
		$table_name = 'clients';
	}
	
	if($_POST['user_type'] == 'director')
	{
		$table_name = 'directors';
	}
	
	
	$sql = "SELECT 
				* 
			FROM
				$table_name
			WHERE
				email = '".$_POST['email']."'
			";
			
	$sqlex = mysql_query($sql);
	
	$ispresent = @mysql_num_rows($sqlex);
	
	if($ispresent > 0)
	{
		echo '1';
	}
	else
	{
		echo '2';
	}
	
?>