<?php
	
	session_start();
	include_once('../include/config.php');


	if($_POST['payment_methods'] == 'other_payments')
	{
		$payment_method = $_POST['other_methods'];
	}
	else
	{
		$payment_method = $_POST['payment_methods'];
	}
	
	
	if($_POST['realtions'] == 'other_relation')
	{
		//$other_relation_details_coloumn = "other_relation_details,";
		$other_relation_details_condition = "other_relation_details = '".$_POST['other_relation_details']."',";
	}
	else
	{
		//$other_relation_details_coloumn = "";
		$other_relation_details_condition = "";
	}


	$sql = "UPDATE
				person_making_arangements
			SET
				f_name = '".$_POST['f_name']."',
				m_name = '".$_POST['m_name']."',
				l_name = '".$_POST['l_name']."',
				address1 = '".$_POST['address1']."',
				address2 = '".$_POST['address2']."',
				suburb = '".$_POST['suburb']."',
				state = '".$_POST['state']."',
				postcode = '".$_POST['postcode']."',
				telephone = '".$_POST['telephone']."',
				mobile = '".$_POST['mobile']."',
				email = '".$_POST['email']."',
				realtions = '".$_POST['realtions']."',
				$other_relation_details_condition
				budget = '".$_POST['budget']."',
				payment_methods = '".$_POST['payment_methods']."',
				date = '".$_POST['date']."'
				
			WHERE
				client_id = '".$_SESSION['client']."'
			";
			
			//echo $sql;exit;
			
	mysql_query($sql);
	
	header('Location: preview.php');
        
        
?>