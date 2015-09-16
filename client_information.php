
<?php
	ob_start();
	include'include/config.php';
	@session_start(); ?>


<?php include'include/main_header.php'; ?>  

<link type="text/css" rel="Stylesheet" href="css/Old_Include_Css/jquery.validity.css" />
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
<!--<script type="text/javascript" src="js/location.js"></script>-->

<script type="text/javascript" src="js/Old_Include_Js/jquery-ui-1.8.23.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery-ui-1.8.23.custom.css" />





<script type='text/javascript'><!--
			$(document).ready(function() {
				
				var BASE_URL = '<?php echo base_url;?>';
				
				enableSelectBoxes();
				
				$( "#city" ).autocomplete({
					
					source: function(request, response) {
						
					$.ajax({
						url :BASE_URL+"city.php" ,
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
				
				
				
				
				
			});
			
			
			
			function enableSelectBoxes(){	}//-->
</script>


<script src="js/Old_Include_Js/respond.min.js"></script>
	<?Php
	
	
			
	if(isset($_SESSION['client']))
	{
	
	$sql = "SELECT * FROM clients WHERE id = '".$_SESSION['client']."' ";
	$sqlex = mysql_query($sql);
	
	$result = mysql_fetch_assoc($sqlex);
        
        $citysql = "SELECT 
                        city_name
                    FROM 
                        cities
                    WHERE  
                        city_id = '".$result['city']."'
                    ";
				
	$cityex = mysql_query($citysql);
	
	$city_name = mysql_fetch_assoc($cityex);
?>


<?php include 'dashbord.php' ?>
<br />
<div class="container">
<table style="margin-left:95px;">
	<tr>
		
		<th style="padding:10px;border:none; width:auto;"><h3 <?php if(@$_GET['page']=='client_information' || @$_GET['page']==''){ ?>style="color:#e6923a" <?php } ?>><a href="client_information.php?page=client_information">Contact Information</a></h3></th>
		<th style="padding:20px;border:none; width:auto;"><h3 <?php if(@$_GET['page']=='changepassword'){ ?>style="color:#e6923a" <?php } ?>><a href="client_information.php?page=changepassword">Change Password</a></h3></th>
		<th style="padding:20px;border:none; width:auto;"><h3 <?php if(@$_GET['page']=='purchase_information'){ ?>style="color:#e6923a" <?php } ?>><a href="client_information.php?page=purchase_information">Purchase Information</a></h3></th>
	</tr>
</table>
</div>
<?php	

	@$page=$_GET['page'];
	
	if(basename($_SERVER['PHP_SELF'])=='client_information.php' && empty($page))
	{
		$page='client_information';
	}
	
	if(!empty($page) && file_exists('middlepage_of_client_infomation/'.$page.'.php'))
	{
		include 'middlepage_of_client_infomation/'.$page.'.php';
	
	}
	
?>	

<br>

<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
        <div class="center"><img src="images/footer_AD.png" width="620"></div>
        
</div>



<!-- Footer
======================================= -->
 <?php include 'include/main_footer1.php'; ?>


</html>
<?php
	}
	else
	{
		header('Location:signin.php');
	}
?>
