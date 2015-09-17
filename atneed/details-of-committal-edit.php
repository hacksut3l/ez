<?php

	include_once('../include/config.php');
	
	$sql = "SELECT * FROM  committal WHERE person_making_id = '".$_SESSION['client']."' ";
	$result = mysql_query($sql);
	
	$rows = @mysql_num_rows($result);
	
	$person = mysql_fetch_assoc($result);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eziFunerals</title>
<link href="favicon.icon" rel="shortcut icon">
<link href="<?php echo base_url;?>css/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url;?>js/jquery-1.9.js" type="text/javascript"></script>
<script src="<?php echo base_url;?>person-makingvali.js" type="text/javascript"></script>


<script type="text/javascript">
$(document).ready(function() {
	
	$('#creemationfield').hide();
	$('#entombmentfield').hide();
	$('#cdiv').hide();
	$('#ediv').hide();
	
	$("input[name$='burried_in']").live("click",function() {
		var value = $(this).val();
		
		if(value == 'new grave')
		{
			$('#burried_id_span').show();
			$('#existing_grave_span').hide();
		}
		
		if(value == 'existing grave')
		{
			$('#burried_id_span').hide();
			$('#existing_grave_span').show();
		}
		
		
		
	});
	
	<?php
		if($person['burried_in'] == 'new grave' || $rows <= 0)
		{
	?>
			$('#burried_id_span').show();
			$('#existing_grave_span').hide();
	<?php
		}
		else
		{
	?>
			$('#burried_id_span').hide();
			$('#existing_grave_span').show();
	<?php
		}
	?>
	
	
	
	
	$("input[name$='laid_to_rest']").live("click",function() {
		var value = $(this).val();
		
		if(value == 'burial')
		{
			$('#creemationfield').hide();
			$('#burialfield').show();
			$('#bdiv').show();
			$('#cdiv').hide();
			$('#ediv').hide();
			$('#entombmentfield').hide();
		}
		
		if(value == 'cremation')
		{
			$('#creemationfield').show();
			$('#bdiv').hide();
			$('#cdiv').show();
			$('#ediv').hide();
			$('#burialfield').hide();
			$('#entombmentfield').hide();
		}
		
		if(value == 'entombment')
		{
			$('#creemationfield').hide();
			$('#burialfield').hide();
			$('#entombmentfield').show();
			$('#bdiv').hide();
			$('#cdiv').hide();
			$('#ediv').show();
		}
	
	});


	<?php
		if($person['laid_to_rest'] == 'cremation' || $rows <= 0)
		{
	?>
			$('#preffered_section_div').show();
	<?php
		}
		else
		{
	?>
			$('#preffered_section_div').hide();
	<?php
		}
	?>
	
    $("input[name$='is_preferred_section']").click(function() {
        var test = $(this).val();
		
		var pref = 0;
		
		<?php
			if($person['is_preferred_section'] == 'yes' || $rows <= 0)
			{
		?>
				pref = 1;
		<?php
			}		
			elseif($person['is_preferred_section'] == 'no' )
			{
		?>				
				pref = 0;
		<?php
			}
		?>
		
		if((test == 'yes' || pref == 1) && test != 'no')
		{
			$('#preffered_section_div').show();
		}
		else
		{
			$('#preffered_section_div').hide();
		}
        
    });
	
	<?php
		if($person['laid_to_rest'] == 'cremation')
		{
	?>
			$('#creemationfield').show();
			$('#bdiv').hide();
			$('#cdiv').show();
			$('#ediv').hide();
			$('#burialfield').hide();
			$('#entombmentfield').hide();
	<?php
		}
		else if($person['laid_to_rest'] == 'burial')
		{
	?>
			$('#creemationfield').hide();
			$('#burialfield').show();
			$('#bdiv').show();
			$('#cdiv').hide();
			$('#ediv').hide();
			$('#entombmentfield').hide();
	<?php
		}
		else if($person['laid_to_rest'] == 'entombment')
		{
	?>
			$('#creemationfield').hide();
			$('#burialfield').hide();
			$('#entombmentfield').show();
			$('#bdiv').hide();
			$('#cdiv').hide();
			$('#ediv').show();
	<?php
		}
	?>
	
	
	
	
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
<!--start web-layout --> 
<div class="web-layout" style="width:693px;">
	<div class="web-960" style="width:693px;">	
      
      <!--start content-wrap-->
      <div class="content-wrap" style="width:693px;">
      	<div class="left-content" style="text-align:left;">
        	<h2 class="heading">Details Of Committal</h2>
            <div class="help-f"><a id="example2" href="#inline1"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /></a></div>
              <div style="display: none;">
		<div id="inline1" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
			<p>The decision to bury or cremate is a very personal one, often influenced by costs and the practices of a person's culture or religion. </p>
		</div>
				</div>
            <!--start mpd-form-->
            <form name="person_making_form" action="save-committal-edit.php" method="POST">
            <div class="mpd-form">
                    <fieldset class="fieldset">
                        <legend class="legend">Details of Committal:</legend>
                        <div class="f-row-1">
                        	<h3>How would you like the deceased to be laid to rest?</h3>
                            
                            <p class="tx-area">
                                <input type="radio" id="laid_to_rest" name="laid_to_rest" class="checkbox" value="burial" <?php if($person['laid_to_rest'] == 'burial') echo "checked=checked";else echo "checked=checked";?>/>
                                <span class="ch-field">Burial  </span>
                            </p>
                            <p class="tx-area">
                                <input type="radio" id="laid_to_rest" name="laid_to_rest" class="checkbox" value="cremation" <?php if($person['laid_to_rest'] == 'cremation') echo "checked=checked";?>/>
                                <span class="ch-field">Cremation    </span>
                            </p>
                            <p class="tx-area">
                                <input type="radio" id="laid_to_rest" name="laid_to_rest" class="checkbox" value="entombment" <?php if($person['laid_to_rest'] == 'entombment') echo "checked=checked";?>/>
                                <span class="ch-field">Entombment   </span>
                            </p>
                        </div>
              </fieldset>
               <div class="help-f" id="bdiv"><a id="example2" href="#inline2"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /></a></div>
               <div style="display: none;">
		<div id="inline2" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
			<p>A burial is the process of placing the deceased person in a coffin and then into the ground (a grave) and covering it over with soil. Deceased people can be buried either in a lawn section of a cemetery (where a small plaque or monument may be erected at the head of the grave) or in a monumental section (where a monument completely covers the grave). Burials are much more expensive than cremations.  </p>
		</div>
				</div>
             <fieldset class="fieldset" id="burialfield">           
                        <legend class="legend">Burial details</legend>
                        <div class="f-row-1">
                        	<h3>Will the deceased be buried in a new grave or an existing grave?</h3>
                            <p class="tx-area">
                                <input type="radio" id="burried_in" name="burried_in" class="checkbox" value="new grave" <?php if($person['burried_in'] == 'new grave') echo "checked=checked";else echo "checked=checked";?>/>
                                <span class="ch-field">New grave   </span>
                            </p>
                            <p class="tx-area">
                                <input type="radio" id="burried_in" name="burried_in" class="checkbox" value="existing grave" <?php if($person['burried_in'] == 'existing grave') echo "checked=checked";?>/>
                                <span class="ch-field">Existing grave     </span>
                            </p>
                        </div>
                        <span id="burried_id_span">
                        <div class="f-row-1">
                        	<h3>If you are using a new grave, which cemetery do you wish the deceased to be buried?  <a id="example2" href="#inline4"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /></a></h3>
                              <div style="display: none;">
		<div id="inline4" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
			<p>Cemeteries in Australia are generally governed by Boards and Cemeteries Acts in each state. They may be either publicly or privately owned. Publicly owned cemeteries are managed by Cemetery Boards and local governments.  </p>
		</div>
				</div>
                        </div>
                        <div class="f-row-1">
                        	 <p class="fl-name">
                                <lebel>Name of Cemetery:</lebel>
                                <input type="text" name="name_cemetery" id="name_cemetery" value="<?php echo $person['name_cemetery'];?>" class="text-n" />
                             </p>
                             <p class="fr-name">
                                <lebel>City:</lebel>
                                <input type="text" name="cemetery_city" id="cemetery_city" value="<?php echo $person['cemetery_city'];?>" class="text-n" />
                             </p>
                             <p class="fr-name">
                                <lebel>State:</lebel>
                                <select name="cemetery_state" id="cemetery_state" class="text-n" > <option value="">Select state/region</option>
                                <?php
									$statesql = "SELECT * FROM states ORDER BY state_name";
									$statesex = mysql_query($statesql);
									
									while($states = mysql_fetch_assoc($statesex))
									{
										if($person['cemetery_state'] == $states['state_name'])
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
                        </div>
                        <div class="f-row-1">
                        	<h3>Do you have a preferred section of the cemetery? </h3>
                            <p class="tx-areamf">
                                <input type="radio" id="is_preferred_section" name="is_preferred_section" class="checkbox" value="yes" <?php if($person['is_preferred_section'] == 'yes') echo "checked=checked";else echo "checked=checked";?>/>
                                <span class="ch-field">Yes </span>                            </p>
                            <p class="tx-areamf">
                                <input type="radio" id="is_preferred_section" name="is_preferred_section" class="checkbox" value="no" <?php if($person['is_preferred_section'] == 'no') echo "checked=checked";?>/>
                                <span class="ch-field">No  </span>
                            </p>
                            </div>
                        <div class="f-row-1" id="preffered_section_div">
                        	<p>
                            	<lebel>If you answered YES, what section of the cemetery, do you wish the deceased to be buried ?  </lebel>
                            </p>
                            <p class="fl-name">
                                <lebel>Cemetery Area:</lebel>
                                <input type="text" name="cemetery_area" id="cemetery_area" value="<?php echo $person['cemetery_area'];?>" class="text-n" />
                             </p>
                               <p class="fr-name">
                                <lebel>Section:</lebel>
                                <input type="text" name="cemetery_section" id="cemetery_section" value="<?php echo $person['cemetery_section'];?>" class="text-n" />
                             </p>
                               <p class="fr-name">
                                <lebel>Number:</lebel>
                                <input type="text" name="cemetery_number" id="cemetery_number" value="<?php echo $person['cemetery_number'];?>" class="text-n" />
                             </p>
                    	</div>
                        </span>
                        
                        
                        <span id="existing_grave_span">
                        
                        <div class="f-row-1">
                        	<h3>If the deceased is being buried in an existing grave, provide details of cemetery:  </h3>
                        </div>
                        <div class="f-row-1">
                        	<p class="fl-name">
                            	<lebel>Name and address of cemetery  </lebel>
                                <input type="text" id="existing_grave_addr"  name="existing_grave_addr" class="text-n"  value="<?php echo $person['existing_grave_addr'];?>" />                           </p>
                    		 <p class="fr-name">
                                <lebel>State the grave number </lebel>
                                <input type="text" name="grave_number" id="grave_number" value="<?php echo $person['grave_number'];?>" class="text-n" />
                             </p>
                             <p class="fr-name" style="width:250px;">
                                <lebel>Where are the grave deeds located? </lebel>
                                <input type="text" name="grave_location" id="grave_location" value="<?php echo $person['grave_location'];?>" class="text-n" />
                             </p>
                        </div>
   			 </fieldset>
             </span>
              <div class="help-f" id="cdiv"><a id="example2" href="#inline6"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /></a></div>
                <div style="display: none;">
		<div id="inline6" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
			<p>1) Cremation is the reduction of a body to ashes by fire conducted in a purpose-built crematorium. <br />2) One of the advantages of cremation is that it is less expensive than burial, saving you a lot of money. <br />3) Cremation also does not take up land space and for this reason many people consider cremation more environmentally friendly. Cremation offers families a range of opportunities to commemorate the deceased in an appropriate manner following the actual cremation – such as scattering the ashes in a place with special significance. <br />4) In some cultures, entombment in a mausoleum is the preferred resting place for the deceased. The mausoleum is constructed above ground and allows the coffin to be placed in a crypt which is then sealed. The mausoleum is a unique type of interment, with the courtyard-style area being beautifully finished in granite and marble. 
 </p>
		</div>
				</div>
             <fieldset class="fieldset" id="creemationfield">
                        <legend class="legend">Cremation details</legend>
                        <div class="f-row-1">
                        	<h3>Which crematorium do you wish the deceased to be cremated? </h3>
                        </div>
                        <div class="f-row-1">
                        	 <p class="fl-name">
                                <lebel>Name of Crematorium: </lebel>
                                <input type="text" name="crematorium_name" id="crematorium_name" value="<?php echo $person['crematorium_name'];?>" class="text-n" />
                             </p>
                             <p class="fr-name">
                                <lebel>City:</lebel>
                                <input type="text" name="crematorium_city" id="crematorium_city" value="<?php echo $person['crematorium_city'];?>" class="text-n" />
                             </p>
                             <p class="fr-name">
                                <lebel>State:</lebel>
                                <select name="crematorium_state" id="crematorium_state" class="text-n"><option value="">Select state/region</option>
                                <?php
									$statesql = "SELECT * FROM states ORDER BY state_name";
									$statesex = mysql_query($statesql);
									
									while($states = mysql_fetch_assoc($statesex))
									{
										if($person['crematorium_state'] == $states['state_id'])
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
                        </div>
              </fieldset>	
              <div class="help-f" id="ediv"><a id="example2" href="#inline7"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /></a></div>
               <div style="display: none;">
		<div id="inline7" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;">
			<p>In some cultures, entombment in a mausoleum is the preferred resting place for the deceased. The mausoleum is constructed above ground and allows the coffin to be placed in a crypt which is then sealed. The mausoleum is a unique type of interment, with the courtyard-style area being beautifully finished in granite and marble. 
 </p>
		</div>
				</div>
               <fieldset class="fieldset"  id="entombmentfield">
                        <legend class="legend">Entombment details</legend>
                        <div class="f-row-1">
                        	<h3>Which mausoleum do you wish the deceased to be entombed?</h3>
                        </div>
                        <div class="f-row-1">
                        	 <p class="fl-name">
                                <lebel>Name of Mausoleum: </lebel>
                                <input type="text" name="mausoleum_name" id="mausoleum_name" value="<?php echo $person['mausoleum_name'];?>" class="text-n" />
                             </p>
                             <p class="fr-name">
                                <lebel>City: </lebel>
                                <input type="text" name="mausoleum_city" id="mausoleum_city" value="<?php echo $person['mausoleum_city'];?>" class="text-n" />
                             </p>
                             <p class="fr-name">
                                <lebel>State: </lebel>
                                <select name="mausoleum_state" id="mausoleum_state" class="text-n"><option value="">Select state/region</option>
                                <?php
									$statesql = "SELECT * FROM states ORDER BY state_name";
									$statesex = mysql_query($statesql);
									
									while($states = mysql_fetch_assoc($statesex))
									{
										if($person['mausoleum_state'] == $states['state_id'])
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
<link rel="stylesheet" href="css/jquery.ui.all.css" type="text/css" />
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
