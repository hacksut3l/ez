<?php

		session_start();
		include_once('../include/config.php');
        
	if($_POST['memorial_status'] == 'yes')
		{
		
			
			
			if($_POST['is_memorial'] == 'yes')
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
					person_making_id = '".$_SESSION['client']."'
				";
		//echo $sql;exit;		
		mysql_query($sql);
			
		header('Location: preview.php');
        
        
?>