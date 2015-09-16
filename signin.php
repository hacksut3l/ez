<?php 
	ob_start();
	include_once('./include/config.php');
	session_start();
	 session_destroy();
//print_r($_SESSION);
//echo $_SESSION['url']."==";
	if(isset($_SESSION['name']) && isset($_SESSION['person_id']))
	{
			header('Location:'.base_url);						
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
<script type="text/javascript" src="<?php echo base_url;?>lib/Old_Include_Js/jquery-1.10.1.min.js"></script>

<link type="text/css" rel="Stylesheet" href="css/Old_Include_Css/jquery.validity.css" />
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
<script type="text/javascript" src="js/Old_Include_Js/jquery.validity.js"></script>
       
 <!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery.fancybox.css" media="screen" />
      
       <script type="text/javascript">
    $(document).ready( function() {
		
		 function validateEmail(sEmail) {
			var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			if (filter.test(sEmail)) {
				return true;
			}
			else {
				return false;
			}
		}
		
		$('#forgot_submit').live("click",function()
		{
			
			var email = $('#forgot_email').val();
			
			if(!validateEmail(email)) 
			{
				//alert('Please enter valid email address');
				$('#emailerror').html('Please enter valid email address');
				return false;
			}
			else
			{
				//alert($("input:radio[name=forgot_user_type]:checked").val())
				
				var user_type = $("input:radio[name=forgot_user_type]:checked").val();
				//alert($('#forgot_email').val());
					
				$.ajax
                    ({
                        type: "POST",
                        url: "email_present.php",
						data: "email="+email+"&user_type="+user_type,
                        success: function(msg)
                        {
							//alert(msg);
                          	if(msg=='1')
							{	
								
								$('#emailerror').html('');	
											
								$.ajax
									({
										type: "POST",
										url: "forgot_password.php",
										data: "email="+email+"&user_type="+user_type,
										success: function(msg)
										{
											//alert(msg);
											if(msg='1')
											{
												
												$('#succes_send').html('Please check your mail, we have sent you a reset password link');	
												$('#forgot_email').val('');
											}
											
										  
										}
									});
							}
							else
							{
								$('#emailerror').html('Email id does not exist');
								return false;
							}
						  
                        }
                    });
				
				
				
			}
			
			
		});
		
		
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
		
		 $('.forgot_username').on("click",function(){
		 
		 
                        var email = $('#username_email').val();
                        
						
                        if(!validateEmail(email)){                            
                            $('#usernameemailerror').html('Please enter valid email address');
                            return false;
			}
			else{
                            var user_type = $("input:radio[name=username_user_type]:checked").val();
                            
                            $.ajax
                            ({
                                type: "POST",
                                url: "email_present.php",
                                data: "email="+email+"&user_type="+user_type,
                                success: function(msg)
                                {
									
                                    if(msg == '1'){
                                        $('#usernameemailerror').html('');	
											
                                        $.ajax
                                        ({
                                            type: "POST",
                                            url: "forgot_username.php",
                                            data: "email="+email+"&user_type="+user_type,
                                            success: function(msg)
                                            {
													
                                                    $('#username_success').html('Please check your mail, we have sent you your username');	
                                                    $('#username_email').val('');
													
                                               
                                            }
                                        });
                                    }
                                    else{
                                        $('#usernameemailerror').html('Email id does not exist');
                                        return false;
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
        
        <script type="text/javascript">
            $(function() { 
                $("#login_form").validity(function() {
                   
					$("#username")
						.require();
						
					$("input[type='password']")
					.require();
					
                });
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
<script src="js/Old_Include_Js/respond.min.js"></script>

</head>
<?php  include 'include/main_header.php'; ?>
<body>

<?php //echo $_SERVER['HTTP_REFERER']; ?>
<?php
if(isset($_GET['msg']))
				{
			?>
			
	<!------------------------------------------------------------------Forgot Password popup------------------------------------------------------------------------------------->					
				
			<a href="#x" class="overlay" id="confirm"></a>
					
					<div class="popup">
							<h1>Verification Successful!</h1>
							<h2> Welcome to Australia's Largest Funeral Marketplace</h2>
				<div class="row">

						 <span style="width:100%; float:left; text-align:center;">
                    <a href="index.php"><input style="margin:0 auto;width:140px !important;" class="login_button" type="button" value="Let's Get to Work"></a>
                </span>

				</div>

					<a class="close" href="#close"></a>
				</div>
			
<!------------------------------------------------------------------End Forgot Password popup------------------------------------------------------------------------------------->
			
			
			
			
      <!--   <div id="popup_box">    
                <h1>Verification Successful!</h1>
                <h1> Welcome to Australia's Largest Funeral Marketplace</h1>
                <!--<h1>We're here to help.</h1>
                <p>Welcome to our community of smart, talented Funeral Directors.</p>
                -->
            <!--    <span style="width:100%; float:left; text-align:center;">
                    <a class="pop_a" href="index.php" id="closeme"><input style="margin:0 auto;" class="invite_director_btn" type="button" value="Let's Get to Work"></a>
                </span>
                <a id="popupBoxClose">X</a>    -->
          <!--  </div>-->
			<?php
				}
			?>
			
<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
      <div id="wrapper">
       		<div id="container">			
			

            <?php //include("header.php"); ?>
            <?php
				if(isset($_POST['submit']))
				{
					if($_POST['user_type'] == 'Funeral Service Provider')
					{
						$table = 'directors';
						$_SESSION['type']='director';
					}
					else
					{
						$table = 'clients';
						$_SESSION['type']='client';
					}
					
					$sql = "SELECT 
								* 
							FROM 
								$table 
							WHERE
								username = '".$_POST['username']."'
							AND
								password = '".md5($_POST['password'])."'
							AND
								is_email_confirm = '1'
							";
					//echo $sql;exit;
					
					$query = mysql_query($sql);
					
					$count_rows = @mysql_num_rows($query);
					
					if($count_rows > 0)
					{
						$result = mysql_fetch_assoc($query);
						
						$_SESSION['person_id'] = $result['id'];
						$_SESSION['client'] = $result['id'];
						if($_POST['user_type'] == 'Funeral Service Provider')
						{
							$_SESSION['name'] = ucwords($result['full_name']);
						}
						else
						{
							$_SESSION['name'] = ucwords($result['first_name']);
							$_SESSION['client'] = $result['id'];
							//$_SESSION['last_name'] = $result['last_name'];
						}
						
						
						
						if($_POST['remember']) 
						{
							setcookie('remember_me', $_POST['username'], $year);
							setcookie('password', $_POST['password'], $year);
						}
						elseif(!$_POST['remember']) 
						{
							if(isset($_COOKIE['remember_me'])) 
							{
								$past = time() - 100;
								setcookie(remember_me, gone, $past);
								setcookie(password, gone1, $past);
							}
						}
						
					if($table==	'clients')
					{
						$url='client_dashboard.php';
						
						header('Location:'.base_url.$url);
					}
					else
					{
						$url='director_dashboard.php';
						
						header('Location:'.base_url.$url);
					
					
					}
					
					
					
						/*if(isset($_SESSION['url']) && $_GET['country']=='')
						{
							$url = $_SESSION['url'];
						}
                                                else if($_GET['country']!='' && (isset($_SESSION['url'])))
                                                {
                                                    $url = $_SESSION['url'].'?country='.$_REQUEST['country'].'&state='.$_REQUEST['state'].'&city='.$_REQUEST['city'];
                                                
}
						else
						{
							$url = '';
						}
						echo base_url.$url;
                                               // exit;
						header('Location:'.base_url.$url);			*/			
					}
					else
					{
						$error = 'Wrong username or password';
					}
							
				}
				
				?>
       
   <br /><br /><br /><br /><br /><br /><br />



		<div class="clearfix"></div>

		<div class="container" style="background:#FFFFFF">
			<div class="mar_top5"></div>
		
		<div>
		<br/><br/><br/>
		<div class="one_half">
			
				<font style="font-weight:bold; font-size:30px;" class="login_title">Welcome to <span style="color:#00a3b4">eziFunerals</span></font>
 	 			<font style="font-size:16px; font-weight:bold;">AUSTRALIA'S LARGEST FUNERAL MARKETPLACE</font>
  				<img src="images/sign_up_img.jpg" alt="" title="" border="0" style="width:100%;" />
				
		</div>	  
		
		<div class="one_half last">       	
              <form name="login_form" id="login_form" action="" method="POST">
					
					<font style="font-weight:bold; font-size:28px">Login</font><br /><br />
					
                    	
                      
                        <?php
							if(isset($_GET['reset']))
							{
						?>
                        
                       	 		<p style="color:green;">Your password has been reset successfully.</p>
                        <?php
							}
						?>
                        
                        <?php if(isset($error)){?><strong> <span style="color:red;font-family: arial;
font-size: 12px;"><?php echo $error;?></span></strong><?php }?>
						<br />
                        <span class="login_name">Enter Username</span><br />
                        <input class="login_field" type="text" name="username" id="username" value="<?php if(isset($_COOKIE['remember_me'])) { echo $_COOKIE['remember_me'];  } ?>" size="40"> <div class="forgot">
        <a id="login_pop" class="btn btn-primary" href="#user_forgot">Forgot username?</a>
    </div>
						<br />
						
						
                        <span class="login_name">Password</span><br />
                        <input class="login_field" type="password" name="password" id="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" size="40"><br /><a  id="login_pop" class="btn btn-primary" href="#contact">Forgot Password?</a>
						<br /><br/>
						
                        <select name="user_type" id="user_type" class="dropdown">
       							 <option value="">Select One</option>
							 	<option value="client" >I am a Funeral Client</option>
      						   <option value="Funeral Service Provider" >I am a Funeral Director</option>
  					  </select>
					  
					  <span style="color:red;font-family: 'open_sansregular';font-size: 12px;"></span>    <br /><br />
					  
					  <label class="login_checkbox"><input class="check" type="checkbox" name="remember" <?php if(isset($_COOKIE['remember_me'])) {
		echo 'checked="checked"';
	}
	else {
		echo '';
	}
	?> >Remember me next time</label>
	
						<br /><br />
                        <input class="login_btn login_button user_login_btn" type="submit" name="submit" value="Login" > <img src="images/lock.jpg" alt="" title="" /><br/> 
						
                    </form>
					
<!----------------------------------------------------------------------Forgot Password popup------------------------------------------------------------------------------------->					
				
					
					<a href="#x" class="overlay" id="contact"></a>
					<div class="popup">
							<h1 class="login_head">Forgot Password</h1>	
				<div class="row">

						<div class="col-md-5">
							<span id="succes_send" style="color:green;"></span><br/>
									<span style="width:100%; float:left; text-align:left;">
									  <p style="font-family:Arial, Helvetica, sans-serif;">Please enter your Email ID below.</p></span>
										<span class="login_name_new">Email ID</span>
										<input class="login_field" type="text" name="forgot_email" id="forgot_email" value=""/><br/>
									  <span id="emailerror" style="color:red"></span>
						</div>

						<div class="col-md-5">
							 <span style="float:left; width:100%; margin-top:10px;">
									<label class="login_radio"><input class="radio" name="forgot_user_type" type="radio" value="client" checked>Client</label>
									<label class="login_radio"><input class="radio" name="forgot_user_type" type="radio" value="director">Funeral Director</label>
							</span>
						</div>

				</div>

				<div class="row">
		
					<div class="col-md-5">
							<span style="float:left;"><br>
											 <a style="float:inherit; padding:5px; text-align:center; width:100px;" href="javascript:void(0);" id="forgot_submit" class="login_button">Submit</a>
							</span>
						
						
					</div>

					
				</div>
					<a class="close" href="#close"></a>
				</div>
			
<!------------------------------------------------------------------End Forgot Password popup------------------------------------------------------------------------------------->										

<!----------------------------------------------------------------------Forgot username popup------------------------------------------------------------------------------------->					
		

		
				
					<a href="#x" class="overlay" id="user_forgot"></a>
					<div class="popup">
							<h1 class="login_head">Forgot Username</h1>	
				<div class="row">

						
						<div class="col-md-5">
							 <span id="username_success" style="color:green;"></span><br/>
							<form action="" method="get">
									<span style="width:100%; float:left; text-align:left;">
									  <p style="font-family:Arial, Helvetica, sans-serif;">Please enter your Email ID below.</p></span>
										<span class="login_name_new">Email ID</span>
										<input name="username_email" type="text" id="username_email"/><br/>
									 <span id="usernameemailerror" style="color:red;margin-left: 59px;"></span>
						</div>

						<div class="col-md-5">
							 <span style="float:left; width:100%; margin-top:10px;">
									<label class="login_radio"><input name="username_user_type" type="radio" value="client" checked="checked" />Client</label>
									<label class="login_radio"> <input name="username_user_type" type="radio" value="director" />Funeral Director</label>
							</span>
						</div>
					</form>
				</div>

				<div class="row">
		
					<div class="col-md-5">
							<span style="float:left;"><br>
											 <a href="javascript:void(0);" ><input type="button" value="Submit" class="forgot_username login_button"/> </a>
							</span>
						
						
					</div>

					
				</div>
					<a class="close" href="#close"></a>
				</div>
			
<!------------------------------------------------------------------End Forgot username popup------------------------------------------------------------------------------------->										

		
		
		
 		<br /><br />
 	
  		 <img src="images/divider.png">
		<br /><br />
		 
		  <font style="font-weight:bold; font-size:28px">Create an Account</font><br /><br />
		 
		 
		 <?php 
		 		if(isset($_POST['continue']))
				{
					if(isset($_POST['account_type']) &&  $_POST['account_type'] == 'client' ) 
					{
								
							header('Location:client-membership.php');		
			 		 }
			  
			  		if(isset($_POST['account_type']) &&  $_POST['account_type'] == 'director' ) 
					{
							header('Location:director-membership.php');		
			  		 }
				
				} 
		 
		 ?>
		 
		 
		 <form action="" method="post" class="account">
      				 <input name="account_type" class="account_type" type="radio" value="client" checked="checked" /> I am a Funeral Client 
 					 <input name="account_type" class="account_type" type="radio" value="director" /> I am a Funeral Director<br />
					 <br />	
  					<input name="continue" type="submit" value="Continue" class="redirect_signup login_button"/>
  		</form>
		 
		 
		 
 
			
					
					
					<br /><br />
				</div>
	
			</div><br />

   		 </div><!-- end section -->
      </div>
   </div>
   
  <div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
        <div class="center"><a href="page/how-it-works"><img src="./images/footer_AD.png" width="620" class="top_ad_bottom"></a></div>
        
</div>
					
					
        
        </div>
      </div>
   </div>
 </div>
 
 <?php include 'include/main_footer1.php'; ?>
 
 
 
 
 
 
 
</body>
</html>
