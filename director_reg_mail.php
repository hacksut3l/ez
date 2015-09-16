<?php include "MailConfig.php"; 
	
	
	 $to       = $email;
	$subject  = "Basic Membership Registration Confirmation link";
	$header   = "peter@ezifunerals.com.au' => 'eziFunerals"; 
	$msg      = '



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eziFunerals</title>
</head>
<style>
a:hover{
	color:#00A3B4 !important;
}
</style>
<body>
<div style="width:600px; margin:0 auto;">
<table width="600" border="0" cellpadding="0" style="border: 1px solid rgb(102, 102, 102); margin:0 auto;">
  <tr>
    <td colspan="3" style=" padding-bottom:5px;"><a href="'.base_url.'"  style="color:#000;"><img style="display:block;" src="'.base_url.'emailImages/image001.jpg" alt="Logo" /></a></td>
  
  </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" style="background:#fff;">
    	<table width="100%" border="0" cellpadding="10">
          
           <tr>
           <td colspan="4" style="font:bold 18px Arial, Helvetica, sans-serif; color:#666;">Hi <span style="color:#5ACAD3;">'.$name.'</span></td>
          </tr>
          <tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;"><span style="color:#009aad; font-size:20px; font-weight:bold;">Welcome to eziFunerals!</span><br/><br/>Thank you for signing  up to <a href="http://ezifunerals.com.au/" target="_blank">www.ezifunerals.com.au.</a><br/><br/>
			You’re well on your way to start connecting with new funeral consumers using eziFunerals online planning services.<br/><br/>
To complete your registration and begin receiving your member benefits, please activate your membership by clicking the link below.
</td>
          </tr>
        
           <tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">
<div style="background:#009aad;">
<span style="text-align:center; float:left; width:100%; padding-top:10px;"><a href="'.$link.'" style="text-decoration:none;color:#fff;">Click to verify your email address</a> </span> <br/><br/></div>
</td>
          </tr>
         <tr>  
            <td colspan="4" style="font:bold 14px Arial, Helvetica, sans-serif; color:#666;"><p style="margin:0;"><br/>Need further assistance?</p></td>
            
            </tr>
  
        <tr>
        <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">If you need further assistance please visit our <a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank">help desk</a> or simply <a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">contact us</a></td>
        </tr>
		
		<tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Thanks again for joining eziFunerals!<br />
</td>
          </tr>
		
		
          <tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Sincerely,<br />
              <strong>The eziFunerals Team</strong><br />
<a href="http://www.eziFunerals.com.au/" target="_blank" style="color:#04A3B4;">www.eziFunerals.com.au</a>
</td>
          </tr>
         
         
          <tr>            
	   
	   <td colspan="4" style=" padding-bottom:10px;font:12px/15px Arial, Helvetica, sans-serif; color:#666;"><p>Need help?&nbsp;|&nbsp;<a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank">Help Desk</a>&nbsp;|&nbsp;<a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">Contact Us</a>&nbsp;|&nbsp;<a href="'.base_url.'page/terms-of-use" target="_blank" style="color:#000;">Terms of Service</a>&nbsp;|&nbsp;<a href="'.base_url.'page/privacy-policy" target="_blank" style="color:#000;">Privacy Policy</a>&nbsp;|&nbsp;All Rights Reserved.<br/>
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

$send=email("eziFunerals",$to,$msg,$subject,"No");

?>

