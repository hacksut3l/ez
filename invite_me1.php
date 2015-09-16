<?php
include "MailConfig2.php"; 
	ob_start();
	include_once('include/config.php');
	@session_start();
	error_reporting(0);
	
	//require_once('atneed/swift/swift_required.php');
	
	$directorsql = "SELECT * FROM directors WHERE id = '".$_REQUEST['director_id']."' ";
	
        $directorex = mysql_query($directorsql);
	
	$director = mysql_fetch_assoc($directorex);
	
	
	
	$clientsql = "SELECT * FROM clients WHERE id = '".$_SESSION['client']."'";
	$clientex = mysql_query($clientsql);
	
	//echo $clientsql;exit;
	
	
	$client_result = mysql_fetch_assoc($clientex);
	
	
 $pdfsql = "SELECT * FROM clients_pdf WHERE client_id = '".$client_result['id']."' ORDER BY date DESC LIMIT 1";
	
       
       //exit;
        
	$pdfex = mysql_query($pdfsql);
	
	$is_pdf_present = @mysql_num_rows($pdfex);
	
	$pdfresult = mysql_fetch_assoc($pdfex);
	
	
	$director_business = $director['business_name'];
	$dir_name = $director['full_name'];
	
	$dir_email = $director['email'];
                            
//	$mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer
	
	//$html_message = $link;
	
	$inv_from = $_SESSION['name'];
	
	
	$client_name = $client_result['first_name'].' '.$client_result['last_name'];
	
	$client_phone = $client_result['phone'];
	
	$client_email = $client_result['email']; 
	
 	$service_required = $pdfresult['funeral_service'];
	
	$reason = $pdfresult['reason_quote'];
	
	$budget = $pdfresult['budget'];
	
	$pdfname=$pdfresult['pdf_name'];
	
	 //echo $budget;
	
	if($pdfresult['pdf_name'] != '')
	{
		//echo 'hii';exit;
		
		
		$pdfname=$pdfresult['pdf_name'];
	//$pdfname=base_url.$path = 'uploads/client_pdf/'.$_SESSION['client'].'/'.$pdfresult['pdf_name'];
		//$path = $_SERVER['DOCUMENT_ROOT'].folder_name.'/uploads/client_pdf/'.$_SESSION['client'].'/'.$pdfresult['pdf_name'];
		
		//$is_funeral_plan = 'Yes';
	}
		
	//	ob_start();
		//require_once('funeral_director_quote_invite_email.php');
		//$html_message = ob_get_contents();
		//ob_end_clean();
		
		
		//$message = Swift_Message::newInstance()
			//	   ->setSubject('EziFunerals - Funeral Quote Request'/*.$inv_from*///) // Message subject
		/*		   ->setTo(array($dir_email => $dir_name)) // Array of people to send to
				   ->setFrom(array('peter@ezifunerals.com.au' => 'EziFunerals')) // From:
				   ->setBody($html_message, 'text/html')
				   ->attach(Swift_Attachment::fromPath($path)); 
	}
	else
	{
		
		$path = '';
		
		$is_funeral_plan = 'No';
		
		ob_start();
		require_once('funeral_director_quote_invite_email.php');
		$html_message = ob_get_contents();
		ob_end_clean();
		
		$message = Swift_Message::newInstance()
				   ->setSubject('EziFunerals - Funeral Quote Request'/*.$inv_from*///) // Message subject
				 /*  ->setTo(array($dir_email => $dir_name)) // Array of people to send to
				   ->setFrom(array('peter@ezifunerals.com.au' => 'EziFunerals')) // From:
				   ->setBody($html_message, 'text/html');
	}*/
	
	/**/
	/*/*/
	
	
//$message->attach(Swift_Attachment::fromPath('/path/to/file'));
	 
	
	// Send the email, and show user message
	
	
	require_once('send_invite.php');
	
	
		$sql = "INSERT
				INTO
					invite
					(
						invite_from,
						invite_to,
						date
					)
				VALUES
					(
						'".$_SESSION['client']."',
						'".$director['id']."',
						NOW()
					)
				";
				
		mysql_query($sql);
		
		echo 1;
		
	
?>