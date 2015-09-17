<?php
	ob_start();
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('../include/inside_header.php');
		include('../include/side_bar.php');	
		include('../fckeditor.php');
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url;?>admin/stylesheets/jquery.datetimepicker.css"/>

<script src="<?php echo base_url;?>admin/lib/jquery.datetimepicker.js" type="text/javascript"></script>

<script>
$(document).ready(function()
{
	
	
	$('#datetimepicker2').datetimepicker({
	 timepicker:true,
	 format:'Y-m-d H:i:s'
	});
	
	$('#datetimepicker4').datetimepicker({
	 timepicker:true,
	 format:'Y-m-d H:i:s'
	});
	

});
</script>


<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Manage Invoice</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="">Manage Invoice</a> <span class="divider">/</span></li>
            <li class="active">Generate Invoice</li>
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
    
    <form action="exportrecord_xls.php" method="post" enctype="multipart/form-data">  
        <input type="hidden" value="<?php echo $_REQUEST['id']?>" name="userid">
        <p>
        	<label>Date From :</label> 
                <input type="text" id="datetimepicker2" name="from_date" required/>
        </p>
        
         <p>
        	<label>Date To :</label> 
                <input type="text" id="datetimepicker4" name="to_date" required/>
        </p>
        <p style="color:red;">
        	<?php
				if(isset($categoryerror))
				{
					echo $categoryerror;
				}
			?>
        </p>
        
      
        
        <p style="color:red;">
        	<?php
				if(isset($titleerror))
				{
					echo $titleerror;
				}
			?>
        </p>
        
                  
        
        
       <input type="submit" value="Submit" name="update" class="btn btn-primary">
    	
    </form>
    
    
</div>

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
                    
        