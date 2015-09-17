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
            
            <h1 class="page-title">Pages</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="<?php echo base_url;?>admin/pages/manage_pages.php">Manage Pages</a> <span class="divider">/</span></li>
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

	$getsql = "SELECT * FROM record_story WHERE id = '".$_GET['id']."' ";
	$getsqlquery = mysql_query($getsql);
	
	$getresult = mysql_fetch_assoc($getsqlquery);
	
	$categoryerror = '';
	$titleerror = '';
	$decriptionerror = '';	
	
	if(isset($_POST['update']))
	{	
		if($_POST['title'] == '')
		{
			$titleerror = 'Please enter title';
		}
		else
		{
			$slug = str_replace(' ','',$_POST['title']);
			
			$sql = "UPDATE 
						record_story
					SET
						title = '".ucwords($_POST['title'])."',
						description = '".mysql_real_escape_string($_POST['description'])."'
						
					WHERE
						id = '".$_GET['id']."'
					";
			
			mysql_query($sql);
			
			header('Location:manage_pages.php');
		}
	
		
	}
?>

    
    <form action="" method="post" enctype="multipart/form-data">       
        
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
           
            <input type="text" name="title" value="<?php echo $getresult['title'];?>" id="title" readonly="readonly"/>
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
        	<label>Description :</label>
            <?php 
		 	$sBasePath = $_SERVER['PHP_SELF'];
		 	
			$sBasePath = substr($sBasePath, 0, strpos($sBasePath,'record_story'));
			$oFCKeditor = new FCKeditor('description') ;
			$oFCKeditor->BasePath	= $sBasePath ;
			$oFCKeditor->ToolbarSet = 'Default';
			$oFCKeditor->Width = '100%';
			$oFCKeditor->Height = '600';
			$oFCKeditor->Config['EnterMode'] = 'br' ;
			$oFCKeditor->Config['ShiftEnterMode'] = 'br' ;
			$oFCKeditor->Config['SkinPath'] = $sBasePath.'editor/skins/silver/';
			$oFCKeditor->Value = $getresult['description'];
			$oFCKeditor->Create();?>
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
                    
        