<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->
<title>eziFunerals | Funeral Guide</title>

<meta name="keywords" content="Funerals, funeral director, online funeral, grief, death, burial, cremation, cemetery, funeral costs, funeral quotes, funeral rights, funeral planning, dying, celebration, funeral industry, memorial, ashes, eulogy, obituary, floral tributes, urns, grave, gravesite, headstone, coffins, caskets, funeral music, funeral consumers, hearse, wake, wills, estates, digital death, loss ">
<meta name="description" content="A step by step guide if you`ve never arranged a funeral before and don`t know where to start">

<?php include '../include/header.php'; ?>

<?php

	include_once('../include/config.php');

	

	

	$pagesql = "SELECT * FROM pages WHERE id = '23'";

	$pageex = mysql_query($pagesql);

	

	$pages = mysql_fetch_assoc($pageex);

	

	

?>

<div class="punch_text_02">
    <div class="container">
	<br><br>
	<div align="left">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;"><?php echo $pages['title']; ?></font>
    </div>
	</div>
</div>
<div class="clearfix"></div>

<div class="container " style="background:#FFFFFF">
<div class="mar_top5"></div>

	<div class="two_third discription_funeral_home">
      

      
       <p style="font-size:16px; font-family:Arial, Helvetica, sans-serif; "><?php echo $pages['description']; ?></p>


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
	

    <div class="one_third last">
 
		<a href="../organise_funerals.php"><img src="../images/baner2.png"></a><br /><br />
				<a href="how-it-works"><img src="../images/baner1.png"></a><br /><br />
				<a href="../find-funeral-director.php"><img src="../images/baner3.png"></a><br /><br /><br /><br />
   			
</div><!-- progress bars section -->
<div class="one_helf">
<p><span style="font-size: x-large;"><span style="text-align: left;">Get Your&nbsp;<span style="color: rgb(0, 138, 152) !important;">BONUS</span> Copy!</span></span><br />
<span style="font-size: larger;">Simply sign up and purchase an online funeral plan today.</span><br />
<br />
<br />
<br />
<span style="color: rgb(0, 138, 152);"><span style="font-size: x-large;">Purchase a Copy Online!<br />
</span></span><br />
<br />
<a href="http://www.amazon.com/What-Kind-Funeral-self-help-meaningful/dp/1925086291/ref=tmm_pap_title_0" target="_blank"><img src="/userfiles/image/amazon.png" width="243" height="78" alt="" /></a><font color="#008a98" size="5"><br />
</font><br />
&nbsp;</p>
</div>
</div>
<div class="clearfix"></div>
<script type="text/javascript">



	var BASE_URL = '<?php echo base_url;?>';



</script>

  </div>
	</div>
<div class="punch_text_02">
    <div class="container">
		 <div class="container">
			 <div class="one_full" style="width:94%;">
				<font style="font-size:18px">
				
						<font style="font-family: 'Helvetica Light Condensed 47',Arial; font-size:24px; font-weight:bold">Ready to start organising your funeral online ?
						</font> <a href="../organise_funerals.php" class="readmore_but_03" style="margin-left:0px;">Learn More</a>
				</font>
			</div>
		</div>
	</div>
</div>


<!--<div class="grey_bg" align="" style="background:#f5f5f5; ">
	<div class="container" >
        <div class="one_full">
			<h2 style="font-weight:bold">Request an Information Pack</h2>
			<p><strong>Let us know your email address and we will send you an information pack.</strong></p><br />
			<form name="" action="pages/ThanksForRequestInformation.php" method="post">
			<input type="email" name="RequestEmail"  placeholder="Email Address." style="height:40px; width:440px; border-radius:4px;" required>
			<input type="submit" name="RequestSend" value="Submit" class="new_button">
			</form><br />
		</div>
        
</div>-->
</div>

<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
        <div class="center"><a href="how-it-works"><img src="../images/footer_AD.png" width="620" class="top_ad_bottom"></a></div>
        
</div>



<!-- Footer
======================================= -->
<?php include '../include/footer.php'; ?>

</html>