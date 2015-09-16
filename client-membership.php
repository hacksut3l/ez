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
<?php 
//
		//session_start();
		//$_SESSION['client']='dhaval';
		//session_destroy();

		//redirect user atneed page if session is set if not set it redirect to client registration page
		
		if(isset($_SESSION['client']) || isset($_SESSION['name']))
		{
				$advance_url='advance/my-personal-details.php';	
				$direct_url='atneed/person-making-arrangements.php';
				
		}			
		else
		{
				$advance_url='client-registeration.php?plan=3';	
				$direct_url='client-registeration.php?plan=2';
		}	   	
			  
			   
?>
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

<!--
<div class="container" style="background:#FFFFFF;">

<div class="two_third">
  <ul class="lirc_section">
    <li class="left"><img src="./images/1..png"></li>
    <li class="">
      <p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;"><font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Plan your funeral</font><br />
        <font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#727272">Our comprehensive online funeral planning service helps you plan a meaningful funeral from the comfort of your home. Without a funeral director present. You simply register as a client on our website, follow the steps and provide us with the information needed to prepare your personalised funeral plan.</font></p>
      <br />
    </li>
  </ul>
  <ul class="lirc_section">
    <li class="left"><img src="./images/2..png"></li>
    <li class="">
      <p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;"> <font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Post your plan online</font><br />
        <font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#727272">After you have prepared your funeral plan, post it online and invite funeral directors to provide you with a no obligation quote.</font></p>
      <br />
    </li>
  </ul>
  <ul class="lirc_section">
    <li class="left"><img src="./images/3..png"></li>
    <li class="">
      <p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;"> <font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Get quotes</font><br />
       <font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#727272">We will contact invited funeral directors on your behalf and notify them about your request. Invited funeral directors will review and respond to your request. Within hours, you will start receiving quotes from funeral directors.</font></p>
      <br />
    </li>
  </ul>
  <ul class="lirc_section">
    <li class="left"><img src="./images/4..png"></li>
    <li class="">
      <p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;"> <font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Compare prices</font><br />
        <font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#727272">Compare a range of quotes from our approved funeral directors, but if you dont like any of them, there is no obligation to select.</font></p>
      <br />
    </li>
  </ul>
  <ul class="lirc_section">
    <li class="left"><img src="./images/howitworks3.png"></li>
    <li class="">
      <p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;"> <font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Select the right funeral director</font><br />
       <font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#727272">When you are ready, you can select a funeral director that meets your individual needs. You are in total control and get to make contact and continue discussions offline. You can shortlist as many or as few funeral directors as you see fit.</font></p>
      <br />
    </li>
  </ul>
</div>
<!-- end section -->
<!--<div class="one_third last"> <img src="./images/ipad-icon.png"><br />
  <br />
  <br />
  <br />
</div>
</div>-->
   
 <!--------------------------------------------------------------------Basic More Info popup------------------------------------------------------------------------------------->					
				
					
					<a href="#x" class="overlay" id="more1"></a>
					<div class="popup">
							<h1 class="login_head">EZIFUNERALS BASIC</h1>	
				<div class="row">

						<div class="col-md-5">
							<p>eziFunerals Basic is appropriate for those clients who DO NOT require specific<br/> support and assistance in planning a funeral and comparing funeral costs.<br/>Accurate funeral prices and comparisons are also not available with this option.</p>
				
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
			
<!---------------------------------------------------------------- End Basic More Info popup------------------------------------------------------------------------------------->		


   
 <!--------------------------------------------------------------------Direct More Info popup------------------------------------------------------------------------------------->					
				
					
					<a href="#x" class="overlay" id="more2"></a>
					<div class="popup">
							<h1 class="login_head">EZIFUNERALS DIRECT</h1>	
				<div class="row">

						<div class="col-md-5">
							<p>eziFunerals Direct is appropriate for those clients who require specific support<br/> and assistance in organising a funeral after someone has <br/>passed away or the loss of a family member is anticipated soon.<br/> You can use this option to sit down with your family to discuss and plan<br/> the funeral arrangements before selecting and meeting a funeral director. <br/>If you are uncomfortable with searching for a funeral director, don't <br/>know who to trust, want to save money or simply wish to avoid a sales focused<br/> environment, then this option would be suitable for you.</p>
				
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
			
<!--------------------------------------------------------------------End Direct More Info popup-------------------------------------------------------------------------------->		


   
 <!--------------------------------------------------------------------Advance More Info popup----------------------------------------------------------------------------------->					
				
					
					<a href="#x" class="overlay" id="more3"></a>
					<div class="popup">
							<h1 class="login_head">EZIFUNERALS ADVANCE</h1>	
				<div class="row">

						<div class="col-md-5">
							<p>eziFunerals Basic is appropriate for those clients who DO NOT require specific<br/> support and assistance in planning a funeral and comparing funeral costs.<br/>Accurate funeral prices and comparisons are also not available with this option.</p>
				
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
			
<!--------------------------------------------------------------------End Advance More Info popup-------------------------------------------------------------------------------->


<div class="content_fullwidth" style="background:#ededed">
<div class="container" style="width:900px;">
		
		 <center>
    <font style="font-size:28px; font-family:Arial, Helvetica, sans-serif;" class="box_title">PLANS AND PRICING</font>
  </center>
  <br />
  <center>
    <p style="font-family:'Helvetica Medium 65', Arial; font-size:14px; font-weight:normal" class="box_text">eziFunerals has three funeral planning options which are advertised in our website: Basic, Direct and Advance. It is our way of helping you save you time and money as well as reducing the stress your family and friends face at a time of intense grief.</p>
  </center>
			
			 <div class="pricing-tables-main">
          
            <div class="mar_top3"></div>
            <div class="clearfix"></div>
            
            <div class="pricing-tables-two dash_plan_box1" style="background:#008c9b !important;">
            	<div class="title dash_box1_title" style="background:#ef8b2f">EZIFUNERAL BASIC</div>
				<p align="center" style="padding-top:20px;line-height:3;"><br /><a  id="login_pop" style="color:#FFFFFF !important;" href="#more1">More Information</a></p>
                <div class="price" style="background:#008c9b; height:168px;"><br />FREE</i></div>
				<div class="ordernow" style="background:#008c9b"><a href="client-registeration.php?plan=1" class="get_started">Get Started</a></div>
                <div class="cont-list" style="background:#e9e9e9 !important; border:0.5px solid #CCCCCC; height:225px; ">
        <ul style="">
          <li style="font-size:15px; color:#5F5F5F;"><b>Features</b></li>
          
          <li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/>&nbsp;Connect with funeral directors in your area</li>
		   <li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/>&nbsp;Get Basic Quotes</li>
        	<li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/>&nbsp; Select the right funeral director</li>
        </ul>
      </div>
              
            </div><!-- end section -->


            <div class="pricing-tables-two dash_plan_box2" style="background:#00a3b4; margin-left:3px;">
            	<div class="title dash_box1_title" style="background:#ef8b2f">EZIFUNERALS DIRECT</div>
                <p align="center" style="padding-top:20px;line-height:3;"><br /><a  id="login_pop" style="color:#FFFFFF !important;" href="#more2">More Information</a></p>
                <div class="price" style="background:#00a3b4"><br />$59</div>
				<div class="title" style="background:#00a3b4"><br />SPECIAL OFFERS</div>
				<p align="center" style="padding-top:20px;line-height:5;">Receive a BONUS step by step guide to funerals</p>
				<div class="ordernow" style="background:#00a3b4"><a href="<?php echo $direct_url; ?>" class="get_started">Get Started</a></div>
                <div class="cont-list" style="background:#e9e9e9 !important; border:0.5px; solid #CCCCCC;height:225px;">
					<ul>
					  <li style="font-size:15px; color:#5F5F5F;"><b>Features</b></li>
					  
					  <li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/ >&nbsp;Plan the funeral for the one you love</li>
					  
					  <li style="text-align:left; margin-left:20px; color:#5F5F5F;" ><img src="images/bullet.png" height="11px;"/>&nbsp;Connect with funeral directors in your area</li>
					  
					  <li style="text-align:left; margin-left:20px; color:#5F5F5F;" ><img src="images/bullet.png" height="11px;"/>&nbsp;Post your funeral plan online</li>
					 
					  <li style="text-align:left ;  margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/>&nbsp;Get comprehensive quotes</li>
					 
					  <li style="text-align:left;  margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/>&nbsp;Compare fees and charges
</li>
					  
					  <li style="text-align:left;  margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/>&nbsp;Select the right funeral director</li>
					 
					</ul>
      		</div>
             
            </div><!-- end section -->
            
            
            <div class="pricing-tables-two dash_plan_box5" style="background:#008c9b !important; height:185px;margin-left:3px;">
            	<div class="title dash_box1_title" style="background:#ef8b2f">EZIFUNERALS ADVANCE</div>
				<p align="center" style="padding-top:20px;line-height:3;"><br /><a  id="login_pop" style="color:#FFFFFF !important;" href="#more3">More Information</a></p>
                <div class="price" style="background:#008c9b;height:44px;"><br />$75 <i>per year</i></div>
				<div class="title" style="background:#008c9b"><br />SPECIAL OFFERS</div>
				<p align="center" style="padding-top:20px;line-height:5; background:#008c9b">Receive a BONUS step by step guide to funerals</p>
				<div class="ordernow" style="background:#008c9b"><!--<a href="<?php echo $advance_url; ?>" class="get_started">Get Started</a>--><div  style="font-size:25px; color:#FFFFFF">Coming Soon</div></div>
                <div class="cont-list" style="background:#e9e9e9 !important;border:0.5px solid #CCCCCC;height:225px;">
            <ul>
              <li style="font-size:15px; color:#5F5F5F;"><b>Features</b></li>
              <li  style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/>&nbsp;Plan your own funeral while you are alive</li>
              <li  style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/>&nbsp;Appoint a Funeral Guardian</li>
              <li  style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/>&nbsp;Record your life story</li>
              <li  style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/>&nbsp;Manage your affairs</li>
              <li  style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/>&nbsp;Record your advance health care wishes</li>
              <li  style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="images/bullet.png" height="11px;"/>&nbsp;Reduce the burden on family and friends</li>
            </ul>
          </div>
               
            </div><!-- end section -->

 
           </div><!-- end pricing tables with 3 columns -->
		  
		  </div>
		</div>	        

 
           </div><!-- end pricing tables with 3 columns -->
 </div>
</div>	
</div>

<div class="colored_bg how_FAQ_bg" style="background:url(images/blackbanner.png); height:500px;">
  <div class="container">
    <div class="clearfix mar_top5"></div>
    <div align="center"><font style="color:#FFFFFF; font-family: 'Helvetica Medium 65', Arial; font-size:22px;">FAQ'S</font><br/><br/><a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank" class="readmore_but_03">View More FAQs</a><br />
      <br />
      <br />
    </div>
    <div class="one_full">
      <div id="showmenu1"  class="one_fifth faqs_q" style="height:auto">
        <ul class="lirc_section">
          <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br />
            <br />
            Why plan the Funeral yourself?<br />
          </h3>
        </ul>
      </div>
      <!-- end section -->
      <div id="showmenu2"  class="one_fifth faqs_q" >
        <ul class="lirc_section">
          <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br />
            <br />
            What does a funeral cost??</h3>
        </ul>
      </div>
      <!-- end section -->
      <div id="showmenu3" class="one_fifth faqs_q" >
        <ul class="lirc_section">
          <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br />
            <br />
            Why get quotes?<br />
            <br />
          </h3>
        </ul>
      </div>
      <!-- end section -->
      <div id="showmenu4" class="one_fifth faqs_q">
        <ul class="lirc_section">
          <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br />
            <br />
            How much money can I save?</h3>
        </ul>
      </div>
      <!-- end section -->
      <div id="showmenu5" class="one_fifth last faqs_q" >
        <ul class="lirc_section">
          <h3 style="color:#000000; padding:8px; font-size:18px; line-height:1.0">Q:<br />
            <br />
            Is EziFunerals affiliated with any other funeral company?</h3>
        </ul>
      </div>
	  
	 <div align="center" style="position:absolute; margin-top:22%; margin-left:27%">
	  	
	 </div>
	
      <!-- end section -->
    </div>
    <div class="Lmenu1" id="faqs_anso" style="display:none"><br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      Planning the funeral yourself can save you time and money as well as reducing the stress your family and friends face at a time of intense grief. It will allow you to discuss and plan the funeral arrangements with your family in private and avoid a sales focused environment before selecting a funeral director. </div>
    <div class="Lmenu2" id="faqs_anso" style="display:none" ><br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      The cost of a funeral in Australia can range from $4,000 to $15,000. This does not include the additional cost of a memorial and stonemason. </div>
    <div class="Lmenu3" id="faqs_anso" style="display:none" ><br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      Funeral costs charged by funeral companies can vary significantly. Most funeral directors don t provide an itemised quote for the cost of a funeral. So it pays to do your homework. Although, it may be emotionally difficult for you to shop around for funeral services, it makes sense that you should use the same techniques you use with any other major purchase.<br />
      <br />
      <br />
      <br />
    </div>
    <div class="Lmenu4" id="faqs_anso" style="display:none" ><br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      EziFunerals makes no guarantee regarding the amount of money the average family will save. However, we do guarantee that we can show you how to save money and stay within your budget by comparing prices charged by funeral directors. </div>
    <div class="Lmenu5" id="faqs_anso" style="display:none" ><br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      No. EziFunerals is not directly or indirectly associated with any funeral service providers, we do not sell funeral goods or services, nor do we profit from your decision-making. Our sole purpose is to provide the information you need to make a well-informed decision. </div>
    
	
<!--	 <div class="one_full">
			<center><input type="button" name="view" value="VIEW MORE FAQs" class="readmore_but_03" /></center> 	
	</div>-->
	
	
	
  </div>
  
</div>
<!-- end site features 03 -->

<br />
<div class="punch_text_02 all_getstart_box">
  <div class="container">
    <div class="one_full" style="width:96%;"> <font style="font-size:18px"> <font style="font-family: 'Helvetica Light Condensed 47',Arial; font-size:24px; font-weight:bold" class="get_start_txt">Ready to start organising your funeral online?</font> <a href="#" class="readmore_but_03 works_start_btn readmore_but_04" style="margin-left:0px;">GET STARTED</a> </font> </div>
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
        
</div>

</div>


<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
        <div class="center"><a href="pages/HowItWorks.php"><img src="images/footer_AD.png" width="620" class="top_ad_bottom"></a></div>
        
</div>




<!-- Footer
======================================= -->
<?php include './include/main_footer.php'; ?>
</html>