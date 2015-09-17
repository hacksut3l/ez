<?php
	ob_start();
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('../include/inside_header.php');
		include('../include/side_bar.php');	
		
		
		if($_GET['id'])
		{
		include('../../atneed/pdf_lead_invoice.php');	
		}
		else
		{
		
		$sql = "SELECT * FROM directors,lead_invoice WHERE user_type = '2' or user_type = '3' and directors.id=req_to group by req_to ORDER BY directors.id DESC";
		
		$sqlquery = mysql_query($sql);
?>


<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Directors</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="">Members</a> <span class="divider">/</span></li>
            <li class="active">Manage Members</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<!--<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i> New User</button>
    <button class="btn">Import</button>
    <button class="btn">Export</button>
  <div class="btn-group">
  </div>
</div>-->
<!--<a href="<?php echo base_url;?>admin/members/add_member.php" class="btn btn-primary">ADD</a>-->
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
		  <th>Business Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>City</th>
          <th>State</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
      
      <?php
	  	$i = 1;
	  	
		while($data = @mysql_fetch_assoc($sqlquery))
		{
	  ?>
            <tr>
              <td><?php echo $i;?></td>
              <td>
              	<?php echo ucwords($data['full_name']);?>
              </td>
			  <td>
              	<?php echo ucwords($data['business_name']);?>
              </td>
              <td>
              	<?php echo $data['email'];?>
              </td>
              <td>
              	<?php echo $data['phone'];?>
              </td>
              <td><?php echo $data['address'];?></td>
              <td>
              	<?php
				$csql = "SELECT * FROM cities WHERE city_id = ".$data['city']."";
				$csqlex = mysql_query($csql);
				$ccity = @mysql_fetch_assoc($csqlex);
				echo $ccity['city_name'];
				?>
              </td>
              <td>
              	<?php //echo $data['state'];?>
				<?php
				$ssql = "SELECT * FROM states WHERE state_id = ".$data['state']."";
				$ssqlex = mysql_query($ssql);
				$scity = @mysql_fetch_assoc($ssqlex);
				echo $scity['state_name'];
				?>
              </td>
              <td>
                  <!--<a href="<?php echo base_url;?>admin/members/edit_clinet.php?id=<?php echo $data['id'];?>"><i class="icon-pencil"></i></a>-->
                  <a href="manage_invoice.php?id=<?php echo $data['id'];?>" class="btn btn-primary" role="button">INVOICE</a>
              </td>
            </tr>
     <?php
	 			$i++;
		}
	 ?>
        
      </tbody>
    </table>
</div>
<?php echo $links; ?>
<!--<div class="pagination">
    <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div>-->

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
</div>
<?php	
	include_once('../include/footer.php');
	}	
}
else
{
	header('Location:../login.php');
}
	
?>

        