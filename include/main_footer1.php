<style>

a:hover{color:#919191 !important;}

</style>
<div class="footer">
	
    <div class="clearfix mar_top4"></div>
	
    <div class="container container_find">
    
   		<div class="one_fourth footer_resp">
            <h3 style="color:#00a3b4">eziFunerals</h3>
            <ul class="list">
                <li><a href="page/about-us" style="color:#7a7a7a; font-weight:bold !important">About Us</a></li>
                <li><a href="page/terms-of-use" style="color:#7a7a7a; font-weight:bold">Terms & Conditions</a></li>
               <li><a href="page/ratings-and-reviews" style="color:#7a7a7a; font-weight:bold">Ratings & Reviews</a></li>
                <li><a href="page/privacy-policy" style="color:#7a7a7a; font-weight:bold">Privacy</a></li>
                <li><a href="page/contact-us" style="color:#7a7a7a; font-weight:bold">Contact</a></li>
            </ul>
        </div>
        
        
        <div class="one_fourth footer_resp_1">
            <h3 style="color:#00a3b4">How it Works</h3>
             <ul class="list">
                <li><a href="page/how-it-works" style="color:#7a7a7a; font-weight:bold">Funeral Clients</a></li>
                <li><a href="page/how-it-works?type=director" style="color:#7a7a7a; font-weight:bold">Funeral Directors</a></li>
				 <li><a href="page/charitable-organisations" style="color:#7a7a7a; font-weight:bold">Charitable Donations</a></li>
				 <!--<li><a href="pages/funeral_guide.php" style="color:#7a7a7a; font-weight:bold">Funeral Guide</a></li>-->
                <li><a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank" style="color:#7a7a7a; font-weight:bold">Get Help</a></li>
            </ul>
        </div>
        
        
       <div class="one_fourth footer_resp_2">
            <h3 style="color:#00a3b4">Partner With Us</h3>
             <ul class="list">
               	<li><a href="page/funeral-directors" style="color:#7a7a7a; font-weight:bold">Funeral Homes</a></li>
                <li><a href="page/insurance-companies" style="color:#7a7a7a; font-weight:bold">Insurance</a></li>
                <li><a href="page/aged-care" style="color:#7a7a7a; font-weight:bold">Aged Care</a></li>
                <li><a href="page/employers" style="color:#7a7a7a; font-weight:bold">Employers</a></li>
				<!--<li><a href="pages/charitable_organisations.php" style="color:#7a7a7a; font-weight:bold">Charitable Organisations</a></li>-->
				<li><a href="page/advertisers" style="color:#7a7a7a; font-weight:bold">Advertisers</a></li>
            </ul>
        </div>
        
        
       <div class="one_fourth last footer_resp_3">
            <h3 style="color:#00a3b4">Social Media</h3>
            <a href="https://www.facebook.com/Ezifunerals" target="_blank"><img src="images/fb.png"></a>&nbsp;&nbsp;
			<a href="https://plus.google.com/u/0/110003518227754597830/posts" target="_blank"><img src="images/googleplus.png"></a>&nbsp;&nbsp;
			<a href="https://twitter.com/ezifunerals" target="_blank"><img src="images/twitter.png"></a>&nbsp;&nbsp;
			<a href="https://www.linkedin.com/company/2862990?trk=prof-exp-company-name" target="_blank"><img src="images/linkedin.png"></a>&nbsp;&nbsp;
			<a href="http://www.youtube.com/user/EziFunerals" target="_blank"><img src="images/youtube.png"></a><br/><br/>
			<a href="index.php"><img src="images/logo.png" width="135px;"></a>
        </div>
        
        
    </div>
	
</div>


<div class="copyright_info">

    <div class="container">
    
        <div align="center">
        
            <b>&copy; Copyright 2015 eziFunerals. All Rights Reserved.</b>
            
        </div>
    
    </div>
    
</div><!-- end copyright info --> 
 
</div>

    
<!-- ######### JS FILES ######### -->
<!-- get jQuery from the google apis -->

<!-- main menu -->
<script type="text/javascript" src="js/mainmenu/ddsmoothmenu.js"></script>
<script type="text/javascript" src="js/mainmenu/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/mainmenu/selectnav.js"></script>

<!-- jquery jcarousel -->
<script type="text/javascript" src="js/jcarousel/jquery.jcarousel.min.js"></script>

<!-- REVOLUTION SLIDER -->
<script type="text/javascript" src="js/revolutionslider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="js/revolutionslider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<script type="text/javascript" src="js/mainmenu/scripts.js"></script>

<!-- top show hide plugin script-->
<script src="js/show-hide-plugin/showHide.js" type="text/javascript"></script>

<!-- scroll up -->
<script type="text/javascript">
    $(document).ready(function(){
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 500);
            return false;
        });
 
    });
</script>

<!-- jquery jcarousel -->
<script type="text/javascript">

	jQuery(document).ready(function() {
			jQuery('#mycarousel').jcarousel();
	});
	
	jQuery(document).ready(function() {
			jQuery('#mycarouseltwo').jcarousel();
	});
	
</script>

<!-- accordion -->
<script type="text/javascript" src="../js/accordion/custom.js"></script>

<!-- REVOLUTION SLIDER -->
<script type="text/javascript">

		var tpj=jQuery;
		tpj.noConflict();

		tpj(document).ready(function() {

		if (tpj.fn.cssOriginal!=undefined)
			tpj.fn.css = tpj.fn.cssOriginal;

			tpj('.fullwidthbanner').revolution(
				{
					delay:9000,
					startwidth:1000,
					startheight:500,

					onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

					thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
					thumbHeight:50,
					thumbAmount:3,

					hideThumbs:200,
					navigationType:"none",				// bullet, thumb, none
					navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

					navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


					navigationHAlign:"right",				// Vertical Align top,center,bottom
					navigationVAlign:"bottom",					// Horizontal Align left,center,right
					navigationHOffset:50,
					navigationVOffset:55,

					soloArrowLeftHalign:"left",
					soloArrowLeftValign:"center",
					soloArrowLeftHOffset:0,
					soloArrowLeftVOffset:0,

					soloArrowRightHalign:"right",
					soloArrowRightValign:"center",
					soloArrowRightHOffset:0,
					soloArrowRightVOffset:0,

					touchenabled:"on",						// Enable Swipe Function : on/off



					stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
					stopAfterLoops:0,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic



					fullWidth:"on",

					shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

				});


	});
	</script>
	<script>
    
$(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('header').addClass("sticky");
    }
    else{
        $('header').removeClass("sticky");
    }
});

</script>
</body>
