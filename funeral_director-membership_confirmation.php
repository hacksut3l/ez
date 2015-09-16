<?php 
	$to       = $email;
	$subject  = "Welcome to eziFunerals";
	$header   = "peter@ezifunerals.com.au' => 'eziFunerals"; 
	$msg      =  '



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
    <td colspan="3" style=" padding-bottom:5px;"><a href="#"  style="color:#000;"><img style="display:block;" src="'.base_url.'emailImages/image001.jpg" alt="Logo" /></a></td>
  
  </tr>
           <tr>
            <td colspan="4" style="font:18px Arial, Helvetica, sans-serif; color:#666; ">Hello <span style="color:#009aad;">'.ucfirst($name).',</span><br/><br/><span style="color:#009aad; font-size:20px; font-weight:bold;">Welcome to eziFunerals!</span><p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Thank you for signing  up to <a href="http://ezifunerals.com.au/" target="_blank">www.ezifunerals.com.au.</a><br/><br/>
			You’re well on your way to start connecting with new funeral consumers using eziFunerals online planning services.<br/>
To complete your registration and begin receiving your member benefits, please activate your membership by clicking the link below.</p>

<div class="form-button" style="background:#009aad; width:96%;text-align:center; height:29px;">
<span class="formspan_a" style="color: #fff;text-align: center;font-size: 14px;float: left;width: 96%; padding:10px;"><a href="'.$link.'"  style="color:#fff; text-decoration:none;">Complete your member profile today </a> </span> <br /><br /></div>
<p style="margin:0;font:bold 14px Arial, Helvetica, sans-serif; color:#666;"><br/>Need further assistance?</p>
<p  style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">If you need further assistance please visit our <a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank">help desk</a> or simply <a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">contact us</a></p><p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Thanks again for joining eziFunerals!</p>
<p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Sincerely,<br /><br />
              <strong>The eziFunerals Team</strong><br />
<a href="http://www.eziFunerals.com.au/" target="_blank" style="color:#04A3B4;">www.eziFunerals.com.au</a></p>
<p style="padding-bottom:10px;font:12px/15px Arial, Helvetica, sans-serif; color:#666;">Need help?&nbsp;|&nbsp;<a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank">Help Desk</a>&nbsp;|&nbsp;<a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">Contact Us</a>&nbsp;|&nbsp;<a href="'.base_url.'page/terms-of-use" target="_blank" style="color:#000;">Terms of Service</a>&nbsp;|&nbsp;<a href="'.base_url.'page/privacy-policy" target="_blank" style="color:#000;">Privacy Policy</a>&nbsp;|&nbsp;All Rights Reserved.<br/><br/>
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
</html>
';

$send=email("eziFunerals",$to,$msg,$subject,"No"); ?>