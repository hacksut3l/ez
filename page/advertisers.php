<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js ovderflow_hidden"> <!--<![endif]-->

<title>eziFunerals | Advertise with us</title>

<meta name="keywords" content="Funerals, funeral director, online funeral, grief, death, burial, cremation, cemetery, funeral costs, funeral quotes, funeral rights, funeral planning, dying, celebration, funeral industry, memorial, ashes, eulogy, obituary, floral tributes, urns, grave, gravesite, headstone, coffins, caskets, funeral music, funeral consumers, hearse, wake, wills, estates, digital death, loss">

<meta name="description" content="Join Australia's largest online funeral marketplace helping families Australia wide">

<style>

.introduction-form-wrapper {
position: relative;
float: left;
width: 58%;
margin-top: -70px;
margin-left:500px;
}

.introduction-form-wrapper:before {
display: block;
content: '';
position: absolute;
left: 1px;
top: 50%;
z-index: 0;
border-radius: 100%;
box-shadow: 0 0 20px 0 #333;
height: 540px;
width: 20px;
margin-top: -270px;
}
.introduction-form-wrapper:after {
display: block;
content: '';
position: absolute;
right: 1px;
top: 50%;
z-index: 0;
border-radius: 100%;
box-shadow: 0 0 20px 0 #333;
height: 540px;
width: 20px;
margin-top: -270px;
}

.introduction-form {
z-index: 1;
padding: 30px;
box-sizing: border-box;
-moz-box-sizing: border-box;
background: #333;
border-radius: 3px !important;
position: relative;
}

input[type=checkbox]{

}

</style>
<?php include '../include/header.php'; ?>
 <?php
	ob_start();

	@session_start();
?>
<?php

	ob_start();

	include_once('../include/config.php');

	@session_start();

	

	$pagesql = "SELECT * FROM pages WHERE id = '19'";

	$pageex = mysql_query($pagesql);

	

	$pages = mysql_fetch_assoc($pageex);

	

	

?>

<div class="punch_text_02 main_heading_contain">
    <div class="container">
	<br><br>
	<div align="left">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;" class="blue_heading"><?php // echo $pages['title']; ?>Join Australia's largest online funeral <br />marketplace helping families Australia wide</font>
    </div>
	</div>
</div>

<div class="container_full">
    
	<div class="slider_static_image_inner_adver">
    
    	<div class="container">
        
            <div class="static_full_img">
				
		<?php include "Include-Register-Form.php"; ?>
					
            </div>
    </div>
	
   </div>     
</div><!-- end slider -->

<div class="clearfix"></div>




<div class="container discription_funeral_home" style="background:#FFFFFF; margin-top:10px;">
<h2 style="color:#00a3b4;">Advertisers</h2>
	<div style="margin-top:0px;">
       <p style="font-size:16px; font-family:Arial, Helvetica, sans-serif; "><?php echo $pages['description']; ?></p><br /><br />
</div><!-- progress bars section -->


</div>
<div class="clearfix"></div><script type="text/javascript">



	var BASE_URL = '<?php echo base_url;?>';



</script>


<!-- Get Started Form
======================================= -->

<!-- Get Started Form
======================================= -->

<div class="grey_bg" align="" style="background:#f5f5f5; height:auto">
	
        <div>
			<h2 style="font-weight:bold" align="center">PARTNER WITH US</h2>
			<p align="center" style="margin-left:380px;margin-right:380px;" class="find_out_more"><strong>Find out more about how eziFunerals can work for your company. Send us your details below and we'd be happy to discuss your best options.</strong></p><br />
			
			<div class="one_full">
				
				<form name="" action="ThanksForGetStarted.php" method="post">
				<div class="one_fourth get_started_first_input" style="margin-left:350px;">
					<input id="Name" name="Name" placeholder="Your Name" class="inline_input_1" style="width:180px;height:30px; padding-left:5px; border-radius:4px; border:none;" type="text" required />
				</div>
				
				<div class="one_fourth" style="margin-left:-140px;">
					
				
					
					<input id="ContactNumber" placeholder="Contact Number" class="inline_input_2" name="ContactNumber" style=" padding-left:5px; width:180px;height:30px; border-radius:4px; border:none;" type="text"  required  />
				
				</div>
				
				<div class="one_fourth get_started_third_input">
					
					<input id="PracticeName" name="PracticeName" placeholder="Company Name" class="inline_input_3" style=" padding-left:5px; width:180px;height:30px; border-radius:4px; border:none;" type="text"  value="" /></div><br/><br/>
							
		<div class="container">	
				<div class="one_fourth what_areas" align="center" style="margin-left:37%;"><label>What areas are you interested in?</label></div><br/>
				<div class="one_fourth checkbox_8" style="margin-left:238px; margin-top:10px;">
					<input type="checkbox" name="Lists[]" class="checkbox" value="EziFunerals Directory listing" checked="checked">eziFunerals Directory listing<br />
					<input type="checkbox" name="Lists[]" class="checkbox" value="Funeral planning services">Funeral planning services<br />
					<input type="checkbox" name="Lists[]" class="checkbox" value="Funeral quotes and pricing">Funeral quotes and pricing<br />
					<input type="checkbox" name="Lists[]" class="checkbox" value="Affiliate Marketing">Affiliate Marketing<br />	

				</div>
				
				<div class="one_fourth checkbox_565"  style="margin-top:10px;">
				<input type="checkbox" name="Lists[]" value="Funeral Director Memberships">Funeral Director Memberships<br />
					<input type="checkbox" name="Lists[]" value="Advertising">Advertising Features<br />
					<input type="checkbox" name="Lists[]" value="Partner Client Benefits">Partner Client Benefits<br />
					<input type="checkbox" name="Lists[]" class="checkbox" value="Investment Opportunities">Investment Opportunities<br />
				
				</div>
		</div><br/><br/><br/><br/><br/><br/><br/>	
		
				<div align="center" style="margin-left:-60px;" class="get_started_submit">
				<input type="submit" name="GetStartSend" value="Submit" class="new_button submit_of_funeral_home" style="border:none">
				</div>
				
				
			
			</form>
				
			</div>
		
		</div>
			 
</div>
				
<!-- Small Bue Color Container
======================================= -->
	
<div class="punch_text_02 middle_heading_contain">
    <div class="container">
		 <div class="container">
		 
			 <div class="one_full" style="width:94%;">
				<font style="font-size:18px">
				
						<font style="font-family: 'Helvetica Light Condensed 47',Arial; font-size:24px; font-weight:bold" class="blue_lines_1">Are you a funeral business? Need to grow your business online?</font>
						</font> <a href="how-it-works" class="readmore_but_03 insurance_company_button" style="margin-left:0px;">Learn More</a>
				</font>
			</div>
			
		</div>
	</div>
</div>		
<!----------------------------------------------------------------------Guide Mail popup------------------------------------------------------------------------------------->					
				
					
					<a href="#x" class="overlay" id="contact"></a>
					<div class="popup">
							<h1 class="login_head">Thank You</h1>	
				<div class="row">

						<div class="col-md-5">
							<p>A copy of our guide has been sent to you. Please check your email.</p>
				
						</div>

						<div class="col-md-5">
							
						</div>

				</div>

				<div class="row">
		
					<div class="col-md-5">
							<span style="float:left;"><br>
										
							</span>
						
						
					</div>

					
				</div>
					<a class="close" href="#close"></a>
				</div>
			
<!------------------------------------------------------------------Guide Mail popup------------------------------------------------------------------------------------->		


<!-- Request Information Pack
======================================= -->

<div class="grey_bg" align="" style="background:#f5f5f5; ">
	<div class="container" >
        <center><div class="one_full">
			<h2 style=" font-family: 'Helvetica Medium 65', Arial; font-size:22px;" >Request an Information Guide</h2>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:17px;">Let us know your email address and we will send you a copy of our information guide.</p><br />
			<form name="" action="../requestguide.php" method="post">
			<input type="text" name="email" value="" placeholder="Email Address." style="height:40px; width:440px; border-radius:4px;" required  class="datafieldofrequest">
			<input type="hidden" name="Redirecturl" value="<?php echo base_url.'page/'.basename($_SERVER['SCRIPT_NAME']);?>"/>
			<input type="hidden" name="pagename" value="<?php echo basename($_SERVER['SCRIPT_NAME']);?>"/>
			<input type="submit" name="Submit" value="Submit" class="new_button" style="border:none">
			</form><br />
		</div></center>
        
</div>
</div>


<!-- Ad Section
======================================= -->

<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
        <div class="center"><a href="how-it-works"><img src="../images/footer_AD.png" width="620" class="top_ad_bottom"></a></div>
        
</div>



<!-- Footer
======================================= -->
<?php include '../include/footer.php'; ?>

</html>