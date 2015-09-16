<?php include "./MailConfig.php"; 
	$to       = $email;
	$subject  = "eziFunerals: Verify your account!";
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
<table width="600" border="0" cellpadding="0" style="border: 1px solid rgb(102, 102, 102);margin:0 auto;">
  
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" style="background:#fff;">
    	<table width="100%" border="0" cellpadding="10">
          <tr>
     <td colspan="3" style=" padding-bottom:5px;"><a href="http://ezifunerals.com.au"  style="color:#000;" target="_blank"><img style="display:block;" src="'.base_url.'emailImages/image001.jpg" alt="Logo" /></a></td>
  
  </tr>
           <tr>
            <td colspan="4" style="font:18px Arial, Helvetica, sans-serif; color:#666; ">Hello&nbsp;<span style="color:#666;">'.ucwords($name).',</span><br/><br/><b style="color:#009aad; font-size:22px;">Welcome to eziFunerals!</b>
           <p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Thank you for signing  up to <a href="http://ezifunerals.com.au/" target="_blank">www.ezifunerals.com.au.</a></p>
		   <p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">To complete your registration and begin using our online funeral planning services, 
please activate your membership by clicking the link below.<br/></p>
<div class="form-button" style="background:#009aad; width:96%;text-align:center; height:29px;">
<span class="formspan_a" style="color:#fff;text-align: center;
font-size: 14px;padding: 3px;float: left;width: 96%; line-height:2.5"><a href="'.$link.'" style="color:#fff; text-decoration:none;">Click to verify your email address</a>  </span> <br /><br /></div>

</td>
          </tr>
         
          <tr>
            <td colspan="4"style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Sincerely,<br />
<b>The eziFunerals Team</b><br />
<a href="http://www.ezifunerals.com.au/" target="_blank" style="color:#009aad;">www.ezifunerals.com.au</a>
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

$send=email("eziFunerals",$to,$msg,$subject,"No");

?>
