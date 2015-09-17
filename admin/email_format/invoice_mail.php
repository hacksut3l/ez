<?php

	$to = $dir_email;
	$subject  = "monthly Invoice";
	$header   = "peter@ezifunerals.com.au' => 'eziFunerals"; 
	$pdf=$pdfname;
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
    <td colspan="3" style=" padding-bottom:5px;"><a href="#"  style="color:#000;">
      <img style="display:block;" src="'.base_url.'emailImages/image001.jpg" alt="Logo" /></a></td>
  
  </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" style="background:#fff;">
    	<table width="100%" border="0" cellpadding="10">
          
           <tr>
            <td style="font:18px Arial, Helvetica, sans-serif; color:#666; ">Dear   <span style="color:#666;">'.ucwords($name).',</span></td>
          </tr>
<tr>
            <td style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;"> 
Please find attached current invoice for your <span style="color:#009aad;">eziFunerals service.</span><br /><br />

This pdf contains a detailed breakdown of all charges related to your account.<br /><br />

We would like to thank you for your continued business.<br /><br />

If you have any further questions regarding this email, please contact eziFunerals Accounts & Billing Team at 
<a href="mailto:accounts@ezifunerals.com.au" target="_top" style="color:#009aad;">accounts@ezifunerals.com.au.</a>


<br/></td>
          </tr>
  
          <tr>
            <td style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Sincerely,<br />
<b>The EziFunerals Team</b><br />
<a href="'.base_url.'" target="_blank" style="color:#009aad;">www.ezifunerals.com.au</a>
</td>
          </tr>
       
          <tr> 
		  <td style=" padding-bottom:10px;font:11px/15px Arial, Helvetica, sans-serif; color:#666;"><p>Need help?&nbsp;
            <a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">Contact Us</a>&nbsp;|&nbsp;
            <a href="'.base_url.'page/terms-of-use" target="_blank" style="color:#000;">Terms of Service</a>&nbsp;|&nbsp;
            <a href="'.base_url.'page/privacy-policy" target="_blank" style="color:#000;">Privacy Policy</a>&nbsp;|&nbsp;All Rights Reserved.<br/>
             &copy; 2014 eziFunerals Pty Ltd.</td>
            
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


$send=email("eziFunerals",$to,$msg,$subject,$pdf,"No"); 
/*if($send = true)
{
	echo 'sucess';
}
else
{
	echo 'error';
}*/
?>