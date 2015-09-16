<?php
	ob_start();
	include_once('include/config.php');
	session_start();
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
       		<div id="container"><br/><br/><br/><br/><br/>
            
            <div style="width:100%; float:left; padding-bottom:20px;">
            	<div class="log_ex">
                <div class="login_wrapper">
                	<div class="reg_box">
                    	<span class="login_head">Funeral Director Partner Application <span class="step">Step 2 of 2</span></span>
                        <span class="login_head little_small">Standard Membership</span>
                        <!--<span class="forms_tag_line">Interested in partnering with EziFunerals?</span>
                        <p>Complete this form in order to register your funeral business on <a href="#">EziFunerals.com.au</a>. 

After receiving your information, we'll contact you to confirm details and finish the sign-up process. 

If you have any questions, please email us at <a href="mailto:peter@ezifunerals.com.au">peter@ezifunerals.com.au</a>
</p>-->
                      
                      <div class="left_reg_form_next">
                        <span class="fields_wrapp marginTop">
                        	<p class="reg_box_p_next">EziFunerals Standard Membership Package Details</p>
                        	<span class="reg_name ename">$50 per-lead fee is what you agree to be charged each time EziFunerals provides you with a pre-qualified, exclusive lead (which includes the individual's full name, email address, phone number, and funeral plan). </span>
                        </span>
                        <!--<span class="fields_wrapp marginTop tablr_bor">
                            <table width="100%" border="0">
                              	<tr>
                                	<td width="50%" class="reg_table_title">Description</td>
                                    <td class="reg_table_title">Amount</td>
                                </tr>
                                
                                <tr>
                                	<td class="reg_table_text">Per Lead Fee</td>
                                    <td class="reg_table_text">$50.00 without a funeral plan</td>
                                </tr>
                                
                                <tr>
                                	<td class="reg_table_text">&nbsp;</td>
                                    <td class="reg_table_text">$75.00 with a funeral plan</td>
                              	</tr>
                            </table>
                        </span>-->
                        <span class="fields_wrapp marginTop">
                        	<span class="reg_name ename">Below Setup Fee will be charged to your credit card immediately. 

This covers all setup processes, including surveying select customers to ensure you provide superior customer service.
</span>
                            <!--<span class="reg_name ename">$75.00 with a funeral plan</span>-->
                        </span>
							<?php
                        //echo $dir = dirname(__FILE__);exit;
                        require_once('atneed/swift/swift_required.php');
						
						
						
                    
                    
                        /*if(isset($_POST['submit']))
                        {
                            
                            $random_number = rand().time();
                            
                            $link = base_url.'confirm.php?id='.$random_number;
                            
                            $email = $_COOKIE["free_email"];
                            
                            $sql = "UPDATE 
                                        directors 
                                    SET 
                                        email_confirm = '".$random_number."' 
                                    WHERE 
                                        email = '".$email."'
                                    ";
                                    
                            mysql_query($sql);
                            
                            $name = 'Peter';
                            
                            $mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer
                            
                            $html_message = $link;
    
                            $message = Swift_Message::newInstance()
                                           ->setSubject('Standard Membership Registration Confirmation link') // Message subject
                                           ->setTo(array($email => $name)) // Array of people to send to
                                           ->setFrom(array('peter@ezifunerals.com.au' => 'EziFuneral')) // From:
                                           ->setBody($html_message, 'text/html');// Attach that HTML message from earlier
                                           
                            
                            // Send the email, and show user message
                            if ($mailer->send($message))
                                header('Location:account-verification.php');
                            else
                                $error = true;
                        }*/
						
						//$merchtxnref = substr(number_format(time() * rand(),0,'',''),0,10);
						
                    ?>
                        <form name="person_making_form" action="payment_action.php" method="POST">
            
						<?php
                            $merchtxnref = substr(number_format(time() * rand(),0,'',''),0,10);
                        ?>
                        <span class="fields_wrapp marginTop tablr_bor">
                            <table width="100%" border="0">
                              	<tr>
                                	<td width="50%" class="reg_table_title">Description</td>
                                    <td class="reg_table_title">Amount</td>
                                </tr>
                                
                                <tr>
                                	<td class="reg_table_text">Setup Fee</td>
                                    <td class="reg_table_text">$99.00</td>
                                </tr>
                                
                                <tr>
                                	<td class="reg_table_text"><strong>Total Due Today</strong></td>
                                    <td class="reg_table_text"><strong>$99.00</strong></td>
                              	</tr>
                            </table>
                        </span>
                        
                        <span class="fields_wrapp marginTop">
                            <label class="login_checkbox"><input class="check" type="checkbox">I accept the Terms and Conditions </label>
                        </span>
                        
                      </div>
                      <input type="hidden" name="Title" value="PHP VPC 3-Party"/>
                        <input type="hidden" name="virtualPaymentClientURL" value="https://migs.mastercard.com.au/vpcpay"/>
                        <input type="hidden" name="vpc_Version" value="1"/>
                        <input type="hidden" name="vpc_Command" value="pay"/>
                        <input type="hidden" name="vpc_AccessCode" value="1327702F"/>
                        <input type="hidden" name="vpc_MerchTxnRef" value="<?php echo $merchtxnref;?>"/>
                        <input type="hidden" name="vpc_Merchant" value="TESTEZIFUNCOM01" />
                        <input type="hidden" name="vpc_OrderInfo" value="Premium Member"/>
                        <input type="hidden" name="vpc_Amount" value="9900"/>
                        <input type="hidden" name="vpc_ReturnURL" value="<?php echo base_url;?>manual_standard_response.php" />
                        <input type="hidden" name="vpc_Locale" value="en" />
                      
                        <span style="width:100%; float:left;">
                        	<input class="invite_director_btn" type="submit" value="Place My Order" name="submit">
                        </span>
                        
                        
                        
                        
                        
                        </form>
                    </div>
                </div>
                </div>
                <!--<div class="login_text_wrapper">
                	<p>New Client</p>
                    <span class="login_text">If you are an eziFunerals client and haven't registered before, <a href="#">register now</a> so you can enjoy the benefits of eziFunerals services and a stream-lined shopping experience, it only takes a minute or two!</span>
                </div>-->
            </div>  
            <?php include("include/main_footer1.php"); ?>  
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
