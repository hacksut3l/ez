<?php
	ob_start();
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('../include/inside_header.php');
		include('../include/side_bar.php');	
		
	echo	$sql = "SELECT * FROM invite where invite_to='".$_GET['id']."'";
		
		$sqlquery = mysql_query($sql);
?>

<script type="text/javascript">
	$(document).ready(function() {
		
        $('.delete').click(function()
		{			
			var input=confirm("Are you sure you want to delete ?");
			if (input==false)
			{
			  return false;
			}
			else
			{
			
				var member_id = $(this).attr('member_id');
				
				$.ajax({
					type: "POST",
					url: BASE_URL+"admin/members/delete_member.php",
					data: "member_id="+member_id,
					success: function(result)
					{
						location.reload();
					}
				
				});
				
			}
				
		});
	});
</script>
<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Members</h1>
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

  <h1 style="color:#000000;" ><center>View Quotes</center></h1>
<div class="well">

    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Client Name</th>
		   <th>Email</th>
          <th>Phone</th>
		   <th>Date</th>
         
          <!--<th>Title</th>
          <th>Descripton</th>-->
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
      
      <?php
	  	$i = 1;
	  	
		$count=mysql_num_rows($sqlquery);
		
		if($count> 0)
		{	
		while($data = @mysql_fetch_assoc($sqlquery))
		{
		
		$sql1 = "SELECT * FROM clients where id='".$data['invite_from']."'";
		
		$sqlquery1 = mysql_query($sql1);
		
		
		$data1=mysql_fetch_array($sqlquery1);
	  ?>
            <tr>
              <td><?php echo $i;?></td>
              <td>
              	<?php echo $data1['first_name']." ".$data1['last_name'];?>
              </td>
             <td>
              	<?php echo $data1['email'];?>
              </td>
              <td>
              	<?php echo $data1['phone'];?>
              </td>
			    <td>
                <?php echo $data['date']; ?>
              </td>
              <!--<td>
                  <a href="<?php echo base_url;?>admin/members/edit_member.php?id=<?php echo $data['id'];?>"><i class="icon-pencil"></i></a>
                  <a href="javascript:void(0);" member_id="<?php echo $data['id'];?>" class="delete" role="button"><i class="icon-remove"></i></a>
              </td>-->
            </tr>
     <?php
	 			$i++;
		}
		}
		else
		{
		
	 ?>
         <tr>
              <td>No Record</td>
			  <td>No Record</td>
			  <td>No Record</td>
			  <td>No Record</td>
			  <td>No Record</td>
              
            </tr>
		
		
	<?php }?>
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
else
{
	header('Location:../login.php');
}
?>
        