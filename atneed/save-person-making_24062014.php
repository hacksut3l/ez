<?php
	session_start();
	include_once('../config.php');
	
	//print_r($_POST);exit;
	
	$query = "SELECT * FROM  person_making_arangements WHERE client_id = '".$_SESSION['client']."' ";
	$result1 = mysql_query($query);
	
	$rows = @mysql_num_rows($result1);
        $n = $_POST['state'];
	$state_name_exe = "select * from states where state_id= $n ";
	$show = mysql_query($state_name_exe);
        $dis_st = $show['state_name'];
	if($rows > 0 )
	{
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
					suburb = '".$_POST['city']."',
					state = '".$dis_st."',
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
					client_id = '".$_SESSION['person_id']."'
				";
				
				
		mysql_query($sql);
						//echo $sql;exit;

		header('Location: details-of-deceased.php');
				
	}
	else
	{
	
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
			$other_relation_details_coloumn = "other_relation_details,";
			$other_relation_details_condition = "'".$_POST['other_relation_details']."',";
		}
		else
		{
			$other_relation_details_coloumn = "";
			$other_relation_details_condition = "";
		}
	
	
	
		$sql = "INSERT 
					INTO
					 person_making_arangements
					 (
					 	client_id,
						f_name,
						m_name,
						l_name,
						address1,
						address2,
						suburb,
						state,
						postcode,
						telephone,
						mobile,
						email,
						realtions,
						$other_relation_details_coloumn
						budget,
						payment_methods,
						date
					 )
					VALUES
					(
						'".$_SESSION['client']."',
						'".$_POST['f_name']."',
						'".$_POST['m_name']."',
						'".$_POST['l_name']."',
						'".$_POST['address1']."',
						'".$_POST['address2']."',
						'".$_POST['city']."',
						'".$dis_st."',
						'".$_POST['postcode']."',
						'".$_POST['telephone']."',
						'".$_POST['mobile']."',
						'".$_POST['email']."',
						'".$_POST['realtions']."',
						$other_relation_details_condition
						'".$_POST['budget']."',
						'".$payment_method."',
						'".$_POST['date']."'
					)
				";
		//echo $sql;exit;
		mysql_query($sql);
		
		$person_id = mysql_insert_id();
		
		//echo $person_id;
		
		//$_SESSION['person_id'] = $person_id;
		
		//echo "-->".$_SESSION['person_id'];exit;
			
		header('Location: details-of-deceased.php');
	}



?>