<?php
ob_start();
include_once('include/config.php');
@session_start();

$aResponse['error'] = false;
$aResponse['message'] = '';

// ONLY FOR THE DEMO, YOU CAN REMOVE THIS VAR
	$aResponse['server'] = ''; 
// END ONLY FOR DEMO
	
	
if(isset($_POST['action']))
{
	if(htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'rating')
	{
		/*
		* vars
		*/
		$id = intval($_POST['idBox']);
		$rate = floatval($_POST['rate']);
		
		// YOUR MYSQL REQUEST HERE or other thing :)
		/*
		*
		*/
		
		// if request successful
		$success = true;
		// else $success = false;
		
		
		// json datas send to the js file
		if($success)
		{
			/*$aResponse['message'] = 'Your rate has been successfuly recorded. Thanks for your rate :)';
			
			// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
				$aResponse['server'] = '<strong>Success answer :</strong> Success : Your rate has been recorded. Thanks for your rate :)<br />';
				$aResponse['server'] .= '<strong>Rate received :</strong> '.$rate.'<br />';
				$aResponse['server'] .= '<strong>ID to update :</strong> '.$id;
			// END ONLY FOR DEMO*/
			
			$ispresentsql = "SELECT 
								*
							 FROM 
							 	ratings 
							 WHERE
							 	rate_from = '".$_SESSION['client']."'
							AND
								rate_to = '".$id."'
							LIMIT 1;
							
							";
							
							
							
			$ispresentex = mysql_query($ispresentsql);
			
			$iscount = @mysql_num_rows($ispresentex);
			
			if($iscount > 0)
			{
				$ispresent = mysql_fetch_assoc($ispresentex);
				
				$updatesql = " UPDATE
									ratings
								SET
									rate_recorded = '".$rate."'
								WHERE
									rate_from = '".$_SESSION['client']."'
								AND
									rate_to = '".$id."'
							";
				mysql_query($updatesql);
				
			}
			else
			{
			
				$insertrsql = " INSERT
								INTO
									ratings
									(
										rate_from,
										rate_to,
										rate_recorded
									)
								VALUES
									(
										'".$_SESSION['client']."',
										'".$id."',
										'".$rate."'
									)
								";
								
				mysql_query($insertrsql);
			}
			
			$getsql = "SELECT sum(rate_recorded) AS rate,count(rate_to) AS rate_to FROM ratings WHERE rate_to = '".$id."' ";
			$getex = mysql_query($getsql);
			
			$countdir = @mysql_num_rows($getex);
			
			
			if($countdir > 0)
			{
				$getresult = mysql_fetch_assoc($getex);
				$average = round(($getresult['rate']/$getresult['rate_to']));				
				
				
				$updatedirectorsql = "UPDATE directors SET rating = '".$average."' WHERE id = '".$id."' ";
				
				mysql_query($updatedirectorsql);
			}
			else
			{
				$updatedirectorsql = "UPDATE directors SET rating = '".$rate."' WHERE id = '".$id."' ";
				
				mysql_query($updatedirectorsql);
			}
			
			echo json_encode($aResponse);
		}
		else
		{
			$aResponse['error'] = true;
			$aResponse['message'] = 'An error occured during the request. Please retry';
			
			// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
				$aResponse['server'] = '<strong>ERROR :</strong> Your error if the request crash !';
			// END ONLY FOR DEMO
			
			
			echo json_encode($aResponse);
		}
	}
	else
	{
		$aResponse['error'] = true;
		$aResponse['message'] = '"action" post data not equal to \'rating\'';
		
		// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
			$aResponse['server'] = '<strong>ERROR :</strong> "action" post data not equal to \'rating\'';
		// END ONLY FOR DEMO
			
		
		echo json_encode($aResponse);
	}
}
else
{
	$aResponse['error'] = true;
	$aResponse['message'] = '$_POST[\'action\'] not found';
	
	// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
		$aResponse['server'] = '<strong>ERROR :</strong> $_POST[\'action\'] not found';
	// END ONLY FOR DEMO
	
	
	echo json_encode($aResponse);
}