<?php include "./MailConfig.php"; 
	$to       = $email;
	$subject  = "Welcome to eziFunerals!";
	$header   = "peter@ezifunerals.com.au' => 'eziFunerals"; 
	$msg      = '





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eziFunerals</title>

</head>
<style type="text/css">
a:hover{
	color:#00A3B4 !important;
	
}


p{ margin:3px 0px !important}
</style>
<body>
<div style="width:600px; margin:0 auto;">
<table width="100%" border="0" cellpadding="0" style="border: 1px solid rgb(102, 102, 102);">
  <tr>
  
  </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" style="background:#fff;">
    	<table width="100%" border="0" cellpadding="10">
          <tr>
             <td colspan="3" style=" padding-bottom:5px;"><a href="http://ezifunerals.com.au"  style="color:#000;" target="_blank"><img style="display:block;" src="'.base_url.'emailImages/image001.jpg" alt="Logo" /></a></td>
          </tr>
          <tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666; padding-bottom:0;"><span style="color:#04A3B4; font-size:22px; font-weight:bold;">Welcome to eziFunerals</span>
				<br/>
              <p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666; padding-bottom:0;">Thank you for signing up to <a href="http://ezifunerals.com.au/" target="_blank">www.ezifunerals.com.au.</a><br/><br/>
              We understand that this is a difficult time and we are here to help.<br />
			Your sign up is complete, and you’re ready to start organising the funeral.<br /><br />
        	  Your username is&nbsp;'.$username.'<br/><br/>
             Use the password you created during registration to explore our funeral planning services which will help you:</p></td>
          </tr>       
          
          <tr>
            <td colspan="4" style="font:bold 18px Arial, Helvetica, sans-serif; color:#666; padding:0;">
                <ul style="font:14px/20px Arial, Helvetica, sans-serif; color:#04A3B4; margin:0; list-style:decimal">
         			 <li><a href="'. base_url.'organise_funerals.php" target="_blank" style="color:#04A3B4;">Plan your funeral online (without a funeral director)</a></li>
                    <li><a href="'.base_url.'find-funeral-director.php" target="_blank" style="color:#04A3B4;">Find a Funeral Director in your area</a></li>
                    <li><a href="'.base_url.'page/how-it-works" target="_blank" style="color:#04A3B4;">Request Custom Quotes</a></li>
					 <li><a href="'.base_url.'page/how-it-works" target="_blank" style="color:#04A3B4;">Compare Prices</a></li>
					  <li><a href="'.base_url.'find-funeral-director.php" target="_blank" style="color:#04A3B4;">Select the right Funeral Director at the right price</a></li> 
					 </ul>
            </td>
          </tr>
          <tr>  
            <td colspan="4" style="font:14px Arial, Helvetica, sans-serif; color:#666;"><p style="margin:0; font-weight:bold ">Need further assistance?</p>
			<p>If you need further assistance please visit our <a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank">help desk</a> or simply <a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">contact us</a><br/><br/>Thanks again for using eziFunerals!</p>
			<p>Sincerely,<br />
              <strong>The eziFunerals Team</strong><br />
<a href="http://www.ezifunerals.com.au/" target="_blank" style="color:#04A3B4;">www.ezifunerals.com.au</a></p>
<p style=" padding-bottom:10px;font:12px/15px Arial, Helvetica, sans-serif; color:#666;">Need help?|<a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank">Help Desk</a>|<a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">Contact Us</a>|<a href="'.base_url.'page/terms-of-use" target="_blank" style="color:#000;">Terms of Service</a>|<a href="'.base_url.'page/privacy-policy" target="_blank" style="color:#000;">Privacy Policy</a>|All Rights Reserved.<br/><br/>
             &copy; 2015 eziFunerals Pty Ltd.</td>
            
          </tr>
        </table>
        
    </td>
    <td width="10%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</body>
</html>';

$send=email("eziFunerals",$to,$msg,$subject,"No"); ?>
