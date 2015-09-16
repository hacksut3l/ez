<?php
	ob_start();
	include_once('./include/config.php');
	session_start();
	
	//$number = 6964752;
	
	$number = $_GET['id'];
	
	 $sql = "SELECT * FROM clients WHERE email_confirm = '".$number."' ";
	$sqlexe = mysql_query($sql);
	
	$ispresent = mysql_num_rows($sqlexe);

	if($ispresent > 0)
	{
		$link_result = mysql_fetch_assoc($sqlexe);
		
		
		
		$query ="UPDATE 
					clients 
				SET 
					email_confirm = '',
					is_email_confirm = '1'
				WHERE
					email_confirm = '".$number."'				
				";
				
		mysql_query($query);	
                
		
		$name = $link_result['first_name'];
		
		$email = $link_result['email'];
						
		$username = $link_result['username'];
		
	
		
		
		require_once('verify-email-format.php');
	
	
	    $sel="select * from clients where email='".$email."'";
		$rel=mysql_query($sel);
		$row=mysql_fetch_array($rel);
		
		$plan = $row['plan'];
	 	$_SESSION['client']=$row['id'].'<br>' ;
		$_SESSION['name']=$row['username'];
		$_SESSION['type']='client';
   		 $row['plan'].'<br>';
		
			if($plan == "1"){
			$url='Location:find-funeral-director.php';
			}else{
			$url='Location:client_dashboard.php';
			}	
		
		
			header("$url");
	}
	
	
	
?>