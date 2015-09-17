<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js ovderflow_hidden"> <!--<![endif]-->
<title>eziFunerals | Terms and Conditions</title>

<meta name="keywords" content="Funerals, funeral director, online funeral, grief, death, burial, cremation, cemetery, funeral costs, funeral quotes, funeral rights, funeral planning, dying, celebration, funeral industry, memorial, ashes, eulogy, obituary, floral tributes, urns, grave, gravesite, headstone, coffins, caskets, funeral music, funeral consumers, hearse, wake, wills, estates, digital death, loss">

<meta name="description" content="">

<?php include '../include/header.php'; ?>

<?php

	include_once('../include/config.php');

	

	

	$pagesql = "SELECT * FROM pages WHERE id = '14'";

	$pageex = mysql_query($pagesql);

	

	$pages = mysql_fetch_assoc($pageex);

	

	

?>

<div class="punch_text_02 term_condition_heading">
    <div class="container">
	<br><br>
	<div align="left">
        	<font style="font-size:28px; font-family:Arial, Helvetica, sans-serif;" class="blue_heading"><?php echo $pages['title']; ?></font>
    </div>
	</div>
</div>
<div class="clearfix"></div>

<div class="container" style="background:#FFFFFF">
<div class="mar_top5"></div>

	<div class="two_third two_third_resp">
      

      
       <p style="font-size:16px; font-family:Arial, Helvetica, sans-serif; "><?php echo $pages['description']; ?></p><br /><br />


<!--	<h2>Our Team</h2>
	<h3>Board of Directors</h3>
	

            <ul class="lirc_section">
                <li class="left"><img src="../images/testi1.png"></li>
                <li class=""><p style="color:#989898; padding-left:150px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;">
				<font style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Name | Position</font><br />
				<strong>Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.</strong></p><br /><br>
				</li>
            </ul>
   			
			<ul class="lirc_section">
                <li class="left"><img src="../images/testi1.png"></li>
                <li class=""><p style="color:#989898; padding-left:150px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;">
				<font style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Name | Position</font><br />
				<strong>Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.</strong></p><br />
				</li>
            </ul> 
		
    </div> -->

    </div> 
    <div class="one_third last one_third_static">
 
				<a href="how-it-works"><img src="../images/baner2.png" class="sidebar_img"></a><br /><br />
				<a href="how-it-works"><img src="../images/baner1.png" class="sidebar_img"></a><br /><br />
				<a href="how-it-works"><img src="../images/baner3.png" class="sidebar_img"></a><br /><br /><br /><br />
   			
</div><!-- progress bars section -->
</div>
<div class="clearfix"></div>
<script type="text/javascript">



	var BASE_URL = '<?php echo base_url;?>';



</script>




<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
       <div class="center"><a href="how-it-works"><img src="../images/footer_AD.png" width="620" class="top_ad_bottom"></a></div>
        
</div>



<!-- Footer
======================================= -->
<?php include '../include/footer.php'; ?>

</html>