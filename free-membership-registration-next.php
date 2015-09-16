<?php	
	ob_start();
	include_once('./include/config.php');
	session_start();
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<link href="eway/assets/Styles/Site.css" rel="stylesheet" type="text/css" />
<link href="eway/assets/Styles/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css" />
<script src="eway/assets/Scripts/jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="eway/assets/Scripts/jquery-ui-1.8.11.custom.min.js" type="text/javascript"></script>
<script src="eway/assets/Scripts/jquery.ui.datepicker-en-GB.js" type="text/javascript"></script>
<script type="text/javascript" src="eway/assets/Scripts/tooltip.js"></script>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>eziFuneral</title>
<link href="css/Old_Include_Css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/Old_Include_Css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
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
<script src="js/Old_Include_Js/respond.min.js"></script>
</head>
<body>
<?php  include "./include/main_header.php"; ?>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br/>
<div class="punch_text_02 funral_director_heading">
  <div class="container">
    <div align="left"> <font style="font-family: 'Helvetica IE',Arial; font-size:24px;">Funeral Director Basic Membership Plan</font> </div>
  </div>
</div>
<div class="gridContainer clearfix"><br />
  <br />
  <br />
  <div id="LayoutDiv1">
    <div id="wrapper">
      <div class="container">
        <div id="container">
          <div class="login_wrapper" style="border:2px solid #c2c2c2;">
            <?php								

		$random_number = substr(number_format(time() * mt_rand(),0,'',''),0,10);;
										
										$link = base_url.'confirm.php?id='.$random_number;
										
										$email = $_SESSION['free_email'];
										
										$sql = "UPDATE 
													directors 
												SET 
													email_confirm = '".$random_number."' 
												WHERE 
													email = '".$email."'
												";
												
										$get1 = mysql_query($sql);
										$user1 = mysql_fetch_assoc($get1);
										$getusersql = "SELECT 
															* 
														FROM 
															directors
														WHERE 
															email =  '".$email."' 
														AND 
															email_confirm = '".$random_number."' 
														AND
															user_type = '1'
														LIMIT 1
														";
														
										$getuserex = mysql_query($getusersql);
										
										$user = mysql_fetch_assoc($getuserex);
																
															  
										$name = $user['full_name'];
										
										$username = $user['username'];
										if(isset($_SESSION['client']))
										{
											
											$up_plan="update directors set user_type='1' where id='".$_SESSION['client']."'";
											$rel_plan=mysql_query($up_plan);
											
											require_once('director_upgrade_mail.php');
											
										}
										else
										{
										
											require_once('director_reg_mail.php');
											
										}
								
						if(isset($_SESSION['client']))
										{
							
						?>
            <span class="verify_subtitle"  style="font-family: Arial, Helvetica, sans-serif !important;">Account Updated!</span><br/>
            <span class="verify_subtitle"></span>
            <?php
										}
										else
										{
																				
						?>
            <span class="verify_subtitle" style="font-family: Arial, Helvetica, sans-serif !important;"><b>Account created!</b></span> <span class="verify_subtitle"  style="font-family: Arial, Helvetica, sans-serif !important;">Please click on the link sent to <span><?php echo $_SESSION['free_email'];?></span> to complete your profile.</span>
            <!-- <p>This confirms that you are a real human with a legit email address. Thanks for helping to keep Ezi-Funerals as spambot, zombie, and vampire-free as possible.</p>-->
            <?php
										}		
								
								
						?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br />
<br />
<br />
<?php include "./include/main_footer.php"; ?>
<!--Custom File Type-->
</body>
</html>
