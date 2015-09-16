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

<script type="text/javascript" src="js/Old_Include_Js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="js/Old_Include_Js/jquery.reveal.js"></script>

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
<br/><br/><br/>

	
<center><font style="font-size:20px; margin-right:0px;">My Invoices</font></center><br />
			<center>	<table>
					<tr>
						<th><div class="name-full">Date</div></th>
						<th><div class="name-full">Plan Type</div></th>
						<th><div class="name-full">Print</div></th>
						
				   		

				    </tr>									

<?php

	
	//fetch data for view quotes...................
	
	$sel="select * from client_purchase_info where client_id='".$_SESSION['client']."'";
	$rel=mysql_query($sel);
	
	while($row=mysql_fetch_array($rel))
	{



?>

					
					<tr>
						<td><div class="name-full"><center><?php echo date('d-M-y',strtotime($row['date']));?></center></div></td>
						<td><div class="name-full"><center><?php echo $row['pdf_type'];?></center></div></td>
						<td><div class="name-full"><center><a href="print_invoice.php?id=<?php echo $row['receipt_no']; ?>"><input type="button" name="Print" class="login_button" value="Print" style="height:20px; width:80px; margin:3px 0px 3px 45px; padding:0px; font-size:12px;" /></a></div></td>
						
				   		
				    </tr>
					
					
					
<?php
	
	}
?>
					</table></center>
<br/><br/><br/><br/><br/><br/>
</div>




<?php //include_once 'include/main_footer1.php'; ?>
</body>
</html>



