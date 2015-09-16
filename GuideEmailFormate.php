
<?php
	
	 
	//$to       = 'greencubestest@gmail.com';
//	$file='test.pdf';
	$to = $_POST['email'];
	
	
	$subject  = "Your eziFunerals Information Guide";
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
            <td colspan="4" style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;"><b style="color:#009aad; font-size:22px;">eziFunerals Information Guide</b><br/>
              <br />
Thank you for requesting information about the eziFunerals online planning services.<br/><br/>

Please find attached our PDF brochure.<br />

For any further questions, or if you would like to sign up, please contact us.
				<p style="font:14px/20px Arial, Helvetica, sans-serif; color:#666;">Sincerely,</p>
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
		
	$url=$_POST['Redirecturl'].'#contact';
	$pagename=$_POST['pagename'];
	
	if($pagename=='aged-care.php')
	{
		$file="eziFunerals_AgedCare.pdf";
	}
	 if($pagename=='insurance-companies.php')
	{
		$file="eziFunerals_Insurance.pdf";
	
	}
	 if($pagename=='employers.php')
	{
		$file="eziFunerals_Employers.pdf";
	
	}
	 if($pagename=='funeral-directors.php')
	{
		$file="ezifunerals_FDKit.pdf";
	
	}
	 if($pagename=='advertisers.php')
	{
		$file="ezifunerals_FDKit.pdf";
	
	}
	 if($pagename=='organise_funerals.php')
	{
		$file="eziFunerals_ArrangingAFuneral.pdf";
	
	}
	 if($pagename=='how-it-works.php?type=client')
	{
		$file="eziFunerals_Funeral_Planning.pdf";
	
	}
	 if($pagename=='how-it-works.php?type=director')
	{
		$file="ezifunerals_FDKit.pdf";
	
	}
	 if($pagename=='find-funeral-director.php')
	{
		$file="eziFunerals_The_Right_FuneralDirector.pdf";
	
	}
	
	
	
	email("eziFunerals",$to,$msg,$subject,$file,"No");

?>

	 <META http-equiv="refresh" content="0;URL=<?php echo $url;?>">
	
		