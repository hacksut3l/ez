<?php
	ob_start();
	@session_start();
	include_once('include/config.php');
	
	
	$url = explode('/',$_SERVER['PHP_SELF']);
	$cntno=count($url);
	$_SESSION['url'] = $url[$cntno-1];
        
    $country1 = $_REQUEST['country'];
    $state1 =  preg_replace('/[^A-Za-z0-9\-\(\) ]/', '',$_REQUEST['state']);
       
    $city1 = preg_replace('/[^A-Za-z0-9\-\(\) ]/', '',$_REQUEST['city']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>eziFunerals | Australia’s Largest Funeral Marketplace</title>
<link href="css/Old_Include_Css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/Old_Include_Css/style.css" rel="stylesheet" type="text/css">
<link type="text/css" href="css/Old_Include_Css/bootstrap-select.css" />


<link href="js/Old_Include_Js/bootstrap-select.js" type="text/javascript"/>
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.2.min.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyADRu81wJR7rtrwuupAK7xmCOUVpoEjNp0&sensor=false" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
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
	<script type="text/javascript" src="js/Old_Include_Css/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox-media.js?v=1.0.5"></script>

<!--<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>-->

</head>
<body>
<script type="text/javascript">
            $(document).ready(function(){

            	var BASE_URL = '<?php echo base_url;?>';

            	/* IT support team */

            		$('.fancybox-close').live("click",function()
					{
						//location.reload();
					});
            	/* end of code */

			  function loading_show(){
                    $('#loading').html("<img src='images/loader.gif'/>").fadeIn('fast');
                }
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }    

				$('.fancybox1').fancybox();
				
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
					console.log($(this))
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
			
				
				$('.invite_me_submit').live('click',function()
				{
					
					
					loading_show();
					
				  var id = $(this).attr('director_id');
                          
						  
						        
                                if(id!='')
								{
                                                  
									$.ajax
									({
											type: "POST",
                                            url :BASE_URL+"invite_client_also.php" ,
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
                                       $('#pop12_'+$(this).attr('director_id')).show();
									   location.reload();
								   }
								   else
								   {
									   alert('Error occured');
//										location.reload();
								   }
								}
							});
                                                    }
							
						
					
					
					
					
				});
				
                  $('#send_id').live('click',function(){
				  
				 // alert();
				// window.location.reload();
				  })              
                                
                                
                                
                $('.invite_me_submit_rep').live('click',function()
				{
					val= $.trim($('input[name="invite_radio"]:checked').val());
					if($.trim(val) != '')
					{
						if($.trim(val) == 'yes')
						{
                                                    //$('#pop12_'+$(this).attr('director_id')).hide();
                                                         location.reload();
						}
						else
						{
							location.reload();	
						}		  
							
							
						
						
					}
					else
					{
						alert('Please select value');
					}
					
					
					
				});
				
                          
                function loadData(page){
					
					var state = '<?php echo $_GET['state']?>';
					var city = '<?php echo $_GET['city']?>';
					var country = '<?php echo $_GET['country']?>';
					
                    loading_show();                    
                    $.ajax
                    ({
                        type: "POST",
                        url: "funeral_director_search.php",
                        data: "page="+page+"&state="+state+"&city="+city+"&country="+country,
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
						url :BASE_URL+"city.php" ,
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
				
				
				
				
				
				
				
            });
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
 <?php include("include/listing_header.php"); ?>		
<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
      <div id="wrapper">
	  	<br/><br/><br/>
	  <div class="punch_text_02 contact_heading head_of_fd">
    <div class="container">
	<div align="left">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;" class="blue_heading">Select a Funeral Director in your area</font>
    </div>
	</div>
</div>

</div>
       		<div id="container">
             <br/><br/> <br/><br/><br/><br/>
              
     <div style="background:none;  width: 100%; float:left">
            	<div class="header-gradient">
                   <div class="find_ex">
               			<form method="get" action="funeral_directors.php" id="main_search" class="select_director">
                        <!--<form method="get" action="test_radius.php">-->
               			<div class="find_select find_select_box">
                                <!--<select class="selectOptions2 findSelect" name="country" id="country">
                                    <option class="selectOption2" value="Australia">Australia</option>
                                </select>-->
                                      <input  type="text" name="country" id="country" value="Australia" readonly />
                        </div>
                         <div class="find_select find_select_box">
                                <select class="selectOptions2 findSelect"  name="state" id="state1" style="margin-left:42px;">
                                    <option class="selectOption2" value="">Select State/Province</option>
                                     <?php
										$statesql = "SELECT * FROM states ORDER BY state_name";
										$statesex = mysql_query($statesql);
										
										while($states = mysql_fetch_assoc($statesex))
										{
                                                                                    $selected1 = "";
									  
                                                                                    if($states['state_id'] == $state1)
                                                                                    {
                                                                                                    $selected1 .= "selected='selected'";	  
                                                                                    }	
											echo '<option '.$selected1.' value="'.$states['state_id'].'">'.$states['state_name'].'</option>';
										}
									?>
                                </select>
                            </div>
                        <div class="find_select find_select_box">
                        <span id="city_span">
                                <!--<select class="selectOptions2 findSelect"  name="city" id="city">
                                    <option class="selectOption2" value="">Select City</option>
                                </select>-->
                                <input type="text" name="city" id="city" placeholder="Enter Your Suburb" class="enter_city" value="<?php if(isset($_GET['city'])){ echo $city1;}?>"/>
                                </span>
                        </div>
                        <input type="submit" class="login_button select_search_btn" value="Search"/>
                         
                        </form>
                      </div>
                </div></div>
                <div class="in-content">
                       <!--<span class="fun-text" style=" margin:30px 0px;">Select a Funeral Director in your area</span>-->
                       <div id="map" class="select_user_map" style="width: 23%; height: 243px;margin-bottom: 30px;float:left; margin-right:20px;"></div>
              
				  <!-- <div class="google">
                     <iframe width="100%" height="260" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Sydney,+New+South+Wales,+Australia&amp;aq=0&amp;oq=sdney&amp;sll=-33.867487,151.20699&amp;sspn=1.293073,2.705383&amp;g=Sydney,+New+South+Wales,+Australia&amp;ie=UTF8&amp;hq=&amp;hnear=Sydney+New+South+Wales,+Australia&amp;ll=-33.867487,151.20699&amp;spn=1.295833,2.705383&amp;t=m&amp;z=9&amp;output=embed"></iframe>-->
                   
					 </div>
                   
				     <div id="loading"></div>
					
				   <div style="width:60%; float:left;" id="container1" class="all_user_detail_forms">  
                   
				     <?php
					 
						/*$sql = "SELECT 
									d.*,
									u.* 
								FROM 
									directors d, 
									user_type u
								WHERE
									u.user_type_id = d.user_type
								
								";
						
						$result = mysql_query($sql);
						
						$directors_count = @mysql_num_rows($result);
						
						$i = '';
						$j = 1;
						
						
						
						while($directors = mysql_fetch_assoc($result))
						{		*/				
					 ?>     
					              
                   <!-- <div class="one_last">
						 <div class="in-data<?php echo $i;?>">
							   <div class="left-in-data">
								  <img src="images/content-image.jpg" />
							   </div>
							   <div class="right-in-data">
									<span class="right-text"><?php echo $directors['business_name']?></span>
									<div class="right-in-data-image">
										<img src="images/address.png" />
									</div>
										<span class="right-p"><?php echo $directors['address'];?>
													<?php echo $directors['city']?><?php echo $directors['state']?>
													<?php echo $directors['postal_code']?>		
										
										<br /><?php echo $directors['country']?></span>
									<div class="rating">
										<span class="right-bold">Rating</span>
										<img src="images/gold-star.png" /><img src="images/gold-star.png" /><img src="images/gold-star.png" />
										<img src="images/silver-star.png" /><img src="images/silver-star.png" />
									   </div> 
									 <div class="buttons">
										<input type="button" class="invite" value="Invite" />
										<input type="button" class="viewprofile" value="View Profile" />
										<input type="button" class="addreview" value="Add Review" />
									 </div>
								</div>
						  </div>-->
        			</div>        
				   <!--  <div class="in-data1">
                           <div class="left-in-data">
                              <img src="images/content-image.jpg" />
                           </div>
                           <div class="right-in-data">
                                <span class="right-text">Frances Tobin Funerals By Women</span>
                                <div class="right-in-data-image">
                                    <img src="images/address.png" />
                                </div>
                                    <span class="right-p">129 Martin St, Brighton VIC 3186<br />Australia</span>
                                <div class="rating">
                                    <span class="right-bold">Rating</span>
                                    <img src="images/gold-star.png" /><img src="images/gold-star.png" /><img src="images/gold-star.png" />
                                    <img src="images/silver-star.png" /><img src="images/silver-star.png" />
                                   </div> 
                                 <div class="buttons">
                                    <input type="button" class="invite" value="Invite" />
                                    <input type="button" class="viewprofile" value="View Profile" />
                                    <input type="button" class="addreview" value="Add Review" />
                                 </div>
                            </div>
                      </div>
                     <div class="in-data">
                           <div class="left-in-data">
                              <img src="images/content-image.jpg" />
                           </div>
                           <div class="right-in-data">
                                <span class="right-text">Frances Tobin Funerals By Women</span>
                                <div class="right-in-data-image">
                                    <img src="images/address.png" />
                                </div>
                                    <span class="right-p">129 Martin St, Brighton VIC 3186<br />Australia</span>
                                <div class="rating">
                                    <span class="right-bold">Rating</span>
                                    <img src="images/gold-star.png" /><img src="images/gold-star.png" /><img src="images/gold-star.png" />
                                    <img src="images/silver-star.png" /><img src="images/silver-star.png" />
                                   </div> 
                                 <div class="buttons">
                                    <input type="button" class="invite" value="Invite" />
                                    <input type="button" class="viewprofile" value="View Profile" />
                                    <input type="button" class="addreview" value="Add Review" />
                                 </div>
                            </div>
                      </div>
                     <div class="in-data1">
                           <div class="left-in-data">
                              <img src="images/content-image.jpg" />
                           </div>
                           <div class="right-in-data">
                                <span class="right-text">Frances Tobin Funerals By Women</span>
                                <div class="right-in-data-image">
                                    <img src="images/address.png" />
                                </div>
                                    <span class="right-p">129 Martin St, Brighton VIC 3186<br />Australia</span>
                                <div class="rating">
                                    <span class="right-bold">Rating</span>
                                    <img src="images/gold-star.png" /><img src="images/gold-star.png" /><img src="images/gold-star.png" />
                                    <img src="images/silver-star.png" /><img src="images/silver-star.png" />
                                   </div> 
                                 <div class="buttons">
                                    <input type="button" class="invite" value="Invite" />
                                    <input type="button" class="viewprofile" value="View Profile" />
                                    <input type="button" class="addreview" value="Add Review" />
                                 </div>
                            </div>
                      </div>
                   <div>
                   </div>
                   
                 </div>-->
                 <?php
				 	/*if($i == '')
					{
						$i = $j;
					}
					else
					{
						$i = '';
					}
				 
				 
				}*/
				 ?>
                 
                </div>
               
            </div>
      </div>
       <?php include("include/main_footer1.php"); ?>
  </div>
</div>
<?php


	/*$citysql = "SELECT 
					* 
				FROM 
					cities
				WHERE
					city_name = '".$_REQUEST['city']."'
				";
				
	$cityex = mysql_query($citysql);
	
	$city_name = mysql_fetch_assoc($cityex);
	
	
	
	$statesql = "SELECT 
					state_name 
				FROM 
					states
				WHERE
					state_id = '".$_REQUEST['state']."'
				";
				
				
	$stateex = mysql_query($statesql);
	
	$state_name = mysql_fetch_assoc($stateex);
	
	
	$address = $_REQUEST['city'].','.$state_name['state_name'].','.$_REQUEST['country'];
	
	
	
	$prepAddr = str_replace(' ','+',$address);

	$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
	 
	$output= json_decode($geocode);
	 
	$latitude = $output->results[0]->geometry->location->lat;
	$longitude = $output->results[0]->geometry->location->lng;*/

	$geosql = "SELECT latitude,longitude FROM geo_info WHERE city_name = '".$_REQUEST['city']."' AND state_id = '".$_REQUEST['state']."' LIMIT 1  ";
	$geo_ex = mysql_query($geosql);

	$geo = mysql_fetch_assoc($geo_ex);
	
	$latitude = $geo['latitude'];
	$longitude = $geo['longitude'];



	/*$query = "SELECT 
					* 
			  FROM 
			  		directors 
			   WHERE 
			   		city = '".$city_name['city_id']."'
				AND
					state = '".$_REQUEST['state']."'
				AND
					country = '".$_REQUEST['country']."'
			   ORDER BY id";*/
			   
			   
		$query = "
			SELECT 
				d.*,
				u.*,
				((ACOS(SIN( ".$latitude." * PI() / 180) * SIN(d.latitude * PI() / 180) + COS(".$latitude." * PI() / 180) * COS(d.latitude * PI() / 180) * COS((".$longitude." - d.longitude) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance 
			
			FROM 
				directors d, 
				user_type u
			
			HAVING 
				u.user_type_id = d.user_type
			AND
				d.is_email_confirm = '1'
			AND
				distance <=25	
			ORDER BY 
				d.user_type 
			";
			   
	//echo $query;exit;
	$queryexecute = mysql_query($query);
?>

          <script type="text/javascript">
		  <?php
		  	$string = ''; 
			$geo_array = array();
			
		  	while($res = mysql_fetch_assoc($queryexecute))
			{
				//alert($res);
				
				$string .= '["'.$res['business_name'].'","'.$res['address'].'",'.$res['latitude'].','.$res['longitude'].'],';
				
				array_push($geo_array,$res['latitude'],$res['longitude']);				
			}
			
		  ?>
    var locations = [
      <?php echo $string;?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: new google.maps.LatLng(<?php echo $geo_array[0]?>,<?php echo $geo_array[1]?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
	//alert(locations[i][1]+","+locations[i][2]); 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][2], locations[i][3]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]+'<br>'+locations[i][1]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>            
<a id="notlogin" href="#x" class="overlay"></a>
	<div class="popup">
   		
		<div class="row">
			<div class="col-md-5">
	
					<p>Please login to add review this Funeral Director to quote on your funeral</p>
					<br/>
					<div align="center">
					<a href="<?php echo base_url;?>signin.php?country=<?php echo $_REQUEST['country'];?>&state=<?php echo $_REQUEST['state'];?>&city=<?php echo $_REQUEST['city'];?>" class="login_button">Login</a>
					</div>
			</div>
		</div>		
                   
<a class="close" href="#close"></a>					
				
</div>


<a id="notlogin2" href="#x" class="overlay"></a>

</div>
	<div class="popup">
   		
		<div class="row">
			<div class="col-md-5">
	
					<p>Please login to invite this Funeral Director to quote on your funeral</p>
					<br/>
					<div align="center">
					<a href="<?php echo base_url;?>signin.php?country=<?php echo $_REQUEST['country'];?>&state=<?php echo $_REQUEST['state'];?>&city=<?php echo $_REQUEST['city'];?>" class="login_button">Login</a>
					</div>
			</div>
		</div>			
                       
                        
                       
                   
<a class="close" href="#close"></a>					
				
</div>
</body>
</html>
