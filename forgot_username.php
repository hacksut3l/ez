<?php include "./MailConfig.php"; 
 include_once('include/config.php');
 
 $email=$_POST['email'];
 
 
 
if($_POST['user_type'] == 'client')
	{
		
		
		
	echo	$usersql = "SELECT 
						* 
					FROM 
						clients
					WHERE
						email = '".$_POST['email']."'
					";
					
		$userex = mysql_query($usersql);
	
		$users = mysql_fetch_array($userex);
		
		$name = $users['first_name'];
		
		$username=$users['username'];
		
	}
	else
	{
		
		$usersql = "SELECT 
						* 
					FROM 
						directors
					WHERE
						email = '".$_POST['email']."'
					";
					
		$userex = mysql_query($usersql);
		
		$users = mysql_fetch_array($userex);
		
		$name = $users['full_name'];
		
		$username=$users['username'];
	}
 
 
	
	$to       = $email;
	$subject  = "eziFunerals:Username Reset";
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
    <td colspan="3" style=" padding-bottom:5px;"><a href="#"  style="color:#000;"><img style="display:block;" src="<?php echo base_url;?>emailImages/image001.jpg" alt="Logo" /></a></td>
  </tr>
          <tr>
            <td colspan="4" style="font:bold 18px Arial, Helvetica, sans-serif; color:#666;"><strong>Hello&nbsp;</strong> <span style="color:#009aad;">'.ucwords($name).',</span>
			<p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">We have sent this mail because you requested your eziFunerals username.</p>
            <span style="float:left; width: 100%;color:#009AAD;font:14px/20px Arial, Helvetica, sans-serif;">Username :&nbsp;'.$username.'</span><br/>	
    <p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Thank you for using eziFunerals!</p><p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">If you need more help getting started or require further support, <a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">Contact Us</a></p>
	<p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Sincerely,<br /><br />
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
</html>';
		$send=email("eziFunerals",$to,$msg,$subject,"No");		   
		
	if ($email!='')
	
		echo 1;
	
	else
	
		echo 2;		   
?>	