<?php
	ob_start();
	include_once('./include/config.php');
	session_start();
	
	
        //exit;
	//print_r($_REQUEST);
	
	//require_once('atneed/swift/swift_required.php');
	if(isset($_SESSION['person_id']))
	{
		$sel="select * from directors where id='".$_SESSION['person_id']."'";
		$rel=mysql_query($sel);
		$row=mysql_fetch_array($rel);
	
		$query = "SELECT * FROM directors WHERE email ='".$row['email']."'";
	}
	else
	{
		 $query = "SELECT * FROM directors WHERE email = '".$_SESSION['free_email']."' ";
		 
	}	 
		$queryex = mysql_query($query);
		
		$result = mysql_fetch_assoc($queryex);
		
		$date = date("Y-m-d H:i:s",time());
	
	//if($result['user_type'] == '2')
	//{
		$reg_amount = "99.00";
//	}
	
	if($_REQUEST['vpc_TxnResponseCode'] == '0')
	{
	
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
							card_type,
							d_date
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
							'".$_REQUEST['vpc_Card']."',
							'".$date."'
						)
						
					";
		
                
	mysql_query($ordersql);
		
		$random_number = rand().time();
	                            
	 	$link = base_url.'confirm.php?id='.$random_number;
		if(isset($_SESSION['person_id']))
		{
		
			$email=$row['email'];
		
		}
		else
		{
	
			$email = $_SESSION['free_email'];
		
		}
		$sql = "UPDATE 
					directors 
				SET 
					email_confirm = '".$random_number."' 
				WHERE 
					email = '".$email."'
				";
				
		mysql_query($sql);
		
		
		 $sql = "UPDATE 
					directors 
				SET 
					is_email_confirm = '1' 
				WHERE 
					email = '".$email."'
				";
				
		mysql_query($sql); 
		
		
		$name = $result['full_name'];
		
		//$mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer
		
		/*ob_start();
		require_once('director_reg_mail.php');
		$html_message = ob_get_contents();
		ob_end_clean();
		
		//$html_message = $link;

		$message = Swift_Message::newInstance()
					   ->setSubject('Standard Membership Registration Confirmation link') // Message subject
					   ->setTo(array($email => $name)) // Array of people to send to
					   ->setFrom(array('peter@ezifunerals.com.au' => 'EziFuneral')) // From:
					   ->setBody($html_message, 'text/html');// Attach that HTML message from earlier*/
		
		include "./MailConfig.php"; 
		
	if(isset($_SESSION['person_id']))
	{	
		include "funeral_director-membership_update.php";
	}
	else
	{
		include "funeral_director-membership_confirmation.php";
	
	}		
		$citysql = "SELECT * FROM cities WHERE city_id = '".$result['city']."'";
		$cityex = mysql_query($citysql);
		
		$citynameresult = mysql_fetch_assoc($cityex);
		
		$city_name = $citynameresult['city_name'];	
		
		$card = $_REQUEST['vpc_Card'];
		
		
		//update the plan............................. 
		if(isset($_SESSION['person_id']))
		{
			$up="UPDATE 
					directors 
				SET 
					user_type = '2' 
				WHERE 
					email = '".$email."'
				";
			
			$up_rel=mysql_query($up);
			
		}	
		
		//fetch plan for send mail................
		
		@$sel_paln="select * from directors where email='".$email."'";
		
		@$rel_plan=mysql_query($sel_paln);
		
		@$row_of_plan=mysql_fetch_array($rel_plan);
		
		
		include 'invoice.php';
	
			
	}
	else
	{
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
							card_type,
							d_date
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
							'".$_REQUEST['vpc_Card']."',
							'".$date."'
						)
						
					";
		
                
		mysql_query($ordersql);
		

		
		
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
		<?php include "./include/main_header.php"; ?>		
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		
		
<div class="gridContainer clearfix">
	<div id="LayoutDiv1">
		<div id="wrapper">
			<div id="container" style="height:50%;">
					<div class="log_ex"><br/><br/>
						<div class="container">
							<div class="login_wrapper" style="border:2px solid #c2c2c2; margin-bottom:50px;">
								<div class="verify_box">
									
									<div class="verify_box_right">
						<?php
								if($_REQUEST['vpc_TxnResponseCode'] == '0')
									{
										if(isset($_SESSION['person_id']))
										{
							
						?>
						
                        	<span class="verify_subtitle"  style="font-family: Arial, Helvetica, sans-serif !important;">Account Updated!</span><br/>
                            <span class="verify_subtitle"></span>
																
						<?php
										}
										else
										{
																				
						?>
																<span class="verify_subtitle" style="font-family: Arial, Helvetica, sans-serif !important;"><b>Account created!</b></span>
																<span class="verify_subtitle"  style="font-family: Arial, Helvetica, sans-serif !important;">Please click on the link sent to <span><?php echo $_SESSION["free_email"];?></span> to complete your profile.</span>
															   <!-- <p>This confirms that you are a real human with a legit email address. Thanks for helping to keep Ezi-Funerals as spambot, zombie, and vampire-free as possible.</p>-->
						<?php
										}
									}
									else
									{
						?>
													<p>Some error occured</p>
						<?php
									}
						?>
																
																
																
																	
																
										</div>						
									</div>
								</div>           
							</div>
						</div>
					</div>
									   <?php include "./include/main_footer1.php"; 
											
											
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