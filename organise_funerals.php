<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<title>eziFunerals | Organise a Funeral</title>

<meta name="keywords" content="Funerals, funeral director, online funeral, grief, death, burial, cremation, cemetery, funeral costs, funeral quotes, funeral rights, funeral planning, dying, celebration, funeral industry, memorial, ashes, eulogy, obituary, floral tributes, urns, grave, gravesite, headstone, coffins, caskets, funeral music, funeral consumers, hearse, wake, wills, estates, digital death, loss">

<meta name="description" content="Organise Your Funeral">

<style>

.introduction-form-wrapper {
position: relative;
float: left;
width: 58%;
margin-top: -52px;
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
padding: 20px 30px 0px 30px; 
box-sizing: border-box;
-moz-box-sizing: border-box;
background: #333;
border-radius: 3px !important;
position: relative;
}

input[type=checkbox]{

}

</style>
<?php include 'include/main_header.php' ; 
	  include_once('include/config.php');
?>
 <?php
	ob_start();

	@session_start();
?>
<link type="text/css" rel="Stylesheet" href="css/Old_Include_Css/jquery.validity.css" />
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
<!--<script type="text/javascript" src="js/location.js"></script>-->

<script type="text/javascript" src="js/Old_Include_Js/jquery-ui-1.8.23.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery-ui-1.8.23.custom.css" />
<script src="js/Old_Include_Js/respond.min.js"></script>
<script type='text/javascript'><!--
			$(document).ready(function() {
				
				var BASE_URL = '<?php echo base_url;?>';
				
				enableSelectBoxes();
				
				$( "#city" ).autocomplete({
					
					source: function(request, response) {
						
					$.ajax({
						url :BASE_URL+"city.php" ,
						data : "state_id="+$("#state").val()+"&city="+$('#city').val(),
						dataType: "json",
						type : "POST",
						success : function(data)
						{
							group=[];
							label=[];
							$.each(data,function(i,v){
								group.push({
								label:$(v).attr('groups')
							})
						})
						
					response(group);
						}
					});
					},
					minLength: 2
				});
				
				
				
				
				
			});
			
			
			
			function enableSelectBoxes(){	}//-->
</script>







<div class="container_full">
<br/><br/><br/><br/><br/><br/><br/><br/>   
	<div class="slider_static_image_org">
    
    	
        
            <div class="static_full_img">
           
		   		<div align="right" style="margin-top:60px; margin-right: 3%;" class="organize_banner_headings">
				
						<!--<font style="color:#FFFFFF;  font-size:40px" class="organize_banner_headings_1">Organise Your Funeral</font><br />-->
					<font style="color:#00a3b4;  font-size:42px;line-height:1.1 !important; font-family: 'Helvetica IE', Arial;" class="organize_banner_headings_2">Organise the entire funeral<br/> from your home</font><br /><br /><br />
					
 				</div>
		  
        	
    </div>
</div><!-- end slider -->



<!--<div class="buttons" style="margin-right:221px;" align="right"><br /><br /><br/><br/><br /><br/><br /> <br/>
							<a href="contact.php"><input id="saveForm" name="saveForm" style="background:#f1cf49; border:none; border-radius:4px;padding:15px; width:40%; margin-left:67.5%; color:#000000; font-weight:bold; font-size:16px;" class="btTxt header-submit submit" type="submit" value="Contact Us" /></a>
</div>-->

<div class="colored_bg org_container3" style="background:#FFFFFF !important; height:420px;">
	
    <div class="container">
    
    <div class="clearfix mar_top5 flash"></div>
    	
		<div align="center" class="t">
		<font style="font-family: 'Helvetica Medium 65', Arial; font-size:22px;"class="heading">Make Informed Funeral Choices - Get Started Today!</font><br /><br /><br/>
		</div>
		
    	<div class="one_full">
        	
        <div class="one_third plan_org">
        	<h3 style="color:#00a3b4" class="heading_of_home">Plan My Funeral</h3>
			<p style="color:#333;font-size:15px;">eziFunerals provides a simple and easy way to plan a personlised funeral from the privacy of your own home. Without a funeral director present<br /><br /></p>   
        	<a href="page/how-it-works"><input type="button" name="" value="START YOUR PLAN" class="login_button organis_find_btn" style="width:130px"></a>
		</div><!-- end section -->
        
		<div class="one_third" style="margin-left: -36px;margin-top: -28px;">
            <center><img src="images/planfuneral-ipad.jpg" width="300" height="300" class="orgimage"></center>
        </div><!-- end section -->
		
		<div class="one_third last after_ipad">
           	<h3 style="color:#00a3b4" class="heading_of_home">Request Quotes</h3>
			<p style="color:#333; font-size:15px;">eziFunerals will help you get quotes and compare funerals costs online.<br /><br /><br /><br/></p>   
        	<a href="page/how-it-works"><input type="button" name="" value="GET FUNERAL QUOTES" class="login_button organis_find_btn" style="width:170px"></a>
        </div><!-- end section -->
		        
	
        </div>
       
    </div>

</div><!-- end site features 03 -->

</div>
<div class="clearfix"></div><script type="text/javascript">



	var BASE_URL = '<?php echo base_url;?>';



</script>
<!-- Small Bue Color Container
======================================= -->
<br/>	
<div class="punch_text_02 middle_of_org">
    <div class="container">
		 <div class="container">
			 <div class="one_full" style="width:96%;">
				<font style="font-size:18px">
				
						<font style="font-family: 'Helvetica Light Condensed 47',Arial; font-size:24px; font-weight:bold" class="org_learn_txt">What Kind Of Funeral?  A step by step guide to planning a meaningful funeral
						</font> <a href="page/funeral_guide.php" class="readmore_but_03 yellow_contactus yellow_org org_btn" style="margin-left:0px;">LEARN MORE</a>
				</font>
			</div>
		</div>
	</div>
</div>


<!-- Get Started Form
======================================= -->

<style>

.city{width: 230px;
font-size:15px;
position: absolute;
text-align: center;
color: #fff;
top: 40px;
left: 50%;
margin-left: -125px;
padding: 0 10px;
text-shadow: 1px 1px 10px #00a3b4 ,2px 3px 10px #00a3b4 ,-1px -1px 10px #00a3b4 ;}

</style>
<div class="colored_bg org_cities_height" style="background:#ffffff; height:410px;">
	
    <div class="container">
    
    <div class="clearfix mar_top5"></div>
    	
		<div align="center">
			<font style="color:#00a3b4; font-family: 'Helvetica Medium 65', Arial; font-size:22px;" class="heading">Search By Region</font><br /><br/>
		</div>
		
    	<div class="one_full">
        	
		<div class="one_fourth featured_images1">
			<a href="funeral_directors.php?state=2&city=Sydney&country=Australia"><img src="images/1_newsouthwhales_sydneyskyline.jpg" width="198" height="99" class="city_image"></a><br/><br/>
			
		</div>
			
       	<div class="one_fourth featured_images1 ">
			<a href="funeral_directors.php?state=7&city=Melbourne&country=Australia"><img src="images/2_victoria_melbourne.jpg"  width="198" height="99" class="city_image"></a><br/><br/>
			
		</div>
	
		
		
		<div class="one_fourth featured_images1">
			<a href="funeral_directors.php?state=4&city=brisbane&country=Australia"><img src="images/3_queensland.jpg" width="198" height="99" class="city_image"></a><br/><br/>
			
		</div>
		
			<div class="one_fourth last featured_images1">
				<a href="funeral_directors.php?state=8&city=perth&country=Australia"><img src="images/4_westernaustralia_perth.jpg" width="198" height="99" class="city_image"></a><br/><br/>
				
			</div>
	
        </div>

		<div class="one_full ">
        	
       	<div class="one_fourth featured_images1">
			<a href="funeral_directors.php?state=5&city=Adelaide&country=Australia"><img src="images/5_southaustralia.jpg" width="198" height="99" class="city_image"></a><br />
			
		</div>
	
		<div class="one_fourth featured_images1">
			<a href="funeral_directors.php?state=6&city=Hobart&country=Australia"><img src="images/6_tasmania.jpg" width="198" height="99" class="city_image"></a><br />
			
		</div>
		
		<div class="one_fourth featured_images1">
			
			<a href="funeral_directors.php?state=3&city=Darwin&country=Australia"><img src="images/7_northernterritory.jpg" width="198" height="99" class="city_image"></a><br />
		</div>
		
		<div class="one_fourth last featured_images1">
			
			<a href="funeral_directors.php?state=1&city=Canberra&country=Australia"><img src="images/8_australian-capital-territory.jpg" width="198" height="99" class="city_image"></a><br />
			
		</div>
	
        </div>
        
    </div>

</div><!-- end site features 04 -->

	
			
	
<!-- Small Bue Color Container
======================================= -->
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


<div class="grey_bg middle_fd" align="" style="background:#f5f5f5; ">
	<div class="container" >
        <center><div class="one_full">
			<h2 style=" font-family: 'Helvetica Medium 65', Arial; font-size:22px;"class="heading" >Request an Information Guide</h2>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:17px;">Let us know your email address and we will send you a copy of our guide on arranging a funeral.</p><br />
			<form name="" action="./requestguide.php" method="post">
			<input type="text" name="email" value="" placeholder="Email Address." style="height:40px; width:440px; border-radius:4px;" required class="datafieldofrequest">
			<input type="hidden" name="Redirecturl" value="<?php echo base_url.basename($_SERVER['SCRIPT_NAME']);?>"/>
			<input type="hidden" name="pagename" value="<?php echo basename($_SERVER['SCRIPT_NAME']);?>"/>
			<input type="submit" name="Submit" value="Submit" class="new_button director_info_btn">
			</form><br />
		</div></center>
        
</div>
</div>
<!-- Ad Section
======================================= -->

<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
        <div class="center"><a href="page/how-it-works"><img src="images/footer_AD.png" width="620" class="top_ad_bottom"></a></div>
        
</div>



<!-- Footer
======================================= -->
<?php include 'include/main_footer.php'; ?>

</html>
