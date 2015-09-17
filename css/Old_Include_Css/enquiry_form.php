<?php



	ob_start();



	include_once('config.php');



	@session_start();



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





	<link rel="stylesheet" type="text/css" href="css/page.css" media="screen" />

	<link rel="stylesheet" type="text/css" href="css/calendar-eightysix-v1.1-default.css" media="screen" />

	<link rel="stylesheet" type="text/css" href="css/calendar-eightysix-v1.1-vista.css" media="screen" />

	<link rel="stylesheet" type="text/css" href="css/calendar-eightysix-v1.1-osx-dashboard.css" media="screen" />

        <link rel="stylesheet" type="text/css" href="css/slimpicker.css"/>
        <link rel="stylesheet" type="text/css" href="css/pagestyle.css"/>
        <script src="js/mootools-1.2.4-core-yc.js" type="text/javascript"></script>
        <script src="js/mootools-1.2.4.4-more-yc.js" type="text/javascript"></script>

<!--	<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>

	<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>-->
        <script type="text/javascript" src="js/slimpicker.js"></script>
        

  <!--	<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>

   <script type="text/javascript" src="js/date.js"></script>


   <script type="text/javascript">
        $(function () {
    $("#datepicker").datepicker({
        changeMonth: true,
        changeYear: true
    });
});
</script>-->
        <script type="text/javascript">
$(document).ready(function()
{
$('input.slimpicker').each( function(el){
	var picker = new SlimPicker(el);
});
});

</script>



</head>



<body>











<div class="gridContainer clearfix">



  <div id="LayoutDiv1">



      <div id="wrapper">



       		<div id="container">



               <?php



	ob_start();



	include_once('config.php');



	@session_start();



?>



<script type="text/javascript">



	var BASE_URL = '<?php echo base_url;?>';



</script>



<div class="header">



            <div class="logo"><a href="<?php echo base_url;?>"><img src="<?php echo base_url;?>images/logo.png"></a></div>



            <div class="btn">



            <?php



				if(!isset($_SESSION['person_id']))



				{



			?> 



            



                <a href="login.php" class="blue"><img src="<?php echo base_url;?>images/login.png" style="margin-left: -8px;



    margin-right: 8px;"><span>Login</span></a>



                <a href="<?php echo base_url;?>signup.php" class="gray"><img src="<?php echo base_url;?>images/signup.png" style="margin-right:5px;"><span>Sign Up</span></a>



            



            <?php



				}



				else



				{



					if(isset($_SESSION['client']))



					{



						$link = 'client_information.php';



					}



					else



					{



						$link = 'edit-information.php';



					}



			?>



            	<a href="<?php echo base_url.$link;?>" style="color:#0CD3E7;">Hi, <?php echo ucwords($_SESSION['name']);?></a>



                <a href="<?php echo base_url;?>logout.php" class="gray"><img src="<?php echo base_url;?>images/signup.png" style="margin-right:5px;"><span>Logout</span></a>



                



            <?php



				}



			?>



            </div>



            	<br><br><br>



            <div class="menu">


                <a href="<?php echo base_url;?>find-funeral-director.php">Find Funeral Directors</a>



                <a href="<?php echo base_url;?>get-quotes.php">Get Quotes</a>



                <a href="<?php echo base_url;?>plan-your-funeral.php">Plan Your Funeral</a>



            </div>



            </div>



              <div style="width:100%; float:left;  box-shadow: 0 3px 3px #CCCCCC; height: 2px; margin-bottom:10px;">



            </div>



                <div class="content"><div style="width:100%; float:left; padding-bottom:5px;">



                    <span class="cont_line_bold"><h1>Feedback Form</h1></span>

                    

                    

                    <?php

				//require_once('atneed/swift/swift_required.php');

				

				if(isset($_POST['submit']))

				{

					//echo 'hi';exit;

					if($_POST['full_name'] == '')

					{

						$namerror = 'Please enter your name';

					}

					else

					{

						$namerror = '';

					}

					

					if($_POST['dateIII'] == '')

					{

						$daterror = 'Please enter date';

					}

					else

					{

						$daterror = '';

					}

					

					if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))

					{

						$emailerror = 'Please enter valid email address';

					}

					else

					{

						$emailerror = '';

					}

					

					if($_POST['phone_no'] == '')

					{

						$phoneerror = 'Please enter your phone number';

					}

					else

					{

						$phoneerror = '';

					}

					

					if($_POST['postcode'] == '')

					{

						$postcodeerror = 'Please enter postcode';

					}

					else

					{

						$postcodeerror = '';

					}

					

					if($_POST['message'] == '')

					{

						$messageerror = 'Please enter message';

					}

					else

					{

						$messageerror = '';

					}

					if($_POST['hear_about_us'] == '')

					{

						$aboutuserror = 'This field is mandatory';

					}

					else

					{

						$aboutuserror = '';

					}

					

					

					if($namerror!= '' && $daterror!= '' && $emailerror!= '' && $phoneerror!= '' && $postcodeerror!= '' && $messageerror!= '' && $aboutuserror!= '')

					{

						

						$name = $_POST['full_name'];

						$data = $_POST['dateIII'];

						

						$email = $_POST['email'];

						

						$phone_no = $_POST['phone_no'];

						$address = $_POST['address'];

						

						$postcode = $_POST['postcode'];

						

						$message = $_POST['message'];

						

						$hear_about_us = $_POST['hear_about_us'];

						

						

						$mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer

						

						ob_start();

						require_once('enquiry_format.php');

						$html_message = ob_get_contents();

						ob_end_clean();

						

						

						//$html_message = $link;



						$message = Swift_Message::newInstance()

									   ->setSubject('Feedback Form') // Message subject

									   ->setTo(array($email => $name)) // Array of people to send to

									   ->setFrom(array('peter@ezifunerals.com.au' => 'EziFuneral')) // From:

									   ->setBody($html_message, 'text/html');// Attach that HTML message from earlier

									   

						

						// Send the email, and show user message

						if ($mailer->send($message))

							header('Location:account-verification.php');

						else

							$error = true;

						

					}

				}

			

			?>

                    

                    



                   <p style="font-family: 'Conv_Helvetica-Light'; font-size:14px;"> <strong>We welcome your enquiry and feedback whether it's a compliment, suggestion or a complaint.</strong></p>



                    <div class="name-field">

		<form action="" method="POST">

                    <div class="name-full">Full Name<span class="mandatory">*</span></div>



                    <div class="field"><input class="set_field" name="full_name" id="full_name" type="text" ></div>

					<span class="formerror_new"><?php if(isset($namerror)) echo $namerror;?></span>

                    



                    </div>



                    <div class="name-field">



                    <div class="name-full">Date Of Birth<span class="mandatory">*</span></div>



                    <div class="field"><table cellpadding="0">



		



		<tr>



			<td>



				<input id="exampleIII" name="dateIII" type="text" maxlength="10" class="slimpicker" style="padding: 4px 4px; border: 1px solid #CCCCCC;  width: 240px;" autocomplete="off" value=""  />

				<div class="picker inElement" id="exampleIII-picker"></div>

 <!--<input type="text" id="datepicker" />-->

			</td>



		</tr>



	<span class="formerror_new"><?php if(isset($daterror)) echo $daterror;?></span>



	</table></div>



                    



                    </div>



                    <p style="font-family: 'Conv_Helvetica-Light'; font-size:14px;"><strong>This is required to protect the privacy of your record and for identification purposes.</strong></p>



                     <div class="name-field">



                    <div class="name-full">Email Address <span class="mandatory">*</span></div>



                    <div class="field"><input class="set_field" name="email" id="email" type="text"></div>

                    <span class="formerror_new"><?php if(isset($emailerror)) echo $emailerror;?></span>



                    </div>



                     <div class="name-field">



                    <div class="name-full">Phone (include area code) <span class="mandatory">*</span></div>



                    <div class="field"><input class="set_field" name="phone_no" id="phone_no" type="text"></div>

                    <span class="formerror_new"><?php if(isset($phoneerror)) echo $phoneerror;?></span>



                    </div>



                    <div class="name-field">



                    <div class="name-full">Address </div>



                    <div class="field"><input class="set_field" name="address" id="address" type="text"></div>



                    </div>



                    <div class="name-field">



                    <div class="name-full">Postcode <span class="mandatory">*</span></div>



                    <div class="field"><input class="set_field" name="postcode" id="postcode" type="text"></div>

                     <span class="formerror_new"><?php if(isset($postcodeerror)) echo $postcodeerror;?></span>



                    </div>



                    <div class="name-field">



                    <div class="name-full1"><input name="existing_client" id="existing_client" type="checkbox" value=""></div>



                    <div class="field1">I am an existing client of EziFunerals. </div>



                    </div>



                    <p style="font-family: 'Conv_Helvetica-Light'; font-size:14px;"><strong>What would you like to do? </strong></p>



                      <div class="name-field">



                    <div class="name-full1"><input name="like_radio" type="radio" value="" checked></div>



                    <div class="field1"><span class="mandatory">*</span>Make an enquiry </div>



                    </div>



                     <div class="name-field">



                    <div class="name-full1"><input name="like_radio" type="radio" value=""></div>



                    <div class="field1">Give a compliment </div>



                    </div>



                    <div class="name-field">



                    <div class="name-full1"><input name="like_radio" type="radio" value=""></div>



                    <div class="field1">Make a suggestion  </div>



                    </div>



                    <div class="name-field">



                    <div class="name-full1"><input name="like_radio" type="radio" value=""></div>



                    <div class="field1">Make a complaint  </div>



                    </div>



                     <div class="name-field">



                    <div class="name-full">Message <span class="mandatory">*</span></div>



                    <div class="field"><textarea  class="set_field1" name="message" id="message" cols="100" rows="6"></textarea></div>



					<span class="formerror_new"><?php if(isset($messageerror)) echo $messageerror;?></span>

                    </div>



                      <div class="name-field">



                    <div class="name-full">Where did you hear about us  <span class="mandatory">*</span></div>



                    <div class="field">



                    <select  class="set_field2" name="hear_about_us" id="hear_about_us">



                    <option value="">Select</option>
                    <option value="Search Engine Ad">Search Engine Ad</option>
<option value="Search Engine Results">Search Engine Results</option>
<option value="Friend">Friend</option>
<option value="Blog or Forum">Blog or Forum</option>
<option value="Newspaper or Magazine">Newspaper or Magazine</option>
<option value="Event or Conference">Event or Conference</option>
<option value="Radio">Radio</option>
<option value="Television">Television</option>
<option value="Other">Other</option>



                    



                    </select></div>

                    <span class="formerror_new"><?php if(isset($aboutuserror)) echo $aboutuserror;?></span>



                    </div>



                    



                       <p style="font-family: 'Conv_Helvetica-Light'; font-size:14px;"><strong>We will attempt to contact you to discuss your request and attempt to resolve it as quickly as possible. </strong></p>



                    <div class="formspan1">



                           <div class="form-button1">



                           <input class="formspan1_a" type="submit" name="submit" value="Submit" />



                 



                   </div> 



                   </div>



                    

</form>

                   



                    



                    



                    



                 



                   



                </div> 



                </div>



               



            <?php include("footer.php"); ?>  



            </div>



      </div>



      </div>



  </div>



    



<script type="text/javascript">



$(document).ready(function(){

  $('.bxslider').bxSlider({



	mode: 'vertical',



	pause: 2500,



    auto: true,



	slideWidth:1358,



	slideMargin: 10



  });



});



</script>



</body>



</html>



