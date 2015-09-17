<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>eziFuneral</title>
<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.8.min.js"></script>
<script type="text/javascript" src="jquery.bxslider/jquery.bxslider.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<link href="jquery.bxslider/jquery.bxslider.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" />
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--<script>
		(function($){
			$(window).load(function(){
				$("#content-new").mCustomScrollbar();
			});
		})
				</script>-->
<script src="js/respond.min.js"></script>

</head>
<body>
<script type='text/javascript'><!--
			$(document).ready(function() {
				enableSelectBoxes();
			});
			
			function enableSelectBoxes(){
				$('div.selectBox').each(function(){
					$(this).children('span.selected').html($(this).children('div.selectOptions').children('span.selectOption:first').html());
					$(this).attr('value',$(this).children('div.selectOptions').children('span.selectOption:first').attr('value'));
					
					$(this).children('span.selected,span.selectArrow').click(function(){
						if($(this).parent().children('div.selectOptions').css('display') == 'none'){
							$(this).parent().children('div.selectOptions').css('display','block');
						}
						else
						{
							$(this).parent().children('div.selectOptions').css('display','none');
						}
					});
					
					$(this).find('span.selectOption').click(function(){
						$(this).parent().css('display','none');
						$(this).closest('div.selectBox').attr('value',$(this).attr('value'));
						$(this).parent().siblings('span.selected').html($(this).html());
					});
				});				
			}//-->
		</script>
<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
      <div id="wrapper">
       		<div id="container">
            <?php include("header.php"); ?>
            <!--<div class="story_video">
            <div class="story_video_box1">
            	<iframe height="100%" src="https://www.youtube.com/embed/ZdiSxDXZ-OA?feature=player_embedded" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>-->
           
            <div style="width:100%; float:left;  box-shadow: 0 3px 3px #CCCCCC; height: 2px; margin-bottom:84px;"">
            	<div class="post_your_plan_banner1"><h1>Get Your FREE e-Book</h1></div>
            </div>
            <div class="content">
               <div class="inner_container" style="font-family:'Conv_Helvetica-Light';">
                <div class="book_img"><img src="images/advt1.jpg">
                <div class="book_testi">
                	<span>Testimonials</span>
                    <div id="news-container" style="overflow: hidden; position: relative; height: 200px;">
                    	<ul style="position: absolute; margin: 0pt; padding: 0 3px 0 0; top: 0px; list-style:none;">
            
              <li style="margin: 0pt; padding: 0pt; height: 38px; display: list-item;">
                <div style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:15px; line-height:18px; float:left; color:#696868;"> “I wish I had this book when Dad died before having to deal with the funeral. I guess the majority of people battle through with very limited knowledge like me and in their time of grief rely on what is told to them by the funeral companies. It all happened so quickly. There was so much to be organized and arranged in a very limited time. Family members had conflicting ideas and opinions when we should have all been trying to support one another. It was just a whirlwind of emotions, phone calls, information searches and snap decisions that no one was really prepared for. I still don't feel as if I had the chance to grieve properly, nor as I had wanted to.”<span class="testi_title">Lea, Rockingham</span> </div>
              </li>
              <li style="margin: 0pt; padding: 0pt; height: 38px; display: list-item;">
                <div style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:15px; line-height:18px; float:left;color:#696868;"	> “This guide is a great resource for people who are in need of help and support throughout the funeral process. When someone you love passes away, it can be  extremely difficult to come to terms with. The next thing you know, funeral arrangements have to be made.  In my role as Celebrant, I find that the additional stress on families of arranging the funeral of their loved one can be emotionally overwhelming and may all feel just too hard. By following the pages of this book, it will all be made easier. Thank you eziFunerals for having the vision.” <span class="testi_title">J.Rees, Celebrant</span> </div>
              </li>
              <li style="margin: 0pt; padding: 0pt; height: 38px; display: list-item;">
                <div style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:15px; line-height:18px; float:left;color:#696868;"> “Having read this book I now feel that I am able to prepare in advance for something that we often don’t think about or talk about – ‘planning your funeral’. Due to living many miles away from all of my family and some of my friends, this book has enabled me to put in place a plan for my funeral, that encompasses how I would like it to be. I probably would not have thought much about planning my funeral before reading this book.  I now realise that a huge burden will most likely be taken away from my family, by having some fore thought to put a plan in place.  This in turn also gives me piece of mind - a huge thank you to eziFunerals.”<span class="testi_title">Lynsey, Singleton</span> </div>
              </li>
              <li style="margin: 0pt; padding: 0pt; height: 38px; display: list-item;">
                <div style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:15px; line-height:18px; float:left;color:#696868;"> “My role as a business advisor changed to that of consumer, as I became aware of just what this book had on offer. I was living interstate at the time of passing of my father, and later, my mother. This book has opened my eyes as to how poorly equipped I was to make decisions and contribute to a dignified farewell for each of my parents. I congratulate eziFunerals for this important resource and highly recommend it. ”<span class="testi_title">Tony, Business Advisor</span> </div>
              </li>
              
            </ul>
                    </div>


                </div>
                </div>
                <div class="book_desc">
                	<span>What Kind of Funeral?</span>
                    <p>A step by step guide if you’ve never arranged a funeral before and don’t know where to start </p>
                    <span>Your Guide to Funerals</span>
                   <p>The death of a loved one is a difficult and emotional time for everyone. <br>
For most of us, coping with death and planning a funeral is one of the most difficult things we will ever be asked to do. Yet, we are generally unaware of our funeral rights and don’t know how we can have genuine and meaningful involvement in the funeral. <br>
We are often unprepared and don't know what to do or where to start. Sadly, for many of us, the whole funeral experience can be deeply dissatisfying. We are at risk of making poor decisions. 
<br>
This book, informs and empowers you so that you understand your funeral rights and can have meaningful involvement in the whole experience. 
<br>
It provides independent and practical advice on how people can make informed decisions about all funeral-related matters. Checklists and questions are included to prompt reflection and discussion at each stage of the process. In this book, you’ll discover</p>
<p>
					<ul>
                    	<li>How to plan a personal and meaningful funeral.</li>
                        <li>How to deal with death, bereavement and the funeral process.</li>
                        <li>How to create a unique commemoration of the deceased.</li>
                        <li>How to make informed funeral choices. </li>
                        <li>How to conduct a funeral without using a funeral director.</li>
                        <li>How to administer the deceased’s affairs when the funeral is over.</li>
                        <li>How to manage a digital life after death.</li>
                        <li>How to cope with the loss of a pet.</li>
                        <li>How baby boomers are changing trends in the funeral industry.</li>
                    </ul>
                    </p>
                    <div class="left_book_btn">
                    	<span style="text-align:left;">Get Your FREE Copy!</span>
                        <p style="text-align:left;">Simply sign up and purchase an online funeral plan today.</p>
                        <a style="width:100%; text-align:left; float:left;" href="<?php echo base_url;?>signup.php"><input style="float:none; margin:0 auto;" class="signup_btn" type="button" value="Sign Up"></a>
                    </div>
                </div>
                
                <div style="width:100%; float:left;">
                <div class="book_button">
                	
                    <div class="left_book_btn" style="float:right;">
                    	<span>Purchase a COPY Online!</span>
                        <!--<p>Purchase Now</p>-->
                        <a class="logo_a" href="http://www.kobobooks.com/ebook/What-Kind-of-Funeral/book-9IZerOHw30WGY3FOPbbNcA/page1.html?s=VZzHeB6pd0KBpxJUYMWkmA&r=1" target="_blank"><img src="images/logos/logo5.jpg"></a>
                        <a class="logo_a" href=" http://www.amazon.com/What-Kind-Funeral-Meaningful-ebook/dp/B00EKNF0H6/ref=sr_1_1?ie=UTF8&qid=1378383593&sr=8-1&keywords=what+kind+of+funeral" target="_blank"><img src="images/logos/logo6.jpg"></a>
                        <a class="logo_a" href=" http://www.thecopia.com/catalog/details.html?catId=14876193" target="_blank"><img src="images/logos/logo7.jpg"></a>
                         <a class="logo_a" href=" http://www.barnesandnoble.com/w/what-kind-of-funeral-peter-erceg/1116503889?ean=9781922204967" target="_blank"><img src="images/logos/BNLogo.jpg"></a>
                          <a class="logo_a" href="  https://ebookstore.sony.com/ebook/peter-erceg/what-kind-of-funeral/_/R-400000000000001101982" target="_blank"><img src="images/logos/sony_logo_01.jpg"></a>
                         
                         <a class="logo_a" href="https://itunes.apple.com/au/app/ibooks/id364709193?mt=8" target="_blank"><img src="images/logos/apple01.jpg"></a>
                        <!--<a class="logo_a" href="http://www.e-sentral.com/" target="_blank"><img src="images/logos/logo1.jpg"></a>-->
                        <!--<a class="logo_a" href="#" target="_blank"><img src="images/logos/logo2.jpg"></a>
                       -->
                       <!-- <a class="logo_a" href="http://www.btol.com/" target="_blank"><img src="images/logos/logo4.jpg"></a>
                        
                        <a class="logo_a" href="https://ebookpie.com/bestsellers/ny_times/fiction/ebooks" target="_blank"><img src="images/logos/logo8.jpg"></a>-->
                    </div>
                </div>
                </div>
            </div>
            </div>  
              
            <?php include("footer.php"); ?>  
            </div>
      </div>
      </div>
  </div>
    
<script type="text/javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider({
	mode: 'vertical',
	pause: 2500,
    auto: true,
	slideWidth:1358,
	slideMargin: 10
  });
});
</script>
<script type="text/javascript" src="js/jquery.vticker-min.js"></script> 
<!--<script type="text/javascript">
$(function(){
	$('#news-container').vTicker({ 
		speed: 500,
		pause: 15000,
		animation: 'fade',
		mousePause: false,
		showItems: 3
	});
});
</script>-->
</body>
</html>
