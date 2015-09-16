<?php
	ob_start();
	include_once('./include/config.php');
	session_start();
	
	if(isset($_GET['id']))
	{
		$query = "SELECT 
				  	* 
				  FROM
				  	directors
				  WHERE
				  	id = '".$_GET['id']."'
				  ";
				  
		$querysql = mysql_query($query);
		
		$isresult = @mysql_num_rows($querysql);
		
		if($isresult > 0)
		{
			$result = mysql_fetch_assoc($querysql);
		}
	}
	
	
//------------------------------------------------------------------------------fetch director data in to director table-------------------------------------------------------//
	
	if(isset($_SESSION['person_id']))
	{
		$fetch_director_info = "SELECT 
				  	* 
				  FROM
				  	directors
				  WHERE
				  	id = '".$_SESSION['person_id']."'
				  ";
		$result_director_info=mysql_query($fetch_director_info);
		
		$row_director_info=mysql_fetch_array($result_director_info);
	
	
	}
	
//---------------------------------------------------------------------------End fetch director data in to director table-------------------------------------------------------//	
	
	
	
	
	/*if(isset($_SESSION['person_id']))
	{
		header('Location:premium-membership-registration-next.php');
	}*/
	
?>


<link href="css/Old_Include_Css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/Old_Include_Css/style1.css" rel="stylesheet" type="text/css">
<link href="css/Old_Include_Css/style.css" rel="stylesheet" type="text/css"> <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link type="text/css" rel="Stylesheet" href="css/Old_Include_Css/jquery.validity.css" />
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
<!--<script type="text/javascript" src="js/Old_Include_Js/location.js"></script>-->
<style>
.formerror1
{
	font-size:10px !important;
	color:#F00 !important;
	display:none ;
}
</style>
<script type="text/javascript" src="js/Old_Include_Js/jquery-ui-1.8.23.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery-ui-1.8.23.custom.css" />

<script type="text/javascript">
	var BASE_URL = '<?php echo base_url;?>';
</script>

<script src="js/Old_Include_Js/respond.min.js"></script>
<script src="js/Old_Include_Js/premium_member.js"></script>


    <script type='text/javascript'>
               
			$(document).ready(function() {
				
				var BASE_URL = '<?php echo base_url;?>';
				
				enableSelectBoxes();
				
				$( "#city" ).autocomplete({
					
					source: function(request, response) {
						
					$.ajax({
						url :BASE_URL+"city.php" ,
						data : "state_id="+$("#state").val()+"&city="+$('#city').val(),
						dataType: "json",
						type : "POST",
						success : function(data)
						{
							group=[];
							label=[];
							$.each(data,function(i,v){
								group.push({
								label:$(v).attr('groups')
							})
						})
						
					response(group);
						}
					});
					},
					minLength: 2
				});
				
				
				
				
				
			});
			
			function refreshCaptcha()
			{
				var img = document.images['captchaimg'];
				img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
			}
			
			function enableSelectBoxes(){
				$('div.selectBox1').each(function(){
					$(this).children('span.selected1').html($(this).children('div.selectOptions1').children('span.selectOption1:first1').html());
					$(this).attr('value',$(this).children('div.selectOptions1').children('span.selectOption1:first1').attr('value'));
					
					$(this).children('span.selected1,span.selectArrow1').click(function(){
						if($(this).parent().children('div.selectOptions1').css('display') == 'none'){
							$(this).parent().children('div.selectOptions1').css('display','block');
						}
						else
						{
							$(this).parent().children('div.selectOptions1').css('display','none');
						}
					});
					
					$(this).find('span.selectOption1').click(function(){
						$(this).parent().css('display','none');
						$(this).closest('div.selectBox1').attr('value',$(this).attr('value'));
						$(this).parent().siblings('span.selected1').html($(this).html());
					});
				});				
			}//-->
		</script>
<?php include "include/main_header.php"; ?>		
<br /><br /><br /><br /><br /><br /><br /><br />
<div class="punch_text_02 funral_director_heading">
    <div class="container">
	<div align="left">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;">Funeral Director Premium Membership Plan</font>	
    </div>
	</div>
</div>



<div class="gridContainer clearfix"><br/><br/>
	<div id="LayoutDiv1">
		<div id="wrapper">
			<div id="container">
				<div class="container">
											<h2 class="heading director_heading" style="font-size:24px;">Premium Membership Application<span class="step"> Step 1 of 2</span></h2>
											
					
									<?php
										if(isset($_POST['submit']))
										{	
										
//-------------------------------------------------------------------Update the Director Plan-----------------------------------------------------------------------------------//												
										
	if(isset($_SESSION['client']))
	{
			
		
										
											if($_POST['password'] == '')
											{
												$passworderror = 'Please enter password';
												$flag=1;
											}
											if($_POST['confirm_password'] == '')
											{
												$cnfrmpassworderror = 'Please enter confirm password';
												$flag=1;
											}
											if($_POST['password'] != $_POST['confirm_password'])
											{
												$cnfrmpassworderror = 'Password does not match';
												$flag=1;
											}							
											if($_POST['phone'] == '')
											{
												$phoneerror = 'Please enter your phone number';
												$flag=1;
											}
											if($_POST['business_name'] == '')
											{
												$bnameerror = 'Please enter business name';
												$flag=1;
											}
											if($_POST['business_type'] == '')
											{
												$btyperror = 'Please enter type of business';
												$flag=1;
											}
											if($_POST['business_country1'] == '')
											{
												$countryerror = 'Please enter country';
												$flag=1;
											}
											if($_POST['state'] == '')
											{
												$stateerror = 'Please enter state';
												$flag=1;
											}
											if($_POST['city'] == '')
											{
												$cityerror = 'Please enter your city';
												$flag=1;
											}
											if($_POST['business_zip1'] == '')
											{
												$postalerror = 'Please enter postal code';
												$flag=1;
											}
											if($_POST['business_address1'] == '')
											{
												$addresserror = 'Please enter address';
												$flag=1;
											}
							if($_POST['username'] != "" && $_POST['password'] != '' && $_POST['phone'] !="" && $_POST['business_name'] !="" && $_POST['business_country1'] != ''&& $_POST['business_address1']!="" && $_POST['business_type']!="" && $_POST['business_zip1']!="" && $_POST['city']!= "" && $_POST['state'] != "" && $flag==0)
											{
											
												$date = date("Y-m-d H:i:s",time());
												
												$statesql = "SELECT 
																	state_name 
																FROM 
																	states
																WHERE  
																	state_id = '".$_POST['state']."'
																";
																
													$statex = mysql_query($statesql);
													
													$state_name = mysql_fetch_assoc($statex);
													
													
													$citysql = "SELECT 
																	* 
																FROM 
																	cities
																WHERE  
																	city_name = '".$_POST['city']."'
																";
													//echo $citysql;exit;			
													$cityex = mysql_query($citysql);
													
													$city_name = mysql_fetch_assoc($cityex);
												
												
												
											   $address = $_POST['business_address1'].','.$city_name['city_name'].','.$state_name['state_name'].','.$_POST['business_country1'];
												
												
												//$address = $_POST['business_address1'].','.$_POST['business_city1'].','.$_POST['business_state1'];
												
												$prepAddr = str_replace(' ','+',$address);
						
												$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
												 
												$output= json_decode($geocode);
												 
												$latitude = $output->results[0]->geometry->location->lat;
												$longitude = $output->results[0]->geometry->location->lng;	
			}
	
												
			$sql = "update directors set 
						full_name='".mysql_real_escape_string($_POST['full_name'])."',
						
						email='".$_POST['email']."',
						username='".mysql_real_escape_string($_POST['username'])."',
						password='".md5($_POST['password'])."',
						phone='".$_POST['phone']."', 
						address='".$_POST['business_address1']."',
						city='".$city_name['city_id']."',
						state='".$_POST['state']."',
						postal_code='".$_POST['business_zip1']."',
						country='".$_POST['business_country1']."',                                       
						business_name='".mysql_real_escape_string($_POST['business_name'])."',
						business_type='".$_POST['business_type']."',
						latitude='".$latitude."',
						longitude='".$longitude."',
						user_type='3',
						total_location='".$_POST['total_location']."',
						date='".$date."',
						payment_status='pending'
						 where id='".$_SESSION['client']."'";
		//echo $sql;exit;		
		mysql_query($sql);
		
		  $premium_member_id = mysql_insert_id();
	
		//echo $_POST['total_location'];exit;
		for($i=2;$i<=$_POST['total_location'];$i++)
		{
					
				
			if($_POST['business_country'.$i] != '' && $_POST['state'.$i] != '' && $_POST['business_city'.$i] != '' && $_POST['business_address'.$i] != '' && $_POST['business_zip'.$i] != '')
			{
				
				/* IT Support team */
	

				$statesql = "SELECT 
							state_name 
						FROM 
							states
						WHERE  
							state_id = '".$_POST['state'.$i]."'
						";
						
				$statex = mysql_query($statesql);
				
				$state_name = mysql_fetch_assoc($statex);
				
				
				$citysql = "SELECT 
								city_id
							FROM 
								cities
							WHERE  
								city_name = '".$_POST['business_city'.$i]."'
							";
							
				$cityex = mysql_query($citysql);
				
				$city_name = mysql_fetch_assoc($cityex);
				
				$address = $_POST['business_address'.$i].','.$_POST['business_city'.$i].','.$state_name['state_name'].','.$_POST['business_country'.$i];
				
				/*$address = $_POST['business_address'.$i].','.$_POST['business_city'.$i].','.$_POST['business_state'.$i];*/
		
				$prepAddr = str_replace(' ','+',$address);

				$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
				 
				$output= json_decode($geocode);
				 
				$latitude = $output->results[0]->geometry->location->lat;
				$longitude = $output->results[0]->geometry->location->lng;
				
			$locasql = "INSERT						INTO
																		directors
																		(
																			reference_id,
																			city,
																			state,
																			country,
																			address,
																			postal_code,
																			latitude,
																			longitude,
																			full_name,
																			email,
																			phone,                                
																			business_name,
																			business_type,
																			user_type,
																			image,
																			is_email_confirm,
																			payment_status

					
																		)
																	VALUES
																		(
																			'".$_SESSION['client']."',
																			'".$city_name['city_id']."',
																			'".$_POST['state'.$i]."',
																			'".$_POST['business_country'.$i]."',
																			'".$_POST['business_address'.$i]."',
																			'".$_POST['business_zip'.$i]."',
																			'".$latitude."',
																			'".$longitude."',
																			'".mysql_real_escape_string($_POST['full_name'])."',
																			'".$_POST['email']."',
																			'".$_POST['phone']."',
																			'".mysql_real_escape_string($_POST['business_name'])."',
																			'".$_POST['business_type']."',
																			'3',
																			'".$row_director_info['image']."',
																			'1',
																			'pending'
																			
																		)
																	";
				
			/*	$locasql = "update directors set
							reference_id='".$_SESSION['client']."',
									city='".$city_name['city_id']."',
									state='".$_POST['state'.$i]."',
									country='".$_POST['business_country'.$i]."',
									address='".$_POST['business_address'.$i]."',
									postal_code='".$_POST['business_zip'.$i]."',
									latitude='".$latitude."',
									longitude='".$longitude."',
									full_name='".mysql_real_escape_string($_POST['full_name'])."',
									email='".$_POST['email']."',
									phone='".$_POST['phone']."',                                
									business_name='".mysql_real_escape_string($_POST['business_name'])."',
									business_type='".$_POST['business_type']."',
									user_type='3',
									payment_status='pending'
									 where id='".$_SESSION['client']."'";*/
			//echo $locasql;exit;
				mysql_query($locasql);
			}
		}


		/* end of code */
		
		$total_loc = $_POST['total_location'] - 1;
		$_SESSION['free_email']=$_POST['email'];
		//setcookie("free_email", $_POST['email'], time()+3600*24);
		setcookie("total_location", $total_loc, time()+3600*24);
		
		
		header('Location:premium-membership-registration-next.php');
										
										
}											

//--------------------------------------------------------------------End Update the Director Plan-----------------------------------------------------------------------------//





										
										
										 $flag=0;					
											if($_POST['full_name'] == '')
											{
												$namerror = 'Please enter your name';
												 $flag=1;
											}
											
											if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
											{
												$emailerror = 'Please enter valid email address';
												$flag=1;
											}
											else
											{
												$checkemail = "SELECT 
																	* 
																FROM 
																	directors 
																WHERE 
																	email like '".$_POST['email']."'";
																
												$checkemailex = mysql_query($checkemail);
												
												$ispresent = @mysql_num_rows($checkemailex);
													
												if($ispresent > 0)
												{
													$emailerror = 'Email id already exist';
													$flag=1;
												}
												else
												{
													$emailerror = '';
												}
											}
											
											if($_POST['username'] == '')
											{
												$usernameerror = 'Please enter username';
												$flag=1;
											}
											else
											{
												$checkemail = "SELECT 
																		* 
																	FROM 
																		directors 
																	WHERE 
																		username = '".$_POST['username']."'
																   
																	";
					
													$checkemailex = mysql_query($checkemail);
					
													$ispresent = @mysql_num_rows($checkemailex);
													if($ispresent > 0)
													{
															$usernameerror = 'Username already exist';
															$flag=1;
													}
													else
													{
															$usernameerror = '';
													}
											}
											if($_POST['password'] == '')
											{
												$passworderror = 'Please enter password';
												$flag=1;
											}
											if($_POST['confirm_password'] == '')
											{
												$cnfrmpassworderror = 'Please enter confirm password';
												$flag=1;
											}
											if($_POST['password'] != $_POST['confirm_password'])
											{
												$cnfrmpassworderror = 'Password does not match';
												$flag=1;
											}							
											if($_POST['phone'] == '')
											{
												$phoneerror = 'Please enter your phone number';
												$flag=1;
											}
											if($_POST['business_name'] == '')
											{
												$bnameerror = 'Please enter business name';
												$flag=1;
											}
											if($_POST['business_type'] == '')
											{
												$btyperror = 'Please enter type of business';
												$flag=1;
											}
											if($_POST['business_country1'] == '')
											{
												$countryerror = 'Please enter country';
												$flag=1;
											}
											if($_POST['state'] == '')
											{
												$stateerror = 'Please enter state';
												$flag=1;
											}
											if($_POST['city'] == '')
											{
												$cityerror = 'Please enter your city';
												$flag=1;
											}
											if($_POST['business_zip1'] == '')
											{
												$postalerror = 'Please enter postal code';
												$flag=1;
											}
											if($_POST['business_address1'] == '')
											{
												$addresserror = 'Please enter address';
												$flag=1;
											}
							if($_POST['username'] != "" && $_POST['password'] != '' && $_POST['phone'] !="" && $_POST['business_name'] !="" && $_POST['business_country1'] != ''&& $_POST['business_address1']!="" && $_POST['business_type']!="" && $_POST['business_zip1']!="" && $_POST['city']!= "" && $_POST['state'] != "" && $flag==0)
											{
											
												$date = date("Y-m-d H:i:s",time());
												
												$statesql = "SELECT 
																	state_name 
																FROM 
																	states
																WHERE  
																	state_id = '".$_POST['state']."'
																";
																
													$statex = mysql_query($statesql);
													
													$state_name = mysql_fetch_assoc($statex);
													
													
													$citysql = "SELECT 
																	* 
																FROM 
																	cities
																WHERE  
																	city_name = '".$_POST['city']."'
																";
													//echo $citysql;exit;			
													$cityex = mysql_query($citysql);
													
													$city_name = mysql_fetch_assoc($cityex);
												
												
												
											   $address = $_POST['business_address1'].','.$city_name['city_name'].','.$state_name['state_name'].','.$_POST['business_country1'];
												
												
												//$address = $_POST['business_address1'].','.$_POST['business_city1'].','.$_POST['business_state1'];
												
												$prepAddr = str_replace(' ','+',$address);
						
												$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
												 
												$output= json_decode($geocode);
												 
												$latitude = $output->results[0]->geometry->location->lat;
												$longitude = $output->results[0]->geometry->location->lng;
												
												if(isset($_GET['id']))
												{
												
													$delsql = "DELETE 
															   FROM
																	directors
																WHERE
																	id = '".$_GET['id']."'
															   ";
															   
													mysql_query($delsql);
												}
												



											
												$sql = "INSERT 
														INTO
															directors
															(
																full_name,
																email,
																username,
																password,
																phone, 
																address,
																city,
																state,
																postal_code,
																country,                                       
																business_name,
																business_type,
																latitude,
																longitude,
																user_type,
																image,
																total_location,
																date,
																payment_status
															)
														VALUES
															(
																'".mysql_real_escape_string($_POST['full_name'])."',
																'".$_POST['email']."',
																'".mysql_real_escape_string($_POST['username'])."',
																'".md5($_POST['password'])."',
																'".$_POST['phone']."',
																'".$_POST['business_address1']."',
																'".$city_name['city_id']."',
																'".$_POST['state']."',
																'".$_POST['business_zip1']."',
																'".$_POST['business_country1']."',
																'".mysql_real_escape_string($_POST['business_name'])."',
																'".$_POST['business_type']."',
																'".$latitude."',
																'".$longitude."',
																'3',
																'no-profile-img.gif',
																'".$_POST['total_location']."',
																'".$date."',
																'pending'									
															)
														";
												//echo $sql;exit;		
												mysql_query($sql);
												
												$premium_member_id = mysql_insert_id();
												//echo $_POST['total_location'];exit;
												for($i=2;$i<=$_POST['total_location'];$i++)
												{
														
													
													if($_POST['business_country'.$i] != '' && $_POST['state'.$i] != '' && $_POST['business_city'.$i] != '' && $_POST['business_address'.$i] != '' && $_POST['business_zip'.$i] != '')
													{
														
														/* IT Support team */
					
					
														$statesql = "SELECT 
																	state_name 
																FROM 
																	states
																WHERE  
																	state_id = '".$_POST['state'.$i]."'
																";
																
														$statex = mysql_query($statesql);
														
														$state_name = mysql_fetch_assoc($statex);
														
														
														$citysql = "SELECT 
																		city_id
																	FROM 
																		cities
																	WHERE  
																		city_name = '".$_POST['business_city'.$i]."'
																	";
																	
														$cityex = mysql_query($citysql);
														
														$city_name = mysql_fetch_assoc($cityex);
														
														$address = $_POST['business_address'.$i].','.$_POST['business_city'.$i].','.$state_name['state_name'].','.$_POST['business_country'.$i];
														
														/*$address = $_POST['business_address'.$i].','.$_POST['business_city'.$i].','.$_POST['business_state'.$i];*/
												
														$prepAddr = str_replace(' ','+',$address);
								
														$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
														 
														$output= json_decode($geocode);
														 
														$latitude = $output->results[0]->geometry->location->lat;
														$longitude = $output->results[0]->geometry->location->lng;
														
														
														
														$locasql = "INSERT
																	INTO
																		directors
																		(
																			reference_id,
																			city,
																			state,
																			country,
																			address,
																			postal_code,
																			latitude,
																			longitude,
																			full_name,
																			email,
																			phone,                                
																			business_name,
																			business_type,
																			user_type,
																			image,
																			payment_status

					
																		)
																	VALUES
																		(
																			'".$premium_member_id."',
																			'".$city_name['city_id']."',
																			'".$_POST['state'.$i]."',
																			'".$_POST['business_country'.$i]."',
																			'".$_POST['business_address'.$i]."',
																			'".$_POST['business_zip'.$i]."',
																			'".$latitude."',
																			'".$longitude."',
																			'".mysql_real_escape_string($_POST['full_name'])."',
																			'".$_POST['email']."',
																			'".$_POST['phone']."',
																			'".mysql_real_escape_string($_POST['business_name'])."',
																			'".$_POST['business_type']."',
																			'3',
																			'no-profile-img.gif',
																			'pending'
																			
																		)
																	";
													//echo $locasql;exit;
														mysql_query($locasql);
													}
												}
					
					
												/* end of code */
												
												$total_loc = $_POST['total_location'] - 1;
												$_SESSION['free_email']=$_POST['email'];
												$_SESSION['total_location']=$total_loc;
												//setcookie("free_email", $_POST['email'], time()+3600*24);
												//setcookie("total_location", $total_loc, time()+3600*24);
												
												
												header('Location:premium-membership-registration-next.php');
											}
										}
									?>
					
					
									<form action="" method="POST" id="premium_reg_form">
					
					
										  <fieldset class="fieldset director_fieldset"><!--<legend class="legend">Contact Information</legend>-->
										 
											<span class="fields_wrapp1">
												
												<span class="reg_name ename">Full Name <span class="red">*</span></span>
												<input class="reg_field" type="text" name="full_name" id="full_name" value="<?php if(isset($_POST['full_name'])) echo $_POST['full_name']; else if(isset($_SESSION['person_id'])) echo $row_director_info['full_name'];?>">
												<span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($namerror)) echo $namerror;?></span>
												 <span class="formerror1" id="full_nameerror">Please Enter Full Name.</span>
											</span>
											<span class="fields_wrapp1">
												<span class="reg_name ename">Email <span class="red">*</span></span>
												<input class="reg_field" type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];else if(isset($_SESSION['person_id'])) echo $row_director_info['email'];?>"<?php if(isset($_SESSION['person_id'])){?>readonly=""<?php } ?> onBlur="emailrepeatcheck(this.value)">
												 <span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;" id="emailer"><?php if(isset($emailerror)) echo $emailerror;?></span>
												 <span class="formerror1" id="emailerror">Please Enter Valid Email Id.</span>
												<span class="formerror1" id="emailcheckerright"><img src="tick1.png"/></span> 
												<span class="formerror1" id="emailcheckerwrong"><img src="del.png"/> Sorry Email Id already registered.</span> 
											   <span class="formerror1" id="loading"><img src="loading.gif"/></span> 
									   
											</span> 
											<span class="fields_wrapp1 ">
												<span class="reg_name ename">Phone <span class="red">*</span></span>
												<input class="reg_field" maxlength="12" type="text" name="phone" id="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];else if(isset($_SESSION['person_id'])) echo $row_director_info['phone'];?>" />
												<span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;" ><?php if(isset($phoneerror)) echo $phoneerror;?></span>
											 <span class="formerror1" id="phoneerror">Please Enter Phone.</span>    
											</span>
											<span class="fields_wrapp1">
												<span class="reg_name ename">Username <span class="red">*</span></span>
												<input class="reg_field" type="text" name="username" id="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; else if(isset($_SESSION['person_id'])) echo $row_director_info['username'];?>" onBlur="checkusername(this.value)"/>
												<span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;" id="uerror"><?php if(isset($usernameerror)) echo $usernameerror;?></span>
												<span class="formerror1" id="usernameerror">Please Enter Username.</span>
												  <span class="formerror1" id="usernamecheckerright"><img src="tick1.png"/></span> 
												<span class="formerror1" id="usernamecheckerwrong"><img src="del.png"/> Sorry username already registered.</span> 
											   <span class="formerror1" id="usernameloading"><img src="loading.gif"/></span> 
											</span>
											
											<span class="fields_wrapp1">
												<span class="reg_name ename">Password <span class="red">*</span></span>
												<input class="reg_field" type="password" name="password" id="password">
												<span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($passworderror)) echo $passworderror;?></span>
												 <span class="formerror1" id="passworderror">Please Enter Password.</span>
											</span>
											<span class="fields_wrapp1">
												<span class="reg_name ename">Confirm Password <span class="red">*</span></span>
												<input class="reg_field" type="password" name="confirm_password" id="confirm_password" onKeyUp="matchpwd()">
												<span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($cnfrmpassworderror)) echo $cnfrmpassworderror;?></span>
												 <span class="formerror1" id="cpassworderror">Mismatch Password .</span>
												 <span class="formerror1" id="cpassword"><img src="tick.png"/></span>
											</span>                        
											<span class="fields_wrapp1">
												<span class="reg_name ename">Business  Name <span class="red">*</span></span>
												<input class="reg_field" type="text" name="business_name" id="business_name" value="<?php if(isset($_POST['business_name'])) echo $_POST['business_name'];else if(isset($_SESSION['person_id'])) echo $row_director_info['business_name'];?>">
												<span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($bnameerror)) echo $bnameerror;?></span>
												 <span class="formerror1" id="bnameerror">Please Enter Business Name.</span>
											</span>
											<span class="fields_wrapp1">
												<span class="reg_name ename">Business Type  <span class="red">*</span></span>
												 <input class="reg_field" type="text" name="business_type" id="business_type" value="Funeral Business" readonly>
												<!--<select class="defaultSelect" name="business_type" id="business_type">
													<option value="">Select Type</option>
													<option value="Funeral Business" <?php if(isset($_POST['business_type']) && $_POST['business_type'] == 'Funeral Business') echo 'selected=selected';?>>Funeral Business</option>
													<option value="Cemetery">Cemetery</option>
													<option value="Memorial Products">Memorial Products</option>
													<option value="Life Insurance Agent">Life Insurance Agent</option>
													<option value="Legal">Legal</option>
													<option value="Other">Other</option>
												</select>-->
												<span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($btyperror)) echo $btyperror;?></span>
											</span>
											
										  </fieldset>
										  
										  <fieldset class="fieldset director_fieldset" style="margin-bottom:20px;"><!--<legend class="legend">Business Information</legend>-->
											<span class="reg_name ename"><b style="font-size:20px;">Location:1</b></span>
											<div style="float:left" id="businessdiv">
											<span class="add_loc span_no1">
											 <span class="fields_wrapp1">
													<span class="reg_name ename">Country</span>
													
											<input  type="text" name="business_country1" id="business_country1"  class="reg_field" value="Australia" readonly />
													<!----
													<select class="reg_field preInput" name= "business_country1" id="business_country1">
														<option value="">Select Country</option>
														<option value="Australia" <?php if(isset($_POST['country']) && $_POST['country'] == 'Australia') echo 'selected=selected';?>>Australia</option>
													</select>
													-->
												   <span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($countryerror)) echo $countryerror;?></span>
												</span>
												
												<span class="fields_wrapp1">
												
												<span class="reg_name" >Select State <span class="red">*</span></span>
												<select class="defaultSelect" name="state" id="state">
													<option value="">Select state/region</option>
													<?php
														$statesql = "SELECT * FROM states ORDER BY state_name";
														$statesex = mysql_query($statesql);
														
														while($states = mysql_fetch_assoc($statesex))
														{
															if(isset($_POST['state']) && $_POST['state'] == $states['state_id'] || $row_director_info['state']==$states['state_id'])
															{
																$selected = 'selected=selected';
															}
															else
															{
																$selected = '';
															}
															
															echo '<option value="'.$states['state_id'].'" '.$selected.'>'.$states['state_name'].'</option>';
														}
													?>
												   
												</select>
												<span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($stateerror)) echo $stateerror;?></span>
												  <span class="formerror1" id="stateerror">Please Select state.</span>
												
											</span>
									<?php		$citysql25 = "SELECT 
																	* 
																FROM 
																	cities
																WHERE  
																	city_id = '".$row_director_info['city']."'
																";
													//echo $citysql;exit;			
													$cityex25 = mysql_query($citysql25);
													
													$city_name25 = mysql_fetch_assoc($cityex25); ?>
											
											<span class="fields_wrapp1">
												<span class="reg_name">Select Suburb <span class="red">*</span></span>
												<span id="city_span">
												<!--<select class="defaultSelect" name="city" id="city">
													<option value="">Select city</option>
												</select>-->    
												<input class="reg_field" type="text" name="city" id="city" value="<?php if(isset($_POST['city'])) echo $_POST['city'];else if(isset($_SESSION['person_id'])) echo $city_name25['city_name'];?>" style="margin-left:inherit !important;">
														   
												</span>   
												<span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"> <?php if(isset($cityerror)) echo $cityerror;?></span>  
												 <span class="formerror1" id="suburberror">Please Select Suburb.</span>         
											</span>
												
											   
												<span class="fields_wrapp1">
													<span class="reg_name ename">Address<span class="red">*</span></span>
													<input class="reg_field" type="text" name="business_address1" id="business_address1" value="<?php if(isset($_POST['business_address1'])) echo $_POST['business_address1'];else if(isset($_SESSION['person_id'])) echo $row_director_info['address'];?>">
												 <span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($addresserror)) echo $addresserror;?></span>
												  <span class="formerror1" id="addresserror">Please Enter Address.</span> 
												</span>
												<span class="fields_wrapp1">
													<span class="reg_name ename">Postcode / Zip <span class="red">*</span></span>
													<input class="reg_field" type="text" name="business_zip1" id="business_zip1" value="<?php if(isset($_POST['business_zip1'])) echo $_POST['business_zip1'];else if(isset($_SESSION['person_id'])) echo $row_director_info['postal_code'];?>" maxlength="4">
												  <span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($postalerror)) echo $postalerror;?></span>
												   <span class="formerror1" id="postelcodeerror">Please Enter zip/code.</span> 
												</span>
												
											</span>
											
											
											
										
                    <?php  if(isset($_SESSION['client']))
					{ 
					
					$extra = mysql_query("Select * from directors where reference_id = '".$_SESSION['client']."'");
                         $c = mysql_num_rows($extra);
                        if($c>0)
                        {
                            $i=1;
                            while($dis_re = mysql_fetch_assoc($extra))
                            {
                         ?>	
											
											
											<span class="reg_name ename"><b style="font-size:20px;">Location:<?php echo $i+1;?></b></span>	
											<span class="add_loc span_no1">
											 <span class="fields_wrapp1">
													<span class="reg_name ename">Country</span>
													
											<input  type="text" name="business_country1" id="business_country1"  class="reg_field" value="Australia" readonly />
													<!----
													<select class="reg_field preInput" name= "business_country1" id="business_country1">
														<option value="">Select Country</option>
														<option value="Australia" <?php if(isset($_POST['country']) && $_POST['country'] == 'Australia') echo 'selected=selected';?>>Australia</option>
													</select>
													-->
												   <span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($countryerror)) echo $countryerror;?></span>
												</span>
												
												<span class="fields_wrapp1">
												
												<span class="reg_name" >Select State <span class="red">*</span></span>
												<select class="defaultSelect" name="state<?php echo $i;?>" id="state">
													<option value="">Select state/region</option>
													<?php
														$statesql2 = "SELECT * FROM states ORDER BY state_name";
														$statesex2 = mysql_query($statesql2);
														
														while($states2 = mysql_fetch_assoc($statesex2))
														{
															if(isset($_POST['state']) && $_POST['state'] == $states2['state_id'] || $dis_re['state']==$states2['state_id'])
															{
																$selected = 'selected=selected';
															}
															else
															{
																$selected = '';
															}
															
															echo '<option value="'.$states2['state_id'].'" '.$selected.'>'.$states2['state_name'].'</option>';
														}
													?>
												   
												</select>
												<span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($stateerror)) echo $stateerror;?></span>
												  <span class="formerror1" id="stateerror">Please Select state.</span>
												
											</span>
									<?php		$citysql254 = "SELECT 
																	* 
																FROM 
																	cities
																WHERE  
																	city_id = '".$dis_re['city']."'
																";
													//echo $citysql;exit;			
													$cityex254 = mysql_query($citysql254);
													
													$city_name254 = mysql_fetch_assoc($cityex254); ?>
											
											<span class="fields_wrapp1">
												<span class="reg_name">Select Suburb <span class="red">*</span></span>
												<span id="city_span">
												<!--<select class="defaultSelect" name="city" id="city">
													<option value="">Select city</option>
												</select>-->    
												<input class="reg_field" type="text" name="city<?php echo $i;?>" id="city" value="<?php if(isset($_POST['city'])) echo $_POST['city'];else if(isset($_SESSION['person_id'])) echo $city_name254['city_name'];?>" style="margin-left:inherit !important;">
														   
												</span>   
												<span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"> <?php if(isset($cityerror)) echo $cityerror;?></span>  
												 <span class="formerror1" id="suburberror">Please Select Suburb.</span>         
											</span>
												
											   
												<span class="fields_wrapp1">
													<span class="reg_name ename">Address<span class="red">*</span></span>
													<input class="reg_field" type="text" name="business_address1<?php echo $i;?>" id="business_address1" value="<?php if(isset($_POST['business_address1'])) echo $_POST['business_address1'];else if(isset($_SESSION['person_id'])) echo $dis_re['address'];?>">
												 <span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($addresserror)) echo $addresserror;?></span>
												  <span class="formerror1" id="addresserror">Please Enter Address.</span> 
												</span>
												<span class="fields_wrapp1">
													<span class="reg_name ename">Postcode / Zip <span class="red">*</span></span>
													<input class="reg_field" type="text" name="business_zip1<?php echo $i;?>" id="business_zip1" value="<?php if(isset($_POST['business_zip1'])) echo $_POST['business_zip1'];else if(isset($_SESSION['person_id'])) echo $dis_re['postal_code'];?>" maxlength="4">
												  <span class="formerror" style="float: left;width: 200px;color: red;font-family: 'Conv_Helvetica-Light'; font-size: 13px;"><?php if(isset($postalerror)) echo $postalerror;?></span>
												   <span class="formerror1" id="postelcodeerror">Please Enter zip/code.</span> 
												</span>
												
											</span>
											
								 <?php $i++;} } }?>			
											
												</div>
											
											
											<input type="hidden" value="1" id="total_location" name="total_location">
											
											<input type="hidden" value="199" id="total_cost" name="total_cost">
											
											<span class="fields_wrapp1">
													<span class="reg_name ename">&nbsp;</span>
													<a href="javascript:void(0);">
														<input style="margin-top:-3px;" class="login_button" type="button" value="Add +" id="addrow"></a>
												</span>
											
											
											<span style="width:100%; float:left;">
												<span class="reg_name">&nbsp;</span>
												<input style="float:right;" class="login_button" type="submit" name="submit" value="Next Step" onClick="return registrationvalidate();">
											</span>
											</fieldset>
											</div>
											
												<!--<span class="fields_wrapp1 addPreField">
												<span class="reg_name ename">Business Type  <span class="red">*</span></span>
												<select class="defaultSelect" name="business_type" id="business_type">
													<option value="">Select Type</option>
													<option value="Funeral Home">Funeral Business</option>
												</select>
											</span>
											<span class="fields_wrapp1">
												<span class="reg_name ename">Area/Locations your company services</span>
												<textarea class="reg_tarea" name="area_location" id="area_location"></textarea>
											</span>
										  </div>
											<span style="width:100%; float:left;">
												<span class="reg_name">&nbsp;</span>
												<input style="float:right;" class="invite_director_btn" type="submit" name="submit" value="Next Step">
											</span>-->
											</form>
											</fieldset>
									
								   
					</div>
				          
			</div>
		</div>
	</div>
</div>
<!--Custom File Type-->
<script type="text/javascript">
;(function( $ ) {

  // Browser supports HTML5 multiple file?
  var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
      isIE = /msie/i.test( navigator.userAgent );

  $.fn.customFile = function() {

    return this.each(function() {

      var $file = $(this).addClass('customfile'), // the original file input
          $wrap = $('<div class="customfile-wrap">'),
          $input = $('<input type="text" class="customfile-filename" />'),
          // Button that will be used in non-IE browsers
          $button = $('<button type="button" class="customfile-upload">BROWSE</button>'),
          // Hack for IE
          $label = $('<label class="customfile-upload" for="'+ $file[0].id +'">Open</label>');

      // Hide by shifting to the left so we
      // can still trigger events
      $file.css({
        position: 'absolute',
        left: '-9999px'
      });

      $wrap.insertAfter( $file )
        .append( $file, $input, ( isIE ? $label : $button ) );

      // Prevent focus
      $file.attr('tabIndex', -1);
      $button.attr('tabIndex', -1);

      $button.click(function () {
        $file.focus().click(); // Open dialog
      });

      $file.change(function() {

        var files = [], fileArr, filename;

        // If multiple is supported then extract
        // all filenames from the file array
        if ( multipleSupport ) {
          fileArr = $file[0].files;
          for ( var i = 0, len = fileArr.length; i < len; i++ ) {
            files.push( fileArr[i].name );
          }
          filename = files.join(', ');

        // If not supported then just take the value
        // and remove the path to just show the filename
        } else {
          filename = $file.val().split('\\').pop();
        }

        $input.val( filename ) // Set the value
          .attr('title', filename) // Show filename in title tootlip
          .focus(); // Regain focus

      });

      $input.on({
        blur: function() { $file.trigger('blur'); },
        keydown: function( e ) {
          if ( e.which === 13 ) { // Enter
            if ( !isIE ) { $file.trigger('click'); }
          } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
            // On some browsers the value is read-only
            // with this trick we remove the old input and add
            // a clean clone with all the original events attached
            $file.replaceWith( $file = $file.clone( true ) );
            $file.trigger('change');
            $input.val('');
          } else if ( e.which === 9 ){ // TAB
            return;
          } else { // All other keys
            return false;
          }
        }
      });

    });

  };

  // Old browser fallback
  if ( !multipleSupport ) {
    $( document ).on('change', 'input.customfile', function() {

      var $this = $(this),
          // Create a unique ID so we
          // can attach the label to the input
          uniqId = 'customfile_'+ (new Date()).getTime(),
          $wrap = $this.parent(),

          // Filter empty input
          $inputs = $wrap.siblings().find('.customfile-filename')
            .filter(function(){ return !this.value }),

          $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

      // 1ms timeout so it runs after all other events
      // that modify the value have triggered
      setTimeout(function() {
        // Add a new input
        if ( $this.val() ) {
          // Check for empty fields to prevent
          // creating new inputs when changing files
          if ( !$inputs.length ) {
            $wrap.after( $file );
            $file.customFile();
          }
        // Remove and reorganize inputs
        } else {
          $inputs.parent().remove();
          // Move the input so it's always last on the list
          $wrap.appendTo( $wrap.parent() );
          $wrap.find('input').focus();
        }
      }, 1);

    });
  }

}( jQuery ));

$('input[type=file]').customFile();
function registrationvalidate()
{
	document.getElementById('full_nameerror').style.display='none';
	document.getElementById('emailerror').style.display='none';
	document.getElementById('usernameerror').style.display='none';
	document.getElementById('passworderror').style.display='none';
	document.getElementById('cpassworderror').style.display='none';
	document.getElementById('phoneerror').style.display='none';
	document.getElementById('bnameerror').style.display='none';
	document.getElementById('stateerror').style.display='none';
	document.getElementById('suburberror').style.display='none';
	document.getElementById('postelcodeerror').style.display='none';
	document.getElementById('addresserror').style.display='none';
	
	flag=0;
	
	if(document.getElementById('full_name').value=='')
	{
		
	document.getElementById('full_nameerror').style.display='inline';
	flag=1;	
	}
	var x = document.getElementById('email').value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        document.getElementById('emailerror').style.display='inline';
	flag=1;	
    }
	
	if(document.getElementById('username').value=='')
	{
	document.getElementById('usernameerror').style.display='inline';
	flag=1;	
	}
	if(document.getElementById('password').value=='')
	{
	document.getElementById('passworderror').style.display='inline';
	flag=1;	
	}
	if(document.getElementById('confirm_password').value!=document.getElementById('password').value)
	{
	document.getElementById('cpassworderror').style.display='inline';
	flag=1;	
	}
	if(document.getElementById('phone').value=='')
	{
	document.getElementById('phoneerror').style.display='inline';
	flag=1;	
	}
	if(document.getElementById('business_name').value=='')
	{
	document.getElementById('bnameerror').style.display='inline';
	flag=1;	
	}
	
	if(document.getElementById('state').value=='')
	{
	document.getElementById('stateerror').style.display='inline';
	flag=1;	
	}
	if(document.getElementById('city').value=='')
	{
	document.getElementById('suburberror').style.display='inline';
	flag=1;	
	}
	if(document.getElementById('business_zip1').value=='')
	{
	document.getElementById('postelcodeerror').style.display='inline';
	flag=1;	
	}
	if(document.getElementById('business_address1').value=='')
	{
	document.getElementById('addresserror').style.display='inline';
	flag=1;	
	}

	for(i=2; i<=parseInt(document.getElementById('total_location').value); i++)
	{
		document.getElementById('stateerror'+i).style.display='none';
		document.getElementById('suburberror'+i).style.display='none';
		document.getElementById('addresserror'+i).style.display='none';
		document.getElementById('postelcodeerror'+i).style.display='none';	
		if(document.getElementById('state'+i).value=='')
		{
		document.getElementById('stateerror'+i).style.display='inline';	
		flag=1;
		}
		if(document.getElementById('business_city'+i).value=='')
		{
		document.getElementById('suburberror'+i).style.display='inline';	
		flag=1;
		}
		if(document.getElementById('business_address'+i).value=='')
		{
		document.getElementById('addresserror'+i).style.display='inline';	
		flag=1;
		}
		if(document.getElementById('business_zip'+i).value=='')
		{
		document.getElementById('postelcodeerror'+i).style.display='inline';	
		flag=1;
		}
	}
	if(flag==1)
	{
		return false;
	}
}

function matchpwd()
{
 if(document.getElementById('password').value!=document.getElementById('confirm_password').value)
 {
	 document.getElementById('cpassword').style.display='none';
	 document.getElementById('cpassworderror').style.display='inline';
	 
 }
 else
 {
	  document.getElementById('cpassworderror').style.display='none';
	 document.getElementById('cpassword').style.display='inline';
 }
}

function emailrepeatcheck(email)
{
	document.getElementById('emailer').style.display='none';
	var x = email;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		document.getElementById('emailerror').style.display='inline';
    document.getElementById('loading').style.display='none';
	document.getElementById('emailcheckerright').style.display='none';
	document.getElementById('emailcheckerwrong').style.display='none';
	document.getElementById('email').value='';	
document.getElementById('email').focus();    
	flag=1;	
    }
	else
	{
	document.getElementById('emailerror').style.display='none';
	document.getElementById('loading').style.display='inline';
	document.getElementById('emailcheckerright').style.display='none';
	document.getElementById('emailcheckerwrong').style.display='none';
	$.get( "testmail.php", { email: email } )
.done(function( data ) {
if(data==1)
{
document.getElementById('loading').style.display='none';
	document.getElementById('emailcheckerright').style.display='none';
	document.getElementById('emailcheckerwrong').style.display='inline';
document.getElementById('email').value='';	
document.getElementById('email').focus();
return false;
}
else
{
document.getElementById('loading').style.display='none';
	document.getElementById('emailcheckerright').style.display='inline';
	document.getElementById('emailcheckerwrong').style.display='none';	

}
   });
	}
}

function checkusername(username)
{
	document.getElementById('uerror').style.display='none';
	if(document.getElementById('username').value!='')
	{
document.getElementById('usernameloading').style.display='inline';
	document.getElementById('usernamecheckerright').style.display='none';
	document.getElementById('usernamecheckerwrong').style.display='none';
	$.get( "testusername.php", { username: username } )
.done(function( data ) {
if(data==1)
{
document.getElementById('usernameloading').style.display='none';
	document.getElementById('usernamecheckerright').style.display='none';
	document.getElementById('usernamecheckerwrong').style.display='inline';
document.getElementById('username').value='';	
document.getElementById('username').focus();
return false;
}
else
{
document.getElementById('usernameloading').style.display='none';
	document.getElementById('usernamecheckerright').style.display='inline';
	document.getElementById('usernamecheckerwrong').style.display='none';	

}
   });	
	}
}
</script>
<!--Custom File Type-->

<?php include("include/main_footer1.php"); ?>  
</body>
</html>
