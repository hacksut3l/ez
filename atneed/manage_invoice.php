<?php
	ob_start();
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		if(isset($_GET['id']))
		{
		include('pdf_lead_invoice.php');	
		}else
		{
		include('../admin/include/inside_header.php');
		include('../admin/include/side_bar.php');	
		
		
		
		
		
		 $sql = "SELECT * FROM directors,lead_invoice WHERE (user_type = '2' or user_type = '3') and req_to=directors.id group by req_to ORDER BY directors.id DESC";
		
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
         
          <th>location</th>
          <td>
          </td>
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
            
              <td>
              <?php
				$csql = "SELECT * FROM cities WHERE city_id = ".$data['city']."";
				$csqlex = mysql_query($csql);
				$ccity = @mysql_fetch_assoc($csqlex);
				echo $ccity['city_name']." ";
				?>
              	<?php //echo $data['state'];?>
				<?php
				$ssql = "SELECT * FROM states WHERE state_id = ".$data['state']."";
				$ssqlex = mysql_query($ssql);
				$scity = @mysql_fetch_assoc($ssqlex);
				echo $scity['state_name'];
				?>
              </td>
              <td>
              <select style="width:100px;" name="month<?php echo $data['id']; ?>" id="month<?php echo $data['id']; ?>">
              
              <option value="1">Jan
              </option>
               <option value="2">Feb
              </option>
               <option value="3">Mar
              </option>
               <option value="4">Apr
              </option>
               <option value="5">May
              </option>
               <option value="6">June
              </option>
               <option value="7">July
              </option>
               <option value="8">Aug
              </option>
              <option value="9">Sep
              </option>
              <option value="10">Oct
              </option>
              <option value="11">Nov
              </option>
              <option value="12">Dec
              </option>
              </select>
              <select style="width:100px;" name="year<?php echo $data['id'] ?>" id="year<?php echo $data['id'] ?>">
             
              <?php for($i=2013; $i<= date('Y'); $i++) 
			  {?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?>
              </option>
              <?php }?>
              </select>
              </td>
              <td>
                 
                  <a  style="cursor:pointer;" class="btn btn-primary" role="button" onclick="generateinvoice(<?php echo $data['id'] ?>)">INVOICE</a>
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
	include_once('../admin/include/footer.php');
	}	
}
else
{
	header('Location:../admin/login.php');
}
?>
<script>
function generateinvoice(id)
{
	var month= document.getElementById('month'+id).value;
	var skillsSelect = document.getElementById('month'+id);
var mon = skillsSelect.options[skillsSelect.selectedIndex].text;
	//var month= $("#"+('month'+id)+" option:selected").text();
//alert(mon);

	var year= document.getElementById('year'+id).value;
	window.location='manage_invoice.php?id='+id+"&month="+month+"&year="+year+"&mon="+mon;
}
</script>

        