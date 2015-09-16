<link rel="stylesheet" href="css/popup.css" type="text/css" />
<?php
	ob_start();
	include_once('./include/config.php');
	session_start();
	
	$number = $_GET['id'];
	$sql = "SELECT email_confirm,id FROM directors WHERE email_confirm = '".$number."' ORDER BY id ASC";
	$sqlexe = mysql_query($sql);
	$user1 = mysql_fetch_array($sqlexe);
	$ispresent = mysql_num_rows($user1);
	
	if($ispresent == 0)
	{
        $_SESSION['person_id'] = $user1['id'];  
		$_SESSION['client'] = $user1['id']; 
		   
		$query ="UPDATE 
					directors 
				SET 
					email_confirm = '',
					is_email_confirm = '1'
				WHERE
					email_confirm = '".$number."'
				";
						
		$get1 = mysql_query($query);
		
		
		$dataofpayment=mysql_query("select * from directors where id='".$_SESSION['client']."'");
	$rowofpayment=mysql_fetch_array($dataofpayment);
	if($rowofpayment['payment_status']=='pending' && $rowofpayment['user_type']== 1)
	{
		
?>	
	<script>
		
			window.location.href="free-membership-registration-payment.php";
	
	</script>
	
		
<?php	
	}
	if($rowofpayment['payment_status']=='pending' && $rowofpayment['user_type']== 2)
	{
		
?>	
	<script>
		
			window.location.href="standard-membership-registration-payment.php";
	
	</script>
	
		
<?php	
	}
	 
	 if($rowofpayment['payment_status']=='pending' && $rowofpayment['user_type']== 3)
	{
		
?>	
	<script>
		
			window.location.href="premium-membership-registration-payment.php";
	
	</script>
	
		
<?php	
	}
?>		
<script type="text/javascript">

alert('You already activated account');
window.location.href="signin.php";

</script>
	
<?php		
	}
	else
	{
	
	
?>		
		



<?php
			
	}

?>