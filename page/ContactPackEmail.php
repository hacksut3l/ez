<?php  include "../MailConfig.php";  $i= 0; ?>

<?php
if($i == '0')
{
		if(isset($_POST['ClientCheck']) && $_POST['ClientCheck'] != "" ) { $bk = $_POST['ClientCheck']; } else { $bk = 'No'; }
	//$to       = 'greencubestest@gmail.com';
	
	$Em1 = 'support@ezifunerals.com.au'; 
	$Em2 = 'sam@ezifunerals.com.au';  

	
	$to = array();
	$to[] = $Em1;
	$to[] = $Em2;
	
	
	
	$subject = "Customer Enquiry!";
	$header   = "peter@ezifunerals.com.au' => 'eziFunerals"; 
	$msg      = '
<table>
	<tr><th style="float:left; padding-bottom:15px;">Customer Details</th></tr>
	<tr><td style="float:left; padding-bottom:12px;">Name : </td><td>'.$_REQUEST['name'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Email : </td><td>'.$_REQUEST['email'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Contact : </td><td>'.$_REQUEST['mob'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Message : </td><td>'.$_REQUEST['mess'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">What would you like to do? : </td><td>'.$_REQUEST['like'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Where did you hear about us  : </td><td>'.$_REQUEST['about'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">I am an existing client of eziFunerals.  : </td><td>'.$bk.'</td></tr>
	</table>
	';
	
	
foreach ($to as $to)
{

		$send=email("eziFunerals",$to,$msg,$subject,"No"); 
}	
		
		
}

?>		
		
		
		
<?php $j = 0;
if($j == '0')
{
	$to       = $_REQUEST['email'];

	
	$subject = "Thank you for your interest!";
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
p{ padding:0px;}
</style>
<body>
<div style="width:600px; margin:0 auto;">
<table width="100%" border="0" cellpadding="0" style="border: 1px solid rgb(102, 102, 102);">
  
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%" style="background:#fff;">
    	<table width="100%" border="0" cellpadding="10">
          <tr>
  
    <td colspan="4" style=" padding-bottom:5px;"><a href="http://ezifunerals.com.au"  style="color:#000;" target="_blank"><img style="display:block;" src="'.base_url.'emailImages/image001.jpg" alt="Logo" /></a></td>
  
  </tr>
          <tr >
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;"><b style="color:#009aad; font-size:22px;">Thank you for your interest in eziFunerals</b><br/><br/>
             
Your enquiry has been received and a member of our team will be in contact with you shortly.<br/><br/>
            In the meantime, why not try our service?<br/>
Simply sign up now, it only takes a minute or two!<br/>
         Once your sign up is complete, you can start to explore our online funeral planning services which will help your clients: 
          <ul style="list-style:decimal">

                 <li><a href="'.base_url.'organise_funerals.php" style="color:#009aad;">Organise a funeral online</a></li>

                 <li><a href="'.base_url.'find-funeral-director.php" style="color:#009aad;">Find a Funeral Director</a></li>

                 <li><a href="'.base_url.'page/how-it-works" style="color:#009aad;">Request Custom Quotes</a></li>

 				<li><a href="'.base_url.'page/how-it-works" style="color:#009aad;">Compare Prices</a></li>
				
					<li><a href="'.base_url.'find-funeral-director.php" style="color:#009aad;">Select the right Funeral Director</a></li>
                 </ul>
        <p style="margin:0;font:bold 14px Arial, Helvetica, sans-serif; color:#666;">Need further assistance?</p>
		<p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">If you need more information please visit our <a href="https://ezifunerals.zendesk.com/hc/en-us">help desk</a> or simply <a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">contact us</a></p>
		<p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Sincerely,</p>
              <strong>The eziFunerals Team</strong><br />
<a href="http://www.ezifunerals.com.au/" target="_blank" style="color:#04A3B4;">www.ezifunerals.com.au</a>
<p style="padding-bottom:10px;font:12px/15px Arial, Helvetica, sans-serif; color:#666;">Need help?|<a href="https://ezifunerals.zendesk.com/hc/en-us" target="_blank">Help Desk</a>|<a href="'.base_url.'page/contact-us" target="_blank" style="color:#000;">Contact Us</a>|<a href="'.base_url.'page/terms-of-use" target="_blank" style="color:#000;">Terms of Service</a>|<a href="'.base_url.'page/privacy-policy" target="_blank" style="color:#000;">Privacy Policy</a>|All Rights Reserved.<br/><br/>
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
	
	
}
$i ++; $j++;
?>		
				