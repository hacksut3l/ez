<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<?php include '../include/header.php'; ?>
 <?php
	ob_start();

	@session_start();
?>
<?php

	ob_start();

	include_once('../include/config.php');

	@session_start();

	

	$pagesql = "SELECT * FROM pages WHERE slug = '".$_GET['id']."'";

	$pageex = mysql_query($pagesql);

	

	$pages = mysql_fetch_assoc($pageex);

	

	

?>
<div class="punch_text_02">
    <div class="container">
	<br/><br/>
	<div align="center">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;"><?php echo $pages['title']; ?></font>
    </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="container" style="background:#FFFFFF">
<div class="mar_top5"></div>

	<div class="">
      

      
       <p style="font-size:16px; font-family:Arial, Helvetica, sans-serif; "><?php echo $pages['description']; ?></p><br /><br />


	<!--<h2>Our Team</h2>
	<h3>Board of Directors</h3>
	

            <ul class="lirc_section">
                <li class="left"><img src="../images/testi1.png"></li>
                <li class=""><p style="color:#989898; padding-left:150px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;">
				<font style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Name | Position</font><br />
				<strong>Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.</strong></p><br />
				</li>
            </ul>
   			
			<ul class="lirc_section">
                <li class="left"><img src="../images/testi1.png"></li>
                <li class=""><p style="color:#989898; padding-left:150px; margin-top:-80px;font-family:Arial, Helvetica, sans-serif;">
				<font style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#00a3b4;">Name | Position</font><br />
				<strong>Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.Some testimonial lines will go here.</strong></p><br />
				</li>
            </ul>
		
    </div><!-- end section 
    
    
    <div class="one_third last">
 
		<img src="../images/ad_banner_about.png"><br /><br />
		<img src="../images/ad_banner_about.png"><br /><br />
		<img src="../images/ad_banner_about.png"><br /><br /><br /><br />
   			
-->	
</div><!-- progress bars section -->
</div>
<div class="clearfix"></div>
<script type="text/javascript">



	var BASE_URL = '<?php echo base_url;?>';



</script>


<?php if($_GET['id']=='contact-us')
{
?>

	 	
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


<h1>Contact Form</h1>
	<div>
   
     <form name="feedback" action="" method="post">
					<div class="name-field" style="max-width:1100px; margin:0 auto;">
                    <div class="name-full">Name<span class="red">*</span></div>

                    <div class="field">
<input name="name" id="name" type="text" size="40"></div>
<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="aa"></span>
</div>
                    
                   
					  


                    <div class="name-field">

                    <div class="name-full"><br />Email<span class="red">*</span></div>

                    <div class="field">
<input name="email" id="email" type="text" size="40"></div>
<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="bb"></span>

                    </div>

                     <div class="name-field">

                    <div class="name-full"><br />Contact Number<span class="red">*</span></div>

                    <div class="field">
<input name="phone" id="mob" type="text" maxlength="10" size="40"></div>
<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="cc"></span>

                    </div>
					<div class="name-field">

                    <div class="name-full"><br />Position<span class="red">*</span></div>

                    <div class="field">
<input name="phone" id="position" type="text" maxlength="10" size="40"></div>
<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="dd"></span>

                    </div>

                    <div class="name-field">
						<div class="name-full"><br /><span class="red"></span></div>
                    <div class="field">
<input type="checkbox" name="check" id="exist">I am an existing client of EziFunerals</div>
                    </div>
	
	
	<div class="name-field">
						<div class="name-full"><br />What would you like to do?<span class="red"></span></div>
                    <div class="field">
					<table><tr><td><input type="radio" name="no1" checked="checked" value="Make an enquiry" >Make an enquiry</td>
								<td><input type="radio" name="no1" value="Give a compliment" >Give a compliment</td>
								</tr>
							<tr><td><input type="radio" name="no1" value="Make a suggestion">Make a suggestion</td>
								<td><input type="radio" name="no1" value="Make a complaint">Make a complaint</div></td>
								</tr>
								</table>


                    </div>
	
                     <div class="name-field">

                    <div class="name-full"><br />Message <span class="red">*</span></div>

                    <div class="field">
<textarea name="mess" id="mess" cols="100" rows="6" style="font-family: 'open_sansregular';"></textarea></div>
<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular';font-size: 12px;" id="ee"></span>
<br />
                    </div>
					
					<div class="name-field">

                    <div class="name-full"><br /><span class="red">Where did you here about us?</span></div>

                    <div class="field">
						<select name="about" id="about">
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

<input class="formspan1_a get_btn_bxshdo1" type="submit" id="save" name="save" value="Submit" onClick="return valid()"/>
                    
                    
                    </form>

</div><br />

</div></div>
<?php } ?>


<?php if($_GET['id']=='advertisers' || $_GET['id']=='insurance-companies' || $_GET['id']=='employers' || $_GET['id']=='aged-care'|| $_GET['id']=='funeral-directors')
{
?>

	 	
<div class="container" style="background:#FFFFFF">
<div class="mar_top5"></div>


<script type="text/javascript" language="javascript">
 
 function rquest_validation()
 {
 	var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	if(advertise_enquiry.rname.value=="")
	{
		alert('Please Enter The Name');
		feedback.rname.focus();
    	return false;
	}
	
	if(advertise_enquiry.company.value=="")
	{
		alert('Please Enter The Bussiness Name');
		feedback.company.focus();
    	return false;
	}
	if(advertise_enquiry.busstype.value=="")
	{
		alert('Please Enter The Bussiness Type');
		advertise_enquiry.busstype.focus();
    	return false;
	}
	
	 if(advertise_enquiry.remail.value=="")
	{
		alert('Please Enter The email');
		advertise_enquiry.remail.focus();
    	return false;	
	}
 	else   
 	{  
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(advertise_enquiry.remail.value))
		{
   			 
		}
		else
		{  
    		alert("You have entered an invalid email address!"); 
			advertise_enquiry.remail.focus();
   			return (false);  
		}		
	}	
		
	 if(advertise_enquiry.phone.value=="")
	{
		alert('Please Enter The MobileNo');
		feedback.phone.focus();
    	return false;	

	}
	else
	{	
		if (/^\d{10}$/.test(advertise_enquiry.phone.value))
		{
   			 
		}
		else
		{  
    		alert("You have entered an invalid MobileNo!"); 
			advertise_enquiry.phone.focus();
   			return (false);  
		}		
	
	}	
	
	
	 if(advertise_enquiry.rposition.value=="")
	{
		alert('Please Enter The Position');
		advertise_enquiry.rposition.focus();
    	return false;	

	}
		if(advertise_enquiry.contactmethod.value=="")
	{
		alert('Please Enter the Contact Method');
		advertise_enquiry.contactmethod.focus();
    	return false;	

	}
	 
		
 }
 
</script>
<center><font style="font-size:28px; font-family:Arial, Helvetica, sans-serif;">Register Your Interest</font></center><br>
	<div>
   
    <form name="advertise_enquiry" action="" method="POST">
				<center>
                <table>
					<tr>
						<td style="padding:5px; width:180px;"><div class="name-full">Name:-</div></td>
				   		<td style="padding:5px;"><input name="rname" id="rname" type="text" size="40"></td>	
				   
				    </tr>
					<tr>
						<td  style="padding:5px;"><div class="name-full">Business Name:-</div></td>  
				   		<td  style="padding:5px;"><input name="company" id="company" type="text" size="40"></td>	
				   
				    </tr>
					<tr>
						<td  style="padding:5px;"> <div class="name-full">Business Type:-</div></td>  
				   		<td  style="padding:5px;"><input name="busstype" id="busstype" type="text" size="40"></td>	
				   
				    </tr>
					<tr>
						<td style="padding:5px;"> <div class="name-full">Position:-</div></td>  
				   		<td style="padding:5px;"><input name="rposition" id="rposition" type="text" size="40"></td>	
				   
				    </tr>
					<tr>
						<td style="padding:5px;"> <div class="name-full">Email Address:-</div></td>  
				   		<td style="padding:5px;"><input name="remail" id="remail" type="text" size="40"></td>	
				   
				    </tr>
					<tr>
						<td style="padding:5px;"> <div class="name-full">Contact Number:-</div></td>  
				   		<td style="padding:5px;"><input name="phone" id="phone" type="text" maxlength="10" size="40"></td>	
				   
				    </tr>
					
						<tr>
						<td style="padding:5px;"> <div class="name-full">Contact Method:-</div></td>  
				   		<td style="padding:5px;"><input name="contactmethod" id="contactmethod" type="text" maxlength="10" size="40"></td>	
				   
				    </tr>
					</table>
					<br>
						 <input class="formspan1_a get_btn_bxshdo1" type="submit" id="submit" name="submit" value="SEND REQUEST"  onClick="return rquest_validation()" style="width:100px; height:35px; background:#00a3b4;color:#FFFFFF; border-style:ridge;"/>&nbsp;&nbsp;&nbsp;&nbsp;<input class="formspan1_a get_btn_bxshdo1" type="submit" id="contact" name="contact" value="CONTACT US" /></td>  
				   		
				   
				  
					
					
					</center>
	</form>				
		
                    <div class="field">
			
           
</div><br /><br /><br /></div><br />
<center><font style="font-size:28px; font-family:Arial, Helvetica, sans-serif;">GET STARTED</font></center><br>
<P>Find out more about how EziFunerals can work for your company. Send us your details below and we'd be happy to discuss your best options.</P>


<div class="one_full">
 <form name="company" action="" method="POST">

			<div class="one_fourth" style="background:#FFFFFF; height:auto">
					<ul class="lirc_section">
						 <div class="name-field">

							<div class="name-full"><br />Your Name<span class="red">*</span></div>
		
							<div class="field">
								<input name="yourname" id="yourname" type="text" size="30"></div>
									<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="cc"></span>
							</div>
								
					</ul>
					<ul class="lirc_section">
						 <div class="name-field">

							<div class="name-full"><br />Company Type<span class="red">*</span></div>
		
							<div class="field">
								<select>
								<option value="Select">Select</option>
								<option value=""></option>
								<option value=""></option>
								<option value=""></option>
								
								</select></div>
									<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="cc"></span>
							</div>
								
					</ul>
					<ul class="lirc_section">
						 <div class="name-field">

							<div class="name-full"><br />Contact Method<span class="red">*</span></div>
		
							<div class="field">
								<select>
								<option value="Select">Select</option>
								<option value=""></option>
								<option value=""></option>
								<option value=""></option>
								
								</select></div>
									<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="cc"></span>
							</div>
								
					</ul>
					<ul class="lirc_section">
						 <div class="name-field">
							<div class="field"><br>
								<input name="save" id="save" type="submit" size="30"></div><br>
									<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="cc"></span>
							</div>
								
					</ul>
				</div>
				<div class="one_fourth" style="background:#FFFFFF; height:auto">
					
					
					<ul class="lirc_section">
						 <div class="name-field">

							<div class="name-full"><br />Company Name<span class="red">*</span></div>
		
							<div class="field">
								<input name="remail" id="remail" type="text" size="30"></div>
									<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="cc"></span>
							</div>
								
					</ul>
					<ul class="lirc_section">
						 <div class="name-field">

							<div class="name-full"><br />Your Position<span class="red">*</span></div>
		
							<div class="field">
								<select>
								<option value="Select">Select</option>
								<option value=""></option>
								<option value=""></option>
								<option value=""></option>
								
								</select></div>
									<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="cc"></span>
							</div>
								
					</ul>
					
					<ul class="lirc_section">
						 <div class="name-field">

							<div class="name-full"><br />Contact Number<span class="red">*</span></div>
		
							<div class="field">
								<input name="remail" id="remail" type="text" size="30"></div>
									<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="cc"></span>
							</div>
								
					</ul>
					
				</div>
			<div class="one_fourth" style="background:#FFFFFF; height:auto">
					<ul class="lirc_section">
						 <div class="name-field">

							<div class="name-full"><br />What areas are you interested in?<span class="red"></span></div>
		
							<div class="field">
								<input name="interested" id="interested" type="checkbox">EziFunerals Directory listing
								<input name="interested" id="interested" type="checkbox">Funeral Director Memberships
								<input name="interested" id="interested" type="checkbox">Funeral planning services<br>
								<input name="interested" id="interested" type="checkbox">Advertising<br>
								<input name="interested" id="interested" type="checkbox">Funeral quotes and pricing
								<input name="interested" id="interested" type="checkbox">Investment opportunities
								</div>
									<span class="formerror" style="float: left;width: 100%;color: red;font-family: 'open_sansregular'; font-size: 12px;" id="cc"></span>
							</div>
								
					</ul>
				</div>
			
</div>

</div></div>
<?php } ?>





  </div>
	</div>
<div class="punch_text_02">
    <div class="container">
	<font style="font-size:18px">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	<font style="font-family: 'Helvetica Light Condensed 47',Arial; font-size:24px; font-weight:bold">What kind of funeral? A step by step guide to planning a meaningful funeral</font> <a href="#" class="readmore_but_03" style="margin-left:-50px;">Learn More</a>
    </font>
	</div>
</div>


<div class="grey_bg" align="" style="background:#f5f5f5; height:130px;">
	
        <div style="margin-left:350px;">
			<h2 style="font-weight:bold">Request an Information Pack</h2>
			<p><strong>Let us know your email address and we will send you an information pack.</strong></p><br />
			<form name="" action="" method="post">
			<input type="text" name="" value="" placeholder="Email Address." style="height:40px; width:440px; border-radius:4px;">
			<input type="submit" name="Submit" value="Submit">
			</form><br />
		</div>
        
</div>


<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
        <div class="center"><img src="../images/footer_AD.png" width="620"></div>
        
</div>



<!-- Footer
======================================= -->
<?php include '../include/footer.php'; ?>

</html>