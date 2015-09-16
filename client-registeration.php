

<?php
	ob_start();
	include_once('./include/config.php');
	
	session_start();
?>


<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb"> <!--<![endif]-->


<?php include 'include/main_header.php'; ?>

 

<link href="css/Old_Include_Css/style.css" rel="stylesheet" type="text/css">	 
<link href="css/Old_Include_Css/style1.css" rel="stylesheet" type="text/css">	
<link type="text/css" rel="Stylesheet" href="css/Old_Include_Css/jquery.validity.css" />
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
<!--<script type="text/javascript" src="js/location.js"></script>-->

<script type="text/javascript" src="js/Old_Include_Js/jquery-ui-1.8.23.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery-ui-1.8.23.custom.css" />


<script src="js/Old_Include_Js/respond.min.js"></script>



<div class="gridContainer clearfix">
  <div id="">
      <div id="wrapper">
       		<div id="">
            
       			



            <?php
				//require_once('atneed/swift/swift_required.php');
				
				if(isset($_POST['submit']))
				{
					if($_POST['first_name'] == '')
					{
						$namerror = 'Please enter your first name';
					}
					
					if($_POST['last_name'] == '')
					{
						$lnamerror = 'Please enter your last name';
					}
					
					if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
					{
						$emailerror = 'Please enter valid email address';
					}
					else
					{
						$checkemail = "SELECT 
											* 
										FROM 
											clients 
										WHERE 
											email = '".$_POST['email']."'
										";
										
						$checkemailex = mysql_query($checkemail);
						
						$ispresent = @mysql_num_rows($checkemailex);
							
						if($ispresent > 0)
						{
							$emailerror = 'Email id already exist';
						}
						else
						{
							$emailerror = '';
						}
					}
					
					if($_POST['username'] == '')
					{
						$usernameerror = 'Please enter username';
					}
					else
					{
						$checkusername = "SELECT 
											* 
										FROM 
											clients 
										WHERE 
											username = '".$_POST['username']."'
										";
										
						$checkeusername_re = mysql_query($checkusername);
						
						$ispresent_u = @mysql_num_rows($checkeusername_re);
							
						if($ispresent_u > 0)
						{
							$usernameerror = 'username all already exist';
						}
						else
						{
							$usernameerror = '';
						}
					
					}
					if($_POST['password'] == '')
					{
						$passworderror = 'Please enter password';
					}
					if($_POST['confirm_password'] == '')
					{
						$cnfrmpassworderror = 'Please enter confirm password';
					}
					if($_POST['password'] != $_POST['confirm_password'])
					{
						$cnfrmpassworderror = 'Password does not match';
					}						
					
					
					if(empty($emailerror) && empty($usernameerror) &&  empty($cnfrmpassworderror) && empty($namerror) &&  empty($lnamerror))
					{
					
						$date = date("Y-m-d H:i:s",time());
						/*
						$citysql = "SELECT 
										* 
									FROM 
										cities
									WHERE
										city_name = '".$_POST['city']."'
									";
									
						$cityex = mysql_query($citysql);
						
						$city_name = mysql_fetch_assoc($cityex);*/
						
						$sql = "INSERT 
								INTO
									clients
									(
										first_name,
										last_name,
										email,
										username,
										password,
										image,
										date,
										plan
									)
								VALUES
									(
										'".mysql_real_escape_string($_POST['first_name'])."',
										'".mysql_real_escape_string($_POST['last_name'])."',
										'".$_POST['email']."',
										'".$_POST['username']."',
										'".md5($_POST['password'])."',
										'no-profile-img.gif',
										'".$date."',
										'".$_GET['plan']."'									
									)
								";
							
						mysql_query($sql);
						
						$user_id = mysql_insert_id();
						
						$_SESSION['free_email']=$_POST['email'];
						//setcookie("free_email", $_POST['email'], time()+3600);
						
						$random_number = rand(1000000, 9999999);
						
						$link = base_url.'client_confirm.php?id='.$random_number.'&user_token='.$user_id;
						
						$email = $_POST['email'];
						
						
						
						$sql = "UPDATE 
									clients 
								SET 
									email_confirm = '".$random_number."' 
								WHERE 
									email = '".$email."'
								";
								
						mysql_query($sql);
						
						$name = $_POST['first_name'];
						
						$username = $_POST['username'];
						
							
					
										
							require_once('email-format.php');
?>	
					
					 <META http-equiv="refresh" content="0;URL=account-verification.php">		
						

	
<?php				}	
						
						
				
				}
			
			?>
    
<br /><br /><br /><br /><br /><br /><br /><br />
<div class="punch_text_02 client_member_heading">
    <div class="container">
	<div align="left">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;" class="blue_heading"><!--Funeral<?php if(isset($_GET['plan']) and $_GET['plan'] == 1) {  ?> Client Basic Membership Plan <?php } ?><?php if(isset($_GET['plan']) and $_GET['plan'] == 2) {  ?> Client Direct Membership Plan <?php } ?><?php if(isset($_GET['plan']) and $_GET['plan'] == 3) {  ?> Client  Advance Membership Plan <?php } ?>--> Client Membership Application</font>	
    </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="container" style="background:#FFFFFF">
			
					
<div class="mar_top5"></div>
				
			 <div class="director_heading"><p style="font-size:20px; font-family:'Helvetica Medium 65', Arial !important;" class="blue_heading"><?php if($_GET['plan']==1){?>EZIFUNERALS BASIC APPLICATION<?php } ?><?php if($_GET['plan']==2){?>EZIFUNERALS DIRECT APPLICATION<?php } ?><?php if($_GET['plan']==3){?>EZIFUNERALS ADVANCE APPLICATION<?php } ?></div><br/>
	<div class="">
        	
	<div class="name-field">
            	<div class="">
                <div class="">
				
					 	 <fieldset class="fieldset" style="margin-bottom:10px;"><legend class="legend"></legend>
								 <form name="client_registration_form" action="" method="post" id="client_registration_form">
									
									
									<span class="fields_wrapp">
										<span class="reg_name">First Name <span class="red">*</span></span><br/>
											<input class="reg_field" type="text" name="first_name" id="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'];?>" size="50">
										<span class="formerror_new"><?php if(isset($namerror)) echo $namerror;?></span><br />
									</span><br />
									
									<span class="fields_wrapp">
										<span class="reg_name">Last Name <span class="red">*</span></span><br/>
											<input class="reg_field" type="text" name="last_name" id="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name'];?>" size="50">
										<span class="formerror_new"><?php if(isset($lnamerror)) echo $lnamerror;?></span><br />
									</span><br />
									
								<!--	<span class="fields_wrapp1">
										<span class="reg_name">Phone<span class="red">*</span></span><br />
										<input class="reg_field" type="text" name="phone" id="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>" maxlength="10" size="50">
										<span class="formerror_new"><?php if(isset($phoneerror)) echo $phoneerror;?></span><br />
									</span><br />-->
									
									<span class="fields_wrapp">
										<span class="reg_name">Email <span class="red">*</span></span><br />
										<input class="reg_field" type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" size="50">
										<span class="formerror_new"><?php if(isset($emailerror)) echo $emailerror;?></span><br />
									</span><br />
									
									<!--<span class="fields_wrapp1">
										
									<span class="reg_name">Country</span><br />
									<input  type="text" name="country" id="country1"  class="reg_field" value="Australia" readonly  size="50"/>
			
									
										
										<span class="formerror_new"><?php if(isset($countryerror)) echo $countryerror;?></span><br>
					
									</span><br />
									
									<span class="fields_wrapp1">
										
										<span class="reg_name">Select State <span class="red">*</span></span><br />
										<select class="defaultSelect" name="state" id="state" style="width:362px; height:30px;">
											<option value="">Select state/region</option>
											<?php
												$statesql = "SELECT * FROM states ORDER BY state_name";
												$statesex = mysql_query($statesql);
												
												while($states = mysql_fetch_assoc($statesex))
												{
													if(isset($_POST['state']) && $_POST['state'] == $states['state_id'])
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
										<span class="formerror_new"><?php if(isset($stateerror)) echo $stateerror;?></span><br />                        	
									</span><br />
									
									
									<span class="fields_wrapp1">
										<span class="reg_name">Enter suburb <span class="red">*</span></span><br />
										<span id="city_span">
										   
										<input class="reg_field" type="text" name="city" id="city" value="<?php if(isset($_POST['city'])) echo $_POST['city'];?>" size="50">
												   
										</span>   
										<span class="formerror_new"><?php if(isset($cityerror)) echo $cityerror;?></span> <br />
									</span><br />-->
									
									<span class="fields_wrapp">
										<span class="reg_name">Username <span class="red">*</span></span><br />
										<input class="reg_field" type="text"  name="username" id="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>" size="50">
										<span class="formerror_new"><?php if(isset($usernameerror)) echo $usernameerror;?></span><br />
									</span><br />
									
									<span class="fields_wrapp">
										<span class="reg_name">Password <span class="red">*</span></span><br />
										<input class="reg_field" type="password"  name="password" id="password" size="50" >
										<span class="formerror_new"><?php if(isset($passworderror)) echo $passworderror;?></span><br />
									</span><br />
									
									<span class="fields_wrapp">
										<span class="reg_name">Re-type Password <span class="red">*</span></span><br />
										<input class="reg_field" type="password"  name="confirm_password" id="confirm_password" size="50">
										<span class="formerror_new"><?php if(isset($cnfrmpassworderror)) echo $cnfrmpassworderror;?></span><br />
									</span><br />
									
									<!--<span class="fields_wrapp">
										
									<span class="reg_name" style="margin-top:0px;">How did you hear about<br/> 
											<strong>eziFunerals</strong> (Optional)</span><br/>
									
												<select name="hear_about" id="hear_about" class=""  style="height:40px; width:97%">
													<option value=""> Select </option>
													<option value="Search Engine Ad">Search Engine Ad</option>
													<option value="Search Engine Results">Search Engine Results</option>
													<option value="Friend">Friend</option>
													<option value="Blog or Forum">Blog or Forum</option>
													<option value="Newspaper or Magazine">Newspaper or Magazine</option>
													<option value="Event or Conference">Event or Conference</option>
													<option value="Radio">Radio</option>
													<option value="Television">Television</option>
													<option value="Other">Other</option>
												</select>
					
									</span> <br /><br />-->
									
									<!--<span class="fields_wrapp1">
										<span class="reg_name">Enter the Code Shown <span class="red">*</span></span><br/>
										<input class="reg_field" type="text" name="6_letters_code" id="6_letters_code" size="50">
										<?php if(isset($error)) {?> <span class="formerror_new"><?php echo $error;?></span><?php }?>
									</span><br /><br />
									
									<span class="fields_wrapp1">
										<span class="reg_name">&nbsp;</span>
										<img src="captcha_code_file.php?rand=<?php echo rand();?>" id='captchaimg'>
										<span style="font-family: 'open_sansregular'; font-size:14px;">Can't read the image? click<a href="javascript: refreshCaptcha();" style="
				color: #0096A5;
			"> here</a> to refresh</span> </span><br /><br />-->
			
									<span class="fields_wrapp">
										
			<span class="reg_name1">By creating an account below you are agreeing that you have read and
			accept the <a href="<?php echo base_url;?>page/terms-of-use" target="_blank">eziFunerals User Agreement</a> and <a href="<?php echo base_url;?>page/privacy-policy" target="_blank">Privacy Policy</a>.</span> <br />
			
									</span>
									
									<span style="width:100%; float:left;">						
										<span class="reg_name">&nbsp;</span><br />
										<input class="new_button form_button_1 form_button_12" type="submit" name="submit" value="CONTINUE" style="width:112px;">
										<br /><br /><br />
									</span>
									
									</form>
									</fieldset><br/>
								</div>
								
                </div>
                </div>


    </div><!-- end section -->
    </div>
</div>

<div class="one_half last"></div>

<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
<img src="images/footer_AD.png" width="620" class="center_img">
</div>


<!-- Footer
======================================= -->
 <?php include 'include/main_footer1.php'; ?>
</body>
</html>