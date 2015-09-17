<?php
	ob_start();
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('config.php');
		include('include/inside_header.php');
		include('include/side_bar.php');	
		
	$sql = "SELECT * FROM director_member_info where order_info='Approved' ORDER BY director_id DESC ";
		
		$sqlquery = mysql_query($sql);
?>

<div class="content">
        
      

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
    <table class="table" border="0">
      <thead>
        <tr>
          <th width="10%">#</th>
          <th width="15%">Name</th>
          <th width="15%">Order Id</th>
          <th width="15%">Amount</th>
          <th width="15%">Plan Type</th>
          <th width="15%">Date</th>
          <th width="10%">View</th>
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
              	<?php 
						$namesql="select * from directors where id=".$data['director_id']."";
						$namesqlex=mysql_query($namesql);
						$cname = mysql_fetch_assoc($namesqlex);
						echo " ".$cname['full_name'];
						  
						  ?>
              </td>
              <td>
              	<?php echo $data['order_id'];?>
              </td>
              <td>
              	<?php echo $data['order_amount'];?>
              </td>
              <td>
              	<?php if($cname['user_type']=='1'){ echo 'Basic';}if($cname['user_type']=='2'){ echo 'Standard';}if($cname['user_type']=='3'){ echo 'Premium';}?>
              </td>
              <td>
              	<?php 
				echo date("Y-m-d", strtotime($data['date']));
				//echo $data['date']("Y-m-d");?>
              </td>
               <td>
                 <a target="_blank" href="view_transaction_director.php?tid=<?php echo $data['director_id'];?>">View</a>
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
	include_once('include/footer.php');
		
}
else
{
	header('Location:../login.php');
}
?>
        