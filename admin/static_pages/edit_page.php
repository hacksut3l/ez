<?php
	ob_start();
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('../include/inside_header.php');
		include('../include/side_bar.php');	
		include('../fckeditor.php');
?>


<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Static Pages</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="<?php echo base_url;?>admin/static_pages/manage_static_pages.php">Manage Pages</a> <span class="divider">/</span></li>
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

	$getsql = "SELECT * FROM pages WHERE id = '".$_GET['id']."' ";
	$getsqlquery = mysql_query($getsql);
	
	$getresult = mysql_fetch_assoc($getsqlquery);
	
	$categoryerror = '';
	$titleerror = '';
	$decriptionerror = '';	
	
	if(isset($_POST['update']))
	{	
		$slug = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($_POST['title'])));
		
		//$slug = strtolower($slug);
		//echo $slug;exit;
	
		if($_POST['category'] == '' && $_POST['title'] == '' && $_POST['banner_name'] == '')
		{
			$categoryerror = 'Please enter category';
			$titleerror = 'Please enter title';
			$bannererror = 'Please enter banner title';
		}
		else if($_POST['category'] == '')
		{
			$categoryerror = 'Please enter category';
		}
		else if($_POST['title'] == '')
		{
			$titleerror = 'Please enter title';
		}
		else if($_POST['banner_name'] == '')
		{
			$bannererror = 'Please enter banner title';
		}
		else
		{
			//$slug = str_replace(' ','',$_POST['title']);
			
			$sql = "UPDATE 
						pages
					SET
						category = '".$_POST['category']."',
						title = '".ucwords($_POST['title'])."',
						banner_name = '".ucwords($_POST['banner_name'])."',
						slug = '".$slug."'
					WHERE
						id = '".$_GET['id']."'
					";
			
			mysql_query($sql);
			
			header('Location:manage_static_pages.php');
		}
	
		
	}
?>

    
    <form action="" method="post" enctype="multipart/form-data">       
        <p>
        	<label>Category :</label> 
            	<select name="category" id="category">
                	<option value="">Select Category</option>
                	<option value="eziFunerals" <?php if(isset($_POST['category']) && $_POST['category'] == 'eziFunerals') echo "selected=selected"; else if($getresult['category'] == 'eziFunerals') echo "selected=selected";?>>eziFunerals</option>
                    <option value="Get Help" <?php if(isset($_POST['category']) && $_POST['category'] == 'Get Help') echo "selected=selected";  else if($getresult['category'] == 'Get Help') echo "selected=selected";?>>Get Help</option>
                    <option value="Partner With Us" <?php if(isset($_POST['category']) && $_POST['category'] == 'Partner With Us') echo "selected=selected";  else if($getresult['category'] == 'Partner With Us') echo "selected=selected";?>>Partner With Us</option>
                </select>
            
        </p>
        <p style="color:red;">
        	<?php
				if(isset($categoryerror))
				{
					echo $categoryerror;
				}
			?>
        </p>
        
        <p>
        	<label>Title :</label>
            <input type="text" name="title" value="<?php echo $getresult['title'];?>" id="title"/>
        </p>
        
        <p style="color:red;">
        	<?php
				if(isset($titleerror))
				{
					echo $titleerror;
				}
			?>
        </p>
        
        <p>
        	<label>Banner title :</label>
            <input type="text" name="banner_name" value="<?php echo $getresult['banner_name'];?>" id="banner_name"/>
        </p>
        
         <p style="color:red;">
        	<?php
				if(isset($bannererror))
				{
					echo $bannererror;
				}
			?>
        </p>
        
        
        
       <input type="submit" value="UPDATE" name="update" class="btn btn-primary">
    	
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
                    
        