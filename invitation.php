<?php
	include_once('include/config.php');
	
	include "MailConfig.php"; 
	//require_once('atneed/swift/swift_required.php');
	
	//$guardian_decode_id = base64_decode($str);
	
	
	$sql = "SELECT
				*
			FROM
				funeral_guardian
			WHERE
				guardian_link = '".$_POST['guardian_id']."'
			LIMIT 1
			";
			
	$sqlex = mysql_query($sql);
	
	$ispresent = @mysql_num_rows($sqlex);
	
	if($ispresent > 0)
	{
		$result = mysql_fetch_assoc($sqlex);
		
		
		if($_POST['type'] == 'accept')
		{
			if($result['is_accept'] == '1')
			{
				echo 'You have already accepted the invitation';
				exit;					
			}
			else
			{
				$update_sql = "UPDATE
									funeral_guardian
								SET
									is_accept = '1'
								WHERE
									guardian_link = '".$_POST['guardian_id']."'
								";
								
				mysql_query($update_sql);
				
				
				$client_sql = "SELECT * FROM clients WHERE id = '".$result['person_making_id']."' ";
				$client_ex = mysql_query($client_sql);
				
				$client_result = mysql_fetch_assoc($client_ex);
				
				
				$email = $client_result['email'];
	
				$name = $client_result['first_name'];
				
			//	ob_start();
				require_once('funeral_guardian3.php');
				
				//$html_message = ob_get_contents();
				//ob_end_clean();
		
				
				//$name = 'Rakesh Shetty';
				
				
		/*		$mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer
		
				$message = Swift_Message::newInstance()
							   ->setSubject('Invitation Accepted') // Message subject
							   ->setTo(array($result['email'] => $result['f_name'])) // Array of people to send to
							   ->setFrom(array($email => $name)) // From:
							   ->setBody($html_message, 'text/html'); // Attach that HTML message from earlier				
				// Send the email, and show user message
				if ($mailer->send($message))
					$success = true;
				else
					$error = true;
					
		*/			
				
				
			//	ob_start();
				require_once('funeral_guardian4.php');
			/*	$html_message1 = ob_get_contents();
				ob_end_clean();
					
					
				$mailer1 = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer
		
				$message1 = Swift_Message::newInstance()
							   ->setSubject('Guardian Remainder from ezifunerals.com') // Message subject
							   ->setTo(array($result['email'] => $result['f_name'])) // Array of people to send to
							   ->setFrom(array($email => $name)) // From:
							   ->setBody($html_message1, 'text/html'); // Attach that HTML message from earlier				
				// Send the email, and show user message
				if ($mailer1->send($message1))
					$success = true;
				else
					$error = true;	*/
				
				
				echo 'Thank You for accepting the invitation';
				exit;
				
			}
			
			
		}
		
		
		if($_POST['type'] == 'decline')
		{
			if($result['is_accept'] == '0')
			{
				echo 'You have already decline the invitation';
				exit;					
			}
			else
			{
				$update_sql = "UPDATE
									funeral_guardian
								SET
									is_accept = '0'
								WHERE
									guardian_link = '".$_POST['guardian_id']."'
								";
								
				mysql_query($update_sql);
				
				
				$client_sql = "SELECT * FROM clients WHERE id = '".$result['person_making_id']."' ";
				$client_ex = mysql_query($client_sql);
				
				$client_result = mysql_fetch_assoc($client_ex);
				
				
				$email = $client_result['email'];
	
				$name = $client_result['first_name'];
				
				ob_start();
				require_once('funeral_guardian2.php');
			/*	$html_message = ob_get_contents();
				ob_end_clean();
		
				
				//$name = 'Rakesh Shetty';
				
				
				$mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer
		
				$message = Swift_Message::newInstance()
					   ->setSubject('Funeral Guardian Invitation Decline') // Message subject
					   ->setTo(array($email => $name)) // Array of people to send to
					   ->setFrom(array('peter@ezifunerals.com.au' => 'EziFuneral')) // From:
					   ->setBody($html_message, 'text/html'); // Attach that HTML message from earlier
					   
				// Send the email, and show user message
				if ($mailer->send($message))
					$success = true;
				else
					$error = true;*/
				
				echo 'You have decline the invitation';
				exit;
				
			}
			
			
		}
	}
	else
	{
		echo 'Sorry, the link is expired';
		exit;
	}

?>