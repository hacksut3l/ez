<?php
	ob_start();
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('../include/inside_header.php');
		include('../include/side_bar.php');	
		
	echo	$sql = "SELECT 
					d.*,
					p.* 
				FROM 
					directors d,
					director_member_info p 
				WHERE 
					d.id = p.director_id
				
				ORDER BY p.d_date DESC";
		
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
					url: BASE_URL+"admin/payment/delete_director_payment.php",
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
            
            <h1 class="page-title">Payment Informations</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="">Payment Informations</a> <span class="divider">/</span></li>
            <li class="active">Funeral Directors</li>
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


<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Business Name</th>
		  <th>Business Type</th>
		  <th>Member Type</th>
          <th>Order ID</th>
          <th>Amount</th>
          <th>Date</th>
		  <th>Status</th>
          <th>Card Type</th>
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
              	<?php echo ucwords($data['business_type']);?>
              </td>
              <td>
              	<?php 
					if($data['user_type'] == '2')
					{
						echo 'Standard Member';
					}
					else
					{
						echo 'Premium Member';
					}				
				?>
              </td>
              <td>
              	<?php echo $data['order_id'];?>
              </td>
			  <td>
              	<?php echo '$'.$data['reg_amount'];?>
              </td>
              <td><?php echo $data['date'];?></td>
			  <td>
                              
              	<?php echo $data['order_info'];?>
              </td>
			  <td>
              	<?php 
					if($data['card_type'] == 'VC')
					{
						echo 'Visa';
					}
					else
					{
						echo 'Master';
					}				
				?>
              </td>
			 
              <td>
                  <!--<a href="<?php echo base_url;?>admin/members/edit_clinet.php?id=<?php echo $data['id'];?>"><i class="icon-pencil"></i></a>-->
                  <a href="javascript:void(0);" member_id="<?php echo $data['info_id'];?>" class="delete" role="button"><i class="icon-remove"></i></a>
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
else
{
	header('Location:../login.php');
}
?>

        