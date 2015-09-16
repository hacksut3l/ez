

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


<link type="text/css" rel="Stylesheet" href="css/Old_Include_Css/jquery.validity.css" />
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
<!--<script type="text/javascript" src="js/location.js"></script>-->

<script type="text/javascript" src="js/Old_Include_Js/jquery-ui-1.8.23.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery-ui-1.8.23.custom.css" />


<script src="js/Old_Include_Js/respond.min.js"></script>


<script type='text/javascript'><!--
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


<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
      <div id="wrapper">
       		<div id="container">
            
       			



            <?php
				require_once('atneed/swift/swift_required.php');
				
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
					if($_POST['phone'] == '')
					{
						$phoneerror = 'Please enter your phone number';
					}
					if($_POST['country'] == '')
					{
						$countryerror = 'Please enter country';
					}
					if($_POST['state'] == '')
					{
						$stateerror = 'Please enter state';
					}
					if($_POST['city'] == '' || $_POST['city'] == 'city not found')
					{
						$cityerror = 'Please enter your city';
					}
					
					
					if(empty($_SESSION['6_letters_code'] ) ||strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)					{  
						$error =  'Validation Code does not match.';
					}
					
					else
					{
					
						$date = date("Y-m-d H:i:s",time());
						
					echo	$citysql = "SELECT 
										* 
									FROM 
										cities
									WHERE
										city_name = '".$_POST['city']."'
									";
									
						$cityex = mysql_query($citysql);
						
						$city_name = mysql_fetch_assoc($cityex);
						
					echo	$sql = "INSERT 
								INTO
									clients
									(
										first_name,
										last_name,
										phone,
										email,
										state,
										city,
										country,
										username,
										password,
										hear_about,
										image,
										date
									)
								VALUES
									(
										'".mysql_real_escape_string($_POST['first_name'])."',
										'".mysql_real_escape_string($_POST['last_name'])."',
										'".$_POST['phone']."',
										'".$_POST['email']."',
										'".$_POST['state']."',
										'".$city_name['city_id']."',
										'".$_POST['country']."',
										'".$_POST['username']."',
										'".md5($_POST['password'])."',
										'".$_POST['hear_about']."',
										'no-profile-img.gif',
										'".$date."'									
									)
								";
							
						mysql_query($sql);
						
						$user_id = mysql_insert_id();
						
						setcookie("free_email", $_POST['email'], time()+3600);
						
						$random_number = rand().time();
						
					echo	$link = base_url.'client_confirm.php?id='.$random_number.'&user_token='.$user_id;
						
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
						
						$mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer
						
						ob_start();
						require_once('email-format.php');
						$html_message = ob_get_contents();
						ob_end_clean();
						
						
						$html_message = $link;

						echo $message = Swift_Message::newInstance()
									   ->setSubject('Client Membership Registration Confirmation link') // Message subject
									   ->setTo(array($email => $name)) // Array of people to send to
									   ->setFrom(array('peter@ezifunerals.com.au' => 'EziFunerals')) // From:
									   ->setBody($html_message, 'text/html');// Attach that HTML message from earlier
									   
						
						// Send the email, and show user message
						if ($mailer->send($message)){
							header('Location:account-verification.php');
						}else{
							$error = true;}
						
					}
				}
			
			?>
    
<br /><br /><br /><br /><br /><br /><br /><br />
<div class="punch_text_02">
    <div class="container">
	<div align="center">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;">Client Registration</font>	
    </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="container" style="background:#FFFFFF">
<div class="mar_top5"></div>

	<div class="one_half">
        	
	<div class="name-field" style="max-width:550px; margin:0 auto;">
            	<div class="log_ex">
                <div class="login_wrapper">
         <div class="reg_box">
                     <form name="client_registration_form" action="" method="post" id="client_registration_form">
                    	<span style="font-size:36px; font-weight:bold;" class="login_head">Create an Account</span><br /><br />
                        <p style="font-size:16px"><strong> Sign up today and get independent, transparent and trustworthy funeral assistance when you need it most.</strong></p><br />
                        <span class="fields_wrapp">
                        	<span class="reg_name">First Name <span class="red">*</span></span>
                                <input class="reg_field" type="text" name="first_name" id="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'];?>" size="50">
                            <span class="formerror_new"><?php if(isset($namerror)) echo $namerror;?></span><br />
                        </span><br />
						
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Last Name <span class="red">*</span></span>
                                <input class="reg_field" type="text" name="last_name" id="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name'];?>" size="50">
                            <span class="formerror_new"><?php if(isset($lnamerror)) echo $lnamerror;?></span><br />
                        </span><br />
						
						<span class="fields_wrapp1">
                        	<span class="reg_name">Phone<span class="red">*</span></span><br />
                        	<input class="reg_field" type="text" name="phone" id="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>" maxlength="10" size="50">
                            <span class="formerror_new"><?php if(isset($phoneerror)) echo $phoneerror;?></span><br />
                        </span><br />
						
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Email <span class="red">*</span></span><br />
                        	<input class="reg_field" type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" size="50">
                            <span class="formerror_new"><?php if(isset($emailerror)) echo $emailerror;?></span><br />
                        </span><br />
						
						<span class="fields_wrapp1">
                        	
        				<span class="reg_name">Country</span><br />
						<input  type="text" name="country" id="country1"  class="reg_field" value="Australia" readonly  size="50"/>

						<!--
        					<select name="country" id="country" class="defaultSelect">
                            	<option value=""> Select a Country </option>
                                <option value="Australia" <?php if(isset($_POST['country']) && $_POST['country'] == 'Australia') echo "selected=selected";?>>Australia</option>
                            </select>
        					-->
							<span class="formerror_new"><?php if(isset($countryerror)) echo $countryerror;?></span><br>
        
                        </span><br />
						
						<span class="fields_wrapp1">
                        	
                            <span class="reg_name">Select State <span class="red">*</span></span><br />
                            <select class="defaultSelect" name="state" id="state" style="width:320px; height:30px;">
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
                            <!--<select class="defaultSelect" name="city" id="city">
                                <option value="">Select city</option>
                            </select>-->    
                            <input class="reg_field" type="text" name="city" id="city" value="<?php if(isset($_POST['city'])) echo $_POST['city'];?>" size="50">
                                       
                            </span>   
                            <span class="formerror_new"><?php if(isset($cityerror)) echo $cityerror;?></span> <br />
                        </span><br />
                        
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Username <span class="red">*</span></span><br />
                        	<input class="reg_field" type="text"  name="username" id="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>" size="50">
                            <span class="formerror_new"><?php if(isset($usernameerror)) echo $usernameerror;?></span><br />
                        </span><br />
						
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Password <span class="red">*</span></span><br />
                        	<input class="reg_field" type="password"  name="password" id="password" size="50" >
                            <span class="formerror_new"><?php if(isset($passworderror)) echo $passworderror;?></span><br />
                        </span><br />
						
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Re-type Password <span class="red">*</span></span><br />
                        	<input class="reg_field" type="password"  name="confirm_password" id="confirm_password" size="50">
                            <span class="formerror_new"><?php if(isset($cnfrmpassworderror)) echo $cnfrmpassworderror;?></span><br />
                        </span><br />
						
                        <span class="fields_wrapp1">
                        	
        				<span class="reg_name" style="margin-top:0px;">How did you hear about<br> 
							<strong>eziFunerals</strong> (Optional)</span>
        				
        							<select name="hear_about" id="hear_about" class="defaultSelect"  style="width:320px; height:30px;">
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
        
                        </span> <br /><br />
						
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Enter the Code Shown <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="6_letters_code" id="6_letters_code" size="50">
                            <?php if(isset($error)) {?> <span class="formerror_new"><?php echo $error;?></span><?php }?>
                        </span><br /><br />
						
                        <span class="fields_wrapp1">
                        	<span class="reg_name">&nbsp;</span>
                        	<img src="captcha_code_file.php?rand=<?php echo rand();?>" id='captchaimg'>
                            <span style="font-family: 'open_sansregular'; font-size:14px;">Can't read the image? click<a href="javascript: refreshCaptcha();" style="
    color: #0096A5;
"> here</a> to refresh</span> </span><br /><br />

                        <span class="fields_wrapp1">
                        	<span class="reg_name">&nbsp;</span>
<span class="reg_name1">By creating an account below you are agreeing that you have read and
accept the <a href="<?php echo base_url;?>page/terms-of-use" target="_blank">eziFunerals User Agreement</a> and <a href="<?php echo base_url;?>page/privacy-policy" target="_blank">Privacy Policy</a>.</span> <br />

                        </span>
						
                        <span style="width:100%; float:left;">						
                        	<span class="reg_name">&nbsp;</span><br />
                        	<input class="new_button" type="submit" name="submit" value="Sign Up">
							<br /><br /><br />
                        </span>
						
                        </form>
                        
                    </div>
                </div>
                </div>


    </div><!-- end section -->
    </div>
</div>

<div class="one_half last"></div>

<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
        <div class="center"><img src="images/footer_AD.png" width="620"></div>
        
</div>



<!-- Footer
======================================= -->
 <?php include 'include/main_footer1.php'; ?>
</body>
</html>