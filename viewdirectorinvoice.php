<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>

.p-sub{

	text-align:justify; 

	padding:0px 10px 10px 10px;

	line-height:18px;

	font-size:14px;
	
	

}
label {
    font-size: 12px;
}

.hide-div{

	width:960px;

	float:left;

	margin-top:20px;

}
span {
    margin-right: 10px;
    font-family:Arial, Helvetica, sans-serif;
}



</style>

<link href="css/Old_Include_Css/style1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/Old_Include_Css/reveal.css">


</head>

<body>
<?php
	
	include_once'include/config.php';
	//include 'include/main_header.php';
	
	
?>
<style>


table th { border:solid 1px #999999; padding:5px; width:180px;}



</style>

					
                    

<div class="container">


	

		<table class="voice_all" style="margin:15px 0px 0px 40px;">
					<tr>
						<th><div class="name-full voice1">Date</div></th>
						<th><div class="name-full voice1">Receipt No</div></th>
						<th><div class="name-full voice1">Print</div></th>
						
				   		

				    </tr>									

<?php

	
	//fetch data for view quotes...................
	
	$sel="select * from director_member_info where director_id='".$_SESSION['person_id']."' order by d_date DESC LIMIT 1";
	$rel=mysql_query($sel);
	
	
	$count=mysql_num_rows($rel);
	
	if($count != '0')
	{	
	
	for($i=1;$i<=$count;$i++)
	
	
	{
		$row=mysql_fetch_array($rel);


?>

					
					<tr>
						<td><div class="name-full"><center><?php echo date('d-M-y',strtotime($row['d_date']));?></center></div></td>
						<td><div class="name-full"><center><?php echo $row['receipt_no'];?></center></div></td>
						<td><div class="name-full"><center><a href="print_director_invoice.php?id=<?php echo $row['receipt_no']; ?>" target="_blank"><input type="button" name="Print" class="login_button" value="Print" style="height:20px; width:80px; margin:3px 0px 3px 45px; padding:0px; font-size:12px;" /></a></div></td>
						
				   		
				    </tr>
					
					
					
<?php
	
	}
	
	}
	else
	{
	
?>
	
					<tr>
								<td><center><?php  echo 'No Record';?></center></td>
								<td><center><?php  echo 'No Record';?></center></td>
								<td><center><?php  echo 'No Record';?></center></td>
								
					
					</tr>
	
	
	
<?php 
	
	}

?>	
	
	
					</table>

</div>




<?php //include_once 'include/main_footer1.php'; ?>
</body>
</html>



