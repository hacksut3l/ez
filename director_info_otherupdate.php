<?php
	ob_start();
	include_once('include/config.php');
	@session_start();
	
	//echo folder_name;
	
	$type= $_POST['type'];
	$ref = $_POST['ref_id'];
	//print_r($_FILES);exit;
	
	if($type == 'contact')
	{
            //echo $_POST['city'];
        //exit;
		
		$address = $_POST['address_new'].','.$_POST['city_new'].','.$_POST['state_new'];
                        
		$prepAddr = str_replace(' ','+',$address);

		$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
		 
		$output= json_decode($geocode);
		 
		$latitude = $output->results[0]->geometry->location->lat;
		$longitude = $output->results[0]->geometry->location->lng;
		
               
		
                $city_id = mysql_query("select * from cities where city_name = '".$_POST['city_new']."'");
                $exe = mysql_fetch_assoc($city_id);
                $city_id_in =  $exe['city_id'];
	$sql = "UPDATE
					directors
				SET
                               
					country = '".$_POST['country_new']."',
					city = '".$city_id_in."',
					state = '".$_POST['state_new']."',
					postal_code = '".$_POST['postal_code_new']."',
					
					latitude = '".$latitude."',
					longitude = '".$longitude."',
					address = '".$_POST['address_new']."'
                                        
				WHERE
					id = '".$ref."'
				
				";
		//echo $sql;
             // exit;
		mysql_query($sql);
		
	if($sql)
	{
	?>
	
	
	<script type="text/javascript">
		
			alert('Your Information Updated Sucessfully');
			
			window.location="director_dashboard.php";
			
		</script>
	
	
	<?php 
	}	
		
		
	}
	
	
	
?>