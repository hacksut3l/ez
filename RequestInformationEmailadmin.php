



<?php
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

	//$to       = 'greencubestest@gmail.com';
	$to = 'support@ezifunerals.com.au';  
	
	$subject  = "Information Guide Request!";
	$header   = "peter@ezifunerals.com.au' => 'eziFunerals"; 
	$msg      = '
<table>
	<tr><th style="float:left; padding-bottom:15px;">Customer Details</th></tr>
	<tr><td style="float:left; padding-bottom:12px;">Name of Guide : </td><td>'.$file.'</td></tr>
	<tr><td style="float:left; padding-bottom:12px;">Email : </td><td>'.$_POST['email'].'</td></tr>
	
</table>';
		$send=eemail("eziFunerals",$to,$msg,$subject,"No"); 

?>		
		