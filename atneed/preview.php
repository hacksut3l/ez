<?php

	session_start();

	include_once('../include/config.php');
	include '../include/header.php';

if(!isset($_SESSION['client']))
{
	header("location:../signin.php");	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>eziFunerals</title>

<link href="favicon.icon" rel="shortcut icon">

<link href="<?php echo base_url;?>css/Old_Include_Css/style1.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url;?>css/Old_Include_Css/style.css" rel="stylesheet" type="text/css" />



<!--popup files-->

<link rel="stylesheet" href="<?php echo base_url;?>css/Old_Include_Css/reveal.css">

<script type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery-1.4.1.min.js"></script>

<script type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.reveal.js"></script>

<script type="text/javascript">

$(document).ready(function() {

	$('.hide-div').show();

	$('#preview-btn').click(function()

	{

		$('.hide-div').show();

	});

	$('#next-span').hide();

	$('#RadioGroup1_0').click(function()

	{

		$('#next-span').show();

		$('#back-span').hide();

	});	

	$('#back-span').hide();

	$('#RadioGroup1_1').click(function()

	{

		$('#back-span').show();

		$('#next-span').hide();

	});

	$('#1').hide();

	$('#2').hide();

	$('#3').hide();

	$('#4').hide();

	$('#5').hide();

	var str;

	$('.previewdiv').live("click",function()

	{

		var current_id = $(this).attr('current_id');

		for(var i=1;i<=5;i++)

		{

			if(i == 1)

			{

				str = "PERSON MAKING ARRANGEMENTS";

			}

			else if(i == 2)

			{

				str = "DETAILS OF DECEASED";

			}

			else if(i == 3)

			{

				str = "DETAILS OF COMMITTAL ";

			}

			else if(i == 4)

			{

				str = "DETAILS OF FUNERAL SERVICE";

			}

			else if(i == 5)

			{

				str = "AFTER THE FUNERAL ";

			}

			if(i == current_id)

			{

				$('#'+i).show();

				

				$('#div'+i).html(str+' <a href="javascript:void(0)" class="previewminusdiv" current_id="'+i+'">[-]</a>');

			}

			else

			{

				$('#'+i).hide();

				$('#div'+i).html(str+' <a href="javascript:void(0)" class="previewdiv" current_id="'+i+'">[+]</a>');

			}

		}

	});

	

	$('.previewminusdiv').live("click",function()

	{

		var current_id = $(this).attr('current_id');

		

		if(current_id == 1)

		{

			str = "PERSON MAKING ARRANGEMENTS";

		}

		else if(current_id == 2)

		{

			str = "DETAILS OF DECEASED";

		}

		else if(current_id == 3)

		{

			str = "DETAILS OF COMMITTAL ";

		}

		else if(current_id == 4)

		{

			str = "DETAILS OF FUNERAL SERVICE";

		}

		else if(current_id == 5)

		{

			str = "AFTER THE FUNERAL ";

		}

		

		

		$('#'+current_id).hide();

		$('#div'+current_id).html(str +' <a href="javascript:void(0)" class="previewdiv" current_id="'+current_id+'">[+]</a>');

	});

	

	

});

</script>



<!--Preview new css-->

<style>

.p-sub{

	text-align:justify; 

	padding:0px 10px 10px 10px;

	line-height:18px;

	font-size:14px;
	
	

}
label {
    font-size: 12px;
}

.hide-div{

	width:960px;

	float:left;

	margin-top:20px;

}
span {
    margin-right: 10px;
    font-family:Arial, Helvetica, sans-serif;
}


</style>
<style>
a:hover{ text-decoration:none !important;  }

</style>
</head>

<body>

<!--start web-layout --> 




<div class="web-layout">

	<div class="web-960"><br/><br/><br/><br/>

      <!--start header-form --> 
      <!--end header-form --> 
      <!--start content-wrap-->

<?php
		$fetch_client="select * from client_purchase_info where client_id='".$_SESSION['client']."' ORDER BY date DESC  LIMIT 0,1";
		$result_client=mysql_query($fetch_client);
		$num_of_row=mysql_num_rows($result_client);
		$paymet_data=mysql_fetch_array($result_client);

		if($paymet_data['pdf_type']=='At Need Plan' && $paymet_data['order_info']=='Approved' )
		{
		
		
?>	
	<div class="container">	
      <div class="content-wrap">
      <div class="left-content" style="width:949px;">

        	<h2 class="heading head5_title" style="width:949px; margin-bottom:10px; color:00a3b4 !important">MANAGE YOUR FUNERAL PLAN</h2>

        <p class="p-sub">Thank you for purchasing your eziFunerals Plan.<br/><br/>
You can add or update your Funeral plan at any time, at no additional cost.
If you find something that you think is an error or you would like to change something that you have entered in response to one of our questions, you can use the <strong>"Preview"</strong> buttons to change the information.</p>
 <p class="p-sub">When you have finished checking your Funeral Plan, click <strong>"OK"</strong> and press the <strong>“Next”</strong> button at the bottom of the page displaying the Funeral Plan* to update your plan.</p>
       

</div>











<?php 
		}
		else
		{	

?>
	<div class="container">	
      <div class="content-wrap">
      <div class="left-content" style="width:949px;">

        	<h2 class="heading head5_title" style="width:949px; margin-bottom:10px;">Get ready to check your Funeral Plan</h2>

        <p class="p-sub">We are now about to show you a draft of your Funeral Plan. If you find something  that you think is an error or  you would like to change  something that you have entered in response to one of our questions, you can use the <strong>"Preview"</strong> buttons to change the information. </p><p class="p-sub">When you have finished checking your draft Funeral Plan,click <strong>"OK"</strong> and press the <strong>“Next”</strong> button at the bottom of the page displaying the Funeral Plan* to proceed to the next stage.</p>

		<p class="p-sub">[<span class="ui-state-error-text">* Please note:</span>
		<sp class="gree_pas" style="font-size:15px !important;"> This is just a preview. Following  payment you will receive a professional pdf of your personal Funeral Plan. After you have received your  plan, you can <strong>POST</strong> it on our website for <strong>FREE</strong> and INVITE Funeral Directors in your area to quote on your funeral. We will help you compare prices and identify which Funeral Directors can give you the best funeral at the best price... saving your time and money.</sp>]</p>

       

</div>
<?php

     	}
	    
?>
        <!--hide div start here-->

        <div class="hide-div">

        <!--section one start here-->	

      	<div class="left-content" style="width:949px;">

        	<h2 class="heading final_txtline" style="width: 949px; background:#dcdcdc; float: left; padding-bottom: 8px; " id="div1">Person Making Arrangements <!--<a href="javascript:void(0)" class="previewdiv" current_id="1">[+]</a>--> </h2>

            <div class="help-f help-f1" style="width:190px; background:#dcdcdc; float: right; padding-top:0px; margin-top:-56px;">
		
					<a  id="login_pop"  href="#step1">

                   <input type="button" class="login_button final5_btn" value="preview" style="width:80px; height:25px; padding:0px; border-radius:6px; font-size:12px;"/>

                    </a>
					
<!---------------------------------------------------------Person Making Arrangements popup------------------------------------------------------------------------------------->					
						
					
				<a href="#x" class="overlay_plan" id="step1"></a>
					<div class="popup">
						
				<div class="row">

						<div class="col-md-12">
							 <?php include("person-making-arrangements-edit.php") ?>
						</div>


				</div>
					<a class="close_plan" href="#close"></a>
				</div>
			
<!-----------------------------------------------------End Person Making Arrangements popup------------------------------------------------------------------------------------->	
		
		
					
					
					
					

       </div>

            

            <!--start mpd-form-->

           

            

            <!--<div class="mpd-form" id="1"  style="width:949px;">-->

            		<!--Edit start here-->

            		<!--<div class="help-f"><a href="#" class="big-link" data-reveal-id="myModal">

                    <img src="<?php /*?><?php echo base_url;?><?php */?>images/edit.jpg" alt="" title="Edit" />

                    </a>

                    <div id="myModal" class="reveal-modal">

                        <?php /*?><?php include("person-making-arrangements-edit.php") ?><?php */?>

                        <a class="close-reveal-modal">&#215;</a>

                    </div>

                    </div>-->

                    <!--Edit end here-->

                    

                    <!--<fieldset class="fieldset" style="width:906px;">

                        <legend class="legend">My Personal Details</legend>

                        <?php

							$sql = mysql_query("SELECT * FROM  person_making_arangements WHERE client_id = '".$_SESSION['client']."' ");	

							$rows = @mysql_num_rows($sql);	

							$person = @mysql_fetch_assoc($sql);

						

						?>

                        <div class="f-row-1" style="padding:0 !important;">

                        	 <p class="fl-name" style="width:100%;">

                                <label><span style="font-weight:bold;" class="blue1"><?php echo $person['f_name']." ".$person['m_name']." ".$person['l_name'];?></span></label>

                                <p style="width:680px; float:left; line-height:22px;"><label><span style="font-size:12px; width:400px; text-align:justify; font-weight:bold;"> 

                                
<p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">  Address1 :</span> <?php echo $person['address1'];?></label></p>
                             
                                
                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Suburb :</span> <?php echo $person['suburb'];?></label></p>
                              
                                
                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                State :</span> <?php echo $person['state'];?></label></p>
                                
                         
                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">
                                Postcode :</span> <?php echo $person['postcode'];?></label></p>
                                
                              

                                

                                </span></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Phone :</span> <?php echo $person['telephone'];?></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Mobile :</span> <?php echo $person['mobile'];?></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Email :</span><?php echo $person['email'];?></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Relationship to the deceased :</span><?php echo $person['realtions'];?></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Funeral Costs and Payments :</span><?php echo $person['budget'];?></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Method Of Funeral Payment :</span><?php echo ucwords($person['payment_methods']);?></label></p>

                             </p>

                        </div>

                        <div class="f-row-1">

                        	 <p class="fl-name" style="float: left; width: 100%; margin-top: 6px;">

                                <label ><span class="bold">Date : <span class="blue1"><?php echo $person['date'];?></span></span></label> 

                             </p>

                        </div>

                    </fieldset>-->

           <!-- </div>-->

            <!--end mpd-form-->

        </div>

        <!--section one end here-->

        <!--section two start here-->	

      	<div class="left-content" style="margin-top:20px; width:949px;">

        	<h2 class="heading final_txtline" style="width: 949px; background:#dcdcdc; float: left; padding-bottom: 8px;" id="div2">Details of Deceased</h2><div class="help-f help-f1" style="width: 150px; background:#dcdcdc; float: right; padding-top:0px;  margin-top:-56px;">
					
					<a  id="login_pop"  href="#step2">

                   <input type="button" class="login_button final5_btn" value="preview" style="width:80px; height:25px; padding:0px; border-radius:6px; font-size:12px;"/>

                    </a>
					
<!----------------------------------------------------------------Details of Deceased popup------------------------------------------------------------------------------------->					
						
					
				<a href="#x" class="overlay_plan" id="step2"></a>
					<div class="popup">
						
				<div class="row">

						<div class="col-md-12">
							 <?php include("details-of-deceased-edit.php") ?>
						</div>


				</div>
					<a class="close_plan" href="#close"></a>
				</div>
			
<!------------------------------------------------------------End Details of Deceased popup------------------------------------------------------------------------------------->										
	
		 </div>

            

            <!--start mpd-form-->

                

                  <div class="mpd-form" id="2" style="width:949px;">

                  

                  	<!--Edit start here-->

            		

                    <!--Edit end here-->

                  

                    <fieldset class="fieldset" style="width:906px;">

                    <legend class="legend">Details Of Deceased </legend>

                    <?php

						$decsql = "SELECT * FROM  deceased WHERE person_making_id = '".$_SESSION['client']."' ";

						$decresult = mysql_query($decsql);

						

						$decrows = @mysql_num_rows($decresult);

						

						$deceased = mysql_fetch_assoc($decresult);

					?>

                    <div class="f-row-1" >

                      <p class="fl-name" style="width:100%;">

                        <label><span style="font-weight:bold;" class="blue1"><?php echo $deceased['f_name']." ".$deceased['m_name']." ".$deceased['l_name'];?></span></label></p>

                        <label>

                      <p style="width:680px; float:left; line-height:22px; width:400px;"><span style="font-size:12px; text-align:justify; font-weight:bold;">
                        <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Address1 :</span><?php echo $deceased['address1'];?></label></p>
                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Address2 :</span><?php echo $deceased['address2'];?></label></p>
                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Suberb :</span><?php echo $deceased['suburb'];?></label></p>
                                 <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                State :</span><?php echo $deceased['state'];?></label></p>
                                 <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Postcode :</span><?php echo $deceased['postcode'];?></label></p>


                      </span></p>

                      </label>

                      <br />

                      <!--<label><span style="font-weight:bold;">Ph.:</span><?php echo $deceased['telephone'];?></label>

                      <label><span style="font-weight:bold;">Mob.:</span><?php echo $deceased['mobile'];?></label>

                      <label><span style="font-weight:bold;">Email.:</span><?php echo $deceased['email'];?></label>-->

                      </p>

                    </div>

                    <div class="f-row-1">

                      <h3 style="width:900px;"></h3>

                    </div>

                    <div class="f-row-1">

                      <p class="fl-name">

                        <label><span style="font-weight:bold;">Gender : </span><?php echo $deceased['gender'];?></label>

                      </p>

                      <p class="fl-name">

                        <label><span style="font-weight:bold;">Age : </span><?php echo $deceased['age'];?></label>

                      </p>

                      <p class="fr-name">

                        <label><span style="font-weight:bold; ">Date of birth : </span><?php echo $deceased['dob'];?></label>

                      </p>

                    </div>

                    <div class="f-row-1">

                      <p class="fl-name">

                        <label><span style="font-weight:bold;">Height : </span><?php echo $deceased['height'];?></label>

                      </p>

                      <p class="fl-name">

                        <label><span style="font-weight:bold;">Weight : </span><?php echo $deceased['weight'];?></label>

                      </p>

                    </div>

                    <div class="f-row-1">

                      <p class="fl-name">

                        <label><span style="font-weight:bold;">Place of birth : </span><?php echo $deceased['pob'];?></label>

                      </p>

                      <p class="fl-name">

                        <label><span style="font-weight:bold;">Country of birth : </span><?php echo $deceased['cob'];?></label>

                      </p>

                    </div>

                    <div class="f-row-1">

                      <p class="fl-name">

                        <label><span style="font-weight:bold;">Date of Death : </span><?php echo $deceased['dod'];?></label>

                      </p>

                      <p class="fl-name">

                        <label><span style="font-weight:bold;">Time of Death (AM/PM) : </span><?php echo $deceased['tod'];?></label>

                      </p>

                    </div>

                    <div class="f-row-1">

                      <h3 style="width:900px;"></h3>

                      <br />

                      <p class="fl-name">

                        <label><span style="font-weight:bold;">Place of Death : </span><?php echo $deceased['place_of_death'];?></label>

                      </p>

                    </div>

                    <div class="f-row-1">

                      <p style="width:680px; float:left; line-height:22px; width:400px;"><span style="font-size:12px; text-align:justify; font-weight:bold;">
                        <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Details and Address  :</span><?php echo $deceased['death_address'];?></label></p>
                           
                           <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Suburb  :</span><?php echo $deceased['death_suburb'];?></label></p>   
                                
                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                State  :</span><?php echo $deceased['death_state'];?></label></p>  
                                
                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Postcode  :</span><?php echo $deceased['death_postcode'];?></label></p> 

                      

                      </p>

                    </div>

                    <div class="f-row-1">

                      <p>

                        <label><span style="font-weight:bold;">Place where deceased is currently resting : </span><?php echo $deceased['deceased_resting'];?></label>

                      </p>

                    </div>

                    <div class="f-row-1">

                      <h3 style="width:900px;"></h3>

                      <br />

                      <p>

                        <label><span style="font-weight:bold;">Medical Certificate of Cause of Death issued : </span><?php echo $deceased['medical_certificate'];?></label>

                      </p>

                      <!--<p class="tx-areamf">

                                              <input type="radio" id="nopre" name="nopre" class="checkbox" />

                                                <span class="ch-field">No preference  </span>

                                            </p>-->

                    </div>

                    <?php

						if($deceased['medical_certificate'] == 'yes')

						{

					?>

                    

                    <div id="doc_detail_span" style="float: left;">

                      <div class="f-row-1">

                        <h3 style="width:900px; font-size:14px; color:#0096A8;"><strong>Doctors Details :</strong></h3>

                        <p class="fl-name">

                          <label><span style="font-weight:bold; margin-top:8px; float:left; width:100%;" class="blue1"><?php echo $deceased['doc_f_name']." ".$deceased['doc_m_name']." ".$deceased['doc_l_name'];?></span></label>

                          <label>

                        <p style="width:680px; float:left; line-height:22px;"><span style="font-size:12px; text-align:justify; font-weight:bold;">
 <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                           Address1  :</span><?php echo $deceased['doc_address1'];?></label></p>
                            <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                           Address2  :</span><?php echo $deceased['doc_address2'];?></label></p>
                           
                           <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Suburb  :</span><?php echo $deceased['doc_suburb'];?></label></p>   
                                
                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                State  :</span><?php echo $deceased['doc_state'];?></label></p>  
                                
                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Postcode  :</span><?php echo $deceased['doc_postcode'];?></label></p> 
						
						</span></p>

                       </label>

                        
                       <p style="float: left; width: 100%; margin-top: 8px;"> <label><span style="font-weight:bold;">Phone :</span><?php echo $deceased['doc_telephone'];?></label></p> 

                        <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold;">Mobile :</span><?php echo $deceased['doc_mobile'];?></label>
</p> 
                       <p style="float: left; width: 100%; margin-top: 8px;"> <label><span style="font-weight:bold;">Email :</span><?php echo $deceased['doc_email'];?></label>

                        </p>

                      </div>

                    </div>

                    <?php

						}

					?>

                    <div class="f-row-1">

                      <h3 style="width:900px;"></h3>

                      <br />

                      <p>

                        <label><span style="font-weight:bold;">Is the deceased person registered as an organ donor?</span><?php echo $deceased['organ_donar'];?></label>

                      </p>

                    </div>

                    <?php

						if($deceased['organ_donar'] == 'yes')

						{

					?>

                    

                    <div class="f-row-1" id="organ_div">

                      <p style="width:680px; float:left; line-height:18px;"><span style="font-size:12px; text-align:justify;"><?php echo $deceased['organ_donar_detail'];?></span></p>

                    </div>

                    <?php

						}

					?>

                    

                    <div class="f-row-1">

                      <h3 style="width:900px;"></h3>

                      <br />

                      <p>

                        <label><span style="font-weight:bold;">Does the deceased person have a pre-paid Funeral Plan?</span><?php echo $deceased['is_pre_paid'];?></label>

                      </p>

                    </div>

                    <?php

						if($deceased['is_pre_paid'] == 'yes')

						{

					?>

                    <div id="is_prepaid_div" style="float:left;">

                      <div class="f-row-1">

                        <p class="fl-name">

                          <label><span style="font-weight:bold;" class="blue1"><?php echo $person['business_name'];?></span></label>

                          <label>

                        <p style="width:680px; float:left; line-height:22px;"><span style="font-size:12px; text-align:justify;">Address goes here Address goes here Address goes hereAddress goes here Address goes here Address goes hereAddress goes here Address, Mumbai, Maharashtra, 4220045</span></p>

                        </label>

                        <br />
                        <p style="float: left; width: 100%; margin-top: 8px;"> <label><span style="font-weight:bold;">Phone :</span><?php echo $deceased['telephone'];?></label></p> 

                        <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold;">Mobile :</span><?php echo $deceased['mobile'];?></label>
</p> 
                       <p style="float: left; width: 100%; margin-top: 8px;"> <label><span style="font-weight:bold;">Email :</span><?php echo $deceased['email'];?></label>

                        

                        </p>

                      </div>

                    </div>

                    </fieldset>

                    <?php

						}

					?>

                  </div>

               

<!--end mpd-form-->

        </div>

        <!--section two end here-->

        

        <!--section three start here-->	

      	<div class="left-content" style="margin-top:20px; width:949px;">

        	<h2 class="heading  final_txtline" style="width: 949px; background:#dcdcdc; float: left; padding-bottom: 8px;"id="div3">Details Of Committal <!--<a href="javascript:void(0)" class="previewdiv" current_id="3">[+]</a>--></h2> <div class="help-f help-f1" style="width: 150px; background:#dcdcdc; float: right; padding-top:0px; margin-top:-56px;">
					<a  id="login_pop"  href="#step3">

                   <input type="button" class="login_button final5_btn" value="preview" style="width:80px; height:25px; padding:0px; border-radius:6px; font-size:12px;"/>

                    </a>
					
<!----------------------------------------------------------------Details Of Committal popup------------------------------------------------------------------------------------->					
						
					
				<a href="#x" class="overlay_plan" id="step3"></a>
					<div class="popup">
						
				<div class="row">

						<div class="col-md-12">
							 <?php include("details-of-committal-edit.php") ?>
						</div>


				</div>
					<a class="close_plan" href="#close"></a>
				</div>
			
<!------------------------------------------------------------End Details Of Committal popup------------------------------------------------------------------------------------->										
        </div>

            

            <!--start mpd-form-->

           

            <div class="mpd-form" id="3" style="width:949px;">

            <!--Edit start here-->

            		

                    <!--Edit end here-->

                    <fieldset class="fieldset" style="width:906px; margin-top:10px;">

                        <legend class="legend">Details of Committal :</legend>

                        

                        <?php

							$commsql = "SELECT * FROM  committal WHERE person_making_id = '".$_SESSION['client']."' ";

							$commesult = mysql_query($commsql);

							

							$commrows = @mysql_num_rows($commesult);

							

							$comittal = mysql_fetch_assoc($commesult);

						?>

                        

                        <!--<div class="f-row-1">

                        	<h3 style="width:906px;">Deceased to be laid to rest in</h3>                            

                            <p class="tx-area">                                

                                <span class="ch-field"><?php //echo ucwords($comittal['laid_to_rest']);?> </span>

                            </p>                            

                        </div>-->

              	</fieldset>

               

              <?php

			  	if($comittal['laid_to_rest'] == 'burial')

				{

			  ?>

             <fieldset class="fieldset" id="burialfield" style="margin-top:10px; width:906px;">           

                        <legend class="legend">Burial details</legend>

                        <div class="f-row-1">

                        	<h3 style="width:906px;">Will the deceased be buried in a new grave or an existing grave?</h3>

                            <p class="tx-area">

                                

                                <span class="ch-field"><?php echo $comittal['burried_in'];?> </span>

                            </p>

                            

                        </div>

                        <div class="f-row-1">

                        	<h3 style="width:906px;">If you are using a new grave, which cemetery do you wish the deceased to be buried? </h3>

                              

                        </div>

                        <div class="f-row-1" style="width:785px;">

                        	 <p class="fl-name" style="width:300px;">

                                <label>Name of Cemetery : <?php echo $comittal['name_cemetery'];?></label>

                             </p>

                             <p class="fr-name">

                                <label>City : <?php echo $comittal['cemetery_city'];?></label>

                             </p>

                             <p class="fr-name">

                                <label>State : <?php echo $comittal['cemetery_state'];?></label>

                             </p>

                        </div>

                        <div class="f-row-1">

                      

                            

                            <p>

                        <label><span style="font-weight:bold;">Do you have a preferred section of the cemetery?</span><?php echo $comittal['is_preferred_section'];?></label>

                      </p>

                            

                            </div>

                            <?php

								if($comittal['is_preferred_section'] == 'yes')

								{

							?>

                        <div class="f-row-1" id="preffered_section_div">

                        	

                            <p class="fl-name">

                                <label>Cemetery Area : <?php echo $comittal['cemetery_area'];?></label>

                             </p>

                               <p class="fr-name">

                                <label>Section : <?php echo $comittal['cemetery_section'];?></label>

                             </p>

                               <p class="fr-name">

                                <label>Number : <?php echo $comittal['cemetery_number'];?></label>

                             </p>

                    	</div>

                        	<?php

								}

							?>

                        

                        <div class="f-row-1">

                        	<h3 style="width:906px;">If the deceased is being buried in an existing grave, provide details of cemetery :  </h3>

                        </div>

                        <div class="f-row-1">

                        	<p style="width:680px; float:left; line-height:18px;"><label><span style="font-size:12px; text-align:justify;"> 

                            

                            <?php echo $comittal['existing_grave_addr'];?>

                            

                            </span></label></p>

                    	</div>

                        <div class="f-row-1">

                        	 <p class="fl-name" style="width:600px; float:left;">

                                <label>State the grave number :<b><?php echo $comittal['grave_number'];?> </b></label>

                                <label>Where are the grave deeds located? :<b><?php echo ucwords($comittal['grave_location']);?></b></label>

                             </p>

                            

                        </div>

   			 </fieldset>

             <?php

			 	}

				if($comittal['laid_to_rest'] == 'cremation')

				{

			 ?>

                 <!--Cremation details section-->

                  <fieldset class="fieldset" id="creemationfield" style="margin-top:10px;width:906px;">

                            <legend class="legend">Cremation details</legend>


                            <div class="f-row-1">

                                 <p class="fl-name" style="width:400px;">

                                    <label>Name of Crematorium : <strong><?php echo ucwords($comittal['crematorium_name']);?></strong> </label><br />

                                    <label>City : <strong><?php echo ucwords($comittal['crematorium_city']);?></strong></label><br />

                                    <label>State : <strong><?php echo ucwords($comittal['crematorium_state']);?></strong></label>

                                 </p>

                            </div>

                  </fieldset>	

             <?php

			 	}

				if($comittal['laid_to_rest'] == 'entombment')

				{

			 ?>	 

              

              <!--Entombment details section-->

                  <fieldset class="fieldset"  id="entombmentfield" style="margin-top:10px;width:906px;">

                            <legend class="legend">Entombment details</legend>

                            <div class="f-row-1">

                                <h3>Which mausoleum do you wish the deceased to be entombed?</h3>

                            </div>

                            <div class="f-row-1">

                                 <p class="fl-name" style="width:400px;">

                                    <label>Name of Mausoleum : <strong><?php echo ucwords($comittal['mausoleum_name']);?></strong> </label><br />

                                    <label>City : <strong><?php echo ucwords($comittal['mausoleum_city']);?></strong> </label><br />

                                    <label>State : <strong><?php echo ucwords($comittal['mausoleum_state']);?></strong></label>

                                 </p>

                                 

                            </div>

                  </fieldset>

             <?php

			 	}

			 ?>

            </div>

            

            

            <!--end mpd-form-->

        </div>

        <!--section three end here-->

        

        

        

        <!--section four start here-->	

      	<div class="left-content" style="margin-top:20px; width:949px;">

        	<h2 class="heading  final_txtline" style="width: 949px; background:#dcdcdc; float: left; padding-bottom: 8px;"id="div4">Details of Funeral Service <!--<a href="javascript:void(0)" class="previewdiv" current_id="4">[+]</a>--></h2> <div class="help-f help-f1" style="width: 150px; background:#dcdcdc; float: right; padding-top:0px; margin-top:-56px;">					
			
					<a  id="login_pop"  href="#step4">

                   <input type="button" class="login_button final5_btn" value="preview" style="width:80px; height:25px; padding:0px; border-radius:6px; font-size:12px;"/>

                    </a>
					
<!---------------------------------------------------------Details of Funeral Service popup------------------------------------------------------------------------------------->					
						
					
				<a href="#x" class="overlay_plan" id="step4"></a>
					<div class="popup">
						
				<div class="row">

						<div class="col-md-12">
							<?php include("details-of-funeral-service-edit.php") ?>
						</div>


				</div>
					<a class="close_plan" href="#close"></a>
				</div>
			
<!------------------------------------------------------End Details of Funeral Service popup------------------------------------------------------------------------------------->	

        </div>

            

            <!--start mpd-form-->

            

            

            <div class="mpd-form" id="4"  style="width:949px;">

            		<!--Edit start here-->

            		

                    <!--Edit end here-->

                    <?php

						$servicesql = "SELECT * FROM  funeral_service_details WHERE person_making_id = '".$_SESSION['client']."' ";

						$serviceresult = mysql_query($servicesql);

						

						$servicerows = @mysql_num_rows($serviceresult);

						

						$service = mysql_fetch_assoc($serviceresult);

					?>

                    

                    <fieldset class="fieldset" style="margin-top:10px; width:906px;">

            <legend class="legend">Date and Time Of Service</legend>

            

            <div style="width:906px; float:left;">

             <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Preferred Day :</span> <?php echo ucwords($service['day_of_service']);?></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label style="font-size:12px;"><span style="font-weight:bold; font-size:12px;">

                                Preferred Date :   </span>Date1 : <?php echo $service['date_service1'];?> &nbsp;&nbsp;&nbsp;&nbsp;Date2 : <?php echo $service['date_service2'];?></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Preferred Time :  </span><?php echo ucwords($service['time_of_service']);?></label></p>

                                  <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                People estimate may attend the service : </span><?php echo ucwords($service['num_of_people']);?></label></p>

                                

                        	<!--<table style="width:906px; margin-bottom:10px;" >

                            	<tr class="tr-class">

                                	<td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                    <span class="bold">Preferred Day</span></td>

                                    <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                    <span class="bold">Preferred Date</span></td>

                                    <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                    <span class="bold">Preferred Time</span></td>

                                    <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                    <span class="bold">People estimate may attend the service</span></td>

                              </tr>

                                <tr>

                                	<td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['day_of_service']);?><?php */?></td>

                                    <td style="padding:5px;" class="td-class"><p>Date1: <?php /*?><?php echo $service['date_service1'];?><?php */?></p>

                                    <br /><p>Date2: <?php /*?><?php echo $service['date_service2'];?><?php */?></p></td>

                                    <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['time_of_service']);?><?php */?></td>

                                    <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['num_of_people']);?><?php */?></td>

                                </tr>

                          </table>-->

              </div>

            </fieldset>

            

            

            

            <fieldset class="fieldset" style="margin-top:10px; width:906px;">

            <legend class="legend">Details of Funeral Service</legend>

            

            <div style="width:906px; float:left; font-size:12px;">

             <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Prefer funeral :</span> <?php echo ucwords($service['funeral_type']);?></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Require service :</span><?php echo ucwords($service['funeral_service']);?></label></p>

                                  <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Funeral service to be held :</span><?php if($service['funeral_place'] != 'Other') echo ucwords($service['funeral_place']); else echo ucwords($service['funeral_held']);?></label></p>

                        	<!--<table style="width:906px; margin-bottom:10px;" >

                            	<tr class="tr-class">

                                	<td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                    <span class="bold">Prefer funeral</span></td>

                                    <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                    <span class="bold">Require service</span></td>

                                    <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                    <span class="bold">Funeral service to be held</span></td>

                                    

                              </tr>

                                <tr>

                                	<td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['funeral_type']);?><?php */?></td>

                                    <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['funeral_service']);?><?php */?></td>

                                    <td style="padding:5px;" class="td-class"><?php /*?><?php if($service['funeral_place'] != 'Other') echo ucwords($service['funeral_place']); else echo ucwords($service['funeral_held']);?><?php */?></td>

                                </tr>

                          </table>-->

              </div>

             

            <div class="f-row-1">

              <h3 style="width:906px; margin-top: 8px;">Require service : <label><?php echo ucwords($service['funeral_status']);?></label><?php if($service['funeral_status'] == 'religious'){?> - <label><?php echo ucwords($service['funeral_religion']);?></label><?php }?></h3>

            </div>

            </fieldset>

            <?php 

				if($service['rosary_type'] != 'neither')

				{

			?>

                    <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                    <legend class="legend">Viewings and Rosaries</legend>

                    

                    <div style="width:906px; float:left;">

                     <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Require a viewing or rosary :</span> <?php echo ucwords($service['rosary_type']);?></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Require it to be private or public :</span><?php echo ucwords($service['rosary_view']);?></label></p>

                                  <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Place to be held :</span><?php if($service['rosary_place'] != 'other') echo ucwords($service['rosary_place']); else echo ucwords($service['rosary_place_details']);?></label></p>

                                

                                 <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Preferred Day & Time :</span><?php echo ucwords($service['rosary_day']);?> : <?php echo ucwords($service['rosary_time']);?></label></p>

                                

                                 <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                No. of People estimate may attend :</span><?php echo ucwords($service['rosary_num_people']);?></label></p>

                                

                                

                                

                                    <!--<table style="width:906px; margin-bottom:10px;" >

                                        <tr class="tr-class">

                                            <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                            <span class="bold">Require a viewing or rosary</span></td>

                                            <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                            <span class="bold">Require it to be private or public</span></td>

                                            <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                            <span class="bold">Place to be held</span></td>

                                            <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                            <span class="bold">Preferred Day & Time</span></td>

                                            <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                            <span class="bold">No. of People estimate may attend</span></td>

                                      </tr>

                                        <tr>

                                            <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['rosary_type']);?><?php */?></td>

                                            <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['rosary_view']);?><?php */?></td>

                                            <td style="padding:5px;" class="td-class"><?php /*?><?php if($service['rosary_place'] != 'other') echo ucwords($service['rosary_place']); else echo ucwords($service['rosary_place_details']);?><?php */?></td>

                                            <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['rosary_day']);?> : <?php echo ucwords($service['rosary_time']);?><?php */?></td>

                                            <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['rosary_num_people']);?><?php */?></td>

                                        </tr>

                                  </table>-->

                      </div>

                      

                    <?php

						if($service['rosary_jewellary'] == 'yes')

						{

					?>

                        <div id="div_3">

                        <div class="f-row-1" id="end_div_yes" style="margin-top:10px;">

                          <p>

                            <label><strong>List special items of clothing or jewellery to be provided :</strong> <?php echo ucwords($service['num_of_jewellary']);?></label>

                            <ul>

                              

                            </ul>

                          </p>

                        </div>

                        </div> 

                   <?php

				   		}

				   ?>

                    </fieldset>

          <?php

		  	}

		  ?>  

            <fieldset class="fieldset" style="margin-top:10px; width:906px;">

            <legend class="legend">Embalming</legend>

            <div class="f-row-1">

              <h3 style="border:0; ">Require the body to be embalmed : <label><?php echo ucwords($service['embalmed_body']);?></label> </h3>

            </div>

            </fieldset>

            

            <fieldset class="fieldset" style="margin-top:10px; width:906px;">

            <legend class="legend">Coffin Casket</legend>

   

            <div class="f-row-1">

              

              <div style="width:906px; float:left;">

               <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Category :</span> <?php echo ucwords($service['casket_type_category']);?></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Budget :</span><?php echo ucwords($service['casket_type_name']);?></label></p>

                                 <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Supplier :</span><?php echo ucwords($service['casket_type_supplier']);?></label></p>

                                

                                

                        	<!--<table style="width:906px; margin-bottom:10px;" >

                            	<tr class="tr-class">

                                	<td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                    <span class="bold">Category</span></td>

                                    <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                    <span class="bold">Budget</span></td>

                                    <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                    <span class="bold">Supplier</span></td>

                              </tr>

                                <tr>

                                	<td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['casket_type_category']);?><?php */?></td>

                                    <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['casket_type_name']);?><?php */?></td>

                                    <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['casket_type_supplier']);?><?php */?></td>

                                </tr>

                          </table>-->

              </div>

            </div>

            </fieldset>

            

            <?php

				if($service['service_performer'] == 'yes')

				{

			?>

                    <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                    <legend class="legend">Minister Or Celebrant</legend>

                    <div class="f-row-1">

                      <h3 style="border:0;">A minister, celebrant or person in mind to perform the service </h3>

                      

                      <div style="width:906px; float:left;">

                      

                        <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Name :</span> <?php echo ucwords($service['service_performer_name']);?></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Email :</span><?php echo $service['service_performer_email'];?></label></p>

                                 <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Phone :</span><?php echo ucwords($service['service_performer_phone']);?></label></p>

                      

                                    <!--<table style="width:906px; margin-bottom:10px;" >

                                        <tr class="tr-class">

                                            <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                            <span class="bold">Name</span></td>

                                            <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                            <span class="bold">Email</span></td>

                                            <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                            <span class="bold">Phone</span></td>

                                      </tr>

                                        <tr>

                                            <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['service_performer_name']);?><?php */?></td>

                                            <td style="padding:5px;" class="td-class"><?php /*?><?php echo $service['service_performer_email'];?><?php */?></td>

                                            <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['service_performer_phone']);?><?php */?></td>

                                        </tr>

                                  </table>-->

                      </div>

                      

                    </div>

                    </fieldset>

            <?php

				}

			?>

            <fieldset class="fieldset" style="margin-top:10px; width:906px;">

            <legend class="legend">Eulogy</legend>

            <div class="f-row-1">

              <h3 style="width:906px; margin-bottom:10px;">Do you require a eulogy at the service about the deceased persons life? </h3>

              

                <span class="ch-field"><?php echo ucwords($service['eulogy_service']);?> </span> </p>

            </div>

            </fieldset>

            <?php

				if($service['funeral_special_readings'] == 'yes')

				{

			?>

            

                    <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                    <legend class="legend">Special Readings</legend>

                    <div class="f-row-1">

                      <h3 style="border:0;">Special Readings Details</h3>

                      

                      <div style="width:906px; float:left;">

                      

                      <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                Details of person/s to deliver the reading :</span><?php echo ucwords($service['eulogy_service_persons']);?></label></p>

                                <p style="float: left; width: 100%; margin-top: 8px;"><label><span style="font-weight:bold; font-size:12px;">

                                List text or poems :</span><?php echo ucwords($service['eulogy_service_poems']);?></label></p>

                            

                                

                                

                                    <!--<table style="width:906px; margin-bottom:10px;" >

                                        <tr class="tr-class">

                                            <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                            <span class="bold">Details of person/s to deliver the reading</span></td>

                                            <td class="td-class" style="padding:5px; background-color:#f2f2f2;">

                                            <span class="bold">List text or poems</span></td>

                                      </tr>

                                        <tr>

                                            <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['eulogy_service_persons']);?><?php */?> </td>

                                            <td style="padding:5px;" class="td-class"><?php /*?><?php echo ucwords($service['eulogy_service_poems']);?><?php */?> </td>

                                        </tr>

                                  </table>-->

                      </div>

                      

                    </div>

                    </fieldset>

            <?php

				}

				if($service['funeral_notice'] == 'yes')

				{

			?>

                    <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                    <legend class="legend">Funeral Notices</legend>

                    <div class="f-row-1" id="div_9">

                      <p class="fl-name">

                        <label><strong>Newspaper : </strong> <?php echo ucwords($service['funeral_newspaper']);?></label>

                      </p>

                    </div> 

                    </fieldset>

            <?php

				}

			?>

            <fieldset class="fieldset" style="margin-top:10px; width:906px;">

            <legend class="legend">Funeral Transport</legend>

            <div class="f-row-1" style="border:0;">

             

              

              <div style="width:906px; float:left;">



              

              

                        	<table style="width:170px; margin-bottom:10px;" >

                            	<tr class="tr-class">

                                	<td class="td-class" style="padding:5px; ">

                                    <span class="bold">Transported by  : </span></td>

                                    <?php

										if($service['funeral_transport_material'] == 'yes')

										{

									?>

                                            <td class="td-class" style="padding:5px; ">

                                            <span class=""><?php echo $service['funeral_transport_material'];?> </span></td>

                                    <?php

										}

									?>

                              </tr>

                                <tr>

                                	<td style="padding:5px;" class="td-class bold" ><?php if($service['funeral_transport'] != 'other') echo ucwords($service['funeral_transport']); else echo ucwords($service['transport_detail']);?></td>

                                    <?php

										if($service['funeral_transport_material'] == 'yes')

										{

									?>

                                    		<td style="padding:5px;" class="td-class"><?php echo ucwords($service['funeral_seats']);?> Seats</td>

                                    <?php

										}

									?>

                                </tr>

                          </table>

              </div>

              

            </div>

            

            <div class="f-row-1">

              <h3 style="width:906px;">Transport Details :</h3>

            </div>

            <div class="f-row-1">

              <p class="fl-name">

                <label><strong>Pick up location :</strong> <?php echo ucwords($service['funeral_location_to']);?> </label>

              </p>

              <p class="fr-name">

                <label><strong>Return location : </strong><?php echo ucwords($service['funeral_location_from']);?> </label>

              </p>

            </div>

            <div class="f-row-1">

              <p>

                <label><strong>Special requests : </strong> <?php echo ucwords($service['funeral_special_request']);?></label>

              </p>

            </div>

            <div class="f-row-1">

              <h3 style="width:906px;">Do you require a funeral cortege? </h3>

              <p class="tx-areada">

                <span class="ch-field"><?php echo ucwords($service['funeral_cortege']);?> </span> </p>

            </div>

            </fieldset>

            <?php

				if($service['floral_arrangement'] == 'yes')

				{

			?>

                    <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                    <legend class="legend">Floral arrangements</legend>

                    <div id="div_15">

                   

                    <div class="f-row-1" >

                      <p class="fl-name">

                        <label><strong>Floral type : </strong><?php echo ucwords($service['floral_type']);?> </label>

                      </p>

                      <p class="fr-name">

                        <label><strong>Colours : </strong><?php echo ucwords($service['floral_colour']);?></label>

                      </p>

                    </div></div>

                    </fieldset>

            <?php

				}

				if($service['funeral_donation'] == 'yes')

				{

			?>

                    <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                    <legend class="legend">Donations</legend>

                    <div class="f-row-1" id="div_19">

                      <p>

                        <label><strong>List the name of organisation  :</strong></label>

                        <?php echo ucwords($service['donation_organisation']);?>

                      </p>

                      

                    </div> 

                    </fieldset>

            <?php

				}

				if($service['funeral_stationary'] == 'yes')

				{

			?>

                    <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                    <legend class="legend">Funeral Stationery</legend>

                    <div class="f-row-1">

                      <h3>Require funeral stationery during the service</h3>

                    </div>

                    <div class="f-row-1">

                        <label><strong>Stationery Details :</strong> <?php echo ucwords($service['stationary_type']);?></label> </p>

                    </div>

                    </fieldset>

            <?php

				}

				if($service['is_music'] == 'yes')

				{

			?>

                    <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                    <legend class="legend">Music</legend>

                     <div class="f-row-1">

                        <div class="f-row-1">

                          <h3 style="width:906px;">Music Details</h3>

                        </div>

                        <div class="f-row-1">

                          <p class="fl-name">

                            <label><strong>Music entering : </strong><?php echo ucwords($service['funeral_music_enter']);?></label>

                          </p>

                          <p class="fr-name">

                            <label><strong>Music during : </strong><?php echo ucwords($service['funeral_music_mid']);?></label>

                          </p>

                          <p class="fr-name">

                            <label><strong>Music leaving: </strong><?php echo ucwords($service['funeral_music_enter_leave']);?></label>

                          </p>

                        </div>

                    </div>

                    </fieldset>

            <?php

				}

				if($service['funeral_musician'] == 'yes')

				{

			?>            

                    <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                    <legend class="legend">Musician and Singers</legend>

                    <div class="f-row-1">

                      <h3>Musician or singer Details</h3>

                    </div>

                    <div class="f-row-1" id="div_23">

                      <p class="fl-name">

                        <label><strong>Musician / singer (Name) : </strong><?php echo ucwords($service['singer_name']);?></label>

                      </p>

                      <p class="fr-name">

                        <label><strong>Email : </strong><?php echo $service['singer_email'];?></label>

                      </p>

                      <p class="fr-name">

                        <label><strong>Phone: </strong><?php echo ucwords($service['singer_phone']);?></label>

                      </p>

                    </div><div id="div_24" style="display:none"></div>

            </fieldset>

            <?php

				}

			?>

            <fieldset class="fieldset" style="margin-top:10px; width:906px;">

            <legend class="legend">Media Tributes</legend>

            <div class="f-row-1">

              <h3 style="width:906px;">Will you require any media/DVD tribute during the funeral service ? </h3>

              <p class="tx-areada">

                <span class="ch-field"><?php echo ucwords($service['funeral_media']);?> </span> </p>             

            </div>

            </fieldset>

            

            

            <fieldset class="fieldset" style="margin-top:10px; width:906px;">

            <legend class="legend">Pall Bearers</legend>

            <div class="f-row-1">

              <h3 style="width:906px;">Would you prefer family/friend bearers OR bearers provided by a funeral director? </h3>

              <p class="tx-areada">

                

                <span class="ch-field"><?php echo ucwords($service['funeral_bearer']);?>  </span> </p>

            </div>

            <?php

				if($service['funeral_bearer'] != 'funeral director')

				{

			?>

                    <div id="div_25">

                    <div class="f-row-1">

                      <h3>If family bearers are provided, please give their names and their relationship to the deceased : </h3>

                    </div>

                   <div style="width:906px; float:left;">

                                    <table style="width:906px; margin-bottom:10px;" >

                                        <tr class="tr-class">

                                            <td class="td-class" style="padding:5px;">

                                            <span class="bold">Name  :</span></td>

                                            <td class="td-class" style="padding:5px; ">

                                            <span class="bold">Relationship  :</span></td>

                                            <td class="td-class" style="padding:5px; ">

                                            <span class="bold">Sex  :</span></td>

                                      </tr>

                                      <?php

									  	$bearersql = "SELECT * FROM funeral_wishes_bearer WHERE person_making_id = '".$_SESSION['client']."' ";

										$beareresult = mysql_query($bearersql);

										

										while($bearer = mysql_fetch_assoc($beareresult))

										{

									  ?>

                                            <tr>

                                                <td style="padding:5px;" class="td-class"><?php echo ucwords($service['bearer_name']);?></td>

                                                <td style="padding:5px;" class="td-class"><?php echo ucwords($service['bearer_relationship ']);?></td>

                                                <td style="padding:5px;" class="td-class"><?php echo ucwords($service['bearer_sex']);?></td>

                                            </tr>

									<?php

                                        }

                                    ?>

                                  </table>

                      </div>

                 <!--------------------------------- table add code start --------------------------------->       

                    

                    </div>

            

            </fieldset>

            <?php

				}

				if($service['funeral_release'] == 'yes')

				{

			?>

                <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                <legend class="legend">Funeral Releases</legend>

                <div class="f-row-1" id="div_27">

                  <h3 style="border:0;">Type of funeral release require : <?php echo ucwords($service['funeral_release_type']);?> </h3>

                </div>

                </fieldset>

            <?php

				}

				if($service['funeral_refreshment'] == 'yes')

				{

			?>

                    <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                    <legend class="legend">Funeral Refreshments</legend>

                    <div id="div_29">

                    <div class="f-row-1">

                      <h3 style="width:906px;">Type of menu require</h3>

                      <p class="fl-name" style="padding-top:10px;">

                        <label> <?php echo ucwords($service['refreshment_menu']);?></label>

                      </p>

                     

                    </div>

                    <div class="f-row-1">

                      <p>

                        <label><strong>Estimated number of people to be catered for : </strong><?php echo ucwords($service['refreshment_people']);?> People</label>

                      </p>

                    

                    </div>

                    </div>

                    </fieldset>

            <?php

				}

				if($service['other_funeral_request'] == 'yes')

				{

			?>

                    <fieldset class="fieldset1" style="margin-top:10px; width:906px;">

                    <legend class="legend">Other Special Requests</legend>

                    <div class="f-row-1">

                      <h3 style="width:906px;">Do you require any other special arrangements? </h3>

                    </div>

                    <div class="f-row-1" id="div_31">

                      <p>

                        <label><strong>Other special arrangements details : </strong><?php echo ucwords($service['request_description']);?> </label>

                      </p>	

                     

                    </div> <div id="div_32" style="display:none"></div>

                    </fieldset>

			<?php

           	 	}

            ?>

            </div>

            

            <!--end mpd-form-->

        </div>

        <!--section four end here-->

        

        

        <!--section five start here-->	

      	<div class="left-content" style="margin-top:20px; width:949px;">

        	<h2 class="heading final_txtline" style="width: 949px; background:#dcdcdc; float: left; padding-bottom:8px;"id="div5">After the Funeral <!--<a href="javascript:void(0)" class="previewdiv" current_id="5">[+]</a>--></h2> <div class="help-f help-f1" style="width: 150px; background:#dcdcdc; float: right; padding-top:0px; margin-top:-56px;">
					
					
					<a  id="login_pop"  href="#step5">

                   <input type="button" class="login_button final5_btn" value="preview" style="width:80px; height:25px; padding:0px; border-radius:6px; font-size:12px;"/>

                    </a>
					
<!-------------------------------------------------------------------After the Funeral popup------------------------------------------------------------------------------------->					
						
					
				<a href="#x" class="overlay_plan" id="step5"></a>
					<div class="popup">
						
				<div class="row">

						<div class="col-md-12">
							<?php include("after-the-funeral-edit.php") ?>
						</div>


				</div>
					<a class="close_plan" href="#close"></a>
				</div>
			
<!---------------------------------------------------------------End After the Funeral popup------------------------------------------------------------------------------------->	
      </div>

            

            <!--start mpd-form-->

           

            

            <div class="mpd-form" id="5"  style="width:949px;">

            		<!--Edit start here-->

            		

                    <!--Edit end here-->

                    

                    <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                    <?php

							$aftersql = "SELECT * FROM after_funeral WHERE person_making_id = '".$_SESSION['client']."' ";

							$afteresult = mysql_query($aftersql);

							

							$afterrows = @mysql_num_rows($afteresult);

							

							$after = mysql_fetch_assoc($afteresult);

						?>

                    

                    

                        <legend class="legend">Funeral Wake</legend>

                       <div class="f-row-1">

                        	<h3 style="width:906px;">Do you intend holding a wake after the funeral service?  <?php echo $after['is_wake'];?></h3>

                            <?php

								if($after['is_wake'] == 'yes')

								{

							?>                            

                             <div class="f-row-1">

                        	 <p class="fl-name" style="float: left; width: 100%; margin-top: 8px;" >

                               <span id="wakediv"><label><?php echo $after['wake'];?></label> </span>

                             </p></div>

                             

                             <?php

							 	}

							 ?>

                        </div>

                    </fieldset>

                     

                       

                   <fieldset class="fieldset" style="margin-top:10px; width:906px;">

                   <legend class="legend">Collection Of Ashes</legend>

                   <div class="f-row-1">

                   	 <h3 style="width:906px;">After cremation, how would you like the cremated remains to be collected?  : <?php echo $after['cremated_collected'];?>  </h3>

                        </div>

                        

                        <div class="f-row-1">

                        	<h3 style="width:906px;">Do you require an urn or casket for the cremated remains?  :<?php echo $after['is_urn'];?></h3>

                            </div>

                            <?php

								if($after['is_urn'] == 'yes')

								{

							?>

                        <div class="f-row-1" id="urn_div">

                       	  <p class="fl-name">

                                <label><?php echo $after['cremin_type'];?>  </label>

                       	  </p>

                   </div>

                   	<?php

						}

					?>

              </fieldset> 

               

                       

              			<fieldset class="fieldset" style="margin-top:10px; width:906px;">

                        <legend class="legend">Special Requests</legend>

                        <div class="f-row-1">

                        	<h3 style="width:906px;">Do you have any special requests for the ashes?  :<?php echo $after['is_special_request'];?></h3>

                            </div>

                            <?php

								if($after['is_special_request'] == 'yes')

								{

							?>

                        <div class="f-row-1" id="is_special_request_div">

                        	 <p class="fl-name">

                                <label><?php echo $after['special_request'];?> </label>

                             </p>

                          

                        </div>

                        <?php

							}

						?>

                        

              </fieldset> 

               

                       

             			<fieldset class="fieldset" style="margin-top:10px; width:906px;">

                        <legend class="legend">Memorials</legend>

                        <div class="f-row-1">

                        	<h3 style="width:906px;">Do you require any form of memorial after cremation?   <?php echo $after['is_memorial'];?></h3>

                             </div>

                             <?php

								if($after['is_memorial'] == 'yes')

								{

							?>

                        <div class="f-row-1" id="is_memorial_div">

                        	 <p class="fl-name">

                                <label><?php echo $after['memorial'];?></label>

                             </p>

                        </div>

                        <?php

							}

						?>

                        

                        <div class="f-row-1">

                        	<h3 style="width:906px;">Do you have a specific memorial in mind? <?php echo $after['is_specific_memorial'];?>   </h3>

                           </div>

                            <?php

								if($after['is_specific_memorial'] == 'yes')

								{

							?>

                        <div class="f-row-1" id="is_specific_memorial_div">

                        	 <p class="f-row-1">

                                <label><?php echo $after['detail_of_mem'];?></label>

                             </p>

                        </div>

                        <?php

							}

						?>

                          <div class="f-row-1">

                        	<h3 style="width:906px;"><strong><?php echo $after['is_stonemason'];?></strong> I preferred stonemason to supply and fix the memorial</h3>

                            </div>

                        <div class="f-row-1" >

                                <h3 style="width:906px; text-align:left;">Memorial (inscription)</h3>

                             <p class="f-row-1" style="float: left; width: 100%; margin-top: 8px;">

                                <label><?php echo $after['written'];?></label>

                             </p>

                        </div>

                        

                        

              </fieldset>

            </div>

            <div class="f-row-2 last5_title">

                 <p style="float:right; font-size:12px;">

                 	<strong><span style=" font-size:20px; line-height:26px;">Is your Funeral Plan OK?</span></strong><br />

                        <label>

                          <input type="radio" name="RadioGroup1" value="yes" id="RadioGroup1_0" style="font-size:15px;" />

                          Yes</label>

                        <label>

                          <input type="radio" name="RadioGroup1" value="no" id="RadioGroup1_1" style="font-size:15px;" />

                          No</label>

 					                   

                    <br />

                   <span id="next-span"> 

                   	<span class="blue1" style="line-height:20px; text-transform:none; font-size:16px;">Great! Please click the 'Next' button below to continue.</span><br />


<?php 			
				
				//$row_client=mysql_fetch_array($result_client);		
				
			if($paymet_data['pdf_type']=='At Need Plan' && $paymet_data['order_info']=='Approved' )
				{ 
				
				  echo '<br>';
				
?>				  
				   <a href="pdfedit.php">

					   <input type="button"  value="Next" class="redirect_signup login_button"/> </a>
				     
					 <a href="../client_dashboard.php"><input type="button"  value="Back" class="redirect_signup login_button"/></a>
	 
				 
<?php 			}
				else
				{				 
?>				 
				 
				 
				   <a  id="login_pop"  href="preview-new-nextpop.php">

                   			<input type="button"  value="Next" class="redirect_signup login_button"/>

                    </a>
<?php } ?>
                   </span>
                   <span id="back-span"> 

                   	<span class="blue1" style="line-height:24px; text-transform:none;  font-size:16px;">Okay, so you're still unsure, then re-edit your form using preview for each section above.</span><br />

                    

                   </span>

                 </p>




					
					
					
<!-------------------------------------------------------------------Payment process popup------------------------------------------------------------------------------------->					
						
					
				
			
<!---------------------------------------------------------------End Payment Process popup------------------------------------------------------------------------------------->	


         		</div>

                        

           </div>

            <!--end mpd-form-->

        </div>

        <!--section five end here-->

        

        </div>

        <!--hide div end here-->

        

        

      </div>

      <!--end content-wrap-->

    </div>

    

</div>

<!--end web-layout -->









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

<link rel="stylesheet" href="css/Old_Include_Css/jquery.ui.all.css" type="text/css" />

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

