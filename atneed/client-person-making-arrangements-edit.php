<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eziFunerals</title>
<link href="favicon.icon" rel="shortcut icon">
<link href="<?php echo base_url;?>css/Old_Include_Css/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url;?>js/Old_Include_Js/jquery-1.9.js" type="text/javascript"></script>
<script src="<?php echo base_url;?>Old_Include_Js/person-makingvali.js" type="text/javascript"></script>


<script type="text/javascript">
$(document).ready(function() {

	$('#othermethoddiv').hide();
	$('#other_relation_details_div').hide();
	
    $("input[name$='payment_methods']").click(function() {
        var test = $(this).val();
		
		if(test == 'other_payments')
		{
			$('#othermethoddiv').show();
		}
		else
		{
			$('#othermethoddiv').hide();
		}
        
    });
	
	
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
<div class="web-layout" style="width:693px;">
	<div class="web-960" style="width:693px;">	
      
      <!--start content-wrap-->
      <div class="content-wrap" style="width:693px;">
      	<div class="left-content" style="text-align:left;">
        	<h2 class="heading">PERSON MAKING ARRANGEMENTS</h2>
            <div class="help-f"></div>
            <!--start mpd-form-->
            <form name="person_making_form" action="save-person-making-edit.php" method="POST">
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
                        	 <p class="fl-name">
                                <lebel>Suburb:</lebel>
                                <input type="text" name="suburb" id="suburb" value="<?php echo $person['suburb'];?>" class="text-n" />
                             </p>
                             <p class="fr-name">
                                <lebel>State:</lebel>
                                <select name="state" id="state" class="text-n"><option value="">Select state/region</option>
                                <?php
								echo	$statesql = "SELECT * FROM states ORDER BY state_name";
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
										echo '<option value="'.$states['state_name'].'" '.$selected.'>'.$states['state_name'].'</option>';
									}
								?>
                               </select>
                             </p>
                             <p class="fr-name">
                                <lebel>Postcode:</lebel>
                                <input type="text" name="postcode" id="postcode" value="<?php echo $person['postcode'];?>" class="text-n" />
                             </p>
                        </div>
                        <div class="f-row-1">
                        	 <p class="fl-name">
                                <lebel>Telephone:</lebel>
                                <input type="text" name="telephone" id="telephone" value="<?php echo $person['telephone'];?>" class="text-n" />
                             </p>
                             <p class="fr-name">
                                <lebel>Mobile: </lebel>
                                <input type="text" name="mobile" id="mobile" value="<?php echo $person['mobile'];?>" class="text-n" />
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
		<div id="inline2" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
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
		<div id="inline4" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
			<p>It is important to specify the method of payment to the funeral company. The method chosen to pay the funeral can result in savings and discounts offered by some funeral companies.<br /><br /></p>
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
		<div id="inline5" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
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
                                    <span class="ch-field"><b>I accept <a href="<?php echo base_url;?>page/terms-of-use">Terms and Conditions </a>  </b></span>
                                 </p>
                            </p>
                        </div>
                        
                    </fieldset>
            </div>
          
            <div class="f-row-2">
                 <p style="float:right;">
                 	<input type="submit"  value="Update" class="redirect_signup login_button" /> 
                 </p>
                 <p style="float:left;">
                 	<input type="submit"  value="Cancel" class="New_button"  style="width:120; padding:10px;"/>
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

	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen" />
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
<script language="javascript" type="text/javascript" src="js/Old_Include_Js/jquery.ui.core.js"></script>
<script language="javascript" type="text/javascript" src="js/Old_Include_Js/jquery.ui.widget.js"></script>
<script language="javascript" type="text/javascript" src="js/Old_Include_Js/jquery.ui.datepicker.js"></script>
<script language="javascript" type="text/javascript" src="js/Old_Include_Js/jquery.ui.datepicker.js"></script>
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
