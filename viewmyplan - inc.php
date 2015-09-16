<?php
	
	include_once('../include/config.php');
?>             

<div class="container" style="margin-top:10px;">
				
					
				<table>
					<tr>
						<th scope="col">Deceased Name</th>
						<th scope="col">Gender</th>
						<th scope="col">Age</th>
						<th scope="col">PDF Plan</th>

				    </tr>
					
					<?php 
					$ispdfsql = "SELECT * FROM client_purchase_info WHERE client_id = '".$_SESSION['client']."'";
					$ispdfresult = mysql_query($ispdfsql);
					while ($row = mysql_fetch_assoc($ispdfresult)) {
								
					$sql = "SELECT * FROM  deceased WHERE person_making_id = '".$_SESSION['client']."' ";
					$result = mysql_query($sql);
					$rows = @mysql_num_rows($result);
					$person = mysql_fetch_assoc($result);
	
					?>
					<tr>
						<td> <?php echo $person['f_name'];?> <?php echo $person['m_name'];?> <?php echo $person['l_name'];?> </td>
						<td>  <?php echo $person['gender']; ?> </td>
						<td> <?php echo $person['age']; ?> </td>
						
						<?php
							$path = '/atneed/Pdf_Uploads/';
						?>
						<td><img src="images/1441395579_1-02.png" width="35" height="30" /><a style="color: #0000ff;" href="<?php echo $path.$row['pdf_name']; ?>" download> Download </a> </td>
					</tr>
					<?php } ?>

					</table>
<br/>
</div>




