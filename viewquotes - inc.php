
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


<?php
	
	include_once'include/config.php';
	//include 'include/main_header.php';
	
	
?>
<style>


table th { border:solid 1px #999999; padding:5px; width:135px;}



</style>

					
                    

<div class="container" style="margin-top:10px;">
				
					
				<table>
					<tr>
						<th scope="col">Date</div></th>
						<th scope="col">Funeral Director Name</div></th>
						<th scope="col">View Profile</div></th>
						<th scope="col">Delete Profile</div></th>
				   		

				    </tr>


					
					
			 
				
									

<?php

	
	//fetch data for view quotes...................
	
	if(isset($_GET['id']))
	{
	
		$delete_data="UPDATE `invite` SET client_view='deactive' WHERE invite_id='".$_GET['id']."'";
		$result_datate=mysql_query($delete_data);
		
	?>
		
		<script type="text/javascript">
		
			alert('Your Quotes Delete Sucessfully');
			
			window.location="client_dashboard.php";
			
		</script>
		
		
	<?php	
		
	
	}
	
	
	$sel="select * from invite where invite_from='".$_SESSION['client']."' AND client_view='active' order by invite_id DESC";
	$rel=mysql_query($sel);
	$row_of_info=mysql_num_rows($rel);
	
	if($row_of_info > 0)
	{
	
	for($i=1;$i<=$row_of_info;$i++)
	{
		$row=mysql_fetch_array($rel);


	$director_details="select * from directors where id='".$row['invite_to']."'";
	$rel_of_director_details=mysql_query($director_details);
	$row_of_director_details=mysql_fetch_array($rel_of_director_details);

	if($i%2==0)
	{
	
?>

					
					<tr style="background:#eee;">
						<td><div class="name-full"><center><?php echo date('d-M-y',strtotime($row['date']));?></center></div></td>
						<td><div class="name-full"><center><?php echo $row_of_director_details['business_name'];?></center></div></td>
						<td><div class="name-full"><center><a href="#<?php echo $row['invite_to']; ?>" id="<?php echo $row['invite_to']; ?>"><input type="button" name="view" class="login_button" value="view" style="height:20px; width:80px; margin:3px 0px 3px 45px; padding:0px;" /></a></center></div></td>
				   		<td><div class="name-full"><center><a href="client_dashboard.php?id=<?php echo $row['invite_id']; ?>"><input type="button" name="view" class="login_button" value="Delete" style="height:20px; width:80px; margin:3px 0px 3px 45px; padding:0px;" /></a></center></div></td>
						
				    </tr>
		<?php	
		}
		else
		{
		?>	
		
					<tr style="background:#FFFFFF;">
						<td><div class="name-full"><center><?php echo date('d-M-y',strtotime($row['date']));?></center></div></td>
						<td><div class="name-full"><center><?php echo $row_of_director_details['business_name'];?></center></div></td>
						<td><div class="name-full"><center><a href="#<?php echo $row['invite_to']; ?>" id="<?php echo $row['invite_to']; ?>"><input type="button" name="view" class="login_button" value="view" style="height:20px; width:80px; margin:3px 0px 3px 45px; padding:0px;" /></a></center></div></td>
				   		<td><div class="name-full"><center><a href="client_dashboard.php?id=<?php echo $row['invite_id']; ?>"><input type="button" name="view" class="login_button" value="Delete" style="height:20px; width:80px; margin:3px 0px 3px 45px; padding:0px;" /></a></center></div></td>
						
				    </tr>
		
		
			
	<?php 		
	
		}
					
	?>						
					
					
					<a href="#x" class="overlay" id="<?php echo $row['invite_to']; ?>"></a>	
					
					 <div class="popup">
					 
					 <div class="row">

						<div class="col-md-5">	
		
		
		<center><img src="<?php echo base_url;?>uploads\director_profile_pics\<?php echo $row_of_director_details['image']; ?>" width="140px;" height="150px;"/></center>
		<br />		
<?php
		//serach the funeral director details...................
		echo'<label><b>Business Name:-</b></label>'.$row_of_director_details['business_name'];
		echo '<br>';
		echo '<label><b>Phone No:-</b></label>'.$row_of_director_details['phone'];
		echo '<br>';
		echo '<label><b>Email Address:-</b></label>'.$row_of_director_details['email'];
		echo '<br>';
			
		
					
?>		
						</div>
					</div>
					<a class="close" href="#close"></a>
						
			</div>	
	
					
					
<?php
	
	}
	
	}
	else{
	
?>	
	
	<tr>
								<td><center><?php  echo 'No Record';?></center></td>
								<td><center><?php  echo 'No Record';?></center></td>
								<td><center><?php  echo 'No Record';?></center></td>
								<td><center><?php  echo 'No Record';?></center></td>
						
				    </tr>
	
	
<?php 	
	}
?>
					</table>
<br/>
</div>




