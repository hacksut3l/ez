<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eziFuneral | Director Dashborad</title>
<style>
@media screen and (max-width: 640px) {
	table {
		overflow-x: auto !important;
		display: block !important;
	}
}


</style>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="js/tabs/tabs-style2.css" />
<link rel="stylesheet" type="text/css" href="js/tabs/tabs.css" />
<link href="css/Old_Include_Css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/Old_Include_Css/style.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="Stylesheet" href="css/Old_Include_Css/jquery.validity.css" />
<link type="text/css" href="css/Old_Include_Css/bootstrap-select.css" />
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery-ui-1.8.23.custom.css" />
<link href="js/Old_Include_Js/bootstrap-select.js" type="text/javascript"/>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="editor/css/froala_editor.min.css" rel="stylesheet" type="text/css">
<link href="editor/css/froala_style.min.css" rel="stylesheet" type="text/css">


    <style>
        
        section {
            width: 80%;
            margin: auto;
            text-align: left;
        }
    </style>

<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<!--<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>-->
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script>
bkLib.onDomLoaded(function()
{
new nicEditor().panelInstance('NicEdit');
new nicEditor().panelInstance('NicEdit2');
});
</script>
<link rel="stylesheet" href="css/Old_Include_Css/jRating.jquery.css" type="text/css" />
<script type="text/javascript" src="js/Old_Include_Js/jRating.jquery.js"></script>
<script type="text/javascript" src="js/Old_Include_Js/jquery.mousewheel-3.0.6.pack.js"></script>
<script src="js/respond.min.js"></script>
<script type="text/javascript" src="js/universal/jquery.js"></script>
<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery.fancybox.css?v=2.1.4" media="screen" />

<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="js/Old_Include_Css/jquery.fancybox-buttons.js?v=1.0.5"></script>

<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<script type="text/javascript" src="js/Old_Include_Js/jquery.fancybox-media.js?v=1.0.5"></script>
<script type="text/javascript" src="include/jquery-noconflict.js"></script>
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
<script type="text/javascript" src="js/Old_Include_Js/jquery-ui-1.8.23.custom.min.js"></script>


<script>
//tinymce.init({
  //  selector: "textarea.about_us"
    
// }); 
</script>



</head>
<body>

<!------------------UPDATED EDITOR--------------------->
<script type="text/javascript" src="/lib/ckeditor/ckeditor.js"></script>

<!----------------------------------------------------->

<script type="text/javascript">

function confirmaddelete(id){
var c = confirm("Do you really want to delete?");
if (c) 
	{ 
		 window.location="delete_info.php?id="+id;
	}
}
</script>
<script type='text/javascript'>
			
		$(document).ready(function() {
				
				$('.delete_item').click(function()
				{
					var input=confirm("Are you sure you want to delete?");
		
					if (input==false)
					{
					  return false;
					}
					else
					{
					
						$.ajax({
							url :"delete_item.php",
							data : "type="+$(this).attr('type')+"&table_id="+$(this).attr('table_id'),
							type : "POST",
							success:function(msg)
							{
								if(msg == '1')
								{
									location.reload();
								}
							}
					
						});
					}
					
					
				});
				
				
				$('#password_frm').submit(function()
				{
					if($('#password').val() == '' || $('#cnfrm_password').val() == '')
					{
						alert('Please enter data');
						return false;
					}					
					else if($('#password').val() != $('#cnfrm_password').val())
					{
						alert('Password does not match');
						return false;
					}
					
					
					
				});
				
				
				
				
				$( "#city" ).autocomplete({
					
					source: function(request, response) {
						
					$.ajax({
						url :"city.php" ,
						data : "state_id="+$("#state").val()+"&city="+$('#city').val(),
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
				
                                
              //var id1 = $("#count_id").val();
               //alert(id1);
               
            
            });
		
		</script>
<?php
	
	include_once'include/config.php';
	include 'include/main_header.php';

		if(!isset($_SESSION['client']))
		{
?>
<script type="text/javascript">

	window.location.href="signin.php";

</script>	
	
		
<?php		
}

	
	$dataofpayment=mysql_query("select * from directors where id='".$_SESSION['client']."'");
	$rowofpayment=mysql_fetch_array($dataofpayment);
	if($rowofpayment['payment_status']=='pending' && $rowofpayment['user_type']== 1)
	{
		
?>	
	<script>
		
			window.location.href="free-membership-registration-payment.php";
	
	</script>
	
		
<?php	
	}
	if($rowofpayment['payment_status']=='pending' && $rowofpayment['user_type']== 2)
	{
		
?>	
	<script>
		
			window.location.href="standard-membership-registration-payment.php";
	
	</script>
	
		
<?php	
	}
	if($rowofpayment['payment_status']=='pending' && $rowofpayment['user_type']== 3)
	{
		
?>	
	<script>
		
			window.location.href="premium-membership-registration-payment.php";
	
	</script>
	
		
<?php	
	}
	
	
	
	$sel="select * from directors where id='".$_SESSION['person_id']."'";
	 $rel=mysql_query($sel);
	 $row=mysql_fetch_array($rel);

	$citysql = "SELECT 
					* 
					FROM 
						cities
					WHERE
						city_id = '".$row['city']."'
					";
				
		$cityex = mysql_query($citysql);
		
		$city_name = mysql_fetch_assoc($cityex);
		
		
		$statesql = "SELECT 
						state_name 
					FROM 
						states
					WHERE
						state_id = '".$row['state']."'
					";
				
				
		$stateex = mysql_query($statesql);
		
		$state_name = mysql_fetch_assoc($stateex);
	
	
	
?>
<div class="container"> <br/><br/><br/><br/><br/><br/><br/><br/><br /><h2 class="dash_left_title head_links"><b>My Funeral Home</b></h2>


      <div  style="margin-top: 30px;">

      </div>

                   <div class="user_box" style="padding:4px !important; margin-bottom:15px;">
                   	<div class="user_profile_photo">
                    <img src="<?php echo base_url;?>uploads/director_profile_pics/<?php echo $row['image'];?>"  style="width:120px; height:150px;"/>
                    	
                    </div>
                    <div class="user_info">
                    	<p class="right-text company_name_m"><strong><?php echo ucwords($row['business_name']);?></strong></p>
                        <p>
<?php echo ucwords(str_replace(","," ",$row['address'])).' '.ucwords($city_name['city_name']).' '.ucwords($state_name['state_name']).' '.ucwords($row['postal_code']);?>
<?php echo " ".ucwords($row['country']);?></p>
                        <p class="user_contact"><?php echo $row['phone'];?></p>
						
					<?php 	if($row['user_type']=='1')
							{
						
								echo '<a href="free-member.php?id='.$row['id'].'" class="viewprofile fancybox1">View Profile</a>';
                   
				  	 		}	
							if($row['user_type']=='2')
							{
						
								echo '<a href="standard-member.php?id='.$row['id'].'" class="viewprofile fancybox1">View Profile</a>';
                   
				  	 		}	
							if($row['user_type']=='3')
							{
						
								echo '<a href="premium-member.php?id='.$row['id'].'" class="viewprofile fancybox1">View Profile</a>';
                   
				  	 		}	
							
					?>		
				   
				   
				    </div>
                   
			</div>
              
            	
                

  <div class="content_fullwidth dashboard_main_box" style="margin-bottom:20px; margin-top:-55px;">
    <div id="tabs">
      <ul class="tabs dash_menu">
        <li class="active"><a href="#tab1">My Account</a></li>
		
	
        <li><a href="#tab2">My Profile</a></li>
	
		
        <li><a href="#tab3">My Funeral Quotes</a></li>
		<li class=""><a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank">Help</li></a>
		
      
      </ul>
	
      <!-- /# end tab links -->
      <div class="tab-container">
	  
        <div id="tab1" class="tab-content">
          <div id="tabs-two">
            <ul class="tabs-two fullpage subtabofclient" style="width:20%; margin-bottom:20px;">
              <li class="active-two"><a href="#tab-two1" style="font-size:12px;">Business Information</a></li>
              <li class=""><a href="#tab-two3" style="font-size:12px;">Contact Information</a></li>
			  <li class=""><a href="#tab20" style="font-size:12px;">Membership</a></li>
			  <li class="active-two"><a href="#tab-two4" style="font-size:12px;">Password Change</a></li>
		  
			  
              <li class=""><a href="#tab-two8" style="font-size:12px;">Purchase Information</a></li>
			   <li class=""><a href="#tab4" style="font-size:12px;">My Invoices</a></li>

            </ul>
			
            <!-- /# end tab links -->
            <?php
				 
if(isset($_SESSION['person_id']))
	{
		
	$sql = "SELECT * FROM directors WHERE id = '".$_SESSION['person_id']."' ";
	$sqlex = mysql_query($sql);
	
	$result = mysql_fetch_assoc($sqlex);
        
        
       $purchasesql = "SELECT * FROM director_member_info WHERE director_id = '".$_SESSION['client']."' and order_info='Approved' ORDER BY info_id DESC LIMIT 1";
       
        $purchaseex = mysql_query($purchasesql);
        
        $purchase = mysql_fetch_assoc($purchaseex);
        
        
	
	
	$statesql = "SELECT 
                        state_name 
                    FROM 
                        states
                    WHERE  
                        state_id = '".$result['state']."'
                    ";
				
	$statex = mysql_query($statesql);
	
	$state_name = mysql_fetch_assoc($statex);
	
	
	$citysql = "SELECT 
                        city_name
                    FROM 
                        cities
                    WHERE  
                        city_id = '".$result['city']."'
                    ";
		 //echo $citysql;exit;		
	$cityex = mysql_query($citysql);
	
	$city_name = mysql_fetch_assoc($cityex);
?>

            <div class="tab-container-two fullpage" style="width:78%; padding:5px; margin-bottom:20px;">
              <div id="tab-two1" class="tab-content-two fullpage">
                <div class="left_reg_form">
                	<table>
                 	 
					 
                  <!--<form id="contact_frm" method="post" action="">-->
                  <form action="director_info_update.php" method="post" enctype="multipart/form-data" id="business_frm">
				  <tr>
						
						<!--<p class="reg_box_p">Contact Information</p>-->
						<td style="padding:5px; width:180px;"><span class="reg_name ename">Business Name</span></td>
						<td style="padding:5px;"><input class="reg_field reg_field2" type="text" name="business_name" size="40" id="business_name" value= "<?php echo $result['business_name'];?>" style="padding-right:3.5%!important;"></td>                  
						
				</tr>	
				
                    <tr> 
                      <td style="padding:5px; width:180px;"><span class="reg_name" style="margin-top:0;">Upload Profile Picture</span></td>
                      <div class="customfile-container" style="width:325px;">
                        <td style="padding:5px;"><input type="file" id="file" name="business_profile_image" size="40" class="reg_field2"/></td>
                      </div>
                       </tr>
                    <!--<p class="reg_box_p">Company  Information</p>-->
                    <tr>
                      <td style="padding:5px; width:180px;"><span class="reg_name ename">ABN</span></td>
                      <td style="padding:5px;"><input class="reg_field reg_field2" type="text" name="abn" id="abn" size="40" value="<?php echo $result['abn'];?>" style="padding-right:3.5%!important;">
                        </span></td>
                    </tr>
                    <tr> 
                      <!--<p class="reg_box_p">Company  Information</p>-->
                      <td style="padding:5px; width:180px;"><span class="reg_name ename">ACN </span></td>
                      <td style="padding:5px;"><input class="reg_field reg_field2" type="text" name="acn" id="acn"  size="40"value="<?php echo $result['acn'];?>" style="padding-right:3.5%!important;"></td>
                       </tr>
                    <tr> 
                      <!--<p class="reg_box_p">Contact Information</p>-->
                      <td style="padding:5px; width:180px;"><span class="reg_name ename">Phone</span></td>
                      <td style="padding:5px;"><input class="reg_field reg_field2" type="text" name="phone" id="phone"  size="41"value="<?php echo $result['phone'];?>" maxlength="12"></td>
                      </tr>
                    <tr> 
                      <td style="padding:5px; width:180px;"><span class="reg_name ename">Select Country</span></td>
                      <td style="padding:5px;"><select class="defaultSelect reg_field2" name="country" id="country" >
                          <option value="">Select a Country</option>
                          <option value="Australia" <?php if($result['country'] == 'Australia') echo "selected=selected";?>>Australia</option>
                        </select>
                      </td>
                     </tr>
                    <tr> 
                      <td style="padding:5px; width:180px;"><span class="reg_name ename">Address</span></td>
                      <td style="padding:5px;"><textarea class="reg_tarea reg_field2" name="address" id="address" style="height:100px;" ><?php echo $result['address']?></textarea>
                      </td>
                      </tr>
                    <tr> 
                      <td style="padding:5px; width:180px;"><span class="reg_name">Select State</span></td>
                      <td style="padding:5px;"><select class="defaultSelect reg_field2" name="state" id="state">
                          <option value="">Select state/region</option>
                          <?php
									$statesql = "SELECT * FROM states ORDER BY state_name";
									$statesex = mysql_query($statesql);
									
									while($states = mysql_fetch_assoc($statesex))
									{
                                                                            $s1= '';
										if($states['state_id']== $result['state'] )
										{
											$s1 .= "selected='selected'";
										}
										
                                                                                ?>
                          <option value="<?php echo $states['state_id'];?>" <?php echo $s1;?>><?php echo $states['state_name'];?> </option>
                  
										
								
                          <?php 	}
								
								?>
                        </select>
                        <span class="formerror_new">
                        <?php if(isset($stateerror)) echo $stateerror;?>
                        </span> </td>
                      </tr>
					  

 	  
                    <tr> 
                      <td style="padding:5px; width:180px;"><span class="reg_name">Select Suburb</span></td>
                      <td style="padding:5px;"><span id="city_span">
                        <?php 
                          
                                $c_name = mysql_query("select c.*,m.* from cities c,directors m where c.city_id = m.city AND m.city = '".$result['city']."'");
                                $resultc = mysql_fetch_assoc($c_name);
                                ?>
                        <input class="reg_field reg_field2" type="text" name="city" id="city" size="40" value="<?php  echo $city_name['city_name'];?>" >
                        </span> <span class="formerror_new">
                        <?php if(isset($cityerror)) echo $cityerror;?>
                        </span> </td>
                      </span> </tr>
                    <tr> <span class="fields_wrapp">
                      <td style="padding:5px; width:180px;"><span class="reg_name ename">Postcode / Zip</span></td>
                      <td style="padding:5px;"><input class="reg_field reg_field2" type="text" size="40" name="postal_code" id="postal_code" value="<?php echo $result['postal_code']?>" maxlength="4">
                      </td>
                      </span> </tr>
                    <tr> <span class="fields_wrapp">
                      <td style="padding:5px; width:180px;"><br />
                        <input class="redirect_signup login_button" type="submit" name="contact_button" id="contact_button" value="Update"></td>
                      </td>
                      </tr>
					  
					  
                    <tr>
                      <td style="padding:5px; width:180px;"><input type="hidden" value="contact" name="type" /></td>
                  
                  </tr>
                  
                  </form>
 <?php if($row['user_type']!=1){ ?> 				  
		
		  
                
                    <?php $extra = mysql_query("Select * from directors where reference_id = '".$_SESSION['person_id']."'");
                         $c = mysql_num_rows($extra);
                        if($c>0)
                        {
                            $i=1;
                            while($dis_re = mysql_fetch_assoc($extra))
                            {
                         ?>
						   <form method="POST" action="director_info_otherupdate.php">
                    <script type="text/javascript">
                                   $(document).ready(function() {
                                       $( "#city_s<?php echo $i;?>").autocomplete({
              
					//alert();
					source: function(request, response) {
						
					$.ajax({
						url :"city.php" ,
						data : "state_id="+$("#state_s<?php echo $i; ?>").val()+"&city="+$('#city_s<?php echo $i; ?>').val(),
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
                   <tr>
				     <tr>
				  <td style="padding:5px; width:180px;"><span class="reg_name ename"<b style="font-size:20px;font-weight: 600;">Location:<?php echo $i; ?></b></span></td>
				  <td style="padding:5px; width:180px;"><span class="reg_name ename"></span></td>
				  </tr>
				  <tr>
				   <td style="padding:5px; width:180px;"><span class="reg_name ename">Select Country</span></td>
                 
					<td style="padding:5px; width:180px;"><select class="defaultSelect reg_field2" name="country_new" id="countrynew" >
                      <option value="">Select a Country</option>
                      <option value="Australia" <?php if($dis_re['country'] == 'Australia') echo "selected=selected";?>>Australia</option>
                    </select>
					</td>
                    
					</tr>
					
					<tr>
					 
					 <td style="padding:5px; width:180px;"><span class="reg_name ename">Address</span><br /></td>
					 
                    <td style="padding:5px; width:180px;"><textarea class="reg_tarea reg_field2" name="address_new" id="address"  style="height:100px;" ><?php echo $dis_re['address']?></textarea></td>
                   
					</tr>
					
					<tr>
					
					 <td style="padding:5px; width:180px;"><span class="reg_name">Select State</span></td>
					 
    				<td style="padding:5px; width:180px;"><select class="defaultSelect reg_field2" name="state_new" id="state_s<?php echo $i;?>">
                      <option value="">Select state/region</option>
                      <?php
									$statesql1 = "SELECT * FROM states ORDER BY state_name";
									$statesex1= mysql_query($statesql1);
									
									while($states1 = mysql_fetch_assoc($statesex1))
									{
                                                                            $s2= '';
										if($states1['state_id']== $dis_re['state'] )
										{
											$s2 .= "selected='selected'";
										}
										
                                                                                ?>
                      <option value="<?php echo $states1['state_id'];?>" <?php echo $s2;?>><?php echo $states1['state_name'];?> </option>
               
										
								
                      <?php 	}
								?>
                    </select></td>
					
					</tr>
					<tr>
					
                    <td style="padding:5px; width:180px;"><span class="formerror_new">
                    <?php if(isset($stateerror)) echo $stateerror;?>
                    </span> </span> <span class="fields_wrapp1"> <span class="reg_name">Select Suburb</span> <span id="city_span<?php echo $i;?>"></span></td>
                    <?php 
                            $citysql1 = "SELECT 
                        city_name
                    FROM 
                        cities
                    WHERE  
                        city_id = '".$dis_re['city']."'
                    ";
		 //echo $citysql;exit;		
	$cityex1 = mysql_query($citysql1);
	
	$city_name1 = mysql_fetch_assoc($cityex1);
                                ?>
                    <!--<select class="defaultSelect" name="city" id="city">
                                <option value="">Select city</option>
                            </select>-->
                    <td style="padding:5px; width:180px;"><input class="reg_field reg_field2" type="text" name="city_new" id="city_s<?php echo $i;?>" value="<?php  echo $city_name1['city_name'];?>"></td>
					
                    </span>
					</tr>
					
					<tr>
					
					 <span class="formerror_new">
                    <?php if(isset($cityerror)) echo $cityerror;?>
                    </span> </span> 
					
					<td style="padding:5px; width:180px;"><span class="fields_wrapp1"> <span class="reg_name ename">Postcode / Zip</span></td>
                    <td style="padding:5px; width:180px;"><input class="reg_field reg_field2" type="text" name="postal_code_new" id="postal_code" value="<?php echo $result['postal_code']?>" maxlength="4"></td>
                    </span>
					</tr>
					
					<tr>
					 <span>
                    <td style="padding:5px; width:180px;"><input type="hidden" value="<?php echo $dis_re['id'];?>" name="ref_id">
                    </span> <span class="fields_wrapp">
                    <input class="login_button" type="submit" name="contact_button" id="contact_button" value="Update" style="margin-right: 0px;margin-bottom: 0px;margin-left: 50px;">
					</span>
					</td>
					<td style="padding:5px; width:180px;">
					<span class="fields_wrapp">
                    <a href="#" onclick="confirmaddelete('<?php echo $dis_re['id'];?>');return false;"> 
					<input class="login_button" type="submit" name="update"  value="Delete" > </a> </span>
                    <input type="hidden" value="<?php echo $i?>" id="count_id" name="total_count"/>
                   <input type="hidden" value="contact" name="type" />
                  </form>
				    <?php $i++;} }?>
                    
				  </td>
                 </tr>
<?php } ?>			 
                </table>		
				
				</div>
			</div>	
            	
<!------------------------------------------------------------------------Sub Tab-2--------------------------------------------------------------------------------------------->			
		
			<div id="tab-two4" class="tab-content-two fullpage" style="margin-left:5px;">
          		<table style="margin-left:5px;">
           			 <form action="director_info_update.php" method="post" id="password_frm"> 
					 <tr>
            				
            				  <td style="padding:5px;width:180px; margin-left:5px;"><span class="reg_name">New Password</span></td>
              				  <td style="padding:5px;"><input class="reg_field reg_field2" type="password" name="password" size="40" id="password"></td>
              				
					</tr>		
              		<tr>
							
                				<td  style="padding:5px;width:180px;"><span class="reg_name">Confirm Password</span></td>
                				<td  style="padding:5px;"><input class="reg_field reg_field2" type="password" name="cnfrm_password" size="40"  id="cnfrm_password"></td>
                			
				   </tr>
				   
              		<tr> 
			 				<span class="fields_wrapp">
                				<td  style="padding:5px;width:180px;"><input class="redirect_signup login_button" type="submit" name="password_button" id="photogallery_button" value="Update"></td>
								
                			</span>
							
           			     <input type="hidden" value="password" name="type" />
            	 </tr>
			</form>	 
          </table>
    
	   
	   </div>
	
		
		
<!-------------------------------------------------------------------End Sub Tab-2--------------------------------------------------------------------------------------------->		
			
<!------------------------------------------------------------------------Tab-20--------------------------------------------------------------------------------------------->			
		
			<div id="tab20" class="tab-content-two fullpage" style="margin-left:5px;">
          		<table style="margin-left:5px;">
					 <tr>
            				
            				  <td style="padding:5px;width:180px; margin-left:5px;"></td>
              				  <td style="padding:5px;"></td>
              				
					</tr>	
					 <tr>
            				
            				  <td style="padding:5px;width:180px; margin-left:5px;"></td>
              				  <td style="padding:5px;"></td>
              				
					</tr>	
					 <tr>
            				
            				  <td style="padding:5px;width:180px; margin-left:5px;"></td>
              				  <td style="padding:5px;"></td>
              				
					</tr>	
					 <tr>
            				
            				  <td style="padding:5px;width:180px; margin-left:5px;"></td>
              				  <td style="padding:5px;"></td>
              				
					</tr>	
					 <tr>
            				
            				  <td style="padding:5px;width:300px; margin-left:5px;"><font style="font-size:20px;">ACTIVE PLAN:<?php if($result['user_type']=='1'){ echo 'BASIC';} else if($result['user_type']=='2'){ echo 'STANDARD';} else if($result['user_type']=='3'){ echo 'PREMIUM';}?></font></td>
              				  <td style="padding:5px;"><a href="director-membership.php"><input type="button" name="Change Plan" value="Change Plan" class="login_button" /></a></td>
              				
					</tr>
					<tr>
            				
            				  <td style="padding:5px;width:180px; margin-left:5px;"></td>
              				  <td style="padding:5px;"></td>
              				
					</tr>	
					 <tr>
            				
            				  <td style="padding:5px;width:180px; margin-left:5px;"></td>
              				  <td style="padding:5px;"></td>
              				
					</tr>	
					 <tr>
            				
            				  <td style="padding:5px;width:180px; margin-left:5px;"></td>
              				  <td style="padding:5px;"></td>
              				
					</tr>	
					 <tr>
            				
            				  <td style="padding:5px;width:180px; margin-left:5px;"></td>
              				  <td style="padding:5px;"></td>
              				
					</tr>			
              		
          </table>
    
	   
	   </div>
	
		
		
<!-------------------------------------------------------------------End-Tab-20--------------------------------------------------------------------------------------------->			
			
			
<!------------------------------------------------------------------------Sub Tab-3--------------------------------------------------------------------------------------------->
			
            <div id="tab-two3" class="tab-content-two fullpage"> 
              <table style="margin-left:0px;">
                <form action="director_info_update.php" method="post"  >
                  <tr> 
                    <!--<p class="reg_box_p">Company  Information</p>-->
                    <td  style="padding:5px;width:180px;"><span class="reg_name ename">Full  Name </span></td>
                    <td  style="padding:5px;"><input class="reg_field reg_field2" type="text" name="full_name" size="40" id="full_name" value="<?php echo ucwords($result['full_name']);?>"></td>
                  </tr>
                  <tr> 
                    <!--<p class="reg_box_p">Contact Information</p>-->
                   <!-- <td  style="padding:5px;width:180px;"><span class="reg_name ename">Phone</span></td>
                    <td  style="padding:5px;"><input class="reg_field reg_field2" type="text" name="business_phone"  size="40" id="business_phone" value="<?php echo $result['phone'];?>" maxlength="12"></td>-->
                   </tr>
                  <tr> 
                    <!--<p class="reg_box_p">Contact Information</p>-->
                    <td  style="padding:5px;width:180px;"><span class="reg_name ename">Business Email Id </span></td>
                    <td  style="padding:5px;"><input class="reg_field reg_field2" type="text" name="business_mail"  size="40" id="business_mail" value="<?php echo $result['email'];?>"></td>
                   </tr>
                  <tr> <span class="fields_wrapp">
                    <td  style="padding:5px;width:180px;"><input class="redirect_signup login_button" type="submit" name="business_button" id="business_button" value="Update"></td>
                    </span>
                    <input type="hidden" value="business" name="type" />
                </form>
                </tr>
                
              </table>
            </div>

<!---------------------------------------------------------------------End Sub Tab-3--------------------------------------------------------------------------------------------->

	

<!-------------------------------------------------------------------- Sub Tab-8--------------------------------------------------------------------------------------------->
<div id="tab-two8" class="tab-content-two fullpage">


      <div class="AccordionPanel">
        <div class="AccordionPanelContent">
          <form action="" method="post" id="password_frm">
            
            <table cellpadding="0" cellspacing="0" border="1" style="margin-left:10px;" >
              <tr>
                <th class="th_cls1">Date</th>
                <th class="th_cls1">Transaction Number</th>
                <th class="th_cls1">Membership Description</th>
                <th class="th_cls1">Amount</th>
                <th class="th_cls1">Paid</th>
              </tr>
             
				 <tr>
					<td><center><?php   $date_string = $purchase['d_date'];                                     
                               $new_date = date("d-m-Y", strtotime($purchase['d_date']));
                                                            
                                                            echo $new_date; ?></center></td>
                <td><center><?php echo $purchase['receipt_no'];?></center></td>
                <td><center><?php if($result['user_type'] == '1'){ echo 'Free'; } elseif($result['user_type'] == '2') { echo 'Standard'; } elseif($result['user_type'] == '3'){ echo 'Premium';}?></center></td>
                <td><center>$<?php echo $purchase['reg_amount'];?></center></td>
                <td><center>$<?php echo $purchase['reg_amount'];?></center></td>
              </tr>		  
            </table>
           
          
          </form>
       </div>
	  
	   
  </div>
  
</div>	    
   
 

<!--------------------------------------------------------------------End Sub Tab-8--------------------------------------------------------------------------------------------->

 
	 		
		
   <div id="tab4" class="tab-content-two fullpage">
  <?php include 'viewdirectorinvoice.php'; ?>
</div>   
<!-- end tab -->
</div>
					

</div>
</div>
<!-- end pricing tables with 3 columns -->

<div id="tab2" class="tab-content">
 
			<div id="tabs-two">
				<ul class="tabs-two fullpage subtabofclient" style="width:20%; margin-bottom:20px;">
				  <li class="active-two"><a href="#tab-two20" style="font-size:12px;">About Us</a></li>
				  <li class=""><a href="#tab-two21" style="font-size:12px;">Photo Gallery</a></li>
				  <li class=""><a href="#tab-two22" style="font-size:12px;">Video Gallery</a></li>
				  <li class=""><a href="#tab-two23" style="font-size:12px;">Special Offers</a></li>
				</ul>
 
 
			  <div class="tab-container-two fullpage" style="width:78%; padding:5px; margin-bottom:20px;">
				<div id="tab-two20" class="tab-content-two fullpage">
					<div class="AccordionPanel" style="margin-left:10px;">
           				 <div class="AccordionPanelContent" style="width:auto">
              				<form action ="director_info_update.php" method="post" >
               					 <textarea id='edit' name="about_us" class="about_us" style="width:100%;height:100%;"><?php echo stripslashes($result['about_us']);?></textarea>
               						 <script>
											CKEDITOR.replace( 'about_us' );
										</script>
									 <input type="hidden" value="aboutus" name="type" />
              							  <span class="fields_wrapp1">
               								 <input class="redirect_signup login_button" type="submit" name="photogallery_button" id="photogallery_button" value="Update">
               							 </span>
              				</form>
            			</div>
          			</div>
        		</div>
				
				<div id="tab-two21" class="tab-content-two fullpage">
					 <div class="AccordionPanel">
                       
                       <div class="AccordionPanelContent" style="margin-left:10px;">
                       <form action="director_info_update.php" method="post" enctype="multipart/form-data">
                       	<span class="fields_wrapp1">
                        	<span class="reg_name" style="margin-top:0;">Add / Upload Photo</span>
                        	<div class="customfile-container">
                              <input type="file" id="file" name="photo_gallery_image[]" multiple />
                            </div>
                        </span>
							<span class="fields_wrapp1">
                        	
                        </span>
						<span class="fields_wrapp1" style="margin-top:30px; ">
                        <input class="login_button" type="submit" name="photogallery_button" id="photogallery_button" value="Update">
                        </span>

                        <span class="view_gallery">
                        <?php
							$photosql = "SELECT * FROM photo_gallery WHERE director_id = '".$_SESSION['person_id']."' ";
							$photoex = mysql_query($photosql);
							
							$ispresentphoto = @mysql_num_rows($photoex);
							
							if($ispresentphoto > 0)
							{
							echo'<table border="0"  style="width:100% !important; margin-top:30px !important">';
							$cnt=0;
								while($photo = mysql_fetch_assoc($photoex))
								{
									if($cnt=='0')
									{
									echo "<tr>";
									}
						?>

<td>
	<table  style="width:100% !important;">
		<tr>
			<td><img height="215" width="400" src="<?php echo base_url;?>uploads/photo_gallery/<?php echo $_SESSION['person_id'];?>/<?php echo $photo['image']?>" /></td>
		</tr>
		<tr style="margin-top:10px;"><td align="center" style=" padding:10px;"><a class="login_button delete_item" type="photo_delete" table_id = "<?php echo $photo['id'];?>" href="javascript:void(0);">Delete</a></td></tr>
	</table>
</td>
<td>&nbsp;</td>
                        	
                        <?php
						$cnt++;
						if($cnt=='3')
						{
							echo "</tr>";
							$cnt=0;
						}
								}
								echo'</table>';
							}
							else
							{
						?>
                        		<span class="gallery_element_box">
                            	<span class="gallery_element">No Image uploaded</span>
                                </span>
                         <?php
							}
						 ?>

                        </span>
                        
                        <input type="hidden" value="photogallery" name="type" />
                        </form>
                       </div>
                     </div>
			</div>
			
			<div id="tab-two22" class="tab-content-two fullpage">
				<div class="AccordionPanel"  style="margin-left:20px;">
            		<div class="AccordionPanelContent"> 
						<span class="fields_wrapp1">
							<form action="director_info_update.php" method="post" enctype="multipart/form-data">
								<span class="reg_name" style="margin-top:0;">Youtube URL</span>
									<div class="customfile-container">
									  <input class="reg_field reg_field2" type="text" name="video_url" id="video_url" value= "">
									  <input class="login_button" style="margin-top:10px;" type="submit" name="photogallery_button" id="photogallery_button" value="Update">
									  <input type="hidden" value="videogallery" name="type" />
					  
									</div>
								</span>	
							</form>
						</span>	

			 				<span class="view_gallery"> 
								<span class="gallery_element_box">
              <?php
								$videosql = "SELECT * FROM video_gallery WHERE director_id = '".$_SESSION['person_id']."' ORDER BY id";
								
								$videoex = mysql_query($videosql);
								
								$videopresent = @mysql_num_rows($videoex);
								
								if($videopresent > 0)
								{
									while($video = mysql_fetch_assoc($videoex))
									{
										$videoname = 'http://www.youtube.com/v/'.$video['url'];
							?>
              							<span class="gallery_element"><a class='video'  title='Video' href='http://www.youtube.com/v/<?php echo $video['url'];?>?fs=1&amp;autoplay=1' style='padding:6px;'><img src='http://img.youtube.com/vi/<?php echo $video['url'];?>/1.jpg' alt='' style="width: 250px; height: 250px; padding-top: 20px; "/></a></span> <a class="login_button delete_item" type="video_delete" table_id = "<?php echo $video['id'];?>" href="javascript:void(0);">Delete</a>
										</span>
              <?php
									}
								}
							?>
              				</span> 
						</span>
					</div>
				</div>					  
			</div>
			
				<div id="tab-two23" class="tab-content-two fullpage">
					<div class="AccordionPanel">
        				
        					<div class="AccordionPanelContent" style="width:auto">
          						<form action ="director_info_update.php" method="post" >
          	 						 <textarea id='edit1' name="special_offer" class="about_us" style="width:100%;height:100%;"><?php echo stripslashes($result['special_offer']);?></textarea>
            							 <script>
											CKEDITOR.replace( 'special_offer' );
										</script>
										<input type="hidden" value="special_offer" name="type" />
            								<span class="fields_wrapp1">
            									<input class="login_button" type="submit" name="photogallery_button" id="photogallery_button" value="Update">
            								</span>
          						</form>
        					</div>
      					</div>
	  				</div>
        		</div>		
				
				
				
				
				
			 </div>		
		</div>
	<div id="tab3" class="tab-content">
  <?php include 'viewrequest.php'; ?>
</div>	
					 
</div>





<!-- end tab single section -->
</div>
</div>
</div>
<!-- end tab -->
<!--<table style="font-size:15px; margin-left:200px;">
			<tr >
				
				<td style="padding-left:25px;"><a href="edit-information.php"><center><img src="images/account.png" width="60px" height="60px" /><br/>MyAccount</a></center></td>
				<td style="padding-left:25px;"><a href="pages/HowItWorksForDirectors.php"><center><img src="images/done5.png" width="60px" height="60px" /><br/>My Plan</a></center></td>
				<td style="padding-left:25px;"><a href="viewrequest.php"><center><img src="images/done6.png" width="60px" height="60px" /></br>View Request</a></center></td>
				<td style="padding-left:25px;"><a href="logout.php"><center"><img src="images/done3.png" width="60px" height="60px" /></br>&nbsp;&nbsp;Logout</a></center></td>
				
			</tr>
			
	</table>-->
</div>
<?php include_once 'include/main_footer1.php'; ?>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="editor/js/froala_editor.min.js"></script>
   <script src="editor/js/froala_editor_ie8.min.js"></script>
  <!--[if lt IE 9]>
    <script src="../js/froala_editor_ie8.min.js"></script>
  <![endif]-->
 <!-- <script src="editor/js/plugins/tables.min.js"></script>-->
  <script src="editor/js/plugins/lists.min.js"></script>
  <script src="editor/js/plugins/colors.min.js"></script>
  <!--<script src="editor/js/plugins/media_manager.min.js"></script>-->
  <script src="editor/js/plugins/font_family.min.js"></script>
  <script src="editor/js/plugins/font_size.min.js"></script>
<!--  <script src="editor/js/plugins/block_styles.min.js"></script>
  <script src="editor/js/plugins/video.min.js"></script>-->

  <script>
 
      $(function(){
          //$('#edit').editable({inlineMode: false})
		  //$('#edit1').editable({inlineMode: false})
      });
  </script>
<!--<script type="text/javascript" src="js/mainmenu/jquery-1.7.1.min.js"></script>
--><script type="text/javascript" src="js/tabs/tabs.js"></script>
<script type="text/javascript" src="js/tabs/tabs-style2.js"></script>


</body>
</html>
<?php
	}
	else
	{
		header('Location:signin.php');
	}
?>



