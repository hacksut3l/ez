<?php 
	
	
	 $to       = $_POST['Email'];
	$subject  = "Thank you for your interest!";
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
<table width="100%" border="0" cellpadding="0" style="border: 1px solid rgb(102, 102, 102);">
  
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" style="background:#fff;">
    	<table width="100%" border="0" cellpadding="10">
          <tr>
    <td colspan="3" style=" padding-bottom:5px;"><a href="http://ezifunerals.com.au"  style="color:#000;" target="_blank"><img style="display:block;" src="'.base_url.'emailImages/image001.jpg" alt="Logo" /></a></td>
  
  </tr>
          <tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;"><b style="color:#009aad; font-size:22px;">Thank you for your interest in eziFunerals</b><br/>
              <br />
Your request has been received and a member of our team will be in contact with you 

shortly.</td>
          </tr>
         <tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">
In the meantime, why not try our service?
<br/>
Simply sign up now, it only takes a minute or two!
<br/>Once your sign up is complete, you can start to explore our online funeral planning 

services which will help your clients:</td>
          </tr>
		  
          
           <tr>
            <td colspan="4" style="font:bold 18px Arial, Helvetica, sans-serif; color:#666; padding:0;">
                <ul style="font:14px/20px Arial, Helvetica, sans-serif; color:#666; margin:0; list-style:decimal">
          <li><a href="'. base_url.'organise_funerals.php" target="_blank" style="color:#666;">Organise a funeral online</a></li>
                    <li><a href="'.base_url.'find-funeral-director.php" target="_blank" style="color:#666;">Find a Funeral Director</a></li>
                    <li><a href="'.base_url.'page/how-it-works" target="_blank" style="color:#666;">Request Custom Quotes</a></li>
					 <li><a href="'.base_url.'page/how-it-works" target="_blank" style="color:#666;">Compare Prices</a></li>
					  <li><a href="'.base_url.'find-funeral-director.php" target="_blank" style="color:#666;">Select the right Funeral Director</a></li> 
					 </ul>
            </td>
          </tr>
          
          <!--<tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Thanks for joining eziFunerals!
</td>
          </tr>-->
          
        
          
          <tr>  
            <td colspan="4" style="font:bold 14px Arial, Helvetica, sans-serif; color:#666;"><p style="margin:0;">Need further assistance?</p></td>
            
            </tr>
  
        <tr>
        <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">If you need further assistance please visit our <a href="#">help desk</a> or simply <a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">contact us</a></td>
        </tr>
		
		<tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Thanks again for using eziFunerals!<br /><br/>
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
</table>';

$send=email("eziFunerals",$to,$msg,$subject,"No");

?>

