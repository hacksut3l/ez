<?php

		session_start();
		include_once('../include/config.php');
		
		$coloumn = '';
		$condition = '';
	
		if($_POST['laid_to_rest'] == 'burial')
		{		
			
			if($_POST['burried_in'] == 'new grave')
			{			
				$condition .= " burried_in = '".$_POST['burried_in']."',	
								name_cemetery = '".$_POST['name_cemetery']."',
								cemetery_city = '".$_POST['cemetery_city']."',
								cemetery_state = '".$_POST['cemetery_state']."'
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
							crematorium_state = '".$_POST['crematorium_state']."'
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
							mausoleum_state = '".$_POST['mausoleum_state']."'
						";
		}	
		
		$sql = "UPDATE
					committal
				SET
					person_making_id = '".$_SESSION['person_id']."',
					laid_to_rest = '".$_POST['laid_to_rest']."',
					$condition
					
				WHERE
					person_making_id = '".$_SESSION['client']."'
				";
		//echo $sql;exit;		
		mysql_query($sql);
			
		header('Location:preview.php');



?>