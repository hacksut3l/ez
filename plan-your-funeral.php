<?php

ob_start();







	include_once('include/config.php');







	session_start();


         




	







	$pagesql = "SELECT * FROM prices ORDER BY id ";







	$pageex = mysql_query($pagesql);







	







	//echo print_r($_SERVER);exit;







	$value = array();







	







	while($prices = mysql_fetch_assoc($pageex))







	{







		array_push($value,$prices['slug']);







	}







?>



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

<link href="css/Old_Include_Css/boilerplate.css" rel="stylesheet" type="text/css">

<link href="css/Old_Include_Css/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="js/Old_Include_Css/jquery-1.8.min.js"></script>

<script type="text/javascript" src="jquery.bxslider/jquery.bxslider.js"></script>

<link href="jquery.bxslider/jquery.bxslider.css" rel="stylesheet" type="text/css">



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



<script src="js/Old_include_Js/respond.min.js"></script>

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
<?php include("include/main_header.php"); ?>
<br /><br /><br /><br /><br /><br /><br /><br />
<div class="gridContainer clearfix">

  <div id="LayoutDiv1">

    <div id="wrapper">

      <div id="container">

        

        <div style="width:100%; float:left; position:relative;">

          <?php



				$bannersql = mysql_query("SELECT * FROM banners WHERE page_name = 'Plan Your Funeral' LIMIT 1");







				$banners = mysql_fetch_assoc($bannersql);
?>

          <div class="inner_banner_img"><img src="http://localhost/dezi/admin/uploads/plan_funeral/<?php echo $banners['image_name']?>"  border="0"></div>
         <div class="banner_layer">

            <div class="inner_layer">

              <div class="i_l_w">

                <div class="inner_banner_head">Plan your own funeral</div>

                <div class="inner_banner_text">Do it yourself and avoid a sales focussed environment before selecting a Funeral Director</div>

                <div class="plan_now_box">

                  <div class="plan_now_btn"><a href="<?php echo base_url;?>about-your-funeral-plan.php"><img src="images/plan_now.png"></a></div>

                </div>

              </div>

            </div>

          </div>

        </div>

    <?php
				
					$sqlpage = "SELECT * FROM home_page WHERE id = '2' ";
					$sqlexpage = mysql_query($sqlpage);
					
					$result = mysql_fetch_assoc($sqlexpage);
					
					echo $result['content'];
				?>
        

       
        <?php include("include/main_footer.php"); ?>

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

</body>

</html>

