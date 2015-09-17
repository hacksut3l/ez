<?php
	ob_start();
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('../include/inside_header.php');
		include('../include/side_bar.php');	
		
		if(!empty($_GET['state']) && !empty($_GET['city']) && !empty($_GET['country']))
		{
		$sql = "SELECT * FROM cities WHERE city_name = '".$_GET['city']."'";
	
			$sqlex = mysql_query($sql);
			
			$data=mysql_fetch_array($sqlex);
		
		
		$sql = "SELECT * FROM directors WHERE user_type = '2' AND manual_entry != 1 AND state='".$_GET['state']."' AND city='".$data['city_id']."'  ORDER BY id DESC";
		
		}else
		{
		
				$sql = "SELECT * FROM directors WHERE user_type = '2' ORDER BY id DESC";
		
		}
		$sqlquery = mysql_query($sql);
?>
<script type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery-ui-1.8.23.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url;?>css/Old_Include_Css/jquery-ui-1.8.23.custom.css" />

<script type="text/javascript">
	$(document).ready(function() {
		
		$( "#city" ).autocomplete({
		
					source: function(request, response) {
						
					$.ajax({
						url :"city.php" ,
						data : "state_id="+$("#state").val()+"&city="+$('#city').val(),
						dataType: "json",
						type : "POST",
						
						
						success : function(data)
						{
							group=[];
							label=[];
							$.each(data,function(i,v){
								group.push({
								label:$(v).attr('groups')
							})
						})
						
					response(group);
						}
					});
					},
					minLength: 2
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
					url: BASE_URL+"admin/members/delete_director.php",
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
            
            <h1 class="page-title">Standard Members</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="">Members</a> <span class="divider">/</span></li>
            <li class="active">Manage Standard Members</li>
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
<form action="" method="get" enctype="multipart/form-data">
  <select id="state" name="state" class="selectOption2 fdtextboxstate find_banner_input" style="color:#999999 !important;  font-size: 14px !important;">
    <option class="selectOption2" value="" >Select State/Province</option>
    <?php
													$statesql = "SELECT * FROM states ORDER BY state_name";
													$statesex = mysql_query($statesql);
													
													while($states = mysql_fetch_assoc($statesex))
													{
														echo '<option value="'.$states['state_id'].'">'.$states['state_name'].'</option>';
													}
										?>
  </select>
  &nbsp;&nbsp; <span id="city_span">
  <input type="text" name="city" value="" id="city" placeholder="Suburb" class="fdtextboxcity find_banner_input">
  </span>
  &nbsp;&nbsp;<span>
  <input  type="text" name="country" id="" value="Australia" class="find_banner_input fdtextboxcountry" readonly /></span>
						
								<!--<select id="service" name="service" class="selectOption2" style="width:200px !important; height:40px; border:none; border-radius:4px;">
										<option class="selectOption2" value="">Select Service</option>
										<option class="selectOption2" value="Burial">Burial</option>
										<option class="selectOption2" value="Cremation">Cremation</option>
										
								   </select>&nbsp;&nbsp;-->
							
							&nbsp;&nbsp;<input type="submit" name="" value="Search" class="btn btn-primary send_invoice" style="margin-top:-7px;" >
</form>

<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
		   <th>Date</th>
          <th>Name</th>
		  <th>Business Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>City</th>
          <th>State</th>
		   <th>Payment Status</th>
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
			  <td style="width:80px;">
              	<?php echo date('d-M-y',strtotime($data['date']));?>
              </td>
              <td>
              	<?php echo ucwords($data['full_name']);?>
              </td>
			  <td >
              	<?php echo ucwords($data['business_name']);?>
              </td>
              <td >
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
<?php
				$ssql = "SELECT * FROM states WHERE state_id = ".$data['state']."";
				$ssqlex = mysql_query($ssql);
				$scity = @mysql_fetch_assoc($ssqlex);
				echo $scity['state_name'];
				?>              </td>
				<td>
<?php
				$data_of = "SELECT * FROM director_member_info WHERE director_id = ".$data['id']."";
				$result = mysql_query($data_of);
				$row_result = @mysql_fetch_assoc($result);
				echo $row_result['order_info'];
				?>              </td>
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

        