	<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js ovderflow_hidden"> <!--<![endif]-->
<title>eziFunerals | Contact us</title>

<meta name="keywords" content="Funerals, funeral director, online funeral, grief, death, burial, cremation, cemetery, funeral costs, funeral quotes, funeral rights, funeral planning, dying, celebration, funeral industry, memorial, ashes, eulogy, obituary, floral tributes, urns, grave, gravesite, headstone, coffins, caskets, funeral music, funeral consumers, hearse, wake, wills, estates, digital death, loss ">

<meta name="description" content="Thank you for contacting EziFunerals">

<?php include '../include/header.php'; ?>

<?php

	include_once('../include/config.php');

	

	

	$pagesql = "SELECT * FROM pages WHERE id = '2'";

	$pageex = mysql_query($pagesql);

	

	$pages = mysql_fetch_assoc($pageex);

	

	

?>
<!--<link href="../css/Old_Include_Css/style1.css" rel="stylesheet" type="text/css">-->

<div class="punch_text_02 contact_heading">
    <div class="container">
	<br><br>
	<div align="left">
        	<font class="blue_heading" style="font-size:28px; font-family:Arial, Helvetica, sans-serif;"><?php echo $pages['title']; ?></font>
    </div>
	</div>
</div>

<div class="container" style="background:#FFFFFF">


<!--	<h2>Our Team</h2>
	<h3>Board of Directors</h3>
	

            <ul class="lirc_section">
                <li class="left"><img src="../images/testi1.png"></li>
                <li class=""><p style="color:#989898; padding-left:150px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;">
				<font style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Name | Position</font><br />
				<strong>Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.</strong></p><br /><br>
				</li>
            </ul>
   			
			<ul class="lirc_section">
                <li class="left"><img src="../images/testi1.png"></li>
                <li class=""><p style="color:#989898; padding-left:150px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;">
				<font style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Name | Position</font><br />
				<strong>Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.</strong></p><br />
				</li>
            </ul> 
		
    </div> -->

   

<script type="text/javascript">



	var BASE_URL = '<?php echo base_url;?>';



</script>
<link href="../css/Old_Include_Css/style.css" rel="stylesheet" type="text/css">	 	
<div class="container" style="background:#FFFFFF">
<div class="mar_top5"></div>


<script type="text/javascript" language="javascript">
 
 function valid()
 {
 	var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	if(feedback.name.value=="")
	{
		alert('Please Enter The Name');
		feedback.name.focus();
    	return false;
	}
	else
	{
		
	}
	
	 if(feedback.email.value=="")
	{
		alert('Please Enter The email');
		feedback.email.focus();
    	return false;	
	}
 	else   
 	{  
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(feedback.email.value))
		{
   			 
		}
		else
		{  
    		alert("You have entered an invalid email address!"); 
			feedback.email.focus();
   			return (false);  
		}		
	}	
		
	 if(feedback.mob.value=="")
	{
		alert('Please Enter The MobileNo');
		feedback.mob.focus();
    	return false;	

	}
	else
	{	
		if (/^\d{10}$/.test(feedback.mob.value))
		{
   			 
		}
		else
		{  
    		alert("You have entered an invalid MobileNo!"); 
			feedback.mob.focus();
   			return (false);  
		}		
	
	}	
	
	
	 if(feedback.position.value=="")
	{
		alert('Please Enter The Position');
		feedback.position.focus();
    	return false;	

	}
	if(feedback.no1.value=="")
	{
		alert('Please Select Any One');
		feedback.no1.focus();
    	return false;	

	}
	if(feedback.mess.value=="")
	{
		alert('Please Enter the Message');
		feedback.mess.focus();
    	return false;	

	}
	 if(feedback.about.value=="Select")
	{
		alert('Please Select the Any One Category');
		feedback.about.focus();
    	return false;	

	}
	
		
 }
 
</script>

<div class="one_half">
	<fieldset class="fieldset" style="width:430px; margin-bottom:20px;">
     <form name="feedback" action="ThanksForContact.php" method="post">
					<div class="name-field" style="max-width:1100px; margin:0 auto;">
                    <div class="name-full">Name<span class="red">*</span></div>

                    <div class="field">
<input name="name" id="name" type="text" size="40" class="reg_field" style="width:97%;"></div>
<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="aa"></span>
</div>
                    
                   
					  


                    <div class="name-field">

                    <div class="name-full"><br />Email<span class="red">*</span></div>

                    <div class="field">
<input name="email" id="email" type="text" size="40" class="reg_field" style="width:97%;"></div>
<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="bb"></span>

                    </div>

                     <div class="name-field">

                    <div class="name-full"><br />Contact Number<span class="red">*</span></div>

                    <div class="field">
<input name="mob" id="mob" type="text" maxlength="10" size="40" class="reg_field" style="width:97%;"></div>
<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="cc"></span>

                    </div>
					

                    <div class="name-field">
						<div class="name-full"><br /><span class="red"></span></div>
                    <div class="field" style="margin-top:25px;">
<input type="checkbox" name="ClientCheck" id="exist" value="Yes">I am an existing client of eziFunerals</div>
                    </div>
	
	
	<div class="name-field">
						<div class="name-full"><br />What would you like to do?<span class="red"></span></div>
                    <div class="field">
					<table><tr><td><input type="radio" name="like" checked="checked" value="Make an enquiry" >Make an enquiry</td>
								<td><input type="radio" name="like" value="Give a compliment" >Give a compliment</td>
								</tr>
							<tr><td><input type="radio" name="like" value="Make a suggestion">Make a suggestion</td>
								<td><input type="radio" name="like" value="Make a complaint">Make a complaint</div></td>
								</tr>
								</table>


                    </div>
	
                     <div class="name-field">

                    <div class="name-full"><br />Message <span class="red">*</span></div>

                    <div class="field">
<textarea name="mess" id="mess" cols="40"  class="reg_field" style="font-family: 'open_sansregular'; height:80px; width:95%;"></textarea></div>
<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular';font-size: 12px;" id="ee"></span>
<br />
                    </div>
					
					<div class="name-field" >

                    <div class="name-full" style="padding:10px 0 0 0;"><br /><br /><br /><br /><span class="" >Where did you hear about us?</span></div>

                    <div class="field">
						<select name="about" class="input_bg" id="about" style="width:100%;">
						<option value="Select" >Select</option>
						<option value="Search Engine Results">Search Engine Results</option>
						<option value="Friend">Friend</option>
						<option value="Blog or Forum">Blog or Forum</option>
						<option value="Newspaper or Magazine">Newspaper or Magazine</option>
						<option value="Event or Conference">Event or Conference</option>
						<option value="Radio">Radio</option>
						<option value="Television">Television</option>
						<option value="Other">Other</option>

						</select></div>
<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular';font-size: 12px;" id="ff"></span>
<br />
                    </div>
					
					
					
					
					
                     <p style="font-family: 'open_sansregular'; font-size:14px; width:100%; float:left"> <strong>We will attempt to contact you to discuss your enquiry as soon as possible. <br /><br /></strong></p>


                    <div class="formspan1">

                    <div class="form-button1">

<input class=" new_button" type="submit" id="save" name="save" value="Submit" onClick="return valid()"/><br/><br/>
                    
                    
                    </form>
	</fieldset>
</div><br />

</div>
 </div> </div></div>
  
</div>
</div>

<div class="one_third contact_text">
     
       <p style="font-size:16px; font-family:Arial, Helvetica, sans-serif; "><?php echo $pages['description']; ?></p><br /><br />
</div>



	</div>
</div>



<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
       <div class="center"><a href="how-it-works"><img src="../images/footer_AD.png" width="620" class="top_ad_bottom"></a></div>
        
</div>



<!-- Footer
======================================= -->
<?php include '../include/footer.php'; ?>

</html>