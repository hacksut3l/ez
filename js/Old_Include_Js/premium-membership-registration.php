<?php
	ob_start();
	include_once('config.php');
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
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>eziFuneral</title>
<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="Stylesheet" href="css/jquery.validity.css" />
<script type="text/javascript" src="js/jquery-1.8.min.js"></script>
<!--<script type="text/javascript" src="js/location.js"></script>-->

<script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.23.custom.css" />

<!--<script type="text/javascript" src="js/jquery-1.8.min.js"></script>
<script type="text/javascript" src="js/jquery.validity.js"></script>-->
        
        
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="js/respond.min.js"></script>

</head>
<body>
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
<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
      <div id="wrapper">
       		<div id="container">
            <?php include("header.php"); ?>
            <div style="width:100%; float:left; padding-bottom:20px;">
            	<div class="log_ex">
                <div class="login_wrapper">
                	<div class="reg_box">
                    	<span class="login_head">Funeral Director Partner Application <span class="step">Step 1 of 2</span></span>
                        <span class="login_head little_small">Premium Membership</span>
                        <span class="forms_tag_line">$199.00 per Month <span style="color:#696868; font-size:15px; font-family:Georgia, "Times New Roman", Times, serif;">(plus $20 per additional location)</span></span>
                        <p>Thank you for your interest in our Exclusive Premium Membership Package. By joining as a premium member, you will get priority listing, premium leads and be able to list special offers or promotions, which we'll feature in individual funeral business profiles. Simply fill in your information below and accept our terms and conditions.			
</p>

				<?php
                    if(isset($_POST['submit']))
                    {						
						if($_POST['full_name'] == '')
						{
							$namerror = 'Please enter your name';
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
												directors 
											WHERE 
												email = '".$_POST['email']."'
											AND
												user_type = '3'
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
						if($_POST['business_name'] == '')
						{
							$bnameerror = 'Please enter business name';
						}
						if($_POST['business_type'] == '')
						{
							$btyperror = 'Please enter type of business';
						}
						if($_POST['business_country1'] == '')
						{
							$countryerror = 'Please enter country';
						}
						if($_POST['business_state1'] == '')
						{
							$stateerror = 'Please enter state';
						}
						if($_POST['business_city1'] == '')
						{
							$cityerror = 'Please enter your city';
						}
						if($_POST['business_zip1'] == '')
						{
							$postalerror = 'Please enter postal code';
						}
						if($_POST['business_address1'] == '')
						{
							$addresserror = 'Please enter address';
						}
						else
						{
						
							$date = date("Y-m-d H:i:s",time());
							
							$statesql = "SELECT 
												state_name 
											FROM 
												states
											WHERE  
												state_id = '".$_POST['business_state1']."'
											";
											
								$statex = mysql_query($statesql);
								
								$state_name = mysql_fetch_assoc($statex);
								
								
								$citysql = "SELECT 
												city_name 
											FROM 
												cities
											WHERE  
												city_id = '".$_POST['business_city1']."'
											";
											
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
											date
										)
									VALUES
										(
											'".mysql_real_escape_string($_POST['full_name'])."',
											'".$_POST['email']."',
											'".mysql_real_escape_string($_POST['username'])."',
											'".md5($_POST['password'])."',
											'".$_POST['phone']."',
											'".$_POST['business_address1']."',
											'".$_POST['business_city1']."',
											'".$_POST['business_state1']."',
											'".$_POST['business_zip1']."',
											'".$_POST['business_country1']."',
											'".mysql_real_escape_string($_POST['business_name'])."',
											'".$_POST['business_type']."',
											'".$latitude."',
											'".$longitude."',
											'3',
											'no-profile-img.gif',
											'".$_POST['total_location']."',
											'".$date."'									
										)
									";
							//echo $sql;exit;		
							mysql_query($sql);
							
							$premium_member_id = mysql_insert_id();
							//echo $_POST['total_location'];
							for($i=2;$i<=$_POST['total_location'];$i++)
							{
								if($_POST['business_country'.$i] != '' && $_POST['business_state'.$i] != '' && $_POST['business_city'.$i] != '' && $_POST['business_address'.$i] != '' && $_POST['business_zip'.$i] != '')
								{
									
									$statesql = "SELECT 
												state_name 
											FROM 
												states
											WHERE  
												state_id = '".$_POST['business_state'.$i]."'
											";
											
									$statex = mysql_query($statesql);
									
									$state_name = mysql_fetch_assoc($statex);
									
									
									$citysql = "SELECT 
													city_name 
												FROM 
													cities
												WHERE  
													city_id = '".$_POST['business_city'.$i]."'
												";
												
									$cityex = mysql_query($citysql);
									
									$city_name = mysql_fetch_assoc($cityex);
									
									$address = $_POST['business_address'.$i].','.$city_name['city_name'].','.$state_name['state_name'].','.$_POST['business_country'.$i];
									
									/*$address = $_POST['business_address'.$i].','.$_POST['business_city'.$i].','.$_POST['business_state'.$i];*/
							
									$prepAddr = str_replace(' ','+',$address);
			
									$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
									 
									$output= json_decode($geocode);
									 
									$latitude = $output->results[0]->geometry->location->lat;
									$longitude = $output->results[0]->geometry->location->lng;
									
									
									
									$locasql = "INSERT
												INTO
													premium_locations
													(
														director_id,
														city,
														state,
														country,
														address,
														zipcode,
														latitude,
														longitude
													)
												VALUES
													(
														'".$premium_member_id."',
														'".$_POST['business_city'.$i]."',
														'".$_POST['business_state'.$i]."',
														'".$_POST['business_country'.$i]."',
														'".$_POST['business_address'.$i]."',
														'".$_POST['business_zip'.$i]."',
														'".$latitude."',
														'".$longitude."'
													)
												";
									//echo $locasql;
									mysql_query($locasql);
								}
							}
							
							$total_loc = $_POST['total_location'] - 1;
							
							setcookie("free_email", $_POST['email'], time()+3600);
							setcookie("total_location", $total_loc, time()+3600);
							
							
							header('Location:premium-membership-registration-next.php');
						}
                    }
                ?>


                <form action="" method="POST" id="premium_reg_form">


                      <div class="left_reg_form addPremium">
                      <p class="reg_box_p">Contact Information</p>
                        <span class="fields_wrapp1 addPreField">
                        	
                        	<span class="reg_name ename">Full Name <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="full_name" id="full_name" value="<?php if(isset($_POST['full_name'])) echo $_POST['full_name'];?>">
                            <span class="formerror" style="float: left;width: 200px;color: red;font-family:'Conv_ufonts.com_helvetica-normal'; font-size: 12px;"><?php if(isset($namerror)) echo $namerror;?></span>
                        </span>
                        <span class="fields_wrapp1 addPreField">
                        	<span class="reg_name ename">Email <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
                             <span class="formerror" style="float: left;width: 200px;color: red;font-family:'Conv_ufonts.com_helvetica-normal'; font-size: 12px;"><?php if(isset($emailerror)) echo $emailerror;?></span>
                        </span> 
                        <span class="fields_wrapp1 addPreField">
                        	<span class="reg_name ename">Phone <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="phone" id="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>">
                            <span class="formerror" style="float: left;width: 200px;color: red;font-family:'Conv_ufonts.com_helvetica-normal'; font-size: 12px;"><?php if(isset($phoneerror)) echo $phoneerror;?></span>
                        </span>
                        <span class="fields_wrapp1 addPreField">
                        	<span class="reg_name ename">Username <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="username" id="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>">
                            <span class="formerror" style="float: left;width: 200px;color: red;font-family:'Conv_ufonts.com_helvetica-normal'; font-size: 12px;"><?php if(isset($usernameerror)) echo $usernameerror;?></span>
                        </span>
                        
                        <span class="fields_wrapp1 addPreField">
                        	<span class="reg_name ename">Password <span class="red">*</span></span>
                        	<input class="reg_field" type="password" name="password" id="password">
                            <span class="formerror" style="float: left;width: 200px;color: red;font-family:'Conv_ufonts.com_helvetica-normal'; font-size: 12px;"><?php if(isset($passworderror)) echo $passworderror;?></span>
                        </span>
                        <span class="fields_wrapp1 addPreField">
                        	<span class="reg_name ename">Confirm Password <span class="red">*</span></span>
                        	<input class="reg_field" type="password" name="confirm_password" id="confirm_password">
                            <span class="formerror" style="float: left;width: 200px;color: red;font-family:'Conv_ufonts.com_helvetica-normal'; font-size: 12px;"><?php if(isset($cnfrmpassworderror)) echo $cnfrmpassworderror;?></span>
                        </span>                        
                        <span class="fields_wrapp1 addPreField">
                        	<span class="reg_name ename">Business  Name <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="business_name" id="business_name" value="<?php if(isset($_POST['business_name'])) echo $_POST['business_name'];?>">
                            <span class="formerror" style="float: left;width: 200px;color: red;font-family:'Conv_ufonts.com_helvetica-normal'; font-size: 12px;"><?php if(isset($bnameerror)) echo $bnameerror;?></span>
                        </span>
                        <span class="fields_wrapp1 addPreField">
                        	<span class="reg_name ename">Business Type  <span class="red">*</span></span>
                        	<select class="defaultSelect" name="business_type" id="business_type">
                                <option value="">Select Type</option>
                                <option value="Funeral Business" <?php if(isset($_POST['business_type']) && $_POST['business_type'] == 'Funeral Business') echo 'selected=selected';?>>Funeral Business</option>
                                <!--<option value="Cemetery">Cemetery</option>
                                <option value="Memorial Products">Memorial Products</option>
                                <option value="Life Insurance Agent">Life Insurance Agent</option>
                                <option value="Legal">Legal</option>
                                <option value="Other">Other</option>-->
                            </select>
                            <span class="formerror" style="float: left;width: 200px;color: red;font-family:'Conv_ufonts.com_helvetica-normal'; font-size: 12px;"><?php if(isset($btyperror)) echo $btyperror;?></span>
                        </span>
                        
                      </div>
                      <div class="left_reg_form addPremium" style="float:right;">
                      	<p class="reg_box_p">Business Locations</p>
						<div style="float:left" id="businessdiv">
                        <span class="add_loc span_no1">
                         <span class="fields_wrapp1 addSmallFields">
                                <span class="reg_name ename">Country<span class="red">*</span></span>
                                <select class="reg_field preInput" name= "business_country1" id="business_country1">
                                	<option value="">Select Country</option>
                                    <option value="Australia" <?php if(isset($_POST['country']) && $_POST['country'] == 'Australia') echo 'selected=selected';?>>Australia</option>
                                </select>
                               <span class="formerror" style="float: left;width: 200px;color: red;font-family:'Conv_ufonts.com_helvetica-normal'; font-size: 12px;"><?php if(isset($countryerror)) echo $countryerror;?></span>
                            </span>
                        	
                            <span class="fields_wrapp1">
                        	
                            <span class="reg_name">Select State</span>
                            <select class="defaultSelect" name="state" id="state">
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
                            <span class="formerror_new"><?php if(isset($stateerror)) echo $stateerror;?></span>
                        	
                        </span>
						
						
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Select City <span class="red">*</span></span>
                            <span id="city_span">
                            <!--<select class="defaultSelect" name="city" id="city">
                                <option value="">Select city</option>
                            </select>-->    
                            <input class="reg_field" type="text" name="city" id="city" value="<?php if(isset($_POST['city'])) echo $_POST['city'];?>" style="margin-left:inherit !important;">
                                       
                            </span>   
                            <span class="formerror_new"><?php if(isset($cityerror)) echo $cityerror;?></span>      
                        </span>
                            
                           
                            <span class="fields_wrapp1 addSmallFields">
                                <span class="reg_name ename">Address<span class="red">*</span></span>
                                <input class="reg_field preInput" type="text" name="business_address1" id="business_address1" value="<?php if(isset($_POST['business_address1'])) echo $_POST['business_address1'];?>">
                             <span class="formerror" style="float: left;width: 200px;color: red;font-family:'Conv_ufonts.com_helvetica-normal'; font-size: 12px;"><?php if(isset($addresserror)) echo $addresserror;?></span>
                            </span>
                            <span class="fields_wrapp1 addSmallFields">
                                <span class="reg_name ename">Zip Code<span class="red">*</span></span>
                                <input class="reg_field preInput" type="text" name="business_zip1" id="business_zip1" value="<?php if(isset($_POST['business_zip1'])) echo $_POST['business_zip1'];?>">
                              <span class="formerror" style="float: left;width: 200px;color: red;font-family:'Conv_ufonts.com_helvetica-normal'; font-size: 12px;"><?php if(isset($postalerror)) echo $postalerror;?></span>
                            </span>
                            
                        </span>
						</div>
						
						<input type="hidden" value="1" id="total_location" name="total_location">
						
						<input type="hidden" value="199" id="total_cost" name="total_cost">
						
						<span class="fields_wrapp1 addSmallFields">
                                <span class="reg_name ename">&nbsp;</span>
                                <a href="javascript:void(0);"><input style="margin-top:-3px;" class="invite_director_btn" type="button" value="Add +" id="addrow"></a>
                            </span>
                        
						
						<span style="width:100%; float:left;">
                        	<span class="reg_name">&nbsp;</span>
                        	<input style="float:right;" class="invite_director_btn" type="submit" name="submit" value="Next Step">
                        </span>
						
						
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
                        
                    </div>
                </div>
                </div>
                <!--<div class="login_text_wrapper">
                	<p>New Client</p>
                    <span class="login_text">If you are an eziFunerals client and haven't registered before, <a href="#">register now</a> so you can enjoy the benefits of eziFunerals services and a stream-lined shopping experience, it only takes a minute or two!</span>
                </div>-->
            </div>  
            <?php include("footer.php"); ?>  
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
</script>
<!--Custom File Type-->
</body>
</html>
