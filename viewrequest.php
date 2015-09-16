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

<!--<script type="text/javascript" src="js/Old_Include_Js/jquery-1.4.1.min.js"></script>-->
<script type="text/javascript" src="js/Old_Include_Js/jquery.reveal.js"></script>

</head>

<body>
<?php
	
	//include_once'include/config.php';
	//include 'include/main_header.php';
	
	
?>
<style>


table th { border:solid 1px #FFFFFF; padding:5px; width:180px; background-color:#00a3b4!important; color:#FFFFFF !important;}



</style>

					
                    

<div class="container">


	

				
				<table style="margin:0px 250px 0px 0px;" class="voice_all">
					<tr>
						<th><div class="name-full voice1">Date</div></th>
						<th><div class="name-full voice1">Client Name</div></th>
						<th><div class="name-full voice1">Contact Method</div></th>
						<th><div class="name-full voice1">View Profile</div></th>
						
				   		

				    </tr>


					
					
			 
				
									

<?php
//echo $_SESSION['person_id'];exit;
	
	//fetch data for view quotes...................
	
	$sel="select * from invite where invite_to='".$_SESSION['person_id']."' order by invite_id DESC";
	$rel=mysql_query($sel);
	$count=$row_of_infom=mysql_num_rows($rel);
	if($count != '0')
	{	
	
	for($i=1;$i<=$count;$i++)
	{
		
		
		$row=mysql_fetch_array($rel);
	

	$director_details="select * from clients_pdf where client_id='".$row['invite_from']."'";
	$rel_of_director_details=mysql_query($director_details);
	$row_of_director_details=mysql_fetch_array($rel_of_director_details);
	
	$client_details="select * from clients where id='".$row['invite_from']."'";
	$rel_of_client_details=mysql_query($client_details);
	$row_of_client_details=mysql_fetch_array($rel_of_client_details);
		
		if($i%2==0)
		{
		
?>

					
					<tr style="background:#eee;">
						<td><div class="name-full"><center><?php echo date('d-M-y',strtotime($row['date']));?></center></div></td>
						<td><div class="name-full"><center><?php echo $row_of_director_details['name'];?></center></div></td>
						<td><div class="name-full"><center><?php echo $row_of_director_details['method'];?></center></div></td>
						<td><div class="name-full"><center><a href="#<?php echo $row['invite_from']; ?>" id="<?php echo $row['invite_from']; ?>"><input type="button" name="view" class="login_button" value="view" style="height:20px; width:80px; margin:3px 0px 3px 45px; padding:0px;" /></a></div></td>
						
				   		
			    </tr>
<?php	
		}
		else
		{
?>		
							
					<tr style="background:#FFFFFF;">
						<td><div class="name-full"><center><?php echo date('d-M-y',strtotime($row['date']));?></center></div></td>
						<td><div class="name-full"><center><?php echo $row_of_director_details['name'];?></center></div></td>
						<td><div class="name-full"><center><?php echo $row_of_director_details['method'];?></center></div></td>
						<td><div class="name-full"><center><a href="#<?php echo $row['invite_from']; ?>" id="<?php echo $row['invite_from']; ?>"><input type="button" name="view" class="login_button" value="view" style="height:20px; width:80px; margin:3px 0px 3px 45px; padding:0px;" /></a></div></td>
				   		
			    </tr>
	
<?php 		
	
		}
					
?>					
					<a href="#x" class="overlay" id="<?php echo $row['invite_from']; ?>"></a>	
		
		<div class="popup">
					 
			<div class="row">

				<div class="col-md-5">				 
					 
					 
		
		<center><img src="<?php echo base_url;?>uploads/clients_profile_pics/<?php echo $row_of_client_details['image'];?>" width="140px;" height="150px;"/></center>
		<br />		
<?php
		//serach the funeral director details...................
		echo'<label><b>Client Name:-</b></label>'.$row_of_director_details['name'];
		echo '<br>';
		echo '<label><b>Phone No:-</b></label>'.$row_of_director_details['contact_no'];
		echo '<br>';
		
		echo '<label><b>Funeral service:-</b></label>'.$row_of_director_details['funeral_service'];
		echo '<br>';
		
		echo '<label><b>Budget:-</b></label>'.$row_of_director_details['budget'];
		echo '<br>';
			
		
					
?>		
					</div>
				</div>
					<a class="close" href="#close"></a>
						
			</div>
					
					
<?php
	
	}
	
	}
	else
	{
	
?>
					<tr style="background:#eee;">
								<td><center><?php  echo 'No Record';?></center></td>
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



