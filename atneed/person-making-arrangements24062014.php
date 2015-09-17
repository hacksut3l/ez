<?php
	session_start();
	//$_SESSION['person_id'] = '10';
	include_once('../config.php');
	//echo $_SESSION['person_id'];exit;
	
	if(isset($_SESSION['client']))
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eziFunerals</title>
<link href="favicon.icon" rel="shortcut icon">
<link href="<?php echo base_url;?>css/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.8.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.23.custom.min.js"></script>

<script src="<?php echo base_url;?>js/person-makingvali.js" type="text/javascript"></script>
<style type="text/css" media="print">
    body { visibility: hidden; display: none }
</style>
<script src="<?php echo base_url;?>js/respond.min.js"></script>
<script type='text/javascript'>
			$(document).ready(function() {
				
				$( "#city1" ).autocomplete({
					
					source: function(request, response) {
						
					$.ajax({
						url : "../city.php" ,
						data : "state_id="+$("#state").val()+"&city="+$('#city1').val(),
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

	
	$("input[name$='realtions']").click(function() {
        var test = $(this).val();
		
		if(test == 'other_relation')
		{
			$('#other_relation_details_div').show();
		}
		else
		{
			$('#other_relation_details_div').hide();
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


</head>
<body>
<?php
	
	$sql = mysql_query("SELECT * FROM  person_making_arangements WHERE client_id = '".$_SESSION['client']."' ");	
	$rows = @mysql_num_rows($sql);	
	$person = @mysql_fetch_assoc($sql);
?>


<!--start web-layout --> 
<div class="web-layout">
	<div class="web-960">	
      <!--start header-form --> 
      <div class="header">
            <div class="logo"><a href="<?php echo base_url;?>" title=""><img src="<?php echo base_url;?>images/logo.png" alt="" /></a></div> 
            	
            <img src="<?php echo base_url;?>images/top-right-img.jpg"/>
            
            </div>
      <!--end header-form --> 
      <!--start form-navigation-->
      <div class="form-navigation">
      	<img src="<?php echo base_url;?>images/nav01.png" alt="" />
      </div>
      <!--end form-navigation-->
      <!--start content-wrap-->
      <div class="content-wrap">
      	<div class="left-content">
        	<h2 class="heading">PERSON MAKING ARRANGEMENTS</h2>
            <div class="help-f"></div>
            <!--start mpd-form-->
            <form name="person_making_form" action="save-person-making.php" method="POST">
            <div class="mpd-form">
                    <fieldset class="fieldset">
                        <legend class="legend">My Personal Details</legend>
                        <div class="f-row-1">
                        	 <p class="fl-name">
                                <lebel>First Name:</lebel>
                                <input type="text" name="f_name" id="f_name" value="<?php echo $person['f_name'];?>" class="text-n" />
                             </p>
                             <p class="fr-name">
                                <lebel>Middle Name:</lebel>
                                <input type="text" name="m_name" id="m_name" value="<?php echo $person['m_name'];?>" class="text-n" />
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
                        	
                            <p class="fr-name"  style="padding-left: 0;margin-right: 15px;">
                                <lebel>State:</lebel>
                                <select name="state" id="state" class="text-n"><option value="">Select state/region</option>
                                <?php
									$statesql = "SELECT * FROM states ORDER BY state_name";
									$statesex = mysql_query($statesql);
									
									while($states = mysql_fetch_assoc($statesex))
									{
										if($person['state'] == $states['state_id'])
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
                                <input type="text" name="city" id="city1" value="<?php echo $person['suburb'];?>" class="text-n" />
                             </p>
                             <p class="fr-name">
                                <lebel>Postcode:</lebel>
                                <input type="text" name="postcode" id="postcode" value="<?php echo $person['postcode'];?>" class="text-n" maxlength="4"/>
                             </p>
                        </div>
                        <div class="f-row-1">
                        	 <p class="fl-name">
                                <lebel>Telephone:</lebel>
                                <input type="text" name="telephone" id="telephone" value="<?php echo $person['telephone'];?>" class="text-n" maxlength="10" />
                             </p>
                             <p class="fr-name">
                                <lebel>Mobile: </lebel>
                                <input type="text" name="mobile" id="mobile" value="<?php echo $person['mobile'];?>" class="text-n"  maxlength="10" />
                             </p>
                             <p class="fr-name">
                                <lebel>Email: </lebel>
                                <input type="text" name="email" id="emailid" value="<?php echo $person['email'];?>" class="text-n" />
                             </p>
                        </div>
                        <div class="f-row-1">
                        	<h3>Relationship to the deceased: </h3>
                            <p class="tx-area">
                                <input type="radio" id="realtions" name="realtions" class="checkbox" value="Next of Kin" <?php if($person['realtions'] == 'Next of Kin') echo "checked=checked"; else echo "checked=checked";?>/>
                                <span class="ch-field">Next of Kin </span>
                            </p>
                            <p class="tx-area">
                                <input type="radio" id="realtions" name="realtions" class="checkbox" value="Executor of Will" <?php if($person['realtions'] == 'Executor of Will') echo "checked=checked"?>/>
                                <span class="ch-field">Executor of Will  </span>
                            </p>
                            <p class="tx-area">
                                <input type="radio" id="realtions" name="realtions" class="checkbox" value="other_relation" <?php if($person['realtions'] == 'other_relation') echo "checked=checked"?>/>
                                <span class="ch-field">Other </span>
                            </p>
                            <p class="tx-area" id="other_relation_details_div">
                            	<input type="text" name="other_relation_details" id="other_relation_details" value="" class="text-n" />
                            </p>
                        </div>
                        <div class="f-row-1">
                        	<h3>Funeral Costs and Payments: <a id="example2" href="#inline2"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /></a></h3>
                            <div style="display: none;">
		<div id="inline2" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size: 12px;line-height: 20px;">
			<p>The person arranging the funeral is financially responsible for it unless otherwise specified, and is the only person who can make arrangements with the crematorium or cemetery, including signing burial or cremation permits.</p>
		</div>
				</div>
                            <h4>Do you have a budget in mind? </h4>
                            <div style="display: none;">
		<div id="inline3" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
			<p>The average cost of a funeral in Australia ranges between $4000-$7000 	(cremation) 	and $8000 - $12000 (burial). This does not include the additional cost 	of a 	memorial and stonemason.</p>
		</div>
				</div>
                           	<p class="sel-bud">
                            	<select class="select-ezi" name="budget">
                                	<option value="Less than 4000" <?php if($person['budget'] == 'Less than 4000') echo "selected=selected"?>>Less than 4000</option>
                                    <option value="4000 – 6000" <?php if($person['budget'] == '4000 – 6000') echo "selected=selected"?>>4000 – 6000</option>
                                    <option value="6001 – 8000" <?php if($person['budget'] == '6001 – 8000') echo "selected=selected"?>>6001 – 8000</option>
                                    <option value="8001 – 10000" <?php if($person['budget'] == '8001 – 10000') echo "selected=selected"?>>8001 – 10000</option>
                                    <option value="More than 10000" <?php if($person['budget'] == 'More than 10000') echo "selected=selected"?>>More than 10000</option>
                                    <option value="Dont know" <?php if($person['budget'] == 'Dont know') echo "selected=selected"?>>Don’t know</option>
                                </select>
                            </p>
                        </div>
                        
                        <div class="f-row-1">
                        	<h3>Method Of Funeral Payment:  <a id="example2" href="#inline4"> <img src="<?php echo base_url;?>images/helpbutton.png" alt=""  style="float:right;" /> </a> </h3>
                          <div style="display: none;">
		<div id="inline4" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size: 12px;line-height: 20px;">
			<p>It is important to specify the method of payment to the funeral company. The method chosen to pay the funeral can result in savings and discounts &nbsp;offered by some funeral companies.<br /><br /></p>
		</div>
				</div>
                            <p class="tx-area">
                                <input type="radio" id="cash" name="payment_methods" class="checkbox" value="cash" checked="checked" <?php if($person['payment_methods'] == 'cash') echo "checked=checked";?>/>
                                <span class="ch-field">Cash </span>
                            </p>
                            <p class="tx-area">
                                <input type="radio" id="Cheque" name="payment_methods" class="checkbox" value="cheque" <?php if($person['payment_methods'] == 'cheque') echo "checked=checked";?>/>
                                <span class="ch-field">Cheque   </span>
                            </p>
                            <p class="tx-area">
                                <input type="radio" id="credit_card" name="payment_methods" class="checkbox" value="credit card" <?php if($person['payment_methods'] == 'credit card') echo "checked=checked";?>/>
                                <span class="ch-field">Credit Card   </span>
                            </p>
                            <p class="tx-area">
                                <input type="radio" id="other" name="payment_methods" class="checkbox" value="direct transfer" <?php if($person['payment_methods'] == 'direct transfer') echo "checked=checked";?>/>
                                <span class="ch-field">Direct Transfer    </span>
                            </p>
                             <p class="tx-area">
                                <input type="radio" id="finance" name="payment_methods" class="checkbox" value="finance" <?php if($person['payment_methods'] == 'finance') echo "checked=checked";?> />
                                <span class="ch-field">Finance  </span>
                            </p>
                            <p class="tx-area">
                                <input type="radio" id="funeral_fund" name="payment_methods" class="checkbox" value="funeral fund" <?php if($person['payment_methods'] == 'funeral fund') echo "checked=checked";?>/>
                                <span class="ch-field">Funeral Fund    </span>
                            </p>
                            <p class="tx-area">
                                <input type="radio" id="deceased_estate " name="payment_methods" class="checkbox" value="deceased estate" <?php if($person['payment_methods'] == 'deceased estate') echo "checked=checked";?>/>
                                <span class="ch-field">Deceased Estate   </span>
                            </p>
                            <p class="tx-area" style="width:500px;">
                                <input type="radio" id="payment_other" name="payment_methods" class="checkbox payment_other" value="other_payments" <?php if($person['payment_methods'] == 'other_payments') echo "checked=checked";?>/>
                                <span class="ch-field">Other   </span>
                            </p>
                            <div style="float:left; width:680px;" id="othermethoddiv">
                        	<p>
                            	<textarea id="P_address"  name="other_methods" class="textarea-f"></textarea>
                            </p>
                        </div>
                        </div>
                        
                        <div class="f-row-1">
                        	 <p>
                                <input type="checkbox" id="certify" name="certify" class="checkbox" <?php if($rows > 0) echo "checked=checked"?>/>
                                <span class="ch-field">I certify that I have the authority to organise the funeral arrangements listed in this plan</span> <a  id="example2" href="#inline5"> <img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /> </a>                            </p>
                                 <div style="display: none;">
		<div id="inline5" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size: 12px;line-height: 20px;">
			<p>1) If you are the executor of a deceased person’s Will, you have the legal authority to make the funeral arrangements.<br />
            
            2) If there is no Will, the next of kin or other family members or friends can arrange the funeral as it may be some time before the court appoints an administrator of the estate.<br />3)If there is a Will, this document is to be treated as expanding on the wishes expressed in that Will, with the Will taking legal precedent if relevant.
<br />
4) If there is a Will, and this person is not the executor, then any executor must agree to the arrangements in this document.

            </p>
		</div>
				</div>
                        </div>
                                                
                        <div class="f-row-1">
                        	 <p class="fl-name">
                                <lebel>Date:</lebel>
                                <input type="text" name="date" id="searchsdate" value="<?php echo $person['date'];?>" class="text-ncal" />
                             </p>
                        </div>
                        
                        <div class="f-row-1">
                        	 <p>
                                <!--<input type="checkbox" id="cash" name="cash" class="checkbox" />
                                <span class="ch-field"><b>I certify that in the event of my death, the funeral arrangements listed in this plan are to 
be <br />carried out in accordance with my funeral wishes.</b> </span>-->
								<p style="float:left; padding-top:12px;">
                                    <input type="checkbox" id="terms" name="terms" class="checkbox" <?php if($rows > 0) echo "checked=checked"?>/>
                                    <span class="ch-field"><b>I accept <a href="<?php echo base_url;?>page/terms-of-use" target="_blank">Terms and Conditions </a>  </b></span>
                                 </p>
                            </p>
                        </div>
                        
                    </fieldset>
            </div>
            <div class="f-row-2">
                 <input type="image" id="psubmit" src="<?php echo base_url;?>images/submit_next.png" />       
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
<?php
	$deceasedquery = mysql_query("SELECT * FROM deceased WHERE person_making_id = '".$_SESSION['person_id']."' ");
	$deceasedcount = @mysql_num_rows($deceasedquery);
	
	$committalquery = mysql_query("SELECT * FROM committal WHERE person_making_id = '".$_SESSION['person_id']."' ");
	$committalcount = @mysql_num_rows($committalquery);
	
	$funeral_service_detailsquery = mysql_query("SELECT * FROM funeral_service_details WHERE person_making_id = '".$_SESSION['person_id']."' ");
	$funeral_service_detailsquerycount = @mysql_num_rows($funeral_service_detailsquery);

	$after_funeralquery = mysql_query("SELECT * FROM after_funeral WHERE person_making_id = '".$_SESSION['person_id']."' ");
	$after_funeralcount = @mysql_num_rows($after_funeralquery);
	
	$family_friendsquery = mysql_query("SELECT * FROM family_friends WHERE person_making_id = '".$_SESSION['person_id']."' ");
	$family_friendscount = @mysql_num_rows($family_friendsquery);

	
?>
 <p class="h4">My Funeral Plan Checklist</p>
	<ul>
        <li><a href="person-making-arrangements.php" title="" id="person_making">1. Person Making Arrangements</a></li>
        <li><a <?php if($deceasedcount > 0){?>href="details-of-deceased.php"<?php }else {?>href="javascipt:void(0);" id= "deceasedlink"<?php }?>  title="">2. Details of Deceased</a></li>
        <li><a <?php if($committalcount > 0){?>href="details-of-committal.php"<?php }else {?>href="javascipt:void(0);" id= "committallink"<?php }?>  title="">3. Details of Committal</a></li>
        <li><a <?php if($funeral_service_detailsquerycount > 0){?>href="details-of-funeral-service.php"<?php }else {?>href="javascipt:void(0);" id= "funeralservicelink"<?php }?>  title="">4. Details of Funeral Service</a></li>
        <li><a <?php if($after_funeralcount > 0){?>href="after-the-funeral.php"<?php }else {?>href="javascipt:void(0);" id= "afterfunerallink"<?php }?>  title="">5. After the Funeral</a></li>
     </ul>
</div>-->



	<script type="text/javascript" src="<?php echo base_url;?>js/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url;?>css/jquery.fancybox-1.3.4.css" media="screen" />
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
<link rel="stylesheet" href="<?php echo base_url;?>css/jquery.ui.all.css" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo base_url;?>js/jquery.ui.core.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url;?>js/jquery.ui.widget.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url;?>js/jquery.ui.datepicker.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url;?>js/jquery.ui.datepicker.js"></script>
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

</body>
</html>
<?php
	}
	else
	{
		header('Location:../login.php');
	}
?>