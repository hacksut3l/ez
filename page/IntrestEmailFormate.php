
<?php include "../MailConfig.php"; 
	//$to       = 'greencubestest@gmail.com';
	
	$Em1 = 'sam@ezifunerals.com.au'; 
	$Em2 = 'support@ezifunerals.com.au'; 
	
	
	$to = array();
	$to[] = $Em1;
	$to[] = $Em2;

	
	$subject  = "Registration of Interest!";
	$header   = "peter@ezifunerals.com.au' => 'eziFunerals"; 
	$msg      = '<table>
	<tr><th style="float:left; padding-bottom:15px;">Customer Details</th></tr>
	<tr><td style="float:left; padding-bottom:12px;">Name : </td><td>'.$_POST['name'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Business Name : </td><td>'.$_POST['BussnessName'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Business Type : </td><td>'.$_POST['BussnessType'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Position : </td><td>'.$_POST['Position'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Email : </td><td>'.$_POST['Email'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Contact Method : </td><td>'.$_POST['ContactMethod'].'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Contact Number : </td><td>'.$_POST['ContactNumber'].'</td></tr>
</table>';

foreach ($to as $to)
{

		$send=email("eziFunerals",$to,$msg,$subject,"No"); 
}	
?>		
		