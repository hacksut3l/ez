<?php
	
	session_start();
	include_once '../include/config.php';
	
	
	$sql = "SELECT * FROM  deceased WHERE person_making_id = '".$_SESSION['client']."'";
	$result = mysql_query($sql);
	
	$rows = @mysql_num_rows($result);
	
	$person = mysql_fetch_assoc($result);
	if(isset($_SESSION['person_id']) || isset($_SESSION['client']))
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eziFunerals</title>
<?php include '../include/header.php';?>
  <link href="favicon.icon" rel="shortcut icon">
  <link href="<?php echo base_url;?>css/Old_Include_Css/style1.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../js/Old_Include_Js/jquery-1.8.min.js"></script> 
  <script type="text/javascript" src="../js/Old_Include_Js/jquery-ui-1.8.23.custom.min.js"></script> 
  <!--<script src="<?php echo base_url;?>js/jquery-1.9.js" type="text/javascript"></script>--> 
  <script src="<?php echo base_url;?>js/Old_Include_Js/deceased-vali.js" type="text/javascript"></script> 
  <script type='text/javascript'>
			$(document).ready(function() {
				
				$( ".suburb1" ).autocomplete({
					
					source: function(request, response) {
					
					$.ajax({
						url : "../city.php" ,
						data : "state_id="+$(".state1").val()+"&city="+$('.suburb1').val(),
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
				$( "#death_suburb" ).autocomplete({
					
					source: function(request, response) {
					
					$.ajax({
						url : "../city.php" ,
						data : "state_id="+$("#death_state").val()+"&city="+$('#death_suburb').val(),
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
                               	$( "#doc_suburb" ).autocomplete({
					
					source: function(request, response) {
					//var qw = $("#doc_state").val();
                                       // alert(qw);
					$.ajax({
						url : "../city.php" ,
						data : "state_id="+$("#doc_state").val()+"&city="+$('#doc_suburb').val(),
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
                              	$( "#business_suburb" ).autocomplete({
					
					source: function(request, response) {
					//var qw = $("#doc_state").val();
                                       // alert(qw);
					$.ajax({
						url : "../city.php" ,
						data : "state_id="+$("#business_state").val()+"&city="+$('#business_suburb').val(),
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
				enableSelectBoxes();
			});
			
			function enableSelectBoxes(){
				$('div.selectBox1').each(function(){
					$(this).children('span.selected1').html($(this).children('div.selectOptions1').children('span.selectOption1:first1').html());
					$(this).attr('value',$(this).children('div.selectOptions1').children('span.selectOption1:first1').attr('value'));
					
					$(this).children('span.selected1,span.selectArrow1').click(function(){
						if($(this).parent().children('div.selectOptions1').css('display') == 'none'){
							$(this).parent().children('div.selectOptions1').css('display','block');
						}
						else
						{
							$(this).parent().children('div.selectOptions1').css('display','none');
						}
					});
					
					$(this).find('span.selectOption1').click(function(){
						$(this).parent().css('display','none');
						$(this).closest('div.selectBox1').attr('value',$(this).attr('value'));
						$(this).parent().siblings('span.selected1').html($(this).html());
					});
				});				
			}
</script> 
  <script type="text/javascript">
$(document).ready(function() {
	
	<?php
		if($person['medical_certificate'] == 'yes' || $rows <= 0)
		{
	?>
			$('#doc_detail_span').show();
	<?php
		}
		else 
		{
	?>
			$('#doc_detail_span').hide();
	<?php
		}
	?>
	
	
	<?php
		if($person['organ_donar'] == 'yes' || $rows <= 0)
		{
	?>
			$('#organ_div').show();
	<?php
		}
		else
		{
	?>
			$('#organ_div').hide();
	<?php
		}
	?>
	
	
	<?php
		if($person['is_pre_paid'] == 'yes' || $rows <= 0)
		{
	?>
			$('#is_prepaid_div').show();
	<?php
		}
		else
		{
	?>
			$('#is_prepaid_div').hide();
	<?php
		}
	?>
	
	
	
	$('#place_of_death_details_div').hide();
	
	
	$("input[name$='place_of_death']").click(function() {
        var test = $(this).val();
		
		if(test == 'other')
		{
			$('#place_of_death_details_div').show();
		}
		else
		{
			$('#place_of_death_details_div').hide();
		}
        
    });
	
	
	
    $("input[name$='organ_donar']").click(function() {
        var test = $(this).val();
		
		var org = 0;
		
		<?php
			if($person['organ_donar'] == 'yes' || $rows <= 0)
			{
		?>
				org = 1;
		<?php
			}		
			elseif($person['organ_donar'] == 'no' )
			{
		?>				
				org = 0;
		<?php
			}
		?>
		
		if((test == 'yes' || org == 1) && test != 'no' && test != 'notsure')
		{
			$('#organ_div').show();
		}
		else
		{
			$('#organ_div').hide();
		}
        
    });
	
	
	$("input[name$='medical_certificate']").live("click",function() {
	
        var test = $(this).val();
		
		var mdi = 0;
		
		<?php
			if($person['medical_certificate'] == 'yes' || $rows <= 0)
			{
		?>
				mdi = 1;
		<?php
			}
			elseif($person['medical_certificate'] == 'no' )
			{
		?>
				
				mdi = 0;
		<?php
			}
		?>
		if((test == 'yes' || mdi == 1) && test != 'no' && test != 'notsure')
		{
			$('#doc_detail_span').show();
		}
		else
		{
			$('#doc_detail_span').hide();
		}
        
    });
	
	$("input[name$='is_pre_paid']").click(function() {
        var test = $(this).val();
		
		var pre = 0;
		
		<?php
			if($person['is_pre_paid'] == 'yes' || $rows <= 0)
			{
		?>
				pre = 1;
		<?php
			}
			elseif($person['is_pre_paid'] == 'no' )
			{
		?>
				
				pre = 0;
		<?php
			}
		?>
		
		if((test == 'yes' || pre == 1) && test != 'no'  && test != 'notsure' )
		{
			$('#is_prepaid_div').show();
		}
		else
		{
			$('#is_prepaid_div').hide();
		}
        
    });
	
	
	$('#deceasedlink').click(function()
	{
		alert('Please first complete above steps');
	});
	
	$('#committallink').click(function()
	{
		alert('Please first complete above steps');
	});
	
	$('#funeralservicelink').click(function()
	{
		alert('Please first complete above steps');
	});
	
	$('#afterfunerallink').click(function()
	{
		alert('Please first complete above steps');
	});
	
	$('#informationlink').click(function()
	{
		alert('Please first complete above steps');
	});
	
	
});


</script>
  <style>


a:hover{ text-decoration:none; }
</style>
  </head>
  <body>
  
  <!--start web-layout -->
  <div class="web-layout">
    <div class="web-960"><br/>
      <br/>
      <br/>
      <br/>
      <!--start header-form -->
      <div class="header"> 
        <!--end header-form --> 
        <!--start form-navigation-->
        <div class="container">
          <div class="form-navigation"><img src="<?php echo base_url;?>images/nav02.png" alt=""  class="process_img1"/></div>
          <!--end form-navigation--> 
          <!--start content-wrap-->
          <div class="content-wrap">
            <div class="left-content">
              <h2 class="heading process_title">Details Of Deceased</h2>
              <div class="help-f"><a id="example1" href="#inline1"></a></div>
              <!--start mpd-form-->
              <form name="deceased_form" action="save-deceased.php" method="POST">
                <div class="mpd-form">
                  <fieldset class="fieldset  process_form1">
                    <legend class="legend">Details Of Deceased</legend>
                    <div class="f-row-1">
                      <p class="fl-name">
                        <lebel>First Name:</lebel>
                        <input type="text" name="f_name" id="f_name" value="<?php echo $person['f_name'];?>" class="text-n" />
                      </p>
                      <p class="fr-name">
                        <lebel>Middle Name:</lebel>
                        <input type="text" name="m_name" id="m_name1" value="<?php echo $person['m_name'];?>" class="text-n" />
                      </p>
                      <p class="fr-name">
                        <lebel>Last Name:</lebel>
                        <input type="text" name="l_name" id="l_name" value="<?php echo $person['l_name'];?>" class="text-n" />
                      </p>
                    </div>
                    <div class="f-row-1">
                      <p class="fl-name">
                        <lebel>Address Line 1</lebel>
                        <input type="text" name="address1" id="address" value="<?php echo $person['address1'];?>" class="text-n" />
                      </p>
                      <p class="fr-name">
                        <lebel>Address Line 2</lebel>
                        <input type="text" name="address2" id="address2" value="<?php echo $person['address2'];?>" class="text-n" />
                      </p>
                    </div>
                    <div class="f-row-1">
                      <p class="fr-name" style="padding-left: 0;margin-right: 15px;">
                        <lebel>State:</lebel>
                        <select name="state_name" id="state1" class="text-n state1" >
                          <option value="">Select state/region</option>
                          <?php
									$statesql = "SELECT * FROM states ORDER BY state_name";
									$statesex = mysql_query($statesql);
									
									while($states = mysql_fetch_assoc($statesex))
									{
										if($person['state'] == $states['state_name'])
										{
											$selected = 'selected=selected';
										}
										else
										{
											$selected = '';
										}
										echo '<option value="'.$states['state_id'].'" '.$selected.'>'.$states['state_name'].'</option>';
									}
								?>
                        </select>
                      </p>
                      <p class="fl-name">
                        <lebel>Suburb:</lebel>
                        <input type="text" name="suburb" id="suburb1" value="<?php echo $person['suburb'];?>" class="text-n suburb1" />
                      </p>
                      <p class="fr-name">
                        <lebel>Postcode:</lebel>
                        <input type="text" name="postcode" id="postcode" value="<?php echo $person['postcode'];?>" class="text-n" maxlength="4"/>
                      </p>
                    </div>
                    <div class="f-row-1">
                      <h3>Gender: </h3>
                      <p class="tx-areamf">
                        <input type="radio" id="male" name="gender" class="checkbox" <?php if($person['gender'] == 'male') echo "checked=checked";else echo "checked=checked";?> value="male"/>
                        <span class="ch-field">Male </span> </p>
                      <p class="tx-area">
                        <input type="radio" id="female" name="gender" class="checkbox" value="female" <?php if($person['gender'] == 'female') echo "checked=checked"?>/>
                        <span class="ch-field">Female </span> </p>
                    </div>
                    <div class="f-row-1">
                      <p class="fl-name">
                        <lebel>Age:</lebel>
                        <input type="text" name="age" id="age" value="<?php echo $person['age'];?>" class="text-n" maxlength="3"/>
                      </p>
                      <p class="fr-name">
                        <lebel>Date of birth: </lebel>
                        <input type="text" name="dob" id="searchsdate" value="<?php echo $person['dob'];?>" class="text-ncal" />
                      </p>
                    </div>
                    <div class="f-row-1">
                      <p class="fl-name">
                        <lebel>Height (cm):</lebel>
                        <input type="text" name="height" id="height" value="<?php echo $person['height'];?>" class="text-n" maxlength="3"/>
                      </p>
                      <p class="fr-name">
                        <lebel>Weight (kg): </lebel>
                        <input type="text" name="weight" id="weight" value="<?php echo $person['weight'];?>" class="text-n" maxlength="3" />
                      </p>
                    </div>
                    <div class="f-row-1">
                      <p class="fl-name">
                        <lebel>Place of birth: </lebel>
                        <input type="text" name="pob" id="pob" value="<?php echo $person['pob'];?>" class="text-n" />
                      </p>
                      <p class="fr-name">
                        <lebel>Country of birth: </lebel>
                        <!--<input type="text" name="cob" id="cob" value="<?php echo $person['cob'];?>" class="text-n" />-->
                        <select class="select-ezi" id="cob" name="cob">
                          <option value="0">Select Country</option>
                          <?php
											$countrysql = "SELECT * FROM countries ORDER BY name ";
											$countryexecute = mysql_query($countrysql);
											while($country = mysql_fetch_assoc($countryexecute))
											{	
												if($country['name'] == $person['cob'])
												{		
													$selected = "selected=selected";	
												}
												else
												{
													$selected = "";
												}							
										?>
                          <option value="<?php echo $country['name']?>" <?php echo $selected;?>><?php echo $country['name']?></option>
                          <?php		
									}
							   ?>
                        </select>
                      </p>
                    </div>
                    <div class="f-row-1">
                      <p class="fl-name">
                        <lebel>Date of Death: </lebel>
                        <input type="text" name="dod" id="searchsdate1" value="<?php echo $person['dod'];?>" class="text-ncal" />
                      </p>
                      <p class="fr-name">
                        <lebel>Time of Death (AM/PM): </lebel>
                        <input type="text" name="tod" id="tod" value="<?php echo $person['tod'];?>" class="text-n" />
                      </p>
                    </div>
                    <div class="f-row-1">
                      <h3>Place of Death: </h3>
                      <p class="tx-area">
                        <input type="radio" id="home" name="place_of_death" class="checkbox" value="home" <?php if($person['place_of_death'] == 'home') echo "checked=checked";else echo "checked=checked";?>/>
                        <span class="ch-field">Home</span> </p>
                      <p class="tx-area">
                        <input type="radio" id="hospital" name="place_of_death" class="checkbox" value="hospital" <?php if($person['place_of_death'] == 'hospital') echo "checked=checked";?>/>
                        <span class="ch-field">Hospital </span> </p>
                      <p class="tx-area">
                        <input type="radio" id="n_home" name="place_of_death" class="checkbox" value="nursing home" <?php if($person['place_of_death'] == 'nursing home') echo "checked=checked";?>/>
                        <span class="ch-field">Nursing home </span> </p>
                      <p class="tx-area">
                        <input type="radio" id="other" name="place_of_death" class="checkbox" value="other" <?php if($person['place_of_death'] == 'other') echo "checked=checked";?>/>
                        <span class="ch-field">Other </span> </p>
                      <p class="tx-area" id="place_of_death_details_div">
                        <input type="text" name="place_of_death_details" id="place_of_death_details" value="" class="text-n" />
                      </p>
                    </div>
                    <div class="f-row-1">
                      <p>
                        <lebel>Address: </lebel>
                        <textarea style="width:220px;height:62px;" name="death_address" id="death_address" class="textarea-f"><?php echo $person['death_address'];?></textarea>
                      </p>
                    </div>
                    <div class="f-row-1">
                      <p class="fr-name" style="padding-left: 0;margin-right: 15px;">
                        <lebel>State:</lebel>
                        <select name="death_state" id="death_state"  class="text-n">
                          <option value="">Select state/region</option>
                          <?php
									$statesql = "SELECT * FROM states ORDER BY state_name";
									$statesex = mysql_query($statesql);
									
									while($states = mysql_fetch_assoc($statesex))
									{
										if($person['death_state'] == $states['state_name'])
										{
											$selected = 'selected=selected';
										}
										else
										{
											$selected = '';
										}
										echo '<option value="'.$states['state_id'].'" '.$selected.'>'.$states['state_name'].'</option>';
									}
								?>
                        </select>
                      </p>
                      <p class="fl-name">
                        <lebel>Suburb:</lebel>
                        <input type="text" name="death_suburb" id="death_suburb" value="<?php echo $person['death_suburb'];?>" class="text-n" />
                      </p>
                      <p class="fr-name">
                        <lebel>Postcode:</lebel>
                        <input type="text" name="death_postcode" id="death_postcode" value="<?php echo $person['death_postcode'];?>" class="text-n" maxlength="4"/>
                      </p>
                    </div>
                    <!----------------------------------------------------------------------help1 popup-------------------------------------------------------------------------------------> 
                    
                    <a href="#x" class="overlay" id="help1"></a>
                    <div class="popup">
                      <div class="row">
                        <div class="col-md-5">
                          <p>The deceased person may have been taken from the place of death<br/>
                            and transferred to the premises of a funeral director. You don’t have<br/>
                            to proceed with the funeral director who has your loved one in their care. <br/>
                            You can still select another funeral director by using the EziFunerals/Direct<br/>
                            service. A transfer fee may apply.</p>
                        </div>
                      </div>
                      <a class="close" href="#close"></a> </div>
                    
                    <!------------------------------------------------------------------End help1 popup------------------------------------------------------------------------------------->
                    
                    <div class="f-row-1">
                      <p>
                        <lebel><span class="bold">Place where deceased is currently resting: </span> <a id="login_pop" href="#help1"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /></a></lebel>
                        <textarea class="textarea-f" name="deceased_resting" id="deceased_resting" style="width:220px;height:62px;border: 1px solid #cccccc;"><?php echo $person['deceased_resting'];?></textarea>
                        <!--<input type="text" name="deceased_resting" id="deceased_resting" value="<?php echo $person['deceased_resting'];?>" class="text-n" />--> 
                      </p>
                    </div>
                    
                    <!----------------------------------------------------------------------help2 popup-------------------------------------------------------------------------------------> 
                    
                    <a href="#x" class="overlay" id="help2"></a>
                    <div class="popup">
                      <div class="row">
                        <div class="col-md-5">
                          <p>The Medical Certificate of Cause of Death (the ‘death certificate’)is an important<br/>
                            legal document.The completion of a death certificate by a medical practitioner is <br/>
                            a vital part of the notification process of a death to the Registrar of Births, Deaths and <br/>
                            Marriages in the relevant state or territory.It enables an authority to be provided<br />
                            to the funeral director to arrange disposal 	of the body.</p>
                        </div>
                      </div>
                      <a class="close" href="#close"></a> </div>
                    
                    <!------------------------------------------------------------------End help2 popup------------------------------------------------------------------------------------->
                    
                    <div class="f-row-1">
                      <h3>Medical Certificate of Cause of Death issued: <a id="login_pop" href="#help2"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /></a></h3>
                      <p class="tx-areamf">
                        <input type="radio" id="medical_certificate1" name="medical_certificate" class="checkbox" value="yes"  <?php if($person['medical_certificate'] == 'yes') echo "checked=checked";else echo "checked=checked";?>/>
                        <span class="ch-field">Yes </span> </p>
                      <p class="tx-areamf">
                        <input type="radio" id="medical_certificate2" name="medical_certificate" class="checkbox"  value="no" <?php if($person['medical_certificate'] == 'no') echo "checked=checked";?>/>
                        <span class="ch-field">No </span> </p>
						  <p class="tx-areamf">
                        <input type="radio" id="medical_certificate3" name="medical_certificate" class="checkbox"  value="notsure" <?php if($person['medical_certificate'] == 'notsure') echo "checked=checked";?>/>
                        <span class="ch-field">Not Sure</span> </p>
                      <!--<p class="tx-areamf">
                              <input type="radio" id="nopre" name="nopre" class="checkbox" />
                                <span class="ch-field">No preference  </span>
                            </p>--> 
                    </div>
                    <div id="doc_detail_span" style="float: left;">
                      <div class="f-row-1">
                        <h3>Doctors Details: </h3>
                        <p class="fl-name">
                          <lebel>First Name:</lebel>
                          <input type="text" name="doc_f_name" id="doc_f_name" value="<?php echo $person['doc_f_name'];?>" class="text-n" />
                        </p>
                        <p class="fr-name">
                          <lebel>Middle Name:</lebel>
                          <input type="text" name="doc_m_name" id="doc_m_name" value="<?php echo $person['doc_m_name'];?>" class="text-n" />
                        </p>
                        <p class="fr-name">
                          <lebel>Last Name:</lebel>
                          <input type="text" name="doc_l_name" id="doc_l_name" value="<?php echo $person['doc_l_name'];?>" class="text-n" />
                        </p>
                      </div>
                      <div class="f-row-1">
                        <p class="fl-name">
                          <lebel>Address Line 1</lebel>
                          <input type="text" name="doc_address1" id="doc_address" value="<?php echo $person['doc_address1'];?>" class="text-n" />
                        </p>
                        <p class="fr-name">
                          <lebel>Address Line 2</lebel>
                          <input type="text" name="doc_address2" id="address2" value="<?php echo $person['doc_address2'];?>" class="text-n" />
                        </p>
                      </div>
                      <div class="f-row-1">
                        <p class="fr-name" style="padding-left: 0;margin-right: 15px;">
                          <lebel>State:</lebel>
                          <select name="doc_state" id="doc_state" class="text-n">
                            <option value="">Select state/region</option>
                            <?php
									$statesql = "SELECT * FROM states ORDER BY state_name";
									$statesex = mysql_query($statesql);
									
									while($states = mysql_fetch_assoc($statesex))
									{
										if($person['doc_state'] == $states['state_name'])
										{
											$selected = 'selected=selected';
										}
										else
										{
											$selected = '';
										}
										echo '<option value="'.$states['state_id'].'" '.$selected.'>'.$states['state_name'].'</option>';
									}
								?>
                          </select>
                        </p>
                        <p class="fl-name">
                          <lebel>Suburb:</lebel>
                          <input type="text" name="doc_suburb" id="doc_suburb" value="<?php echo $person['doc_suburb'];?>" class="text-n" />
                        </p>
                        <p class="fr-name">
                          <lebel>Postcode:</lebel>
                          <input type="text" name="doc_postcode" id="doc_postcode" value="<?php echo $person['doc_postcode'];?>" class="text-n" maxlength="4"/>
                        </p>
                      </div>
                      <div class="f-row-1">
                        <p class="fl-name">
                          <lebel>Telephone:</lebel>
                          <input type="text" name="doc_telephone" id="doc_telephone" value="<?php echo $person['doc_telephone'];?>" class="text-n"  maxlength="10"/>
                        </p>
                        <p class="fr-name">
                          <lebel>Mobile:</lebel>
                          <input type="text" name="doc_mobile" id="doc_mobile" value="<?php echo $person['doc_mobile'];?>" class="text-n"  maxlength="10"/>
                        </p>
                        <p class="fr-name">
                          <lebel>Email:</lebel>
                          <input type="text" name="doc_email" id="doc_email" value="<?php echo $person['doc_email'];?>" class="text-n" />
                        </p>
                      </div>
                    </div>
                    <div class="f-row-1">
                      <h3>Is the deceased person registered as an organ donor? </h3>
                      <p class="tx-areamf">
                        <input type="radio" id="orgon_donar1" name="organ_donar" class="checkbox"  value="yes" <?php if($person['organ_donar'] == 'yes') echo "checked=checked"; else echo "checked=checked";?>/>
                        <span class="ch-field">Yes </span> </p>
                      <p class="tx-areamf">
                        <input type="radio" id="orgon_donar2" name="organ_donar" class="checkbox"  value="no" <?php if($person['organ_donar'] == 'no') echo "checked=checked";?>/>
                        <span class="ch-field">No </span> </p>
						 <p class="tx-areamf">
                        <input type="radio" id="orgon_donar3" name="organ_donar" class="checkbox"  value="notsure" <?php if($person['organ_donar'] == 'notsure') echo "checked=checked";?>/>
                        <span class="ch-field">Not Sure</span> </p>
                      <!-- <p class="tx-areamf">
                              <input type="radio" id="nopre" name="nopre" class="checkbox" />
                                <span class="ch-field">No preference  </span>
                            </p>--> 
                    </div>
                    <div class="f-row-1" id="organ_div">
                      <p>
                        <lebel>If YES, provide details below: </lebel>
                        <textarea id="orgon_donar_detail"  name="organ_donar_detail" class="textarea-f"><?php echo $person['organ_donar_detail'];?></textarea>
                      </p>
                    </div>
                    
                    <!----------------------------------------------------------------------help3 popup-------------------------------------------------------------------------------------> 
                    
                    <a href="#x" class="overlay" id="help3"></a>
                    <div class="popup">
                      <div class="row">
                        <div class="col-md-5">
                          <p>Pre-paid funerals involve making funeral arrangements now and paying for <br/>
                            it at current prices. The money is usually held by a financial institution independent<br/>
                            of the funeral company and registered with your state's consumer protection office.</p>
                        </div>
                      </div>
                      <a class="close" href="#close"></a> </div>
                    
                    <!------------------------------------------------------------------End help3 popup------------------------------------------------------------------------------------->
                    
                    <div class="f-row-1">
                      <h3>Does the deceased person have a pre-paid Funeral Plan? <a id="login_pop" href="#help3"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /></a></h3>
                      <p class="tx-areamf">
                        <input type="radio" id="is_pre_paid1" name="is_pre_paid" class="checkbox" value="yes" <?php if($person['is_pre_paid'] == 'yes') echo "checked=checked"; else echo "checked=checked";?>/>
                        <span class="ch-field">Yes </span> </p>
                      <p class="tx-areamf">
                        <input type="radio" id="is_pre_paid2" name="is_pre_paid" class="checkbox" value="no" <?php if($person['is_pre_paid'] == 'no') echo "checked=checked";?>/>
                        <span class="ch-field">No </span> </p>
						     <p class="tx-areamf">
                        <input type="radio" id="is_pre_paid3" name="is_pre_paid" class="checkbox" value="notsure" <?php if($person['is_pre_paid'] == 'notsure') echo "checked=checked";?>/>
                        <span class="ch-field">Not Sure </span> </p>
                      <!--<p class="tx-areamf">
                              <input type="radio" id="nopre" name="nopre" class="checkbox" />
                                <span class="ch-field">No preference  </span>
                            </p>--> 
                    </div>
                    <div id="is_prepaid_div" style="float:left;">
                      <div class="f-row-1">
                        <lebel>If YES, the nominated funeral director must direct the funeral. </lebel>
                        <lebel>Enter the name of the Funeral Director and contact details below: </lebel>
                      </div>
                      <div class="f-row-1">
                        <p class="fl-name">
                          <lebel>Business  Name:</lebel>
                          <input type="text" name="business_name" id="business_name" value="<?php echo $person['business_name'];?>" class="text-n" />
                        </p>
                        <p class="fr-name">
                          <lebel>Address Line 1</lebel>
                          <input type="text" name="business_address1" id="business_address" value="<?php echo $person['business_address1'];?>" class="text-n" />
                        </p>
                        <p class="fr-name">
                          <lebel>Address Line 2</lebel>
                          <input type="text" name="business_address2" id="address2" value="<?php echo $person['business_address2'];?>" class="text-n" />
                        </p>
                      </div>
                      <div class="f-row-1">
                        <p class="fr-name" style="padding-left: 0;margin-right: 15px;">
                          <lebel>State:</lebel>
                          <select name="business_state" id="business_state" class="text-n" >
                            <option value="">Select state/region</option>
                            <?php
									$statesql = "SELECT * FROM states ORDER BY state_name";
									$statesex = mysql_query($statesql);
									
									while($states = mysql_fetch_assoc($statesex))
									{
										if($person['business_state'] == $states['state_name'])
										{
											$selected = 'selected=selected';
										}
										else
										{
											$selected = '';
										}
										echo '<option value="'.$states['state_id'].'" '.$selected.'>'.$states['state_name'].'</option>';
									}
								?>
                          </select>
                        </p>
                        <p class="fl-name">
                          <lebel>Suburb:</lebel>
                          <input type="text" name="business_suburb" id="business_suburb" value="<?php echo $person['business_suburb'];?>" class="text-n" />
                        </p>
                        <p class="fr-name">
                          <lebel>Postcode:</lebel>
                          <input type="text" name="business_postcode" id="business_postcode" value="<?php echo $person['business_postcode'];?>" class="text-n"  maxlength="4"/>
                        </p>
                      </div>
                      <div class="f-row-1">
                        <p class="fl-name">
                          <lebel>Telephone:</lebel>
                          <input type="text" name="business_telephone" id="business_telephone" value="<?php echo $person['business_telephone'];?>" class="text-n"  maxlength="10"/>
                        </p>
                        <p class="fr-name">
                          <lebel>Mobile:</lebel>
                          <input type="text" name="business_mobile" id="business_mobile" value="<?php echo $person['business_mobile'];?>" class="text-n"  maxlength="10"/>
                        </p>
                        <p class="fr-name">
                          <lebel>Email:</lebel>
                          <input type="text" name="business_email" id="business_email" value="<?php echo $person['business_email'];?>" class="text-n" />
                        </p>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="f-row-2">
                  <p style="float:right;">
                    <input type="button" id="dsubmit" class="redirect_signup login_button" value="Next"/>
                  </p>
                  <p style="float:left;"> <a href="person-making-arrangements.php">
                    <input type="button" class="new_button form_btn2" value="previous" style="width:120px;"/>
                    </a> </p>
                </div>
              </form>
              <!--end mpd-form--> 
            </div>
          </div>
          <!--end content-wrap--> 
        </div>
      </div>
      <!--end web-layout --> 
      
      <!--<div class="floating-menu">
<p class="h4">My Funeral Plan Checklist</p>
	<ul>
         <li><a href="person-making-arrangements.php" title="" id="person_making">1. Person Making Arrangements</a></li>
        <li><a href="details-of-deceased.php" title="">2. Details of Deceased</a></li>
        <li><a <?php if($committalcount > 0){?>href="details-of-committal.php"<?php }else {?>href="javascipt:void(0);" id= "committallink"<?php }?>  title="">3. Details of Committal</a></li>
        <li><a <?php if($funeral_service_detailsquerycount > 0){?>href="details-of-funeral-service.php"<?php }else {?>href="javascipt:void(0);" id= "funeralservicelink"<?php }?>  title="">4. Details of Funeral Service</a></li>
        <li><a <?php if($after_funeralcount > 0){?>href="after-the-funeral.php"<?php }else {?>href="javascipt:void(0);" id= "afterfunerallink"<?php }?>  title="">5. After the Funeral</a></li>
        
     </ul>
</div>--> 
      
      <!-- <script type="text/javascript" src="<?php echo base_url;?>js/jquery.min.js"></script>--> 
      <script type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.fancybox-1.3.4.pack.js"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url;?>css/Old_Include_Css/jquery.fancybox-1.3.4.css" media="screen" />
      <script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/
			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
		});
	</script>
      <link rel="stylesheet" href="<?php echo base_url;?>css/Old_Include_Css/jquery.ui.all.css" type="text/css" />
      <script language="javascript" type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.ui.core.js"></script> 
      <script language="javascript" type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.ui.widget.js"></script> 
      <script language="javascript" type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.ui.datepicker.js"></script> 
      <script language="javascript" type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.ui.datepicker.js"></script> 
      <script type="text/javascript" language="javascript">
    $(function() {
        $( "#searchsdate" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    
            $( "#searchsdate1" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
</script> 
    </div>
  </div>
  <?php include '../include/footer1.php';?>

</body>
</html>
<?php
	}
	else
	{
		$url='../signin.php';	
		header('Location:'.$url);
	}
?>