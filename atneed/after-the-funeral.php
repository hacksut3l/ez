<?php
	session_start();
	include_once('../include/config.php');
	include '../include/header.php';
	
	$sql = "SELECT * FROM  after_funeral WHERE person_making_id = '".$_SESSION['client']."' ";
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
<link href="<?php echo base_url;?>css/Old_Include_Css/style1.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url;?>js/Old_Include_Js/jquery-1.9.js" type="text/javascript"></script>
<script src="<?php echo base_url;?>js/Old_Include_Js/afterfuneral-vali.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
	
	$('#other_ashes_div').hide();
	
	<?php
		if($person['is_urn'] == 'yes' || $rows <= 0)
		{
	?>
			$('#urn_div').show();
	<?php
		}
		else
		{
	?>
			$('#urn_div').hide();
	<?php
		}
	?>
	
    $("input[name$='is_urn']").click(function() {
        var test = $(this).val();
		
		var urn = 0;
		
		<?php
			if($person['is_urn'] == 'yes' || $rows <= 0)
			{
		?>
				urn = 1;
		<?php
			}		
			elseif($person['is_urn'] == 'no' )
			{
		?>				
				urn = 0;
		<?php
			}
		?>
		
		if((test == 'yes' || urn == 1) && test != 'no')
		{
			$('#urn_div').show();
		}
		else
		{
			$('#urn_div').hide();
		}
        
    });
	
	
	
	<?php
		if($person['is_special_request'] == 'yes' || $rows <= 0)
		{
	?>
			$('#is_special_request_div').show();
	<?php
		}
		else
		{
	?>
			$('#is_special_request_div').hide();
	<?php
		}
	?>
	
	
	
	$("input[name$='is_special_request']").click(function() {
        var test = $(this).val();
		
		var spcl = 0;
		
		<?php
			if($person['is_special_request'] == 'yes' || $rows <= 0)
			{
		?>
				spcl = 1;
		<?php
			}		
			elseif($person['is_special_request'] == 'no' )
			{
		?>				
				spcl = 0;
		<?php
			}
		?>
		
		if((test == 'yes' || spcl == 1) && test != 'no')
		{
			$('#is_special_request_div').show();
		}
		else
		{
			$('#is_special_request_div').hide();
		}
        
    });
	
	<?php
		if($person['is_memorial'] == 'yes' || $rows <= 0)
		{
	?>
			$('#is_memorial_div').show();
	<?php
		}
		else
		{
	?>
			$('#is_memorial_div').hide();
	<?php
		}
	?>
	
	$("input[name$='is_memorial']").click(function() {
        var test = $(this).val();
		
		var mem = 0;
		
		<?php
			if($person['is_memorial'] == 'yes' || $rows <= 0)
			{
		?>
				mem = 1;
		<?php
			}		
			elseif($person['is_memorial'] == 'no' )
			{
		?>				
				mem = 0;
		<?php
			}
		?>
		
		if((test == 'yes' || mem == 1) && test != 'no')
		{
			$('#is_memorial_div').show();
		}
		else
		{
			$('#is_memorial_div').hide();
		}
        
    });
	
	<?php
		if($person['is_specific_memorial'] == 'yes' || $rows <= 0)
		{
	?>
			$('#is_specific_memorial_div').show();
	<?php
		}
		else
		{
	?>
			$('#is_specific_memorial_div').hide();
	<?php
		}
	?>
	
	$("input[name$='is_specific_memorial']").click(function() {
        var test = $(this).val();
		
		var specific = 0;
		
		<?php
			if($person['is_specific_memorial'] == 'yes' || $rows <= 0)
			{
		?>
				specific = 1;
		<?php
			}		
			elseif($person['is_specific_memorial'] == 'no' )
			{
		?>				
				specific = 0;
		<?php
			}
		?>
		
		if((test == 'yes' || specific == 1) && test != 'no')
		{
			$('#is_specific_memorial_div').show();
		}
		else
		{
			$('#is_specific_memorial_div').hide();
		}
        
    });
	
	
	$("input[name$='is_wake']").click(function() {
	
        var test = $(this).val();
		
		var wake = 0;
		
		<?php
			if($person['wake'] == 'yes' || $rows <= 0)
			{
		?>
				wake = 1;
		<?php
			}		
			elseif($person['wake'] == 'no' )
			{
		?>				
				wake = 0;
		<?php
			}
		?>
		
		if((test == 'yes' || wake == 1) && test != 'no')
		{
			$('#wakediv').show();
		}
		else
		{
			$('#wakediv').hide();
		}
        
    });
	
	
	$("input[name$='cremated_collected']").click(function() {
	
        var test = $(this).val();
		
		var other = 0;
		
		<?php
			if($person['cremated_collected'] == 'other')
			{
		?>
		
				other = 1;
		<?php
			}		
			elseif($person['cremated_collected'] != 'other' || $rows <= 0)
			{
		?>				
				other = 0;
		<?php
			}
		?>
		
		if((test == 'other' || other == 1) && test != 'no')
		{
			$('#other_ashes_div').show();
		}
		else
		{
			$('#other_ashes_div').hide();
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
	<div class="web-960">	
      <!--start header-form --> 
      <!--end header-form --> 
      <!--start form-navigation-->
	  <div class="container">
      <div class="form-navigation"><img src="<?php echo base_url;?>images/nav05.png" alt="" class="process_img1 process_img5" /></div>
      <!--end form-navigation-->
      <!--start content-wrap-->
      <div class="content-wrap">
      	<div class="left-content">
        	<h2 class="heading process_title">AFTER THE FUNERAL</h2>
              <div class="help-f"><a id="example2" href="#inline1"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
                       <div style="display: none;">
                      <div id="inline1" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                            <p>There are many places where you can hold a funeral and/or a wake. If you or the person who passed away attended a particular church or other place of worship then that church may be the fitting place to have the funeral service. <br />
                            <b>Family tradition or personal preference might lead you to hold the funeral at another venue such as:</b> 
                            </p>
                            <ul>
                            	<li>  1) the funeral director’s chapel</li>
                                  <li>  2) the nursing home chapel</li>
                                  <li>  3) the crematorium chapel</li>
                                  <li>  4) the graveside</li>
                                  <li>  5) a rural property</li>
                                  <li>  6) a private residence</li>
                                  <li>  7) a school auditorium</li>
                            </ul>
                      </div>
                    </div>
            
            <!--start mpd-form-->
            <form name="person_making_form" action="save-funeral.php" method="POST">
            
            <!--  Payemnts Gateway fields  -->
            
            
            
            
            <!-- -------------------  -->
            <div class="mpd-form">
                    <fieldset class="fieldset process_form1">
                        <legend class="legend">Funeral Wake</legend>
                       <div class="f-row-1">
                        	<h3>Do you intend holding a wake after the funeral service?</h3>
                            
                            <p class="tx-area">
                                <input type="radio" id="is_wake" name="is_wake" class="checkbox" value="yes" <?php if($person['is_wake'] == 'yes') echo "checked=checked";else echo "checked=checked";?>/>
                                <span class="ch-field">Yes </span>                            </p>
                            <p class="tx-areamf">
                                <input type="radio" id="is_wake" name="is_wake" class="checkbox" value="no" <?php if($person['is_wake'] == 'no') echo "checked=checked";?>/>
                                <span class="ch-field">No </span>                            </p>
                            <div class="f-row-1">
                        	 <p class="fl-name">
                               <span id="wakediv"><label>If YES, provide details</label> <input type="text" name="wake" id="wake" value="<?php echo $person['wake'];?>" class="text-n" /></span>
                             </p></div>
                        </div>
                    </fieldset>
<!----------------------------------------------------------------------help1 popup------------------------------------------------------------------------------------->					
				
					
					<a href="#x" class="overlay" id="help1"></a>
					<div class="popup">
							
				<div class="row">

						<div class="col-md-5">
							<p>Some people prefer to keep the ashes at home in a casket or urn designed for<br/> that purpose. In some cases this is so that when a spouse or partner dies, <br/>the remains of both can be scattered or buried together. Others place a small amount<br/> in a piece of jewellery, for example a specially designed locket.</p>
						</div>

				</div>
					
				
					<a class="close" href="#close"></a>
				</div>
			
<!------------------------------------------------------------------End help1 popup------------------------------------------------------------------------------------->								
					
					
                     <div class="help-f"><a id="login_pop" href="#help1"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
                      
                   <fieldset class="fieldset process_form1">
                        <legend class="legend">Collection Of Ashes</legend>
                   <div class="f-row-1">
                   	 <h3>After cremation, how would you like the cremated remains to be collected?  </h3>
                             <p class="tx-area">
                               <input type="radio" id="cremated_collected" name="cremated_collected" class="checkbox" value="administrator" <?php if($person['cremated_collected'] == 'administrator') echo "checked=checked";else echo "checked=checked";?>/>
                                <span class="ch-field">Administrator </span>                            </p>
                     <p class="tx-area">
                       <input type="radio" id="cremated_collected" name="cremated_collected" class="checkbox" value="funeral director" <?php if($person['cremated_collected'] == 'funeral director') echo "checked=checked";?>/>
                     <span class="ch-field">Funeral Director </span>                            </p>
                             <p class="tx-area">
                              <input type="radio" id="cremated_collected" name="cremated_collected" class="checkbox" value="other" <?php if($person['cremated_collected'] == 'other') echo "checked=checked";?>/>
                                <span class="ch-field">Other  </span>
                     </p>
                      <p class="tx-area" id="">
                            	<span id="other_ashes_div"><input type="text" name="cremated_other" id="cremated_other" value="" class="text-n" /><?php echo $person['cremated_other'];?></span>
                            </p>
                        </div>
<!----------------------------------------------------------------------help2 popup------------------------------------------------------------------------------------->					
				
					
					<a href="#x" class="overlay" id="help2"></a>
					<div class="popup">
							
				<div class="row">

						<div class="col-md-5">
							<p>Choosing a cremation urn is a very personal choice which takes time. Finding and <br/>deciding upon an urn which best suits both the personality of the deceased and the <br/>tastes of the family is an important decision. </p>
						</div>

				</div>
					
				
					<a class="close" href="#close"></a>
				</div>
			
<!------------------------------------------------------------------End help2 popup------------------------------------------------------------------------------------->								
	
                        <div class="f-row-1">
                        	<h3>Do you require an urn or casket for the cremated remains?  <a id="login_pop" href="#help2"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" style="float:right;" /></a></h3>
                             
                             <p class="tx-area">
                               <input type="radio" id="is_urn" name="is_urn" class="checkbox" value="yes" <?php if($person['is_urn'] == 'yes') echo "checked=checked";else echo "checked=checked";?>/>
                                <span class="ch-field">Yes </span>                            </p>
                          <p class="tx-areamf">
                            <input type="radio" id="is_urn" name="is_urn" class="checkbox" value="no" <?php if($person['is_urn'] == 'no') echo "checked=checked";?>/>
                          <span class="ch-field">No </span>                            </p>
                            </div>
                        <div class="f-row-1" id="urn_div">
                       	  <p class="fl-name">
                                <lebel>If YES, what type  </lebel>
                       	        <input type="text" name="cremin_type" id="cremin_type" value="<?php echo $person['cremin_type'];?>" class="text-n" />
                       	  </p>
                          
                   </div>
                        
              </fieldset> 
<!----------------------------------------------------------------------help3 popup------------------------------------------------------------------------------------->					
				
					
					<a href="#x" class="overlay" id="help3"></a>
					<div class="popup">
							
				<div class="row">

						<div class="col-md-5">
							<p><h2>Scattering ashes</h2><br />
                            This can be carried out in a number of places such in the grounds of the<br/> crematorium , on a family grave , in your garden , at a place with <br/>fond memories , at sea , abroad.<br />
                            <h2>Burying ashes</h2><br />
                            People choose to bury ashes for a variety of reasons. For instance, families can then<br/> visit the place of burial and put up a memorial at the site, while others <br/>place the ashes of more than one family member together. You may be able to bury ashes <br/>within the grounds of the crematorium, in a churchyard, in a grave, in your garden.</p>
						</div>

				</div>
					
				
					<a class="close" href="#close"></a>
				</div>
			
<!------------------------------------------------------------------End help3 popup------------------------------------------------------------------------------------->								
                        


			  
			  
			  
               <div class="help-f"><a id="login_pop" href="#help3"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
                       <div style="display: none;">
                      <div id="inline6" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                      		<h2>Scattering ashes</h2><br />
                            <p>This can be carried out in a number of places such in the grounds of the crematorium , on a family grave , in your garden , at a place with fond memories , at sea , abroad.</p><br />
                            <h2>Burying ashes</h2><br />
                            <p>People choose to bury ashes for a variety of reasons. For instance, families can then visit the place of burial and put up a memorial at the site, while others place the ashes of more than one family member together. You may be able to bury ashes within the grounds of the crematorium, in a churchyard, in a grave, in your garden.</p>
                      </div>
                    </div>
              <fieldset class="fieldset process_form1">
                        <legend class="legend">Special Requests</legend>
                        <div class="f-row-1">
                        	<h3>Do you have any special requests for the ashes?   </h3>
                             <p class="tx-area">
                                <input type="radio" id="is_special_request" name="is_special_request" class="checkbox" value="yes" <?php if($person['is_special_request'] == 'yes') echo "checked=checked";else echo "checked=checked";?>/>
                                <span class="ch-field">Yes </span>                            </p>
                            <p class="tx-areamf">
                                <input type="radio" id="is_special_request" name="is_special_request" class="checkbox" value="no" <?php if($person['is_special_request'] == 'no') echo "checked=checked";?>/>
                                <span class="ch-field">No </span>                            </p>
                            </div>
                        <div class="f-row-1" id="is_special_request_div">
                        	 <p class="fl-name">
                                <lebel>If YES, what type  </lebel>
                                <input type="text" name="special_request" id="special_request" value="<?php echo $person['special_request'];?>" class="text-n" />
                             </p>
                          
                        </div>
                        
              </fieldset> 
               <div class="help-f"><a id="example2" href="#inline8"><img src="<?php echo base_url;?>images/helpbutton.png" alt="" /></a></div>
                       <div style="display: none;">
                      <div id="inline8" style="width:400px;height:auto;overflow:hidden; padding:10px 5px 10px 05px; text-align:justify;font-size:12px; line-height:20px;">
                            <p>A memorial provides tangible evidence of a life lived, and a sense of focus at which the bereaved can remember and reflect. A memorial plays an important role in the grieving process. It forms a link between the past, present and future, helping to unify families and generations.  </p>
                      </div>
                    </div>
              <fieldset class="fieldset process_form1">
                        <legend class="legend">Memorials</legend>
						
							
                        <div class="f-row-1">
                        	<h3>Do you require any form of memorial after cremation?    </h3>
                             <p class="tx-area">
                                <input type="radio" id="is_memorial" name="is_memorial" class="checkbox" value="yes" <?php if($person['is_memorial'] == 'yes') echo "checked=checked";else echo "checked=checked";?>/>
                                <span class="ch-field">Yes </span>                            </p>
                            <p class="tx-areamf">
                                <input type="radio" id="is_memorial" name="is_memorial" class="checkbox" value="no" <?php if($person['is_memorial'] == 'no') echo "checked=checked";?>/>
                                <span class="ch-field">No </span>                            </p>
                             </div>
                        <div class="f-row-1" id="is_memorial_div">
                        	 <p class="fl-name">
                                <lebel>If YES, please describe   </lebel>
                                <input type="text" name="memorial" id="memorial" value="<?php echo $person['memorial'];?>" class="text-n" />
                             </p>
                        
                        
                        <div class="f-row-1">
                        	<h3>Do you have a specific memorial in mind?    </h3>
                             <p class="tx-area">
                                <input type="radio" id="is_specific_memorial" name="is_specific_memorial" class="checkbox" value="yes" <?php if($person['is_specific_memorial'] == 'yes') echo "checked=checked";else echo "checked=checked";?>/>
                                <span class="ch-field">Yes </span>                            </p>
                            <p class="tx-areamf">
                                <input type="radio" id="is_specific_memorial" name="is_specific_memorial" class="checkbox" value="no" <?php if($person['is_specific_memorial'] == 'no') echo "checked=checked";?>/>
                                <span class="ch-field">No </span>                            </p>
                           </div>
                        <div class="f-row-1" id="is_specific_memorial_div">
                        	 <p class="f-row-1">
                                <lebel>If YES, please give details of the memorial</lebel>
                                <input type="text" name="detail_of_mem" id="detail_of_mem" value="<?php echo $person['detail_of_mem'];?>" class="text-n" />
                             </p>
                        </div>
                        
                          <div class="f-row-1">
                        	<h3>Do you a preferred stonemason to supply and fix the memorial?    </h3>
                             <p class="tx-area">
                                <input type="radio" id="is_stonemason" name="is_stonemason" class="checkbox" value="yes" <?php if($person['is_stonemason'] == 'yes') echo "checked=checked";else echo "checked=checked";?>/>
                                <span class="ch-field">Yes </span>                            </p>
                            <p class="tx-areamf">
                                <input type="radio" id="is_stonemason" name="is_stonemason" class="checkbox" <?php if($person['is_stonemason'] == 'no') echo "checked=checked";?>/>
                                <span class="ch-field">No </span>                            </p>
                            </div>
                        <div class="f-row-1" >
                        	 <p class="f-row-1">
                                <h3>What would you like written on the memorial (inscription)?    </h3>
                                <input type="text" name="written" id="written" value="<?php echo $person['written'];?>" class="text-n" />
                             </p>
                        </div>
                        </div>
                        
              </fieldset>     
                    
            </div>
           <div class="f-row-2">
                 <p style="float:right;">
                 	<input type="submit"  name="form_edit" value="submit" class="redirect_signup login_button" onClick="return formvalidation(this.form);"/> 
                 </p>
                 <p style="float:left;">
                 	<a href="edit_service.php"><input type="button" class="new_button form_btn2" value="previous" style="width:120px;"/></a>
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
        <li><a href="after-the-funeral.php" title="">5. After the Funeral</a></li>
        
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
