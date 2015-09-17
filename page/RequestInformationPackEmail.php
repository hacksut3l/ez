
<?php include "../MailConfig.php"; 
	//$to       = 'greencubestest@gmail.com';
	
	$Em1 = 'sam@ezifunerals.com.au'; 
	$Em2 = 'support@ezifunerals.com.au';  
	
	$to = array();
	$to[] = $Em1;
	$to[] = $Em2;
	
	
	$subject  = "Request an Information Pack Enquiry";
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
    <td colspan="3" style=" padding-bottom:5px;"><a href="#"  style="color:#000;"><img style="display:block;" src="http://www.ezifunerals.com.au/emailImages/image001.jpg" alt="Logo" /></a></td>
  
  </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" style="background:#fff;">
    	<table width="100%" border="0" cellpadding="10">
          
          <tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;"><b style="color:#009aad; font-size:22px;">Request an Information Pack Enquiry For eziFunerals</b><br/>
              <br />
You have Request an Information Pack enquiry has been received and a member of our team will be  contact with you shortly.<br/></td>
          </tr>
         
          
          
          <tr>
          <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">
       Request Information Pack interest Details given by below: 
          <ul>

                <li><label style="color:#009aad;">Request Information Pack Email : '.$_POST['RequestEmail'].'</label>
				


           
          </ul>
          </td>
          </tr>
          
          <!--<tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Thanks for joining eziFunerals!
</td>
          </tr>-->
          
        
            
          <tr>
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Sincerely,<br />
              <strong>The eziFunerals Team</strong><br />
<a href="http://www.ezifunerals.com.au/" target="_blank" style="color:#04A3B4;">www.ezifunerals.com.au</a>
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
</html>	';

foreach ($to as $to)
{

		$send=email("eziFunerals",$to,$msg,$subject,"No"); 
}	
?>		
		