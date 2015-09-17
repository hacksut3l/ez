<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->



<?php include '../include/header.php'; ?>

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
<div class="punch_text_02">
    <div class="container">
	<br><br>
	<div align="center">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;">How it Works</font>
    </div>
	</div>
</div>



<div class="tab">
	<ul class="tabs">
		<li class="tab-link" data-tab="tab-1">client</li>
		<li class="tab-link current" data-tab="tab-2">director</li>
		
	</ul>
</div>



	<div id="tab-1" class="tab-content">
			<?php  include "./HowItWorksClients.php"; ?>
	</div>
	
	<div id="tab-2" class="tab-content  current">
		<?php include "./HowItWorksDirectors.php"; ?>
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



<!-- Footer
======================================= -->
<?php include '../include/footer.php'; ?>
</html>