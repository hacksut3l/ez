<?php
	ob_start();
	@session_start();
	include_once('../../config.php');
	
	if(isset($_SESSION['admin_username']))
	{
		include('../include/inside_header.php');
		include('../include/side_bar.php');	
		
		$sql = "SELECT * FROM clients ORDER BY id DESC";
		
		$sqlquery = mysql_query($sql);
?>
<link href="add_client.css" rel="stylesheet" type="text/css"/>
<script>
	$(document).ready(function() {
	$("#state").change(function(){
	//alert(1);
		var cid=$("#state").val();
		var str1="state_id="+cid;
		//alert(str1);
		$.ajax({
			type:"POST",
			url:"city.php",
			data:str1,
			success:function(msg1)
			{
			$("#city_span").html(msg1);
			}
		});
	});		});
</script>
<div class="content">
       <div class="header">
            
            <h1 class="page-title">Create a Free Client Account</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">

<?php

	if(isset($_POST['submit']))
	{
	$date = date("Y-m-d H:i:s",time());
	//$citysql = "SELECT * FROM cities WHERE city_name = '".$_POST['city']."'	";
	//$cityex = mysql_query($citysql);
	//$city_name = mysql_fetch_assoc($cityex);
	$sql = "INSERT INTO clients (
				first_name,
				last_name,
				phone,
				email,
				state,
				city,
				country,
				username,
				password,
				date
				)
				VALUES(
				'".$_POST['first_name']."',
				'".$_POST['last_name']."',
				'".$_POST['phone']."',
				'".$_POST['email']."',
				'".$_POST['state']."',
				'".$_POST['city']."',
				'".$_POST['country']."',
				'".$_POST['username']."',
				'".md5($_POST['password'])."',
				'".$date."'									
				)
				";

				mysql_query($sql);
						
						$user_id = mysql_insert_id();
						setcookie("free_email", $_POST['email'], time()+3600);
						$random_number = rand().time();
						$link = base_url.'client_confirm.php?id='.$random_number.'&user_token='.$user_id;
						$email = $_POST['email'];
						$sql = "UPDATE 
									clients 
								SET 
									email_confirm = '".$random_number."' 
								WHERE 
									email = '".$email."'
								";
						mysql_query($sql);
						
						$name = $_POST['first_name'];
						$username = $_POST['username'];
						$mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer
						ob_start();
						require_once(base_url.'email-format.php');
						$html_message = ob_get_contents();
						ob_end_clean();
						
						
						$html_message = $link;

						$message = Swift_Message::newInstance()
									   ->setSubject('Client Membership Registration Confirmation link') // Message subject
									   ->setTo(array($email => $name)) // Array of people to send to
									   ->setFrom(array('peter@ezifunerals.com.au' => 'EziFunerals')) // From:
									   ->setBody($html_message, 'text/html');// Attach that HTML message from earlier
									   
						
						// Send the email, and show user message
						if ($mailer->send($message))
						{
							header('Location:'.base_url.'admin/members/manage_clients.php');
						}
						else
						{
							header('Location:'.base_url.'admin/members/manage_clients.php');
						}
	}

?>			
			
			<div class="reg_box well" style="float: left;margin-top: 22px;">
                    <form name="client_registration_form" action="" method="post" id="client_registration_form">
                    
                     
                        <span class="fields_wrapp">
                        	<span class="reg_name">First Name</span>
                        	<input class="reg_field" type="text" name="first_name" id="first_name" >
                            <span id="aa"></span>
                        </span>
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Last Name</span>
                        	<input class="reg_field" type="text" name="last_name" id="last_name" >
                            <span id="bb"></span>
                        </span>
						<span class="fields_wrapp1">
                        	<span class="reg_name">Phone</span>
                        	<input class="reg_field" type="text" name="phone" id="phone" >
                            <span id="cc"></span>
                        </span>
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Email</span>
                        	<input class="reg_field" type="text" name="email" id="email" >
                            <span id="dd"></span>
                        </span>
						
						<span class="fields_wrapp1">
                        	
        				<span class="reg_name">Country</span>
						<input  type="text" name="country" id="country"  class="reg_field" value="Australia" readonly />
                            <span id="ee"></span>
        
                        </span>
						
						<span class="fields_wrapp1">
                        	
                            <span class="reg_name">Select State</span>
                            <select class="defaultSelect" name="state" id="state">
                                <option value="">Select state/region</option>
                                <?php
									$statesql = "SELECT * FROM states ORDER BY state_name";
									$statesex = mysql_query($statesql);
									
									while($states = mysql_fetch_assoc($statesex))
									{
									echo '<option value="'.$states['state_id'].'" >'.$states['state_name'].'</option>';
									}
								?>
                               
                            </select>
                            <span id="ff"></span>
                        	
                        </span>
						
						
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Select City <span class="red">*</span></span>
                            <span id="city_span">
                            <select class="defaultSelect" name="city" id="city">
								<option value="">Select Suburb</option>
                            </select>
                            </span>   
                            <span id="gg"></span>
                        </span>
                        
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Username</span>
                        	<input class="reg_field" type="text"  name="username" id="username" >
                            <span id="hh"></span>
                        </span>
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Password</span>
                        	<input class="reg_field" type="password"  name="password" id="password" >
                            <span id="ii"></span>
                        </span>
                        <span class="fields_wrapp1">
                        	<span class="reg_name">Re-type Password</span>
                        	<input class="reg_field" type="password"  name="confirm_password" id="confirm_password">
                            <span id="jj"></span>
                        </span>
                       
                   
                        
                        <span style="width:100%; float:left;">
                        	<span class="reg_name">&nbsp;</span>
                        	<input class="signup_btn" type="submit" id="submit" name="submit" value="ADD">
                        </span>
                        </form>
                        
                    </div>
			
			
			
			
			
			
			
			



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
        