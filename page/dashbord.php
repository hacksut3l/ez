
<?php
	
	include_once'../include/config.php';	

if($_SESSION['type']=='client')
{ 
 
 $sel="select * from clients where id='".$_SESSION['person_id']."'";
	 $rel=mysql_query($sel);
	 $row=mysql_fetch_array($rel);
	
	if($row['plan']==1)
	{
		$plan="Basic";
	}
	else if($row['plan']==2)
	{
		$plan="Direct";
	}
	else if($row['plan']==3)
	{
		$plan="Advance";
		
	}
?>
<div class="container">
<br/><br/><br/><br/><br/><br/><br/><br/><br/><h3 style="color:#1889c1;">WelCome:<?php echo $_SESSION['name'];?></h3><h3 style="margin-top:-30px;margin-left:-20px; margin-right:111px;float:right; color:#1889c1;">Active Plan:<?php echo $plan; ?></h3><br/>

	<table style="font-size:15px; margin-left:75px;">
			<tr >
				
				<td style="padding-left:25px;"><a href="../client_information.php"><center><img src="../images/account.png" width="60px" height="60px" /><br/>MyAccount</center></a></td>
				<td style="padding-left:25px;"><a href="../pages/HowItWorksForClients.php#plan"><center><img src="../images/done5.png" width="60px" height="60px" /><br/>My Plan</center></a></td>
				
					<td style="padding-left:25px;"><a href="../viewquotes.php"><center><img src="../images/done6.png" width="60px" height="60px" /></br>My Quotes</center></a></td>
				<td style="padding-left:25px;"><a href="../post-your-plan.php"><center><img src="../images/done2.png" width="60px" height="60px" /></br>Add Quotes</center></a></td>
				<td style="padding-left:25px;"><a href="../viewpdf.php"><center><img src="../images/done4.png" width="60px" height="60px" /></br>My PlanPdf</center></a></td>
				<td style="padding-left:25px;"><a href="../logout.php"><center"><img src="../images/done3.png" width="60px" height="60px" /></br>&nbsp;Logout</center></a></td>
			</tr>
			
	</table>
</div>
<?php

	}
	else
	{
	
	$sel="select * from directors where id='".$_SESSION['person_id']."'";
	 $rel=mysql_query($sel);
	 $row=mysql_fetch_array($rel);
	
	if($row['user_type']==1)
	{
		$plan="Basic";
	}
	else if($row['user_type']==2)
	{
		$plan="Standard";
	}
	else if($row['user_type']==3)
	{
		$plan="Premium";
		
	}
	
	
	
	
?>
<div class="container">
<br/><br/><br/><br/><br/><br/><br/><br/><br/><h3 style="color:#1889c1;">WelCome:<?php echo $_SESSION['name'];?></h3><h3 style="margin-top:-30px;margin-left:-20px; margin-right:111px;float:right; color:#1889c1;">Active Plan:<?php echo $plan; ?></h3><br/>

<table style="font-size:15px; margin-left:200px;">
			<tr >
				
				<td style="padding-left:25px;"><a href="../edit-information.php"><center><img src="../images/account.png" width="60px" height="60px" /><br/>MyAccount</a></center></td>
				<td style="padding-left:25px;"><a href="HowItWorksForDirectors.php"><center><img src="../images/done5.png" width="60px" height="60px" /><br/>My Plan</a></center></td>
				<td style="padding-left:25px;"><a href="../viewrequest.php"><center><img src="../images/done6.png" width="60px" height="60px" /></br>View Request</a></center></td>
				<td style="padding-left:25px;"><a href="../logout.php"><center"><img src="../images/done3.png" width="60px" height="60px" /></br>&nbsp;&nbsp;Logout</a></center></td>
				
			</tr>
			
	</table>
</div>
<?php

	}	
?>	
	
		
		