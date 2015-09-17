<?php
	
	session_start();
	include_once('../include/config.php');


	if($_POST['place_of_death'] == 'other')
	{
		//$place_of_death_details_coloumn = "place_of_death_details,";
		$place_of_death_details_condition = "place_of_death_details = '".$_POST['place_of_death_details']."',";
	}
	else
	{
		//$place_of_death_details_coloumn = "";
		$place_of_death_details_condition = "place_of_death_details = '',";
	}
	
	if($_POST['medical_certificate'] == 'yes')
	{		
		$medical_condition = " 	doc_f_name = '".$_POST['doc_f_name']."',
								doc_m_name = '".$_POST['doc_m_name']."',
								doc_l_name = '".$_POST['doc_l_name']."',
								doc_address1 = '".$_POST['doc_address1']."',
								doc_address2 = '".$_POST['doc_address2']."',
								doc_postcode = '".$_POST['doc_postcode']."',
								doc_telephone = '".$_POST['doc_telephone']."',
								doc_mobile  = '".$_POST['doc_mobile']."',
								doc_email = '".$_POST['doc_email']."',
								doc_suburb = '".$_POST['doc_suburb']."',
								doc_state = '".$_POST['doc_state']."',
							";
	}
	else
	{
		$medical_condition = "	doc_f_name = '',
								doc_m_name = '',
								doc_l_name = '',
								doc_address1 = '',
								doc_address2 = '',
								doc_postcode = '',
								doc_telephone = '',
								doc_mobile  = '',
								doc_email = '',
								doc_suburb = '',
								doc_state = '',
		
							";					
	}
	
	if($_POST['organ_donar'] == 'yes')
	{
		//$organ_donar_coloumn = "orgon_donar_detail,";
		$orgon_donar_condition = " organ_donar_detail = '".$_POST['organ_donar_detail']."', ";
	}
	else
	{
		//$organ_donar_coloumn = "";
		$orgon_donar_condition = " organ_donar_detail = '',";
	}
	
	if($_POST['is_pre_paid'] == 'yes')
	{									
		$is_pre_paid_condition = " ,business_name = '".$_POST['business_name']."', 
									business_address1 = '".$_POST['business_address1']."', 
									business_address2 = '".$_POST['business_address2']."', 
									business_postcode = '".$_POST['business_postcode']."', 
									business_telephone = '".$_POST['business_telephone']."', 
									business_mobile = '".$_POST['business_mobile']."', 
									business_email = '".$_POST['business_email']."',
									business_suburb = '".$_POST['business_suburb']."', 
									business_state = '".$_POST['business_state']."'
								";
	}
	else
	{
		$is_pre_paid_condition = ",business_name = '', 
									business_address1 = '', 
									business_address2 = '', 
									business_postcode = '', 
									business_telephone = '', 
									business_mobile = '', 
									business_email = '',
									business_suburb = '', 
									business_state = ''
								";
	}
	

		$sql = "UPDATE
				deceased
			SET
				person_making_id = '".$_SESSION['client']."',
				f_name = '".$_POST['f_name']."',
				m_name = '".$_POST['m_name']."',
				l_name = '".$_POST['l_name']."',
				address1 = '".$_POST['address1']."',
				address2 = '".$_POST['address2']."',					
				suburb = '".$_POST['suburb']."',
				state = '".$_POST['state']."',
				postcode = '".$_POST['postcode']."',
				gender = '".$_POST['gender']."',
				age = '".$_POST['age']."',
				dob = '".$_POST['dob']."',
				height = '".$_POST['height']."',
				weight = '".$_POST['weight']."',
				pob = '".$_POST['pob']."',
				cob = '".$_POST['cob']."',
				dod = '".$_POST['dod']."',
				gender = '".$_POST['gender']."',
				age = '".$_POST['age']."',
				dob = '".$_POST['dob']."',
				tod = '".$_POST['tod']."',
				place_of_death = '".$_POST['place_of_death']."',
				pob = '".$_POST['pob']."',
				$place_of_death_details_condition
				death_address = '".$_POST['death_address']."',
				death_suburb = '".$_POST['death_suburb']."',
				death_state = '".$_POST['death_state']."',
				death_postcode = '".$_POST['death_postcode']."',
				deceased_resting = '".$_POST['deceased_resting']."',
				medical_certificate = '".$_POST['medical_certificate']."',
				$medical_condition
				organ_donar = '".$_POST['organ_donar']."',
				$orgon_donar_condition
				is_pre_paid = '".$_POST['is_pre_paid']."'
				$is_pre_paid_condition
				
			WHERE
				person_making_id = '".$_SESSION['client']."'
			";
	//echo $sql;exit;		
	mysql_query($sql);
		
	header('Location: preview.php');
        
        
?>