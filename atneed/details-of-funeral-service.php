<?php 
ob_start();
session_start();
include_once('../include/config.php');
include '../include/header.php';

if(!isset($_SESSION['client']))
{
	header("location:../signin.php");	
}


$sel_value = mysql_query("select * from funeral_service_details where person_making_id=".$_SESSION['client']);
$count_value = mysql_num_rows($sel_value);
$rel_key = mysql_fetch_assoc($sel_value);
if($count_value > 0)
{
  header("location:edit_service.php");	
}
if(isset($_POST['form_4']))
{
	extract($_POST);
	if($is_religious == 'non-religious')
	{
	  $religious_details = '';
	}
	if($funeral_place == 'Other')
	{
	  $funeral_held = $funeral_held_detail;
	}
	else
	{
	  $funeral_held = '';
    }
	if($funeral_place == 'At ___followed by the committal at the cemetery')
	{
	  $funeral_place_choice = $cementary_held_funeral;	
	}
	if($is_viewing == 'neither')
	{
	   $is_viewing_private ='neither';
	   $held = '';
	   $held_detail_word = '';
	   $viewing_day = '';
	   $viewing_time = '';
	   $estimate_people_rosary = '';
	   $is_special_clothing = '';
	   $special_clothing_details = '';	   
	}
	if($held == 'other' && $is_viewing != 'neither' )
	{
	  $held_detail_word = $held_detail;
    }
	else 
	{
	  $held_detail_word = '';
	}
	if($is_special_clothing == 'yes')
	{
	  $special_cloth = $special_clothing_details;
	}
	else
	{
	  $special_cloth = '';
	}
	if($casket_category == 'Other type')
	{
	  	$other_coffin = $other_coffin;
	}
	else
	{
	  $other_coffin = '';	
	}
	if($is_minister == 'no')
	{
	  $minister_name  = '';
	  $minister_email = '';
	  $minister_phone = '';
	}
	else
	{
	  $minister_name  = $minister_name;
	  $minister_email = $minister_email;
	  $minister_phone = $minister_phone;
	}
	if($is_special_reading == 'no')
	{
	  $reader_name = '';
	  $poems       = '';
	}
	if($is_newpaper == 'no')
	{
	  $newpaper_name = '';
	}
	if($transport == 'other')
	{
	 $transport_detail_other = $transport_detail;
	}
	
	if($limousines == 'no')
	{
	  $limousines_details = '';
	}
	if($is_floral == 'no')
	{
	   $floral_value = '';
	   $flower_type_value = ''; 
	   $colours_value  = '';
	}
	
	if($is_floral == 'yes' &&  in_array("other", $_POST['floral']))
	{
	   $floral_value = implode(",", $_POST['floral']);
	   $flower_type_value = $flower_type; 
	   $colours_value  = $colours;
	}
	else if($is_floral == 'yes')
	{
		$floral_value = implode(",", $_POST['floral']);
	   $flower_type_value = ''; 
	   $colours_value  = ''; 
	}
	else
	{
	   $floral_value = '';
	   $flower_type_value = ''; 
	   $colours_value  = ''; 
	}
	if($is_donation == 'no')
	{
	 $organisation_name = '';
	}
	if($is_stationery == 'yes' && in_array("other", $_POST['stationery']))
	{
		$stationery = implode(",", $_POST['stationery']);	  
	   	$staionery_detail_value = $staionery_detail; 	  	
	}
	else if($is_stationery == 'yes')
	{
		$stationery = implode(",", $_POST['stationery']);	  
	   	$staionery_detail_value = ''; 
	}
	else
	{
	    $stationery = '';	  
	   	$staionery_detail_value = '';
	}
	if($is_music == 'no')
	{
	  $name_cemnt  = '';
	  $state = '';
      $music_leaving = '';
	}
	if($is_musician == 'no')
	{
	  $musician_name  = '';
	  $musician_email = '';
      $musician_phone = '';
	}
	if($bearers == 'funeral director')
	{
	  $bearer_name1 = '';
	  $bearer_realtionship1 = '';
	  $bearer_sex1 = '';
	}
	if($funeral_release == 'yes' && in_array("other", $_POST['funeral_release_type']))
	{
		$funeral_release_type = implode(",", $_POST['funeral_release_type']);
		$funeral_release_detail_value = $funeral_release_detail; 
	}
	else if($funeral_release == 'yes')
	{
		$funeral_release_type = implode(",", $_POST['funeral_release_type']);
		$funeral_release_detail_value = '';
	}
	else
	{
	    $funeral_release_type = '';
		$funeral_release_detail_value = '';
	}
	if($refreshment == 'no')
	{
	  $refreshment_type = '';
      $ref_people = '';
	}
	else
	{
		$refreshment_type = implode(",", $_POST['refreshment_type']);
	}
	if($special_arrangement == 'no')
	{
	  $special_arrangement_detail = '';
	}
	 $preffered_day=implode(",", $_POST['preffered_day']);
	if($day_service_status == 'yes')
	{
		 $preferred_date1=$_POST['preferred_date1'];
		$preferred_date2=$_POST['preferred_date2'];
	
	}
	else
	{
		$preferred_date1='';
		$preferred_date2='';
	
	}
	
	
	if($transport_status == 'yes')
	{
		 $pickup_loc=$_POST['pickup_loc'];
		$return_loc=$_POST['return_loc'];
		$special_request=$_POST['special_request'];
	
	}
	else
	{
		$pickup_loc='';
		$return_loc='';
		$special_request='';
	
	}
	$date = date("Y-m-d H:i:s",time());
	
	if($count_value == 0){
		
			
		
	  $sql = mysql_query("INSERT INTO `funeral_service_details` (`person_making_id`,`day_of_service`, `day_service_status`,`date_service1`, `date_service2`, `time_of_service`, `num_of_people`, `funeral_type`, `funeral_service`, `funeral_place`,`funeral_place_choice`,`funeral_held`, `funeral_status`, `funeral_religion`, `rosary_type`, `rosary_view`, `rosary_place`, `rosary_place_details`, `rosary_day`, `rosary_time`, `rosary_num_people`, `rosary_jewellary`, `num_of_jewellary`, `embalmed_body`, `casket_type_category`, `other_coffin`,`casket_type_name`,`service_performer`, `service_performer_name`, `service_performer_email`, `service_performer_phone`, `eulogy_service`, `funeral_special_readings`, `eulogy_service_persons`, `eulogy_service_poems`, `funeral_notice`, `funeral_newspaper`, `funeral_transport`,`transport_detail`,`funeral_transport_material`, `funeral_seats`,`transport_status`, `funeral_location_to`, `funeral_location_from`, `funeral_special_request`, `funeral_cortege`, `floral_arrangement`, `floral_type`, `floral_flower`, `floral_colour`, `funeral_donation`, `donation_organisation`, `funeral_stationary`, `stationary_type`,`staionery_detail`,`is_music`,`funeral_music_enter`, `funeral_music_mid`, `funeral_music_enter_leave`, `funeral_musician`,`singer_name`, `singer_email`, `singer_phone`, `funeral_media`,`funeral_bearer`, `funeral_release`, `funeral_release_type`,`funeral_release_detail` ,`funeral_refreshment`, `refreshment_menu`, `refreshment_people`, `other_funeral_request`, `request_description`, `date`)
	 
 VALUES 
 
 ('$_SESSION[client]','$preffered_day','$day_service_status','$preferred_date1','$preferred_date2', '$prefered_time', '$estimate_people', '$is_private', '$is_single', '$funeral_place','$funeral_place_choice', '$funeral_held', '$is_religious', '$religious_details', '$is_viewing', '$is_viewing_private', '$held', '$held_detail_word', '$viewing_day', '$viewing_time', '$estimate_people_rosary', '$is_special_clothing', '$special_cloth', '$is_embalmed', '$casket_category','$other_coffin', '$coffin_name','$is_minister', '$minister_name', '$minister_email', '$minister_phone', '$is_eulogy', '$is_special_reading','$reader_name', '$poems', '$is_newpaper', '$newpaper_name', '$transport', '$transport_detail_other', '$limousines', '$limousines_details','$transport_status','$pickup_loc', '$return_loc', '$special_request', '$funeral_cortege', '$is_floral', '$floral_value', '$flower_type_value', '$colours_value', '$is_donation', '$organisation_name', '$is_stationery', '$stationery','$staionery_detail_value', '$is_music','$name_cemnt', '$state','$music_leaving','$is_musician', '$musician_name', '$musician_email', '$musician_phone', '$is_media', '$bearers','$funeral_release', '$funeral_release_type','$funeral_release_detail_value', '$refreshment', '$refreshment_type', '$ref_people', '$special_arrangement', '$special_arrangement_detail', '$date');");
$service_id = mysql_insert_id();
//if($bearers=='Family/Friend')
  $bearer_hidden = $_POST['bearer_hidden'];
	for($i=1;$i<=$bearer_hidden;$i++)      /*--- Family and friends table---*/
	{
		if(isset($_POST['bearer_name'.$i]))
		{
			
			$sql1 = "INSERT
					INTO 
						desicision_funeral_bearer
						(
							descision_service_id,
							person_making_id,
							bearer_name,
							bearer_relationship,
							bearer_sex
						)
					VALUES
						(
							'$service_id',
							'".$_SESSION['client']."',
							'".$_POST['bearer_name'.$i]."',
							'".$_POST['bearer_realtionship'.$i]."',
							'".$_POST['bearer_sex'.$i]."'
						)
					";
			
			$a = mysql_query($sql1);
		}		
		
	}
    if($sql)
    {
      header("location:after-the-funeral.php");
        
     }
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eziFunerals</title>
<link href="favicon.icon" rel="shortcut icon">
<link href="<?php echo base_url;?>css/Old_Include_Css/style1.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url;?>js/Old_Include_Js/jquery-1.9.js" type="text/javascript"></script>
<script src="<?php echo base_url;?>js/Old_Include_Js/detailservice-vali.js" type="text/javascript"></script>
<script>
function checkField(select_item)
{
  if(select_item == "Other type")
  {
	document.getElementById("other_casket").style.display = "";
    document.getElementById("none_casket").style.display = "none";
  }
  else
  {
	document.getElementById("none_casket").style.display = "";
    document.getElementById("other_casket").style.display = "none";
  }	
}
function showHide(section){

if(section=="day_service_yes")
{
document.getElementById("day_service").style.display = "block";
}
else if(section=="day_service_no")
{
document.getElementById("day_service").style.display = "none";
}
if(section=="transport_status_yes")
{
document.getElementById("transport_status_div").style.display = "block";
}
else if(section=="transport_status_no")
{
document.getElementById("transport_status_div").style.display = "none";
}

if(section == "non-religious"){
document.getElementById("div_2").style.display = "";
document.getElementById("div_1").style.display = "none";
}
else if(section == "religious"){
document.getElementById("div_1").style.display = "";
document.getElementById("div_2").style.display = "none";
}
if(section == "neither"){
document.getElementById("div_4").style.display = "";
document.getElementById("div_3").style.display = "none";
}
else if(section == "viewing" || section == "rosary"){
document.getElementById("div_3").style.display = "";
document.getElementById("div_4").style.display = "none";
}
if(section == "no"){
document.getElementById("div_6").style.display = "";
document.getElementById("div_5").style.display = "none";
}
else if(section == "yes"){
document.getElementById("div_5").style.display = "";
document.getElementById("div_6").style.display = "none";
}
if(section == "no_read"){
document.getElementById("div_8").style.display = "";
document.getElementById("div_7").style.display = "none";
}
else if(section == "yes_read"){
document.getElementById("div_7").style.display = "";
document.getElementById("div_8").style.display = "none";
}
if(section == "no_news"){
document.getElementById("div_10").style.display = "";
document.getElementById("div_9").style.display = "none";
}
else if(section == "yes_news"){
document.getElementById("div_9").style.display = "";
document.getElementById("div_10").style.display = "none";
}
if(section == "other_transport"){
document.getElementById("div_12").style.display = "";
document.getElementById("div_11").style.display = "none";
}
else if(section == "Hearse"){
document.getElementById("div_11").style.display = "";
document.getElementById("div_12").style.display = "none";
}
if(section == "no_lumi"){
document.getElementById("div_14").style.display = "";
document.getElementById("div_13").style.display = "none";
}
else if(section == "yes_lumi"){
document.getElementById("div_13").style.display = "";
document.getElementById("div_14").style.display = "none";
}
if(section == "no_floral"){
document.getElementById("div_16").style.display = "";
document.getElementById("div_15").style.display = "none";
}
else if(section == "yes_floral"){
document.getElementById("div_15").style.display = "";
document.getElementById("div_16").style.display = "none";
}
if(section == "other_floral"){

if (document.getElementById('floral1').checked){
        document.getElementById("div_17").style.display = "";
		document.getElementById("div_18").style.display = "none";
}else{
		document.getElementById("div_17").style.display = "none";
		document.getElementById("div_18").style.display = "";
}

}
if(section == "no_donation"){
document.getElementById("div_20").style.display = "";
document.getElementById("div_19").style.display = "none";
}
else if(section == "yes_donation"){
document.getElementById("div_19").style.display = "";
document.getElementById("div_20").style.display = "none";
}
if(section == "no_stat"){
document.getElementById("div_22").style.display = "";
document.getElementById("div_21").style.display = "none";
}
else if(section == "yes_stat"){
document.getElementById("div_21").style.display = "";
document.getElementById("div_22").style.display = "none";
}

if(section == "no_music"){
document.getElementById("div_78").style.display = "";
document.getElementById("div_77").style.display = "none";
}
else if(section == "yes_music"){
document.getElementById("div_77").style.display = "";
document.getElementById("div_78").style.display = "none";
}


if(section == "no_musician"){
document.getElementById("div_24").style.display = "";
document.getElementById("div_23").style.display = "none";
}
else if(section == "yes_musician"){
document.getElementById("div_23").style.display = "";
document.getElementById("div_24").style.display = "none";
}
if(section == "no_family"){
document.getElementById("div_26").style.display = "";
document.getElementById("div_25").style.display = "none";
}
else if(section == "yes_family"){
document.getElementById("div_25").style.display = "";
document.getElementById("div_26").style.display = "none";
}
if(section == "no_rel"){
document.getElementById("div_28").style.display = "";
document.getElementById("div_27").style.display = "none";
}
else if(section == "yes_rel"){
document.getElementById("div_27").style.display = "";
document.getElementById("div_28").style.display = "none";
}


if(section == "funeral_release_detail"){
	if (document.getElementById('funeral_release_detail').checked){
			document.getElementById("div_76").style.display = "";
			document.getElementById("div_81").style.display = "none";
	}else{
			document.getElementById("div_76").style.display = "none";
			document.getElementById("div_81").style.display = "";
	}

}

if(section == "no_refreshment"){
document.getElementById("div_30").style.display = "";
document.getElementById("div_29").style.display = "none";
}
else if(section == "yes_refreshment"){
document.getElementById("div_29").style.display = "";
document.getElementById("div_30").style.display = "none";
}
if(section == "no_arr"){
document.getElementById("div_32").style.display = "";
document.getElementById("div_31").style.display = "none";
}
else if(section == "yes_arr"){
document.getElementById("div_31").style.display = "";
document.getElementById("div_32").style.display = "none";
}
if(section == "rosary_held"){
document.getElementById("shalini").style.display = "";
document.getElementById("rakesh").style.display = "none";
}
else if(section == "rosary_held_chapel" || section == "rosary_held_church"){
document.getElementById("rakesh").style.display = "";
document.getElementById("shalini").style.display = "none";
}
if(section == "yes_end"){
document.getElementById("end_div_yes").style.display = "";
document.getElementById("end_div_no").style.display = "none";
}
else if(section == "no_end"){
document.getElementById("end_div_no").style.display = "";
document.getElementById("end_div_yes").style.display = "none";
}
if(section == "held_other"){
document.getElementById("div_65").style.display = "";
document.getElementById("div_70").style.display = "none";
}
else if(section == "held_app1"  || section == "held_chap" || section == "held_committel"  || section == "held_direct" || section == "held_grave"  || section == "held_cem"){
document.getElementById("div_70").style.display = "";
document.getElementById("div_65").style.display = "none";
}
if(section == "stationary_other"){
	if (document.getElementById('stationary_other').checked){
			document.getElementById("div_75").style.display = "";
			document.getElementById("div_80").style.display = "none";
	}else{
			document.getElementById("div_75").style.display = "none";
			document.getElementById("div_80").style.display = "";
	}

}

}
</script>
<script type="text/javascript">
$(document).ready(function() {

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
$(document).ready(function (){  
$('#bearer_add_button').live("click",function()
	{
		var row = parseInt($('#bearer_hidden').val());
		var new_row = row + 1;
		
		$('#bearer_table').append('<tr><td><input type="text" id="bearer_name'+new_row+'" name="bearer_name'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="bearer_realtionship1'+new_row+'" name="bearer_realtionship'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="bearer_sex'+new_row+'" name="bearer_sex'+new_row+'" class="ontintext-tbl" /></td><td><a href="javascript:void(0);" id="familycross1" hidden_value="bearer_hidden" class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#bearer_hidden').val(new_row);
		
		
	});
	$('.remove').live("click",function()
	{
		var hidden_value = $(this).attr('hidden_value');
		var rows = parseInt($('#'+hidden_value).val());
		$(this).closest('tr').remove();
	});
});
</script>


</head>
<body>
<!--start web-layout -->
<div class="web-layout">
  <div class="web-960">
    <!--start header-form -->
    <!--end header-form -->
    <!--start form-navigation--><br /><br /><br /><br />
	<div class="container">
    <div class="form-navigation"><img src="<?php echo base_url;?>images/nav04.png" alt="" /></div>
    <!--end form-navigation-->
    <!--start content-wrap-->
    <div class="content-wrap">
      <div class="left-content">
        <h2 class="heading">Details Of Funeral Service</h2>
        <!--start mpd-form-->
        <form name="person_making_form" action="" method="POST">
          <div class="mpd-form">
            <div class="help-f"></div>
            <fieldset class="fieldset">
            <legend class="legend">Date And Time Of Service</legend>
            <div class="f-row-1">
              <h3>Do you have a preferred day for the service? <a id="example2" href="#inline2"> <img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /> </a></h3>
              <div style="display: none;">
                <div id="inline2" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;"> Cemeteries are generally not open on Sundays </div>
              </div>
              <p class="tx-areada">
                <input type="checkbox" id="preffered_day" name="preffered_day[]" class="checkbox" value="monday" checked="checked"/>
                <span class="ch-field">Monday </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="preffered_day" name="preffered_day[]" class="checkbox" value="tuesday"/>
                <span class="ch-field">Tuesday </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="preffered_day" name="preffered_day[]" class="checkbox"  value="wednesday"/>
                <span class="ch-field">Wednesday </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="preffered_day" name="preffered_day[]" class="checkbox" value="thursday"/>
                <span class="ch-field">Thursday </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="preffered_day" name="preffered_day[]" class="checkbox" value="firday"/>
                <span class="ch-field">Friday </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="preffered_day" name="preffered_day[]" class="checkbox" value="saturday"/>
                <span class="ch-field">Saturday </span> </p>
            </div>
            <div class="f-row-1">
              <h3>Do you have a preferred date for the service? </h3>
              <div style="display: none;">
                <div id="inline3" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                  <p>It is important to specify the method of payment to the funeral company. The method chosen to pay the funeral can result in savings and discounts offered by some funeral companies.</p>
                </div>
              </div>
			   <p class="tx-areada">
                <input type="radio" id="day_service_status_yes" name="day_service_status" class="checkbox" value="yes"  onclick="showHide('day_service_yes')" checked="checked"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="day_service_status_no" name="day_service_status" class="checkbox" value="no" onclick="showHide('day_service_no')"/>
                <span class="ch-field">No </span> </p>
            </div>
			<div id="day_service">
            <div class="f-row-1">
              <p class="fl-name">
                <lebel>Date1:</lebel>
                <input type="text" name="preferred_date1" id="searchsdate" value="" class="text-ncal" />
              </p>
              <p class="fl-name" style="padding-left:12px;">
                <lebel>Date2:</lebel>
                <input type="text" name="preferred_date2" id="searchsdate1" value="" class="text-ncal" />
              </p>
            </div>
			</div>
            <div class="f-row-1">
              <h3>Do you have a preferred time for the service?</h3>
              <p class="tx-area">
                <input type="radio" id="prefered_time" name="prefered_time" class="checkbox" value="morning" checked="checked"/>
                <span class="ch-field">Morning </span> </p>
              <p class="tx-area">
                <input type="radio" id="prefered_time" name="prefered_time" class="checkbox" value="afternoon"/>
                <span class="ch-field">Afternoon </span> </p>
            </div>
            <div class="f-row-1">
              <h3>How many people do you estimate may attend the service: </h3>
            </div>
            <div class="f-row-1">
              <p class="fl-name">
                <input type="text" name="estimate_people" id="estimate_people" value="" class="text-n" />
              </p>
            </div>
            </fieldset>
            <div class="help-f"></div>
            <div style="display: none;">
              <div id="inline4" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>There is a natural tendency for many people to wish for privacy when they are 	going through the emotion of losing someone.
                  However, many grieving counsellors suggest that the support that comes from 	allowing a wider circle of friends and associates to pay their respects can be a 	significant part of the healing process. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Details Of Funeral Service</legend>
            <div class="f-row-1">
              <h3>Would you prefer a private or public funeral? <a id="example2" href="#inline5"> <img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /> </a> </h3>
              <div style="display: none;">
                <div id="inline5" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                  <p>There is a natural tendency for many people to wish for privacy when they are going through the emotion of losing someone. However, many grieving counsellors suggest that the support that comes from allowing a wider circle of friends and associates to pay their respects can be a significant part of the healing process. </p>
                </div>
              </div>
              <p class="tx-area">
                <input type="radio" id="is_private" name="is_private" class="checkbox" value="private" checked="checked"/>
                <span class="ch-field">Private </span> </p>
              <p class="tx-area">
                <input type="radio" id="is_private" name="is_private" class="checkbox" value="public"/>
                <span class="ch-field">Public </span> </p>
            </div>
            <div class="f-row-1">
              <h3>Do you require a single or double service?<a id="example2" href="#inline6"> <img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /> </a></h3>
              <div style="display: none;">
                <div id="inline6" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                  <p>A single service is cheaper than a double service and is commonly held entirely at one location. The most common places for a single service are at graveside, crematorium or the funeral home chapel.<br>
                    <br>
                    A double service is more expensive and is the most requested type of funeral. It usually involves a service either in a church or at a chapel and then a funeral procession to the cemetery or crematorium. This provides the greatest opportunity for tradition, participation and attendance of family and friends. </p>
                </div>
              </div>
              <p class="tx-area">
                <input type="radio" id="is_single" name="is_single" class="checkbox" value="single" checked="checked"/>
                <span class="ch-field">Single </span> </p>
              <p class="tx-area">
                <input type="radio" id="is_single" name="is_single" class="checkbox" value="double"/>
                <span class="ch-field">Double </span> </p>
            </div>
            <div class="f-row-1">
              <h3>Where would you like the funeral service to be held? <a id="example2" href="#inline6"> <img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /> </a></h3>
              <div style="display: none;">
                <div id="inline6" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                  <p>Some venues where the service is to be held will require approvals from local government	and special fees may apply. </p>
                </div>
              </div>
              <p class="tx-areafuns">
                <input type="radio" id="graveside" name="funeral_place" class="checkbox" checked="checked" value="Graveside" onclick="showHide('held_grave')" />
                <span class="ch-field">Graveside </span> </p>
              <p class="tx-areafuns">
                <input type="radio" id="cem_cremc_ch" name="funeral_place" class="checkbox" value="Cemetery/Crematorium Chapel (fee applies)" onclick="showHide('held_cem')" />
                <span class="ch-field">Cemetery/Crematorium Chapel (fee applies) </span> </p>
              <p class="tx-areafuns">
                <input type="radio" id="cem_cremc_appl" name="funeral_place" class="checkbox" value="Cemetery/Crematorium Chapel (fee applies) followed by a committal at the graveside" onclick="showHide('held_app1')"/>
                <span class="ch-field">Cemetery/Crematorium Chapel (fee applies) followed by a committal at the graveside </span> </p>
              <p class="tx-areafuns">
                <input type="radio" id="fun_dir_chap" name="funeral_place" class="checkbox" value="Funeral directors Chapel (fee applies) followed by a committal at the cemetery" onclick="showHide('held_chap')"/>
                <span class="ch-field">Funeral directors Chapel (fee applies) followed by a committal at the cemetery </span> </p>
              <p class="tx-areafuns">
                <input type="radio" id="comt_cemt_foll" name="funeral_place" class="checkbox" value="At ___followed by the committal at the cemetery" onclick="showHide('held_committel')"/>
                <span class="ch-field">At <input style="width:100px; border-bottom:1px solid #000; border-top:0; border-left:0; border-right:0; " type="text" name="cementary_held_funeral" value="" />followed by the committal at the cemetery </span> </p>
              <p class="tx-areafuns">
                <input type="radio" id="dirt_commt" name="funeral_place" class="checkbox" value="Direct Committal" onclick="showHide('held_direct')" />
                <span class="ch-field">Direct Committal</span> </p>
              <p class="tx-areafuns">
                <input type="radio" id="other" name="funeral_place" class="checkbox" value="Other" onclick="showHide('held_other')" />
                <span class="ch-field">Other</span> </p>
               <div id="div_65" style="display:none">
                <p class="tx-area">
               <input type="text" name="funeral_held_detail" id="funeral_held_detail" value="" class="text-n" />
             </p></div><div id="div_70"></div>
            </div>
            <div class="f-row-1">
              <h3>Do you require a religious or non-religious service? </h3>
              <p class="tx-area">
                <input type="radio" id="is_religious_id" name="is_religious" class="checkbox" value="religious" checked="checked" onclick="showHide('religious')"/>
                <span class="ch-field">Religious </span> </p>
              <p class="tx-area">
                <input type="radio" id="is_religious1" name="is_religious" class="checkbox" value="non-religious" onclick="showHide('non-religious')"/>
                <span class="ch-field">Non-Religious </span> </p>
            </div>
            <div class="f-row-1" id="div_1">
              <p>
                <lebel> If you answered YES, what religion/spiritual belief/philosophy will the service be based upon? </lebel>
              </p>
              <p class="fl-name">
                <!--<lebel>Cemetery Area:</lebel>-->
                <input type="text" name="religious_details" id="religious_details" value="" class="text-n" />
              </p>
            </div> <div id="div_2" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline7"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline7" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>A viewing and/or rosary are usually arranged by funeral directors using their chapel. Most bodies are viewed in the coffin, although other settings can be arranged. A fee is charged for viewing at agreed times. Costs may be higher if more than one viewing is arranged. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Viewings and Rosaries</legend>
            <div class="f-row-1">
              <h3>Will you require a viewing or rosary? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_viewing" name="is_viewing" class="checkbox" value="viewing" checked="checked" onclick="showHide('viewing')"/>
                <span class="ch-field">Viewing </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_viewing" name="is_viewing" class="checkbox"  value="rosary" onclick="showHide('rosary')"/>
                <span class="ch-field">Rosary </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_viewing" name="is_viewing" class="checkbox"  value="neither" onclick="showHide('neither')"/>
                <span class="ch-field">Neither </span> </p>
            </div>
            <div id="div_3">
            <div class="f-row-1">
              <h3>If you selected YES to a viewing or rosary, do you require it to be private or public?</h3>
              <p class="tx-area">
                <input type="radio" id="is_viewing_private" name="is_viewing_private" class="checkbox" value="private" checked="checked"/>
                <span class="ch-field">Private </span> </p>
              <p class="tx-area">
                <input type="radio" id="is_viewing_private" name="is_viewing_private" class="checkbox" value="public"/>
                <span class="ch-field">Public </span> </p>
            </div>
            <div class="f-row-1">
             <h3>Where would you like the viewing or rosary to be held? </h3>
             <p class="tx-area">
               <input type="radio" id="held" name="held" class="checkbox" value="church" checked="checked" onclick="showHide('rosary_held_church')"/>
               <span class="ch-field">Church </span> </p>
             <p class="tx-area" style="width:300px;">
               <input type="radio" id="held" name="held" class="checkbox" value="funeral director" onclick="showHide('rosary_held_chapel')"/>
               <span class="ch-field" >Funeral directors Chapel (fee applies) </span> </p>
             <p class="tx-area">
               <input type="radio" id="held" name="held" class="checkbox" value="other" onclick="showHide('rosary_held')"/>
               <span class="ch-field">Other </span> </p>
             <div id="shalini" style="display:none">
             <p class="tx-area">
               <input type="text" name="held_detail" id="held_detail" value="" class="text-n" />
             </p></div><div id="rakesh"></div>
           </div>
 

            <div class="f-row-1">
              <h3>Do you have a preferred day and time for the viewing or rosary? </h3>
              <p class="tx-areada">
                <input type="radio" id="viewing_day" name="viewing_day" class="checkbox" value="monday" checked="checked"/>
                <span class="ch-field">Monday </span> </p>
              <p class="tx-areada">
                <input type="radio" id="viewing_day" name="viewing_day" class="checkbox" value="tuesday"/>
                <span class="ch-field">Tuesday </span> </p>
              <p class="tx-areada">
                <input type="radio" id="viewing_day" name="viewing_day" class="checkbox" value="wednesday"/>
                <span class="ch-field">Wednesday </span> </p>
              <p class="tx-areada">
                <input type="radio" id="viewing_day" name="viewing_day" class="checkbox" value="thursday"/>
                <span class="ch-field">Thursday </span> </p>
              <p class="tx-areada">
                <input type="radio" id="viewing_day" name="viewing_day" class="checkbox" value="friday"/>
                <span class="ch-field">Friday </span> </p>
              <p class="tx-areada">
                <input type="radio" id="viewing_day" name="viewing_day" class="checkbox" value="saturday"/>
                <span class="ch-field">Saturday </span> </p>
              <br />
            </div>
            <div class="f-row-1">
              <p class="tx-areada">
                <input type="radio" id="viewing_time" name="viewing_time" class="checkbox" checked="checked" value="morning"/>
                <span class="ch-field">Morning</span> </p>
              <p class="tx-areada">
                <input type="radio" id="afternoon" name="viewing_time" class="checkbox" value="afternoon" />
                <span class="ch-field">Afternoon </span> </p>
            </div>
            <div class="f-row-1">
              <h3>How many people do you estimate may attend the viewing or rosary?</h3>
              <p class="fl-name">
                <lebel></lebel>
                <input type="text" name="estimate_people_rosary" id="estimate_people_rosary" value="" class="text-n" />
              </p>
            </div>
            <div class="f-row-1">
              <h3>Will you require the body to be dressed in special clothing and jewellery for the viewing or rosary? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_special_clothing" name="is_special_clothing" class="checkbox" value="yes" checked="checked" onclick="showHide('yes_end')" />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_special_clothing" name="is_special_clothing" class="checkbox" value="no" onclick="showHide('no_end')"/>
              <span class="ch-field">No </span> </p>
            </div>
            <div class="f-row-1" id="end_div_yes">
              <p>
                <lebel>List special items of clothing or jewellery to be provided:</lebel>
                <input type="text" name="special_clothing_details" id="special_clothing_deails" value="" class="text-n" />
              </p>
            </div><div id="end_div_no" style="display:none"></div>
            </div> <div id="div_4" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline9"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline9" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;"> Embalming is often called ‘cosmetic’ or ‘hygienic’ treatment by the funeral profession, and a charge is made for the service. It is not an essential process prior to burial or cremation
                </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Embalming</legend>
            <div class="f-row-1">
              <h3>Do you require the body to be embalmed? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_embalmed" name="is_embalmed" class="checkbox" value="yes" checked="checked"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_embalmed" name="is_embalmed" class="checkbox" value="no"/>
                <span class="ch-field">No </span> </p>
            </div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline10"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline10" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;"> 1) A coffin has a familiar shape and widens out from the top and narrows toward the feet. The lid also comes off with a coffin.<br />
                2) A casket is shaped with straight sides and has a hinged lid.<br />
                3)Standard coffin/casket from funeral directors are made of veneered chipboard with plastic handles and lining.<br />
                4) Pure wood coffin/casket and ‘caskets’ are available from funeral directors but can be more expensive. <br />
                5) “Eco” or ‘Green’ coffin/casket made of cardboard, pure wood, wicker and bamboo are available. Check for availability and prices before you decide, as some funeral directors may not use and/or supply green coffins.<br />
                6) Other types - if you require an unusual, or artist painted coffin, details of the supplier, design and size must be discussed. <br />
                7) Did you know you can save money by organising your own coffin or casket? </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Coffin Casket</legend>
            <div class="f-row-1">
              <h3>What type of coffin or casket do you require? </h3>
              <p class="fl-name">
                <lebel>Select Category:</lebel>
               <select name="casket_category" class="select-ezi" onchange="checkField(this.value)">
                <option value="Standard coffin/casket">Standard coffin/casket</option>
                <option value="Pure wood coffin/casket">Pure wood coffin/casket</option>
                <option value="Eco or Green coffin/casket">Eco or Green coffin/casket</option>
                <option value="Other type">Other type</option>
                </select></p>
              <!--<p class="fl-name">&nbsp;</p>
              <p class="fl-name">&nbsp;</p>-->
              <p class="fr-name">
                <lebel>Budget:</lebel>
                <select name="coffin_name" class="select-ezi" id="coffin_name">
                <option value="less than $500">Less than $500</option>
                <option value="501-1000">501 – 1000 </option>
                <option value="1001-2000">1001 - 2000</option>
                <option value="2001-3000">2001 - 3000</option>
                <option value="3001-4000">3001 - 4000</option>
                <option value="4001-5000">4001 - 5000</option>
                <option value="greater than 5000">Greater than 5000</option>
                </select>
              </p><div id="other_casket" style="display:none">
                <input type="text" value="" name="other_coffin" />
                </div><div id="none_casket"></div>
              <!--<p class="fr-name">
                <lebel>Supplier: </lebel>
                <input type="text" name="coffin_supplier" id="coffin_supplier" value="" class="text-n" />
              </p>-->
            </div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline11"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline11" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>A Funeral Celebrant is trained and certified to provide a funeral, memorial or 	celebration of life service that is highly personalised to reflect the character, 	lifestyle and beliefs of the person who died.<br />
                  <br />
                  Clergy are generally cheaper than a celebrant.<br />
                  <br />
                  Any suitably skilled friend or relative can take the service, if they agree. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Minister Or Celebrant</legend>
            <div class="f-row-1">
              <h3>Do you have a minister, celebrant or person in mind to perform the service? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_minister" name="is_minister" class="checkbox" value="yes" checked="checked" onclick="showHide('yes')"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_minister" name="is_minister" class="checkbox" value="no" onclick="showHide('no')"/>
                <span class="ch-field">No </span> </p>
            </div>
            <div class="f-row-1" id="div_5">
              <p class="fl-name">
                <lebel>If YES, please give the name </lebel>
                <input type="text" name="minister_name" id="minister_name" value="" class="text-n" />
              </p>
              <p class="fr-name">
                <lebel>Email:</lebel>
                <input type="text" name="minister_email" id="minister_email" value="" class="text-n" />
              </p>
              <p class="fr-name">
                <lebel>Phone:</lebel>
                <input type="text" name="minister_phone" id="minister_phone" value="" class="text-n" />
              </p>
            </div> <div id="div_6" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline12"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline12" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>The eulogy is the speech or presentation during the funeral ceremony that talks 	about the life and character of the person who died. The eulogy acknowledges the 	unique life of the person who died and affirms the significance of that life for all 	who shared in it. The eulogy typically lasts 15-20 minutes, although longer 	presentations may also be appropriate.</p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Eulogy</legend>
            <div class="f-row-1">
              <h3>Do you require a eulogy at the service about the deceased persons life? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_eulogy" name="is_eulogy" class="checkbox" value="yes" checked="checked"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_eulogy" name="is_eulogy" class="checkbox" value="no"/>
                <span class="ch-field">No </span> </p>
            </div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline28"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline28" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>Funeral poetry, readings and verse can enhance a funeral service or ceremony whether it is religious or non-religious. <br />
                  Funeral poems are a great way to share how you feel about someone you have lost and pay tribute to the memories that you hold dearest. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Special Readings</legend>
            <div class="f-row-1">
              <h3>Will you require any special readings to be read at the funeral service ? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_special_reading" name="is_special_reading" class="checkbox" value="yes" checked="checked" onclick="showHide('yes_read')"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_special_reading" name="is_special_reading" class="checkbox" value="no" onclick="showHide('no_read')"/>
                <span class="ch-field">No </span> </p>
            </div>
            <div class="f-row-1" id="div_7">
              <p>
                <lebel>If you answered YES, please provide details: </lebel>
              </p>
              <p class="fl-name">
              <p class="tx-areada" style="width:650px;"> <span class="ch-field" style="padding-left:0;">Details of person/s to deliver the reading </span>
                <input type="text" name="reader_name" id="reader_name" value="" class="text-n" style="margin-left:10px;" />
              </p>
              <p class="fl-name">
                <lebel>List text or poems: </lebel>
                <input type="text" name="poems" id="poems" value="" class="text-n"  />
              </p>
              </p>
            </div> <div id="div_8" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline29"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline29" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>A funeral notice is placed by the family, usually through the funeral director. It is an opportunity to publicly announce the death and funeral details of your loved one, and can also be used to pay tribute to the deceased. Details of where any donations or flowers can be sent may also be included in an funeral notice. Another way of saving money is to ask the funeral director not to include their business logo; otherwise you will be paying for their advertising. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Funeral Notices</legend>
            <div class="f-row-1">
              <h3>Do you require the funeral director to organise the funeral notices in the main newspaper? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_newpaper" name="is_newpaper" class="checkbox" value="yes" checked="checked" onclick="showHide('yes_news')"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_newpaper" name="is_newpaper" class="checkbox" value="no" onclick="showHide('no_news')"/>
                <span class="ch-field">No </span> </p>
            </div>
            <div class="f-row-1" id="div_9">
              <p class="fl-name">
                <lebel>If yes, which newspaper </lebel>
                <input type="text" name="newpaper_name" id="newpaper_name" value="" class="text-n" />
              </p>
            </div> <div id="div_10" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline13"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline13" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;"> Transporting a coffin to a funeral can be done in more ways than most people may 	realise, and can be one of the easiest things to personalise and make memorable if 	you choose. If you do NOT wish the body to be transported, you can arrange the 	coffin to be placed in the chapel before the mourners arrive. </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Funeral Transport</legend>
            <div class="f-row-1">
              <h3>How do you want the body to be transported:- </h3>
              <p class="tx-areada">
                <input type="radio" id="transport" name="transport" class="checkbox" value="Hearse" checked="checked" onclick="showHide('Hearse')"/>
                <span class="ch-field">Hearse </span> </p>
              <p class="tx-areada">
                <input type="radio" id="transport" name="transport" class="checkbox" value="other" onclick="showHide('other_transport')" />
                <span class="ch-field">Other </span> </p>
                <div id="div_12" style="display:none">
              <p class="tx-areada" style="width:450px;"> <span class="ch-field">(motorbike/horse & carriage) </span>
                <input type="text" name="transport_detail" id="transport_detail" value="" class="text-n" />
              </p>
              </div><div id="div_11"></div>
            </div>
            <div class="f-row-1">
              <h3>Do you require limousines or mourning cars for the immediate family? </h3>
              <p class="tx-areada">
                <input type="radio" id="limousines" name="limousines" class="checkbox" value="yes" checked="checked" onclick="showHide('yes_lumi')"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="limousines" name="limousines" class="checkbox" value="no" onclick="showHide('no_lumi')"/>
                <span class="ch-field">No </span> </p>
            </div>
            <div class="f-row-1" id="div_13">
              <p>
                <lebel>If you answered YES, how many seats will you require? </lebel>
              </p>
              <p class="tx-areada" style="width:450px;"> <span class="ch-field">No Of Seats&nbsp; </span>
                <input type="text" name="limousines_details" id="limousines_details" value="" class="text-n" />
              </p>
            </div> <div id="div_14" style="display:none"></div>
            <div class="f-row-1">
              <h3>Do you require transport requirements to and from the service? <a id="example2" href="#inline15"> <img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /> </a> </h3>
              <div style="display: none;">
                <div id="inline15" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                  <p>Pick up date and time to be determined with the funeral director following confirmation of funeral arrangements.</p>
                </div>
              </div>
			  <p class="tx-areada">
                <input type="radio" id="transport_status_yes" name="transport_status" class="checkbox" value="yes" onclick="showHide('transport_status_yes')" checked="checked"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="transport_status_no" name="transport_status" class="checkbox" value="no"  onclick="showHide('transport_status_no')"/>
                <span class="ch-field">No </span> </p>
            </div>
			 <div id="transport_status_div">
            <div class="f-row-1">
              <p class="fl-name">
                <lebel>Pick up location:</lebel>
                <input type="text" name="pickup_loc" id="pickup_loc" value="" class="text-n" />
              </p>
              <p class="fr-name">
                <lebel>Return location:</lebel>
                <input type="text" name="return_loc" id="return_loc" value="" class="text-n" />
              </p>
            </div>
			
            <div class="f-row-1">
              <p>
                <lebel>Special requests: (colour/special routes, etc) </lebel>
                <input type="text" name="special_request" id="special_request" value="" class="text-n" />
              </p>
            </div>
			</div>
            <div class="f-row-1">
              <h3>Do you require a funeral cortege? </h3>
              <p class="tx-areada">
                <input type="radio" id="funeral_cortege" name="funeral_cortege" class="checkbox" value="yes" checked="checked"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="funeral_cortege" name="funeral_cortege" class="checkbox" value="no"/>
                <span class="ch-field">No </span> </p>
            </div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline17"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline17" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>Some people choose not to have flowers. Some prefer donations and others prefer to provide them from their garden. Most wreaths are made of plastic frames, oasis and plastic wrapping. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Floral arrangements</legend>
            <div class="f-row-1">
              <h3>Do you require floral arrangements at the funeral? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_floral" name="is_floral" class="checkbox" value="yes" checked="checked" onclick="showHide('yes_floral')" />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_floral" name="is_floral" class="checkbox" value="no" onclick="showHide('no_floral')"/>
                <span class="ch-field">No </span> </p>
            </div>
            <div id="div_15">
            <div class="f-row-1">
              <p>
                <lebel>If you answered YES, what type of floral arrangements do you require: <a id="example2" href="#inline18"> <img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /> </a> </lebel>
              <div style="display: none;">
                <div id="inline18" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                  <p>The two most commonly used flowers for funerals are roses and carnations but these can be mixed with lilies, asters, delphiniums and gerbera daisies.  These types of flowers are popular at funeral services because they add colour, set the tone and lighten the mood. </p>
                </div>
              </div>
              </p>
              <p class="tx-areada">
                <input type="checkbox" id="floral" name="floral[]" class="checkbox" value="wreath" checked="checked" onclick="showHide('wreath')"  />
                <span class="ch-field">Wreath </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="floral" name="floral[]" class="checkbox" value="floral spray" onclick="showHide('floral_spray')"/>
                <span class="ch-field">Floral spray </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="floral" name="floral[]" class="checkbox" value="casket spray" onclick="showHide('casket_spray')"/>
                <span class="ch-field">Casket spray </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="floral" name="floral[]" class="checkbox" value="petals" onclick="showHide('petals')" />
                <span class="ch-field">Petals </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="floral1" name="floral[]" class="checkbox floralclass" value="other" onclick="showHide('other_floral')">
                <span class="ch-field">Other </span> </p>
            </div>
            
            <div class="f-row-1" id="div_17" style="display:none">
              <p class="fl-name">
                <lebel>Flower type:</lebel>
                <input type="text" name="flower_type" id="flower_type" value="" class="text-n" />
              </p>
              <p class="fr-name">
                <lebel>Colours:</lebel>
                <input type="text" name="colours" id="colours" value="" class="text-n" />
              </p>
            </div></div><div id="div_18"></div><div id="div_16" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline19"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline19" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>Where people oppose flowers or feel strongly about supporting the local hospice or charity, they choose this option. This is an important source of funds to these organisations. The donation must be announced in any obituary and the money sent by post, or a collection taken at the funeral service. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Donations</legend>
            <div class="f-row-1">
              <h3>Would you prefer donations at the funeral service in lieu of flowers? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_donation" name="is_donation" class="checkbox" value="yes" checked="checked" onclick="showHide('yes_donation')"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_donation" name="is_donation" class="checkbox" value="no" onclick="showHide('no_donation')"/>
                <span class="ch-field">No </span> </p>
            </div>
            <div class="f-row-1" id="div_19">
              <p>
                <lebel>If you answered YES, list the name of organisation </lebel>
              </p>
              <p class="fl-name">
                <input type="text" name="organisation_name" id="organisation_name" value="" class="text-n" />
              </p>
            </div> <div id="div_20" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline20"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline20" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>Funeral stationery, such as a program or memorial booklet, is an important part of 	the funeral service. The stationery not only serves as a keepsake for those who 	attend the service, it also allows the family to honour, celebrate, remember, and 	tell the life story of their loved one. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Funeral Stationery</legend>
            <div class="f-row-1">
              <h3>Do you require funeral stationery during the service? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_stationery" name="is_stationery" class="checkbox" value="yes" checked="checked" onclick="showHide('yes_stat')"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_stationery2" name="is_stationery" class="checkbox" value="no" onclick="showHide('no_stat')"/>
              <span class="ch-field">No </span> </p>
            </div>
            <div class="f-row-1" id="div_21">
              <p>
                <lebel>If you answered YES, what type of funeral stationery do you require: </lebel>
              </p>
              <p class="tx-areada">
                <input type="checkbox" id="stationery" name="stationery[]" class="checkbox" value="Attendance/Memorial Cards" checked="checked" onclick="showHide('stat_cards')"/>
                <span class="ch-field">Attendance/Memorial Cards </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="stationery" name="stationery[]" class="checkbox" value="booklets" onclick="showHide('stat_booklets')"/>
                <span class="ch-field">Booklets </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="stationery" name="stationery[]" class="checkbox" value="candles" onclick="showHide('stat_candles')"/>
                <span class="ch-field">Candles </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="stationary_other" name="stationery[]" class="checkbox" value="other" onclick="showHide('stationary_other')"/>
                <span class="ch-field">Other </span> </p>
                 <div id="div_75" style="display:none">
                <p class="tx-area">
               <input type="text" name="staionery_detail" id="staionery_detail" value="" class="text-n" />
             </p></div><div id="div_80"></div>
            </div><div id="div_22" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline21"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline21" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>People often include music in funeral and memorial services and there are no rules about the type of music that is best. It is advisable to choose music that provides 	comfort and stimulates pleasant memories of the departed person. Funeral songs 	that have meaning to you and your loved one are a perfect choice - his or her 	favourite song, the song that was playing when you met, the songs you liked to 	sing together. Please ensure that the music is available and known to whoever is making arrangements. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Music</legend>
            <div class="f-row-1">
              <h3>Do you require music at the funeral? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_music" name="is_music" class="checkbox" value="yes" checked="checked" onclick="showHide('yes_music')" />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_music" name="is_music" class="checkbox" value="no" onclick="showHide('no_music')"/>
                <span class="ch-field">No </span> </p>
            </div>
             <div class="f-row-1" id="div_77">
                <div class="f-row-1">
                  <h3>What music would you like played at the funeral service? </h3>
                </div>
                <div class="f-row-1">
                  <p class="fl-name">
                    <lebel>Music entering: (Song/artist)</lebel>
                    <input type="text" name="name_cemnt" id="name_cemnt" value="" class="text-n" />
                  </p>
                  <p class="fr-name">
                    <lebel>Music during: (Song/artist)</lebel>
                    <input type="text" name="state" id="state" value="" class="text-n" />
                  </p>
                  <p class="fr-name">
                    <lebel>Music leaving:  Song/artist)</lebel>
                    <input type="text" name="music_leaving" id="music_leaving" value="" class="text-n" />
                  </p>
                </div>
            </div><div id="div_78" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline22"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline22" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>Live music is very powerful – it can express love, joy, sadness, celebration, humour 	and solemnity. It can provide comfort and has been used for centuries to mark 	life's special occasions. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Musician and Singers</legend>
            <div class="f-row-1">
              <h3>Will you be having a musician or singer perform at the funeral service? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_musician" name="is_musician" class="checkbox" value="yes" checked="checked" onclick="showHide('yes_musician')" />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_musician" name="is_musician" class="checkbox" value="no" onclick="showHide('no_musician')"/>
                <span class="ch-field">No </span> </p>
            </div>
            <div class="f-row-1" id="div_23">
              <p class="fl-name">
                <lebel>Musician / singer details(Name): </lebel>
                <input type="text" name="musician_name" id="musician_name" value="" class="text-n" />
              </p>
              <p class="fr-name">
                <lebel>Email:</lebel>
                <input type="text" name="musician_email" id="musician_email" value="" class="text-n" />
              </p>
              <p class="fr-name">
                <lebel>Phone:</lebel>
                <input type="text" name="musician_phone" id="musician_phone" value="" class="text-n" />
              </p>
            </div><div id="div_24" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline23"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline23" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>Memorial DVD slide shows can be a great reminder of how someone lived their 	life, for both old and young family and friends. You can choose to show these 	presentations at the funeral or memorial service, or just to keep it or distribute it 	to guests for personal viewing as a comforting reminder and celebration of their 	life. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Media Tributes</legend>
            <div class="f-row-1">
              <h3>Will you require any media/DVD tribute during the funeral service ? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_media" name="is_media" class="checkbox" value="yes" checked="checked"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_media" name="is_media" class="checkbox" value="no"/>
                <span class="ch-field">No </span> </p>
            </div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline24"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline24" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>Although male bearers are traditional, there is no reason why women cannot perform this final act. A charge may apply for bearers provided by the funeral director </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Pall Bearers</legend>
            <div class="f-row-1">
              <h3>Would you prefer family/friend bearers OR bearers provided by a funeral director? </h3>
              <p class="tx-areada">
                <input type="radio" id="bearers" name="bearers" class="checkbox" value="family/friend" checked="checked" onclick="showHide('yes_family')"/>
                <span class="ch-field">Family/Friend </span> </p>
              <p class="tx-areada">
                <input type="radio" id="bearers" name="bearers" class="checkbox" value="funeral director" onclick="showHide('no_family')"/>
                <span class="ch-field">Funeral Director </span> </p>
            </div>
            <div id="div_25">
            <div class="f-row-1">
              <h3>If family bearers are provided, please give their names and their relationship to the deceased: </h3>
            </div>
           <!-- <div class="f-row-1">
              <p class="fl-name">
                <lebel>NAME</lebel>
                <input type="text" name="bearer_name" id="bearer_name" value="" class="text-n" />
              </p>
              <p class="fr-name">
                <lebel>RELATIONSHIP</lebel>
                <input type="text" name="bearer_realtionship" id="bearer_realtionship" value="" class="text-n" />
              </p>
              <p class="fr-name">
                <lebel>SEX</lebel>
                <input type="text" name="bearer_sex" id="bearer_sex" value="" class="text-n" />
              </p>
            </div>
            <div class="f-row-1" style="text-align:right;">
            <input type="hidden" value="1" id="bearer_hidden" name="bearer_hidden"/>
              <input type="button" id="bearer_add_button" value="Add" class="addbut" />
            </div>-->
     <!--------------------------------- table add code start --------------------------------->       
           
            <div class="inner-tabel">
                        	<div class="cont-head blue">
                            	<ul>
                                	<li>Name</li>
                                    <li>Relationship</li>
                                    <li>Sex</li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                            	<table id="bearer_table">
                                    <tr>
                                        <td><input type="text" id="bearer_name1" name="bearer_name1" class="ontintext-tbl" /></td>
                                        <td><input type="text" id="bearer_realtionship1" name="bearer_realtionship1" class="ontintext-tbl"/></td>
                                        <td><input type="text" id="bearer_sex1" name="bearer_sex1" class="ontintext-tbl"/></td>
                                    </tr>
                             	</table>
                                <input type="hidden" value="1" id="bearer_hidden" name="bearer_hidden"/>
                                
                                
                              <div class="buttoncl"><input type="button" id="bearer_add_button" value="Add" class="addbut" /></div>
                            </div>
                        </div>
            
    <!--------------------------------- table add code end --------------------------------->        
            
            
            
            
            </div><div id="div_26" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline25"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline25" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>A memorial release at a funeral or memorial service can be a meaningful farewell 	to your lost loved one, giving comfort and sense of peace to family and friends. A memorial release traditionally takes place at the closing of a graveside service or 	outdoor ceremony.  Funeral releases are often timed for after the reading of a 	bible verse, poem, or a moment of silence. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Funeral Releases</legend>
            <div class="f-row-1">
              <h3>Do you require a special funeral release during the service? </h3>
              <p class="tx-areada">
                <input type="radio" id="Yes" name="funeral_release" class="checkbox" checked="checked" value="yes" onclick="showHide('yes_rel')" />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="No" name="funeral_release" class="checkbox" value="no" onclick="showHide('no_rel')" />
                <span class="ch-field">No </span> </p>
            </div>
            <div class="f-row-1" id="div_27">
              <h3>If you answered YES, what type of funeral release do you require? </h3>
              <p class="tx-areada">
                <input type="checkbox" id="doves" name="funeral_release_type[]" class="checkbox" checked="checked" value="doves" onclick="showHide('funeral_release_doves')"/>
                <span class="ch-field">Doves </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="balloons" name="funeral_release_type[]" class="checkbox" value="balloons" onclick="showHide('funeral_release_balloons')"/>
                <span class="ch-field">Balloons </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="butterf" name="funeral_release_type[]" class="checkbox" value="butterflies" onclick="showHide('funeral_release_butterfiles')"/>
                <span class="ch-field">Butterflies </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="funeral_release_detail" name="funeral_release_type[]" class="checkbox" value="other" onclick="showHide('funeral_release_detail')"/>
                <span class="ch-field">Other </span> </p>
                <div id="div_76" style="display:none">
                <p class="tx-area">
               <input type="text" name="funeral_release_detail" id="funeral_release_detail" value="" class="text-n" />
             </p></div><div id="div_81"></div>
            </div><div id="div_28" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline26"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline26" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>Providing refreshments after the funeral is a caring gesture towards those who have attended. It offers another reason for people to stay together, reminisce and 	provide support for each other rather than rushing off straight after the service. </p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Funeral Refreshments</legend>
            <div class="f-row-1">
              <h3>Will you require refreshments at the venue immediately after the funeral service? </h3>
              <p class="tx-areada">
                <input type="radio" id="Yes" name="refreshment" class="checkbox" value="yes" checked="checked" onclick="showHide('yes_refreshment')" />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="No" name="refreshment" class="checkbox" value="no" onclick="showHide('no_refreshment')"/>
                <span class="ch-field">No </span> </p>
            </div>
            <div id="div_29">
            <div class="f-row-1">
              <h3>If you answered yes what type of menu do you require? </h3>
              <p class="tx-areada">
                <input type="checkbox" id="tea" name="refreshment_type[]" class="checkbox" value="tea/coffee" checked="checked" />
                <span class="ch-field">Tea/Coffee </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="biscuits" name="refreshment_type[]" class="checkbox" value="biscuits" />
                <span class="ch-field">Biscuits </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="cakes" name="refreshment_type[]" class="checkbox" value="cakes" />
                <span class="ch-field">Cakes </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="sandwiches" name="refreshment_type[]" class="checkbox" value="sandwiches" />
                <span class="ch-field">Sandwiches </span> </p>
            </div>
            <div class="f-row-1">
              <p>
                <lebel>Estimated number of people to be catered for:</lebel>
              </p>
              <p class="fl-name">
                <input type="text" name="ref_people" id="cemt_area" value="" class="text-n" />
              </p>
            </div>
            </div><div id="div_30" style="display:none"></div>
            </fieldset>
            
            <div class="help-f"><a id="example2" href="#inline025"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
            <div style="display: none;">
              <div id="inline025" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                <p>This might include not closing the committal curtains at the crematorium, using flowers to decorate the chapel, items placed in the coffin (no glass and dangerous items if cremation is chosen), items placed on the coffin, photographs displayed in the chapel and any form of symbolism or ritual you might prefer.</p>
              </div>
            </div>
            <fieldset class="fieldset">
            <legend class="legend">Other Special Requests</legend>
            <div class="f-row-1">
              <h3>Do you require any other special arrangements? </h3>
              <p class="tx-areada">
                <input type="radio" id="Yes" name="special_arrangement" class="checkbox" value="yes" checked="checked" onclick="showHide('yes_arr')" />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="No" name="special_arrangement" class="checkbox" value="no"  onclick="showHide('no_arr')" />
                <span class="ch-field">No </span> </p>
            </div>
            <div class="f-row-1" id="div_31">
              <p>
                <lebel>If YES, please describe </lebel>
              </p>
              <p class="fl-name">
                <input type="text" name="special_arrangement_detail" id="cemt_area" value="" class="text-n" />
              </p>
            </div> <div id="div_32" style="display:none"></div>
            </fieldset>
          </div>
          <div class="f-row-2">
            <p style="float:right;">
             <input type="submit" name="form_4" value="Next" class="redirect_signup login_button"  onClick="return formvalidation(this.form);" />
            </p>
            <p style="float:left;">
              <a href="details-of-committal.php"><input type="button" class="new_button" value="previous" style="width:120px;"/></a>
            </p>
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
        <li><a href="details-of-committal.php"  title="">3. Details of Committal</a></li>
        <li><a href="details-of-funeral-service.php"  title="">4. Details of Funeral Service</a></li>
        <li><a <?php if($after_funeralcount > 0){?>href="after-the-funeral.php"<?php }else {?>href="javascipt:void(0);" id= "afterfunerallink"<?php }?>  title="">5. After the Funeral</a></li>
        <li><?php /*?><a <?php if($family_friendscount > 0){?>href="important-information.php"<?php }else {?>href="javascipt:void(0);" id= "informationlink"<?php }?>  title="">6. Important Information</a><?php */?></li>
  </ul>
</div>-->
<script type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.min.js"></script>
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
<?php include '../include/footer1.php';?>
</body>
</html>
