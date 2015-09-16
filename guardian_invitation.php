<?php
	include_once('include/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eziFunerals</title>
<link href="favicon.icon" rel="shortcut icon">
<!--<link href="<?php echo base_url;?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url;?>css/style1.css" rel="stylesheet" type="text/css" />-->
<script src="<?php echo base_url;?>js/Old_Include_Js/jquery-1.9.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function()
{
	
	var client_id = $('#client_id').val();
	var guardian_id = $('#guardian_id').val();
	
	
	$('#accept_invitation').click(function()
	{
		$.ajax
		({
			type: "POST",
			url: "invitation.php",
			data:"guardian_id="+guardian_id+"&client_id="+client_id+"&type=accept",
			success: function(msg)
			{
			   alert(msg)
			   window.location = "http://greencubes.co.in/Projects/EZI/"
			}
		});
	});
	
	$('#decline_invitation').click(function()
	{
		$.ajax
		({
			type: "POST",
			url: "invitation.php",
			data:"guardian_id="+guardian_id+"&client_id="+client_id+"&type=decline",
			success: function(msg)
			{
			    alert(msg)
				window.location = "http://greencubes.co.in/Projects/EZI/"
			}
		});
	});
	
});


</script>

</head>

<body>

<input type="button" value="Accept" id="accept_invitation"/>

<input type="button" value="Decline" id="decline_invitation"/>

<input type="hidden" name="guardian_id" value="<?php echo $_GET['guardian'];?>" id="guardian_id"/>
<input type="hidden" name="client_id" value="<?php echo $_GET['client'];?>" id="client_id"/>


</body>
</html>