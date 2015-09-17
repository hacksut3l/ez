<?php
	ob_start();
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('config.php');
		include('include/inside_header.php');
		include('include/side_bar.php');	
		
		$sql = "SELECT * FROM director_member_info where director_id=".$_REQUEST['tid']."";
		$sqlquery = mysql_query($sql);
		$cdata = mysql_fetch_assoc($sqlquery);
?>

<div class="content">
        

        <div class="container-fluid">
            <div class="row-fluid">
 
<div class="well">
    <table class="table" border="0">
      <tr><th width="30%">ID :</th><td><?php echo $cdata['director_id'];?></td></tr>
      <tr><th>Director Name :</th><td><?php 
						$namesql="select * from directors where id=".$cdata['director_id']."";
						$namesqlex=mysql_query($namesql);
						$cname = mysql_fetch_assoc($namesqlex);
						echo " ".$cname['full_name'];
						  
						  ?></td></tr>
	<tr><th>Plan Type :</th><td><?php if($cname['user_type']=='1'){ echo 'Basic';}if($cname['user_type']=='2'){ echo 'Standard';}if($cname['user_type']=='3'){ echo 'Premium';}?></td></tr>					  
      <tr><th>Order Id :</th><td><?php echo $cdata['order_id'];?></td></tr>
      <tr><th>Order Info :</th><td><?php echo $cdata['order_info'];?></td></tr>
      <tr><th>Amount :</th><td><?php echo $cdata['order_amount']/100.0;?></td></tr>
      <tr><th>Reg Amount :</th><td><?php echo $cdata['reg_amount'];?></td></tr>
      <tr><th>Response Code :</th><td><?php echo $cdata['response_code'];?></td></tr>
      <tr><th>Transcation No. :</th><td><?php echo $cdata['transcation_no'];?></td></tr>
      <tr><th>Receipt No :</th><td><?php echo $cdata['receipt_no'];?></td></tr>
      <tr><th>Card Type :</th><td><?php echo $cdata['card_type'];?></td></tr>
      <tr><th>Date :</th><td><?php echo $cdata['d_date'];?></td></tr>
    </table>
</div>

<?php	
	include_once('include/footer.php');
		
}
else
{
	header('Location:login.php');
}
?>
        