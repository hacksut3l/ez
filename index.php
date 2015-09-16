<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js ovderflow_hidden">
<!--<![endif]-->
<title>eziFunerals | Australia's Largest Online Funeral Marketplace</title>
<meta name="keywords" content="Funerals, funeral director, online funeral, grief, death, burial, cremation, cemetery, funeral costs, funeral quotes, funeral rights, funeral planning, dying, celebration, funeral industry, memorial, ashes, eulogy, obituary, floral tributes, urns, grave, gravesite, headstone, coffins, caskets, funeral music, funeral consumers, hearse, wake, wills, estates, digital death, loss">
<meta name="description" content="eziFunerals is Australia's largest online funeral marketplace, where funeral homes compete for your business">
<link href="css/style.css" type="text/css">
<style>

.home_banner{ margin-top:75px; text-align:center; width:905px;}
.banner_tab1 {
	background:#00a3b4 !important;
	border-radius: 15px;
	font-family: 'Helvetica Chrome', 'Helvetica IE', Arial;
	font-size: 15px;
	color:#FFFFFF;
	width: 220px;
	float: left;
	padding: 20px 6px 20px 6px;
	padding: 20px 30px 20px 30px;
	margin: -50px 0px 0px 0px;
	background: #efefef;
	border-radius: 15px;
	font-size: 16px;
}
.banner_tab1:hover {
	background:#f1d039!important;
	border-radius: 15px;
	font-family: 'Helvetica Chrome', 'Helvetica IE', Arial;
	font-size: 15px;
	color:#000000 !important;
	width: 220px;
	float: left;
	
	padding: 20px 6px 20px 6px;
	padding: 20px 30px 20px 30px;
	margin: -50px 0px 0px 0px;
	background: #0696e9;
	border-radius: 15px;
	font-size: 16px;
}
.banner_tab2 {
	padding: 20px 47px 20px 47px;
	margin: -50px 0px 0px 30px;
	background:#00a3b4 !important;
	border-radius: 15px;
	font-size: 15px;
	color: #FFFFFF;
	width: 270px;
	float: left;
	font-family: 'Helvetica Chrome', 'Helvetica IE', Arial;
	padding: 20px 5px 20px 5px;
}
.banner_tab2:hover {
	padding: 20px 47px 20px 47px;
	margin: -50px 0px 0px 30px;
	background:#f1d039!important;
	border-radius: 15px;
	font-size: 15px;
	color: #ffffff;
	width: 270px;
	float: left;
	font-family: 'Helvetica Chrome', 'Helvetica IE', Arial;
	padding: 20px 5px 20px 5px;
}
.banner_tab3 {
	padding: 20px 5px 20px 5px;
	margin: -50px 24px 0px 0px;
	background:#00a3b4 !important;
	border-radius: 15px;
	font-size: 15px;
	color: #ffffff;
	width: 270px;
	float: right;
	font-family: 'Helvetica Chrome', 'Helvetica IE', Arial;
}
.banner_tab3:hover {
	padding: 20px 5px 20px 5px;
	margin: -50px 24px 0px 0px;
	background: #f1d039 !important;
	border-radius: 15px;
	font-size: 15px;
	color: #ffffff;
	width: 270px;
	float: right;
	font-family: 'Helvetica Chrome', 'Helvetica IE', Arial;
}
.home_banner a:hover {
	color:#FFFFFF !important;
}
.logo{ height:60px; width:200px;}

.people1{ font-family:Arial, Helvetica, sans-serif; font-size:15px; width:92%; margin-left:140px; margin-top:-70px; margin-bottom:35px;}
.people2{ font-family:Arial, Helvetica, sans-serif; font-size:15px; width:90%; margin-left:140px; margin-top:-70px; margin-bottom:35px;}

.punch_doit{font-family:'Helvetica Light Condensed 47',Arial; font-size:24px; font-weight:bold; float:left; margin-top:8px;
margin-left:40px;}

.title_menu{ margin-top:4px;}


</style>
<?php include'include/config.php'; ?>
<?php include'include/main_header.php'; ?>

<div class="clearfix"></div>

<!-- end slider -->
<?php
			$select_image=mysql_query("select * from home_slider");
			$data=mysql_fetch_array($select_image);
			
 ?>

<img src="admin/uploads/home_slider/<?php echo $data['image_name']; ?>" class="home_page" width="100%">
<div class="sub_contain" align="right"> <br />
  <div class="center1" style="color:#00a3b4 !important;text-align:left !important;">Funeral Planning Made Easy</div>
  <div class="center2" style="color:#00a3b4 !important;text-align:left !important;line-height: 1; margin-top:10px;"><img src="images/ticker.png" class="tick"/> No more pressure sales<br/><img src="images/ticker.png" class="tick"/> No more hidden fees<br /><img src="images/ticker.png" class="tick"/> No more packages</div>
</div>

<div class="container">

  <div class="home_banner"> <a href="page/how-it-works" class="banner_tab1" style="display:none !important">Has someone just passed?</a> <a href="page/how-it-works" class="banner_tab2" style="display:none !important">Need a Funeral Director?</a> <a href="page/how-it-works" class="banner_tab3" style="display:none !important">Planning a Funeral in Advance?</a> </div>
</div>
</div>

<style>

.pic{ width:100px; height:100px; opacity: 1; filter: alpha(opacity=100); background: url(images/users_icon.png) no-repeat; background-size:100%;margin: 0px auto; }

.pic:hover { background:url(images/users_icon_hover.png) no-repeat;background-size:100%; }
 
.pic1{ width:100px; height:100px; opacity: 1; filter: alpha(opacity=100); background: url(images/money_icon.png) no-repeat; background-size:100%;margin: 0px auto; }

.pic1:hover {background:url(images/money_icon_hover.png) no-repeat;background-size:100%; } 

.pic2{ width:100px; height:100px; opacity: 1; filter: alpha(opacity=100); background: url(images/note_icon.png) no-repeat; background-size:100%;margin: 0px auto; }

.pic2:hover {background:url(images/note_icon_hover.png) no-repeat;background-size:100%; } 

</style>
<style>

.text_banner a{ font-family: 'Helvetica Medium 65', Arial; font-size:22px; color:#FFFFFF;}
.text_banner a:hover{color:#00a3b4 !important;}
</style>
<br/>
<div class="container homecontainer">
  <div align="center" style="margin-top:0px;" class="testimonial_heading">
    <h2 style="font-family:'Helvetica Medium 65',Arial;" class="heading">A simple and convenient way to organise a funeral</h2>
    <p style="color:#999999; font-family: Arial, Helvetica, sans-serif; font-size:17px;">We help guide you through the funeral process so that you are empowered to be more involved in all the decisions</p>
  </div>
  <div class="one_third sitefeatures_01 color_01"><br />
    <a href="./organise_funerals.php">
    <div class="pic2"></div>
    </a>
    <div class="clearfix mar_top6"></div>
    <h3 style="font-family: 'Helvetica Medium 65', Arial;">PLAN YOUR FUNERAL</h3>
    <p style="font-family:Arial, Helvetica, sans-serif; font-size:13px;">Plan the entire funeral from your home.</p>
    <div class="clearfix mar_top3"></div>
    <br />
  </div>
  <div class="one_third sitefeatures_01 color_02"><br />
    <a href="page/how-it-works">
    <div class="pic1"></div>
    </a>
    <div class="clearfix mar_top6"></div>
    <h3 style="font-family: 'Helvetica Medium 65', Arial;">REQUEST QUOTES</h3>
    <p style="font-family:Arial, Helvetica, sans-serif; font-size:13px;">Shop around and compare funeral costs.</p>
    <div class="clearfix mar_top3"></div>
    <br />
  </div>
  <div class="one_third sitefeatures_01 color_03 last"><br />
    <a href="./find-funeral-director.php">
    <div class="pic"></div>
    </a>
    <div class="clearfix mar_top6"></div>
    <h3 style="font-family:'Helvetica Medium 65', Arial;">SELECT A FUNERAL DIRECTOR</h3>
    <p style="font-family:Arial, Helvetica, sans-serif; font-size:13px;">Get the right funeral director at the right price.</p>
    <div class="clearfix mar_top3"></div>
    <br />
    <br/>
  </div>
</div>
<!-- end site features -->
<div class="clearfix mar_top5"></div>
<div class="colored_bg" style="background:url(images/blackbanner.png);">
  <div class="container homecontainer">
    <div class="clearfix mar_top5"></div>
    <div align="center">
      <div class="text_banner heading"><a href="page/how-it-works">Choose the plan that's right for you - Get Started Today!<br />
        </a></div>
      <p style="color:#999999; font-family: Arial, Helvetica, sans-serif; font-size:17px;">eziFunerals provides independent and trustworthy information so you get to make the right choices</p>
      <br />
      <br/>
      <br/>
    </div>
    <div align="center"> </div>
    <div class="one_full">
      <div class="one_third">
        <ul class="lirc_section">
          <li class="left"><img src="images/1st_icon.png" width="40" height="40"></li>
          <li class="right">
            <p style="color:#FFFFFF;font-family: 'Helvetica Medium 65', Arial; font-size:20px;">Its your funeral</p>
          </li>
          <br/>
          <li class="right">
            <p style="color:#999999; font-size:16px; font-family: Arial, Helvetica, sans-serif; ">Create a personal and unique funeral for the one you love.</p>
          </li>
        </ul>
      </div>
      <!-- end section -->
      <div class="one_third">
        <ul class="lirc_section">
          <li class="left"><img src="images/config_icon.png" width="40" height="40"></li>
          <li class="right">
            <p style="color:#FFFFFF;font-family: 'Helvetica Medium 65', Arial; font-size:20px;">You're in total control</p>
          </li>
          <br/>
          <br/>
          <li class="right">
            <p style="color:#999999;font-size:16px; font-family: Arial, Helvetica, sans-serif; ">Funeral Directors compete for your funeral and contact you direct. No more ringing around.</p>
          </li>
        </ul>
      </div>
      <!-- end section -->
      <div class="one_third last">
        <ul class="lirc_section">
          <li class="left"><img src="images/flag_icon.png" width="40" height="40"></li>
          <li class="right">
            <p style="color:#FFFFFF;font-family: 'Helvetica Medium 65', Arial; font-size:20px;">No obligation to choose</p>
          </li>
          <br/>
          <br/>
          <li class="right">
            <p style="color:#999999;font-size:16px; font-family: Arial, Helvetica, sans-serif; ">Compare quotes from funeral directors, there is no obligation to choose.<br />
              <br />
              <br />
              <br />
            </p>
          </li>
        </ul>
      </div>
      <!-- end section -->
      <div class="one_third">
        <ul class="lirc_section">
          <li class="left"><img src="images/like_icon.png" width="40" height="40"></li>
          <li class="right">
            <p style="color:#FFFFFF;font-family: 'Helvetica Medium 65', Arial; font-size:20px;">Make informed choices</p>
          </li>
          <br/>
          <br/>
          <li class="right">
            <p style="color:#999999;font-size:16px; font-family: Arial, Helvetica, sans-serif; ">We empower you to understand your funeral rights and help you make informed funeral choices.</p>
          </li>
        </ul>
      </div>
      <!-- end section -->
    </div>
    <div class="one_third">
      <ul class="lirc_section">
        <li class="left"><img src="images/safe_icon.png" width="40" height="40"></li>
        <li class="right">
          <p style="color:#FFFFFF;font-family: 'Helvetica Medium 65', Arial; font-size:20px;">We respect your privacy</p>
        </li>
        <br/>
        <br/>
        <li class="right">
          <p style="color:#999999;font-size:16px; font-family: Arial, Helvetica, sans-serif; ">Your contact details are only provided to approved funeral directors you have invited to quote.</p>
        </li>
      </ul>
    </div>
    <!-- end section -->
    <div class="one_third last">
      <ul class="lirc_section">
        <li class="left"><img src="images/shield_icon.png" width="40" height="40"></li>
        <li class="right">
          <p style="color:#FFFFFF;font-family: 'Helvetica Medium 65', Arial; font-size:20px;">Transparent Pricing</p>
        </li>
        <br/>
        <br/>
        <li class="right">
          <p style="color:#999999;font-size:16px; font-family: Arial, Helvetica, sans-serif; ">Get itemised funeral quotes. No pressure sales.No hidden fees.No packages.<br />
            <br />
            <br />
            <br />
          </p>
        </li>
      </ul>
    </div>
    <!-- end section -->
  </div>
</div>
</div>
<!-- end site features 03 -->
<div class="punch_text_02">
  <div class="container homecontainer">
    <div class="one_full" style="text-align:center;"> <font class="punch_doit">Do it yourself and start organising your funeral today ? </font> <a href="page/how-it-works" class="readmore_but_03 readmore_but_04">Learn More</a></div>
  </div>
</div>
<div class="grey_bg">
  <div class="sitefeatures_03">
    <div class="clearfix mar_top5"></div>
    <div class="container homecontainer">
      <div class="one_half2">
        <div class="embed-responsive embed-responsive-16by9" style="margin-bottom:50px;">
          <embed width="450" height="300" src="http://www.youtube.com/embed/AEVVf30zlfo" frameborder="0" allowfullscreen>
        </div>
      </div>
      <div class="video_text">
        <h2 style="font-family: 'Helvetica Medium 65', Arial;"class="heading">Plan your funeral today and celebrate a life lived</h2>
        <p style="font-family:Arial, Helvetica, sans-serif; font-size:15px;">eziFunerals understands the challenges of planning a meaningful funeral and has developed Australia s first Funeral Planning Service that supports and guides you through the funeral planning process.</p>
      </div>
    </div>
  </div>
</div>
<div class="container homecontainer" style="background:#FFFFFF">
  <div class="mar_top5"></div>
  <div class="one_full">
    <div align="center" class="testimonial_heading">
      <h2 style="font-family: 'Helvetica Medium 65', Arial;" class="heading">Peace of mind when we need it most<br />
      </h2>
    </div>
    <div class="one_full">
      <div class="one_half">
        <ul class="lirc_section">
          <li class="left"><img src="images/testi1.png" style="width:125px; height:125px;" class="testimage1"></li>
          <li class="tright">
            <p class="people1">In my role as Celebrant, I find that the additional stress on families of arranging the funeral of their loved one can be emotionally overwhelming and may all feel just too hard. eziFunerals made it all much easier. Thank you eziFunerals for having the vision.<br />
              <br>
              J.Rees, Celebrant</p>
          </li>
        </ul>
      </div>
      <!-- end section -->
      <div class="one_half last">
        <ul class="lirc_section">
          <li class="left"><img src="images/testi2.png" style="width:125px; height:125px;" class="testimage1"></li>
          <li class="tright">
            <p class="people2">eziFunerals has enabled me to put in place a plan for my funeral, that encompasses how I would like it to be. This has given me piece of mind knowing that a huge burden will be taken away from my family, by having my personalised funeral plan in place.<br/>
              <br>
              Lynsey, Singleton</p>
            <br />
          </li>
        </ul>
      </div>
      <!-- end section -->
      <br />
    </div>
  </div>
</div>
<!-- end site features -->
<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;"> <a href="page/how-it-works"><img src="images/footer_AD.png" width="620" class="center_img"></a> </div>
<!-- Footer
======================================= -->
<?php include 'include/main_footer.php'; ?>
</html>
