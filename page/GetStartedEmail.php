<?php 	
 include "../MailConfig.php"; 
	//$to       = 'greencubestest@gmail.com';
	
	$Em1 = 'support@ezifunerals.com.au'; 
	$Em2 = 'sam@ezifunerals.com.au'; 

	
	$to = array();
	$to[] = $Em1;
	$to[] = $Em2;
	
	
	
	$subject  = "Partnership Enquiry!";
	$header   = "peter@ezifunerals.com.au' => 'eziFunerals"; 
	$msg      = '
<table>
	<tr><th style="float:left; padding-bottom:15px;">Customer Details</th></tr>
	<tr><td style="float:left; padding-bottom:12px;">Name : </td><td>'.$_POST['Name'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Business Name : </td><td>'.$_POST['PracticeName'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Contact Number : </td><td>'.$_POST['ContactNumber'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">What areas are you interested in? : </td></tr>
	<tr><td style="float:left; padding-bottom:12px;"><ul>'; 
				
				if(isset($_POST['Lists']))
				{
					$Intrest = $_POST['Lists'];
					
					foreach($Intrest as $Intrest)
					{
						
					$msg.='<li>--->>>> '.$Intrest.'</li>';
					}
				}
				
				


           
        $msg.='</ul></td></tr>
	
</table>';

foreach ($to as $to)
{

		$send=email("eziFunerals",$to,$msg,$subject,"No"); 
}	
		
		
	

?>

	