<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->
<title>eziFunerals | Find a Funeral Director</title>
<meta name="keywords" content="Funerals, funeral director, online funeral, grief, death, burial, cremation, cemetery, funeral costs, funeral quotes, funeral rights, funeral planning, dying, celebration, funeral industry, memorial, ashes, eulogy, obituary, floral tributes, urns, grave, gravesite, headstone, coffins, caskets, funeral music, funeral consumers, hearse, wake, wills, estates, digital death, loss">
<meta name="description" content="eziFunerals is Australia's largest online funeral marketplace, where funeral homes compete for your business">
<?php include 'include/listing_header.php';
	  include 'include/config.php';
	  ob_start();
	
	@session_start();
	
	/*$url = explode('/',$_SERVER['PHP_SELF']);
	
	$_SESSION['url'] = $url[3];	*/
 ?>
<link href="css/Old_Include_Css/boilerplate.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />

<link type="text/css" href="css/Old_Include_Css/bootstrap-select.css" />
<link href="js/Old_Include_Js/bootstrap-select.js" type="text/javascript"/>
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.2.min.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyADRu81wJR7rtrwuupAK7xmCOUVpoEjNp0&sensor=false" type="text/javascript"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>-->
<link rel="stylesheet" href="css/Old_Include_Css/jRating.jquery.css" type="text/css" />
<script type="text/javascript" src="js/Old_Include_Js/jRating.jquery.js"></script>
<script type="text/javascript" src="js/Old_Include_Js/jquery-ui-1.8.23.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery-ui-1.8.23.custom.css" />
<script type="text/javascript" src="js/Old_Include_Js/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery.fancybox.css?v=2.1.4" media="screen" />
<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox-buttons.js?v=1.0.5"></script>
<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox-media.js?v=1.0.5"></script>
<script type="text/javascript">
            $(document).ready(function(){
				
				$('#main_search').submit(function()
				{
					
					if($('#state1').val() == '')
					{
						alert('Please select state/region');
						return false;
					}
					
					if($('#city').val() == '' || $('#city').val() == 'city not found')
					{
						alert('Please enter city');
						return false;
					}
					
					
				});
				
				$('#state').live("change",function()
				{
					var state_id = $(this).val();
					
					$.ajax
						({
							type: "POST",
							url: "get_cities_directors.php",
							data: "state_id="+state_id,
							success: function(msg)
							{
								$('#city_span').html(msg);
							}
							
						});
					
				});
	
				function inviteme(did)
				{
					$.ajax
							({
								type: "POST",
								url: "invite_me.php",
								data: "director_id="+did,
								success: function(msg)
								{
									alert(msg);
								   if(msg == '1')
								   {
									   loading_hide();
									 // alert('Invitation');
                                                                          ('#pop12_'+a).hide();
									  // location.reload();
								   }
								   else
								   {
									   loading_hide();
									  // alert('Error occured');
									  // location.reload();
								   }
								}
							});
				}
				
				$('.invite_me_submit').live('click',function()
				{
					loading_show(); 
					
						var a = $(this).attr('director_id');
					alert(a);
							$.ajax
							({
								type: "POST",
								url: "invite_me.php",
								data: "director_id="+$(this).attr('director_id'),
								success: function(msg)
								{
									
								   if(msg == 1)
								   {
									   loading_hide();
									 // alert('Invitation');
                                                                          ('#pop12_'+a).show();
									  // location.reload();
								   }
								   else
								   {
									   loading_hide();
									  // alert('Error occured');
									  // location.reload();
								   }
								}
							});
						
						
					
					
					
					
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
				
                function loading_show(){
                    $('#loading').html("<img src='images/loader.gif'/>").fadeIn('fast');
                }
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }                
                function loadData(page){
                    loading_show();                    
                    $.ajax
                    ({
                        type: "POST",
                        url: "more_directors.php",
                        data: "page="+page,
                        success: function(msg)
                        {
                            $("#container").ajaxComplete(function(event, request, settings)
                            {
                                loading_hide();
                                $("#container1").html(msg);
                            });
                        }
                    });
                }
                loadData(1);  // For first time page load default results
                $('#container .pagination li.active').live('click',function(){
                    var page = $(this).attr('p');
                    loadData(page);
                    
                });           
                $('#go_btn').live('click',function(){
                    var page = parseInt($('.goto').val());
                    var no_of_pages = parseInt($('.total').attr('a'));
                    if(page != 0 && page <= no_of_pages){
                        loadData(page);
                    }else{
                        alert('Enter a PAGE between 1 and '+no_of_pages);
                        $('.goto').val("").focus();
                        return false;
                    }
                    
                });
				
				
				
				
				
				$( "#city" ).autocomplete({
		
			
					source: function(request, response) {
						
					$.ajax({
						url :"city.php" ,
						data : "state_id="+$("#state1").val()+"&city="+$('#city').val(),
						dataType: "json",
						type : "POST",
						success : function(data)
						{
							group=[];
							label=[];
							$.each(data,function(i,v){
								group.push({
								label:$(v).attr('groups')
							})
						})
						
					response(group);
						}
					});
					},
					minLength: 2
					});
					
					
					
					
			$( "#director_name" ).autocomplete({
		
			
					source: function(request, response) {
						
					$.ajax({
						url :BASE_URL+"search_by_director.php" ,
						data : "director_name="+$("#director_name").val(),
						dataType: "json",
						type : "POST",
						success : function(data)
						{
							group=[];
							label=[];
							$.each(data,function(i,v){
								group.push({
								label:$(v).attr('groups')
							})
						})
						
					response(group);
						}
					});
					},
					minLength: 2
					});
					
					
					
				
            });
			
        </script>
<script type='text/javascript'><!--
			$(document).ready(function() {
				enableSelectBoxes();
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
<style>
.slider_static_image_planfuneral {
	width: 100%;
	height: 475px;
	float: left;
	padding: 0px;
	margin: -12px 0px 0px 0px;
	text-align: left;
	font-family: 'Open Sans', sans-serif;
	font-weight: normal;
	background: url(images/planfuneral-banner.png) no-repeat left;
	background-size:100%;
}
</style>
<div class="container_full">
  <div class="slider_static_image_planfuneral">
    <div class="container"> <br>
      <br>
      <br>
      <div class="static_full_img">
        <div align="center" style="margin-top:95px;" class="find_banner_section "> <font style="color:#00a3b4; font-size:42px; font-family: 'Helvetica IE', Arial !important; line-height:2.0;" class="find_banner_heading director_banner_title">Find your Funeral Director</font><br />
          <form name="serach" method="get" action="funeral_directors.php" id="main_search" class="director_header">
            <select id="state1" name="state" class="selectOption2 fdtextboxstate find_banner_input fdstate" style="color:#999999 !important;  font-size: 14px !important;">
              <option class="selectOption2" value="" >State/Province</option>
              <?php
													$statesql = "SELECT * FROM states ORDER BY state_name";
													$statesex = mysql_query($statesql);
													
													while($states = mysql_fetch_assoc($statesex))
													{
														echo '<option value="'.$states['state_id'].'">'.$states['state_name'].'</option>';
													}
										?>
            </select>
            &nbsp;&nbsp; <span id="city_span">
            <input type="text" name="city" value="" id="city" placeholder="Suburb" class="fdtextboxcity find_banner_input fdcity">
            </span> &nbsp;&nbsp;
            <input  type="text" name="country" id="" value="Australia" class="find_banner_input fdtextboxcountry fdcountry" readonly />
            <!--<select id="service" name="service" class="selectOption2" style="width:200px !important; height:40px; border:none; border-radius:4px;">
										<option class="selectOption2" value="">Select Service</option>
										<option class="selectOption2" value="Burial">Burial</option>
										<option class="selectOption2" value="Cremation">Cremation</option>
										
								   </select>&nbsp;&nbsp;-->
            <input type="submit" name="" value="Search" class="login_button director_search" style="height:40px; margin-left:6px;">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end slider -->
<div class="colored_bg" style="background:#FFFFFF!important; height:auto; margin-top:-85px;">
<div class="container container_find">
  <div class="clearfix mar_top5"></div>
  <div align="center" class="director_head_title"> <font style="font-family: 'Helvetica Medium 65', Arial; font-size:22px;" class="heading">Featured Funeral Directors</font><br />
    <br/>
  </div>
  <div class="one_full">
    <?php 
		
		$fetch_funeraldirector="select * from directors where user_type='3' ORDER BY RAND() LIMIT 0,8";
		$result_funeraldirector=mysql_query($fetch_funeraldirector);
		
		$count=mysql_num_rows($result_funeraldirector);
			
			for($i=1;$i<=$count;$i++)
			{
		$row_funeraldirector=mysql_fetch_array($result_funeraldirector);
			
			if($i==4 || $i==8)
			{
?>
    <div class="one_fourth  last featured_images"> <a href="page/funeral-directors.php"><img src="<?php echo base_url; ?>/uploads/director_profile_pics/no-profile-img1.jpg" class="director_list_images" width="135" height="150"></a><br />
      <br />
      <h3 style="color:#00a3b4" align="left" class="image_text">
        <?php ///echo $row_funeraldirector['business_name']; ?>
      </h3>
      <!--<a href=""><center><input type="button" name="view" value="View Details" class="login_button"></center></a><br/>-->
    </div>
    <?php						
			
			}else
			{
			
 ?>
    <div class="one_fourth  featured_images"> <a href="page/funeral-directors.php"><img src="<?php echo base_url; ?>/uploads/director_profile_pics/no-profile-img1.jpg" class="director_list_images" width="135" height="150"></a><br />
      <br />
      <h3 style="color:#00a3b4" align="left" class="image_text">
        <?php //echo $row_funeraldirector['business_name']; ?>
      </h3>
      <!--<a href=""><center><input type="button" name="view" value="View Details" class="login_button"></center></a><br/>-->
    </div>
    <?php 		
			}
		}


?>
  </div>
</div>
<!-- end site features 03 -->
<!-- end site container 03 -->
<!------------------------------------------------------------------------------------------->
<div class="punch_text_02 director_learn_all middle_text">
  <div class="container"> <font style="font-size:18px"> <font  class="learn_text" style="font-family: 'Helvetica Light Condensed 47',Arial; font-size:24px; font-weight:bold">Are you a funeral business? Need to grow your business online?</font> <a href="page/how-it-works?type=director" class="readmore_but_03 find_yellow learn_btn readmore_but_04">Learn More</a> </font> </div>
</div>
<style>

.city{width: 230px;
font-size:15px;
position: absolute;
text-align: center;
color: #fff;
top: 40px;
left: 50%;
margin-left: -125px;
padding: 0 10px;
text-shadow: 1px 1px 10px #00a3b4 ,2px 3px 10px #00a3b4 ,-1px -1px 10px #00a3b4; }

</style>
<div class="colored_bg org_cities_height" style="background:#ffffff; height:410px;">
  <div class="container container_find">
    <div class="clearfix mar_top5"></div>
    <div align="center" class="director_head_title"> <font style="color:#00a3b4; font-family: 'Helvetica Medium 65', Arial; font-size:22px;" class="heading">Search By Region</font><br />
      <br/>
    </div>
    <div class="one_full">
      <div class="one_fourth featured_images"> <a href="funeral_directors.php?state=2&city=Sydney&country=Australia"><img src="images/1_newsouthwhales_sydneyskyline.jpg" width="198" height="99" class="city_image"></a><br/>
        <br/>
      </div>
      <div class="one_fourth featured_images"> <a href="funeral_directors.php?state=7&city=Melbourne&country=Australia"><img src="images/2_victoria_melbourne.jpg"  width="198" height="99" class="city_image"></a><br/>
        <br/>
      </div>
      <div class="one_fourth featured_images"> <a href="funeral_directors.php?state=4&city=brisbane&country=Australia"><img src="images/3_queensland.jpg" width="198" height="99" class="city_image"></a><br/>
        <br/>
      </div>
      <div class="one_fourth last featured_images"> <a href="funeral_directors.php?state=8&city=perth&country=Australia"><img src="images/4_westernaustralia_perth.jpg" width="198" height="99" class="city_image"></a><br/>
        <br/>
      </div>
    </div>
    <div class="one_full">
      <div class="one_fourth featured_images"> <a href="funeral_directors.php?state=5&city=Adelaide&country=Australia"><img src="images/5_southaustralia.jpg" width="198" height="99" class="city_image"></a><br />
      </div>
      <div class="one_fourth featured_images"> <a href="funeral_directors.php?state=6&city=Hobart&country=Australia"><img src="images/6_tasmania.jpg" width="198" height="99" class="city_image"></a><br />
      </div>
      <div class="one_fourth featured_images"> <a href="funeral_directors.php?state=3&city=Darwin&country=Australia"><img src="images/7_northernterritory.jpg" width="198" height="99" class="city_image last_image"></a><br />
      </div>
      <div class="one_fourth last featured_images"> <a href="funeral_directors.php?state=1&city=Canberra&country=Australia"><img src="images/8_australian-capital-territory.jpg" width="198" height="99" class="city_image last_image"></a><br />
      </div>
    </div>
  </div>
</div>
<!-- end site features 04 -->
<!----------------------------------------------------------------------Guide Mail popup------------------------------------------------------------------------------------->
<a href="#x" class="overlay" id="contact"></a>
<div class="popup">
  <h1 class="login_head">Thank You</h1>
  <div class="row">
    <div class="col-md-5">
      <p>A copy of our guide has been sent to you. Please check your email.</p>
    </div>
    <div class="col-md-5"> </div>
  </div>
  <div class="row">
    <div class="col-md-5"> <span style="float:left;"><br>
      </span> </div>
  </div>
  <a class="close" href="#close"></a> </div>
<!------------------------------------------------------------------Guide Mail popup------------------------------------------------------------------------------------->
<!-- Request Information Pack
======================================= -->
<div class="grey_bg middle_fd" align="" style="background:#f5f5f5; ">
  <div class="container container_find" >
    <center>
      <div class="one_full">
        <h2 style=" font-family: 'Helvetica Medium 65', Arial; font-size:22px;"class="heading" >Request an Information Guide</h2>
        <p style="font-family:Arial, Helvetica, sans-serif; font-size:17px;">Let us know your email address and we will send you a copy of our guide on selecting the right funeral director.</p>
        <br />
        <form name="" action="./requestguide.php" method="post">
          <input type="text" name="email" value="" placeholder="Email Address." style="height:40px; width:440px; border-radius:4px;" required class="datafieldofrequest">
          <input type="hidden" name="Redirecturl" value="<?php echo base_url.basename($_SERVER['SCRIPT_NAME']);?>"/>
          <input type="hidden" name="pagename" value="<?php echo basename($_SERVER['SCRIPT_NAME']);?>"/>
          <input type="submit" name="Submit" value="Submit" class="new_button director_info_btn">
        </form>
        <br />
      </div>
    </center>
  </div>
</div>
<!-- Ad Section
======================================= -->
<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
  <div class="center"><a href="page/how-it-works"><img src="images/footer_AD.png" width="620" class="top_ad_bottom"></a></div>
</div>
<!-- Footer
======================================= -->
<?php  include 'include/main_footer1.php'; ?>
</html>
