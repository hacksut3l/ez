<?php
	ob_start();
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
	
	$error = '';
	
	function getYouTubeIdFromURL($url)
	{
	  $url_string = parse_url($url, PHP_URL_QUERY);
	  parse_str($url_string, $args);
	  return isset($args['v']) ? $args['v'] : false;
	}
	
	if(isset($_POST['update']))
	{				
		
		if($_POST["urlname"] != '' && $_POST['page_name'] != '')
		{			
			$value = getYouTubeIdFromURL($_POST["urlname"]);
		
			$sql = "INSERT 
					INTO 
						videos 
						(
							video_name,
							page_name
						)
					VALUES 
						(
							'".$_POST['urlname']."',
							'".$_POST['page_name']."'
						)
					
					";
			
			mysql_query($sql);
			header('Location:manage_videos.php');
		}
		else
		{
			$error = 'URL field is required';
		}
		
	}
?>

    
    <form action="" method="post" enctype="multipart/form-data">   
		<p>
        	<label>Page Name :</label> 
			<select name="page_name" id="page_name">
				<option value="">Select</option>
				<option value="Home Page">Home Page</option>
				<option value="Record your life story">Record your life story</option>
			</select>
			
			
        </p>

    
        <p>
        	<label>Youtube URL :</label> <input type="text" name="urlname" value="" style="width: 283px;">
        </p>
        <p style="color:red;">
        	<?php
				if(isset($error))
				{
					echo $error;
				}
			?>
        </p>
        
        
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
                    
        