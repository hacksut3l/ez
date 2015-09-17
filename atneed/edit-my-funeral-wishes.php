<?php 
session_start();
include('../include/config.php');

//$_SESSION['person_id'] = '1';
$sel_value = mysql_query("select * from funeral_wishes where person_making_id=".$_SESSION['client']);
$count_value = mysql_num_rows($sel_value);
$rel_key = mysql_fetch_assoc($sel_value);
$floral_chk = array(); 
$floral_chk = explode(',',$rel_key['floral_type']);
$stat_chk = array(); 
$stat_chk = explode(',',$rel_key['stationary_type']);
$rel_chk = array(); 
$rel_chk = explode(',',$rel_key['funeral_release_type']);
if(isset($_POST['form_wish_edit']))
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
	   $rosary_loc_details = '';
	   $is_special_clothing = '';
	   	   
	}
	if($held == 'other' && $is_viewing != 'neither' )
	{
	  $held_detail_word = $held_detail;
    }
	if($is_special_clothing == 'yes')
	{
	   $clothing_details = $special_clothing_details;	
	}
	else if($is_special_clothing == 'no'|| $is_special_clothing == 'no_pref')
	{
	  	$clothing_details = '';
	}
	if($casket_category == 'Other type')
	{
	  	$other_coffin = $other_coffin;
	}
	else
	{
	  $other_coffin = '';	
	}
	if($is_minister == 'no' || $is_minister == 'no pref')
	{
	  $minister_name  = '';
	  $minister_email  = '';
	  $minister_phone  = '';
	}
	else
	{
	  $is_minister = 'yes';
	  $minister_name  = $minister_name;
	  $minister_email  = $minister_email;
	  $minister_phone  = $minister_phone;
	}
	if($is_eulogy == 'no' || $is_eulogy == 'no_pref')
	{
	   	$is_eulogy_text == 'no';
		$eulogy_text_detail = '';
		$is_eulogy_performer == 'no';
		$name = '';
	    $contact_num = '';
	    $address = '';
	}
	else if($is_eulogy == 'yes')
	{
	  if($is_eulogy_text == 'no' || $is_eulogy_text == 'no_pref')
	  {
	   $eulogy_text_detail = '';
	  }
	  else
	  {
		$eulogy_text_detail = $eulogy_text_detail;  
	  }
	  if($is_eulogy_performer == 'no' || $is_eulogy_performer == 'no_pref')
	  {
	    $name = '';
	    $contact_num = '';
	    $address = '';
	  }
	  else
	  {
		$name = $name;
	    $contact_num = $contact_num;
	    $address = $address; 
	  }
	}
	if($is_special_reading == 'no' || $is_special_reading == 'no pref')
	{
	  $funreal_reading_detail = '';
	}
	if($transport == 'other')
	{
	 $transport_detail_other = $transport_detail;
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
	if($is_donation == 'no' || $is_donation == 'no_pref')
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
	if($is_music == 'no' || $is_music == 'no_pref')
	{
	  $name_cemnt  = '';
	  $state = '';
      $music_leaving = '';
	  $hymns = '';
	}
	if($is_musician == 'no' || $is_musician == 'no_pref')
	{
	  $musician_name  = '';
	}
	if($bearers == 'funeral director')
	{
	  $bearer_name1 = '';
	  $bearer_realtionship2 = '';
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
	if($special_arrangement == 'no' || $special_arrangement == 'no_pref')
	{
	  $special_arrangement_detail = '';
	}
	$date = date("Y-m-d H:i:s",time());
	$sql_advance = mysql_query("UPDATE funeral_wishes  SET `funeral_type`= '$is_private', `funeral_service`= '$is_single', `funeral_place`= '$funeral_place',`funeral_place_choice`='$funeral_place_choice',`funeral_held`= '$funeral_held', `funeral_status`= '$is_religious', `funeral_religion`= '$religious_details', `rosary_type`= '$is_viewing', `rosary_view`= '$is_viewing_private', `rosary_place`= '$held', `rosary_place_details`= '$held_detail_word', `rosary_loc_details`= '$rosary_loc_details', `rosary_jewellary`= '$is_special_clothing',`rosary_jewellary_details`='$clothing_details' ,`embalmed_body`= '$is_embalmed', `casket_type_category`= '$casket_category', `casket_type_name`= '$coffin_name', `service_performer`= '$is_minister', `service_performer_name`= '$minister_name', `service_performer_email`= '$minister_email',  `service_performer_phone`= '$minister_phone',`eulogy_service`= '$is_eulogy', `eulogy_text` = '$is_eulogy_text',`eulogy_text_details` = '$eulogy_text_detail', `eulogy_performer` = '$is_eulogy_performer', `eulogy_performer_name` = '$name', `eulogy_performer_phone` = '$contact_num', `eulogy_performer_address` = '$address',   `funeral_special_readings`= '$is_special_reading', `funeral_readings_details`='$funreal_reading_detail',`funeral_transport`= '$transport',`transport_detail`= '$transport_detail_other',`funeral_location_to`= '$pickup_loc',`funeral_location_from`= '$return_loc', `funeral_special_request`= '$special_request', `funeral_cortege`= '$funeral_cortege', `floral_arrangement`= '$is_floral', `floral_type`= '$floral_value',`floral_flower`= '$flower_type_value', `floral_colour`= '$colours_value', `funeral_donation`= '$is_donation', `donation_organisation`= '$organisation_name', `funeral_stationary`= '$is_stationery', `stationary_type`= '$stationery',`staionery_detail`= '$staionery_detail_value',`is_notice`='$is_notice',`is_music`= '$is_music',`funeral_music_enter`= '$name_cemnt', `funeral_music_mid`= '$state', `funeral_music_enter_leave`= '$music_leaving',`funeral_hymns`='$hymns',`funeral_musician`= '$is_musician',`singer_details`= '$musician_name', `funeral_media` = '$is_media',`funeral_bearer` = '$bearers', `funeral_release`= '$funeral_release', `funeral_release_type`='$funeral_release_type',`funeral_release_detail`= '$funeral_release_detail_value',`other_funeral_request`= '$special_arrangement',`request_description`= '$special_arrangement_detail' where person_making_id=".$_SESSION['client']);

  $sel_edit_rec = mysql_query("select * from funeral_wishes_bearer where person_making_id=".$_SESSION['client']);
  $count_edit_rec = mysql_num_rows($sel_edit_rec);
	for($i=1;$i<=$bearer_hidden;$i++)      /*--- Family and friends table---*/
	{
		if(isset($_POST['bearer_name'.$i]))
		{
			if($count_edit_rec >= 1){
			
			$sqlinsert = "UPDATE funeral_wishes_bearer SET
					bearer_name = '".$_POST['bearer_name'.$i]."',
					bearer_relationship = '".$_POST['bearer_realtionship'.$i]."',
					bearer_sex = '".$_POST['bearer_sex'.$i]."' where person_making_id=".$_SESSION['client']; 
					
			mysql_query($sqlinsert);
			}else
			{
			 $sqlinsert = "INSERT
					INTO 
						funeral_wishes_bearer
						(
							funeral_wishes_id,
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
			$a = mysql_query($sqlinsert);
			
			}
		}		
		
	}
	
if($sql_advance || $a)
{
  header('Location:advance-after-the-funeral.php');
}
}

?>
	<?php include '../include/header.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eziFunerals</title>
<link href="favicon.icon" rel="shortcut icon">
<link href="<?php echo base_url;?>css/Old_Include_Css/style1.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url;?>js/Old_Include_Js/jquery-1.9.js" type="text/javascript"></script>
<script src="<?php echo base_url;?>js/Old_Include_Js/funeralwish-vali.js" type="text/javascript"></script>

<script>
<?php if($rel_key['funeral_place']=='Other'){?>
document.getElementById("div_65").style.display = "";
document.getElementById("div_70").style.display = "none";
<?php }if($rel_key['funeral_status']=='religious'){?>
document.getElementById("div_1").style.display = "";
document.getElementById("div_2").style.display = "none";
<?php }else if($rel_key['funeral_status']=='non-religious'){?>
document.getElementById("div_1").style.display = "none";
document.getElementById("div_2").style.display = "";
<?php }if($rel_key['rosary_type']=='viewing' || $rel_key['rosary_type']=='rosary'){?>
document.getElementById("div_4").style.display = "";
document.getElementById("div_3").style.display = "none";
<?php }else if($rel_key['rosary_type']=='neither'){?>
document.getElementById("div_3").style.display = "";
document.getElementById("div_4").style.display = "none";
<?php }if($rel_key['service_performer']=='no' || $rel_key['service_performer']=='no_pref'){?>
document.getElementById("div_6").style.display = "";
document.getElementById("div_5").style.display = "none";
<?php }else if($rel_key['service_performer']=='yes'){?>
document.getElementById("div_5").style.display = "";
document.getElementById("div_6").style.display = "none";
<?php }if(($rel_key['eulogy_text'] == 'no') || ($rel_key['eulogy_text'] == 'no_pref')){?>
document.getElementById("div_331").style.display = "";
document.getElementById("div_33").style.display = "none";
<?php }else if($rel_key['eulogy_text'] == 'yes'){?>
document.getElementById("div_33").style.display = "";
document.getElementById("div_331").style.display = "none";
<?php }if(($rel_key['eulogy_performer']=='no') || ($rel_key['eulogy_performer']=='no_pref')){?>
document.getElementById("div_341").style.display = "";
document.getElementById("div_34").style.display = "none";
<?php }else if($rel_key['eulogy_performer'] == 'yes'){?>
document.getElementById("div_34").style.display = "";
document.getElementById("div_341").style.display = "none";
<?php }if($rel_key['funeral_special_readings']=='no' || $rel_key['funeral_special_readings']=='no_pref' ){?>
document.getElementById("div_8").style.display = "";
document.getElementById("div_7").style.display = "none";
<?php }else if($rel_key['funeral_special_readings']=='yes'){?>
document.getElementById("div_7").style.display = "";
document.getElementById("div_8").style.display = "none";
<?php }if($rel_key['funeral_transport']=='Hearse'){?>
document.getElementById("div_12").style.display = "";
document.getElementById("div_11").style.display = "none";
<?php }else if($rel_key['funeral_transport']=='other'){?>
document.getElementById("div_11").style.display = "";
document.getElementById("div_12").style.display = "none";
<?php }if($rel_key['floral_arrangement']=='no'){?>
document.getElementById("div_16").style.display = "";
document.getElementById("div_15").style.display = "none";
<?php }else if($rel_key['floral_arrangement']=='yes'){?>
document.getElementById("div_15").style.display = "";
document.getElementById("div_16").style.display = "none";
<?php }if(in_array("other",$floral_chk)){?>
document.getElementById("div_17").style.display = "";
document.getElementById("div_18").style.display = "none";
<?php }else if(!(in_array("other",$floral_chk))){?>
document.getElementById("div_17").style.display = "";
document.getElementById("div_18").style.display = "";
<?php }if($rel_key['funeral_donation']=='no'){?>
document.getElementById("div_20").style.display = "";
document.getElementById("div_19").style.display = "none";
<?php }else if($rel_key['funeral_donation']=='yes'){?>
document.getElementById("div_19").style.display = "";
document.getElementById("div_20").style.display = "none";
<?php }if($rel_key['funeral_stationary']=='yes'){?>
document.getElementById("div_21").style.display = "";
document.getElementById("div_22").style.display = "none";
<?php }else if($rel_key['funeral_stationary']=='no'){?>
document.getElementById("div_22").style.display = "";
document.getElementById("div_21").style.display = "none";
<?php }if(in_array("other",$stat_chk)){?>
document.getElementById("div_75").style.display = "";
document.getElementById("div_80").style.display = "none";
<?php }else if(!(in_array("other",$stat_chk))){?>
document.getElementById("div_75").style.display = "none";
document.getElementById("div_80").style.display = "";
<?php }if($rel_key['is_music']=='no'){?>
document.getElementById("div_78").style.display = "";
document.getElementById("div_77").style.display = "none";
<?php }else if($rel_key['is_music']=='yes'){?>
document.getElementById("div_77").style.display = "";
document.getElementById("div_78").style.display = "none";
<?php }if($rel_key['funeral_musician']=='yes'){?>
document.getElementById("div_23").style.display = "";
document.getElementById("div_24").style.display = "none";
<?php }else if($rel_key['funeral_musician']=='no'){?>
document.getElementById("div_24").style.display = "";
document.getElementById("div_23").style.display = "none";
<?php }if($rel_key['funeral_bearer']=='family/friend'){?>
document.getElementById("div_25").style.display = "";
document.getElementById("div_26").style.display = "none";
<?php }else if($rel_key['funeral_bearer']=='funeral director'){?>
document.getElementById("div_26").style.display = "";
document.getElementById("div_25").style.display = "none";
<?php }if($rel_key['funeral_release']=='no'){?>
document.getElementById("div_28").style.display = "";
document.getElementById("div_27").style.display = "none";
<?php }else if($rel_key['funeral_release']=='yes'){?>
document.getElementById("div_27").style.display = "";
document.getElementById("div_28").style.display = "none";
<?php }if(in_array("other",$rel_chk)){?>
document.getElementById("div_76").style.display = "";
document.getElementById("div_81").style.display = "none";
<?php }else if(!(in_array("other",$rel_chk))){?>
document.getElementById("div_76").style.display = "none";
document.getElementById("div_81").style.display = "";
<?php }if($rel_key['other_funeral_request']=='no'){?>
document.getElementById("div_32").style.display = "";
document.getElementById("div_31").style.display = "none";
<?php }else if($rel_key['other_funeral_request']=='yes'){?>
document.getElementById("div_31").style.display = "";
document.getElementById("div_32").style.display = "none";
<?php }if($rel_key['rosary_jewellary_details']=='yes'){?>
document.getElementById("cloth_jewel").style.display = "";
document.getElementById("cloth_jewel_no").style.display = "none";
<?php }else if($rel_key['rosary_jewellary_details']=='no' || $rel_key['rosary_jewellary_details']=='no_pref'){?>
document.getElementById("cloth_jewel_no").style.display = "";
document.getElementById("cloth_jewel").style.display = "none";
<?php }if($rel_key['eulogy_service']=='yes'){?>
document.getElementById("eulogy_first_yes").style.display = "";
document.getElementById("eulogy_first_no").style.display = "none";
<?php }else if($rel_key['eulogy_service']=='no' || $rel_key['eulogy_service']=='no_pref'){?>
document.getElementById("eulogy_first_no").style.display = "";
document.getElementById("eulogy_first_yes").style.display = "none";
<?php }?>
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
if(section == "no" || section == "no_pref"){
document.getElementById("div_6").style.display = "";
document.getElementById("div_5").style.display = "none";
}
else if(section == "yes"){
document.getElementById("div_5").style.display = "";
document.getElementById("div_6").style.display = "none";
}
if(section == "no_read" || section == "no_pref_read"){
document.getElementById("div_8").style.display = "";
document.getElementById("div_7").style.display = "none";
}
else if(section == "yes_read"){
document.getElementById("div_7").style.display = "";
document.getElementById("div_8").style.display = "none";
}
if(section == "other_transport"){
document.getElementById("div_12").style.display = "";
document.getElementById("div_11").style.display = "none";
}
else if(section == "Hearse"){
document.getElementById("div_11").style.display = "";
document.getElementById("div_12").style.display = "none";
}
if(section == "no_floral" || section == "no_pref_floral"){
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
else if(section == "petals" && section == "casket_spray" && section == "wreath" && section == "floral_spray" && section == "other_floral"){
document.getElementById("div_18").style.display = "";
document.getElementById("div_17").style.display = "";
}
if(section == "no_donation" || section == "no_pref_donation"){
document.getElementById("div_20").style.display = "";
document.getElementById("div_19").style.display = "none";
}
else if(section == "yes_donation"){
document.getElementById("div_19").style.display = "";
document.getElementById("div_20").style.display = "none";
}
if(section == "no_stat" || section == "no_pref_stat"){
document.getElementById("div_22").style.display = "";
document.getElementById("div_21").style.display = "none";
}
else if(section == "yes_stat"){
document.getElementById("div_21").style.display = "";
document.getElementById("div_22").style.display = "none";
}
if(section == "no_musician" || section == "no_pref_musician"){
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
if(section == "no_rel" || section == "no_pref_rel"){
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

if(section == "no_arr" || section == "no_pref_arr"){
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
if(section == "yes_eulogy"){
document.getElementById("div_34").style.display = "";
document.getElementById("div_341").style.display = "none";
}
else if(section == "no_eulogy" || section == "no_pref_eulogy"){
document.getElementById("div_341").style.display = "";
document.getElementById("div_34").style.display = "none";
}
if(section == "yes_text_eulogy"){
document.getElementById("div_33").style.display = "";
document.getElementById("div_331").style.display = "none";
}
else if(section == "no_text_eulogy" || section == "no_pref_text_eulogy"){
document.getElementById("div_331").style.display = "";
document.getElementById("div_33").style.display = "none";
}
if(section == "yes_music"){
document.getElementById("div_77").style.display = "";
document.getElementById("div_78").style.display = "none";
}
else if(section == "no_music" || section == "no_pref_music"){
document.getElementById("div_78").style.display = "";
document.getElementById("div_77").style.display = "none";
}
if(section == "cloth_yes"){
document.getElementById("cloth_jewel").style.display = "";
document.getElementById("cloth_jewel_no").style.display = "none";
}
else if(section == "cloth_no" || section == "cloth_no_pref"){
document.getElementById("cloth_jewel_no").style.display = "";
document.getElementById("cloth_jewel").style.display = "none";
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
if(section == "eulo_ser_yes"){
document.getElementById("eulogy_first_yes").style.display = "";
document.getElementById("eulogy_first_no").style.display = "none";
}
else if(section == "eulo_ser_no" || section == "eulo_ser_no_pref"){
document.getElementById("eulogy_first_no").style.display = "";
document.getElementById("eulogy_first_yes").style.display = "none";
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
<style>


a:hover{ text-decoration:none; }
</style>
</head>
<body>
<!--start web-layout -->

<div class="web-layout">
  <div class="web-960"><br/><br/><br/><br/>
    <!--start header-form -->
    <!--end header-form -->
    <!--start form-navigation-->
	<div class="container">
    <div class="form-navigation"><img src="<?php echo base_url;?>images/anav-04.png" alt="" class="process_img1" /></div>
    <!--end form-navigation-->
    <!--start content-wrap-->
    <div class="content-wrap">
      <div class="left-content">
        <h2 class="heading process_title">MY FUNERAL WISHES</h2>
        <!--start mpd-form-->
        <form name="person_making_form" action="" method="POST">
          <div class="mpd-form">
            <!--<fieldset class="fieldset">
            <legend class="legend">Type Of Funeral Service</legend>
            <div class="f-row-1">
              <h3>Do you have a preferred day for the service? <a id="example2" href="#inline2"> <img src="images/helpbutton.png" alt="" style="float:right;" /> </a></h3>
              <div style="display: none;">
                <div id="inline2" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;"> Cemeteries are generally not open on Sundays </div>
              </div>
              <p class="tx-areada">
                <input type="radio" id="funeral_day" name="funeral_day" class="checkbox" value="Direct Committal" <?php if($rel_key['funeral_day'] == 'Direct Committal'){echo "checked='checked'";}?> />
                <span class="ch-field">Direct Committal </span> </p>
              <p class="tx-areada">
                <input type="radio" id="funeral_day" name="funeral_day" class="checkbox" value="Basic" <?php if($rel_key['funeral_day'] == 'Basic'){echo "checked='checked'";}?>/>
                <span class="ch-field">Basic </span> </p>
              <p class="tx-areada">
                <input type="radio" id="funeral_day" name="funeral_day" class="checkbox"  value="More Elaborate" <?php if($rel_key['funeral_day'] == 'More Elaborate'){echo "checked='checked'";}?>/>
                <span class="ch-field">More Elaborate </span></p>
            </div>
            <div class="f-row-1"></div>
            </fieldset>-->
            <div class="help-f"></div>
            <div style="display: none;">
              <div id="inline4" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>There is a natural tendency for many people to wish for privacy when they are 	going through the emotion of losing someone.
                  However, many grieving counsellors suggest that the support that comes from 	allowing a wider circle of friends and associates to pay their respects can be a 	significant part of the healing process. </p>
              </div>
            </div>
            <fieldset class="fieldset process_form1">
            <legend class="legend">Details Of Funeral Service</legend>
            <div class="f-row-1">
              <h3>Would you prefer a private or public funeral? <a id="example2" href="#inline5"> <img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /> </a> </h3>
              <div style="display: none;">
                <div id="inline5" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                  <p>There is a natural tendency for many people to wish for privacy when they are going through the emotion of losing someone. However, many grieving counsellors suggest that the support that comes from allowing a wider circle of friends and associates to pay their respects can be a significant part of the healing process. </p>
                </div>
              </div>
              <p class="tx-area">
                <input type="radio" id="is_private" name="is_private" class="checkbox" value="private" <?php if($rel_key['funeral_type']=='private'){echo "checked='checked'";}?>/>
                <span class="ch-field">Private </span> </p>
              <p class="tx-area">
                <input type="radio" id="is_private" name="is_private" class="checkbox" value="public"  <?php if($rel_key['funeral_type']=='public'){echo "checked='checked'";}?>/>
                <span class="ch-field">Public </span> </p>
              <p class="tx-area">
                <input type="radio" id="is_private" name="is_private" class="checkbox" value="no_pref"  <?php if($rel_key['funeral_type']=='no_pref'){echo "checked='checked'";}?>/>
                <span class="ch-field">No Preference </span> </p>
            </div>
            <div class="f-row-1">
              <h3>Do you require a single or double service?<a id="example2" href="#inline6"> <img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /> </a></h3>
              <div style="display: none;">
                <div id="inline6" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                  <p>A single service is cheaper than a double service and is commonly held entirely at one location. The most common places for a single service are at graveside, crematorium or the funeral home chapel.<br>
                    <br>
                    A double service is more expensive and is the most requested type of funeral. It usually involves a service either in a church or at a chapel and then a funeral procession to the cemetery or crematorium. This provides the greatest opportunity for tradition, participation and attendance of family and friends. </p>
                </div>
              </div>
              <p class="tx-area">
                <input type="radio" id="is_single" name="is_single" class="checkbox" value="single" <?php if($rel_key['funeral_service']=='single'){echo "checked='checked'";}?>/>
                <span class="ch-field">Single </span> </p>
              <p class="tx-area">
                <input type="radio" id="is_single" name="is_single" class="checkbox" value="double" <?php if($rel_key['funeral_service']=='double'){echo "checked='checked'";}?>/>
                <span class="ch-field">Double </span> </p>
                <p class="tx-area">
                <input type="radio" id="is_single" name="is_single" class="checkbox" value="no_pref" <?php if($rel_key['funeral_service']=='no_pref'){echo "checked='checked'";}?>/>
                <span class="ch-field">No Preference </span> </p>
            </div>
            <div class="f-row-1">
            <h3>Where would you like the funeral service to be held? <a id="example2" href="#inline006"> <img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /> </a></h3>
            <div style="display: none;">
              <div id="inline006" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>Some venues where the service is to be held will require approvals from local government	and special fees may apply. </p>
              </div>
            </div>
            <p class="tx-areafuns">
              <input type="radio" id="graveside" name="funeral_place" class="checkbox" value="Graveside" <?php if($rel_key['funeral_place']=='Graveside'){echo "checked='checked'";}?> onclick="showHide('held_grave')" />
              <span class="ch-field">Graveside </span> </p>
            <p class="tx-areafuns">
              <input type="radio" id="cem_cremc_ch" name="funeral_place" class="checkbox" value="Cemetery/Crematorium Chapel (fee applies)" <?php if($rel_key['funeral_place']=='Cemetery/Crematorium Chapel (fee applies)'){echo "checked='checked'";}?> onclick="showHide('held_cem')" />
              <span class="ch-field">Cemetery/Crematorium Chapel (fee applies) </span> </p>
            <p class="tx-areafuns">
              <input type="radio" id="cem_cremc_appl" name="funeral_place" class="checkbox" value="Cemetery/Crematorium Chapel (fee applies) followed by a committal at the graveside" <?php if($rel_key['funeral_place']=='Cemetery/Crematorium Chapel (fee applies) followed by a committal at the graveside'){echo "checked='checked'";}?> onclick="showHide('held_app1')"/>
              <span class="ch-field">Cemetery/Crematorium Chapel (fee applies) followed by a committal at the graveside </span> </p>
            <p class="tx-areafuns">
              <input type="radio" id="fun_dir_chap" name="funeral_place" class="checkbox" value="Funeral directors Chapel (fee applies) followed by a committal at the cemetery" <?php if($rel_key['funeral_place']=='Funeral directors Chapel (fee applies) followed by a committal at the cemetery'){echo "checked='checked'";}?> onclick="showHide('held_chap')"/>
              <span class="ch-field">Funeral directors Chapel (fee applies) followed by a committal at the cemetery </span> </p>
            <p class="tx-areafuns">
              <input type="radio" id="comt_cemt_foll" name="funeral_place" class="checkbox" value="At ___followed by the committal at the cemetery" <?php if($rel_key['funeral_place']=='At ___followed by the committal at the cemetery'){echo "checked='checked'";}?>onclick="showHide('held_committel')"/>
              <span class="ch-field">At <input style="width:100px; border-bottom:1px solid #000; border-top:0; border-left:0; border-right:0; " type="" name="cementary_held_funeral" value="<?php echo $rel_key['funeral_place_choice'];?>" />followed by the committal at the cemetery </span> </p>
            <p class="tx-areafuns">
              <input type="radio" id="dirt_commt" name="funeral_place" class="checkbox" value="Direct Committal" <?php if($rel_key['funeral_place']=='Direct Committal'){echo "checked='checked'";}?> onclick="showHide('held_direct')" />
              <span class="ch-field">Direct Committal</span> </p>
            <p class="tx-areafuns">
              <input type="radio" id="other" name="funeral_place" class="checkbox" value="Other" <?php if($rel_key['funeral_place']=='Other'){echo "checked='checked'";}?> onclick="showHide('held_other')" />
              <span class="ch-field">Other</span> </p>
            <?php if($rel_key['funeral_place']=='Other'){?>
            <div id="div_65">
              <?php }else{?>
              <div id="div_65" style="display:none">
                <?php }?>
                <p class="tx-area">
                  <input type="text" name="funeral_held_detail" id="funeral_held_detail" value="<?php echo $rel_key['funeral_held'];?>" class="text-n" />
                </p>
              </div>
              <div id="div_70"></div>
            </div>
            <div class="f-row-1">
              <h3>Do you require a religious or non-religious service? </h3>
              <p class="tx-area">
                <input type="radio" id="is_religious_id" name="is_religious" class="checkbox" value="religious" <?php if($rel_key['funeral_status']=='religious'){echo "checked='checked'";}?>  onclick="showHide('religious')"/>
                <span class="ch-field">Religious </span> </p>
              <p class="tx-area">
                <input type="radio" id="is_religious1" name="is_religious" class="checkbox" value="non-religious" <?php if($rel_key['funeral_status']=='non-religious'){echo "checked='checked'";}?> onclick="showHide('non-religious')"/>
                <span class="ch-field">Non-Religious </span> </p>
            </div>
            <?php  if($rel_key['funeral_status']=='religious'){?>
            <div class="f-row-1" id="div_1">
            <?php }else{?>
            <div class="f-row-1" id="div_1" style="display:none">
              <?php }?>
              <p>
                <lebel> If you answered YES, what religion/spiritual belief/philosophy will the service be based upon? </lebel>
              </p>
              <p class="fl-name">
                <!--<lebel>Cemetery Area:</lebel>-->
                <input type="text" name="religious_details" id="religious_details" value="<?php echo $rel_key['funeral_religion'];?>" class="text-n" />
              </p>
            </div>
            <div id="div_2" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline7"><img src="<?php echo base_url;?>images/helpbutton.png" alt=""  class="process_help345"/></a></div>
            <div style="display: none;">
              <div id="inline7" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>A viewing and/or rosary are usually arranged by funeral directors using their chapel. Most bodies are viewed in the coffin, although other settings can be arranged. A fee is charged for viewing at agreed times. Costs may be higher if more than one viewing is arranged. </p>
              </div>
            </div>
            <fieldset class="fieldset  process_form1 process_form341">
            <legend class="legend">Viewings and Rosaries</legend>
            <div class="f-row-1">
              <h3>Would you like a viewing or rosary?</h3>
              <p class="tx-areada">
                <input type="radio" id="is_viewing" name="is_viewing" class="checkbox" value="viewing" <?php if($rel_key['rosary_type']=='viewing'){echo "checked='checked'";}?> onclick="showHide('viewing')"/>
                <span class="ch-field">Viewing </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_viewing" name="is_viewing" class="checkbox"  value="rosary" <?php if($rel_key['rosary_type']=='rosary'){echo "checked='checked'";}?> onclick="showHide('rosary')"/>
                <span class="ch-field">Rosary </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_viewing" name="is_viewing" class="checkbox"  value="neither" <?php if($rel_key['rosary_type']=='neither'){echo "checked='checked'";}?> onclick="showHide('neither')"/>
                <span class="ch-field">Neither </span> </p>
            </div>
            <?php if($rel_key['rosary_type']!='neither'){?>
            <div id="div_3">
            <?php }else{?>
            <div id="div_3" style="display:none">
            <?php }?>
            <div class="f-row-1">
              <h3>If you selected YES to a viewing or rosary, do you require it to be private or public?</h3>
              <p class="tx-area">
                <input type="radio" id="is_viewing_private" name="is_viewing_private" class="checkbox" value="private" <?php if($rel_key['rosary_view']=='private'){echo "checked='checked'";}?>/>
                <span class="ch-field">Private </span> </p>
              <p class="tx-area">
                <input type="radio" id="is_viewing_private" name="is_viewing_private" class="checkbox" value="public" <?php if($rel_key['rosary_view']=='public'){echo "checked='checked'";}?>/>
                <span class="ch-field">Public </span> </p>
            </div>
            <div class="f-row-1">
              <h3>Where would you like the viewing or rosary to be held? </h3>
              <p class="tx-area">
                <input type="radio" id="held" name="held" class="checkbox" value="church" <?php if($rel_key['rosary_place']=='church'){echo "checked='checked'";}?> onclick="showHide('rosary_held_church')"/>
                <span class="ch-field">Church </span> </p>
              <p class="tx-area" style="width:300px;">
                <input type="radio" id="held" name="held" class="checkbox" value="funeral director" <?php if($rel_key['rosary_place']=='funeral director'){echo "checked='checked'";}?> onclick="showHide('rosary_held_chapel')"/>
                <span class="ch-field" >Funeral directors Chapel (fee applies) </span> </p>
              <p class="tx-area">
                <input type="radio" id="held" name="held" class="checkbox" value="other" <?php if($rel_key['rosary_place']=='other'){echo "checked='checked'";}?> onclick="showHide('rosary_held')"/>
                <span class="ch-field">Other </span> </p>
              <div id="shalini" style="display:none">
                <p class="tx-area">
                  <input type="text" name="held_detail" id="held_detail" value="<?php echo $rel_key['rosary_place_details'];?>" class="text-n" />
                </p>
              </div>
              <div id="rakesh"></div>
            </div>
            <div class="f-row-1">
              <div class="f-row-1">
                <h3>Provide details of location</h3>
                <p class="fl-name">
                  <lebel></lebel>
                  <input type="text" name="rosary_loc_details" id="rosary_loc_details" value="<?php echo $rel_key['rosary_loc_details'];?>" class="text-n" />
                </p>
              </div>
              <p>&nbsp;</p>
              <div class="f-row-1">
                <h3>Would you like to be dressed in special clothing for the viewing or rosary?<a id="example2" href="#inline06"> <img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /> </a></h3>
              <div style="display: none;">
                <div id="inline06" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                  <p>The choice of apparel is an important part of the viewing process. Often the favourite clothing of the deceased is chosen. However, any personal selection is acceptable or the funeral director can provide a burial garment.</p>
                </div>
              </div>
                <p class="tx-areada">
                  <input type="radio" id="is_special_clothing2" name="is_special_clothing" class="checkbox" value="yes" <?php if($rel_key['rosary_jewellary']=='yes'){echo "checked='checked'";}?> onclick="showHide('cloth_yes')">
                  <span class="ch-field">Yes </span></p>
                <p class="tx-areada">
                  <input type="radio" id="is_special_clothing2" name="is_special_clothing" class="checkbox" value="no" <?php if($rel_key['rosary_jewellary']=='no'){echo "checked='checked'";}?> onclick="showHide('cloth_no')" />
                  <span class="ch-field">No </span></p>
                <p class="tx-areada">
                  <input type="radio" id="is_special_clothing3" name="is_special_clothing" class="checkbox" value="no_pref" <?php if($rel_key['rosary_jewellary']=='no_pref'){echo "checked='checked'";}?> onclick="showHide('cloth_no_pref')" />
                  <span class="ch-field">No Preference</span></p>
              </div>
              <?php if($rel_key['rosary_jewellary'] == 'yes'){?>
              <div class="f-row-1" id="cloth_jewel">
                <?php }else{?>
                <div class="f-row-1" id="cloth_jewel" style="display:none">
                  <?php }?>
                  <p>
                    <lebel>If Yes, provide details of clothing :</lebel>
                    <input type="text" name="special_clothing_details" id="special_clothing_deails" value="<?php echo $rel_key['rosary_jewellary_details'];?>" class="text-n" />
                  </p>
                </div>
                <?php if($rel_key['rosary_jewellary'] == 'no' || $rel_key['rosary_jewellary'] == 'no_pref'){?>
                <div id="cloth_jewel_no"></div>
                <?php }else{?>
                <div id="cloth_jewel_no" style="display:none"></div>
                <?php }?>
              </div>
              <div class="f-row-1" id="end_div_yes"></div>
              <div id="end_div_no" style="display:none"></div>
            </div>
            <div id="div_4" style="display:none"></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline9"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" class="process_help346"/></a></div>
            <div style="display: none;">
              <div id="inline9" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;"> Embalming is often called ‘cosmetic’ or ‘hygienic’ treatment by the funeral profession, and a charge is made for the service. It is not an essential process prior to burial or cremation
                </p>
              </div>
            </div>
            <fieldset class="fieldset  process_form1 process_form342">
            <legend class="legend">Embalming</legend>
            <div class="f-row-1">
              <h3>Do you wish to be embalmed? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_embalmed" name="is_embalmed" class="checkbox" value="yes" <?php if($rel_key['embalmed_body']=='yes'){echo "checked='checked'";}?>/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_embalmed" name="is_embalmed" class="checkbox" value="no" <?php if($rel_key['embalmed_body']=='no'){echo "checked='checked'";}?>/>
                <span class="ch-field">No </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_embalmed" name="is_embalmed" class="checkbox" value="no_pref" <?php if($rel_key['embalmed_body']=='no_pref'){echo "checked='checked'";}?>/>
                <span class="ch-field">No Preference </span></p>
            </div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline10"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" class="process_help347"/></a></div>
            <div style="display: none;">
              <div id="inline10" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;"> 1) A coffin has a familiar shape and widens out from the top and narrows toward the feet. The lid also comes off with a coffin.<br />
                2) A casket is shaped with straight sides and has a hinged lid.<br />
                3)Standard coffin/casket from funeral directors are made of veneered chipboard with plastic handles and lining.<br />
                4) Pure wood coffin/casket and ‘caskets’ are available from funeral directors but can be more expensive. <br />
                5) “Eco” or ‘Green’ coffin/casket made of cardboard, pure wood, wicker and bamboo are available. Check for availability and prices before you decide, as some funeral directors may not use and/or supply green coffins.<br />
                6) Other types - if you require an unusual, or artist painted coffin, details of the supplier, design and size must be discussed. <br />
                7) Did you know you can save money by organising your own coffin or casket? </div>
            </div>
            <fieldset class="fieldset  process_form1 process_form343">
            <legend class="legend">Coffin Casket</legend>
            <div class="f-row-1">
              <h3>What type of coffin or casket do you require? </h3>
              <p class="fl-name" style="margin-top:10px;">
                <lebel>Select Category:</lebel>
                <select name="casket_category" class="select-ezi" onchange="checkField(this.value)">
                  <option value="Standard coffin/casket" <?php if($rel_key['casket_type_category']=='Standard coffin/casket'){echo "selected='selected'";} ?> >Standard coffin/casket</option>
                  <option value="Pure wood coffin/casket" <?php if($rel_key['casket_type_category']=='Pure wood coffin/casket'){echo "selected='selected'";}?>>Pure wood coffin/casket</option>
                  <option value="Eco or Green coffin/casket"<?php if($rel_key['casket_type_category']=='Eco or Green coffin/casket'){echo "selected='selected'";}?>>Eco or Green coffin/casket</option>
                  <option value="Other type"<?php if($rel_key['casket_type_category']=='Other type'){echo "selected='selected'";}?>>Other type</option>
                </select>
              </p><div id="none_casket"></div>
              <p class="fr-name" style="margin-top:10px;">
                <lebel>Budget:</lebel>
                <select name="coffin_name" class="select-ezi" id="coffin_name" >
                  <option value="less than $500"<?php if($rel_key['casket_type_name']=='less than $500'){echo "selected='selected'";}?>>less than $500</option>              
                <option value="501-1000" <?php if($rel_key['casket_type_name']=='501-1000'){echo "selected='selected'";}?>>501 – 1000 </option>
                <option value="1001-2000" <?php if($rel_key['casket_type_name']=='1001-2000'){echo "selected='selected'";}?>>1001 - 2000</option>
                <option value="2001-3000" <?php if($rel_key['casket_type_name']=='2001-3000'){echo "selected='selected'";}?>>2001 - 3000</option>
                <option value="3001-4000" <?php if($rel_key['casket_type_name']=='3001-4000'){echo "selected='selected'";}?>>3001 - 4000</option>
                <option value="4001-5000" <?php if($rel_key['casket_type_name']=='4001-5000'){echo "selected='selected'";}?>>4001 - 5000</option>
                <option value="greater than 5000" <?php if($rel_key['casket_type_name']=='greater than 5000'){echo "selected='selected'";}?>>Greater than 5000</option>
                  
                  <
                </select>
              </p>
              </p><br />
              <p class="fr-name">
             <!-- <div id="other_casket" style="display:none; margin-top:18px;">-->
              <?php if($rel_key['casket_type_category']=='Other type'){?> <div id="other_casket"><?php }else{?><div id="other_casket" style="display:none; margin-top:18px;"><?php }?>
                <input type="text" value="" name="other_coffin" />
                </div>
                </p>
              <!--<p class="fr-name">
                <lebel>Supplier: </lebel>
                <input type="text" name="coffin_supplier" id="coffin_supplier" value="<?php echo $rel_key['casket_type_supplier'];?>" class="text-n" />
              </p>-->
            </div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline11"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" class="process_help348"/></a></div>
            <div style="display: none;">
              <div id="inline11" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>A Funeral Celebrant is trained and certified to provide a funeral, memorial or 	celebration of life service that is highly personalised to reflect the character, 	lifestyle and beliefs of the person who died.<br />
                  <br />
                  Clergy are generally cheaper than a celebrant.<br />
                  <br />
                  Any suitably skilled friend or relative can take the service, if they agree. </p>
              </div>
            </div>
            <fieldset class="fieldset  process_form1  process_form344">
            <legend class="legend">Minister Or Celebrant</legend>
            <div class="f-row-1">
              <h3>Do you have a minister, celebrant or person in mind to perform the service? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_minister" name="is_minister" class="checkbox" value="yes" <?php if($rel_key['service_performer']=='yes'){echo "checked='checked'";}?> onClick="showHide('yes')"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_minister" name="is_minister" class="checkbox" value="no" <?php if($rel_key['service_performer']=='no'){echo "checked='checked'";}?> onClick="showHide('no')"/>
                <span class="ch-field">No </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_minister" name="is_minister" class="checkbox" value="no_pref" <?php if($rel_key['service_performer']=='no_pref'){echo "checked='checked'";}?> onClick="showHide('no_pref')"/>
                <span class="ch-field">No Preference </span></p>
            </div>
            <?php if($rel_key['service_performer']=='yes'){?>
            <div class="f-row-1" id="div_5">
            <?php }else{?>
            <div class="f-row-1" id="div_5" style="display:none">
              <?php }?>
              <p class="fl-name">
                <lebel>If YES, please give the name </lebel>
                <input type="text" name="minister_name" id="minister_name" value="<?php echo $rel_key['service_performer_name'];?>" class="text-n" />
              </p>
              <p class="fr-name">
                <lebel>Email:</lebel>
                <input type="text" name="minister_email" id="minister_email" value="<?php echo $rel_key['service_performer_email'];?>" class="text-n" />
              </p>
              <p class="fr-name">
                <lebel>Phone:</lebel>
                <input type="text" name="minister_phone" id="minister_phone" value="<?php echo $rel_key['service_performer_phone'];?>" class="text-n" />
              </p>
            </div>
            <?php if(($rel_key['service_performer']=='no') || ($rel_key['service_performer']=='no_pref')){?>
            <div id="div_6"></div>
            <?php }else{?>
            <div id="div_6" style="display:none"> </div>
            <?php }?>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline12"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" class="process_help349" /></a></div>
            <div style="display: none;">
              <div id="inline12" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>The eulogy is the speech or presentation during the funeral ceremony that talks 	about the life and character of the person who died. The eulogy acknowledges the 	unique life of the person who died and affirms the significance of that life for all 	who shared in it. The eulogy typically lasts 15-20 minutes, although longer 	presentations may also be appropriate.</p>
              </div>
            </div>
            <fieldset class="fieldset  process_form1 process_form345">
            <legend class="legend">Eulogy</legend>
            <div class="f-row-1">
            <div class="f-row-1">
              <h3>Would you like a eulogy at the service about your life?</h3>
              <p class="tx-areada">
                <input type="radio" id="is_eulogy" name="is_eulogy" class="checkbox" value="yes" <?php if($rel_key['eulogy_service']=='yes'){echo "checked='checked'";}?> onclick="showHide('eulo_ser_yes')"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_eulogy" name="is_eulogy" class="checkbox" value="no" <?php if($rel_key['eulogy_service']=='no'){echo "checked='checked'";}?> onclick="showHide('eulo_ser_no')"/>
                <span class="ch-field">No </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_eulogy" name="is_eulogy" class="checkbox" value="no_pref" <?php if($rel_key['eulogy_service']=='no_pref'){echo "checked='checked'";}?> onclick="showHide('eulo_ser_no_pref')"/>
                <span class="ch-field">No Preference </span></p>
            </div>
           <?php if($rel_key['eulogy_service'] == 'yes'){?> <div id="eulogy_first_yes"> <?php }else{?> <div id="eulogy_first_yes" style="display:none"> <?php }?>
            <div class="f-row-1">
              <h3>If you answered YES, have you written the text for the eulogy?</h3>
              <p class="tx-areada">
                <input type="radio" id="is_eulogy2" name="is_eulogy_text" class="checkbox" value="yes" <?php if($rel_key['eulogy_text']=='yes'){echo "checked='checked'";}?> onClick="showHide('yes_text_eulogy')"/>
                <span class="ch-field">Yes </span></p>
              <p class="tx-areada">
                <input type="radio" id="is_eulogy2" name="is_eulogy_text" class="checkbox" value="no" <?php if($rel_key['eulogy_text']=='no'){echo "checked='checked'";}?> onClick="showHide('no_text_eulogy')"/>
                <span class="ch-field">No </span></p>
              <!--<p class="tx-areada">
                <input type="radio" id="is_eulogy2" name="is_eulogy_text" class="checkbox" value="no_pref"  <?php if($rel_key['eulogy_text']=='no_pref'){echo "checked='checked'";}?>onClick="showHide('no_pref_text_eulogy')"/>
                <span class="ch-field">No Preference </span></p>-->
            </div>
            <?php if($rel_key['eulogy_text'] == 'yes'){?>
            <div class="f-row-1" id="div_33">
            <?php }else{?>
            <div class="f-row-1" id="div_33" style="display:none">
              <?php }?>
              <p class="fl-name">
                <lebel>Please provide details</lebel>
                <input type="text" name="eulogy_text_detail" id="eulogy_text_details" value="<?php echo $rel_key['eulogy_text_details'];?>" class="text-n" />
              </p>
            </div>
            <?php if(($rel_key['eulogy_text'] == 'no') || ($rel_key['eulogy_text'] == 'no_pref')){?>
            <div id="div_331" style="display:none"></div>
            <?php }else{?>
            <div id="div_331"> </div>
            <?php }?>
            <div class="f-row-1">
              <h3>Is there somebody you would prefer to give the eulogy (other than the minister or celebrant) at the service?</h3>
              <p class="tx-areada">
                <input type="radio" id="is_eulogy4" name="is_eulogy_performer" class="checkbox" value="yes" <?php if($rel_key['eulogy_performer']=='yes'){echo "checked='checked'";}?>onClick="showHide('yes_eulogy')"/>
                <span class="ch-field">Yes </span></p>
              <p class="tx-areada">
                <input type="radio" id="is_eulogy4" name="is_eulogy_performer" class="checkbox" value="no" <?php if($rel_key['eulogy_performer']=='no'){echo "checked='checked'";}?> onClick="showHide('no_eulogy')"/>
                <span class="ch-field">No </span></p>
              <p class="tx-areada">
                <input type="radio" id="is_eulogy4" name="is_eulogy_performer" class="checkbox" value="no_pref" <?php if($rel_key['eulogy_performer']=='no_pref'){echo "checked='checked'";}?> onClick="showHide('no_pref_eulogy')"/>
                <span class="ch-field">No Preference </span></p>
            </div>
            <?php if($rel_key['eulogy_performer']=='yes'){?>
            <div class="f-row-1" id="div_34">
            <?php }else{?>
            <div class="f-row-1" id="div_34" style="display:none">
              <?php }?>
              <p>If YES, give their name and contact details </p>
              <p class="fl-name">
                <lebel>Name</lebel>
                <input type="text" name="name" id="name" value="<?php echo $rel_key['eulogy_performer_name'];?>" class="text-n" />
              </p>
              <p class="fl-name">
                <lebel>Contact No</lebel>
                <input type="text" name="contact_num" id="contact_num" value="<?php echo $rel_key['eulogy_performer_phone'];?>" class="text-n" />
              </p>
              <p class="fl-name">
                <lebel>Address</lebel>
                <input type="text" name="address" id="address" value="<?php echo $rel_key['eulogy_performer_address'];?>" class="text-n" />
              </p>
            </div>
            <?php if(($rel_key['eulogy_performer']=='no') || ($rel_key['eulogy_performer']=='no_pref')){?>
            <div id="div_341" style="display:none">
              <?php }else{?>
              <div id="div_341">
                <?php }?>
              </div>
            </div>
            </div><?php if($rel_key['eulogy_service']=='no' || $rel_key['eulogy_service']=='no_pref'){?> <div id="eulogy_first_no"> <?php }else{?> <div id="eulogy_first_no" style="display:none"> <?php }?></div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline28"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" class="process_help3410"/></a></div>
            <div style="display: none;">
              <div id="inline28" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>Funeral poetry, readings and verse can enhance a funeral service or ceremony whether it is religious or non-religious. <br />
                  Funeral poems are a great way to share how you feel about someone you have lost and pay tribute to the memories that you hold dearest. </p>
              </div>
            </div>
            <fieldset class="fieldset  process_form1 process_form346">
            <legend class="legend">Special Readings</legend>
            <div class="f-row-1">
            <div class="f-row-1">
              <h3>Would you like any special readings to be read at your funeral service?</h3>
              <p class="tx-areada">
                <input type="radio" id="is_special_reading" name="is_special_reading" class="checkbox" value="yes" <?php if($rel_key['funeral_special_readings']=='yes'){echo "checked='checked'";}?> onClick="showHide('yes_read')"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_special_reading" name="is_special_reading" class="checkbox" value="no" <?php if($rel_key['funeral_special_readings']=='no'){echo "checked='checked'";}?> onClick="showHide('no_read')"/>
                <span class="ch-field">No </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_special_reading" name="is_special_reading" class="checkbox" value="no_pref" <?php if($rel_key['funeral_special_readings']=='no_pref'){echo "checked='checked'";}?> onClick="showHide('no_pref_read')"/>
                <span class="ch-field">No Preference </span></p>
            </div>
            <?php if($rel_key['funeral_special_readings']=='yes'){?>
            <div class="f-row-1" id="div_7">
            <?php }else{?>
            <div class="f-row-1" id="div_7" style="display:none">
              <?php }?>
              <p>
                <lebel>If you answered YES, </lebel>
              </p>
              <p class="fl-name">
              <p class="tx-areada" style="width:650px;"> <span class="ch-field" style="padding-left:0;">please provide details, List text or poems: </span></p>
              <textarea id="funreal_reading_detail"  name="funreal_reading_detail" class="textarea-f"><?php echo $rel_key['funeral_readings_details'];?></textarea>
              </p>
            </div>
            <?php if(($rel_key['funeral_special_readings']=='no') || ($rel_key['funeral_special_readings']=='no_pref')){?>
            <div id="div_8" style="display:none">
              <?php }else{?>
              <div id="div_8">
                <?php }?>
              </div>
            </div>
            </fieldset>
        
            <div class="help-f"><a id="example2" href="#inline13"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" class="process_help3411"/></a></div>
            <div style="display: none;">
              <div id="inline13" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;"> Transporting a coffin to a funeral can be done in more ways than most people may 	realise, and can be one of the easiest things to personalise and make memorable if 	you choose. If you do NOT wish the body to be transported, you can arrange the 	coffin to be placed in the chapel before the mourners arrive. </div>
            </div>
            <fieldset class="fieldset  process_form1 process_form347">
            <legend class="legend">Funeral Transport</legend>
            <div class="f-row-1">
            <h3>How would you like  to be transported to and from the funeral :-</h3>
            <p class="tx-areada">
              <input type="radio" id="transport" name="transport" class="checkbox" value="Hearse" <?php if($rel_key['funeral_transport']=='Hearse'){echo "checked='checked'";}?> onclick="showHide('Hearse')"/>
              <span class="ch-field">Hearse </span> </p>
            <p class="tx-areada">
              <input type="radio" id="transport" name="transport" class="checkbox" value="other" <?php if($rel_key['funeral_transport']=='other'){echo "checked='checked'";}?> onclick="showHide('other_transport')" />
              <span class="ch-field">Other </span> </p>
            <?php if($rel_key['funeral_transport']=='Hearse'){?>
            <div id="div_11"></div>
            <?php }else{?>
            <div id="div_11" style="display:none"></div>
            <?php }if($rel_key['funeral_transport']=='other'){?>
            <div id="div_12">
              <?php }else{?>
              <div id="div_12" style="display:none">
                <?php }?>
                <p class="tx-areada" style="width:450px;"> <span class="ch-field" style="margin-right:10px;">(motorbike/horse & carriage) </span>
                  <input type="text" name="transport_detail" id="transport_detail" value="<?php echo $rel_key['transport_detail'];?>" class="text-n" />
                </p>
              </div>
              <div id="div_11"></div>
            </div>
            <div class="f-row-1">
              <div class="f-row-1">
                <h3>What transport requirements would you like  to and from the funeral service: <a id="example" href="#inline15"> </a></h3>
                <div style="display: none;">
                  <div id="inline15" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                    <p>Pick up date and time to be determined with the funeral director following confirmation of funeral arrangements.</p>
                  </div>
                </div>
              </div>
              <div class="f-row-1">
                <p class="fl-name">
                  <lebel>Pick up location:</lebel>
                  <input type="text" name="pickup_loc" id="pickup_loc" value="<?php echo $rel_key['funeral_location_to'];?>" class="text-n" />
                </p>
                <p class="fr-name">
                  <lebel>Return location:</lebel>
                  <input type="text" name="return_loc" id="return_loc" value="<?php echo $rel_key['funeral_location_from'];?>" class="text-n" />
                </p>
              </div>
              <div class="f-row-1">
                <p>
                  <lebel>Special requests: (colour/special routes, etc) </lebel>
                  <input type="text" name="special_request" id="special_request" value="<?php echo $rel_key['funeral_special_request'];?>" class="text-n" />
                </p>
              </div>
              <h3>&nbsp;</h3>
            </div>
            <div class="f-row-1"></div>
            <div class="f-row-1">
              <h3>Would you like  a funeral cortege? </h3>
              <p class="tx-areada">
                <input type="radio" id="funeral_cortege" name="funeral_cortege" class="checkbox" value="yes" <?php if($rel_key['funeral_cortege']=='yes'){echo "checked='checked'";}?>/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="funeral_cortege" name="funeral_cortege" class="checkbox" value="no" <?php if($rel_key['funeral_cortege']=='no'){echo "checked='checked'";}?>/>
                <span class="ch-field">No </span> </p>
              <p class="tx-areada">
                <input type="radio" id="funeral_cortege" name="funeral_cortege" class="checkbox" value="no_pref" <?php if($rel_key['funeral_cortege']=='no_pref'){echo "checked='checked'";}?> />
                <span class="ch-field">No Preference </span></p>
            </div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline17"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" class="process_help3412"/></a></div>
            <div style="display: none;">
              <div id="inline17" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>Some people choose not to have flowers. Some prefer donations and others prefer to provide them from their garden. Most wreaths are made of plastic frames, oasis and plastic wrapping.  </p>
              </div>
            </div>
            <fieldset class="fieldset  process_form1 process_form348">
            <legend class="legend">Floral arrangements</legend>
            <div class="f-row-1">
              <h3>Would you like floral arrangements at your funeral? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_floral" name="is_floral" class="checkbox" value="yes" <?php if($rel_key['floral_arrangement']=='yes'){echo "checked='checked'";}?> onClick="showHide('yes_floral')" />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_floral" name="is_floral" class="checkbox" value="no" <?php if($rel_key['floral_arrangement']=='no'){echo "checked='checked'";}?> onClick="showHide('no_floral')"/>
                <span class="ch-field">No </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_floral" name="is_floral" class="checkbox" value="no_pref" <?php if($rel_key['floral_arrangement']=='no_pref'){echo "checked='checked'";}?> onClick="showHide('no_pref_floral')"/>
                <span class="ch-field">No Preference </span></p>
            </div>
            <?php if($rel_key['floral_arrangement']=='yes'){ ?>
            <div id="div_15">
            <?php }else{?>
            <div id="div_15" style="display:none">
            <?php }?>
            <div class="f-row-1">
              <p>
                <lebel>If you answered YES, what type of floral arrangements do you require: <a id="example2" href="#inline18"> <img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /> </a> </lebel>
              <div style="display: none;">
                <div id="inline18" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                  <p>The two most commonly used flowers for funerals are roses and carnations but these can be mixed with lilies, asters, delphiniums and gerbera daisies.  These types of flowers are popular at funeral services because they add colour, set the tone and lighten the mood. The two most commonly used flowers for funerals are roses and carnations but these can be mixed with lilies, asters, delphiniums and gerbera daisies.  These types of flowers are popular at funeral services because they add colour, set the tone and lighten the mood.</p>
                </div>
              </div>
              </p>
              <p class="tx-areada">
                <input type="checkbox" id="floral" name="floral[]" class="checkbox" value="wreath" <?php if(in_array("wreath",$floral_chk)){echo "checked='checked'";}?> onclick="showHide('wreath')"  />
                <span class="ch-field">Wreath </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="floral" name="floral[]" class="checkbox" value="floral spray" <?php if(in_array("floral spray",$floral_chk)){echo "checked='checked'";}?> onclick="showHide('floral_spray')"/>
                <span class="ch-field">Floral spray </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="floral" name="floral[]" class="checkbox" value="casket spray" <?php if(in_array("casket spray",$floral_chk)){echo "checked='checked'";}?> onclick="showHide('casket_spray')"/>
                <span class="ch-field">Casket spray </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="floral" name="floral[]" class="checkbox" value="petals" <?php if(in_array("petals",$floral_chk)){echo "checked='checked'";}?> onclick="showHide('petals')" />
                <span class="ch-field">Petals </span> </p>
              <p class="tx-areada">
                <input type="checkbox" id="floral1" name="floral[]" class="checkbox floralclass" value="other" <?php if(in_array("other",$floral_chk)){echo "checked='checked'";}?> onclick="showHide('other_floral')">
                <span class="ch-field">Other </span> </p>
            </div>
            <?php if(in_array("other",$floral_chk)){?>
            <div class="f-row-1" id="div_17">
              <?php }else{?>
              <div class="f-row-1" id="div_17" style="display:none">
                <?php }?>
                <p class="fl-name">
                  <lebel>Flower type:</lebel>
                  <input type="text" name="flower_type" id="flower_type" value="<?php echo $rel_key['floral_flower'];?>" class="text-n" />
                </p>
                <p class="fr-name">
                  <lebel>Colours:</lebel>
                  <input type="text" name="colours" id="colours" value="<?php echo $rel_key['floral_colour'];?>" class="text-n" />
                </p>
              </div>
              <?php if(!(in_array("other",$floral_chk))){?>
              <div id="div_18"></div>
              <?php }else{?>
              <div id="div_18" style="display:none"></div>
              <?php }?>
            </div>
            <?php if(($rel_key['floral_arrangement']=='no') || ($rel_key['floral_arrangement']=='no_pref')){?>
            <div id="div_16" style="display:none"></div>
            <?php }else{?>
            <div id="div_16"></div>
            <?php }?>
            </fieldset>

            <div class="help-f"><!--<img src="images/helpbutton.png" alt="" /></a></div>

            <div class="help-f"><a id="example2" href="#inline19"><!--<img src="images/helpbutton.png" alt="" /></a></div>

            <div style="display: none;">
              <div id="inline19" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>Where people oppose flowers or feel strongly about supporting the local hospice or charity, they choose this option. This is an important source of funds to these organisations. The donation must be announced in any obituary and the money sent by post, or a collection taken at the funeral service. </p>
              </div>-->
            </div>
            <fieldset class="fieldset  process_form1 process_form349">
            <legend class="legend">Donations</legend>
            <div class="f-row-1">
              <h3>Would you prefer donations at the funeral service in lieu of flowers? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_donation" name="is_donation" class="checkbox" value="yes" <?php if($rel_key['funeral_donation']=='yes'){echo "checked='checked'";}?> onclick="showHide('yes_donation')"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_donation" name="is_donation" class="checkbox" value="no" <?php if($rel_key['funeral_donation']=='no'){echo "checked='checked'";}?>  onclick="showHide('no_donation')"/>
                <span class="ch-field">No </span> </p>
                <p class="tx-areada">
                <input type="radio" id="is_donation" name="is_donation" class="checkbox" value="no_pref" <?php if($rel_key['funeral_donation']=='no_pref'){echo "checked='checked'";}?>  onclick="showHide('no_donation')"/>
                <span class="ch-field">No Preferance</span> </p>
            </div>
            <?php if($rel_key['funeral_donation']=='yes'){?>
            <div class="f-row-1" id="div_19">
            <?php }else{?>
            <div class="f-row-1" id="div_19" style="display:none">
              <?php }?>
              <p>
                <lebel>If you answered YES, list the name of organisation </lebel>
              </p>
              <p class="fl-name">
                <input type="text" name="organisation_name" id="organisation_name" value="<?php echo $rel_key['donation_organisation'];?>" class="text-n" />
              </p>
            </div>
            <?php if (($rel_key['funeral_donation']=='no') || ($rel_key['funeral_donation']=='no_pref')){?>
            <div id="div_20" style="display:none"></div>
            <?php }else{?>
            <div id="div_20"></div>
            <?php }?>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline20"><img src="<?php echo base_url;?>images/helpbutton.png" alt=""  class="process_help3413" /></a></div>
            <div style="display: none;">
              <div id="inline20" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>Funeral stationery, such as a program or memorial booklet, is an important part of 	the funeral service. The stationery not only serves as a keepsake for those who 	attend the service, it also allows the family to honour, celebrate, remember, and 	tell the life story of their loved one. </p>
              </div>
            </div>
            <fieldset class="fieldset process_form1 process_form3410">
            <legend class="legend">Funeral Stationery</legend>
            <div class="f-row-1">
              <h3>Would you like funeral stationery to be provided at your funeral service?</h3>
              <p class="tx-areada">
                <input type="radio" id="is_stationery" name="is_stationery" class="checkbox" value="yes" <?php if($rel_key['funeral_stationary']=='yes'){echo "checked='checked'";}?> onclick="showHide('yes_stat')"/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_stationery" name="is_stationery" class="checkbox" value="no" <?php if($rel_key['funeral_stationary']=='no'){echo "checked='checked'";}?>onclick="showHide('no_stat')"/>
                <span class="ch-field">No </span> </p>
                <p class="tx-areada">
                <input type="radio" id="is_stationery" name="is_stationery" class="checkbox" value="no_pref"/>
                <span class="ch-field">No Preference</span></p>
            </div>
            <?php if($rel_key['funeral_stationary']=='yes'){?>
            <div class="f-row-1" id="div_21">
            <?php }else{?>
            <div class="f-row-1" id="div_21" style="display:none">
            <?php }?>
            <p>
              <lebel>If you answered YES, what type of funeral stationery do you require: </lebel>
            </p>
            <p class="tx-areada">
              <input type="checkbox" id="stationery" name="stationery[]" class="checkbox" value="cards" <?php if(in_array("Attendance/Memorial Cards",$stat_chk)){echo "checked='checked'";}?>onclick="showHide('stat_cards')"/>
              <span class="ch-field">Attendance/Memorial Cards </span> </p>
            <p class="tx-areada">
              <input type="checkbox" id="stationery" name="stationery[]" class="checkbox" value="booklets" <?php if(in_array("booklets",$stat_chk)){echo "checked='checked'";}?> onclick="showHide('stat_booklets')"/>
              <span class="ch-field">Booklets </span> </p>
            <p class="tx-areada">
              <input type="checkbox" id="stationery" name="stationery[]" class="checkbox" value="candles" <?php if(in_array("candles",$stat_chk)){echo "checked='checked'";}?> onclick="showHide('stat_candles')"/>
              <span class="ch-field">Candles </span> </p>
            <p class="tx-areada">
              <input type="checkbox" id="stationary_other" name="stationery[]" class="checkbox" value="other" <?php if(in_array("other",$stat_chk)){echo "checked='checked'";}?>onclick="showHide('stationary_other')"/>
              <span class="ch-field">Other </span> </p>
            <?php if(in_array("other",$stat_chk)){?>
            <div id="div_75">
            <?php }else{?>
            <div id="div_75" style="display:none">
              <?php }?>
              <p class="tx-area">
                <input type="text" name="staionery_detail" id="staionery_detail" value="<?php echo $rel_key['staionery_detail'];?>" class="text-n" />
              </p>
            </div>
            <?php if(!(in_array("other",$stat_chk))){?>
            <div id="div_80"></div>
            <?php }else{?>
            <div id="div_80" style="display:none">
              <?php }?>
            </div>
            <?php if(($rel_key['funeral_stationary']=='no') || ($rel_key['funeral_stationary']=='no_pref')){?>
            <div id="div_22" style="display:none"></div>
            <?php }else{?>
            <div id="div_22"></div>
            <?php }?>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline21"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" class="process_help3414"/></a></div>
            <div style="display: none;">
              <div id="inline21" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>People often include music in funeral and memorial services and there are no rules about the type of music that is best. It is advisable to choose music that provides 	comfort and stimulates pleasant memories of the departed person. Funeral songs 	that have meaning to you and your loved one are a perfect choice - his or her 	favourite song, the song that was playing when you met, the songs you liked to 	sing together. Please ensure that the music is available and known to whoever is making arrangements. </p>
              </div>
            </div>
            <fieldset class="fieldset process_form1 process_form3411">
            <legend class="legend">Funeral Notices</legend>
            <div class="f-row-1">
              <h3>Would you like a Funeral Notice placed in the main newspaper? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_notice" name="is_notice" class="checkbox" value="yes" checked="checked" <?php if($rel_key['is_notice']=='yes'){echo "checked='checked'";}?> />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_notice" name="is_notice" class="checkbox" value="no" <?php if($rel_key['is_notice']=='no'){echo "checked='checked'";}?> />
                <span class="ch-field">No </span> </p>
                <p class="tx-areada">
                <input type="radio" id="is_notice" name="is_notice" class="checkbox" value="no_pref"  <?php if($rel_key['is_notice']=='no_pref'){echo "checked='checked'";}?>/>
                <span class="ch-field">No Preference </span> </p>
            </div>
            </fieldset>
            <fieldset class="fieldset process_form1 process_form34 process_form3412">
            <legend class="legend">Music</legend>
            <div class="f-row-1">
              <h3>Do you require music at the funeral? </h3>
              <p class="tx-areada">
                <input type="radio" id="is_music" name="is_music" class="checkbox" value="yes" <?php if($rel_key['is_music']=='yes'){echo "checked='checked'";}?> onClick="showHide('yes_music')" />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_music" name="is_music" class="checkbox" value="no" <?php if($rel_key['is_music']=='no'){echo "checked='checked'";}?> onClick="showHide('no_music')"/>
                <span class="ch-field">No </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_music" name="is_music" class="checkbox" value="no_pref" <?php if($rel_key['is_music']=='no_pref'){echo "checked='checked'";}?> onClick="showHide('no_pref_music')"/>
                <span class="ch-field">No Preference</span> </p>
            </div>
            <?php  if($rel_key['is_music']=='yes'){?>
            <div class="f-row-1" id="div_77">
            <?php }else{?>
            <div class="f-row-1" id="div_77" style="display:none">
              <?php }?>
              <div class="f-row-1">
                <h3>If Yes what music would you like played at your funeral service?</h3>
              </div>
              <div class="f-row-1">
                <p class="fl-name">
                  <lebel>Music entering: (Song/artist)</lebel>
                  <input type="text" name="name_cemnt" id="name_cemnt" value="<?php echo $rel_key['funeral_music_enter'];?>" class="text-n" />
                </p>
                <p class="fr-name">
                  <lebel>Music during: (Song/artist)</lebel>
                  <input type="text" name="state" id="state" value="<?php echo $rel_key['funeral_music_mid'];?>" class="text-n" />
                </p>
                <p class="fr-name">
                  <lebel>Music leaving:  Song/artist)</lebel>
                  <input type="text" name="music_leaving" id="music_leaving" value="<?php echo $rel_key['funeral_music_enter_leave'];?>" class="text-n" />
                </p>
                <p class="fl-name"><span class="fl-name">
                  <lebel>Hymns</lebel>
                  <input type="text" name="hymns" id="hymns" value="<?php echo $rel_key['funeral_hymns'];?>" class="text-n" />
                  </span></p>
              </div>
            </div>
            <?php if(($rel_key['is_music'] == 'no') || ($rel_key['is_music'] == 'no_pref')){?>
            <div id="div_78"></div>
            <?php }else{?>
            <div id="div_78" style="display:none"></div>
            <?php }?>
            </fieldset>
            <div class="help-f">
              <p><a id="example2" href="#inline22"><img src="<?php echo base_url;?>images/helpbutton.png" alt=""  class="process_help3415" /></a></p>
            </div>
            <div style="display: none;">
              <div id="inline22" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>Live music is very powerful – it can express love, joy, sadness, celebration, humour 	and solemnity. It can provide comfort and has been used for centuries to mark 	life's special occasions. </p>
              </div>
            </div>
            <fieldset class="fieldset process_form1 process_form3413">
            <legend class="legend">Musician and Singers</legend>
            <div class="f-row-1">
              <h3>Would you like a musician or singer to perform at your funeral service?</h3>
              <p class="tx-areada">
                <input type="radio" id="is_musician" name="is_musician" class="checkbox" value="yes" <?php if($rel_key['funeral_musician']=='yes'){echo "checked='checked'";}?> onClick="showHide('yes_musician')" />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_musician" name="is_musician" class="checkbox" value="no" <?php if($rel_key['funeral_musician']=='no'){echo "checked='checked'";}?> onClick="showHide('no_musician')"/>
                <span class="ch-field">No </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_musician" name="is_musician" class="checkbox" value="no_pref" <?php if($rel_key['funeral_musician']=='no_pref'){echo "checked='checked'";}?> onClick="showHide('no_pref_musician')"/>
                <span class="ch-field">No Preference </span></p>
            </div>
            <?php if($rel_key['funeral_musician']=='yes'){?>
            <div class="f-row-1" id="div_23">
            <?php }else{?>
            <div class="f-row-1" id="div_23" style="display:none">
              <?php }?>
              <p class="fl-name" style="width:300px;">
                <lebel>
                  <lebel>Musician or singer details (if applicable): </lebel>
                  <input type="text" name="musician_name" id="musician_name" value="<?php echo $rel_key['singer_details'];?>" class="text-n" />
                </lebel>
              </p>
            </div>
            <?php if(($rel_key['funeral_musician']=='no') || ($rel_key['funeral_musician']=='no_pref')){?>
            <div id="div_24" style="display:none"></div>
            <?php }else{?>
            <div id="div_24"></div>
            <?php }?>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline23"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" class="process_help3416" /></a></div>
            <div style="display: none;">
              <div id="inline23" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>Memorial DVD slide shows can be a great reminder of how someone lived their 	life, for both old and young family and friends. You can choose to show these 	presentations at the funeral or memorial service, or just to keep it or distribute it 	to guests for personal viewing as a comforting reminder and celebration of their 	life. </p>
              </div>
            </div>
            <fieldset class="fieldset process_form1 process_form3414">
            <legend class="legend">Media Tributes</legend>
            <div class="f-row-1">
              <h3>Would you like a media/DVD tribute about your life during your funeral service ?</h3>
              <p class="tx-areada">
                <input type="radio" id="is_media" name="is_media" class="checkbox" value="yes" <?php if($rel_key['funeral_media']=='yes'){echo "checked='checked'";}?>/>
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_media" name="is_media" class="checkbox" value="no" <?php if($rel_key['funeral_media']=='no'){echo "checked='checked'";}?>/>
                <span class="ch-field">No </span> </p>
              <p class="tx-areada">
                <input type="radio" id="is_media" name="is_media" class="checkbox" value="no_pref" <?php if($rel_key['funeral_media']=='no_pref'){echo "checked='checked'";}?>/>
                <span class="ch-field">No Preference </span></p>
            </div>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline24"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" class="process_help3417" /></a></div>
            <div style="display: none;">
              <div id="inline24" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>Although male bearers are traditional, there is no reason why women cannot perform this final act. A charge may apply for bearers provided by the funeral director </p>
              </div>
            </div>
            <fieldset class="fieldset process_form1 process_form34  process_form3415">
            <legend class="legend">Pall Bearers</legend>
            <div class="f-row-1">
              <h3>Would you prefer family/friend Pall Bearers OR Pall Bearers provided by a funeral director?</h3>
              <p class="tx-areada">
                <input type="radio" id="bearers" name="bearers" class="checkbox" value="family/friend" <?php if($rel_key['funeral_bearer']=='family/friend'){echo "checked='checked'";}?> onclick="showHide('yes_family')"/>
                <span class="ch-field">Family/Friend </span> </p>
              <p class="tx-areada">
                <input type="radio" id="bearers" name="bearers" class="checkbox" value="funeral director" <?php if($rel_key['funeral_bearer']=='funeral director'){echo "checked='checked'";}?> onclick="showHide('no_family')"/>
                <span class="ch-field">Funeral Director </span> </p>
            </div>
            <?php if($rel_key['funeral_bearer']=='family/friend'){?>
            <div id="div_25">
            <?php }else{?>
            <div id="div_25" style="display:none">
              <?php }?>
              <div class="f-row-1">
                <h3>If family bearers are provided, please give their names and their relationship to the deceased: </h3>
              </div>
              <!--------------------------------- table add code start --------------------------------->
              <div class="inner-tabel">
                <div class="cont-head blue" style="padding:4px 0px 4px 0px; background:none; color:#000;">
                  <ul>
                    <li>Name</li>
                    <li>Relationship</li>
                    <li>Sex</li>
                  </ul>
                </div>
                <div class="inn-cinfo" style="padding:5px;">
                  <table id="bearer_table">
                    <?php $sel_family = mysql_query("select * from funeral_wishes_bearer where person_making_id=".$_SESSION['client']);
								      $count_rec = mysql_num_rows($sel_family);
									  if($count_rec >= 1){
									  while($rel_family = mysql_fetch_assoc($sel_family)){?>
                    <tr>
                      <td><input type="text" id="bearer_name1" name="bearer_name1" value="<?php echo $rel_family['bearer_name'];?>" class="ontintext-tbl" /></td>
                      <td><input type="text" id="bearer_realtionship1" name="bearer_realtionship1" value="<?php echo $rel_family['bearer_relationship'];?>" class="ontintext-tbl"/></td>
                      <td><input type="text" id="bearer_sex1" name="bearer_sex1" value="<?php echo $rel_family['bearer_sex'];?>" class="ontintext-tbl"/></td>
                    </tr>
                    <?php }}else{?>
                    <tr>
                      <td><input type="text" id="bearer_name1" name="bearer_name1"  class="ontintext-tbl" /></td>
                      <td><input type="text" id="bearer_realtionship1" name="bearer_realtionship1"  class="ontintext-tbl"/></td>
                      <td><input type="text" id="bearer_sex1" name="bearer_sex1" class="ontintext-tbl"/></td>
                    </tr>
                    <?php }?>
                  </table>
                  <input type="hidden" value="1" id="bearer_hidden" name="bearer_hidden"/>
                  <div class="buttoncl">
                    <input type="button" id="bearer_add_button" value="Add" class="addbut" />
                  </div>
                </div>
              </div>
              <!--------------------------------- table add code end --------------------------------->
            </div>
            <?php if($rel_key['funeral_bearer']=='funeral director'){?>
            <div id="div_26" style="display:none"></div>
            <?php }else{?>
            <div id="div_26"></div>
            <?php }?>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline25"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" class="process_help3418" /></a></div>
            <div style="display: none;">
              <div id="inline25" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>A memorial release at a funeral or memorial service can be a meaningful farewell 	to your lost loved one, giving comfort and sense of peace to family and friends. A memorial release traditionally takes place at the closing of a graveside service or 	outdoor ceremony.  Funeral releases are often timed for after the reading of a 	bible verse, poem, or a moment of silence. </p>
              </div>
            </div>
            <fieldset class="fieldset process_form1 process_form3416">
            <legend class="legend">Funeral Releases</legend>
            <div class="f-row-1">
              <h3>Would you like a special funeral release during your funeral service?</h3>
              <p class="tx-areada">
                <input type="radio" id="Yes" name="funeral_release" class="checkbox" <?php if($rel_key['funeral_release']=='yes'){echo "checked='checked'";}?> value="yes" onclick="showHide('yes_rel')" />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="No" name="funeral_release" class="checkbox" value="no" <?php if($rel_key['funeral_release']=='no'){echo "checked='checked'";}?> onclick="showHide('no_rel')" />
                <span class="ch-field">No </span> </p>
              <p class="tx-areada">
                <input type="radio" id="No_pref" name="funeral_release" class="checkbox" value="no_pref" <?php if($rel_key['funeral_release']=='no_pref'){echo "checked='checked'";}?> onclick="showHide('no_rel')" />
                <span class="ch-field">No Preference</span> </p>
            </div>
            <?php if($rel_key['funeral_release']=='yes'){?>
            <div class="f-row-1" id="div_27">
            <?php }else{?>
            <div class="f-row-1" id="div_27" style="display:none">
            <?php }?>
            <h3>If you answered YES, what type of funeral release do you require? </h3>
            <p class="tx-areada">
              <input type="checkbox" id="doves" name="funeral_release_type[]" class="checkbox" value="doves" <?php if(in_array("doves",$rel_chk)){echo "checked='checked'";}?> onclick="showHide('funeral_release_doves')"/>
              <span class="ch-field">Doves </span> </p>
            <p class="tx-areada">
              <input type="checkbox" id="balloons" name="funeral_release_type[]" class="checkbox" value="ballons" <?php if(in_array("ballons",$rel_chk)){echo "checked='checked'";}?> onclick="showHide('funeral_release_balloons')"/>
              <span class="ch-field">Balloons </span> </p>
            <p class="tx-areada">
              <input type="checkbox" id="butterf" name="funeral_release_type[]" class="checkbox" value="butterflies" <?php if(in_array("butterflies",$rel_chk)){echo "checked='checked'";}?> onclick="showHide('funeral_release_butterfiles')"/>
              <span class="ch-field">Butterflies </span> </p>
            <p class="tx-areada">
              <input type="checkbox" id="funeral_release_detail" name="funeral_release_type[]" class="checkbox" value="other" <?php if(in_array("other",$rel_chk)){echo "checked='checked'";}?> onclick="showHide('funeral_release_detail')"/>
              <span class="ch-field">Other </span> </p>
            <?php if(in_array("other",$rel_chk)){?>
            <div id="div_76">
              <?php }else{?>
              <div id="div_76" style="display:none">
                <?php }?>
                <p class="tx-area">
                  <input type="text" name="funeral_release_detail" id="funeral_release_detail" value="<?php echo $rel_key['funeral_release_detail'];?>" class="text-n" />
                </p>
              </div>
              <?php if(!(in_array("other",$rel_chk))){?>
              <div id="div_81"></div>
              <?php }else{?>
              <div id="div_81" style="display:none"></div>
              <?php }?>
            </div>
            <?php if(($rel_key['funeral_release']=='no') || ($rel_key['funeral_release']=='no_pref')){?>
            <div id="div_28" style="display:none"></div>
            <?php }else{?>
            <div id="div_28"></div>
            <?php }?>
            </fieldset>
            <div class="help-f"><a id="example2" href="#inline025"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" class="process_help3419"/></a></div>
            <div style="display: none;">
              <div id="inline025" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
                <p>This might include not closing the committal curtains at the crematorium, using flowers to decorate the chapel, items placed in the coffin (no glass and dangerous items if cremation is chosen), items placed on the coffin, photographs displayed in the chapel and any form of symbolism or ritual you might prefer.</p>
              </div>
            </div>
            <fieldset class="fieldset process_form1 process_form3417">
            <legend class="legend">Other Special Requests</legend>
            <div class="f-row-1">
              <h3>Do you require any other special arrangements? </h3>
              <p class="tx-areada">
                <input type="radio" id="Yes" name="special_arrangement" class="checkbox" value="yes" <?php if($rel_key['other_funeral_request']=='yes'){echo "checked='checked'";}?> onclick="showHide('yes_arr')" />
                <span class="ch-field">Yes </span> </p>
              <p class="tx-areada">
                <input type="radio" id="No" name="special_arrangement" class="checkbox" value="no"  <?php if($rel_key['other_funeral_request']=='no'){echo "checked='checked'";}?> onclick="showHide('no_arr')" />
                <span class="ch-field">No </span> </p>
              <p class="tx-areada">
                <input type="radio" id="No_pref" name="special_arrangement" class="checkbox" value="no_pref"  <?php if($rel_key['other_funeral_request']=='no_pref'){echo "checked='checked'";}?> onclick="showHide('no_arr')" />
                <span class="ch-field">No Preference </span> </p>
            </div>
            <?php if($rel_key['other_funeral_request']=='yes'){?>
            <div class="f-row-1" id="div_31">
            <?php }else{?>
            <div class="f-row-1" id="div_31" style="display:none">
              <?php }?>
              <p>
                <lebel>If YES, please describe </lebel>
              </p>
              <p class="fl-name">
                <input type="text" name="special_arrangement_detail" id="cemt_area" value="<?php echo $rel_key['request_description'];?>" class="text-n" />
              </p>
            </div>
            <?php if(($rel_key['other_funeral_request']=='no') || ($rel_key['other_funeral_request']=='no_pref')){?>
            <div id="div_32" style="display:none"></div>
            <?php }else{?>
            <div id="div_32"></div>
            <?php }?>
            </fieldset>
          </div>
          <div class="f-row-2">
            <p style="float:right;">
              <input type="submit"  name="form_wish_edit" class="login_button process3_login_btn" value="Next" onClick="return formvalidation(this.form);"/>
            </p>
            <p style="float:left;"> <a href="advance-details-of-committal.php"><input type="button" value="previous"  class="new_button process3_btn_cont" style="width:120px; padding:10px;"/></a> </p>
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
    <li><a href="my-personal-details.php" title="" id="person_making">1. My Personal Details</a></li>
    <li><a href="my-funeral-guardian.php" title="">2. My Funeral Guardian</a></li>
    <li><a href="details-of-committal.php"  title="">3. My Committal</a></li>
    <li><a href="details-of-funeral-service.php"  title="">4. My Funeral Wishes</a></li>
    <li><a href="after-the-funeral.php" title="">5. After My Funeral</a></li>
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
<?php include '../include/footer1.php'; ?>
</body>
</html>
