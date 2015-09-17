<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->



<?php include '../include/header.php'; ?>
  	
    
    
    <script src="../howitswork/js/jquery-1.9.1.min.js"></script>
    <script src='../howitswork/js/jquery.scrollto.js'></script>
	<script src="../popformessge/lib/sweet-alert.min.js"></script>
  <link rel="stylesheet" href="../popformessge/lib/sweet-alert.css">

<style>


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
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->

<!--<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
-->

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
	
<div class="punch_text_02">
    <div class="container">
	<br><br>
	<div align="center">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;">How it Works</font>
    </div>
	</div>
</div>
<script>

$(document).ready(function(){
	
		$('ul.tabs li').click(function(evn){
		var tab_id = $(this).attr('data-tab');
		
		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
		
		 evn.preventDefault();
            $('html,body').scrollTo(this.hash, this.hash); 
	});
	
        

})

</script>

		
		<div class="current">
			
<div class="container_full">
    
	<div class="slider_static_image_clients">
    
    	<div class="container">
        
            <div class="static_full_img">
           
        </div>
    </div>
	
   </div>     
</div><!-- end slider -->


<div class="clearfix"></div>

<div class="container" style="background:#FFFFFF">
<div class="mar_top5"></div>

	<div class="two_third">	

            <ul class="lirc_section">
                <li class="left"><img src="../images/howitworks1.png"></li>
                <li class=""><p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;">
				<font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Plan your funeral</font><br />
				<strong>Our comprehensive online funeral planning service helps you plan a meaningful funeral from the comfort of your home. Without a funeral director present. You simply register as a client on our website, follow the steps and provide us with the information needed to prepare your personalised funeral plan.
</strong></p><br />
				</li>
            </ul>
   			
			<ul class="lirc_section">
                <li class="left"><img src="../images/howitworks2.png"></li>
                <li class=""><p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;">
				<font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Post your plan online</font><br />
				<strong>After you have prepared your funeral plan, post it online and invite funeral directors to provide you with a no obligation quote.
</strong></p><br />
				</li>
            </ul>
			
			 <ul class="lirc_section">
                <li class="left"><img src="../images/howitworks3.png"></li>
                <li class=""><p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;">
				<font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Get quotes</font><br />
				<strong>We will contact invited funeral directors on your behalf and notify them about your request. Invited funeral directors will review and respond to your request. Within hours, you will start receiving quotes from funeral directors.
</strong></p><br />
				</li>
            </ul>
   			
			<ul class="lirc_section">
                <li class="left"><img src="../images/howitworks4.png"></li>
                <li class=""><p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;">
				<font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Compare prices</font><br />
				<strong>Compare a range of quotes from our approved funeral directors, but if you dont like any of them, there is no obligation to select.</strong></p><br />
				</li>
            </ul>
			
			<ul class="lirc_section">
                <li class="left"><img src="../images/howitworks4.png"></li>
                <li class=""><p style="color:#989898; padding-left:100px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;">
				<font style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Select the right funeral director</font><br />
				<strong>When you are ready, you can select a funeral director that meets your individual needs. You are in total control and get to make contact and continue discussions offline. You can shortlist as many or as few funeral directors as you see fit.
</strong></p><br />
				</li>
            </ul>
			
    </div><!-- end section -->
    


    <div class="one_third last">
		<img src="../images/ipad-icon.png"><br /><br />
		<br /><br />
	</div><!-- progress bars section -->
<div class="container" style="width:900px; background-color:#232827 !important;" >
	
        <div class="content_fullwidth" id="plan">
		
			<center><font style="font-size:28px; font-family:Arial, Helvetica, sans-serif;">What's the Cost</font></center><br />
			<center><p><strong>EziFunerals provides independent and trustworthy support for people who need to organise a funeral but don't know what<br/>
			to do or where to start.</strong></p></center>
			 
			 <div class="pricing-tables-main">
          
            <div class="mar_top3"></div>
            <div class="clearfix"></div>
            
            <div class="pricing-tables-two" style="background:#008c9b !important;">
            	
 <div class="title dash_box1_title" style="background:#ef8b2f">EZIFUNERALS BASIC</div>
         <p align="center" style="padding-top:20px;line-height:3;"><br /><a  id="login_pop" style="color:#FFFFFF !important;" href="#more1">More Information</a></p>
          <div class="price" style="background:#008c9b; height:168px;"><br />
            FREE</i></div>
          <div class="ordernow" style="background:#008c9b"><a href="../client-registeration.php?plan=1" class="get_started">Get Started</a></div>
          <div class="cont-list" style="background:#e9e9e9 !important; border:0.5px solid #CCCCCC; height:225px;">
            <ul style="">
              <li style="font-size:15px; color:#5F5F5F;"><b>Features</b></li>
           
              <li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/>&nbsp;Connect with funeral directors in your area</li>
             <li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/>&nbsp;Get Basic Quotes</li>
			  <li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/>&nbsp;Select the right funeral director</li>	
				
            </ul>
          </div>
        </div>
        <div class="pricing-tables-two dash_plan_box2" style="background:#008c9b !important; height:185px;margin-left:3px;">
          <div class="title dash_box1_title" style="background:#E97000">EZIFUNERALS DIRECT</div>

			<p align="center" style="padding-top:20px;line-height:3;background:#00a3b4;"><br /><a  id="login_pop" style="color:#FFFFFF !important;" href="#more2">More Information</a></p>
          <div class="price" style="background:#00a3b4"><br />
            $99</div>
          <div class="title dash_box1_title" style="background:#00a3b4"><br />
           <a href="<?php echo base_url;?>pages/funeral_guide.php" target="_blank" style="color:#FFFFFF !important"> SPECIAL OFFERS</a></div>
          <p align="center" style="padding-top:20px;line-height:5;background:#00a3b4">Receive a BONUS step by step guide to funerals</p>
          <div class="ordernow" style="background:#00a3b4"><a href="../client-registeration.php?plan=2" class="get_started">Get Started</a></div>
          <div class="cont-list" style="background:#e9e9e9 !important; border:0.5px; solid #CCCCCC;height:225px;">
            <ul>
              <li style="font-size:15px; color:#5F5F5F;"><b>Features</b></li>
              
              <li style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/ >&nbsp;Plan the funeral for the one you love</li>
             
              <li style="text-align:left; margin-left:20px; color:#5F5F5F;" ><img src="../images/bullet.png" height="11px;"/>&nbsp;Connect with funeral directors in your area</li>
            
              <li style="text-align:left; margin-left:20px; color:#5F5F5F;" ><img src="../images/bullet.png" height="11px;"/>&nbsp;Post your funeral plan online</li>
              
              <li style="text-align:left ;  margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/>&nbsp;Get comprehensive quotes</li>
           
              <li style="text-align:left;  margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/>&nbsp;Compare fees and charges</li>
              
              <li style="text-align:left;  margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/>&nbsp;Select the right funeral director</li>
              
            </ul>
          </div>
        </div>
        <div class="pricing-tables-two dash_plan_box4" style="background:#008c9b !important; height:185px;margin-left:3px;">
          <div class="title dash_box1_title" style="background:#ef8b2f">EZIFUNERALS ADVANCE</div>
         <p align="center" style="padding-top:20px;line-height:3;"><br /><a  id="login_pop" style="color:#FFFFFF !important;" href="#more3">More Information</a></p>
          <div class="price" style="background:#008c9b; height:50px;"><br />
            $75 <i>per year</i></div>
			 <div class="title dash_box1_title" style="background:#008c9b;"><br />
            SPECIAL OFFERS</div>
          <p align="center" style="padding-top:20px;line-height:5;background:#008c9b">Receive a BONUS step by step guide to funerals</p>
          <div class="ordernow" style="background:#008c9b"><!--<a href="../client-registeration.php?plan=3" class="get_started">Get Started</a>--><div  style="font-size:25px; color:#FFFFFF">Coming Soon</div></div>
          <div class="cont-list" style="background:#e9e9e9 !important;border:0.5px solid #CCCCCC;height:225px;">
            <ul>
              <li style="font-size:15px; color:#5F5F5F;"><b>Features</b></li>
              <li  style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/>&nbsp;Plan your own funeral while you are alive</li>
              <li  style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/>&nbsp;Appoint a Funeral Guardian</li>
              <li  style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/>&nbsp;Record your life story</li>
              <li  style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/>&nbsp;Manage your affairs</li>
              <li  style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/>&nbsp;Record your advance health care wishes</li>
              <li  style="text-align:left; margin-left:20px; color:#5F5F5F;"><img src="../images/bullet.png" height="11px;"/>&nbsp;Reduce the burden on family and friends</li>
            </ul>
          </div>
 
        </div>
      </div>
    </div>
  </div>



<div class="colored_bg" style="background:url(../images/blackbanner.png); height:425px;">
 
    <div class="container">
    
    <div class="clearfix mar_top5"></div>
     
  <div align="center">
  <font style="color:#FFFFFF; font-family: 'Helvetica Medium 65', Arial; font-size:22px;">FAQ'S</font><br /><br /><br />
  </div>
  
     <div class="one_full">
         
        <div id="showmenu1"  class="one_fifth faqs_q" style="height:auto">
            <ul class="lirc_section">
                <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br /><br />Why plan the Funeral yourself?<br /></h3>
            </ul>
        </div><!-- end section -->
        
    <div id="showmenu2"  class="one_fifth faqs_q" >
            <ul class="lirc_section">
                <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br /><br />What does a funeral cost??</h3>
            </ul>
        </div><!-- end section -->
  
        <div id="showmenu3" class="one_fifth faqs_q" >
            <ul class="lirc_section">
                <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br /><br />Why get quotes?<br /><br /></h3>
            </ul>
        </div><!-- end section -->
        
        <div id="showmenu4" class="one_fifth faqs_q">
            <ul class="lirc_section">
                <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br /><br />How much money can I save?</h3>
            </ul>
        </div><!-- end section -->

  <div id="showmenu5" class="one_fifth last faqs_q" >
            <ul class="lirc_section">
                <h3 style="color:#000000; padding:25px; font-size:18px; line-height:1.0">Q:<br /><br />How much money can I save?</h3>
            </ul>
   
        </div><!-- end section -->
        
   
    
        </div>
  <div class="Lmenu1" id="faqs_anso" style="display:none"><br /><br /><br /><br /><br /><br /><br /><br /><br />
  Planning the funeral yourself can save you time and money as well as reducing the stress your family and friends face at a time of intense grief. It will allow you to discuss and plan the funeral arrangements with your family in private and avoid a sales focused environment before selecting a funeral director.
</div>
   <div class="Lmenu2" id="faqs_anso" style="display:none" ><br /><br /><br /><br /><br /><br /><br /><br /><br />
   The cost of a funeral in Australia can range from $4,000 to $15,000. This does not include the additional cost of a memorial and stonemason.
</div>
   <div class="Lmenu3" id="faqs_anso" style="display:none" ><br /><br /><br /><br /><br /><br /><br /><br /><br />
   Funeral costs charged by funeral companies can vary significantly. Most funeral directors don t provide an itemised quote for the cost of a funeral. So it pays to do your homework. Although, it may be emotionally difficult for you to shop around for funeral services, it makes sense that you should use the same techniques you use with any other major purchase.<br /><br /><br /><br />
</div>
   <div class="Lmenu4" id="faqs_anso" style="display:none" ><br /><br /><br /><br /><br /><br /><br /><br /><br />
   EziFunerals makes no guarantee regarding the amount of money the average family will save. However, we do guarantee that we can show you how to save money and stay within your budget by comparing prices charged by funeral directors.
</div>
   <div class="Lmenu5" id="faqs_anso" style="display:none" ><br /><br /><br /><br /><br /><br /><br /><br /><br />
   No. EziFunerals is not directly or indirectly associated with any funeral service providers, we do not sell funeral goods or services, nor do we profit from your decision-making. Our sole purpose is to provide the information you need to make a well-informed decision.
</div>
        
    </div>

</div><!-- end site features 03 -->

       
<br /><div class="punch_text_02">
    <div class="container">
	 <div class="one_full">
	<font style="font-size:18px">
        	<font style="font-family: 'Helvetica Light Condensed 47',Arial; font-size:24px; font-weight:bold">Need more help planning your funeral? Ready to request customised funeral quotes?</font> <a href="#" class="readmore_but_03" style="margin-left:0px;">Learn More</a>
    </font>
	</div>
	</div>
</div>
<script>

document.querySelector('.showcase.sweet span15').onclick = function(){
	swal("Oops...", "You Are Not Client First You Have To Sign Out Then Ofter sign Up As a Directors after Registration You can access This fetures!", "error");
};
document.querySelector('.showcase.sweet span25').onclick = function(){
	swal("Oops...", "You Are Not Client First You Have To Sign Out Then Ofter sign Up As a Directors after Registration You can access This fetures!", "error");
};
document.querySelector('.showcase.sweet span35').onclick = function(){
	swal("Oops...", "You Are Not Client First You Have To Sign Out Then Ofter sign Up As a Directors after Registration You can access This fetures!", "error");
};

</script>

			
			
		</div>
		
	
	




<div class="grey_bg" align="" style="background:#f5f5f5; ">
	<div class="container" >
        <div class="one_full">
			<h2 style="font-weight:bold">Request an Information Pack</h2>
			<p><strong>Let us know your email address and we will send you an information pack.</strong></p><br />
			<form name="" action="ThanksForRequestInformation.php" method="post">
			<input type="email" name="RequestEmail"  placeholder="Email Address." style="height:40px; width:440px; border-radius:4px;" required>
			<input type="submit" name="RequestSend" value="Submit" class="new_button">
			</form><br />
		</div>
        
</div>
</div>


<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
        <div class="center"><img src="../images/footer_AD.png" width="620"></div>
        
</div>


<!--<script>

$(document).ready(function(){
	
		$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		
		
		
	});
	
	$(window).scroll(function(){
            var window_top = $(window).scrollTop() + 12; // the "12" should equal the margin-top value for nav.stick
            var div_top = $('#nav-anchor').offset().top;
                if (window_top > div_top) {
                    $(this).addClass('current');
		$("#"+tab_id).addClass('current');
                } else {
                   $('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

                }
        });
        
        
        /**
         * This part causes smooth scrolling using scrollto.js
         * We target all a tags inside the nav, and apply the scrollto.js to it.
         */
        $("ul li a").click(function(evn){
            evn.preventDefault();
            $('html,body').scrollTo(this.hash, this.hash); 
        });
        

});


</script>-->

<!--<script>
    

        
    $(document).ready(function(){
        
        /** 
         * This part does the "fixed navigation after scroll" functionality
         * We use the jQuery function scroll() to recalculate our variables as the 
         * page is scrolled/
         */
        $(window).scroll(function(){
            var window_top = $(window).scrollTop() + 12; // the "12" should equal the margin-top value for nav.stick
            var div_top = $('#nav-anchor').offset().top;
                if (window_top > div_top) {
                    $('span').addClass('stick');
                } else {
                    $('span').removeClass('stick');
                }
        });
        
        
        *
         * This part causes smooth scrolling using scrollto.js
         * We target all a tags inside the nav, and apply the scrollto.js to it.
         
        $("span a").click(function(evn){
            evn.preventDefault();
            $('html,body').scrollTo(this.hash, this.hash); 
        });
        
        
        
        /**
         * This part handles the highlighting functionality.
         * We use the scroll functionality again, some array creation and 
         * manipulation, class adding and class removing, and conditional testing
         */
       
    });

</script>-->



<!-- Footer
======================================= -->
<?php  include '../include/footer1.php'; ?>
</html>