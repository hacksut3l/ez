<?php
	session_start();
	include_once('../include/config.php');
	
	//print_r($_POST);exit;
	
	$query = "SELECT * FROM after_funeral WHERE person_making_id = '".$_SESSION['client']."' ";
	$result1 = mysql_query($query);
	
	$rows = @mysql_num_rows($result1);
	
	if($_POST['is_memorial'] == 'yes')
		{
		
			
			
			if($_POST['is_specific_memorial'] == 'yes')
			{
				$is_specific_memorial_coloumn = "detail_of_mem,";
				$is_specific_memorial_condition = "'".$_POST['detail_of_mem']."',";
			}
			else
			{
				$is_specific_memorial_coloumn = "";
				$is_specific_memorial_condition = "";
			}
			if($_POST['is_memorial'] == 'yes')
			{
				$is_memorial_coloumn = "memorial,";
				$is_memorial_condition = "'".$_POST['memorial']."',";
			}
			else
			{
				$is_memorial_coloumn = "";
				$is_memorial_condition = "";
			}
			if($_POST['is_stonemason'] == 'yes')
			{
				
				$is_stonemason=$_POST['is_stonemason'];
				$written=$_POST['written'];
			}
			else
			{
				$is_stonemason = "";
				$written='';
				
			}
			
		}
		else
		{
			$_POST['detail_of_mem']="no";
			
			$is_specific_memorial_coloumn = "detail_of_mem,";
			$is_specific_memorial_condition ="'".$_POST['detail_of_mem']."',";
			$is_memorial_coloumn = "";
			$is_memorial_condition = "";
			$is_stonemason = "";
			$written='';
			
		}
		$is_memorial=$_POST['is_memorial'];
		
	if($rows > 0)
	{
		if($_POST['is_wake'] == 'yes')
		{			
			$is_wake_condition = " wake = '".$_POST['wake']."',";
		}
		else
		{
			$is_wake_condition = " wake = '',";
		}
	
		if($_POST['is_urn'] == 'yes')
		{
			$is_urn_condition = " cremin_type ='".$_POST['cremin_type']."',";
		}
		else
		{
			$is_urn_condition = " cremin_type ='',";
		}
		
		if($_POST['is_special_request'] == 'yes')
		{
			$is_special_request_condition = " special_request = '".$_POST['special_request']."',";
		}
		else
		{
			$is_special_request_condition = " special_request = '',";
		}
		
		if($_POST['is_memorial'] == 'yes')
		{
			$is_memorial_condition = "memorial = '".$_POST['memorial']."',";
		}
		else
		{
			$is_memorial_condition = "memorial = '',";
		}
		
		
		if($_POST['is_specific_memorial'] == 'yes')
		{
			$is_specific_memorial_condition = " detail_of_mem = '".$_POST['detail_of_mem']."',";
		}
		else
		{
			$is_specific_memorial_condition = " detail_of_mem = '',";
		}
		
	
	
		$sql = "UPDATE
					after_funeral
				SET
					person_making_id = '".$_SESSION['client']."',
					is_wake = '".$_POST['is_wake']."',
					$is_wake_condition
					cremated_collected = '".$_POST['cremated_collected']."',
					is_urn = '".$_POST['is_urn']."',
					$is_urn_condition
					is_special_request = '".$_POST['is_special_request']."',
					$is_special_request_condition
					is_memorial = '".$is_memorial."',
					$is_memorial_condition
					is_specific_memorial = '".$_POST['is_specific_memorial']."',
					$is_specific_memorial_condition
					is_stonemason = '".$is_stonemason."',
					written = '".$written."'
				
					
					
				WHERE
					person_making_id = '".$_SESSION['person_id']."'
				";
		//echo $sql;exit;		
		mysql_query($sql);
			
		header('Location: preview.php');
	}
	else
	{
		if($_POST['is_wake'] == 'yes')
		{
			$is_wake_coloumn = "wake,";
			$is_wake_condition = "'".$_POST['wake']."',";
		}
		else
		{
			$is_wake_coloumn = "";
			$is_wake_condition = "";
		}
		
		if($_POST['cremated_collected'] == 'other')
		{
			$cremated_collected_coloumn = "cremated_other,";
			$cremated_collected_condition = "'".$_POST['cremated_other']."',";
		}
		else
		{
			$cremated_collected_coloumn = "";
			$cremated_collected_condition = "";
		}
	
		if($_POST['is_urn'] == 'yes')
		{
			$is_urn_coloumn = "cremin_type,";
			$is_urn_condition = "'".$_POST['cremin_type']."',";
		}
		else
		{
			$is_urn_coloumn = "";
			$is_urn_condition = "";
		}
		
		if($_POST['is_special_request'] == 'yes')
		{
			$is_special_request_coloumn = "special_request,";
			$is_special_request_condition = "'".$_POST['special_request']."',";
		}
		else
		{
			$is_special_request_coloumn = "";
			$is_special_request_condition = "";
		}
		
		if($_POST['is_memorial'] == 'yes')
		{
			$is_memorial_coloumn = "memorial,";
			$is_memorial_condition = "'".$_POST['memorial']."',";
		}
		else
		{
			$is_memorial_coloumn = "";
			$is_memorial_condition = "";
		}
		
		
		if($_POST['is_specific_memorial'] == 'yes')
		{
			$is_specific_memorial_coloumn = "detail_of_mem,";
			$is_specific_memorial_condition = "'".$_POST['detail_of_mem']."',";
		}
		else
		{
			$is_specific_memorial_coloumn = "";
			$is_specific_memorial_condition = "";
		}
		
		
		
		
		
		$sql = "INSERT 
					INTO
					 after_funeral
					 (
						person_making_id,
						is_wake,
						$is_wake_coloumn
						cremated_collected,
						$cremated_collected_coloumn
						is_urn,
						$is_urn_coloumn
						is_special_request,
						$is_special_request_coloumn
						is_memorial,
						$is_memorial_coloumn
						is_specific_memorial,
						$is_specific_memorial_coloumn
						is_stonemason,
						written,
						memorial_status
					 )
					VALUES
					(
						'".$_SESSION['client']."',
						'".$_POST['is_wake']."',
						$is_wake_condition
						'".$_POST['cremated_collected']."',
						$cremated_collected_condition
						'".$_POST['is_urn']."',
						$is_urn_condition
						'".$_POST['is_special_request']."',
						$is_special_request_condition
						'".$is_memorial."',
						$is_memorial_condition
						'".$_POST['is_specific_memorial']."',
						$is_specific_memorial_condition
						'".$is_stonemason ."',
						'".$written."'
						
					)
				";
		//echo $sql;exit;		
		mysql_query($sql);
		
		//$person_id = mysql_insert_id();
		
		//$_SESSION['person_id'] = $person_id;
		
		header('Location: preview.php');
		
		
		
		
			
		//header('Location: important-information.php');

	}

?>