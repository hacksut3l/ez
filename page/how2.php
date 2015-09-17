<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->



<?php include '../include/header.php'; ?>


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

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
		
	});

});


</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<!--<script>
$(document).ready(function(){
$('ul.tabs li').click(function(){
	    $(".mar_top5").animate({ scrollTop: $('.mar_top5')[0].scrollHeight}, 1000);
});
});
</script>
-->
<script>



$(document).ready(function(){
$('ul.tabs li').click(function() {
    var divID = '#jumper';
    $('html, body').animate({
        scrollTop: $(divID).offset().top
    }, 2000);
});
});
</script>



<!--<script>
$(document).ready(function(){
$('ul.tabs li').click(function(){
    
	var offsets = new Array;

$.each($("div"), function() {
    offsets["#"+$(this).attr("id")] = $(this).offset().top;
});


$('a[href^="#"]').click(function(e){
    e.preventDefault();
    var target=$(this).attr("href");
    $(".punch_text_02").animate({scrollTop:offsets[target]},900);
    return false;
});
	
	
});
});
</script>-->


<div class="tab" id="tab">
	<ul class="tabs">
		<li class="tab-link current" data-tab="tab-1">client</li>
		<li class="tab-link" data-tab="tab-2">director</li>
		
	</ul>
</div>
	<div id="tab-1" class="tab-content current">
		<div id="clients">
<?php include "./HowItWorksClients.php"; ?>
</div>
	</div>
	<div id="tab-2" class="tab-content">
		<div id="clients">
<?php include "./HowItWorksDirectors.php"; ?>
</div>
	</div>
	
	<div id="jumper" style="overflow:scroll;overflow-x:hidden;max-height:200px;"></div>







       
<br /><div class="punch_text_02">
    <div class="container">
	<font style="font-size:18px">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	<font style="font-family: 'Helvetica Light Condensed 47',Arial; font-size:24px; font-weight:bold">What kind of funeral? A step by step guide to planning a meaningful funeral</font> <a href="#" class="readmore_but_03" style="margin-left:-50px;">Learn More</a>
    </font>
	</div>
</div>


<div class="grey_bg" align="" style="background:#f5f5f5; height:130px;">
	
        <div style="margin-left:350px;">
			<h2 style="font-weight:bold">Request an Information Pack</h2>
			<p><strong>Let us know your email address and we will send you an information pack.</strong></p><br />
			<form name="" action="" method="post">
			<input type="text" name="" value="" placeholder="Email Address." style="height:40px; width:440px; border-radius:4px;">
			<input type="submit" name="Submit" value="Submit" class="new_button">
			</form><br />
		</div>
        
</div>


<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
        <div class="center"><img src="../images/footer_AD.png" width="620"></div>
        
</div>



<!-- Footer
======================================= -->
<?php include '../include/footer.php'; ?>
</html>