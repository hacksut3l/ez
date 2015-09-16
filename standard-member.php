<?php
	ob_start();
	error_reporting(0);
	include_once('include/config.php');
	@session_start();
	
	$sql = "SELECT * FROM directors WHERE id = '".$_GET['id']."' ";
	$sqlexecute = mysql_query($sql);
	
	$result = mysql_fetch_assoc($sqlexecute);
	
	$citysql = "SELECT 
					* 
					FROM 
						cities
					WHERE
						city_id = '".$result['city']."'
					";
				
		$cityex = mysql_query($citysql);
		
		$city_name = mysql_fetch_assoc($cityex);
		
		
		$statesql = "SELECT 
						state_name 
					FROM 
						states
					WHERE
						state_id = '".$result['state']."'
					";
				
				
		$stateex = mysql_query($statesql);
		
		$state_name = mysql_fetch_assoc($stateex);
		
		
		if (strpos(strtolower($result['address']),strtolower($state_name['state_name'])) != false)
		{
			
			$states = '';
		}
		else
		{
			
			$states = $state_name['state_name'];
		}
		
		
		if (strpos(strtolower($result['address']),strtolower($city_name['city_name'])) != false)
		{
			
			$cities = '';
		}
		else
		{
			
			$cities = $city_name['city_name'];
		}
		
		if (strpos(strtolower($result['address']),strtolower($result['postal_code'])) != false)
		{
			
			$postal_code = '';
		}
		else
		{
			
			$postal_code = $result['postal_code'];
		}
	
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>eziFuneral | StandardMembers </title>
<link href="css/Old_Include_Css/style.css" rel="stylesheet" type="text/css">
<link type="text/css" href="css/Old_Include_Css/bootstrap-select.css" />
<link href="js/Old_Include_Js/bootstrap-select.js" type="text/javascript"/>
<link href="css/Old_Include_Css/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
<!--<script type="text/javascript" src="jquery.bxslider/jquery.bxslider.js"></script>-->
<!--
<link href="jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />-->
<script src="js/Old_Include_Js/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyADRu81wJR7rtrwuupAK7xmCOUVpoEjNp0&sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="js/Old_Include_Js/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery.fancybox.css?v=2.1.4" media="screen" />
<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery.fancybox-1.3.4.css?v=1.0.5" />
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox-buttons.js?v=1.0.5"></script>
<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<link rel="stylesheet" href="css/Old_Include_Css/main.css"/>
<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox-media.js?v=1.0.5"></script>
<link rel="stylesheet" href="css/Old_Include_Css/jRating.jquery.css" type="text/css" />
<script type="text/javascript" src="js/Old_Include_Js/jRating.jquery.js"></script>
</head>
<body>
<script type="text/javascript"><!--
			$(document).ready(function() {
                            
				enableSelectBoxes();
				
				$('.fancybox1').fancybox();
				
				$(".exemple4").jRating({
				  isDisabled : true
				});
				
				function loading_show(){
                    $('#loading').html("<img src='images/loader.gif'/>").fadeIn('fast');
                }
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }  
				$('.addreview').live("click",function()
				{
					$('.fancybox1').fancybox();
					
					var director_id = $(this).attr('director_id');
					
					var average = $(this).attr('average');
					
					$('.exemple7').attr('data-average',average);
					
					$('.exemple7').attr('data-id',director_id)
					
					$('.exemple7').jRating({
						step:true,
						length : 5,
						canRateAgain : true,
						nbRates : 400,
						onSuccess : function(){
						   alert('Success : Your rate has been saved, you can add a review');
						  
						 }
					});
					
				});
		
		
		
		$('.rakesh123').live("click",function()
		{			
			var director_id = $(this).attr('director_id');
			director_id = parseInt(director_id)
			var client_id = $(this).attr('client_id');
			//alert($('.fancybox-skin #'+director_id).val())
			var reviewtext = $('.fancybox-skin #sammeer_'+director_id).val();
			
			
			
			if(reviewtext == '')
			{
				alert('Please add review');
			}
			else
			{
				$.ajax
                    ({
                        type: "POST",
                        url: "add_review.php",
                        data: "director_id="+director_id+"&review="+reviewtext+"&client_id="+client_id,
                        success: function(msg)
                        {
                           if(msg == '1')
						   {
							   alert('Review saved');
							   location.reload();
						   }
						   else
						   {
							   alert('Error occured');
						   }
                        }
                    });
				
			}
			
			
		});
			
				
				$('.invite_me_submit').live('click',function()
				{
					loading_show(); 
					
						var id = $(this).attr('director_id');
						
					
						if(id!='')
								{
									
                                                  
									$.ajax
									
									({
											type: "POST",
                                            url :"invite_client_also.php" ,
											data: "director_id="+id,
											success: function(msg)
									{
                                            console.log(msg);
                                          //  alert(msg);
								  
								}
							});
						}
						if(id!='')
						{
						
							$.ajax
							({
								type: "POST",
								url: "invite_me.php",
								data: "director_id="+$(this).attr('director_id'),
								success: function(msg)
								{
									var mess=msg;
									
								   if(mess == 1)
								   {
									  loading_hide();                              
									   alert('Invitation sent');
                                       $('#pop12_'+$(this).attr('director_id')).hide();
									   window.location.href="standard-member.php?id=<?php echo $_GET['id']; ?>";
								   }
								   else
								   {
									  alert('Error occured');
								   }
								}
							});
					}
					
				});
				$('.invite_me_submit_rep').live('click',function()
				{
					val= $.trim($('input[name="invite_radio"]:checked').val());
					if($.trim(val) != '')
					{
						if($.trim(val) == 'yes')
						{
                                                    $('#pop12_'+$(this).attr('director_id')).hide();
                                                         location.reload();
						}
						else
						{
							window.location.href= "plan-your-funeral.php";
						}		  
							
							
						
						
					}
					else
					{
						alert('Please select value');
					}
					
					
					
				});
				
                
				
			});
			
			function enableSelectBoxes(){
				$('div.selectBox2').each(function(){
					$(this).children('span.selected2').html($(this).children('div.selectOptions2').children('span.selectOption2:first').html());
					$(this).attr('value',$(this).children('div.selectOptions2').children('span.selectOption2:first').attr('value'));
					
					$(this).children('span.selected,span.selectArrow2').click(function(){
						if($(this).parent().children('div.selectOptions2').css('display') == 'none'){
							$(this).parent().children('div.selectOptions2').css('display','block');
						}
						else
						{
							$(this).parent().children('div.selectOptions2').css('display','none');
						}
					});
					
					$(this).find('span.selectOption2').click(function(){
						$(this).parent().css('display','none');
						$(this).closest('div.selectBox2').attr('value',$(this).attr('value'));
						$(this).parent().siblings('span.selected2').html($(this).html());
					});
				});				
			}//-->
		</script>
<style type="text/css">
           
            #loading{
                width: 100%;
                position: fixed;
                top: 100px;
                left: 385px;
				z-index:9999 !important;
				opacity:2 !important;
				/*margin-top:300px;*/
            }
            #container1 .pagination ul li.inactive,
            #container1 .pagination ul li.inactive:hover{
                background-color:#ededed;
                color:#bababa;
                border:1px solid #bababa;
                cursor: default;
            }
            #container1 .data ul li{
                list-style: none;
                font-family: 'open_sansregular';
                margin: 5px 0 5px 0;
                color: #000;
                font-size: 13px;
            }

            #container1 .pagination{
                float: right;
				margin-bottom: 20px;
			    width: 90%;
            }
            #container1 .pagination ul li{
                list-style: none;
                float: left;
                border: 1px solid #006699;
                padding: 2px 6px 2px 6px;
                margin: 0 3px 0 3px;
                font-family: 'open_sansregular';
                font-size: 14px;
                color: #006699;
                font-weight: bold;
                background-color: #f2f2f2;
            }
            #container1 .pagination ul li:hover{
                color: #fff;
                background-color: #006699;
                cursor: pointer;
            }
			.go_button
			{
			background-color:#f2f2f2;border:1px solid #006699;color:#cc0000;padding:2px 6px 2px 6px;cursor:pointer;position:absolute;margin-top:-1px;
			}
			.total
			{
			float:right;font-family:'open_sansregular';color:#999;
			}

        </style>
<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 3000 );
});

</script>
<style type="text/css">

/*** set the width and height to match your images **/

#slideshow {
	position:relative;
	height:243px;
	width:962px;
	text-align:center;
}

#slideshow IMG {
	position:absolute;
	top:0;
	left:0;
	z-index:8;
	opacity:0.0;
	background-image: url(images/01.jpg);
}

#slideshow IMG.active {
    z-index:10;
    opacity:1.0;
}

#slideshow IMG.last-active {
    z-index:9;
}

</style>
<?php include("include/main_header.php"); ?>
<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
    <div id="wrapper">
      <div id="container"><br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="in-content">
          <div class="user_box inner_member">
            <div class="user_profile_photo"><img src="<?php echo base_url;?>uploads/director_profile_pics/<?php echo $result['image'];?>" class="profile_image" style="height:130px; width:120px;" /></div>
            <div class="user_info">
              <p class="right-text company_name_m"><strong><?php echo ucwords($result['business_name']);?></strong></p>
              <p> <?php echo ucwords(str_replace(","," ",$result['address'])).' '.ucwords($cities).' '.ucwords($states).ucwords($postal_code);?> <?php echo  " ".ucwords($result['country']);?></p>
              <p class="user_contact">
                <?php $result['phone'];?>
              </p>
              <?php     
	  
	  $directordata="select * from directors where id='".$_GET['id']."'";
	  $data_rel=mysql_query($directordata);
	  $directors=mysql_fetch_array( $data_rel);
	  $pdfsql = "SELECT * FROM clients_pdf WHERE client_id = '".$_SESSION['client']."' ORDER BY date DESC LIMIT 1 ";
	//$pdfsql = "SELECT * FROM clients_pdf WHERE client_id = '133' ORDER BY date DESC LIMIT 1 ";
	$pdfex = mysql_query($pdfsql);
	
	 $is_pdf_present = @mysql_num_rows($pdfex);
	  	$invit_sql = "SELECT 
							* 
						FROM 
							invite 
						WHERE 
							invite_from = '".$_SESSION['client']."' 
						AND
							invite_to = '".$_REQUEST['id']."'							
						";
						
						
			$invite_sql_ex = mysql_query($invit_sql);
			
			$invite_present = @mysql_num_rows($invite_sql_ex);
	  
	  
	         
				
					
				if(!isset($_SESSION['client']))
				{
					echo		$invite = '<a href="#notlogin2" id="login_pop" class="invite inner_invite" style="height:17px !important; width:100px !important">Request a Quote</a>';
					echo		$addreview = '<a href="#notlogin" class="addreview inner_addreview">Add Review</a>';
				
				}
				else
				{
					 if(isset($_SESSION['client']))
					 {
							$addreview = '<a href="#tets'.$directors['id'].'" class="addreview fancybox1 inner_addreview"  average="'.$directors['rating'].'" director_id ="'.$directors['id'].'">Add Review</a>';
					//$addreview = '<a href="#tets'.$directors['id'].'" class="addreview"  average="'.$directors['rating'].'" director_id ="'.$directors['id'].'">Add Review</a>';
					}
				
				 	if($is_pdf_present > 0 && isset($_SESSION['client']) && $invite_present <= 0)
					{
						$invite = '<a href="#pop12_'.$directors['id'].'" class="invite inner_invite" style="height:17px !important; width:105px !important" director_id="'.$directors['id'].'">Request a Quote</a>';
					} 
					else if($is_pdf_present > 0 && isset($_SESSION['client']) && $invite_present > 0)
					{
				
						$invite = '<a href="#send_'.$directors['id'].'" class="invite inner_invite" style="height:17px !important; width:105px !important" director_id="'.$directors['id'].'">Request a Quote</a>';
					}
				 
				
					if($is_pdf_present <= 0 && isset($_SESSION['client']))
					{
						$invite = '<a href="post-your-plan.php?id='.$directors['id'].'" class="invite inner_invite" style="width: 21%;padding: 8px;">Request a Quote</a>';
					}
					if(!isset($_SESSION['client']))
					{
						$invite = '<a href="#notlogin2" id="login_pop" class="invite inner_invite" style="width: 21%;padding: 8px;">Request a Quote</a>';
						$addreview = '<a href="#notlogin" class="addreview inner_addreview">Add Review</a>';
					}
					echo	$condition = $invite.$addreview;	
				
				
			}
				
		
			
		?>
            </div>
            <div id="loading"></div>
            <div id="map" class="inner_map" style="width: 250px; height: 200px;float:left;"></div>
            <!--<div class="user_map">
                    	<iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Sydney,+New+South+Wales,+Australia&amp;aq=0&amp;oq=sdney&amp;sll=-33.867487,151.20699&amp;sspn=1.293073,2.705383&amp;g=Sydney,+New+South+Wales,+Australia&amp;ie=UTF8&amp;hq=&amp;hnear=Sydney+New+South+Wales,+Australia&amp;ll=-33.867487,151.20699&amp;spn=1.295833,2.705383&amp;t=m&amp;z=9&amp;output=embed"></iframe>
                    </div>-->
          </div>
          <div class="tabpanel_box">
            <div id="TabbedPanels1" class="TabbedPanels inner_tab">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">About Us</li>
                <li class="TabbedPanelsTab" tabindex="0">Photo Gallery</li>
                <li class="TabbedPanelsTab" tabindex="0">Video Gallery</li>
                <li class="TabbedPanelsTab" tabindex="0">Review &amp; Rating</li>
                <li class="TabbedPanelsTab" tabindex="0">Special Offer</li>
              </ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                  <?php
							if($result['about_us']!="")
							{
								echo stripslashes($result['about_us']);
							}
							else
							{
							echo " ";
							}
							?>
                </div>
                <div class="TabbedPanelsContent">
                  <?php
								$photosql = "SELECT * FROM photo_gallery WHERE director_id = '".$_GET['id']."' ";
								$photoex = mysql_query($photosql);
								
								$isphoto = @mysql_num_rows($photoex);
								if($isphoto > 0)
								{
								//echo '<div id="slideshow">';
								echo '<ul id="fade" style="width:100%;">';
									while($photo = mysql_fetch_assoc($photoex))
									{
						?>
                  <!-- <li style="float: left;width: 275px;height: 270px; margin: 6px; list-style: none;">
                                 <a class="fancybox fancybox.iframe" href="<?php echo base_url;?>uploads/photo_gallery/<?php echo $_GET['id'];?>/<?php echo $photo['image'];?> " style="height: 300px; width: 585px;"><img src="<?php echo base_url;?>uploads/photo_gallery/<?php echo $_GET['id'];?>/<?php echo $photo['image'];?>" style="float: left;width:100%!important; height:100%;"/></a></li>-->
                  <li style="float: left;width: 275px;height: 270px; margin: 6px; list-style: none;"> <a href="#x" class="overlay" id="<?php echo $photo['id'];?>"></a>
                    <div class="popup"> <img src="<?php echo base_url;?>uploads/photo_gallery/<?php echo $_GET['id'];?>/<?php echo $photo['image'];?>" style="float: left;width:100%!important; height:100%; max-width:270px; max-height:200px;"/> <a class="close" href="#close"></a> </div>
                    <a id="login_pop" class="btn btn-primary" href="#user_forgot"> <a href="#<?php echo $photo['id'];?>"><img src="<?php echo base_url;?>uploads/photo_gallery/<?php echo $_GET['id'];?>/<?php echo $photo['image'];?>" style="float: left;width:100%!important; height:100%;"/></a></li>
                  <?php
									}
//echo'</div>';
	echo '</ul>';
								}
								else
								{
								echo " ";
								}
						  ?>
                </div>
                <div class="TabbedPanelsContent">
                  <?php
							$videosql = "SELECT * FROM video_gallery WHERE director_id = '".$_GET['id']."' ORDER BY id";
							
							$videoex = mysql_query($videosql);
							
							$videopresent = @mysql_num_rows($videoex);
							
							if($videopresent > 0)
							{
								while($video = mysql_fetch_assoc($videoex))
								{
									$videoname = 'http://www.youtube.com/v/'.$video['url'];
							?>
                  <div class="tab_photogallery"> <a class='video fancybox fancybox.iframe'  title='Video' href='http://www.youtube.com/v/<?php echo $video['url'];?>?fs=1&amp;autoplay=1' style='padding:6px;'><img src='http://img.youtube.com/vi/<?php echo $video['url'];?>/2.jpg' style="width: 292px;" alt='' /></a> </div>
                  <?php
								}
							}
							else
							{
								echo " ";
							}
						 ?>
                </div>
                <div class="TabbedPanelsContent">
                  <div class="review">
                    <?php
								$ratingsql ="SELECT 
												r.*,
												c.*
											FROM
												ratings r,
												clients c
											WHERE
												r.rate_to = '".$_GET['id']."'
											AND
												r.rate_from = c.id											
											";
								
								$ratingex = mysql_query($ratingsql);
								
								$ratingcount = @mysql_num_rows($ratingex);
								
								if($ratingcount > 0)
								{
									while($rating = mysql_fetch_assoc($ratingex))
									{
								
							?>
                    <div class="reiew_box">
                      <div class="review_photo"><img src="<?php echo base_url;?>uploads/clients_profile_pics/<?php echo $rating['image'];?>"/></div>
                      <div class="review_text">
                        <p class="review_name"><?php echo ucwords($rating['first_name']).' '.ucwords($rating['last_name']);?></p>
                        <p>
                        <div class="exemple4" data-average="<?php echo $rating['rating'];?>" data-id="<?php echo $rating['rate_to'];?>"></div>
                        </p>
                        <hr />
                        <p><?php echo $rating['reviews'];?></p>
                      </div>
                    </div>
                    <?php
									}
								}
								else
								{
								echo "There are currently no reviews";
								}
							?>
                    <!--<div class="reiew_box">
					                                	<div class="review_photo"></div>
					                                    <div class="review_text">
					                                    	<p class="review_name">Mr. Amar</p>
					                                        <p><img src="images/rating.png"/></p>
					                                        <hr />
					                                        <p>Excellent</p>
					                                    </div>
					                                </div>
					                                <div class="reiew_box">
					                                	<div class="review_photo"></div>
					                                    <div class="review_text">
					                                    	<p class="review_name">Mr. Amar</p>
					                                        <p><img src="images/rating.png"/></p>
					                                        <hr />
					                                        <p>Excellent</p>
					                                    </div>
					                                </div>-->
                  </div>
                </div>
                <div class="TabbedPanelsContent">
                  <div class="special_offer">
                    <div class="special_box">
                      <?php 
									if($result['special_offer']!="")
									{
									echo stripslashes($result['special_offer']);
									}
									else
									{
									echo "There are currently no special offers";
									}

									?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  </div>
          <?php include("include/main_footer1.php"); ?>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
  <script type="text/javascript">
		  <?php
		  	$string = ''; 
		  	//alert($res);
				
			$string .= '["'.$result['business_name'].'",'.$result['latitude'].','.$result['longitude'].'],';
		  ?>
    var locations = [
      <?php echo $string;?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: new google.maps.LatLng(<?php echo $result['latitude']?>, <?php echo $result['longitude']?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
	//alert(locations[i][1]+","+locations[i][2]); 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
  <div id="tets<?php echo $directors['id']; ?>" style="display:none">
    <div id="" style="width:35%;">
      <h1>Add Review</h1>
      <span class="fields_wrapp no_margin"> <span class="reg_name">Rating</span>
      <div class="rating" style="margin-left:0;">
        <div class="exemple7" data-average="<?php echo $directors['rating']; ?>" data-id="<?php echo $directors['id']; ?>" average="<?php echo $directors['rating']; ?>" director_id ="<?php echo $directors['id']; ?>"></div>
      </div>
      </span> <span class="fields_wrapp no_margin"> <span class="fields_wrapp no_margin"> <span class="reg_name">Review</span>
      <textarea class="reg_field_<?php echo $directors['id']; ?>" style="height:60px; font-family:Conv_Helvetica-Light;" director_id ="<?php echo $directors['id']; ?>" name="reviewtext" id="sammeer_<?php echo $directors['id']; ?>"></textarea>
      </span> <span style="width:100%; float:left;"> <span class="reg_name">&nbsp;</span>
      <input class="login_button ratingpopup rakesh123" type="button" client_id = "<?php echo $_SESSION['client']; ?>" director_id ="<?php echo $directors['id']; ?>"  name="submit" value="Submit">
      </span> </div>
  </div>
  <a id="send_<?php echo $directors['id'];?>"  class="overlay"  href="#x"></a>
  <div class="popup">
    <div id="">
      <!--<h1>Add Review</h1>-->
      <span class="fields_wrapp no_margin"> <span class="reg_name businessPopSpan">You have already invited this Funeral Director</span>
      <!--<div class="name-fieldpop1">
								<input class="signup_btn" type="button" name="ok" value="OK" director_id="'.$directors['id'].'" id="send_id">
									</div>-->
      <a class="close" href="#close"></a> </div>
  </div>
  <a id="pop12_<?php echo $directors['id'];?>" class="overlay"  href="#x"></a>
  <div class="popup">
    <div id="">
      <!--<h1>Add Review</h1>-->
      <span class="fields_wrapp no_margin"> <span class="reg_name businessPopSpan">Invitation sent successfully!<br />
      <br>
      EziFunerals recommends that you invite at least 3 Funeral Directors and compare prices.</span> <span class="reg_name businessPopSpan">Would you like to invite more Funeral Directors?</span><br>
      <div class="name-fieldpop1" style="width:6%; margin-top: 6px; ">
        <div class="name-fullpop" style="width: 25%;margin-top: 6px;">
          <input name="invite_radio" type="radio" value="yes" checked="checked">
        </div>
        <div class="fieldpop" style="width:40%!important; margin-top: 3px;">Yes</div>
      </div>
      <div class="name-fieldpop" style="width: 12%;margin-top: 10px;">
        <div class="name-fullpop" style="width: 14%;margin-top: 4px;">
          <input name="invite_radio" type="radio" value="no">
        </div>
        <div class="fieldpop" style="width:40%;">No</div>
      </div>
      <a class="close" href="#close"></a> </div>
    <input class="login_button invite_me_submit" type="button" name="submit" value="Submit" director_id="<?php echo $directors['id']; ?>">
  </div>
  <a id="notlogin" href="#x" class="overlay"></a>
  <div class="popup">
    <div class="row">
      <div class="col-md-5">
        <p>Please login to add review this Funeral Director to quote on your funeral</p>
        <br/>
        <div align="center"> <a href="<?php echo base_url;?>signin.php?country=<?php echo $_REQUEST['country'];?>&state=<?php echo $_REQUEST['state'];?>&city=<?php echo $_REQUEST['city'];?>" class="login_button">Login</a> </div>
      </div>
    </div>
    <a class="close" href="#close"></a> </div>
  <a id="notlogin2" href="#x" class="overlay"></a> </div>
<div class="popup">
<div class="row">
  <div class="col-md-5">
    <p>Please login to invite this Funeral Director to quote on your funeral</p>
    <br/>
    <div align="center"> <a href="<?php echo base_url;?>signin.php?country=<?php echo $_REQUEST['country'];?>&state=<?php echo $_REQUEST['state'];?>&city=<?php echo $_REQUEST['city'];?>" class="login_button">Login</a> </div>
  </div>
</div>
<a class="close" href="#close"></a>
<script src="js/Old_Include_Js/jquery.mobilemenu.js"></script>
<script src="js/Old_Include_Js/jquery.viewport.js"></script>
<script src="js/Old_Include_Js/jquery.tweet.js"></script>
<script src="js/Old_Include_Js/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function() {
      $('.fancybox').fancybox({
        padding   : 0,
        maxWidth  : '100%',
        maxHeight : '50%',
        width   : 500,
        height    : 300,
        autoSize  : true,
        closeClick  : true,
        openEffect  : 'elastic',
        closeEffect : 'elastic'
      });
    });
  </script>
<style>
section.second.clearfix {
margin-top: -79px !important;
float: left;
}

</style>
</body>
</html>
