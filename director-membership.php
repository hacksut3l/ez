<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->



<?php include './include/main_header.php'; ?>


<style>
  
a.tooltip {outline:none; }
a.tooltip strong {line-height:20px;}
a.tooltip:hover {text-decoration:none;} 
a.tooltip span {
    z-index:10;display:none; padding:14px 20px;
    margin-top:-30px; margin-left:5px;
    width:230px; line-height:16px;
}
a.tooltip:hover span{
    display:inline; position:absolute; color:#111;
    border:1px solid #DCA; background:#fffAF0;}
.callout {z-index:20;position:absolute;top:30px;border:0;left:-12px;}
    
/*CSS3 extras*/
a.tooltip span
{
    border-radius:15px;
    box-shadow: 5px 5px 8px #CCC;
}      
     
ul.tabs{
			margin: 491px 473px 473px 232px;
padding: 0px;
list-style: none;
position: absolute;
		}
		ul.tabs li{
			background: none;
			color: #222;
			display: inline-block;
			padding: 10px 15px;
			cursor: pointer;
		}

		ul.tabs li.current{
			background: #ededed;
			color: #222;
		}

		.tab-content{
			display: none;
			background: #ededed;
			
		}

		.tab-content.current{
			display: inherit;
			
		}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

$(document).ready(function(){
	
		$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');
		$( "div.tab" ).scroll( 300 );

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
		
		
	})

})

</script>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>


<style>
.faqs_q{
background-color:#FFFFFF;
cursor:pointer;
}

</style>
<style>
#faqs_anso {
color:#FFFFFF;
font-size:16px;
font-style:italic;
}

</style>
<script type="text/javascript">

 $(document).ready(function() {
        $('#showmenu1').click(function() {
               $('.Lmenu1').slideToggle("fast");
                $('.Lmenu2').hide(); $('.Lmenu3').hide(); $('.Lmenu4').hide(); $('.Lmenu5').hide();
				$('.Lmenu6').hide(); $('.Lmenu7').hide(); $('.Lmenu8').hide(); $('.Lmenu9').hide();$('.Lmenu10').hide();
				
                $(this).css('background-color', '#00a3b4');
				
                $('.Lmenu1').css('display', 'block');
                $('#showmenu2').css('background-color', '#FFFFFF');$('#showmenu3').css('background-color', '#FFFFFF');$('#showmenu4').css('background-color', '#FFFFFF');
                $('#showmenu5').css('background-color', '#FFFFFF');
        });
        
         $('#showmenu2').click(function() {
                $('.Lmenu2').slideToggle("fast");
                $('.Lmenu1').hide(); $('.Lmenu3').hide(); $('.Lmenu4').hide(); $('.Lmenu5').hide();
				$('.Lmenu6').hide(); $('.Lmenu7').hide(); $('.Lmenu8').hide(); $('.Lmenu9').hide();$('.Lmenu10').hide();
				
                $(this).css('background-color', '#00a3b4');
				
                $('.Lmenu2').css('display', 'block');
                $('#showmenu1').css('background-color', '#FFFFFF');$('#showmenu3').css('background-color', '#FFFFFF');$('#showmenu4').css('background-color', '#FFFFFF');
                $('#showmenu5').css('background-color', '#FFFFFF');
        });
  
   $('#showmenu3').click(function() {
               $('.Lmenu3').slideToggle("fast");
                $('.Lmenu1').hide(); $('.Lmenu2').hide(); $('.Lmenu4').hide(); $('.Lmenu5').hide();
				$('.Lmenu6').hide(); $('.Lmenu7').hide(); $('.Lmenu8').hide(); $('.Lmenu9').hide();$('.Lmenu10').hide();
				
                $(this).css('background-color', '#00a3b4');
				
                $('.Lmenu3').css('display', 'block');
                $('#showmenu1').css('background-color', '#FFFFFF');$('#showmenu2').css('background-color', '#FFFFFF');$('#showmenu4').css('background-color', '#FFFFFF');
                $('#showmenu5').css('background-color', '#FFFFFF');

        });
  
   $('#showmenu4').click(function() {
                $('.Lmenu4').slideToggle("fast");
                $('.Lmenu1').hide(); $('.Lmenu3').hide(); $('.Lmenu2').hide(); $('.Lmenu5').hide();
				$('.Lmenu6').hide(); $('.Lmenu7').hide(); $('.Lmenu8').hide(); $('.Lmenu9').hide();$('.Lmenu10').hide();
				
                $(this).css('background-color', '#00a3b4');
				
                $('.Lmenu4').css('display', 'block');
                $('#showmenu1').css('background-color', '#FFFFFF');$('#showmenu3').css('background-color', '#FFFFFF');$('#showmenu2').css('background-color', '#FFFFFF');
                $('#showmenu5').css('background-color', '#FFFFFF');
        });
  
   $('#showmenu5').click(function() {
                $('.Lmenu5').slideToggle("fast");
                $('.Lmenu1').hide(); $('.Lmenu3').hide(); $('.Lmenu4').hide(); $('.Lmenu2').hide();
				$('.Lmenu6').hide(); $('.Lmenu7').hide(); $('.Lmenu8').hide(); $('.Lmenu9').hide();$('.Lmenu10').hide();
				
                $(this).css('background-color', '#00a3b4');
				
                $('.Lmenu5').css('display', 'block');
                $('#showmenu1').css('background-color', '#FFFFFF');$('#showmenu3').css('background-color', '#FFFFFF');$('#showmenu4').css('background-color', '#FFFFFF');
                $('#showmenu2').css('background-color', '#FFFFFF');
        });
		
		
		
	 $('#showmenu6').click(function() {
      			$('.Lmenu6').slideToggle("fast");
                $('.Lmenu1').hide(); $('.Lmenu3').hide(); $('.Lmenu4').hide(); $('.Lmenu5').hide();
				$('.Lmenu2').hide(); $('.Lmenu7').hide(); $('.Lmenu8').hide(); $('.Lmenu9').hide();$('.Lmenu10').hide();
				
                $(this).css('background-color', '#00a3b4');
				
                $('.Lmenu6').css('display', 'block');
                $('#showmenu7').css('background-color', '#FFFFFF');$('#showmenu8').css('background-color', '#FFFFFF');$('#showmenu9').css('background-color', '#FFFFFF');
                $('#showmenu10').css('background-color', '#FFFFFF');
        });
		
		
		 $('#showmenu7').click(function() {
     			 $('.Lmenu7').slideToggle("fast");
                $('.Lmenu1').hide(); $('.Lmenu3').hide(); $('.Lmenu4').hide(); $('.Lmenu5').hide();
				$('.Lmenu2').hide(); $('.Lmenu6').hide(); $('.Lmenu8').hide(); $('.Lmenu9').hide();$('.Lmenu10').hide();
				
                $(this).css('background-color', '#00a3b4');
				
                $('.Lmenu7').css('display', 'block');
                $('#showmenu6').css('background-color', '#FFFFFF');$('#showmenu8').css('background-color', '#FFFFFF');$('#showmenu9').css('background-color', '#FFFFFF');
                $('#showmenu10').css('background-color', '#FFFFFF');
        });
		
		
		 $('#showmenu8').click(function() {
      			$('.Lmenu8').slideToggle("fast");
                $('.Lmenu1').hide(); $('.Lmenu3').hide(); $('.Lmenu4').hide(); $('.Lmenu5').hide();
				$('.Lmenu2').hide(); $('.Lmenu7').hide(); $('.Lmenu6').hide(); $('.Lmenu9').hide();$('.Lmenu10').hide();
				
                $(this).css('background-color', '#00a3b4');
				
                $('.Lmenu8').css('display', 'block');
                $('#showmenu7').css('background-color', '#FFFFFF');$('#showmenu6').css('background-color', '#FFFFFF');$('#showmenu9').css('background-color', '#FFFFFF');
                $('#showmenu10').css('background-color', '#FFFFFF');
        });
		
		
		 $('#showmenu9').click(function() {
                $('.Lmenu9').slideToggle("fast");
                $('.Lmenu1').hide(); $('.Lmenu3').hide(); $('.Lmenu4').hide(); $('.Lmenu5').hide();
				$('.Lmenu2').hide(); $('.Lmenu7').hide(); $('.Lmenu8').hide(); $('.Lmenu6').hide();$('.Lmenu10').hide();
				
                $(this).css('background-color', '#00a3b4');
				
                $('.Lmenu9').css('display', 'block');
                $('#showmenu7').css('background-color', '#FFFFFF');$('#showmenu8').css('background-color', '#FFFFFF');$('#showmenu6').css('background-color', '#FFFFFF');
                $('#showmenu10').css('background-color', '#FFFFFF');
        });
		
		
		 $('#showmenu10').click(function() {
   				 $('.Lmenu10').slideToggle("fast");
                $('.Lmenu1').hide(); $('.Lmenu3').hide(); $('.Lmenu4').hide(); $('.Lmenu5').hide();
				$('.Lmenu2').hide(); $('.Lmenu7').hide(); $('.Lmenu8').hide(); $('.Lmenu9').hide();$('.Lmenu6').hide();
				
                $(this).css('background-color', '#00a3b4');
				
                $('.Lmenu10').css('display', 'block');
                $('#showmenu7').css('background-color', '#FFFFFF');$('#showmenu8').css('background-color', '#FFFFFF');$('#showmenu9').css('background-color', '#FFFFFF');
                $('#showmenu6').css('background-color', '#FFFFFF');
        });	
		
		
		
		
		
		
    });
 
</script>
<!--<div class="punch_text_02 main_heading_contain">
    <div class="container">
	<br><br>
	<div align="left">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;">Select Your Plan</font>
    </div>
	</div>
</div>-->
 <div class="container">
	<br><br>
	<br><br><br><br><br><br>
	</div>

<div class="container_full">
    
	<div class="slider_static_image_directors_mem">
    
    	<div class="container">
        
            <div class="static_full_img">
           
        </div>
    </div>
	
   </div>     
</div><!-- end slider -->




<div class="clearfix"></div>

<!--<div class="container" style="background:#FFFFFF">-->
  <!--<div class="mar_top5"></div>-->
 <!-- <div class="content_fullwidth">
    
    </br>
    </br>
  </div>
 <div class="two_third works_contents">
    <ul class="lirc_section">
      <li class="left"><img src="images/11.png" width="75" height="85"></li>
      <li class="">
        <p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;"> <font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Create your profile</font><br />
          <font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#727272">Build your profile in minutes, adding services, experience and more.</font></p>
        <br />
      </li>
    </ul>
    <ul class="lirc_section">
      <li class="left"><img src="images/22.png"></li>
      <li class="">
        <p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;"> <font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Promote your business</font><br />
          <font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#727272">We are dedicated to finding the right business solutions that specifically target the needs of the new funeral consumer and your business.</font></p>
        <br />
      </li>
    </ul>
    <ul class="lirc_section">
      <li class="left"><img src="images/33.png"></li>
      <li class="">
        <p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;"> <font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Connect with new customers</font><br />
          <font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#727272">Our clients are likely to be new customers because those people who are already committed to your business are likely to use your services direct.</font></p>
        <br />
      </li>
    </ul>
    <ul class="lirc_section">
      <li class="left"><img src="images/44.png"></li>
      <li class="">
        <p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;"> <font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Receive custom quotes</font><br />
          <font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#727272">Receive customised invitations from new customers to quote on your next funeral. We send you an automated email and SMS every time your business is selected by our clients.</font></p>
        <br />
      </li>
    </ul>
    <ul class="lirc_section">
      <li class="left"><img src="images/55.png"></li>
      <li class="">
        <p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;"> <font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Get reviews from satisfied customers</font><br />
          <font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#727272">Our clients share real-life experiences and opinions about funeral services and products Australia wide. You get to observe and respond to feedback, ratings and reviews of services you provide.</font></p>
        <br />
      </li>
    </ul>
    <ul class="lirc_section">
      <li class="left"><img src="images/66.png"></li>
      <li class="">
        <p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;"> <font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Increase your market share</font><br />
          We help you increase your sales by establishing new business connections with our clients  and business partners.</p>
        <br />
      </li>
    </ul>
  </div>
  <!-- end section -->
 <!-- <div class="one_third last"> <img src="images/ipad-icon.png" class="tablet_img"><br />
    <br />
    <br />
    <br />
  </div>-->
  <!-- progress bars section -->
<!--</div>-->
	
<div class="content_fullwidth" style="background:#ededed">
<div class="container" style="width:900px;">
		
		
		<center><font style="font-size:28px; font-family:Arial, Helvetica, sans-serif;" class="box_title">PLANS AND PRICING</font>
</center>
<br/>
<center>
  <p style="font-family:'Helvetica Medium 65', Arial; font-size:14px; font-weight:normal" class="box_text">eziFunerals has three membership options which are advertised in our website: Basic, Standard and Premium. It is our way of customising your investment and offering you extra visibility to the customers your business needs.</p>
</center>

			
			 <div class="pricing-tables-main">
          
            <div class="mar_top3"></div>
            <div class="clearfix"></div>
            
            <div class="pricing-tables-two director_box1" style="background:#008c9b !important;">
            	<div class="title director_title" style="background:#ef8b2f">BASIC</div>
				<p align="center" style="color:#008c9b;line-height:3;"><br />t</p>
              <div class="price" style="background:#008c9b; height:45px;"><br />$ 99 <i> per lead</i></div>
 <div class="title box3_title3 director_title" style="background:#008c9b; line-height:5px; height:96px;">No monthly fee</div>
				<div class="ordernow" style="background:#008c9b"><a href="free-membership-registration.php" class="get_started">Get Started</a></div>
                <div class="cont-list" style="background:#e9e9e9 !important; border:0.5px solid #CCCCCC; height:180px;">
					<ul>
					<li style="font-size:15px;color:#5F5F5F;"><b>Features</b></li>

<a class="tooltip" style="color:#5F5F5F;" >
<li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="./images/bullet.png" height="11px;"/ >&nbsp;Be Found For Free<span> <strong>increase the chance of your funeral home being found where people are looking for funerals</strong> </span> </li>
</a>

<a class="tooltip" style="color:#5F5F5F;" >
<li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="./images/bullet.png" height="11px;"/ >&nbsp;Connect With New Customers<span> <strong>Make it easy for customers who are searching online for funeral directors to connect with your company</strong> </span> </li>
</a>


<a class="tooltip" style="color:#5F5F5F;" >
<li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="./images/bullet.png" height="11px;"/ >&nbsp;Build Your Listing<span> <strong>Start with EZIFUNERALS BASIC, then easily upgrade your funeral home listing to help you help more families</strong> </span> </li>
</a>
			</div>
              
            </div><!-- end section -->

               
            <div class="pricing-tables-two director_box2" style="background:#00a3b4;margin-left:3px;">
            	<div class="title director_title" style="background:#E97000">STANDARD</div>
                <p align="center" style="padding-top:20px;line-height:3;color:#00a3b4"><br />r</p>
               <div class="price" style="background:#00a3b4"><br />
    $49 <i>per lead</i></div>
  <div class="title box3_title3 director_title" style="background:#00a3b4; line-height:5px; height:96px;">$79 monthly fee</div><br/><br/><br/>
			
				<div class="ordernow" style="background:#00a3b4;" ><a href="standard-membership-registration.php" class="get_started">Get Started</a></div>
               <div class="cont-list" style="background:#e9e9e9 !important; border:0.5px; solid #CCCCCC;">
    <ul>
       <li style="font-size:15px; color:#5F5F5F;" ><b>More Features</b></li>
      <a >
      <li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="./images/bullet.png" height="11px;"/ >&nbsp;All features in basic plus </li>
      </a> <a class="tooltip" style="color:#5F5F5F;">
      <li style="text-align:left; margin-left:20px; color:#5F5F5F;" ><img src="./images/bullet.png" height="11px;"/>&nbsp;Establish your Online Profile <span> <strong>Descriptive "About Us" section plus photo and video gallery</strong> </span> </li>
      </a> <a  class="tooltip" style="color:#5F5F5F;">
      <li style="text-align:left; margin-left:20px; color:#5F5F5F;" ><img src="./images/bullet.png" height="11px;"/>&nbsp;Build Brand Visibility <span> <strong>Priority search results above Free members</strong> </span> </li>
      </a> <a  class="tooltip" style="color:#5F5F5F;">
      <li style="text-align:left; margin-left:20px; color:#5F5F5F;" ><img src="./images/bullet.png" height="11px;"/>&nbsp;Lead Generation Tools <span> <strong>Exclusive leads from customers inviting you to quote on their funeral</strong> </span> </li>
      </a> <a  class="tooltip" style="color:#5F5F5F;">
      <li style="text-align:left; margin-left:20px; color:#5F5F5F;" ><img src="./images/bullet.png" height="11px;"/>&nbsp;Get Ratings and Reviews <span> <strong>Connect with customers direct using ratings and reviews features</strong> </span> </li>
      </a>
    </ul>
  </div>
             
            </div><!-- end section -->
            
            
            <div class="pricing-tables-two director_box3" style="background:#008c9b !important; height:185px; margin-left:3px;">
            	<div class="title director_title" style="background:#ef8b2f">PREMIUM</div>
				<p align="center" style="color:#008c9b;">s</p>
					 <div class="price" style="background:#008c9b;"><br />
    <br/>
    $29 <i>per lead</i></div>
	<div class="title box3_title3" style="background:#008c9b; line-height:0px; height:10px;">$99* monthly fee</div>
  <div class="title director_title box3_title3" style="color:#ffffff;background:#008c9b; height:58px;line-height:5px; font-size:18px">*plus additional locations</div>
				<div class="ordernow" style="background:#008c9b"><a href="premium-membership-registration.php" class="get_started">Get Started</a></div>
             <div class="cont-list" style="background:#e9e9e9 !important; border:0.5px; solid #CCCCCC;">
  <ul>
    <li style="font-size:15px; color:#5F5F5F;" ><b>More Features</b></li>
      <a>
      <li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="./images/bullet.png" height="11px;"/ >&nbsp;All features in standard plus</li>
      </a> <a  class="tooltip" style="color:#5F5F5F;">
      <li style="text-align:left; margin-left:20px; color:#5F5F5F;" ><img src="./images/bullet.png" height="11px;"/>&nbsp;Guaranteed Priority Position <span> <strong>Your business is guaranteed a priority position above all other member listings</strong> </span> </li>
      </a> <a class="tooltip" style="color:#5F5F5F;">
      <li style="text-align:left; margin-left:20px; color:#5F5F5F;" ><img src="./images/bullet.png" height="11px;"/>&nbsp;Exclusive Advertising Features <span> <strong>Exclusive advertising in the "Featured Funeral Directors" section of Find a Funeral Director search page.</strong> </span> </li>
      </a> <a class="tooltip" style="color:#5F5F5F;">
      <li style="text-align:left; margin-left:20px; color:#5F5F5F;" ><img src="./images/bullet.png" height="11px;"/>&nbsp;Promote Special Offers <span> <strong>Promote special offers as an incentive for customers to contact your business</strong> </span> </li>
      </a> <a  class="tooltip" style="color:#5F5F5F;">
      <li style="text-align:left; margin-left:20px; color:#5F5F5F;" ><img src="./images/bullet.png" height="11px;"/>&nbsp;Showcase multiple listings <span> <strong>Display multiple locations of your business for all the suburbs you service</strong> </span> </li>
      </a>
  </ul>
</div>

            </div><!-- end section -->

 
           </div><!-- end pricing tables with 3 columns -->
		  
		  </div>
		</div>	        
</div>


<div class="colored_bg question_bg" style="background:url(./images/blackbanner.png); height:525px;">
  <div class="container">
    <div class="clearfix mar_top5"></div>
    <div align="center"><font style="color:#FFFFFF; font-family: 'Helvetica Medium 65', Arial; font-size:22px;">FAQ'S</font><br/><br/> <a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank" class="readmore_but_03">View More FAQs</a><br />
      <br />
      <br />
    </div>
    <div class="one_full">
      <div id="showmenu6"  class="one_fifth faqs_q" style="height:auto">
        <ul class="lirc_section">
          <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br />
            <br />
            How can EziFunerals grow my business?<br />
            <br />
            <br />
            <br />
          </h3>
        </ul>
      </div>
      <!-- end section -->
      <div id="showmenu7"  class="one_fifth faqs_q" >
        <ul class="lirc_section">
          <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br />
            <br />
            Who is EziFunerals target market?<br />
            <br />
            <br />
            <br />
          </h3>
        </ul>
      </div>
      <!-- end section -->
      <div id="showmenu8" class="one_fifth faqs_q" >
        <ul class="lirc_section">
          <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br />
            <br />
            Do Clients get to review my service?<br />
            <br />
            <br />
            <br />
          </h3>
        </ul>
      </div>
      <!-- end section -->
      <div id="showmenu9" class="one_fifth faqs_q">
        <ul class="lirc_section">
          <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br />
            <br />
            Is EziFunerals trying to replace the services of funeral directors?<br />
          </h3>
        </ul>
      </div>
      <!-- end section -->
      <div id="showmenu10" class="one_fifth last faqs_q" >
        <ul class="lirc_section">
          <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br />
            <br />
            Is EziFunerals affiliated with any other funeral company? </h3>
        </ul>
      </div>
	  
	
      <!-- end section -->
    </div>
    <div class="Lmenu6" id="faqs_anso" style="display:none"><br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      Our research has found that consumers now want independent and objective information and enjoy the convenience and privacy internet shopping offers. They prefer to seek direct funeral assistance at a later time when they are informed and ready to make decisions. EziFunerals will attract these customers to your business and will increase your sales by establishing new business connections with other organisations who will promote our website and thereby increase your brand visibility. </div>
    <div class="Lmenu7" id="faqs_anso" style="display:none"><br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      EziFunerals target market includes Families of Baby boomers;Aged care service providers;Employers and Life Insurance companies and ?Funeral businesses and services who want to increase their market share and improve their market visibility. </div>
    <div class="Lmenu8" id="faqs_anso" style="display:none"><br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      Yes. EziFunerals provides Australia's premier funeral forum for consumers to share real-life experiences and opinions about funeral services and products Australia wide. You get to observe and respond to feedback, ratings and reviews of services you provide. </div>
    <div class="Lmenu9" id="faqs_anso" style="display:none"><br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      No. EziFunerals is an independent consumer advocacy and funeral planning service that is intended to supplement the important service provided by funeral directors. We are an online service for people who prefer to plan their own funeral before meeting with a funeral director. </div>
    <div class="Lmenu10" id="faqs_anso" style="display:none"><br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      No. EziFunerals is not directly or indirectly associated with any funeral service providers, we do not sell funeral goods or services, nor do we profit from your decision-making. Our sole purpose is to provide the information clients need to make a well-informed decision. </div>
    <!-- <div class="one_full">
			<center><input type="button" name="view" value="VIEW MORE FAQs" class="readmore_but_03" /></center> 	
	</div> -->
  </div>
</div>
<!-- end site features 03 -->
<br />
<div class="punch_text_02 increase_all">
  <div class="container">
    <div class="one_full" style="width:94%;"> <font style="font-size:18px"> <font style="font-family: 'Helvetica Light Condensed 47',Arial; font-size:24px; font-weight:bold" class="increase_txt">Ready to help more families and grow your business?</font> 
	<a href="#" class="readmore_but_03 increase_btn readmore_but_04" style="margin-left:0px;">INCREASE MY SALES</a></font> </div>
  </div>
</div>

<!-- Footer
======================================= -->


<!----------------------------------------------------------------------Guide Mail popup------------------------------------------------------------------------------------->					
				
					
					<a href="#x" class="overlay" id="contact"></a>
					<div class="popup">
							<h1 class="login_head">Thank You</h1>	
				<div class="row">

						<div class="col-md-5">
							<p>Please check your mail, we have sent you a pdf for Guide</p>
				
						</div>

						<div class="col-md-5">
							
						</div>

				</div>

				<div class="row">
		
					<div class="col-md-5">
							<span style="float:left;"><br>
											 <a href="" class="login_button">Ok</a>
							</span>
						
						
					</div>

					
				</div>
					<a class="close" href="#close"></a>
				</div>
			
<!------------------------------------------------------------------Guide Mail popup------------------------------------------------------------------------------------->		


<!-- Request Information Pack
======================================= -->

<div class="grey_bg" align="" style="background:#f5f5f5; ">
	<div class="container container_find" >
        <center><div class="one_full director_info_all">
			<h2 style=" font-family: 'Helvetica Medium 65', Arial; font-size:22px;" >Request an Information Guide</h2>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:17px;">Let us know your email address and we will send you a copy of our guide on selecting the right funeral director.</p><br />
			<form name="" action="../requestguide.php" method="post">
			<input type="text" name="email" value="" placeholder="Email Address." style="height:40px; width:440px; border-radius:4px;" required class="datafieldofrequest">
			<input type="hidden" name="Redirecturl" value="<?php echo base_url.basename($_SERVER['SCRIPT_NAME']);?>"/>
			<input type="submit" name="Submit" value="Submit" class="new_button director_info_btn" style="border:none">
			</form><br />
		</div></center>
        
</div></div>



<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
        <div class="center"><a href="pages/HowItWorks.php"><img src="./images/footer_AD.png" width="620" class="top_ad_bottom"></a></div>
        
</div>


<!-- Footer
======================================= -->
<?php include './include/main_footer.php'; ?>
</html>