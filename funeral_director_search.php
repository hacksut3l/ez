<script>
	$(".exemple3").jRating({
		  isDisabled : true
		});
		
</script>
<?php
	@session_start();
	include_once('include/config.php');
	
	
	$page = $_POST['page'];
	$cur_page = $page;
	$page -= 1;
	$per_page = 50;
	$previous_btn = true;
	$next_btn = true;
	$first_btn = true;
	$last_btn = true;
	$start = $page * $per_page;
	
	$pdfsql = "SELECT * FROM clients_pdf WHERE client_id = '".$_SESSION['client']."' ORDER BY date DESC LIMIT 1 ";
	//$pdfsql = "SELECT * FROM clients_pdf WHERE client_id = '133' ORDER BY date DESC LIMIT 1 ";
	$pdfex = mysql_query($pdfsql);
	
	$is_pdf_present = @mysql_num_rows($pdfex);
	
	$statesql = "SELECT 
					state_name 
				FROM 
					states
				WHERE
					state_id = '".$_REQUEST['state']."'
				";
				
	
				
	$stateex = mysql_query($statesql);
	
	$state_name = mysql_fetch_assoc($stateex);

		$citysql = "SELECT 
					* 
				FROM 
					cities
				WHERE
					city_id = '".$_REQUEST['city']."'
				";
				
	$cityex = mysql_query($citysql);
	
	$city_name = mysql_fetch_assoc($cityex);
	
	
	$address = $_REQUEST['city'].','.$state_name['state_name'].','.$_REQUEST['country'];
	
	//echo $address;exit;
	
	$prepAddr = str_replace(' ','+',$address);
	
	//echo $prepAddr;exit;

	$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
	 
	$output= json_decode($geocode);
	 
	$latitude = $output->results[0]->geometry->location->lat;
	$longitude = $output->results[0]->geometry->location->lng;


	 $geosql = "SELECT latitude,longitude FROM geo_info WHERE city_name = '".$_REQUEST['city']."' AND state_id = '".$_REQUEST['state']."' LIMIT 1  ";
 	$geo_ex = mysql_query($geosql);
	
	

	$geo = mysql_fetch_assoc($geo_ex);

 	$latitude = $geo['latitude'];
	$longitude = $geo['longitude'];

 $sql_count = "
	SELECT 
		d.*,
		u.*,
		((ACOS(SIN( ".$latitude." * PI() / 180) * SIN(d.latitude * PI() / 180) + COS(".$latitude." * PI() / 180) * COS(d.latitude * PI() / 180) * COS((".$longitude." - d.longitude) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance 
	
	FROM 
		directors d, 
		user_type u
	
	HAVING 
		u.user_type_id = d.user_type
	AND
		d.is_email_confirm = '1'
	AND
		distance <=25	
	ORDER BY 
		d.user_type DESC
	";
	
	$sql_count_ex = mysql_query($sql_count);
	
	$is_sql_present = @mysql_num_rows($sql_count_ex);

 $query_pag_num = "	SELECT 
							COUNT(*) AS count										
						FROM 
							directors							
						WHERE
							state = '".$_REQUEST['state']."'	
						AND
							country = '".$_REQUEST['country']."'
						AND
							is_email_confirm = '1'	
							
						";
	//echo '-->'.$query_pag_num;				
	$result_pag_num = mysql_query($query_pag_num);
	$row = mysql_fetch_array($result_pag_num);
	$count = $is_sql_present;
	$no_of_paginations = ceil($count / $per_page);
	
	
	/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
	if ($cur_page >= 7) {
		$start_loop = $cur_page - 3;
		if ($no_of_paginations > $cur_page + 3)
			$end_loop = $cur_page + 3;
		else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
			$start_loop = $no_of_paginations - 6;
			$end_loop = $no_of_paginations;
		} else {
			$end_loop = $no_of_paginations;
		}
	} else {
		$start_loop = 1;
		if ($no_of_paginations > 7)
			$end_loop = 7;
		else
			$end_loop = $no_of_paginations;
	}	
	
	
			/* ----------------------------------------------------------------------------------------------------------- */
	$msg .= "<div style='float: left;width:100%;'>";
	$msg .= "<div class='pagination'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='active'>Previous</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive'>Previous</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='active pagination_next'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='active pagination_last'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}

	$msg .= "</div></div>";
	
	echo $msg;
	

	
	//echo $latitude.'--'.$longitude;exit;
	
	$sql = "
			SELECT 
				d.*,
				u.*,
				((ACOS(SIN( ".$latitude." * PI() / 180) * SIN(d.latitude * PI() / 180) + COS(".$latitude." * PI() / 180) * COS(d.latitude * PI() / 180) * COS((".$longitude." - d.longitude) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance 
			
			FROM 
				directors d, 
				user_type u
			
			HAVING 
				u.user_type_id = d.user_type
			AND
				d.state ='".$_REQUEST['state']."'
			AND
				d.is_email_confirm = '1'
			AND
				d.payment_status='active'
			AND
				distance <=25	
			ORDER BY d.user_type DESC,d.manual_entry 
			LIMIT
				$start, $per_page
			";
	//echo $sql;exit;
	
	
	
	$result = mysql_query($sql);
	
	$total_rows = @mysql_num_rows($result);
	
	//echo $total_rows;exit;
	$directors_count = @mysql_num_rows($result);
	
	$msg = "";
	$i = '';
	$j = 1;
	
	while($directors = mysql_fetch_assoc($result))
	{
	$citysql = "SELECT 
					* 
					FROM 
						cities
					WHERE
						city_id = '".$directors['city']."'
					";
				
		$cityex = mysql_query($citysql);
		
		$city_name = mysql_fetch_assoc($cityex);
		
		
		$statesql = "SELECT 
						state_name,
						code
					FROM 
						states
					WHERE
						state_id = '".$directors['state']."'
					";
				
				
		$stateex = mysql_query($statesql);
		
		$state_name = mysql_fetch_assoc($stateex);
		

	
		if ((strpos(strtolower($directors['address']),strtolower($state_name['state_name'])) != false) || (strpos(strtolower($directors['address']),strtolower($state_name['code'])) != false))
		{
			
			$states = '';
		}
		else
		{
			
			$states = $state_name['state_name'];
		}
		
		
		if (strpos(strtolower($directors['address']),strtolower($city_name['city_name'])) != false)
		{
			
			$cities = '';
		}
		else
		{
			
			$cities = $city_name['city_name'];
		}
		
		if (strpos(strtolower($directors['address']),strtolower($directors['postal_code'])) != false)
		{
			
			$postal_code = '';
		}
		else
		{
			
			$postal_code = $directors['postal_code'];
		}
		
		
		
		
		if($directors['user_type'] == '1')
		{
			$link = 'free-member.php?id='.$directors['id'];
		}
		elseif($directors['user_type'] == '2')
		{
			$link = 'standard-member.php?id='.$directors['id'];
		}
		else
		{
			$link = 'premium-member.php?id='.$directors['id'];
		}
		
		$msg .= '	<div style="width:100%; float:left;" id="container1">   
					
						<div class="'.$i.'">
                           <div class="left-in-data part-1" style="width:16%;">
                              <img src="'.base_url.'uploads/director_profile_pics/'.$directors['image'].'" style="height:130px; width:120px;" class="profile_image"/>
                           </div>
                           <div class="left-in-data part-2" style="width:80%; margin-left:5px; height:140px;">
                              <span class="right-text"  style="margin-left:5px;padding:0px !important">'.$directors['business_name'].' &nbsp;';
							 if($directors['user_type'] == '3')
							 {
							 $msg .= '<img src="images/premium1.png" style="  vertical-align: middle;" class="premium_image">';
							}
							 $msg .='</span><div class="right-in-data-image" style="width:5%;" >
                                    <img src="images/address.png" />
                                </div>
                                    <span class="right-p">'.str_replace(","," ",$directors['address']).'<br>'.$cities.' '.$states.' '.$postal_code.'		
                                    
                                    '.$directors['country'].'</span>
                                <div class="rating">
                                    <span class="right-bold" style="margin-left:5px;">Rating</span>
                                    <div class="exemple3" data-average="'.$directors['rating'].'" data-id="'.$directors['id'].'"></div><br/>
                                   </div> 
						
					</div>';
								   
			
			
			$invit_sql = "SELECT 
							* 
						FROM 
							invite 
						WHERE 
							invite_from = '".$_SESSION['client']."' 
						AND
							invite_to = '".$directors['id']."'							
						";
						
						
			$invite_sql_ex = mysql_query($invit_sql);
			
			$invite_present = @mysql_num_rows($invite_sql_ex);
			
			
	////invite link to redirect to request qoutes..............
			if($is_pdf_present >= 0 && isset($_SESSION['client']))
			{
				 $invite = '<a href="post-your-plan.php?id='.$directors['id'].'" class="invite">Invite</a>';
			}		
			
	////this condition only for free members for view profile.....................
			
			/*if($directors['user_type'] == '1' && $directors['manual_entry'] !='1' )
			{
				$condition = '<a href="'.base_url.$link.'" class="viewprofile">View Profile</a>';
			}
			else */if($directors['user_type'] == '1' && $directors['manual_entry'] == '1')
			{
				
			$condition = '<a id="login_pop" href="#tets"><input type="button" name="" class="addreview user_profile_btn2" value="Is This Your Business?"></a>';
			
			}
			
			else 
			{
				
				if(isset($_SESSION['client']))
				{
					$addreview = '<a href="#tets'.$directors['id'].'" class="addreview fancybox1"  average="'.$directors['rating'].'" director_id ="'.$directors['id'].'">Add Review</a>';
					//$addreview = '<a href="#tets'.$directors['id'].'" class="addreview"  average="'.$directors['rating'].'" director_id ="'.$directors['id'].'">Add Review</a>';
				}
				
				 if($is_pdf_present > 0 && isset($_SESSION['client']) && $invite_present <= 0)
				{
					$invite = '<a href="#pop12_'.$directors['id'].'">
					<input type="button" class="invite" value="Invite" director_id="'.$directors['id'].'"/></a>';
				} 
				 else if($is_pdf_present > 0 && isset($_SESSION['client']) && $invite_present > 0)
				{
				
					$invite = '<a href="#send_'.$directors['id'].'">
					<input type="button" class="invite" value="invite" director_id="'.$directors['id'].'" /></a>';
				}
				 
				
				if($is_pdf_present <= 0 && isset($_SESSION['client']))
				{
					$invite = '<a href="post-your-plan.php?id='.$directors['id'].'" class="invite">Invite</a>';
				}
				if(!isset($_SESSION['client']))
				{
					$invite = '<a href="#notlogin2" id="login_pop" class="invite">Invite</a>';
					$addreview = '<a href="#notlogin" class="addreview">Add Review</a>';
				}
				$condition = $invite.'
							<a href="'.base_url.$link.'" class="viewprofile">View Profile</a>
							'.$addreview;	
				
				
			}	
			
								   
			
								   	
			$msg .= '<div class="buttons link" style="margin-bottom:10px;">
						'.$condition.'
					 </div>
				</div>
		  		</div>
				
				';
		
			$msg .= '<a id="tets" href="#x" class="overlay"></a>
					<div class="popup">
					<div id="">    
						<!--<h1>Add Review</h1>-->
						<span class="fields_wrapp no_margin">
							<span class="reg_name businessPopSpan"><sp class="gree_pas1">Welcome to EziFunerals.</sp><br /><br />
				Your complimentary listing is provided for a limited time only.
				</span>
							<span class="reg_name businessPopSpan">If you would like to grow your business, connect with new customers and enjoy all the benefits EziFunerals members receive, please register now.</span>
							<span class="reg_name businessPopSpan"><a href="'.base_url.'page/HowItWorksForDirectors.php#tab-5"><input style="float:inherit;" class="login_button" type="button" value="Register Now"></a></span>
						</span>
					</div>
					<a class="close" href="#close"></a>
				</div>';
			
			$msg .= '<a id="pop12_'.$directors['id'].'" class="overlay"  href="#x"></a>
					<div class="popup">
					<div id="">    
						<!--<h1>Add Review</h1>-->
						<span class="fields_wrapp no_margin">
                                                
							<span class="reg_name businessPopSpan">Invitation sent successfully!<br /><br>
EziFunerals recommends that you invite at least 3 Funeral Directors and compare prices.</span>
				<span class="reg_name businessPopSpan">Would you like to invite more Funeral Directors?</span><br>
				<div class="reg_name businessPopSpan" style="width:100%; margin-top: 6px; ">
									<input name="invite_radio" type="radio" value="yes" checked="checked"> Yes
									<input name="invite_radio" type="radio" value="no"> No
									</div>
									
						 
						<a class="close" href="#close"></a>
					</div>
					<input class="login_button invite_me_submit" type="button" name="submit" value="Submit" director_id="'.$directors['id'].'">
				</div>';
			

			/* IT support team */
				

			$msg .= '<div id="tets'.$directors['id'].'" style="display:none">
						<div id="" style="width:35%;">    
					<h1>Add Review</h1>
					<span class="fields_wrapp no_margin">
											<span class="reg_name">Rating</span>
											<div class="rating" style="margin-left:0;">
												<div class="exemple7" data-average="'.$directors['rating'].'" data-id="'.$directors['id'].'" average="'.$directors['rating'].'" director_id ="'.$directors['id'].'"></div>
											</div>
										</span>
					<span class="fields_wrapp no_margin">
											
										<span class="fields_wrapp no_margin">
											<span class="reg_name">Review</span>
											<textarea class="reg_field_'.$directors['id'].'" style="height:60px; font-family:Conv_Helvetica-Light;" director_id ="'.$directors['id'].'" name="reviewtext" id="sammeer_'.$directors['id'].'"></textarea>
											
										</span>
										<span style="width:100%; float:left;">
											<span class="reg_name">&nbsp;</span>
											<input class="login_button ratingpopup rakesh123" type="button" client_id = "'.$_SESSION['client'].'" director_id ="'.$directors['id'].'"  name="submit" value="Submit">
										</span>
					
				</div>
					  </div>';


				$msg .= '<a id="send_'.$directors['id'].'"  class="overlay"  href="#x"></a>
					<div class="popup">
					<div id="">    
						<!--<h1>Add Review</h1>-->
						<span class="fields_wrapp no_margin">
							<span class="reg_name businessPopSpan">You have already invited this Funeral Director</span>
				
				<!--<div class="name-fieldpop1">
								<input class="signup_btn" type="button" name="ok" value="OK" director_id="'.$directors['id'].'" id="send_id">
									</div>-->
						 
						<a class="close" href="#close"></a>
					</div>
					
				</div>';
				
		if($i == '')
		{
			$i = $j;
		}
		else
		{
			$i = '';
		}			  
	
	}
	
	
	$citysql = "SELECT 
					* 
				FROM 
					cities
				WHERE
					city_name = '".$_REQUEST['city']."'
				";
				
	$cityex = mysql_query($citysql);
	
	$city_name = mysql_fetch_assoc($cityex);
	
	
	$statesql = "SELECT 
					* 
				FROM 
					states
				WHERE
					state_id = '".$_REQUEST['state']."'
				";
				
				
				
	$stateex = mysql_query($statesql);
	
	$state_name = mysql_fetch_assoc($stateex);
	
	 $sql_count = "
	SELECT 
		d.*,
		u.*,
		((ACOS(SIN( ".$latitude." * PI() / 180) * SIN(d.latitude * PI() / 180) + COS(".$latitude." * PI() / 180) * COS(d.latitude * PI() / 180) * COS((".$longitude." - d.longitude) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance 
	
	FROM 
		directors d, 
		user_type u
	
	HAVING 
		u.user_type_id = d.user_type
	AND
		d.is_email_confirm = '1'
	AND
		d.payment_status='active'
	AND
	
		distance <=25	
	ORDER BY 
		d.user_type DESC
	";
	
	$sql_count_ex = mysql_query($sql_count);
	
	$is_sql_present = @mysql_num_rows($sql_count_ex);
	
	
	
	$query_pag_num = "	SELECT 
							COUNT(*) AS count										
						FROM 
							directors							
						WHERE
							state = '".$state_name['state_id']."'	
						AND
							country = '".$_REQUEST['country']."'
						AND
							is_email_confirm = '1'	
							
						";
	//echo '-->'.$query_pag_num;				
	$result_pag_num = mysql_query($query_pag_num);
	$row = mysql_fetch_array($result_pag_num);
	$count = $is_sql_present;
	$no_of_paginations = ceil($count / $per_page);
	
	
	/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
	if ($cur_page >= 7) {
		$start_loop = $cur_page - 3;
		if ($no_of_paginations > $cur_page + 3)
			$end_loop = $cur_page + 3;
		else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
			$start_loop = $no_of_paginations - 6;
			$end_loop = $no_of_paginations;
		} else {
			$end_loop = $no_of_paginations;
		}
	} else {
		$start_loop = 1;
		if ($no_of_paginations > 7)
			$end_loop = 7;
		else
			$end_loop = $no_of_paginations;
	}
/* ----------------------------------------------------------------------------------------------------------- */
	$msg .= "<div style='float: left;width:100%;'>";
	$msg .= "<div class='pagination'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='active'>Previous</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive'>Previous</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='active pagination_next'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='active pagination_last'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}

	$msg .= "</div></div>";
	
	echo $msg;
	
	
	

?>