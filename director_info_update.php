<?php
	ob_start();
	include_once('include/config.php');
	@session_start();
	
	//echo folder_name;
	
	$type= $_POST['type'];
	
	//print_r($_FILES);exit;
	
	if($type == 'contact')
	{
	
	
	$statesql = "SELECT state_name
					FROM 
						states
					WHERE  
						state_id = '".$_POST['state']."'
					";
					
				$statex = mysql_query($statesql);
				
				$state_name = mysql_fetch_assoc($statex);
            //echo $_POST['city'];
       // exit;
			   $address = $_POST['address'].','.$_POST['city'].','.$state_name['state_name'].','.$_POST['country'];
		//$address = $_POST['address'].','.$_POST['city'].','.$_POST['state'];
                        
			$prepAddr = str_replace(' ','+',$address);

	  		$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
		 
		$output= json_decode($geocode);
		 
	 	$latitude = $output->results[0]->geometry->location->lat;
		$longitude = $output->results[0]->geometry->location->lng;
		

		if($_FILES['business_profile_image']["name"] != '')
		{
				$path ='uploads/director_profile_pics';
			
			$new_file_name = time().rand().$_FILES["business_profile_image"]["name"];
		
			move_uploaded_file($_FILES["business_profile_image"]["tmp_name"],$path.'/'.$new_file_name);
			
		
			$column_value = ',image = "'.$new_file_name.'"';
			
		}
		else
		{
			$column_value = '';
		}
                
                //echo "select * from cities where city_name = ".$_POST['city']."";
                $city_id = mysql_query("select * from cities where city_name ='".$_POST['city']."'");
                $exe = mysql_fetch_assoc($city_id);
                $city_id_in =  $exe['city_id'];
                
                //echo $city_id_in;
                //exit;
		$sql = "UPDATE
					directors
				SET
                                business_name = '".$_POST['business_name']."',
					
					phone = '".$_POST['phone']."',
					country = '".$_POST['country']."',
					city = '".$city_id_in."',
					state = '".$_POST['state']."',
					postal_code = '".$_POST['postal_code']."',
					country = '".$_POST['country']."',
					latitude = '".$latitude."',
					longitude = '".$longitude."',
					address = '".$_POST['address']."', 
                                        abn = '".$_POST['abn']."',
                                        acn = '".$_POST['acn']."'
                                        
                                            $column_value
				WHERE
					id = '".$_SESSION['client']."'
				
				";
		//echo $sql;
              // exit;
		mysql_query($sql);
		
		$sql1 = "UPDATE
					directors
				SET
                                business_name = '".$_POST['business_name']."',
					
					business_phone = '".$_POST['phone']."',
					postal_code = '".$_POST['postal_code']."',
					address = '".$_POST['address']."', 
                                        abn = '".$_POST['abn']."',
                                        acn = '".$_POST['acn']."'
                                        
                                            $column_value
				WHERE
				reference_id = '".$_SESSION['client']."'
				
				";
		//echo $sql;
              // exit;
		mysql_query($sql1);
		
		?>
		
		<script type="text/javascript">
		
			alert('Your Information Updated Sucessfully');
			
			window.location="director_dashboard.php";
			
		</script>
		
		
		<?php
		
		//header('Location:director_dashboard.php');
	}
	
	if($type == 'business')
	{
		
	
		$sql = "UPDATE
					directors
				SET
					full_name = '".$_POST['full_name']."',
                    email = '".$_POST['business_mail']."'
                                            
					
				WHERE
					id = '".$_SESSION['person_id']."'
				
				";
		//echo $sql;
               // exit;
		mysql_query($sql);
	?>
		
		<script type="text/javascript">
		
			alert('Your Contact Information Update Sucessfully');
			
			window.location="director_dashboard.php";
			
		</script>
		
		
		<?php
	}
	
	
	if($type == 'photogallery')
	{
			//$dirname = $_POST["search"];
		
		
		if($_FILES['photo_gallery_image']["name"][0] == '')
		{
?>		
				<script type="text/javascript">
		
			alert('Please Select Image..!');
			window.location="director_dashboard.php";
			
			
		</script>
		
<?php

		}
						
		if($_FILES['photo_gallery_image']['name'][0] != '')
		{
		
		
		
			$filename = "uploads/photo_gallery/".$_SESSION['person_id']. "/";
			$path1 = "uploads/photo_gallery/";
			
		
		if (!file_exists($filename))
		{
			$thisdir = getcwd();
			
			mkdir($thisdir ."/uploads/photo_gallery/". $_SESSION['person_id'], 0777);
		
		}
		
			 $path = 'uploads/photo_gallery/'.$_SESSION['person_id'];
			
			$imgdata = $_FILES['photo_gallery_image'];
			
			$buff_path = $imgdata['tmp_name'];
			
			$img_count = 0;
			$start_count = 1;
			foreach($buff_path as $b_value)
			{
				$buffer_path = $imgdata['tmp_name'][$img_count];
				$file_name = $imgdata['name'][$img_count];
				$new_file_name = time().rand().$file_name;
				$final_path = $path."/" . $new_file_name;
				//move_uploaded_file($buffer_path,$path."/" . $new_file_name);
				move_uploaded_file($buffer_path,$final_path);
					$start_count++;
					$img_count++;
					//$main_image_path[] = $final_path;
			
				$sql = "INSERT INTO photo_gallery ( director_id,image ) VALUES ( '".$_SESSION['person_id']."','".$new_file_name."' ) ";
				mysql_query($sql);
			}
		header('Location:director_dashboard.php');	
		}
		
	}
	
	
	if($type == 'aboutus')
	{
		$sql = "UPDATE
					directors
				SET
					about_us = '".mysql_real_escape_string($_POST['about_us'])."'
				WHERE
					id = '".$_SESSION['person_id']."'
				
				";
		
		mysql_query($sql);
		
		header('Location:director_dashboard.php');
	}
	
	if($type == 'password')
	{
		$sql = "UPDATE
					directors
				SET
					password = '".md5($_POST['password'])."'
				WHERE
					id = '".$_SESSION['person_id']."'
				
				";
		
		mysql_query($sql);
	?>	
		
		
		<script type="text/javascript">
		
			alert('Your Password Change Sucessfully');
			
			window.location="director_dashboard.php";
			
		</script>
		
	<?php	
		///header('Location:director_dashboard.php');
	}
	
	if($type == 'special_offer')
	{
		$sql = "UPDATE
					directors
				SET
					special_offer = '".mysql_real_escape_string($_POST['special_offer'])."'
				WHERE
					id = '".$_SESSION['person_id']."'
				
				";
		
		mysql_query($sql);
		
		header('Location:director_dashboard.php');
	}
	
	if($type == 'banners')
	{
		//$dirname = $_POST["search"];
		$filename = $_SERVER['DOCUMENT_ROOT'].folder_name."/uploads/director_banners/".$_SESSION['person_id']. "/";
		
		$path1 = $_SERVER['DOCUMENT_ROOT'].folder_name."/uploads/director_banners/".$_SESSION['person_id'];
		
		if (!file_exists($filename)) {
			mkdir($path1, 0777);		
		} 
		
		if($_FILES['photo_gallery_image']["name"] != '')
		{
			$path = $_SERVER['DOCUMENT_ROOT'].folder_name.'/uploads/director_banners/'.$_SESSION['person_id'];
			
			$new_file_name = time().rand().$_FILES["photo_gallery_image"]["name"];
		
			move_uploaded_file($_FILES["photo_gallery_image"]["tmp_name"],$path."/" . $new_file_name);
			
			$sql = "UPDATE
						directors
					SET
						banner_image = '".$new_file_name."'
					WHERE
						id = '".$_SESSION['person_id']."'
					";
			
			mysql_query($sql);
			
		}
		
		header('Location:director_dashboard.php');
	}
	
	
	if($type == 'videogallery')
	{
		
		
			
		if($_POST['video_url']=='')
		{
?>			
		
		<script type="text/javascript">
		
			alert('Please Enter Url..!');
			
			window.location="director_dashboard.php";
			
		</script>
<?php	
	
		}
		else
		{
			
		$video = getYouTubeIdFromURL($_POST['video_url']);

		$sql = "INSERT
				INTO
					video_gallery
					(
						director_id,
						url
					)
				VALUES
					(
						'".$_SESSION['person_id']."',
						'".$video."'
					)
				
				";
		
		mysql_query($sql);
		
		header('Location:director_dashboard.php');
		
		}
	}
	
	function getYouTubeIdFromURL($url)
	{
	  $url_string = parse_url($url, PHP_URL_QUERY);
	  parse_str($url_string, $args);
	  return isset($args['v']) ? $args['v'] : false;
	}
	
	
	
	
	
?>