<?php
	ob_start();
	include_once('include/config.php');
	@session_start();

	$sql = "SELECT * FROM ratings WHERE rate_from = '".$_POST['client_id']."' AND rate_to = '".$_POST['director_id']."'   ";
	$sqlex = mysql_query($sql);
	
	$ispresent = @mysql_num_rows($sqlex);
	
	if($ispresent > 0)
	{
		$updatesql = "UPDATE 
						ratings 
					SET 
						reviews = '".$_POST['review']."'
					WHERE 
						rate_from = '".$_POST['client_id']."' 
					AND 
						rate_to = '".$_POST['director_id']."'  
					";
					
		mysql_query($updatesql);
		
		echo "1";
		exit;
	}
	else
	{
		$updatesql = "INSERT
					INTO
						ratings
						(
							rate_from,
							rate_to,
							reviews
						)
					VALUES
						(
							'".$_POST['client_id']."',
							'".$_POST['director_id']."',
							'".$_POST['review']."'
						)
							
					";
		mysql_query($updatesql);
		
		echo "1";
		exit;
	}

?>