<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js ovderflow_hidden"> <!--<![endif]-->

<title>eziFunerals | Charitable Organisations</title>

<meta name="keywords" content="Funerals, funeral director, online funeral, grief, death, burial, cremation, cemetery, funeral costs, funeral quotes, funeral rights, funeral planning, dying, celebration, funeral industry, memorial, ashes, eulogy, obituary, floral tributes, urns, grave, gravesite, headstone, coffins, caskets, funeral music, funeral consumers, hearse, wake, wills, estates, digital death, loss ">

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

	

	$pagesql = "SELECT * FROM pages WHERE id = '25'";

	$pageex = mysql_query($pagesql);

	

	$pages = mysql_fetch_assoc($pageex);

	

	

?>
<br><br><br><br><br><br>
<div class="blue_container">
    <div class="container">
	<br><br>
	<!--<div align="left">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;" class="blue_heading"><?php // echo $pages['title']; ?>Join Australia's largest online funeral </font></div>
	<div align="left">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;" class="blue_heading">		
			marketplace helping families Australia wide</font>
	</div>-->
    </div>
	</div>
</div>
<div class="container_full">
    
	<div class="slider_static_image_inner_charity">
    
    	<div class="container">
        
            <div class="static_full_img">
			
			<div align="center" class="titles_section">
			<font style="color:#FFFFFF; font-size:42px; font-family: 'Helvetica IE', Arial; line-height:2.0;" class="title1"><br /><!--Giving Back To Charity--></font><br/><br />
			<font style="color:#00a3b4; font-size:42px; fontfont-family: 'Helvetica Medium 65', Arial;" class="title2">Honouring the memory of the one you love.</font><br />
			
            </div>
				
				<?php //include "Include-Register-Form.php"; ?>
					
            </div>
    </div>
	
   </div>     
</div><!-- end slider -->

<div class="clearfix"></div>




<div class="container two_third_resp" style="background:#FFFFFF;">
	<div>
       <p style="font-size:16px; font-family:Arial, Helvetica, sans-serif; "><?php echo $pages['description']; ?></p><br /><br />
</div><!-- progress bars section -->


</div>
<div class="clearfix"></div>
<script type="text/javascript">



	var BASE_URL = '<?php echo base_url;?>';



</script>




<!-- Get Started Form
======================================= -->


	
<!-- Small Bue Color Container
======================================= -->
	
<div class="punch_text_02">
    <div class="container">
		 <div class="container">
		 
			 <div class="one_full" style="width:100%;">
				<font style="font-size:18px">
				
						<font style="font-family: 'Helvetica Light Condensed 47',Arial; font-size:24px; font-weight:bold" class="donate_contact">Do you represent a national Charity that is interested in partnering with eziFunerals?</font>
						<a href="contact-us" class="readmore_but_03 contact_btn" style="margin-left:0px;">CONTACT US</a><br/>
						<!--<font style="font-family: 'Helvetica Light Condensed 47',Arial; font-size:15px; font-weight:bold" class="donate_contact2">If you represent a national Charity that is interested in partnering with us and being included on our website, please contact EziFunerals directly.</font>-->
						 
				</font>
			</div>
			
		</div>
	</div>
</div>	

<!-- Request Information Pack
======================================= -->

<div class="grey_bg" align="" style="background:#f5f5f5; ">
	<div class="container" >
			<div class="one_full">
        	
       	<div class="one_fourth one_fourth_resp">
			<img src="../images/1.jpg" alt="Charity Coming Soon"><br /><br/>
			
		</div>
	
		<div class="one_fourth one_fourth_resp">
			<img src="../images/2.jpg"><br /><br/>
			
		</div>
		
		<div class="one_fourth one_fourth_resp">
			<img src="../images/3.jpg"><br /><br/>
			
		</div>
		
		<div class="one_fourth last one_fourth_resp">
			<img src="../images/4.jpg"><br />
			
		</div>
	
        </div>

		
	
        </div>
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