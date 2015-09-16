<?php

	ob_start();
	include_once('include/config.php');
	@session_start();
	
	//require_once('atneed/swift/swift_required.php');
	
	 $directorsql = "SELECT * FROM directors WHERE id = '".$_POST['director_id']."' ";
	$directorex = mysql_query($directorsql);
	
	$director = mysql_fetch_assoc($directorex);
	
	if($director['user_type']==1)
	{
		mysql_query("insert into lead_invoice(req_from,req_to,req_price) values(".$_SESSION['client'].",".$_POST['director_id'].",99)");
	}
	else if($director['user_type']==2)
	{
		mysql_query("insert into lead_invoice(req_from,req_to,req_price) values(".$_SESSION['client'].",".$_POST['director_id'].",49)");
	}
	else if($director['user_type']==3)
	{
		mysql_query("insert into lead_invoice(req_from,req_to,req_price) values(".$_SESSION['client'].",".$_POST['director_id'].",29)");
	}
	
	$clientsql = "SELECT * FROM clients WHERE id = '".$_SESSION['client']."'";
	$clientex = mysql_query($clientsql);
	
	//echo $clientsql;exit;
	$director_business = $director['business_name'];
	
	$client_result = mysql_fetch_assoc($clientex);
	
	
	$pdfsql = "SELECT * FROM clients_pdf WHERE client_id = '".$client_result['id']."' ORDER BY date DESC LIMIT 1 ";
	
	$pdfex = mysql_query($pdfsql);
	
	$is_pdf_present = @mysql_num_rows($pdfex);
	
	$pdfresult = mysql_fetch_assoc($pdfex);
	
	
	
	$dir_name = $director['full_name'];
	
	$dir_email = $director['email'];
                            
	//$mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer
	
	//$html_message = $link;
	
	$inv_from = $_SESSION['name'];
	
	
	$client_name = $client_result['first_name'].' '.$client_result['last_name'];
	
	$client_phone = $client_result['phone'];
	
	$client_email = $client_result['email']; 
	
	$service_required = $pdfresult['funeral_service'];
	
	$reason = $pdfresult['reason_quote'];
	
	$budget = $pdfresult['budget'];
	
	
	
	if($pdfresult['pdf_name'] != '')
	{
		//echo 'hii';exit;
		//$path = $_SERVER['DOCUMENT_ROOT'].folder_name.'/uploads/client_pdf/'.$_SESSION['client'].'/'.$pdfresult['pdf_name'];
		
		$is_funeral_plan = 'Yes';
		
		
		//ob_start();
		require_once('client-invitations-are-on-their-way.php');
	//	$html_message = ob_get_contents();
	//	ob_end_clean();
		
		
	//	$message = Swift_Message::newInstance()
//				   ->setSubject('EziFunerals - Funeral Quote Request'/*.$inv_from*/) // Message subject
//				   ->setTo(array($client_email => $client_name)) // Array of people to send to
//				   ->setFrom(array('peter@ezifunerals.com.au' => 'EziFunerals')) // From:
//				   ->setBody($html_message, 'text/html')
//				   ->attach(Swift_Attachment::fromPath($path)); 
	}
	else
	{
		
		//$path = '';
//		
//		$is_funeral_plan = 'No';
//		
//		ob_start();
		require_once('client-invitations-are-on-their-way.php');
	//	$html_message = ob_get_contents();
//		ob_end_clean();
//		
//		$message = Swift_Message::newInstance()
//				   ->setSubject('Ezifunerals - Funeral Quote Request'/*.$inv_from*/) // Message subject
//				   ->setTo(array($client_email => $client_name)) // Array of people to send to
//				   ->setFrom(array('peter@ezifunerals.com.au' => 'EziFunerals')) // From:
//				   ->setBody($html_message, 'text/html');
	}
	
	
	
	
	
//$message->attach(Swift_Attachment::fromPath('/path/to/file'));
	 
	
	// Send the email, and show user message
	//if ($mailer->send($message))
//	{
//		
//		//echo '1';
//		
//	}
//	else
//	{
//		//echo '2';
//	}
//	
	
?>