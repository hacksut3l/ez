<?php
	ob_start();
	include_once('include/config.php');
	session_start();
	
	$sql = "SELECT * FROM directors WHERE id = '".$_GET['id']."' AND manual_entry = '1' ";
	$sqlex = mysql_query($sql);
	
	$result = mysql_fetch_assoc($sqlex);
	
	
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
                    	<span class="login_head">Funeral Director Partner Application <span class="step">Step 1 of 2</span></span>
                        <span class="login_head little_small">Standard Membership</span>
                        <span class="forms_tag_line">$50 per Exclusive Lead</span>
                        <p>Thank you for your interest in our Exclusive Standard Membership Package. By joining as a member, you will have access to pre-qualified, exclusive leads of from individual eziFunerals users that request to be contacted by our partner members. Simply fill in your information below and accept our terms and conditions.			

</p>

					<?php
                    if(isset($_POST['submit']))
                    {
                        $date = date("Y-m-d H:i:s",time());
                        
                        $address = $_POST['address'].','.$_POST['city'].','.$_POST['state'];
                        
                        $prepAddr = str_replace(' ','+',$address);

                        $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
                         
                        $output= json_decode($geocode);
                         
                        $latitude = $output->results[0]->geometry->location->lat;
                        $longitude = $output->results[0]->geometry->location->lng;
                        
						
						$sql = "UPDATE
									directors
								SET
									full_name = '".mysql_real_escape_string($_POST['full_name'])."',
									email = '".$_POST['email']."',
									username = '".mysql_real_escape_string($_POST['username'])."',
									password = '".md5($_POST['password'])."',
									phone = '".$_POST['phone']."',
									city = '".$_POST['city']."',
									state = '".$_POST['state']."',
									country = '".$_POST['country']."',
									postal_code = '".$_POST['postal_code']."',
									address = '".mysql_real_escape_string($_POST['address'])."',
									business_name = '".mysql_real_escape_string($_POST['business_name'])."',
									business_type = '".$_POST['business_type']."',
									area_location = '".mysql_real_escape_string($_POST['area_location'])."',
									latitude = '".$latitude."',
									longitude = '".$longitude."',
									user_type = '2',
									image = 'no-profile-img.gif',
									date = '".$date."'	,
									manual_entry = '0'
								WHERE
									id = '".$_GET['id']."'
								";
						
                        //echo $sql;exit;		
                        mysql_query($sql);
						$_SESSION['free_email']=$_POST['email'];
						//setcookie("free_email", $_POST['email'], time()+3600);
						header('Location:manual_standard_next.php');
                    }
                ?>


                <form action="" method="POST" id="standard_reg_form">

                      <div class="left_reg_form">
                        <span class="fields_wrapp">
                        	<p class="reg_box_p">Contact Information</p>
                        	<span class="reg_name ename">Full Name <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="full_name" id="full_name" value="<?php echo $result['full_name']?>">
                        </span>
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">Email <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="email" id="email" value="<?php echo $result['email']?>">
                        </span>
                        
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">Username <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="username" id="username" value="<?php echo $result['username']?>">
                        </span>
                        
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">Password <span class="red">*</span></span>
                        	<input class="reg_field" type="password" name="password" id="password">
                        </span>
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">Confirm Password <span class="red">*</span></span>
                        	<input class="reg_field" type="password" name="confirm_password" id="confirm_password">
                        </span>
                        
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">Phone <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="phone" id="phone" value="<?php echo $result['phone']?>">
                        </span>
                        
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">City <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="city" id="city" value="<?php echo $result['city']?>">
                        </span>
                        
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">State <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="state" id="state" value="<?php echo $result['state']?>">
                        </span>
                        
                        <!--<span class="fields_wrapp1">
                        	<span class="reg_name ename">Select City</span>
			<select class="defaultSelect" >
				<option value="Option 1">Select City</option>
				<option value="Option 2">Melbourne</option>
				<option value="Option 3">Mumbai</option>
                <option value="Option 4">Sydney</option>
                <option value="Option 5">London</option>
			</select>
                        </span>
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">Select State / Province</span>
			<select class="defaultSelect" >
				<option value="Option 1">Select State</option>
				<option value="Option 2">Australia</option>
				<option value="Option 3">India</option>
                <option value="Option 4">USA</option>
                <option value="Option 5">England</option>
			</select>
                        </span>
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">Select Country</span>
			<select class="defaultSelect" >
				<option value="Option 1">Select a Country</option>
				<option value="Option 2">Australia</option>
				<option value="Option 3">India</option>
                <option value="Option 4">USA</option>
                <option value="Option 5">England</option>
			</select>
                        </span>-->
						<span class="fields_wrapp1">
						<span class="reg_name ename">Country</span>
                        <select class="defaultSelect" name="country" id="country">
                            <option value="">Select a Country</option>
                            <option value="Australia">Australia</option>
						</select>
						</span>
						
						
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">Postal Code / Zip</span>
                        	<input class="reg_field" type="text" name="postal_code" id="postal_code" value="<?php echo $result['postal_code']?>">
                        </span>
                        
                        
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">Address</span>
                        	<textarea class="reg_tarea" name="address" id="address"><?php echo $result['address']?></textarea>
                        </span>
                      </div>
                      <div class="left_reg_form" style="float:right;">
                        <span class="fields_wrapp">
                        	<p class="reg_box_p">Company  Information</p>
                        	<span class="reg_name ename">Business  Name <span class="red">*</span></span>
                        	<input class="reg_field" type="text" name="business_name" id="business_name" value="<?php echo $result['business_name']?>">
                        </span>
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">Business Type  <span class="red">*</span></span>
                        	<select class="defaultSelect" name="business_type" id="business_type">
                                <option value="">Select Type</option>
                                <option value="Funeral Home">Funeral Business</option>
                                <!--<option value="Cemetery">Cemetery</option>
                                <option value="Memorial Products">Memorial Products</option>
                                <option value="Life Insurance Agent">Life Insurance Agent</option>
                                <option value="Legal">Legal</option>
                                <option value="Other">Other</option>-->
                            </select>
                        </span>
                        <span class="fields_wrapp1">
                        	<span class="reg_name ename">Area/Locations your company services</span>
                        	<textarea class="reg_tarea" name="area_location" id="area_location" value="<?php echo $result['area_location']?>"></textarea>
                        </span>
                      </div>
                        <span style="width:100%; float:left;">
                        	<span class="reg_name">&nbsp;</span>
                        	<input style="float:right;" class="invite_director_btn" type="submit" name="submit" value="Next Step">
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
