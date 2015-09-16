<?php 	ob_start();
		include_once('include/config.php');
		session_start(); 
?>
<?php 
			$locamount = $_COOKIE["total_location"] * 20;
															
			$final_amount = $locamount + 99;
			
			$final_amount1=$final_amount.'00';
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
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
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
				
				$('#free_next_frm').submit(function()
				{
					
					if ($("#terms").is(':checked') == true) {
						return true;
					}
					else {
						alert("Please accept terms and conditions");
						return false;
					}
					
				});
				
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
<?php include "include/main_header.php"; ?>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div class="punch_text_02 funral_director_heading">
  <div class="container">
    <div align="left"> <font style="font-family: 'Helvetica IE',Arial; font-size:24px;">Funeral Director Premium Membership Plan</font> </div>
  </div>
</div>
<div class="gridContainer clearfix"><br />
  <br />
  <br />
  <div id="LayoutDiv1">
    <div id="wrapper">
      <div id="container">
        <div class="container">
          <div class="login_wrapper" style="border:2px solid #c2c2c2; margin-bottom:45px;">
            <?php
   		
		$random_number = substr(number_format(time() * mt_rand(),0,'',''),0,10);
	                            
	 	$link = base_url.'confirm.php?id='.$random_number;
		if(isset($_SESSION['client']))
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
		
		$data_of_fd=mysql_query("select * from directors where email='".$email."'");
		$result1=mysql_fetch_array($data_of_fd);
		 
		
		
		$name = $result1['full_name'];
		
		include "./MailConfig.php"; 
		
	if(isset($_SESSION['person_id']))
	{	
		include "funeral_director-membership_update.php";
	}
	else
	{
		include "funeral_director-membership_confirmation.php";
	
	}		
		$citysql = "SELECT * FROM cities WHERE city_id = '".$result1['city']."'";
		$cityex = mysql_query($citysql);
		
		$citynameresult = mysql_fetch_assoc($cityex);
		
		$city_name = $citynameresult['city_name'];	
		
		
		
		//update the plan............................. 
		if(isset($_SESSION['person_id']))
		{
			$up="UPDATE 
					directors 
				SET 
					user_type = '3'
					
				WHERE 
					email = '".$email."'
				";
			
			$up_rel=mysql_query($up);
			
		}	

		
	
	
if(isset($_SESSION['person_id']))
										{
							
											header('Location:premium-membership-registration-payment.php');		
						
										}
										else
										{
																				
						?>
            <span class="verify_subtitle" style="font-family: Arial, Helvetica, sans-serif !important;"><b>Account created!</b></span> <span class="verify_subtitle"  style="font-family: Arial, Helvetica, sans-serif !important;">Please click on the link sent to <span><?php echo $_SESSION["free_email"];?></span> to complete your profile.</span>
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
</div>
<!--Custom File Type-->
<script type="text/javascript">
;(function( $ ) {
//alert();
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
<?php include("include/main_footer1.php"); ?>
<!--Custom File Type-->
</body>
</html>
