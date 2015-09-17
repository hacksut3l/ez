<?php
	session_start();
	include_once('../include/config.php');
	
	
	//print_r($_POST);exit;
	
		$query = "SELECT * FROM committal WHERE person_making_id = '".$_SESSION['client']."' ";
		$result1 = mysql_query($query);
	
		$rows = @mysql_num_rows($result1);
		$cs = $_POST['cemetery_state'];
        
        $dis = mysql_query("select * from states where state_id='".$cs."'");
        $exe_d = mysql_fetch_assoc($dis);
        $show = $exe_d['state_name'];
        
        $n1 = $_POST['crematorium_state'];
        $dis1 = mysql_query("select * from states where state_id= $n1");
        $exe_d1 = mysql_fetch_assoc($dis1);
        $show1 = $exe_d1['state_name'];
        
        $n2 = $_POST['mausoleum_state'];
         $dis2 = mysql_query("select * from states where state_id= $n2");
        $exe_d2 = mysql_fetch_assoc($dis2);
        $show2 = $exe_d2['state_name'];
	if($rows > 0)
	{
		$coloumn = '';
		$condition = '';
	
		if($_POST['laid_to_rest'] == 'burial')
		{		
			
			if($_POST['burried_in'] == 'new grave')
			{			
				$condition .= " burried_in = '".$_POST['burried_in']."',	
								name_cemetery = '".$_POST['name_cemetery']."',
								cemetery_city = '".$_POST['cemetery_city']."',
								cemetery_state = '".$show."'
							";
							
							
							
				if($_POST['is_preferred_section'] == 'yes')
				{									
					$condition .= " ,is_preferred_section = '".$_POST['is_preferred_section']."',
									cemetery_area = '".$_POST['cemetery_area']."',
									cemetery_section = '".$_POST['cemetery_section']."',
									cemetery_number = '".$_POST['cemetery_number']."'
								";
				}
				else
				{
					$condition .= " ,is_preferred_section = '".$_POST['is_preferred_section']."',
									cemetery_area = '',
									cemetery_section = '',
									cemetery_number = ''
								";
				}			
				
			}
			else
			{			
				$condition .= "	burried_in = '".$_POST['burried_in']."',	
								name_cemetery = '',
								cemetery_city = '',
								cemetery_state = '',
								existing_grave_addr = '".$_POST['existing_grave_addr']."',
								grave_number = '".$_POST['grave_number']."',
								grave_location = '".$_POST['grave_location']."'
							";
			}
		
		}
		elseif($_POST['laid_to_rest'] == 'cremation')
		{				
					
			$condition .= " burried_in = '',	
							name_cemetery = '',
							cemetery_city = '',
							cemetery_state = '',
							cemetery_area = '',
							cemetery_section = '',
							cemetery_number = '',
							existing_grave_addr = '',
							grave_number = '',
							grave_location = '',
							crematorium_name = '".$_POST['crematorium_name']."',
							crematorium_city = '".$_POST['crematorium_city']."',
							crematorium_state = '".$show1."'
						";
		
		}
		else
		{				
					
			$condition .= " burried_in = '',	
							name_cemetery = '',
							cemetery_city = '',
							cemetery_state = '',
							cemetery_area = '',
							cemetery_section = '',
							cemetery_number = '',
							existing_grave_addr = '',
							grave_number = '',
							grave_location = '',
							mausoleum_name = '".$_POST['mausoleum_name']."',
							mausoleum_city = '".$_POST['mausoleum_city']."',
							mausoleum_state = '".$show2."'
						";
		}	
		
		$sql = "UPDATE
					committal
				SET
					laid_to_rest = '".$_POST['laid_to_rest']."',
					$condition
					
				WHERE
					person_making_id = '".$_SESSION['client']."'
				";
		//echo $sql;exit;		
		mysql_query($sql);
			
		header('Location: details-of-funeral-service.php');
	}
	else
	{
		$coloumn = '';
		$condition = '';
	
		if($_POST['laid_to_rest'] == 'burial')
		{		
			
			if($_POST['burried_in'] == 'new grave')
			{
				$coloumn .= "	burried_in,
								name_cemetery,
								cemetery_city,
								cemetery_state											
							";
			
				$condition .= " '".$_POST['burried_in']."',	
								'".$_POST['name_cemetery']."',
								'".$_POST['cemetery_city']."',
								'".$show."'
							";
							
							
				if($_POST['is_preferred_section'] == 'yes')
				{
					$coloumn .= "	,is_preferred_section,
									cemetery_area,
									cemetery_section,
									cemetery_number											
								";
				
					$condition .= " ,'".$_POST['is_preferred_section']."',
									'".$_POST['cemetery_area']."',
									'".$_POST['cemetery_section']."',
									'".$_POST['cemetery_number']."'
								";
				}
				else
				{
					$coloumn .= " ,is_preferred_section";
					
					$condition .= " ,'".$_POST['is_preferred_section']."' ";
				}			
				
			}
			else
			{
				$coloumn .= "	burried_in,
								existing_grave_addr,
								grave_number,
								grave_location										
							";
			
				$condition .= " '".$_POST['burried_in']."',	
								'".$_POST['existing_grave_addr']."',
								'".$_POST['grave_number']."',
								'".$_POST['grave_location']."'
							";
			}
		
		}
		elseif($_POST['laid_to_rest'] == 'cremation')
		{
			$coloumn .= "	crematorium_name,
							crematorium_city,
							crematorium_state										
						";
			
			$condition .= " '".$_POST['crematorium_name']."',
							'".$_POST['crematorium_city']."',
							'".$show1."'
						";
		
		}
		else
		{
			$coloumn .= "	mausoleum_name,
							mausoleum_city,
							mausoleum_state											
						";
			
			$condition .= " '".$_POST['mausoleum_name']."',
							'".$_POST['mausoleum_city']."',
							'".$show2."'
						";
		}	
		
		$sql = "INSERT 
					INTO
					 committal
					 (
						person_making_id,
						laid_to_rest,
						$coloumn
						
					 )
					VALUES
					(
						'".$_SESSION['client']."',
						'".$_POST['laid_to_rest']."',
						$condition					
					)
				";
		//echo $sql;exit;		
		mysql_query($sql);
		
		//$person_id = mysql_insert_id();
		
		//$_SESSION['person_id'] = $person_id;
			
		header('Location: details-of-funeral-service.php');
	
	}


?>