<?php
	ob_start();
	include_once('include/config.php');
	session_start();
	
	//print_r($_REQUEST);exit;
	
	//require_once('atneed/swift/swift_required.php');
	
	$query = "SELECT * FROM directors WHERE email = '".$_SESSION['free_email']."' ";
	$queryex = mysql_query($query);
	
	$result = mysql_fetch_assoc($queryex);
	
	if($result['user_type'] == '3')
	{
		$reg_amount = '99.00';
	}
	
	$ordersql = "INSERT
				INTO
					director_member_info
					(
						director_id,
						order_id,
						order_info,
						order_amount,
						reg_amount,
						response_code,
						transcation_no,
						receipt_no,
						card_type						
					)
				VALUES
					(
						'".$result['id']."',
						'".$_REQUEST['vpc_ReceiptNo']."',
						'".$_REQUEST['vpc_Message']."',
						'".$_REQUEST['vpc_Amount']."',
						'".$reg_amount."',
						'".$_REQUEST['vpc_TxnResponseCode']."',
						'".$_REQUEST['vpc_TransactionNo']."',
						'".$_REQUEST['vpc_ReceiptNo']."',
						'".$_REQUEST['vpc_Card']."'
					)
					
				";
	//echo $ordersql;
	mysql_query($ordersql);
	
	$random_number = rand().time();
                            
	$link = base_url.'confirm.php?id='.$random_number;
	
	$email = $_SESSION["free_email"];
	
	$sql = "UPDATE 
				directors 
			SET 
				email_confirm = '".$random_number."',
				manual_entry = '0'
			WHERE 
				email = '".$email."'
			";
			
	mysql_query($sql);
	
	$name = $result['full_name'];
	
	require_once('MailConfig.php');		   
		ob_start();
		require_once('funeral_director-membership_confirmation.php');
		
			
		
		$citysql = "SELECT * FROM cities WHERE city_id = '".$result['city']."'";
		$cityex = mysql_query($citysql);
		
		$citynameresult = mysql_fetch_assoc($cityex);
		
		$city_name = $citynameresult['city_name'];	
		
		$card = $_REQUEST['vpc_Card'];
		
		
		
		ob_start();
		require_once('invoice.php');
	
	/*$name = 'Peter';
	
	$mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer
	
	$html_message = $link;

	$message = Swift_Message::newInstance()
				   ->setSubject('Premium Membership Registration Confirmation link') // Message subject
				   ->setTo(array($email => $name)) // Array of people to send to
				   ->setFrom(array('peter@ezifunerals.com.au' => 'EziFunerals')) // From:
				   ->setBody($html_message, 'text/html');// Attach that HTML message from earlier
				   
	
	// Send the email, and show user message
	if ($mailer->send($message))
		$error = true;
	else
		$error = true;*/
		
		
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
<script type='text/javascript'><!--
			$(document).ready(function() {
				enableSelectBoxes();
			});
			
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
    <?php include("include/main_header.php"); ?>
  <div id="LayoutDiv1">
      <div id="wrapper">
       		<div id="container"><br/><br/><br/><br/><br/><br/>
          
            <div style="width:100%; float:left; padding-bottom:20px;">
            	<div class="log_ex">
                <div class="login_wrapper">
                	<div class="verify_box">
                    	<div class="verify_box_left"><img src="images/email.jpg"></div>
                        <div class="verify_box_right">
                        	<p>Account created! Time to verify your email. A confirmation email has been sent to: <br><span class="e-mail_title"><?php echo $_SESSION["free_email"];?></span></p>
                            <span class="verify_subtitle">Check your email and click on the link.</span>
                            <p>This confirms that you are a real human with a legit email address. Thanks for helping to keep Ezi-Funerals as spambot, zombie, and vampire-free as possible.</p>
                            <!--<div class="toggleButton1" id="button1">Oops, I used the wrong email address</div>
                            <span class="toggle1" id="toggle1" style="display:none;">
  								<input class="email_field" type="text" placeholder="what's your email?">
                                <input class="invite_director_btn" type="button" value="Update &amp; Re-send">
                            </span>
                            <div class="toggleButton1"  id="button2">I need help verifying my email</div>
                            <span class="toggle1" id="toggle2" style="display:none;">
  								<span class="verify_subtitle">Why we ask for email confirmation?</span>
                                <p>Email confirmation is an important security check that helps prevent other people from signing up for an oDesk account using your email address.</p>
                                <span class="verify_subtitle">How do I confirm my email address?</span>
                                <p>We sent you an email with a link to click on. If you aren't able to click the link, copy the full URL from the email and paste it into a new web browser window.</p>
                                <span class="verify_subtitle">If you haven't received the confirmation email, please:</span>
                                <ul>
                                	<li>Check the junk mail folder or spam filter in your email account.</li>
                                    <li>Make sure your email address is entered correctly.</li>
                                </ul>
                            </span>
                            <div class="toggleButton1"  id="button3">Please re-send that verification email</div>
                            <span class="toggle1" id="toggle3" style="display:none;">
  								<span class="verify_subtitle">Email resent on Aug 17 at 3:50 PM</span>
                            </span>-->
                            <script>
								$("#button1").click(function () {
								  $("#toggle1").slideToggle("slow");
								});
								
								$("#button2").click(function () {
								  $("#toggle2").slideToggle("slow");
								});
								
								$("#button3").click(function () {
								  $("#toggle3").slideToggle("slow");
								});
							</script>
                        </div>
                  </div>
                </div>
                </div>
                <!--<div class="login_text_wrapper">
                	<p>New Client</p>
                    <span class="login_text">If you are an eziFunerals client and haven't registered before, <a href="#">register now</a> so you can enjoy the benefits of eziFunerals services and a stream-lined shopping experience, it only takes a minute or two!</span>
                </div>-->
            </div>  
            <?php include("include/main_footer1.php"); 
				unset($_SESSION['free_email']);
			?>  
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
