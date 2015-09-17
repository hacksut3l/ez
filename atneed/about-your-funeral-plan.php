<?php
	ob_start();
	include_once('config.php');
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
<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="Stylesheet" href="css/jquery.validity.css" />
<script type="text/javascript" src="js/jquery-1.8.min.js"></script>
<script type="text/javascript" src="js/jquery.validity.js"></script>
       
 <!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="js/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.4" media="screen" />
      
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
				
				$.ajax
                    ({
                        type: "POST",
                        url: "email_present.php",
                        data: "email="+email+"&user_type="+user_type,
                        success: function(msg)
                        {
                          	if(msg == '1')
							{
								$('#emailerror').html('');	
											
								$.ajax
									({
										type: "POST",
										url: "forgot_password.php",
										data: "email="+email+"&user_type="+user_type,
										success: function(msg)
										{
											if(msg == '1')
											{
												$('#succes_send').html('Please check your mail, we have sent you a reset password link');	
												$('#forgot_email').val('')
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
<script src="js/respond.min.js"></script>

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
                <span style="width:100%; float:left; text-align:center;"><img src="images/confirm-email.jpg" width="196" height="122"></span>
                <span style="width:100%; float:left; text-align:center;">
                    <a class="pop_a" href="#" id="closeme"><input style="margin:0 auto;" class="invite_director_btn" type="button" value="Let's Get to Work"></a>
                </span>
                <a id="popupBoxClose">X</a>    
            </div>
			<?php
				}
			?>
<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
      <div id="wrapper">
       		<div id="container">
            <?php include("header.php"); ?>
            <?php
				if(isset($_POST['submit']))
				{
					if($_POST['user_type'] == 'Funeral Service Provider')
					{
						$table = 'directors';
					}
					else
					{
						$table = 'clients';
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
					
					$query = mysql_query($sql);
					
					$count_rows = @mysql_num_rows($query);
					
					if($count_rows > 0)
					{
						$result = mysql_fetch_assoc($query);
						
						$_SESSION['person_id'] = $result['id'];
						
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
						
						if(isset($_SESSION['url']))
						{
							$url = $_SESSION['url'];
						}
						else
						{
							$url = '';
						}
						
						header('Location:'.base_url.$url);						
					}
					else
					{
						$error = 'Wrong username or password';
					}
							
				}
				
				?>
            <div style="width:100%; float:left; padding-bottom:20px;">
            	<div class="log_ex">
                <div class="login_wrapper">
                	<div class="login_box1">
                    <div class="left-data" style="width:100%;">
                  <span>Thank you for choosing eziFunerals!</span></div>
<p>Our funeral plans, whether <sp class="gree_pas">AT NEED</sp> or as an  <sp class="gree_pas">ADVANCED</sp> option, can reduce the stress your family and friends face at a time of intense grief.</p>

<p><strong>How to complete your Funeral Plan:</strong></p>
<ul class="atneed_ul" style="margin-bottom:15px;">
 <li>Fill in the sections that apply to the funeral plan you need.</li>
<li>Use the help text, at each question, to guide you through the process.</li>
<li>We’ll generate an online preview of your funeral plan to check.</li>
<li>Your personalised funeral plan will be sent to you, on payment of our fees.</li>
</ul>
<p>Once your Funeral Plan is complete, you can be rest assured that you and your family will be empowered to make informed decisions about all funeral-related matters.</p>

<p>You should review your funeral plan regularly so that your funeral wishes and personal details are always up to date.</p>

<p>Should you need more information visit our <a href="http://infowaysprojects.com/clients/ezi-funeral/page/planning-faq-s" target="_blank" style="color:#333; text-decoration:underline;">Planning FAQs </a>section.</p>
 <div style="width:100%; float:left;   padding-bottom: 17px;">


                	<div class="left_at_data1">



                    	<div class="left_at_data_inn1">
                        <div class="atneed_btn"><a href="#">Plan Now</a></div><div class="special" style="margin-left:5px;"><img src="images/special.png" width="70" border="0" ></div>
                        </div></div>
                        <div class="left_at_data2">



                    	<div class="left_at_data_inn2">
                        
                        
                        <div class="atneed_btn"><a href="<?php echo base_url;?>atneed/person-making-arrangements.php">Plan in Advance</a></div><div class="special"  style="margin-left:5px;"><img src="images/special.png" width="70" border="0" ></div>
                        
                        </div>
                    
                    </div>
                </div></div>
                </div>
                
            </div>  
            
            <?php include("footer.php"); ?>  
            </div>
      </div>
      </div>
  </div>
</body>
</html>