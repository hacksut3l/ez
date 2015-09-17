<?php
	
	session_start();
	include_once('../include/config.php');
	
	//print_r($_POST);exit;
	  
		$query = "SELECT * FROM  deceased WHERE person_making_id = '".$_SESSION['client']."'";
	    $result1 = mysql_query($query);
	
        $n = $_POST['doc_state'];
		$state_name_exe = "select * from states where state_id='".$n."'";
		$show = mysql_query($state_name_exe);
        $e = mysql_fetch_assoc($show);
        $n1 = $e['state_name'];
        
		$rows = @mysql_num_rows($result1);
	
		$ds =  $_POST['death_state'];
       //echo $ds;
       
        $querycheck = mysql_query("select * from states where state_id= $ds"); 
     
        $e1 = mysql_fetch_assoc($querycheck);
        $deth_state = $e1['state_name'];
       // echo $deth_state;
        $bn = $_POST['business_state'];
		$stateb_name_exe = "select * from states where state_id='".$bn."'";
			$showb = mysql_query($stateb_name_exe);
       			$nwe = mysql_fetch_assoc($showb);
        
      $dis_stb = $nwe['state_name'];
	  
	  if($_POST['place_of_death'] == 'other')
		{
			//$place_of_death_details_coloumn = "place_of_death_details,";
			$place_of_death_details_condition = "'".$_POST['place_of_death_details']."'";
		}
		else
		{
			//$place_of_death_details_coloumn = "";
			$place_of_death_details_condition = " ";
		}
        
	if($rows > 0)
	{
	
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
									doc_state = '".$n1."',
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
			$orgon_donar_condition = " organ_donar_detail = '".$_POST['organ_donar_detail']."'";
		}
		else	
		{
			//$organ_donar_coloumn = "";
			$orgon_donar_condition = " organ_donar_detail = ''";
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
										business_state = '".$dis_stb."'
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
		$san = $_POST['state_name'];
                
             
	$san_name_exe = "select * from states where state_id= $san ";
	$showbn = mysql_query($san_name_exe);
        $exe = mysql_fetch_assoc($showbn);
        $disn_stb = $exe['state_name'];
	
	  
  $sql = "UPDATE
					deceased
				SET
					f_name = '".$_POST['f_name']."',
					m_name = '".$_POST['m_name']."',
					l_name = '".$_POST['l_name']."',
					address1 = '".$_POST['address1']."',
					address2 = '".$_POST['address2']."',					
					suburb = '".$_POST['suburb']."',
					state = '".$disn_stb."',
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
					death_state = '".$deth_state."',
					death_postcode = '".$_POST['death_postcode']."',
					deceased_resting = '".$_POST['deceased_resting']."',
					medical_certificate = '".$_POST['medical_certificate']."',
					$medical_condition
					organ_donar = '".$_POST['organ_donar']."',
					$orgon_donar_condition,
					is_pre_paid = '".$_POST['is_pre_paid']."'
					$is_pre_paid_condition
					
				WHERE
					person_making_id = '".$_SESSION['client']."'
				";
		//echo $sql;exit;		
		mysql_query($sql);
			
		header('Location: details-of-committal.php');
				
	}
	else
	{
            $san = $_POST['state_name'];
        $san_name_exe = "select * from states where state_id= $san";
	$showbn = mysql_query($san_name_exe);
        $exe = mysql_fetch_assoc($showbn);
        $disn_stb = $exe['state_name'];
		if($_POST['place_of_death'] == 'other')
		{
			$place_of_death_details_coloumn = "place_of_death_details,";
			$place_of_death_details_condition = "'".$_POST['place_of_death_details']."',";
		}
		else
		{
			$place_of_death_details_coloumn = "";
			$place_of_death_details_condition = "";
		}
		
		
		
		if($_POST['medical_certificate'] == 'yes')
		{
			$medical_coloumns = "	doc_f_name,
									doc_m_name,
									doc_l_name,
									doc_address1,
									doc_address2,
									doc_postcode,
									doc_telephone,
									doc_mobile,
									doc_email,
									doc_suburb,
									doc_state,
									
								";
		
			$medical_condition = " '".$_POST['doc_f_name']."',
									'".$_POST['doc_m_name']."',
									'".$_POST['doc_l_name']."',
									'".$_POST['doc_address1']."',
									'".$_POST['doc_address2']."',
									'".$_POST['doc_postcode']."',
									'".$_POST['doc_telephone']."',
									'".$_POST['doc_mobile']."',
									'".$_POST['doc_email']."',
									'".$_POST['doc_suburb']."',
									'".$n1."',
								";
		}
		else
		{
			$medical_coloumns = "";
			$medical_condition = "";
					
		}
		
		
		if($_POST['organ_donar'] == 'yes')
		{
			$organ_donar_coloumn = "organ_donar_detail,";
			$orgon_donar_condition = " ,'".$_POST['organ_donar_detail']."'";
		}
		else
		{
			$organ_donar_coloumn = "";
			$orgon_donar_condition = "";
		}
		
		
		
		if($_POST['is_pre_paid'] == 'yes')
		{
			$is_pre_paid_coloumn = ",business_name,
									business_address1,
									business_address2,
									business_postcode,
									business_telephone,
									business_mobile,
									business_email,
									business_suburb,
									business_state
									";
									
			$is_pre_paid_condition = " ,'".$_POST['business_name']."', 
										'".$_POST['business_address1']."', 
										'".$_POST['business_address2']."', 
										'".$_POST['business_postcode']."', 
										'".$_POST['business_telephone']."', 
										'".$_POST['business_mobile']."', 
										'".$_POST['business_email']."',
										'".$_POST['business_suburb']."', 
										'".$dis_stb."'
									";
		}
		else
		{
			$is_pre_paid_coloumn = "";
			$is_pre_paid_condition = "";
		}
		
	//echo '<pre>';	
	 $place_of_death_details_condition;
		$sql = "INSERT 
					INTO
					 deceased
					 (
						person_making_id,
						f_name,
						m_name,
						l_name,
						address1,
						address2,						 
						suburb,
						state,
						postcode,
						gender,
						age,
						dob,
						height,
						weight,
						pob,
						cob,
						dod,
						tod,
						place_of_death,
						place_of_death_details,
						death_address,
						death_suburb,
						death_state,
						death_postcode,
						deceased_resting,
						medical_certificate,
						$medical_coloumns
						organ_donar,
							$organ_donar_coloumn
						is_pre_paid
						$is_pre_paid_coloumn
						
					 )
					VALUES
					(
						'".$_SESSION['client']."',
						'".$_POST['f_name']."',
						'".$_POST['m_name']."',
						'".$_POST['l_name']."',
						'".$_POST['address1']."',
						'".$_POST['address2']."',
						'".$_POST['suburb']."',
						'".$disn_stb."',
						'".$_POST['postcode']."',
						'".$_POST['gender']."',
						'".$_POST['age']."',
						'".$_POST['dob']."',
						'".$_POST['height']."',
						'".$_POST['weight']."',
						'".$_POST['pob']."',
						'".$_POST['cob']."',
						'".$_POST['dod']."',
						'".$_POST['tod']."',
						'".$_POST['place_of_death']."',
						'".$place_of_death_details_condition."',
						'".$_POST['death_address']."',
						'".$_POST['death_suburb']."',
						'".$deth_state."',
						'".$_POST['death_postcode']."',
						'".$_POST['deceased_resting']."',
						'".$_POST['medical_certificate']."',
						$medical_condition
						'".$_POST['organ_donar']."'
						$orgon_donar_condition,
						'".$_POST['is_pre_paid']."'
						$is_pre_paid_condition
						
						
						
					)
				";
				
		mysql_query($sql);
			
		header('Location:details-of-committal.php');
	}


?>