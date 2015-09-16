<?php
    ob_start();
    include_once('include/config.php');
    session_start();
	
	if($_GET['user_type'] == 'client')
	{
            $table_name = 'clients';
	}
	
	if($_GET['user_type'] == 'director')
	{
            $table_name = 'directors';
	}
	
	$checksql = "SELECT 
                        *
                    FROM 
                        $table_name
                    WHERE
                        forgot_password = '".$_GET['id']."'
                    ";
	//echo $checksql;
	$checkex = mysql_query($checksql);
	
	$ispresent = mysql_num_rows($checkex);
	
	//echo $ispresent;exit;
	
	if($ispresent > 0)
	{
		
	
	
	
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
<link href="<?php echo base_url;?>css/Old_Include_Css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url;?>css/Old_Include_Css/style.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="Stylesheet" href="<?php echo base_url;?>css/Old_Include_Css/jquery.validity.css" />
<script type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery-1.8.min.js"></script>
<script type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.validity.js"></script>
       
 <!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url;?>css/Old_Include_Css/jquery.fancybox.css?v=2.1.4" media="screen" />
      
       <script type="text/javascript">
    $(document).ready( function() {
		$('.fancybox1').fancybox();
		
			
		$('.addreview').live("click",function()
		{
			$('.fancybox1').fancybox();
			
			var director_id = $(this).attr('director_id');
			
			var average = $(this).attr('average');
			
			$('.exemple7').attr('data-average',average);
			
			$('.exemple7').attr('data-id',director_id)
			
			$('.exemple7').jRating({
				step:true,
				length : 5,
				canRateAgain : true,
				nbRates : 400,
				onSuccess : function(){
				   alert('Success : Your rate has been saved, you can add a review');
				  
				 }
			});
			
		});
		
		
		
		$('.rakesh123').live("click",function()
		{
			console.log($(this))
			var director_id = $(this).attr('director_id');
			director_id = parseInt(director_id)
			var client_id = $(this).attr('client_id');
			//alert($('.fancybox-skin #'+director_id).val())
			var reviewtext = $('.fancybox-skin #sammeer_'+director_id).val();
			
			
			
			if(reviewtext == '')
			{
				alert('Please add review');
			}
			else
			{
				$.ajax
                    ({
                        type: "POST",
                        url: "add_review.php",
                        data: "director_id="+director_id+"&review="+reviewtext+"&client_id="+client_id,
                        success: function(msg)
                        {
                           if(msg == '1')
						   {
							   alert('Review saved');
							   //location.reload();
						   }
						   else
						   {
							   alert('Error occured');
						   }
                        }
                    });
				
			}
			
			
		});
		
		
        // When site loaded, load the Popupbox First
        
        $('#popupBoxClose1').click( function() {            
            unloadPopupBox1();
        });
        $('#container').click( function() {
            unloadPopupBox1();
        });
        function unloadPopupBox1() {    // TO Unload the Popupbox
            $('#popup_box1').fadeOut("slow");
            $("#container").css({ // this is just for style        
                "opacity": "1"  
            }); 
        }    
        function loadPopupBox1() {    // To Load the Popupbox
            $('#popup_box1').fadeIn("slow");
            $("#container").css({ // this is just for style
                "opacity": "0.9"  
            });         
        }
		
		$('.fancybox-close').live("click",function()
		{
			location.reload();
		});
		
		
		/*$('.exemple7').jRating({
				step:true,
				length : 5,
				canRateAgain : true,
				nbRates : 400
			});*/
			
		
			
		      
    });
</script>
      
        <?php
		if(isset($_GET['msg']))
		{
	?>
      <script type="text/javascript">
    
    $(document).ready( function() {
    
        // When site loaded, load the Popupbox First
        loadPopupBox();
    
        $('#popupBoxClose').click( function() {            
            unloadPopupBox();
        });
		
		$('#closeme').click(function(){
			unloadPopupBox();
		});
        
        $('#container').click( function() {
            unloadPopupBox();
        });

        function unloadPopupBox() {    // TO Unload the Popupbox
            $('#popup_box').fadeOut("slow");
            $("#container").css({ // this is just for style        
                "opacity": "1"  
            }); 
        }    
        
        function loadPopupBox() {    // To Load the Popupbox
            $('#popup_box').fadeIn("slow");
            $("#container").css({ // this is just for style
                "opacity": "0.3"  
            });         
        }        
    });
</script>

<?php
		}
?>

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
<script src="<?php echo base_url_old;?>js/Old_Include_Js/respond.min.js"></script>

</head>
<body>
<?php //echo $_SERVER['HTTP_REFERER']; ?>
<?php
if(isset($_GET['msg']))
				{
			?>
            <div id="popup_box">    
                <h1>Verification Successfull!! You are officially legit.</h1>
                <p>Welcome to our community of smart, talented Funeral Directors.</p>
                <span style="width:100%; float:left; text-align:center;"><img src="<?php echo base_url_old;?>images/confirm-email.jpg" width="196" height="122"></span>
                <span style="width:100%; float:left; text-align:center;">
                    <a class="pop_a" href="#" id="closeme"><input style="margin:0 auto;" class="login_button" type="button" value="Let's Get to Work"></a>
                </span>
                <a id="popupBoxClose">Close</a>    
            </div>
			<?php
				}
			?>			
<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
      <div id="wrapper">
       		<div id="container">
            <?php include"include/main_header.php"; ?>
           
            <div style="width:100%; float:left; padding-bottom:50px; padding-top:100px;">
            	<div class="log_ex">
                <div class="container">
                	<div class="login_box">
                    <?php
						if(isset($_POST['submit']))
						{
							
							if($_POST['password'] == '')
							{
								$passworderror = 'Please enter new password';
							}
							if($_POST['confirm_password'] == '')
							{
								$cnfrmpassworderror = 'Please enter confirm password';
							}
							if($_POST['password'] != $_POST['confirm_password'])
							{
								$cnfrmpassworderror = 'Password doest not match';
							}
							if(empty($passworderror) && empty($cnfrmpassworderror))
							{
							
							echo	$updatesql = "UPDATE
                                                                                    $table_name
                                                                            SET
                                                                                password = '".md5($_POST['password'])."'
                                                                            WHERE
                                                                                forgot_password = '".$_GET['id']."'
                                                                            ";
											
								mysql_query($updatesql);
								
								
								/*$removesql = "UPDATE
                                                                                $table_name
                                                                            SET
                                                                                forgot_password = ''
                                                                            WHERE
                                                                                forgot_password = '".$_GET['id']."'
                                                                            ";
											
								mysqli_query($db,$removesql);*/
								
								header('Location:signin.php?reset=success');
							}
							
						}
							
					?>
                    
                    <form name="login_form" id="login_form" action="" method="POST">
                    	<span class="login_head">Reset Password</span>
                       <!-- <p>Your password has been reset successfully.</p>-->
                        
                        <?php if(isset($error)){?> <span style="color:red;"><?php echo $error;?></span><?php }?>
                        <span class="login_name">New Password</span>
                        <input class="login_field" type="password" name="password" id="new-pswd" value="">
                        <span class="formerror_new"><?php if(isset($passworderror)) echo $passworderror;?></span>
                        <span class="login_name">Confirm Password</span>
                        <input class="login_field" type="password" name="confirm_password" id="con-pswd" value="">
                        <span class="formerror_new"><?php if(isset($cnfrmpassworderror)) echo $cnfrmpassworderror;?></span>
                       <!-- <span style="float:left; width:100%; margin-top:10px;">
                        	<label class="login_radio"><input class="radio" name="user_type" type="radio" value="client" checked>Client</label>
                            <label class="login_radio"><input class="radio" name="user_type" type="radio" value="Funeral Service Provider">Funeral Director</label>
                        </span>-->
                        <input class="login_button" type="submit" name="submit" value="Send" style="margin-top:8px;" >
                       <!-- <label class="login_checkbox"><input class="check" type="checkbox" name="remember" <?php if(isset($_COOKIE['remember_me'])) {
		echo 'checked="checked"';
	}
	else {
		echo '';
	}
	?> >Remember me next time</label>-->
                        <!--<p class="forgot_pass"><a href="#forgotpswd" class="fancybox1">Forgot Password?</a></p>-->
                    </form>
                    </div>
                </div>
                </div>
                <div class="login_text_wrapper">
                	<!--<p>New Client</p>
                    <span class="login_text">If you are an eziFunerals client and haven't registered before, <a href="signup.php">register now</a> so you can enjoy the benefits of eziFunerals services and a stream-lined shopping experience, it only takes a minute or two!</span>-->
                </div>
            </div>  
            <div id="forgotpswd" style="display:none">
						<div id="">    
					<h1 class="login_head">Forgot Password</h1>
					
                    <span style="width:100%; float:left; text-align:left;">
                       <p style="font-family:Arial, Helvetica, sans-serif;">Please enter your Email ID below.</p>
                        <span class="login_name_new">Email ID</span>
                        <input class="login_field" type="text" name="username" id="username" value=""/>
                        <span style="float:left; width:100%; margin-top:10px;">
                        	<label class="login_radio"><input class="radio" name="user_type" type="radio" value="client" checked>Client</label>
                            <label class="login_radio"><input class="radio" name="user_type" type="radio" value="Funeral Service Provider">Funeral Director</label>
                        </span><br />
                        <!--<span class="reg_name">&nbsp;</span>-->
                        <span style="float:left;">
                        <a style="float:inherit; padding:0;" href="#" class="signup_btn">Submit</a>
                        </span>
                    </span>
					
				</div>
					  </div>
            <?php 
			include("include/main_footer1.php"); 
	}
				?>  
            </div>
      </div>
      </div>
  </div>
</body>
</html>
