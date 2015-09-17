<?php
	ob_start();
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('../include/inside_header.php');
		include('../include/side_bar.php');	
		
		$sql = "SELECT * FROM directors ORDER BY id DESC";
		
		$sqlquery = mysql_query($sql);
?>

<script type="text/javascript">
	$(document).ready(function() {
		
		function loading_show(){
			$('#loading').html("<img src='images/loader.gif'/>").fadeIn('fast');
		}
		function loading_hide(){
			$('#loading').fadeOut('fast');
		}                
		function loadData(page){
			loading_show();                    
			$.ajax
			({
				type: "POST",
				url: "get_client.php",
				data: "page="+page,
				success: function(msg)
				{
					$("#container").ajaxComplete(function(event, request, settings)
					{
						loading_hide();
						$("#container1").html(msg);
					});
				}
			});
		}
		loadData(1);  // For first time page load default results
		$('#container .pagination li.active').live('click',function(){
			var page = $(this).attr('p');
			loadData(page);
			
		});           
		$('#go_btn').live('click',function(){
			var page = parseInt($('.goto').val());
			var no_of_pages = parseInt($('.total').attr('a'));
			if(page != 0 && page <= no_of_pages){
				loadData(page);
			}else{
				alert('Enter a PAGE between 1 and '+no_of_pages);
				$('.goto').val("").focus();
				return false;
			}
			
		});
		
		
		
		
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
					url:"delete_director.php",
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
<!--<a href="<?php echo base_url;?>admin/members/add_client.php" class="btn btn-primary">ADD</a>-->
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>City</th>
          <th>State</th>
		  <th>Plan Type</th>
		  <th>Payment Status</th>
		    <th>View</th>
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
              	<?php echo $data['full_name'];?>
              </td>
              <td>
              	<?php echo $data['email'];?>
              </td>
              <td>
              	<?php echo $data['phone'];?>
              </td>
              <td>
              	<?php echo $data['address'];?>
              </td>
              <td>
<?php
				$csql = "SELECT * FROM cities WHERE city_id = ".$data['city']."";
				$csqlex = mysql_query($csql);
				$ccity = @mysql_fetch_assoc($csqlex);
				echo $ccity['city_name'];
				?>              </td>
              <td>
<?php
				$ssql = "SELECT * FROM states WHERE state_id = ".$data['state']."";
				$ssqlex = mysql_query($ssql);
				$scity = @mysql_fetch_assoc($ssqlex);
				echo $scity['state_name'];
				?>              </td>
				
				<td>
			<?php if($data['user_type']=='1'){ echo 'Basic';}if($data['user_type']=='2'){ echo 'Standard';}if($data['user_type']=='3'){ echo 'Premium';} ?>
				</td>
				<td>
<?php
				$data_of = "SELECT * FROM director_member_info WHERE director_id = ".$data['id']."";
				$result = mysql_query($data_of);
				$row_result = @mysql_fetch_assoc($result);
				echo $row_result['order_info'];
				?>              </td>
				<td>
				<a href="view_director.php?id=<?php echo $data['id'];?>">view</a>
				</td>
              <td>
                  <!--<a href="<?php echo base_url;?>admin/members/edit_clinet.php?id=<?php echo $data['id'];?>"><i class="icon-pencil"></i></a>-->
                  <a href="javascript:void(0);" member_id="<?php echo $data['id'];?>" class="delete" role="button"><i class="icon-remove"></i></a>
              </td>
            </tr>
     <?php
	 			$i++;
		}
	 ?>
        
      </tbody>
    </table>
</div>
<?php //echo $links; ?>
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
        