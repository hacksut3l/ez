


<?php
	ob_start();
	include_once('include/config.php');
	@session_start();
	error_reporting(0);
	//echo folder_name;
	
	$type= $_POST['type'];
	
	if($type == 'contact')
	{
		$citysql = "SELECT 
				* 
				FROM 
				cities
                            WHERE
				city_name = '".$_POST['city']."'
			";
									
						$cityex = mysql_query($citysql);
						
						$city_name = mysql_fetch_assoc($cityex);
		$address = $_POST['address'].','.$_POST['city'].','.$_POST['state'];
                        
		$prepAddr = str_replace(' ','+',$address);

		$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
		 
		$output= json_decode($geocode);
		 
		$latitude = $output->results[0]->geometry->location->lat;
		$longitude = $output->results[0]->geometry->location->lng;
		
		if($_FILES['profile_image']["name"] != '')
		{
				$path ='uploads/clients_profile_pics';
			
			$new_file_name = time().rand().$_FILES["profile_image"]["name"];
		
			move_uploaded_file($_FILES["profile_image"]["tmp_name"],$path.'/'.$new_file_name);
			
		
			$column_value = ',image = "'.$new_file_name.'"';
			
		}
		else
		{
			$column_value = '';
		}
		
		$sql = "UPDATE
					clients
				SET
					first_name = '".$_POST['first_name']."',
					last_name = '".$_POST['last_name']."',
					phone = '".$_POST['phone']."',
                                        email = '".$_POST['business_mail']."',
                                        address = '".$_POST['address']."',
					country = '".$_POST['country']."',
                                        state = '".$_POST['state']."',
					city = '".$city_name['city_id']."',
                                        zip_code = '".$_POST['postal_code']."'
										
										$column_value
				WHERE
					id = '".$_SESSION['client']."'
				
				";
		
		mysql_query($sql);
		
		?>
		
		<script type="text/javascript">
		
			alert('Your Information Updated Sucessfully');
			
			window.location="client_dashboard.php";
			
		</script>
		
		
	<?php	
	}
	
	if($type == 'business')
	{
		if($_FILES['business_profile_image']["name"] != '')
		{
			$path = $_SERVER['DOCUMENT_ROOT'].folder_name.'/uploads/clients_profile_pics';
			
			$new_file_name = time().rand().$_FILES["business_profile_image"]["name"];
		
			move_uploaded_file($_FILES["business_profile_image"]["tmp_name"],$path."/" . $new_file_name);
			
			
			
			$column_value = 'image = "'.$new_file_name.'"';
			
		}
		else
		{
			$column_value = '';
		}
	
		$sql = "UPDATE
					clients
				SET
					$column_value
				WHERE
					id = '".$_SESSION['client']."'
				
				";
		
		mysql_query($sql);
		
		header('Location:client_dashboard.php');
	}
	
	
	if($type == 'password')
	{
	
	
		
		
		if(!empty($_POST['password']) && !empty($_POST['password']))
		
		{
		$sql = "UPDATE
					clients
				SET
					password = '".md5($_POST['password'])."'
				WHERE
					id = '".$_SESSION['client']."'
				
				";
		
		mysql_query($sql);
		
		if($sql)
		{
		
	?>
		
		<script type="text/javascript">
		
			alert('Your Password Updated Sucessfully');
			
			window.location="client_dashboard.php";
			
		</script>
		
		
		<?php
		}
	}
		
	}
	
	
	
	
	
	
	
?>