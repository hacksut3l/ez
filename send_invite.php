<?php 
	

	$to       = $dir_email;
	$subject  = "You have received a funeral quote request!";
	//$path=base_url.'/atneed/Pdf_Uploads/'; 
	
	$header = "peter@ezifunerals.com.au' => 'eziFunerals";
	$pdf = $pdfname;
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
<table width="100%" border="0" cellpadding="0" style="border: 1px solid rgb(102, 102, 102);">

  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" style="background:#fff;">
    	<table width="100%" border="0" cellpadding="10">
		  <tr>
   <td colspan="3" style=" padding-bottom:5px;"><a href="http://ezifunerals.com.au"  style="color:#000;" target="_blank"><img style="display:block;" src="'.base_url.'emailImages/image001.jpg" alt="Logo" /></a></td>
  
  </tr>
          <tr>
            <td colspan="4" style="font:bold 24px Arial, Helvetica, sans-serif; color:#04A3B4; width:100%; "><p style="margin:0;text-align:center; ">You have received a funeral request</p>
			<p style="font:18px Arial, Helvetica, sans-serif; color:#000;">Hello&nbsp;<span style="color:#000;">'.ucwords($client_name).',</span></p>
			<p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">
            <strong>Person Making Arrangements:</strong><br/>
			Name:'.$client_name.'<br/>Contact Number:'.$client_phone.'<br/>Email:'.$client_email.'</p>
         	<p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">
            <strong>Funeral service required:</strong><br/>
			'.$service_required.'</p>
         
           <p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">
            <strong>Reason for Funeral quote</strong><br/>
			'.$reason.'</p>
         <p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">
            <strong >Funeral Budget</strong><br/>
           '.$budget.'</p>
         <p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">
            <strong>Funeral Plan attached for Quotation</strong><br/>
            Find the Attachment<br/><br/>
			<strong style="font:14px/20px Arial, Helvetica, sans-serif; color:#666; font-weight:bold">Our Client needs to select a Funeral Director NOW and is waiting to hear from you.</strong><br/><br/>
			<strong style="font:14px/20px Arial, Helvetica, sans-serif; color:#666; font-weight:bold">Need further assistance?</strong>
			<br/>If you need further assistance please visit our <a href="#">help desk</a> or simply <a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">contact us</a><br/><br/>
			Thanks you for using eziFunerals.
			<br/><br/>Sincerely,<br />
              <strong>The eziFunerals Team</strong><br />
<a href="http://www.ezifunerals.com.au/" target="_blank" style="color:#04A3B4;">www.ezifunerals.com.au</a></p>

<p style=" padding-bottom:10px;font:12px/15px Arial, Helvetica, sans-serif; color:#666;">Need help?|<a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank">Help Desk</a>|<a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">Contact Us</a>|<a href="'.base_url.'page/terms-of-use" target="_blank" style="color:#000;">Terms of Service</a>|<a href="'.base_url.'page/privacy-policy" target="_blank" style="color:#000;">Privacy Policy</a>|All Rights Reserved.<br/><br/>
             &copy; 2015 eziFunerals Pty Ltd.</td>
            


          </tr>
            
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
/*$attachment = chunk_split(base64_encode($pdfdoc));
 
// main header (multipart mandatory)

$headers  = "MIME-Version: 1.0"; 
$headers .= "Content-Type: multipart/mixed;"; 
$headers .= "Content-Transfer-Encoding: 7bit";
$headers .= "This is a MIME encoded message.";
// message

$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";
$headers .= "Content-Transfer-Encoding: 8bit";

// attachment

$headers .= "Content-Type: application/octet-stream; name=\"".$pdfname."\""; 
$headers .= "Content-Transfer-Encoding: base64";
$headers .= "Content-Disposition: attachment";
$headers .= $attachment;*/
//$mail->AddStringAttachment($pdfname, 'base64', 'application/octet-stream');



//$send=email("eziFunerals",$to,$subject,$headers,$msg,""); 
$send=email("eziFunerals",$to,$msg,$subject,$pdf,"No"); ?>
