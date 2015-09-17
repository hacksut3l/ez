<?php
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('../include/inside_header.php');
		include('../include/side_bar.php');	
?>


<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Home Page Banners</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="">Banners</a> <span class="divider">/</span></li>
            <li class="active">Home Page</li>
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

<?php
	if(isset($_POST['update']))
	{
		//print_r($_FILES);exit;
		
		$path = $_SERVER['DOCUMENT_ROOT'].folder_name.'/admin/uploads/home_slider';
		
		
		if($_FILES['image']["name"] != '')
		{
			$new_file_name = time().rand().$_FILES["image"]["name"];
			
			move_uploaded_file($_FILES["image"]["tmp_name"],$path."/" . $new_file_name);
			
			$sql = "INSERT 
					INTO 
						home_slider 
						(
							image_name
						)
					VALUES 
						(
							'".$new_file_name."'
						)
					
					";
			
			mysql_query($sql);
		}
		
	}
?>

    
    <form action="" method="post" enctype="multipart/form-data">       
        <p>
        	<label>Slider Image :</label> <input type="file" name="image">
        </p>
        
        <input type="hidden" value="3" name="total_images" />
        
       <input type="submit" value="INSERT" name="update" class="btn btn-primary">
    	
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
                    
        