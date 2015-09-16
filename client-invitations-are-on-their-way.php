<?php 
	
	$to       = $dir_email;
	$subject  = "Your funeral quote request has been sent!";
	//$path=base_url.'/atneed/Pdf_Uploads/'; 
	
	$headers = "peter@ezifunerals.com.au' => 'eziFunerals";
	$msg      ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>eziFunerals</title>

</head>

<style type="text/css">
a:hover{color:#00A3B4 !important;}

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

            <td colspan="4" style="font:bold 19.5px Arial, Helvetica, sans-serif; color:#009aad; width:100%;"><p style=" text-align:center;">Your funeral request is on its way!</p> <!--<span style="color:#009aad;"><?php //echo $name;?></span>-->
			<p style="font:bold 18px Arial, Helvetica, sans-serif; color:#666;">Hello&nbsp;<span style="">'.$client_name.',</span></p></td>

          </tr>

          <tr>

            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;"><p>

			  Thank you for using eziFunerals.<br/>
			  Your funeral quote request has been sent to:'.$director_business.'<br />

              </p>

              <p style="color:#666;"><strong>What happens next?</strong></p>

              <p>Funeral Directors, you have invited to quote, will contact you direct to discuss your funeral needs and help you at this very difficult time.</p>
			  <p>To get the most from our site, it is recommended that you get at least three written quotes before selecting a Funeral Director thats right for you.</p>

            <tr>  
            <td colspan="4" style="font:bold 14px Arial, Helvetica, sans-serif; color:#666;"><p style="margin:0;">Need further assistance?</p>
			<p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">If you need further assistance please visit our <a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank">help desk</a> or simply <a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">contact us</a></p></td>
        </tr>
		
		<tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Thanks again for using eziFunerals!<br />
</td>
          </tr>
		
		
          <tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Sincerely,<br />
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

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:eziFunerals'. "\r\n";
 
   mail($to,$subject,$msg,$headers);
   
   
 ?>


