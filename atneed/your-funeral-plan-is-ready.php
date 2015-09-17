<?php include "../MailConfig1.php"; 
 
	
	$to       = $email;
	$subject  = "Your eziFunerals plan is ready!";
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
            <td colspan="4" style="font:bold 22px Arial, Helvetica, sans-serif; color:#04A3B4; width:100%;  "><p style="margin:0;text-align:center;">Your eziFunerals Direct Plan is ready.</p><p style="margin:0;text-align:center;">Let s put your plan into action! <span style="color:#1f497d;"></span></p>
			<p style="font:18px Arial, Helvetica, sans-serif; color:#000;">Hello&nbsp;<span style="color:#000;">'.ucwords($name).',</span></p>
			<p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Thank you for purchasing your eziFunerals Direct Plan.
			<br/>We understand that this is a difficult time and we are here to help you with the funeral.<br/><br/><strong style="color:color:#000;">What happens next?</strong><br/><br/>To get the most from your plan, we encourage you to:

       
                <ol style="font:14px/20px Arial, Helvetica, sans-serif; color:#666; list-style:decimal">
         
                    <li>Find a Funeral Director in your area</li>
                    <li>Request Custom Quotes</li>
                    <li>Compare Prices</li>
					<li>Select the right Funeral Director at the right prices</li>
                    
                </ol>

                    <strong style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;font-weight:bold">Need further assistance?</strong>
         </p>
 <p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Your FREE copy of&nbsp;<a href="'.base_url.'uploads/What_kind_of_Funeral.pdf" target="_blank" style="color:#04A3B4;">What Kind of Funeral? : A self-help guide to planning a meaningful funeral. </a>is provided with your plan.
 <br/>If you need further assistance please visit our <a  href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank">help desk</a> or simply <a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">contact us</a>
 <br/><br/>Thanks again for using eziFunerals!</p>

<p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Sincerely,<br />
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
