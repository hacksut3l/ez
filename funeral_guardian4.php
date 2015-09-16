<?php 
$to       = $email;
	$subject  = "Your funeral guardian!";
	//$path=base_url.'/atneed/Pdf_Uploads/'; 
	
	$header = "peter@ezifunerals.com.au' => 'eziFunerals";
	
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
            <td colspan="4" style="font:bold 18px Arial, Helvetica, sans-serif; color:#666; ">Hello&nbsp;<span style="color:#009aad;">'.$name.',</span>
			<p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">You have received this email as the agreed Funeral Guardian of (Insert Name of the
person completing the Advanced Funeral Plan).
            <br/><br/>This email contains a link that will provide you access to (Insert Name of the person
completing the Advanced Funeral Plan) Funeral Wishes.
Please keep this e-mail where you know you will have access to it upon (Insert Name of the person completing the Advanced Funeral Plan) death.<br/><br/>
              Please do NOT click on this link until that time. Thanks!<br/>
              <a href="<?php echo base_url;?>pages/terms_conditions.php" target="_blank"  style="color:#000;">http://www.ezifunerals.com/login/xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</a><br/><br/>
              If you wish to opt-out of these occasional emails, you may do so by clicking the following link:<br/>
              <a href="<?php echo base_url;?>pages/terms_conditions.php" target="_blank"  style="color:#000;">http://www.ezifunerals.com/login/xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</a>
    <br/><br/>          If you change your e-mail address, please email (Insert Name of the person completing the Advanced Funeral Plan) and they can change it at <a href="http://www.ezifunerals.com.au" target="_blank"  style="color:#000;">www.eziFunerals.com.au</a>
            </p>
            <p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Thank you!</p></ul>
			<p style="margin:0;color:#666;font:bold 14px Arial, Helvetica, sans-serif;">Need further assistance?</p>
        
     <p style="margin:0;font:normal 14px Arial, Helvetica, sans-serif;">If you need further assistance please visit our <a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank">help desk</a> or simply <a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">contact us</a></p></td>
        </tr>
		
		<tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">
Sincerely,<br />
              <strong>The eziFunerals Team</strong><br />
<a href="http://www.ezifunerals.com.au/" target="_blank" style="color:#04A3B4;">www.ezifunerals.com.au</a>
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