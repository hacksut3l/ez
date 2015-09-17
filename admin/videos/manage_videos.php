<?php
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('../include/inside_header.php');
		include('../include/side_bar.php');	
		
		$sql = "SELECT * FROM videos ORDER BY id DESC";
		
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
			
				var video_id = $(this).attr('video_id');
				
				$.ajax({
					type: "POST",
					url: BASE_URL+"admin/videos/delete_video.php",
					data: "video_id="+video_id,
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
            
            <h1 class="page-title">Videos</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="">Videos</a> <span class="divider">/</span></li>
            <li class="active">Manage Videos</li>
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
<a href="<?php echo base_url;?>admin/videos/add_videos.php" class="btn btn-primary">ADD</a>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
		  <th>Page</th>
          <th>Videos</th>
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
			  <td><?php echo $data['page_name'];?></td>
              <td>
              
             <object width='413' height='251'><param name='movie' value='http://www.youtube.com/v/<?php echo $data['video_name'];?>'version=3&amp;hl=en_US&amp;rel=0'>    </param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/<?php echo $data['video_name'];?>'version=3&amp;hl=en_US&amp;rel=0' type='application/x-shockwave-flash' width='413' height='251' allowscriptaccess='always' allowfullscreen='true'></embed></object>
              
              
              </td>
              <td>
                  <a href="<?php echo base_url;?>admin/videos/edit_videos.php?id=<?php echo $data['id'];?>"><i class="icon-pencil"></i></a>
                  <a href="javascript:void(0);" video_id="<?php echo $data['id'];?>" class="delete" role="button"><i class="icon-remove"></i></a>
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
        